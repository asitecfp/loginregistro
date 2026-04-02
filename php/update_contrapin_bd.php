<link rel="stylesheet" href="assets/css/estilos.css">
<?php
//SGO
//11780014665

//SQL
//DELETE FROM `usuario` WHERE `usuario`.`ideusu01` = 15;

include 'conexion_bd.php';

//+++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++
/*
ideusu01
nomusu01
corusu01
aliusu01
conusu01
pinful01
pinfam01
pininf01
apeusu01
cedusu01
stausu01
telusu01
dirusu01
ciuusu01
edousu01
paisusu01
nacusu01
imgusu01
ingusu01
tipcue01
tipsus01
stacue01
**/
//+++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++

$msj11=0;
$ideusu0='';
$nomusu0='';
$corusu0='';
$aliusu0='';
$conusu0='';
$conusuactu='';
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

$check00 = '';
$check01 = '';
$check02 = '';

//++++++++++++++++++++++++++++++++++++++++++++++

@$ideusu0 = $_POST['ideusu'];
@$nomusu0 = $_POST['nomusu'];
@$corusu0 = $_POST['corusu'];
@$aliusu0 = $_POST['aliusu'];
@$conusu0 = $_POST['conusu'];
@$conusuactu0 = $_POST['conusuactu'];
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

@$check00 = $_POST['check0'];
@$check01 = $_POST['check1'];
@$check02 = $_POST['check2'];    
//++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++
/* * /
echo "check00 ".$check00."<br />";
echo "check01 ".$check01."<br />";
echo "check02 ".$check02."<br />";
echo "msj11 ".$msj11."<br />";
echo "aliusu0 ".$aliusu0."<br />";
echo "conusu0 ".$conusu0."<br />";
echo "conusuactu0 ".$conusuactu0."<br />";
/ * */

//+++++++++++++++++++
//+++++++++++++++++++
//+++++++++++++++++++

$perfact="dHc4m81Ar-c0ntR4p1Nu";
//	$perfact=78;
if($check00=="act")
{
	if($check01=="act")
	{
		$contpin="Contraseña guardada";
		$query = "UPDATE `usuario` SET 
		`conusu01` = '".$conusu0."' 
		WHERE `usuario`.`aliusu01` = '".$aliusu0."'";
	}
	if($check02=="act")
	{
		$contpin="Pines guardados";
		$query = "UPDATE `usuario` SET 
		`pinful01`='" . $pinful0 . "', 
		`pinfam01`='" . $pinfam0 . "', 
		`pininf01`='" . $pininf0 . "' 
		WHERE `usuario`.`aliusu01` = '".$aliusu0."'";
	}
	
    $validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE
	aliusu01='$aliusu0' and conusu01='$conusuactu0'");
	if(mysqli_num_rows($validar_login) > 0){
		//$query1 = "UPDATE `usuario` SET `conusu01` = '".$conusu0."' WHERE `usuario`.`aliusu01` = '".$aliusu0."'";
		$ejecutar = mysqli_query($conexion, $query);
		if($ejecutar)
		{
			echo '
				<script>
					alert("'.$contpin.' exitosamente.");
					//window.location ="contrapin_update.php?perfact='.$perfact.'";
					window.location ="perfil.php";
				</script>
			';
			exit;
		}else{
			echo '
				<script>
					alert("ERROR 000b453d3DAt0");
					window.location ="contrapin_update.php?perfact='.$perfact.'";
				</script>
			';
		}
		exit;
	}else{
		echo '
			<script>
				alert("Usuario o Contraseña no valida.");
				window.location ="contrapin_update.php";
				//window.location ="perfil.php";
			</script>
		';
        exit;
    }    
}
mysqli_close($conexion)
?>
