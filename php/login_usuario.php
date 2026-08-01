<?php
/**
 * FASE 1 — login_usuario.php
 * Correcciones aplicadas:
 *  [1] error_reporting controlado desde config.php
 *  [2] Escape de variables con mysqli_real_escape_string
 *  [3] Whitelist para el nombre de columna de PIN (evita SQLi en columna dinámica)
 *  [4] IP del cliente corregida: REMOTE_ADDR en lugar de client_ADDR
 *  [5] Eliminados los "tokens de flujo" hardcodeados en la URL
 *      El estado de autenticación se maneja solo con $_SESSION
 */

session_start();
require_once __DIR__ . '/../config/config.php';
include 'conexion_bd.php';
include '../STR-master/php/list_usu.php';

date_default_timezone_set('America/Caracas');

// ── Leer variables POST ───────────────────────────────────────
$correo    = isset($_POST['correo_usuario01'])    ? trim($_POST['correo_usuario01'])    : '';
$contrasena= isset($_POST['contrasena_usuario01'])? trim($_POST['contrasena_usuario01']): '';
$perfil1   = isset($_POST['perfil01']) ? trim($_POST['perfil01']) : '';
$perfil2   = isset($_POST['perfil02']) ? trim($_POST['perfil02']) : '';
$perfil3   = isset($_POST['perfil03']) ? trim($_POST['perfil03']) : '';
$pinusu0   = isset($_POST['pinusu'])   ? trim($_POST['pinusu'])   : '';
$check01   = isset($_POST['check1'])   ? trim($_POST['check1'])   : '';
$check02   = isset($_POST['check2'])   ? trim($_POST['check2'])   : '';

// [3] WHITELIST para columna de PIN — previene inyección de nombre de columna
$columnas_pin_validas = ['pinful01', 'pinfam01', 'pininf01'];
$nomperfil = '';
if ($perfil1 !== '') { $nomperfil = 'pinful01'; }
if ($perfil2 !== '') { $nomperfil = 'pinfam01'; }
if ($perfil3 !== '') { $nomperfil = 'pininf01'; }

// Si nomperfil no está en la lista blanca, rechazar
if ($check02 === 'act' && !in_array($nomperfil, $columnas_pin_validas, true)) {
    echo '<script>alert("Perfil no válido."); window.location="../index.php";</script>';
    exit;
}

$fechaactual = date('Y-m-d');

// ════════════════════════════════════════════════════════════════
// FLUJO 1 — Login con correo y contraseña
// ════════════════════════════════════════════════════════════════
if ($check01 === 'act') {

    // [2] Escape de variables antes del query
    $correo_esc     = mysqli_real_escape_string($conexion, $correo);
    $contrasena_esc = mysqli_real_escape_string($conexion, $contrasena);

    $validar_login = mysqli_query($conexion,
        "SELECT ideusu01, tipcue01, stausu01, canses01
         FROM usuario
         WHERE corusu01 = '$correo_esc'
           AND conusu01 = '$contrasena_esc'"
    );

    if (mysqli_num_rows($validar_login) > 0) {

        $fila = mysqli_fetch_assoc($validar_login);

        if (strtolower($fila['stausu01']) === 'activo') {

            // Regenerar ID de sesión al autenticar (previene session fixation)
            session_regenerate_id(true);

            $_SESSION['usuario']         = $correo;
            $_SESSION['ideusu']          = $fila['ideusu01'];
            $_SESSION['perfil']          = '';
            $_SESSION['perfilcontador']  = 0;
            $_SESSION['tipousuario']     = $fila['tipcue01'];
            $_SESSION['fechases']        = $fechaactual;

            // [5] Redirigir sin token en URL — el estado de sesión es suficiente
            header('Location: ../index.php');
            exit;

        } else {
            echo '<script>alert("Usuario Inactivo o Suspendido. Contacte al administrador."); window.location="../index.php";</script>';
            exit;
        }

    } else {
        // Mensaje genérico — no revelar si el usuario existe o no
        echo '<script>alert("Usuario o contraseña inválida."); window.location="../index.php";</script>';
        exit;
    }
}

// ════════════════════════════════════════════════════════════════
// FLUJO 2 — Selección de perfil con PIN
// ════════════════════════════════════════════════════════════════
if ($check02 === 'act') {

    // Verificar que la sesión base existe
    if (!isset($_SESSION['usuario'])) {
        echo '<script>alert("Sesión no válida."); window.location="../index.php";</script>';
        exit;
    }

    $usuari0   = $_SESSION['usuario'];
    $usuari0_e = mysqli_real_escape_string($conexion, $usuari0);
    $pinusu0_e = mysqli_real_escape_string($conexion, $pinusu0);

    // nomperfil ya fue validado con whitelist arriba
    $validar_perfil = mysqli_query($conexion,
        "SELECT ideusu01, canses01
         FROM usuario
         WHERE corusu01 = '$usuari0_e'
           AND `$nomperfil` = '$pinusu0_e'"
    );

    if (mysqli_num_rows($validar_perfil) > 0) {

        $valores = mysqli_fetch_assoc($validar_perfil);

        // Asignar perfil en sesión
        if ($perfil1 !== '') { $_SESSION['perfil'] = $perfil1; }
        if ($perfil2 !== '') { $_SESSION['perfil'] = $perfil2; }
        if ($perfil3 !== '') { $_SESSION['perfil'] = $perfil3; }

        // Verificar límite de sesiones simultáneas
        $cantlog = $valores['canses01'];
        if ($cantlog !== null) {
            veribd($cantlog);
        }

        insertlog();

    } else {
        echo '<script>alert("PIN incorrecto."); window.location="../index.php";</script>';
        exit;
    }
}

mysqli_close($conexion);
?>
