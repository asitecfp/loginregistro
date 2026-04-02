<?php
////clearstatcache();
////require_once 'vendor/autoload.php';

////use FFMpeg\FFMpeg;

// ...

////$ffmpeg = FFMpeg::create();

// ...

// Función para verificar la existencia y estado del archivo
function verificarArchivo($id, $ruta) {
  $estado = "";
  $icono = "";

  // Verificar si el archivo existe
  if (file_exists($ruta)) {
    $estado = "Existe";

  } else {
    $estado = "No existe";
    $icono = "<i class='fas fa-times-circle text-danger'></i>";
  }

  return [
    "id" => $id,
    "ruta" => $ruta,
    "estado" => $estado,
    "icono" => $icono,
  ];
}

// Arreglo de archivos para verificar
$archivos = [
  [
    "id" => 1,
    "ruta" => "L:\cont\series/fhd/480.mp4",
  ],
  [
    "id" => 2,
    "ruta" => "2.mp4",
  ],
  [
    "id" => 3,
    "ruta" => "3.mp4",
  ],
  [
    "id" => 4,
    "ruta" => "4.mp4",
  ],
  [
    "id" => 5,
    "ruta" => "5.mp4",
  ],
  [
    "id" => 6,
    "ruta" => "6.mp4",
  ],
  // ...
];

// Generar la tabla
echo "<table class='table table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>Ruta</th>";
echo "<th>Estado</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($archivos as $archivo) {
  $resultado = verificarArchivo($archivo["id"], $archivo["ruta"]);

  echo "<tr>";
  echo "<td>" . $resultado["id"] . "</td>";
  echo "<td>" . $resultado["ruta"] . "</td>";
  echo "<td>" . $resultado["icono"] . " " . $resultado["estado"] . "</td>";
  echo "</tr>";
}

echo "</tbody>";
echo "</table>";

?>
