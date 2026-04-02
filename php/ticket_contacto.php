<?php
session_start();
include 'conexion_bd.php';

    if(isset($_SESSION['usuario'])){
       // header("location: bienvenido.php");
    }
    if($_SESSION['usuario']==''){
       header("location: ../index.php");
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
$fectik9= date("Y")."-".date("m")."-".date("d");

$check2='';
//FIN DECLARAR VARIABLES

$login_usuario=$_SESSION['usuario'];
//echo 'Usuario '.$login_usuario.'<br>';


@$check2 = $_GET['check2'];
if($check2!="")
{
	@$idtick9 = $_GET['idtick'];
	@$idreti9 = $_GET['idreti'];
	@$tiptic9 = $_GET['tiptic'];
	@$asutic9 = $_GET['asutic'];
	@$corusu9 = $_GET['corusu'];
	@$nomtik9 = $_GET['nomtik'];
	@$apeusu9 = $_GET['apeusu'];
	@$teltik9 = $_GET['teltik'];
	@$comtik9 = $_GET['comtik'];
	@$fectik9 = $_GET['fectik'];
}

/* *  /
$result = mysqli_query($conexion, "SELECT * FROM usuario WHERE corusu01='$login_usuario'");
	$ideusu0=$row["ideusu01"];
	$nomusu0=$row["nomusu01"];
	$corusu0=$row["corusu01"];
	$aliusu0=$row["aliusu01"];
	$conusu0=$row["conusu01"];

/ * */

//88888888888888888888888888888888888888888
//88888888888888888888888888888888888888888
//88888888888888888888888888888888888888888
/* */
$corusu9=$_SESSION['usuario'];
//$idtick9=2;
//ORDER BY dddd ASC
//$result = mysqli_query($conexion, "SELECT * FROM ticket09 WHERE idtick09='$idtick9' and corusu09='$corusu9'");
//$result = mysqli_query($conexion, "SELECT * FROM ticket09 WHERE idreti09='2' and corusu09='vv@ff.ff'");

//$result = mysqli_query($conexion, "SELECT * FROM ticket09 WHERE idreti09='1' ORDER BY idtick09");
$result = mysqli_query($conexion, "SELECT * FROM ticket09 WHERE corusu09='vv@ff.ff' ORDER BY idtick09");

$idconta=0;
//$idreti9_tmp=0;
//$numelentos = 0;
//@$idreti9_tmp[0] = 0;

/* * /
while($row = mysqli_fetch_array($result))
{
	$idtick9=$row["idtick09"];
	$idreti9=$row["idreti09"];
	$tiptic9=$row["tiptic09"];
	$asutic9=$row["asutic09"];
	$corusu9=$row["corusu09"];
	$nomtik9=$row["nomtik09"];
	$apeusu9=$row["apeusu09"];
	$teltik9=$row["teltik09"];
	$comtik9=$row["comtik09"];
	$fectik9=$row["fectik09"];
}
mysqli_close($conexion)
/ * */
//88888888888888888888888888888888888888888
//88888888888888888888888888888888888888888
//88888888888888888888888888888888888888888
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización Ticket</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<!--
<link href = "https://fonts.googleapis.com/css2? family = Roboto: ital, wght @ 0,100; 0,300; 0,400; 0,500; 0,700; 0,900; 1,100; 1,300; 1,400; 1,500; 1,700; 1,900 & display = intercambiar "rel =" hoja de estilo ">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">
-->

<?php
include ('funciones_ticket.php');
?>

</head>
<body onLoad="onLoad()">
	<main>
<?php
//include ('../menu2.php');
?>
	<div class="contenedor__todo">
		<div class="caja__trasera">
			<div class="caja__trasera-login" style="width:550px;">
				<div class="contenedor__login-registro">

					<form action="insert_ticket_bd.php" method="POST" class="formulario__login"
					style="margin-top:1300px;
					margin-left:0px;
					margin-right:600px;
					width:600px;
					vertical-align:top;">
                    <font style="color:#333; font-weight:bold;">
					<?php
                    echo 'Usuario '.$login_usuario.'<br>';
                    echo 'corusu9 '.$corusu9.'<br>';
					?>
                    </font>
                    <h2>Crear Ticket</h2>
					<table width="550" border="0" cellspacing="0" cellpadding="0">
						<tr>
							<td>
<font style="color:#333; font-weight:bold;">
ID Ticket
</font>
<font style="color:#333;">
<?php echo $idtick9; ?>
<br></font>
<input name="idtick" id="idtick" value="<?php echo $idtick9; ?>" type="text" maxlength="3" placeholder="ID Ticket" XX_required="XX_required" />
<br><br><br>
<font style="color:#333; font-weight:bold;">
ID Respuesta Ticket
</font>
<font style="color:#333;">
<?php echo $idreti9; ?>
<br></font>
<input name="idreti" id="idreti" value="<?php echo $idreti9; ?>" type="text" maxlength="5" placeholder="ID Respuesta Ticket" XX_required="XX_required" />
<br><br><br>
<font style="color:#333; font-weight:bold;">
Tipo de Ticket
</font>
<font style="color:#333;">
<?php echo $tiptic9; ?>
<br></font>
<input name="tiptic2" id="tiptic2" value="<?php echo $tiptic9; ?>" type="text" maxlength="3" placeholder="Tipo de Ticket" XX_required="XX_required" />
<span class="Tipo de Ticket">
<select name="tiptic" id="tiptic" size="1"
onchange="cbx_tipoticket()" onClick="mostrar()" XX_XX_required="XX_required">
  <option value="2" selected="selected">Tipo de Ticket</option>
  <option value="erv">Error Vídeos</option>
  <option value="cav">Cargar Vídeos</option>
  <option value="rcn">Recuperar Contraseña</option>
  <option value="rco">Recuperar Correo Electrónico</option>
  <option value="rus">Recuperar Usuario</option>
</select>
</span>
<br><br><br>
<font style="color:#333; font-weight:bold;">
Asunto
</font>
<font style="color:#333;">
<?php echo $asutic9; ?>
<br></font>
<input name="asutic" id="asutic" value="<?php echo $asutic9; ?>" type="text" maxlength="20" placeholder="Asunto" 
onKeyPress="return sololetras(event)" onpaste="return false" XX_required="XX_required" />
<br><br><br>
<font style="color:#333; font-weight:bold;">
Correo Electrónico
</font>
<font style="color:#333;">
<?php echo $corusu9; ?>
<br></font>
<input name="corusu" id="corusu" value="<?php echo $corusu9; ?>" type="text" maxlength="50" placeholder="Correo Electrónico" 
onKeyPress="return email(event)" onpaste="return false" XX_required="XX_required" />
<br><br><br>
<font style="color:#333; font-weight:bold;">
Nombres
</font>
<font style="color:#333;">
<?php echo $nomtik9; ?>
<br></font>
<input name="nomtik" id="nomtik" value="<?php echo $nomtik9; ?>" type="text" maxlength="50" placeholder="Nombres" 
onKeyPress="return sololetras(event)" onpaste="return false" XX_required="XX_required" />
<br><br><br>
<font style="color:#333; font-weight:bold;">
Apellidos
</font>
<font style="color:#333;">
<?php echo $apeusu9; ?>
<br></font>
<input name="apeusu" id="apeusu" value="<?php echo $apeusu9; ?>" type="text" maxlength="20" placeholder="Apellidos" 
onKeyPress="return sololetras(event)" onpaste="return false" XX_required="XX_required" />
<br><br><br>
<font style="color:#333; font-weight:bold;">
Teléfono
</font>
<font style="color:#333;">
<?php echo $teltik9; ?>
<br></font>
<input name="teltik" id="teltik" value="<?php echo $teltik9; ?>" type="text" maxlength="13" placeholder="Teléfono" 
onKeyPress="return telefono(event)" onpaste="return false" XX_required="XX_required" />
<br><br><br>
<font style="color:#333; font-weight:bold;">
Comentario
<br>
</font>
<font style="color:#333;">
<?php echo $comtik9; ?>
<br></font>
<textarea name="comtik" id="comtik" maxlength="700" placeholder="Comentario" 
onKeyPress="return comentario(event)" onpaste="return false" XX_required="XX_required" />
<?php echo $comtik9; ?>
</textarea><br>
<font style="color:#333; font-size:11px;">
(max. 700 carácteres.)</font>
<br><br><br>
<font style="color:#333; font-weight:bold;">
Fecha Registro
</font>
<font style="color:#333;">
<?php echo $fectik9; ?>
<br></font>
<input name="fectik" id="fectik" value="<?php echo $fectik9; ?>" type="text" maxlength="10" placeholder="Fecha Registro" XX_required="XX_required" />
<br><br><br>

				<input name="check0" type="hidden" value="act">
				<button onClick="popUp()">Guardar</button>
<br><br>
<font style="color:#333; font-weight:bold;">
Por favot llenar todos los campos.
</font>
		</td>
	</tr>
</table>
					</form>
                </div>
			</div>
		</div>
	</div>
</main>
</body>
<!--
    <link rel="stylesheet" href="assets/css/estilos2.css">
-->
</html>


