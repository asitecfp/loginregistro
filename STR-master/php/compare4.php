<?php
//include "conexion.php";

$slave = mysqli_connect("100.109.85.15", "antonio", "*Lm2638220$", "bnucleds");
$master = mysqli_connect("localhost", "antonio", "*Lm2638220$", "bnucleds");
$differences = "";
$table = "tipsus03";

function compareColumnNames($master, $slave, $table) {
     // Obtener los nombres de las columnas de ambas tablas
    $result1 = mysqli_query($master, "SHOW COLUMNS FROM $table");
    $result2 = mysqli_query($slave, "SHOW COLUMNS FROM $table");
    print_r($result1);

    // Verificar si los resultados son arrays
//  if (!is_array($result1) || !is_array($result2)) {
//     echo "Error: Los resultados de la consulta no son arrays.\n";
//     return;
// }
     // Convertir a arrays si necesario (si los resultados son objetos)
//  $columns1 = (array) array_column($result1, 'Field');
//  $columns2 = (array) array_column($result2, 'Field');
    // Obtener los nombres de las columnas de ambas tablas
    //$result1 = mysqli_query($master, "SHOW COLUMNS FROM $table");
    $columns1 = array_column($result1, 'field');

    //$result2 = mysqli_query($slave, "SHOW COLUMNS FROM $table");
    $columns2 = array_column($result2, 'FIELD');

    // Convertir los arrays en conjuntos para una comparación más eficiente
    $set1 = array_flip($columns1);
    $set2 = array_flip($columns2);

    // Encontrar las diferencias utilizando operaciones de conjuntos
    $onlyIn1 = array_diff_key($set1, $set2);
    $onlyIn2 = array_diff_key($set2, $set1);

    // Combinar las diferencias y devolverlas
    $differences = array_merge(array_keys($onlyIn1), array_keys($onlyIn2));
    return $differences;
}

$differences = compareColumnNames($master, $slave, $table);
if (!empty($differences)) {
    echo "Las siguientes columnas son diferentes:\n";
    print_r($differences);
} else {
    echo "Las tablas tienen las mismas columnas.\n";
}




 






?>