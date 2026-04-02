<?php
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
$paisusu0='';
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

$idtick9='';
$idreti9='';
$tiptic9='';
$asutic9='';
$corusu9='';
$nomtik9='';
$apeusu9='';
$teltik9='';
$comtik9='';
$fectik9='';

$msj11 = '';
$check00 = '';
$check01 = '';
$check02 = '';

//$login_usuario=$_SESSION['usuario'];
//echo 'Usuario '.$login_usuario.'<br>';
//$corusu9=$_SESSION['usuario'];

//FIN DECLARAR VARIABLES

//++++++++++++++++++++++++++++++++++++++++++++++
@$idtick9 = $_POST['idtick'];
@$idreti9 = $_POST['idreti'];
@$tiptic9 = $_POST['tiptic'];
@$asutic9 = $_POST['asutic'];
@$corusu9 = $_POST['corusu'];
@$nomtik9 = $_POST['nomtik'];
@$apeusu9 = $_POST['apeusu'];
@$teltik9 = $_POST['teltik'];
@$comtik9 = $_POST['comtik'];
@$fectik9 = $_POST['fectik'];

@$check00 = $_POST['check0'];
//++++++++++++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++

echo '<br />'.$idtick9;
echo '<br />'.$idreti9;
echo '<br />'.$tiptic9;
echo '<br />'.$asutic9;
echo '<br />'.$corusu9;
echo '<br />'.$nomtik9;
echo '<br />'.$apeusu9;
echo '<br />'.$teltik9;
echo '<br />'.$comtik9;
echo '<br />'.$fectik9;

echo '<br />'.$msj11;
echo '<br />'.$check00;
echo '<br />'.$check01;
echo '<br />'.$check02;

//$login_usuario=$_SESSION['usuario'];
//echo 'Usuario '.$login_usuario.'<br>';
//$corusu9=$_SESSION['usuario'];
echo '<br />'.$corusu9;
//++++++++++
//++++++++++++++++++++++++++++
// **/
$query = "UPDATE `ticket09` SET 
`idtick09`='" . $idtick9 . "', 
`idreti09`='" . $idreti9 . "', 
`tiptic09`='" . $tiptic9 . "', 
`asutic09`='" . $asutic9 . "', 
`corusu09`='" . $corusu9 . "', 
`nomtik09`='" . $nomtik9 . "', 
`apeusu09`='" . $apeusu9 . "', 
`teltik09`='" . $teltik9 . "', 
`comtik09`='" . $comtik9 . "', 
`fectik09`='" . $fectik9 . "'  
WHERE `ticket09`.`idtick09`='".$idtick9."'"; 


//+++++++++++++++++++
//+++++++++++++++++++
//+++++++++++++++++++
if($msj11 > 0)
{
	//888888
}
//+++++++++++++++++++
//+++++++++++++++++++
/**/
@$check01 = $_POST['check1'];
//$idreti9=2;

if($check00 =="act")
{
	$validar_login = mysqli_query($conexion, "SELECT * FROM ticket09 WHERE
	idtick09='$idtick9' and idreti09='$idreti9' and corusu09='$corusu9'");
	if(mysqli_num_rows($validar_login) > 0)
	{
		echo '
		<script>
			alert("BD ...Llenar todos los campos:\n $ msj1");
			//alert("Llenar todos los campos:"+msj1+" 8899");
			//alert("Intentalo nuevamente");
			//window.location = "perfil_usuario.php";
		</script>
		';
	//}else{
		$ejecutar = mysqli_query($conexion, $query);

		if($ejecutar){
			echo '
				<script>
				alert("Ticket guardado exitosamente");
				//window.location = "perfil_usuario.php";
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
}
/**/
mysqli_close($conexion)
?>
