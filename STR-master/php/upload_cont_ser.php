<?php
include "conexion.php";
include "cargar_datos_in.php";
include "funciones_mas.php";

$idecon = '';
$estadocont = 'REV';
$msj = '';
$msj_cont = 0;
$ideg=$_GET['idegrilla'];
$estado = "REV";

/*------Creando comando para el registro del contenido----------*/
$direcDestinCSD = "/" .$aliarray[1] .$almarray[1] ."sd" ."/";//ContFHD
$direcDestinCHD =  "/" .$aliarray[1] .$almarray[1] ."hd" ."/";//ContSD

$query = "UPDATE maecap18 SET status18 = '$estadocont', dircap181 = '$direcDestinCSD', dircap182 = '$direcDestinCHD' WHERE idcapi18 = '$ideg'";


				//----------Subiendo contenido al servidor-------------------//
				
				//$direcDestin = "k:\cont\series/";
				$direcDestin = $letarray[1] .$almarray[1];

				$nombreArchivo = $ideg .".mp4";
				$uploadOk = 1;
								
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					$msj_cont++;
					echo "Lo sentimos, su archivo no fue subido.";
					// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["con"]["tmp_name"], $direcDestin .$nombreArchivo)) {
						echo "Contenido ".$nombreArchivo." subió correctamente";
				
					} else {
						$msj_cont++;
						echo "Sorry, there was an error uploading your file.";
					}
				}
      
		
	
		/*------------------------------------------------*/
		if ($msj_cont > 0) {	
			echo "Contiene error";
			mysqli_close($conexion);
			exit;
		}
		
		if ($ejecutar = mysqli_query($conexion, $query)){
			
			echo "Registro actualizado y rutas asignadas";
			$uni_c = $letarray[1];
			$uni_t = $letarray[1];

			$direcDestinCont = $letarray[1] .$almarray[1];//ContFHD'
			
			$comprobar_espacio = ver_space_disk($uni_t, $uni_c);
			
			mysqli_close($conexion);
				
			}else{
				echo '
					<script>
						alert("Contenido no actualizado");
						window.location = "/home/STR-master/php/invent_rev_ser.php";
						//window.location = "../index.php?corusu=";
					</script>
				';
			}
			if ($comprobar_espacio){
				$conversion = convert_ser($ideg, $direcDestinCont);
			} 

?>



