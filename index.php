<?php
// FASE 1 — Cargar configuración central (error reporting, sesión segura)
require_once __DIR__ . '/config/config.php';
require __DIR__ . '/vendor/autoload.php';
//session_start();
// use Sinergi\BrowserDetector\Browser;
// use Sinergi\BrowserDetector\Device;
// use Sinergi\BrowserDetector\Os;
// use Sinergi\BrowserDetector\Language;


//include ('vendor/phpbrowserdetectormaster/src/Browser.php');


$nomusu0='';
$corusu0='';
$aliusu0='';
$conusu0='';
$apeusu0='';
$ingusu0='';
$stacue0='';
$perfact='';
$pinful0 = '';
$pinfam0 = 0;
$pininf0 = 0;
$UsuarioSES='';
$UsuPerfil='';
$perfupdat='';
//$mark='';

$nomusu0 = @$_GET['nomusu'];
$corusu0 = @$_GET['corusu'];
$aliusu0 = @$_GET['aliusu'];
$conusu0 = @$_GET['conusu'];
$apeusu0 = @$_GET['apeusu'];
$perfact = @$_GET['perfact'];
$pinful0 = @$_GET['pinful'];
$pinfam0 = @$_GET['pinfam'];
$pininf0 = @$_GET['pininf'];
//$ingusu0 = @$_GET['ingusu'];
$ingusu0= date("Y")."-".date("m")."-".date("d");

if(@$_GET['stacue']!="")
{
	$stacue0 = @$_GET['stacue'];
}else{
	$stacue0='regi';

}

session_start();

    if(isset($_SESSION['usuario'])){
//        header("location: bienvenido.php");
    }
	
	
// 	$browser = new Browser();
// 	$device= new Device();
// 	$os = new Os();
// 	$device = new Device();
// 	$language = new Language();

// echo '<script>alert("'.$browser->getName().''.$browser->get_browser().''.$device->get_Name().'");</script>';

	//if ($browser->getName() === Browser::IE && $browser->getVersion() < 11) {
		//echo 'Please upgrade your browser.';
	//}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Login y registro</title>
	<link rel="stylesheet" href="STR-master/css/normalize.css">
	<link rel="stylesheet" href="STR-master/css/sweetalert2.css">
	<link rel="stylesheet" href="STR-master/css/material.min.css">
	<link rel="stylesheet" href="STR-master/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="STR-master/css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="STR-master/css/main.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="STR-master/js/material.min.js" ></script>
	<script src="STR-master/js/sweetalert2.min.js" ></script>
	<script src="STR-master/js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="STR-master/js/main.js" ></script>
    <link href = "https://fonts.googleapis.com/css2? family = Roboto: ital, wght @ 0,100; 0,300; 0,400; 0,500; 0,700; 0,900; 1,100; 1,300; 1,400; 1,500; 1,700; 1,900 & display = intercambiar "rel =" hoja de estilo ">
	<link rel="manifest" href="/manifest.json">

    <link rel="stylesheet" href="assets/css/estilos.css">
	
<?php
include ('php/funciones_login.php');
//--RUTINA CON INICIO DE SESION
$UsuarioSES=@$_SESSION['usuario'];
$UsuPerfil=@$_SESSION['perfil'];
//$UsuPerfil="Full Perfil";
?>
//--RUTINA SIN INICIO DE SESION
<!--
<form action="php/login_usuario.php" method="POST" class="formulario__login">
<?php
		/*
		$UsuarioSES="antoniomorenovillamizar@gmail.com";
						$UsuPerfil="FullFull Perfil";
						$perfact="b13nV3gV5-F50rY8dFVT";

							if(($UsuarioSES!="")&&($UsuPerfil!="")&&($perfact="b13nV3gV5-F50rY8dFVT")){
								$perfupdat='gS5tGN-5DfBTh5gF5R0t';
									echo '
										<script>
											window.location ="bienvenido.php?perfupdat='.$perfupdat.'";
										</script>';
							}
	*/						
?>
</from>-->
<?php
//---------------------------------------------------


if(($UsuarioSES!="")||($UsuPerfil!=""))
{
//header("location: Bienvenido.php");
}
	//echo '<script>alert("'.$browser->getName().'+'.$device->getName().'+'.$os->getName().'+'.$language->getlanguage().'");</script>';
?>
</head>
<body>
	<main>
		<div class="contenedor__todo">
			<div class="caja__trasera">
				<div class="caja__trasera-login">
					<h3>¿Ya tienes una cuenta?</h3>
					<p>Inicia sesión para entrar en la página</p>
					<button id="btn__iniciar-sesion">Iniciar Sesión</button>
				</div>
				<div class="caja__trasera-registro">
				<img id="logo" src="/logos/logoprov.png" alt="">
					<h3>¿Aún no tienes una cuenta?</h3>
					<p>Registra para que puedas iniciar sesión</p>
					<a href="str.apk" download="str.apk">Descargar Mi Aplicación</a>
					<button id="btn__registro" disabled>Registrarse</button>
				</div>
			</div>

        <div class="contenedor__login-registro">
			<?php
				if(($perfact=="b8FVr{8dFV5-F$(d5HgT")||($UsuarioSES!="")){
			?>
<!--1 FORMULARIO PERFIL USUARIO-->
					<form action="php/login_usuario.php" method="POST" class="formulario__login">
						<?php
							if(($UsuarioSES!="")&&($UsuPerfil!="")&&($perfact!="b13nV3gV5-F50rY8dFVT")){
								$perfupdat='gS5tGN-5DfBTh5gF5R0t';
									echo '
										<script>
											window.location ="bienvenido.php?perfupdat='.$perfupdat.'";
										</script>';
							}
						?>
						<h2>Elige tu Perfil</h2>
						<?php
							//ASIGNO EL VALOR DEL NOMBRE DEL PERFIL
							if(($UsuarioSES!="")&&($UsuPerfil!="")&&($perfact=="b13nV3gV5-F50rY8dFVT")){
								echo '<font size="2">Perfil Actual: '.$UsuPerfil.'</font><br>';
								$PerfilActual="Perfil Actual";
							}
							///////////////////////////////////
						?>
						<input name="pinusu" type="password" maxlength="4" placeholder="PIN. Solo Números." onKeyPress="return solonumeros(event)" onpaste="return false">
						<input type="hidden" placeholder="Correo Electronico" name="correo_usuario01" value="">
						<input type="hidden" placeholder="Contraseña" name="contrasena_usuario01" value="">
						<!-- <input name="check2" type="hidden" value="act">
						<input name="check1" type="hidden" value=""> -->
						<input name="check2"  value="act">
						<input name="check1"  value="">
						<br>
						<div align="center">
							<button name="perfil01" value="Full Perfil">
								<?php
									if(($UsuPerfil=="Full")&&($perfact=="b13nV3gV5-F50rY8dFVT")){
										echo '<img src="assets/imagen/icon/usu.png" width="85" border="0">';
											echo '<br>'.$PerfilActual.'<br>'.$UsuPerfil;
												}else{
											echo '<img src="assets/imagen/icon/usu.png" width="78" border="0">';
										
									}
								?>
								<label>Full</label>
							</button>
							
							<br>
							<button name="perfil02" value="Familiar">
								<?php
									if(($UsuPerfil=="Familiar")&&($perfact=="b13nV3gV5-F50rY8dFVT")){
										echo '<img src="assets/imagen/icon/usu.png" width="85" border="0">';
											echo '<br>'.$PerfilActual.'<br>'.$UsuPerfil;
												}else{
											echo '<img src="assets/imagen/icon/usu.png" width="78" border="0">';
										
									}
								?>
								<label>Familiar</label>
							</button>
							
							<button name="perfil03" value="Infantil">
								<?php
									if(($UsuPerfil=="Infantil")&&($perfact=="b13nV3gV5-F50rY8dFVT")){
										echo '<img src="assets/imagen/icon/usu.png" width="85" border="0">';
											echo '<br>'.$PerfilActual.'<br>'.$UsuPerfil;
												}else{
											echo '<img src="assets/imagen/icon/usu.png" width="78" border="0">';
										
									}
								?>
								<label>Infantil</label>
							</button>
							
						</div>
					</form>
<!--1 FIN FORMULARIO LOGIN USUARIO-->
				<?php
				}else{
				?>
					<form action="php/login_usuario.php" method="POST" class="formulario__login">
						<h2>Iniciar Sesión</h2>
						<input type="text" placeholder="Usuario. Ej.: 14601999" name="correo_usuario01" value="<?php echo htmlspecialchars($corusu0, ENT_QUOTES, 'UTF-8'); ?>" onKeyPress="return email(event)" onpaste="return true" required="required" />
						<input type="password" placeholder="Contraseña" name="contrasena_usuario01" required="required">
						<input name="pinusu" type="hidden" value="">
						<input name="check1" type="hidden" value="act">
						<input name="check2" type="hidden" value="">
						
						<button>Entrar</button>
						<br><br>
						<a href="home.php"><label type="button" name="recupe" class>¿Olvido su contraseña?<label></a>
					</form>
				<?php
				}
				?>
			<form name="f007" action="php/registro_usuario_bd.php" method="POST" class="formulario__registro">
				
				<h2>Registro</h2>
            	Datos Generales
				<input name="nomusu" id="nomusu" value="<?php echo htmlspecialchars($nomusu0, ENT_QUOTES, 'UTF-8'); ?>" type="text" maxlength="50" placeholder="Nombres" required="required" />
            		<br>
            	<input name="apeusu" id="apeusu" value="<?php echo htmlspecialchars($apeusu0, ENT_QUOTES, 'UTF-8'); ?>" type="text" maxlength="40" placeholder="Apellidos" required="required" />
            		<br>
            	<input type="hidden" name="aliusu" id="aliusu" value="<?php echo $aliusu0; ?>" type="text" maxlength="50" placeholder="Usuario (Opcional)" onKeyPress="return sololetras(event)" onpaste="return false"/>
            		<br>
            	<input name="corusu" id="corusu" value="<?php echo htmlspecialchars($corusu0, ENT_QUOTES, 'UTF-8'); ?>" type="text" maxlength="50" placeholder="Correo Electrónico. Ej.: ejemplo@ejemplo.com"  onKeyPress="return email(event)" onpaste="return false"  required="required" onKeyUp="validarcorreo()"/>
            	<input name="corusu2" id="corusu2" type="text" maxlength="50" placeholder="Confirmar Correo Electrónico" 
           			onKeyPress="return email(event)" onpaste="return false"  required="required" 
            			onChange="validarcorreo2()" />
            	<br><br><br>
            	Contraseña
            	<input name="conusu" id="conusu" value="<?php echo $conusu0; ?>" type="password" maxlength="50" placeholder="Contraseña" required="required"
            		onKeyUp="validarcontra()"/>
            	<input name="conusu2" id="conusu2" type="password" maxlength="50" placeholder="Confirmar Contraseña" required="required" 
            		onChange="validarcontra2()"/>
            	            	
				<input  type="hidden"  name="pinful" id="pinful" value="<?php echo $pinful0; ?>" type="password" maxlength="4" placeholder="Pin Full Perfil. Solo Números." onKeyPress="return solonumeros(event)" onpaste="return false"/>
				<input  type="hidden"  name="pinfam" id="pinfam" value="<?php echo $pinfam0; ?>" type="password" maxlength="4" placeholder="Pin Familiar. Solo Números." onKeyPress="return solonumeros(event)" onpaste="return false" />
				<input   type="hidden" name="pininf" id="pininf" value="<?php echo $pininf0; ?>" type="password" maxlength="4" placeholder="Pin Infantil. Solo Números."  onKeyPress="return solonumeros(event)" onpaste="return false"/>
				<br>
				<input name="ingusu" id="ingusu"
					value="<?php echo $ingusu0; ?>" type="hidden" maxlength="10" placeholder="Fecha Ingreso"  />
				<input name="stacue" id="stacue" value="<?php echo $stacue0; ?>" type="hidden" maxlength="20" placeholder="Estado Cuenta"  />
				<button onClick="popUp()">Aceptar</button>
				<input type="hidden" name="r315tRou5US" value="true">
            </form>
        </div>
    </div>
</main>
<script src="assets/js/script.js"></script>
</body>
</html>