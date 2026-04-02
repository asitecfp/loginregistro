<?php
$nomusu0='';
$corusu0='';
$aliusu0='';
$conusu0='';
$apeusu0='';
$ingusu0='';
$stacue0='';
$perfact='';
$pinful0 = 0;
$pinfam0 = 0;
$pininf0 = 0;
$UsuarioSES='';
$UsuPerfil='';
$perfupdat='';

//++++++++++++++++++++++++++++++++++++++++++++++
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña y Pines</title>

    <link href = "https://fonts.googleapis.com/css2? family = Roboto: ital, wght @ 0,100; 0,300; 0,400; 0,500; 0,700; 0,900; 1,100; 1,300; 1,400; 1,500; 1,700; 1,900 & display = intercambiar "rel =" hoja de estilo ">

    <link rel="stylesheet" href="assets/css/estilos.css">
<?php
include ('funciones_login.php');
$UsuarioSES=@$_SESSION['usuario'];
$UsuPerfil=@$_SESSION['perfil'];
if(($UsuarioSES!="")||($UsuPerfil!=""))
{
//header("location: Bienvenido.php");
}
?>
</head>
<body>
	<main>
	<div class="contenedor__todo">
		<div class="caja__trasera">
			<div class="caja__trasera-login">
				<h3>¿Cambiar Pines de Perfil?</h3>
				<p>Debes Coloca:<br>
                -Tu usuario.<br>
                -Tu contraseña actual.<br>
                -Tu Pin Full Perfil .<br>
                -Tu Pin Perfil Familiar .<br>
                -Tu Pin Perfil Infantil.<br>
                <br><br>
                Para Cambiar la Contraseña.
				<button id="btn__iniciar-sesion">Cambiar Contraseña. </button>
            </div>
			<div class="caja__trasera-registro">
				<h3>¿Cambiar Contraseña?</h3>
				<p>Debes Colocar:<br>
                -Tu usuario.<br>
                -Tu contraseña actual.<br>
                -Tu contraseña nueva.<br>
                -Y Confirmar la contraseña nueva.</p>
                <br><br>
                Para Cambiar los Pines de Perfil..
				<button id="btn__registro">Cambiar Pines</button>
			</div>
		</div>
        <div class="contenedor__login-registro">
			<?php
			if(isset($_SESSION['usuario'])){
//				header("location: bienvenido.php");
			}
			
			//$perfact="dHc4m81Ar-c0ntR4p1Nu";
			if(($perfact!="dHc4m81Ar-c0ntR4p1Nu")||($UsuarioSES==""))
			{
				$perfact="dHc4m81Ar-c0ntR4p1Nu";
				echo '
					<script>
						alert("Debe iniciar sesión e ingresar desde tu Perfil para:\n-Cambiar Contraseña.\n-Cambiar Pines de Perfil.");
						//window.location ="../index.php";
						window.location ="../index.php?perfact='.$perfact.'";
						//window.location ="contrapin_update.php?perfact='.$perfact.'";
						//window.location ="perfil.php";
					</script>
				';
			}else{
			?>
			<form action="update_contrapin_bd.php" method="POST" class="formulario__login">
				<?php
				//echo "<br>555perfact... ".$perfact."<br>";
				//echo 'Usuario '.$UsuarioSES.'<br>';
				//echo 'UsuPerfil '.$UsuPerfil.'<br>';
				?>
				<h2>Cambiar Contraseña</h2>
                Usuario
				<input name="aliusu" id="aliusu" type="text" maxlength="50" placeholder="Usuario. Ej.: Gerardo09" onKeyPress="return sololetras(event)" onpaste="return false" required="required" />
				<br><br><br>
                Contraseña actual
				<input name="conusuactu" id="conusuactu_00" type="password" maxlength="50" placeholder="Contraseña actual" required="required" />
                <img name="ver_pass_00" id="ver_pass_00" src="../assets/imagen/icon/ver_pass.png" width="25" height="25" 
                onclick="cambiarconpin00(this)"/>
                <br><br><br>
                Contraseña nueva
                <input name="conusu" id="conusu" type="password" maxlength="50" placeholder="Contraseña nueva" required="required" />
                <img name="ver_pass_01" id="ver_pass_01" src="../assets/imagen/icon/ver_pass.png" width="25" height="25" 
                onclick="cambiarconpin01(this)"/>
                <input name="conusu2" id="conusu2" type="password" maxlength="50" placeholder="Confirmar Contraseña nueva" required="required" />
                <img name="ver_pass_02" id="ver_pass_02" src="../assets/imagen/icon/ver_pass.png" width="25" height="25" 
                onclick="cambiarconpin02(this)"/>
                <br>
				<input name="check0" type="hidden" value="act">
				<input name="check1" type="hidden" value="act">
				<input name="check2" type="hidden" value="">
				<button onClick="popUp()">Cambiar Contraseña</button>
			</form>
			<?php
			//}
			?>
			<form name="f007" action="update_contrapin_bd.php" method="POST" class="formulario__registro">
				<?php
            	//echo "<br>perfact... ".$perfact."<br>";
				//echo 'Usuario '.$UsuarioSES.'<br>';
				//echo 'UsuPerfil '.$UsuPerfil.'<br>';
				?>
				<h2>Cambiar Pines de Perfil</h2>
				Usuario
				<input name="aliusu" id="aliusu" type="text" maxlength="50" placeholder="Usuario. Ej.: Gerardo09" onKeyPress="return sololetras(event)" onpaste="return false" required="required" />
                <br><br><br>
				Contraseña actual
				<input name="conusuactu" id="conusuactu" type="password" maxlength="50" placeholder="Contraseña actual" required="required" />
                <img name="ver_pass" id="ver_pass" src="../assets/imagen/icon/ver_pass.png" width="25" height="25" 
                onclick="cambiarconpin(this)"/>
                <br><br><br>
				Pin Perfil (4 digitos).
				<input name="pinful" id="pinful" type="password" maxlength="4" placeholder="Pin Full Perfil. Solo Números." onKeyPress="return solonumeros(event)" onpaste="return false" required="required"/>
				<img name="ver_pass_03" id="ver_pass_03" src="../assets/imagen/icon/ver_pass.png" width="25" height="25" 
                onclick="cambiarconpin03(this)"/>
                <input name="pinfam" id="pinfam" type="password" maxlength="4" placeholder="Pin Familiar. Solo Números." onKeyPress="return solonumeros(event)" onpaste="return false" required="required"/>
				<img name="ver_pass_04" id="ver_pass_04" src="../assets/imagen/icon/ver_pass.png" width="25" height="25" 
                onclick="cambiarconpin04(this)"/>
                <input name="pininf" id="pininf" type="password" maxlength="4" placeholder="Pin Infantil. Solo Números."  onKeyPress="return solonumeros(event)" onpaste="return false" required="required"/>
				<img name="ver_pass_05" id="ver_pass_05" src="../assets/imagen/icon/ver_pass.png" width="25" height="25" 
                onclick="cambiarconpin05(this)"/>
                <br>
				<input name="check0" type="hidden" value="act">
				<input name="check1" type="hidden" value="">
				<input name="check2" type="hidden" value="act">
				<button onClick="popUp()">Cambiar Pines</button>
			</form>
			<?php
			}
			?>
        </div>
    </div>
</main>
<script src="assets/js/script.js"></script>
</body>
</html>