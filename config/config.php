<?php
/**
 * FASE 1 - Configuración centralizada
 * ─────────────────────────────────────────────────────────────
 * ESTE ARCHIVO contiene todas las credenciales del proyecto.
 * NO debe ser accesible desde el navegador (protegido por .htaccess).
 * NO debe subirse a repositorios públicos.
 * ─────────────────────────────────────────────────────────────
 */

// ── Base de datos ─────────────────────────────────────────────
define('DB_HOST',    'localhost');
define('DB_USER',    'antonio');
define('DB_PASS',    '*Lm2638220$');
define('DB_NAME',    'bnucleds');
define('DB_CHARSET', 'utf8mb4');

// ── Correo SMTP ───────────────────────────────────────────────
define('SMTP_HOST',     'smtp.gmail.com');
define('SMTP_PORT',     465);
define('SMTP_USER',     'streaming.pro.gen@gmail.com');
define('SMTP_PASS',     'Lm2638220*');   // ⚠ Cambiar por contraseña de aplicación de Google
define('SMTP_FROM',     'streaming.pro.gen@gmail.com');
define('SMTP_FROM_NAME','Streaming PRO');

// ── Aplicación ────────────────────────────────────────────────
define('APP_NAME',      'Streaming PRO');
define('APP_URL',       'http://localhost/loginregistro');
define('APP_ENV',       'production');   // Cambiado a production para ocultar errores en pantalla

// ── Configuración de errores según entorno ────────────────────
if (APP_ENV === 'production') {
    error_reporting(0);
    ini_set('display_errors', '0');
    ini_set('log_errors',     '1');
    ini_set('error_log',      __DIR__ . '/../logs/app_errors.log');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

// ── Configuración de sesión segura ────────────────────────────
ini_set('session.cookie_httponly', '1');   // Evita acceso JS a la cookie de sesión
ini_set('session.cookie_samesite', 'Strict');
ini_set('session.use_strict_mode', '1');
// ini_set('session.cookie_secure', '1');  // Descomentar cuando se use HTTPS
