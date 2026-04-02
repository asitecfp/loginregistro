<?php 
include "Conexion.php";
include "cargar_datos_in.php";
include "funciones_mas.php";
error_reporting(1);
$idecont_des = '';
$nivel_des = '';

if (isset($_POST['buttonDev'])) {
	$idecont_des = $_POST['buttonDev'];
}

/*------Obtener ruta local para mover contenido---------*/

$filecont = $idecont_des .".mp4";

$direcfile = $letarray[1] .$almarray[1] .$filecont;

$direcfileHD = $letarray[1] .$almarray[1] ."hd/" .$filecont;

$direcfileSD = $letarray[1] .$almarray[1] ."sd/" .$filecont;


if (isset($_POST['nivel1'])) {
$nivel_des = $_POST['nivel1'];
echo '
				<script>
					alert("Este contenido ha sido devuelto'.$idecont_des.''.$nivel_des.'")
					window.location = "/home/STR-master/php/invent_rev_ser.php";
				</script>
			';
}

if (isset($_POST['nivel2'])) {
	$nivel_des = $nivel_des + $_POST['nivel2'];
	
	if (file_exists($direcfile)) {
		unlink($direcfile);
	}else{
		echo '<script> alert("no existe archivo a eliminar'.$direcfile.'"); </script>';
		mysqli_close($conexion);
	exit;
	}

	/*****************HD****************************/
	if (file_exists($direcfileHD)) {
		unlink($direcfileHD);
	}else{
		echo '<script> alert("no existe archivo a eliminar'.$direcfileHD.'"); </script>';
		mysqli_close($conexion);
	exit;
	}

	/*****************SD****************************/
	if (file_exists($direcfileSD)) {
		unlink($direcfileSD);
	}else{
		echo '<script> alert("no existe archivo a eliminar'.$direcfileSD.'"); </script>';
		mysqli_close($conexion);
	exit;
	}

	echo '
					<script>
						alert("Este contenido ha sido devuelto'.$idecont_des.''.$nivel_des.'")
						
					</script>
				';
	}
	
	$query = "UPDATE maecap18 SET `status18` = 'DEV', `nivcap18` = '$nivel_des'  WHERE `idcapi18` = '$idecont_des'";
	
		if ($ejecutar = mysqli_query($conexion, $query)){		
			echo '
				<script>
					alert("Este contenido ha sido devuelto'.$idecont_des.'")
					window.location = "/home/STR-master/php/invent_rev_ser.php";
				</script>
			';
		}else{
			echo '
			<script>
				alert("Problemas al devolver el contenido")
				window.location = "/home/STR-master/php/invent_rev_ser.php";
			</script>
			';
		}
mysqli_close($conexion)
?>