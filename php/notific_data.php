<?php
/**
 * FASE 1 — notific_data.php
 * Correcciones aplicadas:
 *  [1] session_start() solo si no hay sesión activa
 *  [2] Eliminado @session_start() silenciador
 *  [3] Credenciales desde config/config.php vía conexion_bd.php
 *  [4] $login_usuario escapado antes del query
 *  [5] Verificación de sesión con header() en lugar de comportamiento silencioso
 */

if (!defined('DB_HOST')) {
    require_once __DIR__ . '/../config/config.php';
}

// Suprimir display de errores — los errores van al log, no al navegador
ini_set('display_errors', '0');

// Solo iniciar sesión si no está ya activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'conexion_bd.php';

// [5] Verificar sesión antes de procesar
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] === '') {
    header('Location: ../index.php');
    exit;
}
	

//DECLARAR VARIABLES

$ideusu0='';
$nomusu0='';
$corusu0='';
$aliusu0='';
$conusu0='';
$apeusu0='';
$cedusu0='';
$stausu0='';
$telusu0='';
$dirusu0='';
$ciuusu0='';
$edousu0='';
$paisrusu0='';
$ciudes0='';
$edodes0='';
$paisdes0='';
$nacusu0='';
$imgusu0='';
$ingusu0='';
$tipcue0='';
$tipsus0='';
$stacue0='';
$pinful0 = 0;
$pinfam0 = 0;
$pininf0 = 0;

$noti=0;
$noti2=0;
$notimsj='';
$notimsj2='';
//FIN DECLARAR VARIABLES


$UsuarioSES = $_SESSION['usuario'];
$UsuPerfil  = isset($_SESSION['perfil']) ? $_SESSION['perfil'] : '';
$login_usuario = $_SESSION['usuario'];

// [4] Escape antes del query
$login_esc = mysqli_real_escape_string($conexion, $login_usuario);
$result = mysqli_query($conexion, "SELECT * FROM usuario WHERE corusu01='$login_esc'");
while($row = mysqli_fetch_array($result))
{
	$ideusu0=$row["ideusu01"];
		if ($ideusu0=="")
		{$notimsj.="ID Usuario<br>"; $noti++;}else
		{$notimsj2.="ID Usuario<br>"; $noti2++;}
	$nomusu0=$row["nomusu01"];
		if ($nomusu0=="")
		{$notimsj.="Nombres<br>"; $noti++;}else
		{$notimsj2.="Nombres<br>"; $noti2++;}
	$apeusu0=$row["apeusu01"];
		if ($apeusu0=="")
		{$notimsj.="Apellidos<br>"; $noti++;}else
		{$notimsj2.="Apellidos<br>"; $noti2++;}	
	$aliusu0=$row["aliusu01"];
		if ($aliusu0=="")
		{$notimsj.="Usuario<br>"; $noti++;}else
		{$notimsj2.="Usuario<br>"; $noti2++;}
	$corusu0=$row["corusu01"];
		if ($corusu0=="")
		{$notimsj.="Correo Electrónico<br>"; $noti++;}else
		{$notimsj2.="Correo Electrónico<br>"; $noti2++;}
	
	$conusu0=$row["conusu01"];
		if ($conusu0=="")
		{$notimsj.="Contraseña<br>"; $noti++;}else
		{$notimsj2.="Contraseña<br>"; $noti2++;}
//00000000000
	$pinful0=$row["pinful01"];
		if ($pinful0==0)
		{$notimsj.="Pin Full Perfil<br>"; $noti++;}else
		{$notimsj2.="Pin Full Perfil<br>"; $noti2++;}
	$pinfam0=$row["pinfam01"];
		if ($pinfam0==0)
		{$notimsj.="Pin Familiar<br>"; $noti++;}else
		{$notimsj2.="Pin Familiar<br>"; $noti2++;}
	$pininf0=$row["pininf01"];
		if ($pininf0==0)
		{$notimsj.="Pin Infantil<br>"; $noti++;}else
		{$notimsj2.="Pin Infantil<br>"; $noti2++;}

//11111111111
	$cedusu0=$row["cedusu01"];
		if ($cedusu0=="")
		{$notimsj.="Cédula<br>"; $noti++;}else
		{$notimsj2.="Cédula<br>"; $noti2++;}
	$stausu0=$row["stausu01"];
		if ($stausu0=="")
		{$notimsj.="Stausu<br>"; $noti++;}else
		{$notimsj2.="Stausu<br>"; $noti2++;}
	$telusu0=$row["telusu01"];
		if ($telusu0=="")
		{$notimsj.="Teléfono<br>"; $noti++;}else
		{$notimsj2.="Teléfono<br>"; $noti2++;}
	
	$dirusu0=$row["dirusu01"];
		if ($dirusu0=="")
		{$notimsj.="Dirección<br>"; $noti++;}else
		{$notimsj2.="Dirección<br>"; $noti2++;}
	$paisusu0=$row["paisusu01"];
//		if ($paisusu0==2)
		if (($paisusu0==2)||($paisusu0==""))
		{$notimsj.="Pais<br>"; $noti++;}else
		{$notimsj2.="Pais<br>"; $noti2++;}
	$edousu0=$row["edousu01"];
//		if ($edousu0==2)
		if (($edousu0==2)||($edousu0==""))
		{$notimsj.="Estado<br>"; $noti++;}else
		{$notimsj2.="Estado<br>"; $noti2++;}
	$ciuusu0=$row["ciuusu01"];
//		if ($ciuusu0==2)
		if (($ciuusu0==2)||($ciuusu0==""))
		{$notimsj.="Ciudad<br>"; $noti++;}else
		{$notimsj2.="Ciudad<br>"; $noti2++;}
	$nacusu0=$row["nacusu01"];
		if ($nacusu0=="0000-00-00")
		{$notimsj.="Fecha Nacimiento<br>"; $noti++;}else
		{$notimsj2.="Fecha Nacimiento<br>"; $noti2++;}
	
	$imgusu0=$row["imgusu01"];
		if ($imgusu0=="imagen/perfil.jpg")
		{$notimsj.="Imagen Perfil<br>"; $noti++;}else
		{$notimsj2.="Imagen Perfil<br>"; $noti2++;}
	$ingusu0=$row["ingusu01"];
		if ($ingusu0=="0000-00-00")
		{$notimsj.="Fecha Ingreso<br>"; $noti++;}else
		{$notimsj2.="Fecha Ingreso<br>"; $noti2++;}
	$tipcue0=$row["tipcue01"];
		if ($tipcue0=="")
		{$notimsj.="Tipo de Cuenta<br>"; $noti++;}else
		{$notimsj2.="Tipo de Cuenta<br>"; $noti2++;}
	$tipsus0=$row["tipsus01"];
		if ($tipsus0=="")
		{$notimsj.="Tipo de Suscriptor<br>"; $noti++;}else
		{$notimsj2.="Tipo de Suscriptor<br>"; $noti2++;}
	$stacue0=$row["stacue01"];
		if ($stacue0=="")
		{$notimsj.="Estado Cuenta<br>"; $noti++;}else
		{$notimsj2.="Estado Cuenta<br>"; $noti2++;}
}
mysqli_close($conexion)


?>
<?php
//Notificaciones<
//echo "(".$noti.")";
/*
if ($noti > 1)
{
	echo "<br>Tienes ".$noti." notificaciones por actualizar.";
	echo "<br>..Perfil.. <br>".$notimsj;
	echo '<br>
	<a href="perfil_usuario.php" style="text-decoration:none;">
	<button>Actualizar Perfil</button>
	</a>
	<br>';
}else
if ($noti < 1)
{
	echo "<br>No tienes notificaciones.";

}else{
	echo "<br>Tienes ".$noti." notificación por actualizar.";
	echo "<br>..Perfil.. <br>".$notimsj;
	echo '<br>
	<a href="perfil_usuario.php" style="text-decoration:none;">
	<button>Actualizar Perfil</button>
	</a>
	<br>';
}
*/
 ?>



