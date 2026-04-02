<!DOCTYPE html>
<html>
<head>
    <title>Nombres de Tablas MySQL</title>
</head>
<body>
    <h1>Nombres de Tablas</h1>
    <?php
    // Datos de conexión a la base de datos (reemplazar con tus datos)
    $servername_master = "localhost";
    $username_master = "antonio";
    $password_master = "*Lm2638220$";
    $dbname_master = "bnucleds";

    $servername_slave = "100.109.85.15";
    $username_slave = "antonio";
    $password_slave = "*Lm2638220$";
    $dbname_slave = "bnucleds";

    // Crear conexión bd master///////////////////////////////////////////////////////////////////////////
    $conn_master = new mysqli($servername_master, $username_master, $password_master, $dbname_master);

    // Verificar conexión master
    if ($conn_master->connect_error) {
        die("Connection failed: " . $conn_master->connect_error); 

    }
     // Consulta para obtener los nombres de las tablas
     $sql_master = "SHOW TABLES";
     $result = $conn_master->query($sql_master);
 
     if ($result->num_rows > 0) {
         echo "<ul>";
         // Recorrer los resultados y mostrar los nombres de las tablas
         while($row = $result->fetch_assoc()) {
             echo "<li>" . $row["Tables_in_" . $dbname_master] . "</li>";
         }
         echo "</ul>";
     } else {
         echo "0 results";
     }
 
     $conn_master->close();

    // Crear conexión bd slave///////////////////////////////////////////////////////////////////////////
    $conn_slave = new mysqli($servername_slave, $username_slave, $password_slave, $dbname_slave);

    // Verificar conexión slave
    if ($conn_slave->connect_error) {
        die("Connection failed: " . $conn_slave->connect_error); 

    }
       // Consulta para obtener los nombres de las tablas
       $sql_slave = "SHOW TABLES";
       $result = $conn_slave->query($sql_slave);
   
       if ($result->num_rows > 0) {
           echo "<ul>";
           // Recorrer los resultados y mostrar los nombres de las tablas
           while($row = $result->fetch_assoc()) {
               echo "<li>" . $row["Tables_in_" . $dbname_slave] . "</li>";
           }
           echo "</ul>";
       } else {
           echo "0 results";
       }
   
       $conn_slave->close();
   
    ?>
</body>
</html>