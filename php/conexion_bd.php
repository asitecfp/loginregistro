<?php
/**
 * FASE 1 — Conexión centralizada a la base de datos
 * ─────────────────────────────────────────────────
 * Las credenciales se leen desde config/config.php.
 * Este archivo ya NO contiene credenciales hardcodeadas.
 */

// Cargar configuración central si aún no está cargada
if (!defined('DB_HOST')) {
    require_once __DIR__ . '/../config/config.php';
}

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conexion) {
    // En producción: no exponer detalles del error al navegador
    if (defined('APP_ENV') && APP_ENV === 'production') {
        error_log('Error de conexión MySQL: ' . mysqli_connect_error());
        die('Error de conexión. Contacte al administrador.');
    } else {
        die('Error de conexión MySQL: ' . mysqli_connect_error());
    }
}

// Establecer charset para prevenir ataques por encoding
mysqli_set_charset($conexion, DB_CHARSET);
