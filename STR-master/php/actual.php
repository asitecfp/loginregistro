<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "antonio";
$password = "*Lm2638220$";
$dbname = "bnucleds";
// Rutas contenido
$ruta_sd_cont = "/d4-e/sd/";
$ruta_hd_cont = "/d4-e/sd/";
$ruta_fhd_cont = "/d3-k/fhd/";
$ruta_qhd_cont = "/d3-k/fhd/";
$ruta_4k_cont = "/d3-k/fhd/";
// Rutas trailer
$ruta_sd_tra = "/trailer/mov/sd/";
$ruta_hd_tra = "/trailer/mov/hd/";
$ruta_fhd_tra = "/trailer/mov/fhd/";
// Rutas imagenes
$ruta_cov_img = "tmp";
$ruta_pri_img = "tmp";
$ruta_cat_img = "tmp";
$ruta_bar_img = "tmp";
// Rutas temporales
$ruta_tmp_1 = "tmp";
$ruta_tmp_2 = "tmp";
$ruta_tmp_3 = "tmp";
$ruta_tmp_4 = "tmp";
$ruta_tmp_5 = "tmp";
//
$fecha = "2023-07-08";
$usuario = "antoniomorenovillamizar@gmail.com";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$i = 340;
 


for ($i = 340; $i < 348; $i++) {
      $sql = "INSERT INTO `maerut19` (`idcont19`, `sdruta19`, `hdruta19`, `fhdrut19`, `4kruta19`, `8kruta19`, `sdrtra19`, `hdrtra19`, `fhdtra19`, `imcrut19`,
                            `imprut19`, `imctru19`, `imbrut19`, `tmpru119`, `tmpru219`, `tmpru319`, `tmpru419`, `tmpru519`, `fecrut19`, `usurut19`) 
                    VALUES ('$i', '$ruta_sd_cont', '$ruta_hd_cont', '$ruta_fhd_cont', '$ruta_qhd_cont', '$ruta_4k_cont', '$ruta_sd_tra', '$ruta_hd_tra',
                             '$ruta_fhd_tra', '$ruta_cov_img', '$ruta_pri_img', '$ruta_cat_img', '$ruta_bar_img', '$ruta_tmp_1', '$ruta_tmp_2', '$ruta_tmp_3',
                              '$ruta_tmp_4', '$ruta_tmp_5', '$fecha', '$usuario')";
    if ( $ejecutar = mysqli_query($conn, $sql)) {
        echo '
    
        <script>
            alert("Capitulo registrado exitosamente");
            window.location = "/home/STR-master/php/capitulos.php";
        </script>
    ';
    
}else{
    echo '
        ("No registro");
        
        
    ';
}
}
// Cerrar la conexión
$conn->close();
?>