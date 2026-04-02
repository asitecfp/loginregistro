<?php
include "conexion.php";
include "cargar_datos_in.php";
include "funciones_mas.php";
//include "invent_inc.php";

$idecon = '';
$estadocont = 'REV';
$msj = '';
$msj_cont = 0;
$ideg=$_GET['idegrilla'];
$tipcon=$_GET['tipcon'];
$status_now = "REV";
$usucorre="elimar";//$usucorre= $_SESSION['usuario'] ;

/*------Creando comando para el registro del contenido----------*/
				
$direcDestinTraFHD = $almarray[3] ."fhd" ."/";//TraiFHD
$direcDestinTraHD = $almarray[3] ."hd" ."/";//TraiHD
$direcDestinTraSD =  $almarray[3] ."sd" ."/";//TraiSD

$direcDestinConFHD = "/" .$aliarray[0] .$almarray[0] ."fhd" ."/";//ContFHD
$direcDestinConHD = "/" .$aliarray[0] .$almarray[0] ."hd" ."/";//ContHD
$direcDestinConSD =  "/" .$aliarray[0] .$almarray[0] ."sd" ."/";//ContSD

$direcDestinIL = $almarray[4];//Imagen Logo
$direcDestinIP = $almarray[5];//Imagen Principal
$direcDestinICO = $almarray[6];//Imagen Cover
$direcDestinICA = $almarray[7];//Imagen Categoria
$fechar = "2023/08/22";//Fecha registro

$query = "UPDATE maecon04 SET status04 = '$estadocont', dircon04 = '/$aliarray[0]$almarray[0]', dirtra04 = '/$aliarray[3]$almarray[3]' WHERE idecon04 = '$ideg'";
$query2 = "INSERT INTO maerut19 (`idcont19`, `sdruta19`, `hdruta19`, `fhdrut19`, `4kruta19`, `8kruta19`, `sdrtra19`, `hdrtra19`,
								 `fhdtra19`, `imcrut19`, `imprut19`, `imctru19`, `imbrut19`, `tmpru119`, `tmpru219`, `tmpru319`, `tmpru419`,
								 `tmpru519`, `fecrut19`, `usurut19`) VALUES 
								 ('$ideg','$direcDestinConSD','$direcDestinConHD','$direcDestinConFHD',NULL,NULL,'$direcDestinTraSD','$direcDestinTraHD','$direcDestinTraFHD','$direcDestinICO','$direcDestinIP',
								 '$direcDestinICA','$direcDestinICA',NULL,NULL,NULL,NULL,NULL,'$fechar','$usucorre')";
		
if ($tipcon == "Serie") {		
		//----------Subiendo trailer al servidor-------------------//
		
        $direcDestinT = $letarray[3] .$almarray[3]; //Trailer
				
		$nombreArchivo = $ideg .".mp4";
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($nombreArchivo,PATHINFO_EXTENSION));
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["tra"]["tmp_name"]);
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
			echo "Lo sentimos, su archivo no fue subido. <br>";
			// if everything is ok, try to upload file
		} else {
		if (move_uploaded_file($_FILES["tra"]["tmp_name"], $direcDestinT .$nombreArchivo)) {
			echo "Trailer ".$nombreArchivo." subió correctamente <br>";
			if ($ejecutar = mysqli_query($conexion, $query) && ($resultado = mysqli_query($conexion, $query2)) !== false) {
				echo "Registro actualizado y rutas asignadas";
				$uni_t = $letarray[3];
				$uni_c = $letarray[0];
				ver_space_disk($uni_t, $uni_c);
				$conversion = convert($ideg, $direcDestinT);
				mysqli_close($conexion);
			}
		} else {
			$msj_cont++;
			echo "Sorry, there was an error uploading your file. <br>";
		}
	}
}
if ( isset($_POST['trail']) ) {
	
}
		if ($tipcon == "Pelicula") {
				//----------Subiendo trailer al servidor-------------------//
		
				$direcDestinT = $letarray[3] .$almarray[3]; //Trailer
				
				$nombreArchivo = $ideg .".mp4";
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($nombreArchivo,PATHINFO_EXTENSION));
					// Check if image file is a actual image or fake image
					if(isset($_POST["submit"])) {
						$check = getimagesize($_FILES["tra"]["tmp_name"]);
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
					echo "Lo sentimos, su archivo no fue subido. <br>";
					// if everything is ok, try to upload file
				} else {
				if (move_uploaded_file($_FILES["tra"]["tmp_name"], $direcDestinT .$nombreArchivo)) {
					echo "Trailer ".$nombreArchivo." subió correctamente <br>";
					//echo "The file ". htmlspecialchars( basename( $_FILES["tra"]["name"])). " has been uploaded.";
				} else {
					$msj_cont++;
					echo "Sorry, there was an error uploading your file. <br>";
				}
			}
				//----------Subiendo contenido al servidor-------------------//
				//$direcDestin = "k:\cont\mov/";
				
				$direcDestinC = $letarray[0] .$almarray[0]; //Contenido
				$nombreArchivo = $ideg .".mp4";
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($nombreArchivo,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["con"]["tmp_name"]);
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
					echo "Lo sentimos, su archivo no fue subido.";
					// if everything is ok, try to upload file
				} else {
				if (move_uploaded_file($_FILES["con"]["tmp_name"], $direcDestinC .$nombreArchivo)) {
					echo "Contenido ".$nombreArchivo." subió correctamente <br>";
						if ($ejecutar = mysqli_query($conexion, $query) && ($resultado = mysqli_query($conexion, $query2)) !== false) {
							echo "Registro actualizado y rutas asignadas";
							$uni_t = $letarray[3];
							$uni_c = $letarray[0];
							ver_space_disk($uni_t, $uni_c);
							$conversion = convert($ideg, $direcDestinC, $direcDestinT);
							mysqli_close($conexion);
						}
				} else {
					$msj_cont++;
					echo "Sorry, there was an error uploading your file.";
				}
			
				}
			}
		
		if ($msj_cont > 0) {	
			echo "Contiene error";
			mysqli_close($conexion);
		}
		
	
?>



