<?php
/**
 * FASE 1 — list_usu.php
 * Correcciones aplicadas:
 *  [1] error_reporting controlado desde config.php
 *  [2] IP corregida: REMOTE_ADDR en lugar del inexistente client_ADDR
 *  [3] cURL usa HTTPS en lugar de HTTP
 *  [4] Credenciales eliminadas — se leen desde config/config.php
 *  [5] Función list_usu() deshabilitada — exponía sesiones y correos de todos los usuarios
 *  [6] Escape de variables antes de queries (mysqli_real_escape_string)
 *  [7] Errores de conexión no se exponen al navegador
 */

if (!defined('DB_HOST')) {
    require_once __DIR__ . '/../../config/config.php';
}

// Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('America/Caracas');

// ════════════════════════════════════════════════════════════════
// FUNCIÓN: Verifica límite de sesiones simultáneas del usuario
// ════════════════════════════════════════════════════════════════
function veribd($cantlog) {
    if (!defined('DB_HOST')) {
        require_once __DIR__ . '/../../config/config.php';
    }

    $usu       = isset($_SESSION['usuario'])  ? $_SESSION['usuario']  : '';
    $fechases  = isset($_SESSION['fechases']) ? $_SESSION['fechases'] : '';

    $fechaactual = date('Y-m-d');
    $cont1 = 0;

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($mysqli->connect_errno) {
        // [7] No exponer detalles de conexión al navegador
        error_log('veribd — Error de conexión: ' . $mysqli->connect_error);
        return;
    }

    // [6] Escape de variables antes del query
    $usu_e      = mysqli_real_escape_string($mysqli, $usu);
    $fecha_e    = mysqli_real_escape_string($mysqli, $fechaactual);

    $resultado = $mysqli->query(
        "SELECT idlses10 FROM logses10
         WHERE sescor10 = '$usu_e'
           AND fecses10 = '$fecha_e'"
    );

    if (!$resultado) {
        error_log('veribd — Error query: ' . $mysqli->error);
        $mysqli->close();
        return;
    }

    while ($resultado->fetch_assoc()) {
        $cont1++;
        if ($cont1 >= $cantlog) {
            insertblo($usu);
            echo '<script>
                alert("Has alcanzado el número máximo de dispositivos conectados en simultáneo.\nContacta a tu proveedor para solicitar más pantallas.");
                window.location = "../Bienvenido.php";
            </script>';
            session_unset();
            session_destroy();
            $mysqli->close();
            exit();
        }
    }

    $mysqli->close();
}

// ════════════════════════════════════════════════════════════════
// FUNCIÓN: Inserta registro de ingreso en el log de sesiones
// ════════════════════════════════════════════════════════════════
function insertlog() {
    if (!defined('DB_HOST')) {
        require_once __DIR__ . '/../../config/config.php';
    }

    $usu      = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
    $idsesion = session_id();

    // [2] IP correcta del cliente
    $host = $_SERVER['REMOTE_ADDR'];

    // [3] Geolocalización via HTTPS
    $pais     = 'Desconocido';
    $clientip = $host;

    $ch = curl_init('https://ipwho.is/' . $host);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);   // timeout de 3s — no bloquear el login
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $ipwhois = json_decode($response, true);
        if (isset($ipwhois['country'])) { $pais     = $ipwhois['country']; }
        if (isset($ipwhois['ip']))      { $clientip = $ipwhois['ip']; }
    }

    $fecing = date('Y-m-d');
    $horing = date('H:i:s');

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conexion) {
        error_log('insertlog — Error de conexión: ' . mysqli_connect_error());
        // Redirigir igual aunque falle el log — no bloquear el acceso
        echo '<script>window.location = "../Bienvenido.php";</script>';
        return;
    }

    // [6] Escape de todas las variables
    $usu_e      = mysqli_real_escape_string($conexion, $usu);
    $idsesion_e = mysqli_real_escape_string($conexion, $idsesion);
    $pais_e     = mysqli_real_escape_string($conexion, $pais);
    $host_e     = mysqli_real_escape_string($conexion, $host);
    $clientip_e = mysqli_real_escape_string($conexion, $clientip);
    $fecing_e   = mysqli_real_escape_string($conexion, $fecing);
    $horing_e   = mysqli_real_escape_string($conexion, $horing);

    $query2 = "INSERT INTO `logses10`
        (`idphp10`, `sescor10`, `sesper10`, `dispos10`, `seslug10`,
         `iplses10`, `iphost10`, `fecses10`, `horses10`, `accion10`)
        VALUES
        ('$idsesion_e', '$usu_e', 'perfil', 'web', '$pais_e',
         '$host_e', '$clientip_e', '$fecing_e', '$horing_e', 'ing')";

    if (mysqli_query($conexion, $query2)) {
        echo '<script>window.location = "../Bienvenido.php";</script>';
    } else {
        error_log('insertlog — Error INSERT: ' . mysqli_error($conexion));
        // Redirigir igualmente aunque falle el log
        echo '<script>window.location = "../Bienvenido.php";</script>';
    }

    mysqli_close($conexion);
}

// ════════════════════════════════════════════════════════════════
// FUNCIÓN: Inserta registro de bloqueo en el log de sesiones
// ════════════════════════════════════════════════════════════════
function insertblo($usu) {
    if (!defined('DB_HOST')) {
        require_once __DIR__ . '/../../config/config.php';
    }

    $idsesion = session_id();
    $host     = $_SERVER['REMOTE_ADDR'];  // [2] IP correcta

    // [3] Geolocalización via HTTPS
    $pais     = 'Desconocido';
    $clientip = $host;

    $ch = curl_init('https://ipwho.is/' . $host);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $ipwhois = json_decode($response, true);
        if (isset($ipwhois['country'])) { $pais     = $ipwhois['country']; }
        if (isset($ipwhois['ip']))      { $clientip = $ipwhois['ip']; }
    }

    $fecing = date('Y-m-d');
    $horing = date('H:i:s');

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$conexion) {
        error_log('insertblo — Error de conexión: ' . mysqli_connect_error());
        return;
    }

    // [6] Escape de todas las variables
    $usu_e      = mysqli_real_escape_string($conexion, $usu);
    $idsesion_e = mysqli_real_escape_string($conexion, $idsesion);
    $pais_e     = mysqli_real_escape_string($conexion, $pais);
    $host_e     = mysqli_real_escape_string($conexion, $host);
    $clientip_e = mysqli_real_escape_string($conexion, $clientip);
    $fecing_e   = mysqli_real_escape_string($conexion, $fecing);
    $horing_e   = mysqli_real_escape_string($conexion, $horing);

    $query3 = "INSERT INTO `logses10`
        (`idphp10`, `sescor10`, `sesper10`, `dispos10`, `seslug10`,
         `iplses10`, `iphost10`, `fecses10`, `horses10`, `accion10`)
        VALUES
        ('$idsesion_e', '$usu_e', 'bloqueado', 'web', '$pais_e',
         '$host_e', '$clientip_e', '$fecing_e', '$horing_e', 'blo')";

    if (!mysqli_query($conexion, $query3)) {
        error_log('insertblo — Error INSERT: ' . mysqli_error($conexion));
    }

    mysqli_close($conexion);
}

// ════════════════════════════════════════════════════════════════
// FUNCIÓN: list_usu — DESHABILITADA POR SEGURIDAD
// Razón: exponía IDs de sesión y correos de todos los usuarios
//        sin ningún control de acceso. Ver informe Fase 1.
// ════════════════════════════════════════════════════════════════
function list_usu() {
    // DESHABILITADA — No eliminar esta función, solo está bloqueada
    error_log('list_usu() fue llamada — función deshabilitada por seguridad');
    return;
}
?>
