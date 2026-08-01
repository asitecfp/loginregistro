<?php
/**
 * FASE 1 — update_usuario_bd.php
 * Correcciones aplicadas:
 *  [1] Verificación de sesión activa antes de procesar nada
 *  [2] El ID del usuario se obtiene EXCLUSIVAMENTE de la sesión (no del POST)
 *  [3] Eliminado el operador @ que suprimía errores silenciosamente
 *  [4] Escape de variables con mysqli_real_escape_string antes del UPDATE
 *  [5] Error reporting controlado desde config.php
 */

require_once __DIR__ . '/../config/config.php';
include 'conexion_bd.php';

// [1] VERIFICAR SESIÓN — sin sesión, no se procesa nada
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '<script>alert("Sesión no válida. Inicie sesión."); window.location="../index.php";</script>';
    exit;
}

// [2] ID del usuario viene de la SESIÓN, no del formulario POST
//     Esto evita que alguien modifique el ideusu en el POST para editar otro usuario
$login_usuario = $_SESSION['usuario'];

// Obtener el ID real del usuario autenticado desde la BD
$stmt_id = mysqli_prepare($conexion, "SELECT ideusu01 FROM usuario WHERE corusu01 = ?");
mysqli_stmt_bind_param($stmt_id, 's', $login_usuario);
mysqli_stmt_execute($stmt_id);
$res_id = mysqli_stmt_get_result($stmt_id);
$row_id = mysqli_fetch_assoc($res_id);
mysqli_stmt_close($stmt_id);

if (!$row_id) {
    echo '<script>alert("Usuario no encontrado."); window.location="perfil_usuario.php";</script>';
    exit;
}
$ideusu_real = $row_id['ideusu01'];

// [3] Leer variables POST sin @ — los errores se muestran o loguean según APP_ENV
$nomusu0  = isset($_POST['nomusu'])  ? trim($_POST['nomusu'])  : '';
$corusu0  = isset($_POST['corusu'])  ? trim($_POST['corusu'])  : '';
$aliusu0  = isset($_POST['aliusu'])  ? trim($_POST['aliusu'])  : '';
$conusu0  = isset($_POST['conusu'])  ? trim($_POST['conusu'])  : '';
$apeusu0  = isset($_POST['apeusu'])  ? trim($_POST['apeusu'])  : '';
$cedusu0  = isset($_POST['cedusu'])  ? trim($_POST['cedusu'])  : '';
$telusu0  = isset($_POST['telusu'])  ? trim($_POST['telusu'])  : '';
$dirusu0  = isset($_POST['dirusu'])  ? trim($_POST['dirusu'])  : '';
$ciuusu0  = isset($_POST['ciuusu'])  ? trim($_POST['ciuusu'])  : '';
$edousu0  = isset($_POST['edousu'])  ? trim($_POST['edousu'])  : '';
$paisusu0 = isset($_POST['paisusu']) ? trim($_POST['paisusu']) : '';
$nacusu0  = isset($_POST['nacusu'])  ? trim($_POST['nacusu'])  : '';
$imgusu0  = isset($_POST['imgusu'])  ? trim($_POST['imgusu'])  : '';
$pinful0  = isset($_POST['pinful'])  ? trim($_POST['pinful'])  : '';
$pinfam0  = isset($_POST['pinfam'])  ? trim($_POST['pinfam'])  : '';
$pininf0  = isset($_POST['pininf'])  ? trim($_POST['pininf'])  : '';

// [4] Escapar todas las variables antes de usarlas en el query
$nomusu0  = mysqli_real_escape_string($conexion, $nomusu0);
$corusu0  = mysqli_real_escape_string($conexion, $corusu0);
$aliusu0  = mysqli_real_escape_string($conexion, $aliusu0);
$conusu0  = mysqli_real_escape_string($conexion, $conusu0);
$apeusu0  = mysqli_real_escape_string($conexion, $apeusu0);
$cedusu0  = mysqli_real_escape_string($conexion, $cedusu0);
$telusu0  = mysqli_real_escape_string($conexion, $telusu0);
$dirusu0  = mysqli_real_escape_string($conexion, $dirusu0);
$ciuusu0  = mysqli_real_escape_string($conexion, $ciuusu0);
$edousu0  = mysqli_real_escape_string($conexion, $edousu0);
$paisusu0 = mysqli_real_escape_string($conexion, $paisusu0);
$nacusu0  = mysqli_real_escape_string($conexion, $nacusu0);
$imgusu0  = mysqli_real_escape_string($conexion, $imgusu0);
$pinful0  = mysqli_real_escape_string($conexion, $pinful0);
$pinfam0  = mysqli_real_escape_string($conexion, $pinfam0);
$pininf0  = mysqli_real_escape_string($conexion, $pininf0);

// El WHERE usa $ideusu_real obtenido de la sesión — nunca del POST
$query = "UPDATE `usuario` SET 
    `nomusu01`  = '$nomusu0',
    `corusu01`  = '$corusu0',
    `aliusu01`  = '$aliusu0',
    `conusu01`  = '$conusu0',
    `pinful01`  = '$pinful0',
    `pinfam01`  = '$pinfam0',
    `pininf01`  = '$pininf0',
    `apeusu01`  = '$apeusu0',
    `cedusu01`  = '$cedusu0',
    `telusu01`  = '$telusu0',
    `dirusu01`  = '$dirusu0',
    `ciuusu01`  = '$ciuusu0',
    `edousu01`  = '$edousu0',
    `paisusu01` = '$paisusu0',
    `nacusu01`  = '$nacusu0',
    `imgusu01`  = '$imgusu0'
    WHERE `ideusu01` = '$ideusu_real'";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '<script>alert("Usuario guardado exitosamente"); window.location="perfil_usuario.php";</script>';
} else {
    // Loguear el error real, mostrar mensaje genérico
    error_log('Error UPDATE usuario id=' . $ideusu_real . ': ' . mysqli_error($conexion));
    echo '<script>alert("Error al guardar. Intente nuevamente."); window.location="perfil_usuario.php";</script>';
}

mysqli_close($conexion);
?>
