<?php
session_start();
include "conexion.php";
//include "validar.php";
$idserver = '';
$nombreser = '';
$ip4server = '';
$ip6server = '';
$desserver = '';
$paiserver = '';
$usuarioser = '';
$fechaser = '';

$msj = '';
$msj_cont = 0;

$ideserver = $_POST['idserver'];
$nombreser = $_POST['nomser'];
$ip4server = $_POST['ipv4ser'];
$ip6server  = $_POST['ipv6ser'];
$desserver = $_POST['desser'];
$paiserver = $_POST['paisser'];
$usuarioser = $_SESSION['usuario'];
$fechaprod = date('Y-m-d');


/*------Validando campos no esten vacios----------*/
if($_POST['idserver'] == NULL or $_POST['nomser'] == NULL or $_POST['ipv4ser'] == NULL or $_POST['ipv6ser'] == NULL or $_POST['desser'] == NULL or $_POST['paisser'] == NULL) {
	echo '
			<script>
				alert("Llene todos los campos, faltan datos");
				//window.location = "/home/STR-master/php/servidores.php";
			</script>
		';

	}else{
		
		/*------Creando comando para el registro del contenido----------*/

		$query = "INSERT INTO `server13` (`idserv13`, `namser13`, `ip4ser13`, `ip6ser13`, `desser13`, `conser13`, `ususer13`, `fecser13`, `preser13`)
         VALUES ('$ideserver', '$nombreser', '$ip4server', '$ip6server', '$desserver', '$paiserver', '$usuarioser', '$fechaprod', '0')";

		/*------Validando id no este repetido----------*/
		$validar_id = mysqli_query($conexion, "SELECT * FROM server13 WHERE idserv13='$ideserver'");

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
    $validar_nomser = mysqli_query($conexion, "SELECT * FROM server13 WHERE namser13='$nombreser'");

    if(mysqli_num_rows($validar_nomser) > 0){
        $msj_cont++;
        $msj = 'Este nombre de servidor ya esta registrado\n';
        echo '
            <script>
                alert("Nombre de servidor ya existe!");
            </script>
            ';
    }  
		/*------Validando IPV4 no este repetido----------*/
		$validar_ipv4 = mysqli_query($conexion, "SELECT * FROM server13 WHERE ip4ser13='$ip4server'");

		if(mysqli_num_rows($validar_ipv4) > 0){
			$msj_cont++;
			$msj = 'Este Servidor ya esta registrado\n';
			echo '
				<script>
					alert("Nombre de Sevidor ya existe!");
				</script>
				';
		}  

		/*------------------------------------------------*/
		if ($msj_cont > 0) {	
			echo '
				<script>
					alert("No almacenado, este servidor ya esta registrado, contiene errores o faltan datos");
				</script>
			';
		}else{
			
			if ($ejecutar = mysqli_query($conexion, $query)){
				
				echo '
					<script>
						alert("Servidor almacenado exitosamente");
						window.location = "/home/STR-master/php/servidores.php";
					</script>
				';
				
			}else{
				echo '
					<script>
						alert("Servidor no almacenado");
						window.location = "/home/STR-master/php/servidores.php";
					</script>
				';
			}
		}
	
}
mysqli_close($conexion)

?>
