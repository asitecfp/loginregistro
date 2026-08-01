<?php
/**
 * FASE 1 — registro_usuario_bd.php
 * Correcciones aplicadas:
 *  [1] error_reporting controlado desde config.php
 *  [2] Escape de TODAS las variables con mysqli_real_escape_string
 *  [3] Validación server-side de campos obligatorios
 *  [4] Validación de formato de correo electrónico
 *  [5] Eliminado código muerto y variables sin efecto
 */

require_once __DIR__ . '/../config/config.php';
include 'conexion_bd.php';

// ── Leer y limpiar variables POST ────────────────────────────
$nomusu0 = isset($_POST['nomusu']) ? trim($_POST['nomusu']) : '';
$corusu0 = isset($_POST['corusu']) ? trim($_POST['corusu']) : '';
$conusu0 = isset($_POST['conusu']) ? trim($_POST['conusu']) : '';
$apeusu0 = isset($_POST['apeusu']) ? trim($_POST['apeusu']) : '';
$ingusu0 = isset($_POST['ingusu']) ? trim($_POST['ingusu']) : date('Y-m-d');
$stacue0 = isset($_POST['stacue']) ? trim($_POST['stacue']) : 'regi';

// [3] VALIDACIÓN SERVER-SIDE — no confiar solo en JavaScript
$errores = [];

if (empty($nomusu0)) { $errores[] = 'El campo Nombres es obligatorio.'; }
if (empty($apeusu0)) { $errores[] = 'El campo Apellidos es obligatorio.'; }
if (empty($corusu0)) { $errores[] = 'El Correo Electrónico es obligatorio.'; }
if (empty($conusu0)) { $errores[] = 'La Contraseña es obligatoria.'; }

// [4] Validar formato de correo
if (!empty($corusu0) && !filter_var($corusu0, FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'El formato del Correo Electrónico no es válido.';
}

// Largo mínimo de contraseña
if (!empty($conusu0) && strlen($conusu0) < 6) {
    $errores[] = 'La contraseña debe tener al menos 6 caracteres.';
}

if (!empty($errores)) {
    $msj = implode('\n', $errores);
    echo '<script>alert("ERROR:\n' . addslashes($msj) . '"); window.history.back();</script>';
    exit;
}

// [2] Escapar todas las variables antes de usarlas en queries
$nomusu0_e = mysqli_real_escape_string($conexion, $nomusu0);
$corusu0_e = mysqli_real_escape_string($conexion, $corusu0);
$conusu0_e = mysqli_real_escape_string($conexion, $conusu0);
$apeusu0_e = mysqli_real_escape_string($conexion, $apeusu0);
$stacue0_e = mysqli_real_escape_string($conexion, $stacue0);
$ingusu0_e = mysqli_real_escape_string($conexion, $ingusu0);

// Verificar si el correo ya está registrado
$verificar_correo = mysqli_query($conexion,
    "SELECT ideusu01 FROM usuario WHERE corusu01 = '$corusu0_e'"
);

if (mysqli_num_rows($verificar_correo) > 0) {
    echo '<script>alert("Este Correo Electrónico ya está registrado."); window.history.back();</script>';
    mysqli_close($conexion);
    exit;
}

// Insertar nuevo usuario
$query = "INSERT INTO `usuario`
    (`nomusu01`, `corusu01`, `aliusu01`, `conusu01`,
     `pinful01`, `pinfam01`, `pininf01`,
     `apeusu01`, `cedusu01`, `stausu01`,
     `telusu01`, `dirusu01`, `ciuusu01`, `edousu01`, `paisusu01`,
     `nacusu01`, `imgusu01`, `ingusu01`,
     `tipcue01`, `tipsus01`, `stacue01`, `canses01`)
    VALUES
    ('$nomusu0_e', '$corusu0_e', '', '$conusu0_e',
     0, 0, 0,
     '$apeusu0_e', '', 'activo',
     '', '', '', '', '',
     '2000-01-01', '', '$ingusu0_e',
     'visor', 'ZNET', '$stacue0_e', 3)";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '<script>alert("Usuario registrado exitosamente."); window.location="../index.php";</script>';
} else {
    error_log('Error INSERT usuario: ' . mysqli_error($conexion));
    echo '<script>alert("Error al registrar. Intente nuevamente."); window.history.back();</script>';
}

mysqli_close($conexion);
?>
