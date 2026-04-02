<?php

// Obtener el valor de IP
//$ip = $_POST["ip"];
$ip = "192.168.100.63";
error_reporting(1);
//$ip = "100.109.85.15";
//$mysqli2 = new mysqli('192.168.100.63', 'antonio', '*Lm2638220$', 'bnucleds');

// Realizar la consulta a la base de datos
// $query = "SELECT * FROM `maecon04` WHERE 1";
// $resultado = mysqli_query($mysqli2, $query);


// // Mostrar los resultados de la consulta
// if ($resultado) {

//   echo json_encode($resultado);
  
//     echo "<table>";
//     while ($registro = mysqli_fetch_array($resultado)) {
    
//       echo "<tr>";
//       echo '<td class="mdl-data-table__cell--non-numeric">'.$registro['idecon04'].'</td>';
//       echo "<td>" . $registro["nomcon04"] . "</td>";
//       echo "<td>" . $registro["tipcon04"] . "</td>";
//       echo "<td>" . $registro["durcon04"] . "</td>";
//       echo "<td>" . $registro["procon04"] . "</td>";
//       echo "<td>" . $registro["status04"] . "</td>";
//       echo "</tr>";
//     }
//     echo "</table>";
// } else {
//   echo "No se encontraron resultados";
// }

// $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
//         if ($mysqli->connect_errno) {
//             echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
//         }

// $resultado = $mysqli->QUERY("SELECT idecon04, nomcon04, dircon04, procon04, sercon04, arccon04, precon04, covcon04, dirtra04, sincon04, status04, feclan04 FROM maecon04 WHERE status04='ACT' ORDER BY RAND() LIMIT 30");
// $resultado->data_seek(0);
// $guia2 = "";
// $cat = "";

// while ($registro = $resultado->fetch_assoc()) {
//   $contenidoid = $registro['idecon04'];
//   echo json_encode($resultado);
  
//        echo "<table>";
       
      
//          echo "<tr>";
//          echo '<td class="mdl-data-table__cell--non-numeric">'.$registro['idecon04'].'</td>';
//          echo "<td>" . $registro["nomcon04"] . "</td>";
//          //echo "<td>" . $registro["tipcon04"] . "</td>";
//         // echo "<td>" . $registro["durcon04"] . "</td>";
//          echo "<td>" . $registro["procon04"] . "</td>";
//          echo "<td>" . $registro["status04"] . "</td>";
//    "</tr>";
//        }

// echo "</table>";

$mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    exit;
}

$resultado = $mysqli->query("SELECT idecon04, nomcon04, dircon04, procon04, sercon04, arccon04, precon04, covcon04, dirtra04, sincon04, status04, feclan04 FROM maecon04 WHERE status04='ACT' ORDER BY RAND() LIMIT 30");

$jsonData = []; // Array to store JSON objects for each row

while ($registro = $resultado->fetch_assoc()) {
    $rowJSON = [
        "Id" => $registro['idecon04'],
        "Nombre" => $registro["nomcon04"],
        // Include other fields as needed
        "Productora" => $registro["procon04"],
        "Estado" => $registro["status04"],
    ];

    $jsonData[] = $rowJSON; // Add the row's JSON object to the array
}

echo json_encode($jsonData); // Encode the entire JSON array

?>