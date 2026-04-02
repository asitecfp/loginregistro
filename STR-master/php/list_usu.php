
<!---------------- Consultando Categorias "catcon07" / "idecat07" "nomcat07" ------------------>
<?php

error_reporting(1);
session_start();
date_default_timezone_set('America/Caracas');

///////////FUNCION VERIFICA CANTIDAD DE INICIOS DE SESION DEL USUARIO EN EL DIA ACTUAL///////
function veribd($cantlog){
	$usu=@$_SESSION['usuario'];
	$fechalog=@$_SESSION['fechases'];
	///////////////////////////////////////////////////////////////////////////
	$fechaactual= date("Y")."-".date("m")."-".date("d");
	$objFecha = new DateTime($fechaactual, new DateTimeZone('America/Caracas'));
	$dia= $objFecha->format('d');
	$mes= $objFecha->format('m');
	$anno= $objFecha->format('Y');
	$fechasis="$anno-$mes-$dia";
	///////////////////////////////////////////////////////////////////////////
	$cont1=0;

	$mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
	if ($mysqli->connect_errno) {
		echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

	$resultado = $mysqli->query("SELECT * FROM logses10 WHERE sescor10='$usu' and fecses10='$fechasis'");
								
	$resultado->data_seek(0);
	
	while ($fila = $resultado->fetch_assoc()) {
		$cont1++;
		if ($cont1>=$cantlog){
			insertblo($usu);
			echo'
			
			<script>
				alert("Has alcanzado en número maximo de dispositivos conectados en simultaneo!/n Porfavor notifica a tu proveedor para solicitar mas pantallas.")
				window.location ="../bienvenido.php";
			</script>';
			
			session_unset();
			session_destroy();
			exit();
		}

	}

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////FUNCION INSERTAR REGISTRO EN EL LOG DE USUARIO: ING(INGRESO), BLO(BLOQUEO)/////////////////////////////////////////
function insertlog(){
	$usu=@$_SESSION['usuario'];
	$ip = $_SERVER['client_ADDR'];
	$ch = curl_init('http://ipwho.is/'.$ip);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$ipwhois = json_decode(curl_exec($ch), true);
	curl_close($ch);

	$idsesion = session_id();
	$host = $_SERVER['REMOTE_ADDR'];
	$clientip = $ipwhois['ip'];
	$pais = $ipwhois['country'];
	$fecing= date("Y")."-".date("m")."-".date("d");
	$horing= date("H").":".date("i").":".date("s");
	$conexion = mysqli_connect("localhost", "antonio", "*Lm2638220$", "bnucleds");


	$query2 = "INSERT INTO `logses10` (`idphp10`, `sescor10`, `sesper10`, `dispos10`, `seslug10`, `iplses10`, `iphost10`, `fecses10`, `horses10`, `accion10`) VALUES ('$idsesion', '$usu', 'perfil', 'disposes', '$pais', '$host', '$clientip', '$fecing', '$horing', 'ing')";
	if ($ejecutar2 = mysqli_query($conexion, $query2)){
				
		echo '
			<script>
				//alert("Aute'.session_status().'+	HOST:'.$host.'+IPCLIENTE:'.$clientip.'+GATEWAY'.$_SERVER['GATEWAY_INTERFACE'].'+SERVADDR:'.$_SERVER['SERVER_ADDR'].'+SERVNAM:'.$_SERVER['SERVER_NAME'].'");
				window.location ="../bienvenido.php";
			</script>
			';
	}else{
		echo'
			<script>
				alert("Error insertando registro log_ing")
			</script>';
	}
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////FUNCION INSERTAR REGISTRO EN EL LOG DE USUARIO: ING(INGRESO), BLO(BLOQUEO)/////////////////////////////////////////
function insertblo($usu){
	//$usu=@$_SESSION['usuario'];
	$ip = $_SERVER['client_ADDR'];
	$ch = curl_init('http://ipwho.is/'.$ip);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	$ipwhois = json_decode(curl_exec($ch), true);
	curl_close($ch);

	$host = $_SERVER['REMOTE_ADDR'];
	$clientip = $ipwhois['ip'];
	$pais = $ipwhois['country'];
	$fecing= date("Y")."-".date("m")."-".date("d");
	$horing= date("H").":".date("i").":".date("s");
	$conexion = mysqli_connect("localhost", "antonio", "*Lm2638220$", "bnucleds");
	$query3 = "INSERT INTO `logses10` (`idphp10`, `sescor10`, `sesper10`, `dispos10`, `seslug10`, `iplses10`, `iphost10`, `fecses10`, `horses10`, `accion10`) VALUES ('$idsesion', '$usu', '$nomperfil', 'disposes', '$pais', '$host', '$clientip', '$fecing', '$horing', 'blo')";
			if ($ejecutar = mysqli_query($conexion, $query3)){
				
				echo '
				<script>
					//alert("Aute'.session_status().'+	HOST:'.$host.'+IPCLIENTE:'.$clientip.'+GATEWAY'.$_SERVER['GATEWAY_INTERFACE'].'+SERVADDR:'.$_SERVER['SERVER_ADDR'].'+SERVNAM:'.$_SERVER['SERVER_NAME'].'");
					
					//window.location ="../bienvenido.php";
				</script>
			';
			}else{
				echo'
					<script>
						alert("Error insertando registro log_blo")
					</script>';
			}
		}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////FUNCION VERIFICAR USUARIOS CONECTADOS PHP BATCH PHP TEMP////////////////////////////////////////////////////////////
function veri(){
	$usu=@$_SESSION['usuario'];
	$cont=0;
	$cont2=0;
	//$dia2=0;

	$fechaactual= date("Y")."-".date("m")."-".date("d");
	$objFecha = new DateTime($fechaactual, new DateTimeZone('America/Caracas'));
	$dia= $objFecha->format('d');
	$mes= $objFecha->format('m');
	$anno= $objFecha->format('Y');

	//$dia2=--$dia;

	$fechacompar= ".$anno.'-'.$mes.'-'.$dia.";
		$allSessions = []; 
		$sessionNames = scandir(session_save_path());
		foreach($sessionNames as $sessionName) {
			$sessionName = str_replace("sess_","",$sessionName);
			if(strpos($sessionName,".") === false) { //This skips temp files that aren't sessions 
				if($usu==$_SESSION['usuario']&&$fechaactual==$_SESSION['fechases']||$fechacompar==$_SESSION['fechases']){
					$cont2++;
						if ($cont2>3){
							echo'
							<script>
								alert("Has alcanzado en número maximo de dispositivos conectados en simultaneo!/n Porfavor notifica a tu proveedor para solicitar mas pantallas.")
							</script>';
							session_unset();
							session_destroy();
							exit();
						}
						//$perfact="b8FVr{8dFV5-F$(d5HgT";
						//$perfact="b13nV3gV5-F50rY8dFVT";
						//$UsuPerfil="";
						//$UsuarioSES="";
						//header("location: ../index.php?perfact=".$perfact."");
						//header( 'Location: ../index.php' );
						
						
						//exit;
						//echo'<script>alert("'.$cont2.'+'.$fechaactual.'+'.$_SESSION['fechases'].'");</script>';
						$cont++;
						session_id($sessionName);
						///echo '<h1>Sesion id: '.$sessionName.'</h1>';
						///echo '<h1>Cont:'.$cont.'';
						//echo 'resultado:'.session_id($sessionName).'';
						session_start();
						$allSessions[$sessionName] = $_SESSION['usuario'];
						///echo '<h1>Correo: '.$allSessions[$sessionName] = $_SESSION['usuario'].'</h1>';
						///echo '<h1>Cor: '.$usu.'</h1>';
						session_abort();
				}
					///exit();
					
			}
					/*if($cont2 >= 3){
						echo '<script>
								alert("Has alcanzado el número maximo de dispositivos conectados en simultaneo!/n Porfavor notifica a tu proveedor para solicitar mas pantallas.")
							</script>';
					}*///
		} 
}
function list_usu(){
	$usu=@$_SESSION['usuario'];
	$cont=0;
	$cont2=0;
	//$dia2=0;

	$fechaactual= date("Y")."-".date("m")."-".date("d");
	$objFecha = new DateTime($fechaactual, new DateTimeZone('America/Caracas'));
	$dia= $objFecha->format('d');
	$mes= $objFecha->format('m');
	$anno= $objFecha->format('Y');

	//$dia2=--$dia;

	$fechacompar= ".$anno.'-'.$mes.'-'.$dia.";
	$allSessions = []; 
	$sessionNames = scandir(session_save_path());
	foreach($sessionNames as $sessionName) {
		$sessionName = str_replace("sess_","",$sessionName);
		if(strpos($sessionName,".") === false) { //This skips temp files that aren't sessions 
				
			$cont++;
			session_id($sessionName);
			echo '<h1>Sesion id: '.$sessionName.'</h1>';
			echo '<h1>Cont:'.$cont.'';
			//echo 'resultado:'.session_id($sessionName).'';
			//session_start();
			$allSessions[$sessionName] = $_SESSION['usuario'];
			echo '<h1>Correo: '.$allSessions[$sessionName] = $_SESSION['usuario'].'</h1>';
			//echo '<h1>Cor: '.$usu.'</h1>';
			//session_abort();
			 //session_destroy();
             print_r($allSessions);
		}
	}	 
}
			  
			


?>

