<?php 
error_reporting(1);
include "Conexion.php";
include "cargar_datos_in.php";
include "funciones_mas.php";
$idecont_apr = '';
$dirupdate_HD = '';
$direcfile = '';
$filecont = '';
$rutadest = '';

if (isset($_POST['buttonApr'])&&($_POST['diractu'])) {
	$idecont_apr = $_POST['buttonApr'];
	$dirupdate_HD = $_POST['diractu'] .'fhd/';
}
/*------Obtener ruta local para mover contenido---------*/

$filecont = $idecont_apr .".mp4";
$direcfile = $letarray[1] .$almarray[1] .$filecont;
$rutadest = $letarray[1] .$almarray[1] ."fhd/" .$filecont;

/*------Creando comando para el registro del contenido----------*/

$queryUpd = "UPDATE maecap18 SET `status18` = 'ACT', dircap183 = '$dirupdate_HD' WHERE `idcapi18` = '$idecont_apr'";

/*-----------------Verifica existencia del archivo y lo copia del directorio temp a definitivo--------------*/

if (file_exists($direcfile)) {
	//echo '<script> alert("Origen'.$direcfile.' Destino'.$rutadest.'"); </script>';
	rename($direcfile, $rutadest);
}else{
	echo '<script> alert("no existe archivo a mover'.$rutadest.'"); </script>';
	mysqli_close($conexion);
	exit;
}

/*--------------------Almacena el query----------------------*/		
		if ($ejecutar = mysqli_query($conexion, $queryUpd)){		
			echo '
				<script>
					alert("Contenido aprobado exitosamente'.$idecont_apr.'")
					window.location = "/home/STR-master/php/invent_rev_ser.php";
				</script>
			';
		}else{
			echo '
			<script>
				alert("Problemas de almacenamiento")
				window.location = "/home/STR-master/php/invent_rev_ser.php";
			</script>
			';
		}
mysqli_close($conexion)
?>