<?php 
error_reporting(1);

include "Conexion.php";	
$optpre = '';
$guialm = '';
$optprearray = '';
$optprearray =  $_POST['optpre'];
$guialm = $_POST['buttonApr'];
for ($i=0;$i<count($optprearray);$i++) 
      	{ 
      	
        $optpre = $optprearray[$i];
      	} 
$query1 = "SELECT * FROM maecon04 WHERE status04 = 'REV'";
if ($ejecutar1 = mysqli_query($conexion, $query1)){
	echo'<script>alert("Existe contenido en revision, no puede cambiarse el almacenaminto predeterminado");</script>';
}else{echo'<script>alert("");</script>';
}
?>