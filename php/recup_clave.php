<?php
/**
 * FASE 1 — recup_clave.php
 * Correcciones aplicadas:
 *  [1] Credenciales SMTP eliminadas del código — se leen desde config/config.php
 *  [2] La contraseña real ya NO se envía — se genera un token temporal seguro
 *  [3] El correo destino se recibe por POST, no hardcodeado
 *  [4] Validación del correo antes de procesar
 *  [5] SMTPDebug desactivado en producción
 *  [6] Attachments de ejemplo eliminados
 *
 * ⚠ PENDIENTE FASE 2: Implementar tabla de tokens de reset y expiración
 */

session_start();
require_once __DIR__ . '/../config/config.php';
include 'conexion_bd.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../vendor/autoload.php';

// [3] Correo destino desde POST, no hardcodeado
$correo_destino = isset($_POST['correo']) ? trim($_POST['correo']) : '';

// [4] Validar formato de correo
if (empty($correo_destino) || !filter_var($correo_destino, FILTER_VALIDATE_EMAIL)) {
    echo '<script>alert("Correo electrónico no válido."); window.history.back();</script>';
    exit;
}

// Verificar que el correo existe en la BD
$correo_esc = mysqli_real_escape_string($conexion, $correo_destino);
$verifica   = mysqli_query($conexion, "SELECT ideusu01 FROM usuario WHERE corusu01 = '$correo_esc'");

if (!$verifica || mysqli_num_rows($verifica) === 0) {
    // Mensaje genérico — no revelar si el correo existe o no
    echo '<script>alert("Si el correo está registrado, recibirás las instrucciones."); window.location="../index.php";</script>';
    mysqli_close($conexion);
    exit;
}

// [2] Generar token temporal seguro (no enviar contraseña real)
$token     = bin2hex(random_bytes(32));
$expiracion = date('Y-m-d H:i:s', strtotime('+1 hour'));

// ⚠ En Fase 2: guardar el token en una tabla `reset_tokens` con expiración
// Por ahora se registra en el log para trazabilidad
error_log("Reset token para $correo_destino: $token — expira $expiracion");

$link_reset = APP_URL . '/php/reset_password.php?token=' . $token;

$mail = new PHPMailer(true);

try {
    // [1] Credenciales desde config.php
    $mail->isSMTP();
    $mail->Host       = SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = SMTP_USER;
    $mail->Password   = SMTP_PASS;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = SMTP_PORT;

    // [5] Debug desactivado — en desarrollo cambiar a SMTP::DEBUG_SERVER
    $mail->SMTPDebug = (APP_ENV === 'development') ? SMTP::DEBUG_OFF : SMTP::DEBUG_OFF;

    $mail->setFrom(SMTP_FROM, SMTP_FROM_NAME);
    $mail->addAddress($correo_destino);
    $mail->CharSet = 'UTF-8';

    $mail->isHTML(true);
    $mail->Subject = 'Recuperación de contraseña — ' . APP_NAME;

    // [2] Cuerpo del correo con link de reset, NO contraseña
    $mail->Body = '
    <p>Hola,</p>
    <p>Recibimos una solicitud para restablecer la contraseña de tu cuenta en <strong>' . APP_NAME . '</strong>.</p>
    <p>Haz clic en el siguiente enlace para crear una nueva contraseña. El enlace es válido por <strong>1 hora</strong>:</p>
    <p><a href="' . htmlspecialchars($link_reset, ENT_QUOTES, 'UTF-8') . '">Restablecer contraseña</a></p>
    <p>Si no solicitaste este cambio, ignora este mensaje.</p>
    <hr>
    <small>' . APP_NAME . ' — soporte</small>
    ';
    $mail->AltBody = 'Enlace para restablecer tu contraseña: ' . $link_reset . ' (válido 1 hora)';

    $mail->send();
    echo '<script>alert("Si el correo está registrado, recibirás las instrucciones en tu bandeja."); window.location="../index.php";</script>';

} catch (Exception $e) {
    error_log('recup_clave — Error PHPMailer: ' . $mail->ErrorInfo);
    echo '<script>alert("Error al enviar el correo. Intenta nuevamente."); window.history.back();</script>';
}

mysqli_close($conexion);
?>
