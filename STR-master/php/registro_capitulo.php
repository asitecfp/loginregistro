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
include "conexion.php";
include "cargar_datos_in.php";
error_reporting(1);
$numtemp = '';
$idemaecon = '';
$nomcap = '';
$descap = '';
$numcap = '';
$durcap = '';
$fechacap = '';
$usucap = '';
$usucorre='';

$usucorre= $_SESSION['usuario'];

$msj = '';
$msj_cont = 0;

$numtemp = $_POST['num_tempecap'];
$idemaecon = $_POST['ide_conte'];
$nomcap = $_POST['nom_cap'];
$descap = $_POST['des_cap'];
$numcap = $_POST['num_cap'];
$durcap = $_POST['dur_cap'];
$fechaprod = date('Y-m-d');
$usuarioprod = $perfupdat;

//$dircap = "/d3-k/cont/series/";
$dircap = "/".$aliarray[1] .$almarray[1];


/*------Validando campos no esten vacios----------*/
if($_POST['num_tempecap'] == NULL or  $_POST['ide_conte'] == NULL or $_POST['nom_cap'] == NULL 
    or  $_POST['des_cap'] == NULL or $_POST['dur_cap'] == NULL or $_POST['num_cap'] == NULL) {

	echo '
			<script>
				alert("Llene todos los campos, faltan datos");
              
				window.location = "/home/STR-master/php/capitulos.php";
			</script>
		';

	}else{
	
		/*------Creando comando para el registro del capitulo----------*/

		$query = "INSERT INTO `maecap18` (`idtemp18`, `idcont18`, `nomcap18`, `descap18`, `numcap18`, `durcap18`, `viscap18`, `feccap18`, `dircap183`, `status18`, `nivcap18`, `usucap18`)
                                 VALUES ('$numtemp', '$idemaecon', '$nomcap', '$descap', '$numcap', '$durcap', '0', '$fechaprod', '$dircap', 'INC', '1', '$usucorre')";
		
		/*------Validando id no este repetido----------*/
		$validar_id = mysqli_query($conexion, "SELECT * FROM maecap18 WHERE idcont18=$idemaecon AND numcap18='$numcap' AND idtemp18='$numtemp'");

		if(mysqli_num_rows($validar_id) > 0){
			$msj_cont++;
			$mensaje1 = "Este capítulo ya existe para esta temporada";
		}
		/*------------------------------------------------*/
	
        if ($msj_cont > 0) {	
			echo '
				<script>
					alert("No almacenado, este capitulo ya esta registrado, contiene errores o faltan datos");
					window.location = "/home/STR-master/php/capitulos.php";
				</script>
			';
		}else{
			
			if ($ejecutar = mysqli_query($conexion, $query)){
				
				echo '
					<script>
						alert("Capitulo registrado exitosamente");
						window.location = "/home/STR-master/php/capitulos.php";
					</script>
				';
				
			}else{
				echo '
					<script>
						alert("No registro");
					</script>
				';
			}
		}
	
}
mysqli_close($conexion)

?>



