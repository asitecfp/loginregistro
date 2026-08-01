<?php
/**
 * FASE 1 — perfil_usuario.php
 * Correcciones aplicadas:
 *  [1] session_start() movido al inicio — antes de cualquier output
 *  [2] Verificación de sesión antes de cualquier output HTML
 *  [3] Credenciales eliminadas — se usan desde config/config.php vía conexion_bd.php
 *  [4] $login_usuario se obtiene de $_SESSION — escape con mysqli_real_escape_string
 *  [5] Eliminada exposición de ruta de imagen vía GET sin validar
 *  [6] htmlspecialchars() en TODOS los echo de variables hacia HTML
 *  [7] Campo de contraseña NO se pre-rellena con el valor de la BD
 *  [8] ID de usuario NO se muestra en campo editable del formulario
 */

// [1] session_start PRIMERO — antes de cualquier salida
session_start();
require_once __DIR__ . '/../config/config.php';

// [2] Verificar sesión
if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
    exit;
}

include 'conexion_bd.php';

// ── Variables ────────────────────────────────────────────────
$ideusu0  = ''; $nomusu0  = ''; $corusu0  = ''; $aliusu0  = '';
$apeusu0  = ''; $cedusu0  = ''; $stausu0  = ''; $telusu0  = '';
$dirusu0  = ''; $ciuusu0  = ''; $edousu0  = ''; $paisusu0 = '';
$nacusu0  = ''; $imgusu0  = ''; $ingusu0  = ''; $tipcue0  = '';
$tipsus0  = ''; $stacue0  = ''; $pinful0  = 0;  $pinfam0  = 0;
$pininf0  = 0;

// [4] Obtener datos del usuario autenticado — usando sesión, NO GET/POST
$login_usuario = $_SESSION['usuario'];
$login_esc     = mysqli_real_escape_string($conexion, $login_usuario);

$result = mysqli_query($conexion,
    "SELECT ideusu01, nomusu01, corusu01, aliusu01,
            pinful01, pinfam01, pininf01,
            apeusu01, cedusu01, stausu01, telusu01,
            dirusu01, ciuusu01, edousu01, paisusu01,
            nacusu01, imgusu01, ingusu01,
            tipcue01, tipsus01, stacue01
     FROM usuario
     WHERE corusu01 = '$login_esc'"
);

if ($result && $row = mysqli_fetch_assoc($result)) {
    $ideusu0  = $row['ideusu01']; $nomusu0  = $row['nomusu01'];
    $corusu0  = $row['corusu01']; $aliusu0  = $row['aliusu01'];
    $pinful0  = $row['pinful01']; $pinfam0  = $row['pinfam01'];
    $pininf0  = $row['pininf01']; $apeusu0  = $row['apeusu01'];
    $cedusu0  = $row['cedusu01']; $stausu0  = $row['stausu01'];
    $telusu0  = $row['telusu01']; $dirusu0  = $row['dirusu01'];
    $ciuusu0  = $row['ciuusu01']; $edousu0  = $row['edousu01'];
    $paisusu0 = $row['paisusu01'];$nacusu0  = $row['nacusu01'];
    $imgusu0  = $row['imgusu01']; $ingusu0  = $row['ingusu01'];
    $tipcue0  = $row['tipcue01']; $tipsus0  = $row['tipsus01'];
    $stacue0  = $row['stacue01'];
}

if (empty($paisusu0)) { $paisusu0 = 2; }
if (empty($edousu0))  { $edousu0  = 2; }
if (empty($ciuusu0))  { $ciuusu0  = 2; }

mysqli_close($conexion);

// [6] Función helper de escape para HTML
function h($val) {
    return htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Perfil — Streaming PRO</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <?php include 'funciones.php'; ?>
</head>
<body onload="onLoad()">
<main>
    <div class="contenedor__todo">
        <div class="caja__trasera">
            <div class="caja__trasera-login" style="width:550px;">
                <div class="contenedor__login-registro">

                    <form action="update_usuario_bd.php" method="POST" class="formulario__login"
                          style="margin-top:30px; width:600px;">

                        <h2>Actualización de Perfil</h2>

                        <!-- [8] ID oculto de solo lectura — el servidor lo ignora,
                                 update_usuario_bd.php usa el ID de la sesión -->
                        <input type="hidden" name="ideusu_ref" value="<?= h($ideusu0) ?>">

                        <table width="550" border="0" cellspacing="0" cellpadding="0">
                        <tr><td>

                            <label style="color:#333;font-weight:bold;">Datos personales</label><br>

                            <input name="cedusu" id="cedusu"
                                   value="<?= h($cedusu0) ?>"
                                   type="text" maxlength="15" placeholder="Cédula" /><br>

                            <input name="nomusu" id="nomusu"
                                   value="<?= h($nomusu0) ?>"
                                   type="text" maxlength="50" placeholder="Nombres" required /><br>

                            <input name="apeusu" id="apeusu"
                                   value="<?= h($apeusu0) ?>"
                                   type="text" maxlength="40" placeholder="Apellidos" required /><br>

                            <input name="corusu" id="corusu"
                                   value="<?= h($corusu0) ?>"
                                   type="text" maxlength="50"
                                   placeholder="Correo Electrónico"
                                   onkeypress="return email(event)" onpaste="return false" required /><br>

                            <input name="telusu" id="telusu"
                                   value="<?= h($telusu0) ?>"
                                   type="text" maxlength="10" placeholder="Teléfono"
                                   onkeypress="return telefono(event)" onpaste="return false" /><br><br>

                            <!-- Selector de fecha de nacimiento -->
                            <span class="Fecha_Reglamento2">
                                <select name="fdiaus" id="fdiaus" onchange="cbx_ddus()">
                                    <option value="00">Día</option>
                                    <?php for ($d = 1; $d <= 31; $d++): ?>
                                    <option value="<?= sprintf('%02d', $d) ?>"><?= sprintf('%02d', $d) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </span>
                            <span class="Fecha_Reglamento2">
                                <select name="fmesus" id="fmesus" onchange="cbx_mmus()">
                                    <option value="00">Mes</option>
                                    <?php
                                    $meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                                              'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];
                                    foreach ($meses as $i => $m):
                                    ?>
                                    <option value="<?= sprintf('%02d', $i+1) ?>"><?= $m ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </span>
                            <span class="Fecha_Reglamento2">
                                <select name="fanous" id="fanous" onchange="cbx_aaus()">
                                    <option value="0000">Año</option>
                                    <?php for ($y = 1960; $y <= 2010; $y++): ?>
                                    <option value="<?= $y ?>"><?= $y ?></option>
                                    <?php endfor; ?>
                                </select>
                            </span><br>

                            <input name="nacusu" id="nacusu"
                                   value="<?= h($nacusu0) ?>"
                                   type="hidden" maxlength="10" /><br><br>

                            <label style="color:#333;font-weight:bold;">Dirección</label><br>
                            <input name="dirusu" id="dirusu"
                                   value="<?= h($dirusu0) ?>"
                                   type="text" maxlength="90" placeholder="Dirección"
                                   onkeypress="return direccion(event)" onpaste="return false" /><br><br>

                            <!-- Selectores de País / Estado / Ciudad (sin cambios funcionales) -->
                            <span class="Pais">
                                <select name="paisusu" id="paisusu" onchange="cbx_paisusu()" onclick="mostrar()">
                                    <option value="2">País</option>
                                    <option value="arg">Argentina</option>
                                    <option value="chi">Chile</option>
                                    <option value="col">Colombia</option>
                                    <option value="ecu">Ecuador</option>
                                    <option value="usa">Estados Unidos</option>
                                    <option value="mex">México</option>
                                    <option value="per">Perú</option>
                                    <option value="pur">Puerto Rico</option>
                                    <option value="red">República Dominicana</option>
                                    <option value="uru">Uruguay</option>
                                    <option value="ven">Venezuela</option>
                                </select>
                            </span>

                            <input name="paisusu2" id="paisusu2" value="<?= h($paisusu0) ?>" type="hidden">
                            <input name="edousu2"  id="edousu2"  value="<?= h($edousu0)  ?>" type="hidden">
                            <input name="ciuusu2"  id="ciuusu2"  value="<?= h($ciuusu0)  ?>" type="hidden"><br><br><br>

                            <label style="color:#333;font-weight:bold;">Seguridad</label>

                            <!-- [7] Campo de contraseña SIN value pre-relleno -->
                            <input name="conusu" id="conusu"
                                   type="password" maxlength="50"
                                   placeholder="Nueva Contraseña (dejar vacío para no cambiar)"
                                   autocomplete="new-password" /><br><br>

                            <label style="color:#333;font-weight:bold;">PIN de Perfil (4 dígitos)</label>

                            <!-- [7] PINs SIN value pre-relleno -->
                            <input name="pinful" id="pinful"
                                   type="password" maxlength="4"
                                   placeholder="PIN Full"
                                   onkeypress="return solonumeros(event)" onpaste="return false" /><br>
                            <input name="pinfam" id="pinfam"
                                   type="password" maxlength="4"
                                   placeholder="PIN Familiar"
                                   onkeypress="return solonumeros(event)" onpaste="return false" /><br>
                            <input name="pininf" id="pininf"
                                   type="password" maxlength="4"
                                   placeholder="PIN Infantil"
                                   onkeypress="return solonumeros(event)" onpaste="return false" /><br>

                            <input name="stausu"  value="<?= h($stausu0) ?>"  type="hidden">
                            <input name="imgusu"  value="<?= h($imgusu0) ?>"  type="hidden"><br><br>

                            <label style="color:#333;font-weight:bold;">
                                Fecha Ingreso: <?= h($ingusu0) ?>
                            </label><br><br>
                            <label style="color:#333;font-weight:bold;">
                                Tipo de Cuenta: <?= h($tipcue0) ?>
                            </label><br><br>
                            <label style="color:#333;font-weight:bold;">
                                Tipo de Suscriptor: <?= h($tipsus0) ?>
                            </label><br><br>
                            <label style="color:#333;font-weight:bold;">
                                Estado Cuenta: <?= h($stacue0) ?>
                            </label><br><br>

                        </td></tr>
                        <tr><td>
                            <button type="submit">Guardar</button><br><br>
                            <label style="color:#333;font-weight:bold;">
                                Los campos de contraseña y PIN solo se actualizan si los completas.
                            </label>
                        </td></tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
