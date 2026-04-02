<?php
    $perfupdat='';
	$tipousua='';
    $perfupdat = @$_GET['perfupdat'];
	//error_reporting(1);
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
error_reporting(1);
include "conexion.php";


$numtemp = '';
$idemaecon = '';
$nomtemp = '';
$destemp = '';
$durtemp = '';
$fechatemp = '';
$usutemp = '';

$msj = '';
$msj_cont = 0;

$numtemp = $_POST['num_tempe'];
$idemaecon = $_POST['ide_conte'];
$nomtemp = $_POST['nom_temp'];
$destemp = $_POST['des_temp'];
$durtemp = $_POST['dur_temp'];
$fechaprod = date('Y-m-d');
$usuarioprod = $perfupdat;



/*------Validando campos no esten vacios----------*/
if($_POST['num_tempe'] == NULL or  $_POST['ide_conte'] == NULL or $_POST['nom_temp'] == NULL 
    or  $_POST['des_temp'] == NULL or $_POST['dur_temp'] == NULL) {

	echo '
			<script>
				alert("Llene todos los campos, faltan datos '.$numtemp = $_POST['num_tempe'];
                $idemaecon = $_POST['ide_conte'];
                $nomtemp = $_POST['nom_temp'];
                $destemp = $_POST['des_temp'];
                $durtemp = $_POST['dur_temp'];
                $fechaprod = date('Y-m-d');
                $usuarioprod = $perfupdat;'");
				window.location = "/home/STR-master/php/temporadas.php";
			</script>
		';

	}else{
	
		/*------Creando comando para el registro de la temporada----------*/

		$query = "INSERT INTO `maetem17` (`idmaec17`, `nomtem17`, `numtem17`, `captem17`, `destem17`, `durtem17`, `fectem17`, `status17`, `usutem17`)
								 VALUES ('$idemaecon', '$nomtemp', '$numtemp', '0', '$destemp', '$durtemp', '$fechaprod', 'ACT', '$usuarioprod' )";

		/*------------------------------------------------*/
	
        if ($msj_cont > 0) {	
			echo '
				<script>
					alert("No almacenado, esta temporada ya esta registrada, contiene errores o faltan datos");
				</script>
			';
		}else{
			
			if ($ejecutar = mysqli_query($conexion, $query)){
				
				echo '
					<script>
						alert("Temporada asignada exitosamente");
						window.location = "/home/STR-master/php/temporadas.php";
					</script>
				';
				
			}else{
				echo '
					<script>
						alert("No asignada");
					</script>
				';
			}
		}
	
}
mysqli_close($conexion)

?>



