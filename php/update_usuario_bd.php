<?php


include 'conexion_bd.php';


$msj11=0;
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
$paisusu0='';
$nacusu0='';
$imgusu0='';
$ingusu0='';
$tipcue0='';
$tipsus0='';
$stacue0='';
$pinful0 = 0;
$pinfam0 = 0;
$pininf0 = 0;

$check01 = '';
$check02 = '';

//++++++++++++++++++++++++++++++++++++++++++++++

@$ideusu0 = $_POST['ideusu'];
@$nomusu0 = $_POST['nomusu'];
@$corusu0 = $_POST['corusu'];
@$aliusu0 = $_POST['aliusu'];
@$conusu0 = $_POST['conusu'];
@$apeusu0 = $_POST['apeusu'];
@$cedusu0 = $_POST['cedusu'];
@$stausu0 = $_POST['stausu'];
@$telusu0 = $_POST['telusu'];
@$dirusu0 = $_POST['dirusu'];
@$ciuusu0=$_POST['ciuusu'];
@$edousu0=$_POST['edousu'];
@$paisusu0=$_POST['paisusu'];
@$nacusu0 = $_POST['nacusu'];
@$imgusu0 = $_POST['imgusu'];
@$ingusu0 = $_POST['ingusu'];
@$tipcue0 = $_POST['tipcue'];
@$tipsus0 = $_POST['tipsus'];
@$stacue0 = $_POST['stacue'];
@$pinful0 = $_POST['pinful'];
@$pinfam0 = $_POST['pinfam'];
@$pininf0 = $_POST['pininf'];

@$check01 = $_POST['check1'];
@$check02 = $_POST['check2'];    
//++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++

//++++++++++
//++++++++++++++++++++++++++++
// **/
$query = "UPDATE `usuario` SET 
`ideusu01`='" . $ideusu0 . "', 
`nomusu01`='" . $nomusu0 . "', 
`corusu01`='" . $corusu0 . "', 
`aliusu01`='" . $aliusu0 . "', 
`conusu01`='" . $conusu0 . "', 
`pinful01`='" . $pinful0 . "', 
`pinfam01`='" . $pinfam0 . "', 
`pininf01`='" . $pininf0 . "', 
`apeusu01`='" . $apeusu0 . "', 
`cedusu01`='" . $cedusu0 . "', 
`stausu01`='" . $stausu0 . "', 
`telusu01`='" . $telusu0 . "', 
`dirusu01`='" . $dirusu0 . "', 
`ciuusu01`='" . $ciuusu0 . "', 
`edousu01`='" . $edousu0 . "', 
`paisusu01`='" . $paisusu0 . "', 
`nacusu01`='" . $nacusu0 . "', 
`imgusu01`='" . $imgusu0 . "', 
`ingusu01`='" . $ingusu0 . "', 
`tipcue01`='" . $tipcue0 . "', 
`tipsus01`='" . $tipsus0 . "', 
`stacue01`='" . $stacue0. "' 
WHERE `usuario`.`ideusu01`='".$ideusu0."'"; 



//+++++++++++++++++++
//+++++++++++++++++++
//+++++++++++++++++++

/**/
//msj11
if($msj11 > 0){
	echo '
	<script>
		alert("Llenar todos los campos:\n'.$msj12.'");
		//alert("Llenar todos los campos:"+msj1+" 88\n'.$msj12.'99");
		//alert("Intentalo nuevamente");
		window.location = "perfil_usuario.php";
	</script>
	';
}else{
	$ejecutar = mysqli_query($conexion, $query);

	if($ejecutar){
		echo '
			<script>
			alert("Usiario guardado exitosamente");
			window.location = "perfil_usuario.php";
			</script>
		';
		exit;
	}else{
		echo '
			<script>
			alert("ERROR 000b453d3DAt0");
			</script>
		';
	}
}
/**/
mysqli_close($conexion)
?>
