<?php
    session_start();
    include 'conexion_bd.php';
//SQL
//DELETE FROM `usuario` WHERE `usuario`.`ideusu01` = 15;
//+++++++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++++++++++++++++++++++

//DECLARAR VARIABLES
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

$msj1 = '';
$msj11 = '';
$check00 = '';
$check01 = '';
$check02 = '';

//$login_usuario=$_SESSION['usuario'];
//echo 'Usuario '.$login_usuario.'<br>';
//$corusu9=$_SESSION['usuario'];
//FIN DECLARAR VARIABLES

//++++++++++++++++++++++++++++++++++++++++++++++
@$idtick9 = NULL;
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
/* * /
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
/ * */
//++++++++++
//++++++++++++++++++++++++++++
//$query = "INSERT INTO `ticket09` (`idtick09`, `idreti09`, `tiptic09`, `asutic09`, `corusu09`, `nomtik09`, `apeusu09`, `teltik09`, `comtik09`, `fectik09`) VALUES ('$idtick9', '$idreti9', '$tiptic9', '$asutic9', '$corusu9', '$nomtik9', '$apeusu9', '$teltik9', '$comtik9', '$fectik9'");

$query = "INSERT INTO `ticket09` (`idtick09`, `idreti09`, `tiptic09`, `asutic09`, `corusu09`, `nomtik09`, `apeusu09`, `teltik09`, `comtik09`, `fectik09`) VALUES (NULL, 3, '$tiptic9', '$asutic9', '$corusu9', '$nomtik9', '$apeusu9', '$teltik9', '$comtik9', '$fectik9')";
//NULL//NULL
//+++++++++++++++++++
//+++++++++++++++++++
//+++++++++++++++++++

	$perfact="b8FVr{8dFV5-F$(d5HgT";
//	$perfact=78;
if($check00=="act")
{
		$ejecutar = mysqli_query($conexion, $query);

		if($ejecutar){
			echo '
				<script>
					alert("Ticket creado exitosamente");
					window.location = "ticket_contacto.php";
				</script>
			';
			exit;
		}else{
			echo '
				<script>
					alert("ERROR 000b453d3DAt0");
					window.location = "ticket_contacto.php";
				</script>
			';
		}
}
?>

