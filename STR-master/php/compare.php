<?php
// Configuración de las rutas a las carpetas
$carpetaB = 'I:\imagenes\cover';
$carpetaA = 'I:\imagenes\banner';

// Obtener la lista de archivos en ambas carpetas
$archivosA = scandir($carpetaA);
$archivosB = scandir($carpetaB);

// Comparar y almacenar resultados
$resultados = [];
foreach ($archivosB as $archivo) {
    if ($archivo !== '.' && $archivo !== '..') {
        $resultados[$archivo] = in_array($archivo, $archivosA);
    }
}

// Generar el formulario HTML
echo '<form method="post">';
foreach ($resultados as $archivo => $existe) {
    $clase = $existe ? 'igual' : 'diferente';
    echo "<input type='checkbox' name='archivos[]' value='$archivo'> <span class='$clase'>$archivo</span><br>";
}
echo '<input type="submit" value="Actualizar">';
echo '</form>';

// Procesar la selección del usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $archivosSeleccionados = $_POST['archivos'];
    foreach ($archivosSeleccionados as $archivo) {
        copy("$carpetaB/$archivo", "$carpetaA/$archivo");
    }
}
?>