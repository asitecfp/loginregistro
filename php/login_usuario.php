<?php
    session_start();
	error_reporting(1);
    include 'conexion_bd.php';
	
	include ('../str-master/php/list_usu.php');
	date_default_timezone_set('America/Caracas');
	
//DECLARO VARIABLES
	$correo =  '';
	$contrasena =  '';
	$tipusu = '';
    $perfil1 =  '';
    $perfil2 =  '';
    $perfil3 =  '';
    $pinusu0 =  '';
    $nomperfil = '';
	$pinusu0 = '';
	$check01 = '';
	$check02 = '';
	$idsesion = '';
//IGUALO VARIABLES DEL FORMULARIO DE INICIO DE SESIÓN Y PERFIL
	$correo = $_POST['correo_usuario01'];
	$contrasena = $_POST['contrasena_usuario01'];
    $perfil1 = $_POST['perfil01'];
    $perfil2 = $_POST['perfil02'];
    $perfil3 = $_POST['perfil03'];
/* 	$perfil1 = "Full Perfil";
    $perfil2 = "Familiar";
    $perfil3 = "Infantil"; */
    $pinusu0 = $_POST['pinusu'];
    $check01 = $_POST['check1'];
	$check02 = $_POST['check2'];       
		if($perfil1!=""){$nomperfil = "pinful01";}
       	if($perfil2!=""){$nomperfil = "pinfam01";}
       	if($perfil3!=""){$nomperfil = "pininf01";}

	$perfact="b8FVr{8dFV5-F$(d5HgT";
	$idsesion = session_id();
	$fechaactual= date("Y")."-".date("m")."-".date("d");
	//echo '<script>
	//alert("'.$idsesion.'");
	
	//</script>';
	//get_browser_name($user_agent);
	//veri();


//CONDICIONO PARA ELEGIR LA CONSULTA DEL USUARIO O LA DEL PERFIL

if($check01=="act")
{
    $validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE
                                             corusu01='$correo' and conusu01='$contrasena'");
	
	
	if(mysqli_num_rows($validar_login) > 0){
		
		$validar_status = mysqli_query($conexion, "SELECT * FROM usuario WHERE
		corusu01='$correo' and conusu01='$contrasena' and stausu01='activo'");
		
		$fila = $validar_status->fetch_assoc();

		if (mysqli_num_rows($validar_status) > 0){
			
			$tipusu = $fila['tipcue01'];

 			$_SESSION['usuario'] = $correo;
			$_SESSION['perfil']="";
			$_SESSION['perfilcontador']=0;
			$_SESSION['tipousuario']= $tipusu;
			$_SESSION['fechases']=$fechaactual;

			header("location: ../index.php?perfact=".$perfact."");

			
		}else{
			
				echo '
							<script>
						alert("Verifique el estado de su Cuenta, Usuario Inactivo o Suspendido!");
						window.location ="../index.php";
					</script>
				';
		}
		exit();
	}else{
		echo '
			<script>
				alert("Usuario o contraseña inválida");
				window.location ="../index.php";
			</script>
		';
    }    
}
//CONDICIONO PARA ELEGIR LA CONSULTA DEL USUARIO O LA DEL PERFIL
				
													
if($check02=="act")
{
	$usuari0 = $_SESSION['usuario'];
    $validar_perfil = mysqli_query($conexion, "SELECT * FROM usuario WHERE 
	corusu01='$usuari0' and ".$nomperfil."='$pinusu0'");
	
	$valores = $validar_perfil->fetch_assoc();
	//$idecont = $valores['idecon04'];

	if(mysqli_num_rows($validar_perfil) > "0")
	
		{
			
			if($perfil1!="")
			{$_SESSION['perfil'] = $perfil1;}
			if($perfil2!="")
			{$_SESSION['perfil'] = $perfil2;}
			if($perfil3!="")
			{$_SESSION['perfil'] = $perfil3;}


		$cantlog = $valores['canses01'];
		if ($valores['canses01'] <> NULL){
			veribd($cantlog);
		}
			
			insertlog();
			
													
	}else{
		$perfact="b13nV3gV5-F50rY8dFVT";
		echo '
			<script>
				alert("Verifique Pin o Perfil");
			window.location ="../index.php";
				//window.location ="../index.php?perfact='.$perfact.'";
			</script>
		';
	}

}
?>

