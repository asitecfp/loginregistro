<?php
//include "conexion.php";

$slave = mysqli_connect("100.109.85.15", "antonio", "*Lm2638220$", "bnucleds");
$master = mysqli_connect("localhost", "antonio", "*Lm2638220$", "bnucleds");
$differences = "";
$table = "tipsus03";

// Función para obtener la estructura de una tabla
function getTableStructure($conexion, $table) {
    $sql = "SHOW CREATE TABLE `$table`";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_row($result);
    return $row[1];
}

function compareTables($master, $slave, $table) {
    $structure1 = getTableStructure($master, $table);
    $structure2 = getTableStructure($slave, $table);
    echo "Estructura bd 1 $structure1 ";
    // Comparar número de columnas
    $columns1 = count(explode(',', $structure1));
    $columns2 = count(explode(',', $structure2));
    if ($columns1 !== $columns2) {
        echo "Número de columnas diferente en la tabla $table\n'$columns1'";
    }else{
        echo "No existen";
    }

  
    // Expresión regular para extraer información de las columnas (ajustar según sea necesario)
    $pattern = "/`([^`]*)` ([^`]+)/";

    // Extraer información de las columnas y crear arrays asociativos
    preg_match_all($pattern, $structure1, $matches1);
    $columns1 = array_combine($matches1[1], array_combine($matches1[2], $matches1[3]));
    preg_match_all($pattern, $structure2, $matches2);
    $columns2 = array_combine($matches2[1], array_combine($matches2[2], $matches2[3]));

    // Comparar las columnas
    $differences = [];
    foreach ($columns1 as $column => $info1) {
        if (!isset($columns2[$column]) || $columns2[$column] !== $info1) {
            $differences[$column] = [
                'master' => $info1,
                'slave'  => $columns2[$column]
            ];
        }
    }
    foreach ($columns2 as $column => $info2) {
        if (!isset($columns1[$column])) {
            $differences[$column] = [
                'master' => null,
                'slave'  => $info2
            ];
        }
    }

    return $differences;
}

// Ejemplo de uso
$differences = compareTables($master, $slave, $table);
print_r($differences);

// Cerrar las conexiones
// mysqli_close($master);
// mysqli_close($slave);

// Función para crear un respaldo
// function createBackup($pdo, $database) {
//     $dumpCommand = "mysqldump -u $user -p$password $database > backup_$database.sql";
//     exec($dumpCommand);
// }

// ... (resto del código)

// Crear un respaldo antes de realizar cualquier cambio
// createBackup($pdo2, 'db2');

// ... (comparación de tablas y generación de HTML)

// Función para actualizar la base de datos (implementar la lógica de actualización)
// function updateDatabase($pdo2, $differences) {
//     // ... (ejecutar las sentencias ALTER TABLE)
// }