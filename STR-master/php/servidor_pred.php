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

$ipserv = $_POST['optpredser'];
$optprearray = $_POST['optpredser'];
for ($i=0;$i<count($optprearray);$i++) 
      	{ 
      	
        $optpre = $optprearray[$i];
      	} 
////////////////////////REVISA EL SERVIDOR PREDETERMINADO ACUTALMENTE Y LO ACTUALIZA A --0--////////////////////
	$query = "SELECT * FROM server13 WHERE preser13 = 1";
	if ($ejecutar = mysqli_query($conexion, $query)){		
		$query2 = "UPDATE server13 SET `preser13` = '0' WHERE `preser13` = 1";
		$ejecutar2 = mysqli_query($conexion, $query2);
	
	}
	
///////////////////////ESTABLECE ALMACEN PREDETERMINADO/////////////////////////////////

if (isset($_POST['optpredser'])) {
	

	$query3 = "UPDATE server13 SET `preser13` = '1' WHERE `namser13` = '$optpre'";
		
		if ($ejecutar3 = mysqli_query($conexion, $query3)){		
			echo '
				<script>
					alert("Almacen elegido predeterminado'.$optpre.'")
					window.location = "/home/STR-master/php/servidores.php";
				</script>
			';
		}else{
			echo '
			<script>
				alert("Problemas de almacenamiento")
				window.location = "/home/STR-master/php/servidores.php";
			</script>
			';
		}
	}else{
		echo '
		<script>
			alert("Seleccione un almacen")
			window.location = "/home/STR-master/php/servidores.php";
		</script>
		';
	}
mysqli_close($conexion)
?>