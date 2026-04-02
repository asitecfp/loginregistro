<?php
include "conexion.php";
include "cargar_datos_in.php";
//error_reporting(1);
$ideprod = '';
$nombreprod = '';
$usuarioprod = '';
$fechaprod = '';

$msj = '';
$msj_cont = 0;

$ideprod = $_POST['idprod'];
$nombreprod = $_POST['nombre'];
$usuarioprod = "admin";
$fechaprod = "2022-10-10";


/*------Validando campos no esten vacios----------*/
if($_POST['nombre'] == NULL) {
	echo '
			<script>
				alert("Llene todos los campos, faltan datos");
				window.location = "/home/STR-master/php/productoras.php";
			</script>
		';

	}else{
		//----------Subiendo Logo al servidor-------------------//
		//$direcDestin = "I:\imagenes\logos/";
		$direcDestin = $letarray[4] .$almarray[4];
		$nombreArchivo = $nombreprod .".png";
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($nombreArchivo,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["LogoPro"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$msj_cont++;
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["LogoPro"]["tmp_name"], $direcDestin .$nombreArchivo)) {
				echo "the name is ". $nombreArchivo;
				echo "The file ". htmlspecialchars( basename( $_FILES["LogoPro"]["name"])). " has been uploaded.";
			} else {
				$msj_cont++;
				echo "Sorry, there was an error uploading your file.";
			}
		}
		/*------Creando comando para el registro del contenido----------*/

		$query = "INSERT INTO `procon12` (`idecon12`, `nomtip12`, `usutip12`, `fectip12`) VALUES ('$ideprod', '$nombreprod', '$usuarioprod', '$fechaprod')";

		/*------Validando id no este repetido----------*/
		$validar_id = mysqli_query($conexion, "SELECT * FROM procon12 WHERE idecon12='$ideprod'");

		if(mysqli_num_rows($validar_id) > 0){
			$msj_cont++;
			$msj = 'Este id ya esta registrado\n';
			echo '
				<script>
					alert("id repedito");
				</script>
			';
		}

		/*------Validando Nombre no este repetido----------*/
		$validar_nombre = mysqli_query($conexion, "SELECT * FROM procon12 WHERE nomtip12='$nombreprod'");

		if(mysqli_num_rows($validar_nombre) > 0){
			$msj_cont++;
			$msj = 'Esta productora ya esta registrada\n';
			echo '
				<script>
					alert("Nombre de productora ya existe!");
				</script>
				';
		}  

		/*------------------------------------------------*/
		if ($msj_cont > 0) {	
			echo '
				<script>
					alert("No almacenado, esta productora ya esta registrada, contiene errores o faltan datos");
				</script>
			';
		}else{
			
			if ($ejecutar = mysqli_query($conexion, $query)){
				
				echo '
					<script>
						alert("Productora almacenada exitosamente");
						window.location = "/home/STR-master/php/productoras.php";
					</script>
				';
				
			}else{
				echo '
					<script>
						alert("Productora no almacenada");
					</script>
				';
			}
		}
	
}
mysqli_close($conexion)
//antonio v2
?>



