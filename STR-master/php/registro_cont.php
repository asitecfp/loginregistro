<?php
    $perfupdat='';
	$tipousua='';
    $perfupdat = @$_GET['perfupdat'];
	error_reporting(1);
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
include "conexion.php";
include "cargar_datos_in.php";
error_reporting(1);
$idecont = '';
$nombrecont = '';
$nombrecont2 = '';
$tipocontArray = '';
$tipocont = '';
$clasecontArray = '';
$clasecont = '';
$duracont = '';
$fechapro = '';
$fechalan = '';
$categoriacontArray = '';
$categoriacont = '';
$productoracontArray = '';
$productoracont = '';
$servidorcont = '';
$direccioncont = '';
$direcciontrai = '';
$formatocontArray = '';
$formatocont = '';
$calidadcontArray = '';
$calidadcont = '';
$sinopsiscont = '';
$estadocontArray = '';
$estadocont = '';
$mensaje1 = '';
$mensaje2 = '';
$msj = '';
$msj_cont = 0;
$usucorre='';

$usucorre= $_SESSION['usuario'];

$idecont = $_POST['idcont'];
$nombrecont = $_POST['nombre'];
$nombrecont2 = $_POST['nombre2'];
$tipocontArray = $_POST['tipocont'];
$clasecontArray = $_POST['clasecont'];
$duracont = $_POST['duracion'];
$fechapro = $_POST['FechaPro']; 
$fechalan = $_POST['FechaLan'];
$categoriacontArray = $_POST['genero'];
$productoracontArray = $_POST['productora'];
$formatocontArray = $_POST['formato'];
$calidadcontArray = $_POST['calidad'];
$sinopsiscont = $_POST['sinopsis'];
$estadocontArray = $_POST['estado'];

for ($i=0;$i<count($tipocontArray);$i++) 
      	{ 
      	
        $tipocont = $tipocontArray[$i];
      	}  
for ($i=0;$i<count($clasecontArray);$i++) 
      	{ 
      	
        $clasecont = $clasecontArray[$i];
      	} 
for ($i=0;$i<count($categoriacontArray);$i++) 
      	{ 
    
        $categoriacont = $categoriacontArray[$i];
      	} 
for ($i=0;$i<count($productoracontArray);$i++) 
      	{ 
      	
        $productoracont = $productoracontArray[$i];
      	} 
for ($i=0;$i<count($formatocontArray);$i++) 
      	{ 
      
        $formatocont = $formatocontArray[$i];
      	}   
for ($i=0;$i<count($calidadcontArray);$i++) 
      	{ 
     
        $calidadcont = $calidadcontArray[$i];
      	} 
for ($i=0;$i<count($estadocontArray);$i++) 
      	{ 
    
        $estadocont =  $estadocontArray[$i];
      	}
		  

		  
/*------Validando campos no esten vacios----------*/
if($_POST['nombre'] == NULL or  $_POST['nombre2'] == NULL or $_POST['tipocont'] == NULL or  $_POST['clasecont'] == NULL or $_POST['duracion'] == NULL
	or  $_POST['FechaPro'] == NULL or $_POST['FechaLan'] == NULL or  $_POST['genero'] == NULL or $_POST['productora'] == NULL or  $_POST['formato'] == NULL
	or  $_POST['calidad'] == NULL or $_POST['sinopsis'] == NULL or  $_POST['estado'] == NULL) {
	echo '
			<script>
				alert("Llene todos los campos, faltan datos");
				window.location = "/home/SFI-master/products.php";
			</script>
		';

	}else{

		//----------Subiendo Logo al servidor-------------------//
		//$direcDestin = "I:\imagenes\logos/";
		$direcDestin = $letarray[4] .$almarray[4];
		$nombreArchivo = $idecont .".png";
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($nombreArchivo,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["LogoCon"]["tmp_name"]);
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
			if (move_uploaded_file($_FILES["LogoCon"]["tmp_name"], $direcDestin .$nombreArchivo)) {
				echo "the name is ". $nombreArchivo;
				echo "The file ". htmlspecialchars( basename( $_FILES["LogoCon"]["name"])). " has been uploaded.";
			} else {
				$msj_cont++;
				echo "Sorry, there was an error uploading your file.";
			}
		//----------Subiendo Imagen principal al servidor-------------------//
		}
		//$direcDestin2 = "I:\imagenes\prin/";
		$direcDestin2 = $letarray[5] .$almarray[5];
		$nombreArchivo2 = $idecont .".jpg";
		$uploadOk2 = 1;
		$imageFileType2 = strtolower(pathinfo($_FILES["ImagenCon"]["tmp_name"],PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check2 = getimagesize($_FILES["ImagenCon"]["tmp_name"]);
			if($check2 !== false) {
				echo "File is an image - " . $check2["mime"] . ".";
				$uploadOk2 = 1;
			} else {
				echo "File is not an image.";
				$uploadOk2 = 0;
			}
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk2 == 0) {
			$msj_cont++;
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["ImagenCon"]["tmp_name"], $direcDestin2 .$nombreArchivo2)) {
				echo "The file ". htmlspecialchars( basename( $_FILES["ImagenCon"]["name"])). " has been uploaded.";
			} else {
				$msj_cont++;
				echo "Sorry, there was an error uploading your file.";
			}
		}
		//----------Subiendo Cover al servidor-------------------//
		//$direcDestin3 = "I:\imagenes\cover/";
		$direcDestin3 = $letarray[6] .$almarray[6];
		$nombreArchivo3 = $idecont .".jpg";
		$uploadOk3 = 1;
		$imageFileType3 = strtolower(pathinfo(basename($_FILES["CoverCon"]["tmp_name"]),PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check3 = getimagesize($_FILES["CoverCon"]["tmp_name"]);
			if($check3 !== false) {
				echo "File is an image - " . $check3["mime"] . ".";
				$uploadOk3 = 1;
			} else {
				echo "File is not an image.";
				$uploadOk3 = 0;
			}
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk3 == 0) {
			$msj_cont++;
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
			} else {
			if (move_uploaded_file($_FILES["CoverCon"]["tmp_name"], $direcDestin3 .$nombreArchivo3)) {
				echo "The file ". htmlspecialchars( basename( $_FILES["CoverCon"]["name"])). " has been uploaded.";
			} else {
				$msj_cont++;
				echo "Sorry, there was an error uploading your file.";
			}
		}
		/*------Creando comando para el registro del contenido----------*/

		$query = "INSERT INTO `maecon04` (`idecon04`, `nomcon04`, `nomco204`, `tipcon04`, `clacon04`, `durcon04`, `fecpro04`, `feclan04`, `catcon04`, `procon04`,
										`vistas04`, `aprcon04`, `descon04`, `arccon04`, `sercon04`, `dircon04`, `dirtra04`, `forcon04`, `calcon04`, `covcon04`, `precon04`,
										`sincon04`, `status04`, `nivest04`, `usuari04`) VALUES ('$idecont', '$nombrecont', '$nombrecont2', '$tipocont', '$clasecont', '$duracont', '$fechapro', '$fechalan', '$categoriacont', 
										'$productoracont', '0', '0', '0', NULL, NULL, NULL, NULL, '$formatocont', '$calidadcont', NULL, NULL, '$sinopsiscont', '$estadocont', '2', '$usucorre' )";

		/*------Validando id no este repetido----------*/
		$validar_id = mysqli_query($conexion, "SELECT * FROM maecon04 WHERE idecon04='$idecont'");

		if(mysqli_num_rows($validar_id) > 0){
			$msj_cont++;
			$mensaje1 = "ID Repetido";
		}

		/*------Validando Nombre no este repetido----------*/
		$validar_nombre = mysqli_query($conexion, "SELECT * FROM maecon04 WHERE nomcon04='$nombrecont'");

		if(mysqli_num_rows($validar_nombre) > 0){
			$msj_cont++;
			$mensaje2 = "Nombre Repetido";
		}  

		/*------------------------------------------------*/
		if ($msj_cont > 0) {	
			echo '
				<script>
					alert("No almacenado:'.$mensaje1.''. $mensaje2.'")
				</script>
			';
			}else{
				
				if ($ejecutar = mysqli_query($conexion, $query)){		
					echo '
						<script>
							("Contenido almacenado exitosamente")
								window.location = "/home/STR-master/php/products.php";
						</script>
					';
						//$direccionDestino='I:\imagenes\prin\cat/';
						$direccionDestino= $letarray[7] .$almarray[7];
						$direccionOrigen=$direcDestin2;

						$nombrearchivo=$nombreArchivo2;
						$nombrearchivoOrigen=$nombreArchivo2;

						//Parámetros optimización, resolución máxima permitida
						$max_ancho = 360;
						$max_alto = 280;

						$medidasimagen= getimagesize($direccionOrigen .$nombrearchivoOrigen);

						//Si no, se generan nuevas imagenes optimizadas
							
								//Redimensionar
								$rtOriginal=$direccionOrigen .$nombrearchivoOrigen;

								$original = imagecreatefromjpeg($rtOriginal);
								
								list($ancho,$alto)=getimagesize($rtOriginal);

								$x_ratio = $max_ancho / $ancho;
								$y_ratio = $max_alto / $alto;

								if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
									$ancho_final = $ancho;
									$alto_final = $alto;
								}
								else if (($x_ratio * $alto) < $max_alto){
										$alto_final = ceil($x_ratio * $alto);
										$ancho_final = $max_ancho;
								}
									else{
										$ancho_final = ceil($y_ratio * $ancho);
										$alto_final = $max_alto;
									}

								$lienzo=imagecreatetruecolor($ancho_final,$alto_final); 

								imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
						
								//imagedestroy($original);
						
						$cal=8;

						imagejpeg($lienzo,$direccionDestino."/".$nombrearchivo);
						//*************Convertir a webp, calidad 80%, mismo tamaño que original ******************* */
						// Cargar la imagen jpg
						$imagen = imagecreatefromjpeg($direccionDestino."/".$nombrearchivo);

						// Establece la paleta de colores
						imagepalettetotruecolor($imagen);

						// Guardar la imagen como WebP
						imagewebp($imagen, $direccionDestino."/".$idecont.".webp", 80);

						// Liberar memoria
						imagedestroy($imagen);
						//**************************************************************************************** */
						
						
						//*************Convertir a webp, calidad 80%, mismo tamaño que original ******************* */
						// Cargar la imagen jpg
						$imagen2 = imagecreatefromjpeg($direcDestin2."/".$nombreArchivo2);

						// Establece la paleta de colores
						imagepalettetotruecolor($imagen2);

						// Guardar la imagen como WebP
						imagewebp($imagen2, $direcDestin2."/".$idecont.".webp", 80);

						// Liberar memoria
						imagedestroy($imagen2);
						//**************************************************************************************** */

						//*************Convertir a webp, calidad 80%, mismo tamaño que original ******************* */
						// Cargar la imagen jpg
						$imagen3 = imagecreatefromjpeg($direcDestin3."/".$nombreArchivo3);

						// Establece la paleta de colores
						imagepalettetotruecolor($imagen3);

						// Guardar la imagen como WebP
						imagewebp($imagen3, $direcDestin3."/".$idecont.".webp", 80);

						// Liberar memoria
						imagedestroy($imagen3);
				}else{
					echo '
					<script>
						alert("Registro no almacenado, error desconocido")
						//window.location = "/home/STR-master/php/products.php";
					</script>
					';
				}
		
		}
	}
mysqli_close($conexion)

?>