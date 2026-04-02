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
error_reporting(1);

include "Conexion.php";	
$optpre = '';
$guialm = '';
$optprearray = '';
$optprearray =  $_POST['optpre'];
$guialm = $_POST['buttonApr'];
for ($i=0;$i<count($optprearray);$i++) 
      	{ 
      	
        $optpre = $optprearray[$i];
      	} 
$query1 = "SELECT * FROM maecon04 WHERE status04 = 'REV'";
$ejecutar1 = mysqli_query($conexion, $query1);
$resultado1 = mysqli_fetch_assoc($ejecutar1);

if ($resultado1) {
	echo'<script>
		alert("Existe contenido en revision, no puede cambiarse el almacenaminto predeterminado");
		window.location = "invent_rev.php";
	</script>';
	
	mysqli_close($conexion);
	exit;
}

////////////////////////REVISA EL ALMACEN PREDETERMINADO ACUTALMENTE Y LO ACTUALIZA A --0--////////////////////
	$query2 = "SELECT * FROM almser15 WHERE guialm15 = '$guialm' AND prealm15 = 1";
	if ($ejecutar2 = mysqli_query($conexion, $query2)){		
		$query3 = "UPDATE almser15 SET `prealm15` = '0' WHERE guialm15 = '$guialm' AND `prealm15` = 1";
		$ejecutar3 = mysqli_query($conexion, $query3);
	
	}
	
///////////////////////ESTABLECE ALMACEN PREDETERMINADO/////////////////////////////////

if (isset($_POST['optpre'])) {
	

	$query4 = "UPDATE almser15 SET `prealm15` = '1' WHERE `alialm15` = '$optpre'";
		
		if ($ejecutar4 = mysqli_query($conexion, $query4)){		
			echo '
				<script>
					alert("Almacen elegido predeterminado'.$optpre.'")
					window.location = "/home/STR-master/php/almacen.php";
				</script>
			';
		}else{
			echo '
			<script>
				alert("Problemas de almacenamiento")
				window.location = "/home/STR-master/php/almacen.php";
			</script>
			';
		}
	}else{
		echo '
		<script>
			alert("Seleccione un almacen")
			window.location = "/home/STR-master/php/almacen.php";
		</script>
		';
	}
mysqli_close($conexion)
?>