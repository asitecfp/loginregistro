<?php
include 'conexion_bd.php';
error_reporting(1);
$nomusu0='';
$corusu0='';
$aliusu0='';
$conusu0='';
$apeusu0='';
$ingusu0='';
$stacue0='';
$pinful0 = 0;
$pinfam0 = 0;
$pininf0 = 0;
$dniced0 ='';
//++++++++++++++++++++++++++++++++++++++++++++++

$nomusu0 = $_POST['nomusu'];
$corusu0 = $_POST['corusu'];
$aliusu0 = $_POST['aliusu'];
$aliusu0 = "";

$dniced0 = $_POST['dniced'];

$conusu0 = $_POST['conusu'];
$apeusu0 = $_POST['apeusu'];
$ingusu0 = $_POST['ingusu'];
$stacue0 = $_POST['stacue'];
$pinful0 = $_POST['pinful'];
$pinful0 = 0;


$pinfam0 = $_POST['pinfam'];
$pinfam0 = 0;


$pininf0 = $_POST['pininf'];
$pininf0 = 0;
//$fechacon = $fila2['feclan04'];
//$fechareg = new datetime();
$fechaActual = date ( 'd-m-Y' );
$fechareg = new datetime($fechaActual);
$fecha = $fechareg;

$msj11 = 0;
$msj12 = '';
echo '
<script>
	msj1 = "";
</script>
';
$check01="";
if($check01=="act")
{
echo '<script>
msj1 = "";
</script>';
}

$query = "INSERT INTO `usuario` (`ideusu01`, `nomusu01`, `corusu01`, `aliusu01`, `conusu01`, `pinful01`,`pinfam01`,`pininf01`, `apeusu01`, `cedusu01`, `stausu01`, `telusu01`, `dirusu01`, `ciuusu01`, `edousu01`, `paisusu01`, `nacusu01`, `imgusu01`, `ingusu01`, `tipcue01`, `tipsus01`, `stacue01`) VALUES (NULL, '$nomusu0', '$corusu0', '$aliusu0', '$conusu0', '$pinful0', '$pinfam0', '$pininf0', '$apeusu0', '', 'ACTIVO', '', '', '', '', '', '2021-01-01 18:18:09', '', '2021-01-01 18:18:09', 'visor', 'ZNET', '$stacue0')";


$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE corusu01='$corusu0'");

if(mysqli_num_rows($verificar_correo) > 0){
	$msj11++;
	$msj12.= '-Este Correo Electrónico ya esta registrado\n';
  
}

$verficar_dniced = mysqli_query($conexion, "SELECT * FROM usuario WHERE cedusu01='$dniced0'");

if(mysqli_num_rows($verficar_dniced) > 0){
	$msj11++;
	$msj12.= '-Este DNI o Cédula ya esta registrado\n';
 
}

//+++++++++++++++++++
//+++++++++++++++++++
//+++++++++++++++++++


if($msj11 > 0){
	echo '
	<script>
		alert("..:ERROR:..\n'.$msj12.'");
		//alert("Llenar todos los campos:\n'.$msj12.'");
		//alert("Llenar todos los campos:"+msj1+" 88\n'.$msj12.'99");
		//alert("Intentalo nuevamente");
		//window.location = "../index.php?nomusu='.$nomusu0.'&corusu='.$corusu0.'&aliusu='.$aliusu0.'&apeusu='.$apeusu0.'&ingusu='.$ingusu0.'&stacue='.$stacue0.'";
		window.location = "../STR-master/php/client.php";
	</script>
	';
}else{
	$ejecutar = mysqli_query($conexion, $query);

	if($ejecutar){
		echo '
			<script>
			alert("Usuario almacenado exitosamente");
			window.location = "../STR-master/php/client.php";
			//window.location = "../index.php?corusu='.$corusu0.'";
			
			</script>	';
	}else{

		echo '
		<script>
		alert("Error de almacenamiento");
		window.location = "../STR-master/php/client.php";
		//window.location = "../Bienvenido.php";
		//window.location = "../index.php?corusu='.$corusu0.'";
		
		</script>	';
	}
}


mysqli_close($conexion)
?>