<?php
error_reporting(1);
include "cargar_datos_in.php";



// Función para verificar la existencia y estado del archivo
function verificarArchivo($id, $ruta_review) {
  $estado = "";
  $ruta = $ruta_review . $id . ".mp4";
  // Verificar si el archivo existe
  if (file_exists($ruta)) {
    $estado = "Existe";
  
  } else {
    $estado = "No existe";
    }

  return [
    "id" => $id,
    "estado" => $estado,
    "ruta" => $ruta,
    "rr" => $ruta_review,
  ];
}


?>