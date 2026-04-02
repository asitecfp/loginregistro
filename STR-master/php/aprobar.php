<?php
    $perfupdat='';
	$tipousua='';
    $perfupdat = @$_GET['perfupdat'];
	
	
    session_start();
	
	$tipousua= $_SESSION['tipousuario'];
	
	if (($tipousua=='admin')||($tipousua=='contri')){
		echo '
        <script>
           // alert("Administrador de contenido");
           // window.location = "index.php";
        </script>
        ';
	}else{
		echo '
        <script>
            alert("No autorizado");
            window.location = "../../index.php";
        </script>
        ';
	}

    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("Debe iniciar sesión para ver este contenido");
            window.location = "../../index.php";
        </script>
        ';
      
        session_destroy();
        die();
    }        
?>
<?php 
include "Conexion.php";
include "cargar_datos_in.php";
include "funciones_mas.php";
$idecont_apr = '';
$tipcon = '';

if (isset($_POST['buttonApr'])) {
	$idecont_apr = $_POST['buttonApr'];
}
if (isset($_POST['tip_conte'])) {
	$tipcon = $_POST['tip_conte'];
}
/*------Obtener ruta local para mover contenido---------*/

$filecont = $idecont_apr .".mp4";

$direcfile = $letarray[0] .$almarray[0] .$filecont;
$rutadest = $letarray[0] .$almarray[0] ."fhd/" .$filecont;

$direcfiletra = $letarray[3] .$almarray[3] .$filecont;
$rutadesttra = $letarray[3] .$almarray[3] ."fhd/" .$filecont;

/*-----------------Verifica existencia del archivo y lo copia del directorio temp a definitivo--------------*/             
//contenido
if ($tipcon == "Pelicula") {
	if (file_exists($direcfile)) {
		//echo '<script> alert("Origen'.$direcfile.' Destino'.$rutadest.'"); </script>';
		rename($direcfile, $rutadest);
	}else{
		echo '<script> alert("no existe archivo a mover'.$rutadest.'"); </script>';
		//mysqli_close($conexion);
	//exit;
	}
	//trailer
	if (file_exists($direcfiletra)) {
		//echo '<script> alert("Origen'.$direcfile.' Destino'.$rutadest.'"); </script>';
		rename($direcfiletra, $rutadesttra);
	}else{
		echo '<script> alert("no existe archivo a mover'.$rutadesttra.'"); </script>';
		mysqli_close($conexion);
	exit;
	}
}
if ($tipcon == "Serie") {
	//trailer
	if (file_exists($direcfiletra)) {
		//echo '<script> alert("Origen'.$direcfile.' Destino'.$rutadest.'"); </script>';
		rename($direcfiletra, $rutadesttra);
	}else{
		echo '<script> alert("no existe archivo a mover'.$rutadesttra.'"); </script>';
		mysqli_close($conexion);
	exit;
	}
}
	$query = "UPDATE maecon04 SET `status04` = 'ACT' WHERE `idecon04` = '$idecont_apr'";
	
		if ($ejecutar = mysqli_query($conexion, $query)){		
			echo '
				<script>
					alert("Contenido aprobado exitosamente'.$idecont_apr.'")
					window.location = "/home/STR-master/php/review.php";
				</script>
			';
		}else{
			echo '
			<script>
				alert("No aprobado")
				window.location = "/home/STR-master/php/review.php";
			</script>
			';
		}
mysqli_close($conexion)
?>
