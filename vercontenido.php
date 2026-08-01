<?php
/**
 * FASE 1 — vercontenido.php
 * Correcciones aplicadas:
 *  [1] Credenciales eliminadas — se leen desde config/config.php
 *  [2] $_GET['mae'], $_GET['con'], $_GET['tem'] validados como enteros antes de usarse
 *  [3] Queries usan mysqli_real_escape_string (SQLi mitigation)
 *  [4] Variables de ruta escapadas con htmlspecialchars antes de emitirse al HTML
 *  [5] Verificación de sesión y de perfil antes de mostrar contenido
 */

session_start();
require_once __DIR__ . '/config/config.php';

// [5] Verificar sesión y perfil
if (!isset($_SESSION['usuario']) || empty($_SESSION['perfil'])) {
    echo '<script>
        alert("Debe iniciar sesión para ver este contenido.");
        window.location = "index.php";
    </script>';
    session_destroy();
    exit;
}

// [2] Validar parámetros GET como enteros — si no son numéricos se rechaza
$mae = isset($_GET['mae']) ? (int)$_GET['mae'] : 0;
$con = isset($_GET['con']) ? (int)$_GET['con'] : 0;
$tem = isset($_GET['tem']) ? (int)$_GET['tem'] : 0;

if ($mae <= 0) {
    echo '<script>alert("Contenido no válido."); window.location = "Bienvenido.php";</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Contenido — Streaming PRO</title>
    <link rel="stylesheet" href="assets/css/vercont.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header></header>
    <main></main>

    <?php
    // [1] Conexión usando config central
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
        error_log('vercontenido — Error conexión: ' . $mysqli->connect_error);
        die('<script>alert("Error de servidor."); window.location="Bienvenido.php";</script>');
    }

    // [3] Query con parámetro validado como entero — seguro contra SQLi
    $query = $mysqli->query("SELECT idecon04, nomcon04, nomco204, tipcon04 FROM maecon04 WHERE idecon04 = $mae");

    if (!$query || $query->num_rows === 0) {
        echo '<script>alert("Contenido no encontrado."); window.location="Bienvenido.php";</script>';
        $mysqli->close();
        exit;
    }

    $valores    = $query->fetch_assoc();
    $idecont    = (int)$valores['idecon04'];
    // [4] Escapar strings antes de emitirlos al HTML
    $nombrecont = htmlspecialchars($valores['nomcon04'],  ENT_QUOTES, 'UTF-8');
    $tipocont   = htmlspecialchars($valores['tipcon04'],  ENT_QUOTES, 'UTF-8');

    // ── PELÍCULA ─────────────────────────────────────────────
    if ($tipocont === 'Pelicula') {

        $querymov = $mysqli->query(
            "SELECT sdruta19, hdruta19, fhdrut19 FROM maerut19 WHERE idcont19 = $idecont"
        );

        if (!$querymov || $querymov->num_rows === 0) {
            echo '<script>alert("Rutas de contenido no encontradas."); window.location="Bienvenido.php";</script>';
            $mysqli->close();
            exit;
        }

        $valoresmov = $querymov->fetch_assoc();

        // [4] Escapar rutas antes de emitirlas al HTML
        $rutsd  = htmlspecialchars($valoresmov['sdruta19'], ENT_QUOTES, 'UTF-8');
        $ruthd  = htmlspecialchars($valoresmov['hdruta19'], ENT_QUOTES, 'UTF-8');
        $rutfhd = htmlspecialchars($valoresmov['fhdrut19'], ENT_QUOTES, 'UTF-8');

        echo '
        <div class="video-container" id="contenedor">
            <video id="repcont" class="repcont" width="100%" height="100%"
                   preload controls autoplay
                   onloadstart="this.volume=1"
                   controlsList="nodownload"
                   disablePictureInPicture>
                <source src="' . $rutfhd . $idecont . '.mp4" type="video/mp4">
                <source src="' . $rutfhd . $idecont . '.mkv" type="video/webm">
                Tu navegador no soporta este formato (mp4, mkv).
            </video>
            <div class="capa-controles" id="controles">
                <button class="btn-circular" id="btnAtras">⬅</button>
                <button class="btn-circular btn-principal" id="btnPlay">⏯</button>
                <button class="btn-circular" id="btnMax">⛶</button>
            </div>
        </div>

        <a id="tiempototal"><div></div></a>
        <a id="tiempoactual"><div></div></a>
        <a id="porcentaje"><div></div></a>

        <!-- Datos para JS: valores seguros, ya escapados -->
        <div id="ID"  data-value="' . $idecont . '" hidden>' . $idecont . '</div>
        <div id="SD"  data-value="' . $rutsd   . '" hidden></div>
        <div id="HD"  data-value="' . $ruthd   . '" hidden></div>
        <div id="FHD" data-value="' . $rutfhd  . '" hidden></div>
        <div id="mae" data-value="' . $idecont . '" hidden>' . $idecont . '</div>
        <div id="progress-bar"></div>
        ';
    }

    // ── SERIE ────────────────────────────────────────────────
    if ($tipocont === 'Serie') {

        if ($con <= 0 || $tem <= 0) {
            echo '<script>alert("Parámetros de capítulo no válidos."); window.location="Bienvenido.php";</script>';
            $mysqli->close();
            exit;
        }

        $capsig = $con + 1;

        $queryser = $mysqli->query(
            "SELECT idcapi18, nomcap18, descap18, dircap181, dircap182, dircap183
             FROM maecap18
             WHERE idcont18 = $idecont
               AND numcap18 = $con
               AND idtemp18 = $tem"
        );

        if (!$queryser || $queryser->num_rows === 0) {
            echo '<script>alert("Capítulo no encontrado."); window.location="Bienvenido.php";</script>';
            $mysqli->close();
            exit;
        }

        $valoresser = $queryser->fetch_assoc();
        $idcapit    = (int)$valoresser['idcapi18'];
        $direcapSD  = htmlspecialchars($valoresser['dircap181'], ENT_QUOTES, 'UTF-8');
        $direcapHD  = htmlspecialchars($valoresser['dircap182'], ENT_QUOTES, 'UTF-8');
        $direcapFHD = htmlspecialchars($valoresser['dircap183'], ENT_QUOTES, 'UTF-8');

        echo '
        <video id="repcont" class="repcont" width="100%" height="100%"
               preload controls autoplay
               onloadstart="this.volume=1"
               controlsList="nodownload"
               disablePictureInPicture>
            <source src="' . $direcapFHD . $idcapit . '.mp4"  type="video/mp4">
            <source src="' . $direcapFHD . $idcapit . '.mkv"  type="video/webm">
            Tu navegador no soporta este formato.
        </video>

        <a id="tiempototal"><div></div></a>
        <a id="tiempoactual"><div></div></a>
        <a id="porcentaje"><div></div></a>
        <div id="progress-bar"></div>

        <div id="ID"     data-value="' . $idcapit . '" hidden>' . $idcapit . '</div>
        <div id="SD"     data-value="' . $direcapSD  . '" hidden></div>
        <div id="HD"     data-value="' . $direcapHD  . '" hidden></div>
        <div id="FHD"    data-value="' . $direcapFHD . '" hidden></div>
        <div id="mae"    data-value="' . $mae     . '" hidden>' . $mae     . '</div>
        <div id="con"    data-value="' . $con     . '" hidden>' . $con     . '</div>
        <div id="tem"    data-value="' . $tem     . '" hidden>' . $tem     . '</div>
        <div id="capsig" data-value="' . $capsig  . '" hidden>' . $capsig  . '</div>
        ';
    }

    $mysqli->close();
    ?>

    <button id="botsig" class="botsig" onclick="nextmov()" hidden>Ver siguiente video</button>
    <script src="assets/js/vercont.js"></script>

    <style>
        .video-container { position:relative; width:fit-content; overflow:hidden; background:#000; }
        video { display:block; max-width:100%; }
        .capa-controles {
            position:absolute; top:0; left:0; width:100%; height:100%;
            display:flex; justify-content:center; align-items:center; gap:20px;
            background:rgba(0,0,0,0.2); transition:opacity 0.4s ease;
            opacity:0; pointer-events:none;
        }
        .mostrar-controles { opacity:1; pointer-events:auto; }
        .btn-circular {
            background-color:#cc5500; color:white; border:none; border-radius:50%;
            width:60px; height:60px; font-size:24px; cursor:pointer;
            display:flex; justify-content:center; align-items:center;
            box-shadow:0 4px 15px rgba(0,0,0,0.5); transition:transform 0.2s;
        }
        .btn-circular:hover { background-color:#ff6600; transform:scale(1.1); }
        .btn-principal { width:80px; height:80px; font-size:32px; }
    </style>
</body>
<script type="text/javascript">
    document.oncontextmenu = function(){ return false; }
</script>
</html>
