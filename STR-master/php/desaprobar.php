<?php 
include "Conexion.php";
include "cargar_datos_in.php";
include "funciones_mas.php";
$idecont_des = '';
$nivel_des = '';
$tipcon = '';

if (isset($_POST['buttonDev'])) {
	$idecont_des = $_POST['buttonDev'];
}
if (isset($_POST['tip_conte'])) {
	$tipcon = $_POST['tip_conte'];
}
/*------Obtener ruta local para mover/eliminar contenido---------*/

$filecont = $idecont_des .".mp4";

/*--Contenido--*//*--Trailer--*/

$direcfile = $letarray[0] .$almarray[0] .$filecont;
$direcfiletra = $letarray[3] .$almarray[3] .$filecont;

$direcfileHD = $letarray[0] .$almarray[0] ."hd/" .$filecont;
$direcfiletraHD = $letarray[3] .$almarray[3] ."hd/" .$filecont;

$direcfileSD = $letarray[0] .$almarray[0] ."sd/" .$filecont;
$direcfiletraSD = $letarray[3] .$almarray[3] ."sd/" .$filecont;

/*--Cover--*//*--Principal--*//*--Cat--*//*--Logo--*//*--JPGE,WEBP--*/

$filejpg = $idecont_des .".jpg"; /*Cover, principal y categoria*/
$fileweb = $idecont_des .".webp"; /*Cover, principal y categoria*/

$filelogo = $idecont_des .".png"; /*Logo*/

$direcovejpg = $letarray[6] .$almarray[6] .$filejpg;
$direcoveweb = $letarray[6] .$almarray[6] .$fileweb;

$direprinjpg = $letarray[5] .$almarray[5] .$filejpg;
$direprinweb = $letarray[5] .$almarray[5] .$fileweb;

$direcatejpg = $letarray[7] .$almarray[7] .$filejpg;
$direcateweb = $letarray[7] .$almarray[7] .$fileweb;

$direlogo = $letarray[4] .$almarray[4] .$filelogo;

/*--------------------------------------------------------*/

if ($tipcon == "Pelicula") {
	if (isset($_POST['nivel1'])) {
		$nivel_des = $_POST['nivel1'];
		
		//Cover jpg/webm**********************************************************************************
		if (file_exists($direcovejpg)) {
			unlink($direcovejpg);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcovejpg.'"); </script>';
			//mysqli_close($conexion);
			//exit;
		}
		if (file_exists($direcoveweb)) {
			unlink($direcoveweb);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcoveweb.'"); </script>';
			//mysqli_close($conexion);
			//exit;
		}
		//************************************************************************************************ */
		//Principal jpg/webm**********************************************************************************
		if (file_exists($direprinjpg)) {
			unlink($direprinjpg);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direprinjpg.'"); </script>';
			//mysqli_close($conexion);
			//exit;
		}
		if (file_exists($direprinweb)) {
			unlink($direprinweb);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direprinweb.'"); </script>';
			//mysqli_close($conexion);
			//exit;
		}
		//************************************************************************************************ */
		//Categoria jpg/webm**********************************************************************************
		if (file_exists($direcatejpg)) {
			unlink($direcatejpg);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcatejpg.'"); </script>';
			//mysqli_close($conexion);
			//exit;
		}
		if (file_exists($direcateweb)) {
			unlink($direcateweb);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcateweb.'"); </script>';
			//mysqli_close($conexion);
			//exit;
		}
		//************************************************************************************************ */
		//Logo png*****************************************************************************************
		if (file_exists($direlogo)) {
			unlink($direlogo);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direlogo.'"); </script>';
			//mysqli_close($conexion);
			//exit;
		}
		//************************************************************************************************ */
		echo '
						<script>
							alert("Este contenido ha sido devuelto'.$idecont_des.''.$nivel_des.'")
							//window.location = "/home/STR-master/php/invent_rev.php";
						</script>
					';
	}
		
	if (isset($_POST['nivel2'])) {
			$nivel_des = $nivel_des + $_POST['nivel2'];
			//**First in convert, fist out. amv */
			//trailer_1
			if (file_exists($direcfiletra)) {
				unlink($direcfiletra);
			}else{
				echo '<script> alert("no existe archivo a eliminar'.$direcfiletra.'"); </script>';
				mysqli_close($conexion);
				exit;
			}
			//trailerSD_2
			if (file_exists($direcfiletraSD)) {
				unlink($direcfiletraSD);
			}else{
				echo '<script> alert("no existe archivo a eliminar'.$direcfiletraSD.'"); </script>';
				
			}
			//trailerHD_3
			if (file_exists($direcfiletraHD)) {
				unlink($direcfiletraHD);
			}else{
				echo '<script> alert("no existe archivo a eliminar'.$direcfiletraHD.'"); </script>';
				
			}
			
			//cont_1
			if (file_exists($direcfile)) {
				unlink($direcfile);
			}else{
				echo '<script> alert("no existe archivo a eliminar'.$direcfile.'"); </script>';
				
			}
			//contSD_2
			if (file_exists($direcfileSD)) {
				unlink($direcfileSD);
			}else{
				echo '<script> alert("no existe archivo a eliminar'.$direcfileSD.'"); </script>';
				
			}
			//contHD_3
			if (file_exists($direcfileHD)) {
				unlink($direcfileHD);
			}else{
				echo '<script> alert("no existe archivo a eliminar'.$direcfileHD.'"); </script>';
				
			}
			echo '
							<script>
								alert("Este contenido ha sido devuelto'.$idecont_des.''.$nivel_des.'")
								//window.location = "/home/STR-master/php/invent_rev.php";
							</script>
						';
			}

}
if ($tipcon == "Serie") {
	if (isset($_POST['nivel1'])) {
		$nivel_des = $_POST['nivel1'];
		
		//Cover jpg/webm**********************************************************************************
		if (file_exists($direcovejpg)) {
			unlink($direcovejpg);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcovejpg.'"); </script>';
		//	mysqli_close($conexion);
			//exit;
		}
		if (file_exists($direcoveweb)) {
			unlink($direcoveweb);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcoveweb.'"); </script>';
		//	mysqli_close($conexion);
			//exit;
		}
		//************************************************************************************************ */
		//Principal jpg/webm**********************************************************************************
		if (file_exists($direprinjpg)) {
			unlink($direprinjpg);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direprinjpg.'"); </script>';
		//	mysqli_close($conexion);
			//exit;
		}
		if (file_exists($direprinweb)) {
			unlink($direprinweb);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direprinweb.'"); </script>';
		//	mysqli_close($conexion);
			//exit;
		}
		//************************************************************************************************ */
		//Categoria jpg/webm**********************************************************************************
		if (file_exists($direcatejpg)) {
			unlink($direcatejpg);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcatejpg.'"); </script>';
		//	mysqli_close($conexion);
			//exit;
		}
		if (file_exists($direcateweb)) {
			unlink($direcateweb);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcateweb.'"); </script>';
		//	mysqli_close($conexion);
			//exit;
		}
		//************************************************************************************************ */
		//Logo png*****************************************************************************************
		if (file_exists($direlogo)) {
			unlink($direlogo);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direlogo.'"); </script>';
		//	mysqli_close($conexion);
			//exit;
		}
		//************************************************************************************************ */
		echo '
						<script>
							alert("Este contenido ha sido devuelto'.$idecont_des.''.$nivel_des.'")
							//window.location = "/home/STR-master/php/invent_rev.php";
						</script>
					';
		
	}
		
	if (isset($_POST['nivel2'])) {
		$nivel_des = $nivel_des + $_POST['nivel2'];
		//trailer_1
		if (file_exists($direcfiletra)) {
			unlink($direcfiletra);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcfiletra.'"); </script>';
		//	mysqli_close($conexion);
			exit;
		}
		//trailerSD_2
		if (file_exists($direcfiletraSD)) {
			unlink($direcfiletraSD);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcfiletraSD.'"); </script>';
			//mysqli_close($conexion);
			
		}
		//trailerHD_3
		if (file_exists($direcfiletraHD)) {
			unlink($direcfiletraHD);
		}else{
			echo '<script> alert("no existe archivo a eliminar'.$direcfiletraHD.'"); </script>';
			//mysqli_close($conexion);
			
		}
		echo '
			<script>
				alert("Este contenido ha sido devuelto'.$idecont_des.''.$nivel_des.'")
				//window.location = "/home/STR-master/php/invent_rev.php";
			</script>
			';
	}

}

	
	$query = "UPDATE maecon04 SET `status04` = 'DEV', `nivest04` = '$nivel_des'  WHERE `idecon04` = '$idecont_des'";
	
		if ($ejecutar = mysqli_query($conexion, $query)){		
			echo '
				<script>
					alert("Este contenido ha sido devuelto'.$idecont_des.'")
					window.location = "/home/STR-master/php/invent_rev.php";
				</script>
			';
		}else{
			echo '
			<script>
				alert("Problemas al devolver el contenido")
				window.location = "/home/STR-master/php/invent_rev.php";
			</script>
			';
		}
mysqli_close($conexion)

?>