<?php
/**
 * FASE 1 — cerrar_session.php
 * Correcciones aplicadas:
 *  [1] session_unset() antes de session_destroy() para limpiar variables correctamente
 *  [2] Eliminar cookie de sesión del navegador
 *  [3] Agregar cabecera de no-cache para evitar que el navegador muestre páginas cacheadas
 */

session_start();

// [1] Limpiar variables de sesión
session_unset();

// [2] Eliminar la cookie de sesión del navegador
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(), '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// Destruir la sesión en el servidor
session_destroy();

// [3] No cachear esta respuesta
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Pragma: no-cache');
header('Location: ../index.php');
exit;
?>
