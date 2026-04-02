<?php
error_reporting(1);
  
$directorio_local = "c:/videos/";
$url_destino = "http://100.109.85.15/trailer/mov/upload.php"; // Suponiendo que tienes un script PHP en esta ruta

$archivos = scandir($directorio_local);

foreach ($archivos as $archivo) {
    if ($archivo != "." && $archivo != ".." && pathinfo($archivo, PATHINFO_EXTENSION) == "mp4") {
        $ruta_local = $directorio_local . $archivo;
       // echo "Ruta local $ruta_local y Ruta Remota $url_destino";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_destino);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ["video" => curl_file_create($ruta_local)]);

        $resultado = curl_exec($ch);
        if (!$resultado) {
            echo "Error al subir el archivo: " . curl_error($ch);
        } else {
            echo "Archivo $archivo subido correctamente.<br>";
        }

        curl_close($ch);
    }
}
?>