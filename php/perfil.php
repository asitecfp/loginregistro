<?php
$perfilmenu="";
$perfilmenuact="";
include 'notific_data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <title>Actualización Perfil</title>
<?php
include ('funciones.php');
?>
</head>
<body onLoad="onLoad()">
<main>
<?php
$perfilmenu="dA-g3JTfUerV50F";
include ('../menu2.php');
?>

	<div class="contenedor__todo">
		<div class="caja__trasera">
			<div class="caja__trasera-login" style="width:550px;">
		  <div class="contenedor__login-registro">
					<br><br><br>
                    <div align="center">
					<h2>Perfil Usuario</h2>
                    </div>
              <table width="550" border="0" cellspacing="10" cellpadding="10">
				  <tr>
                      <td rowspan="2">
                        <font style="color:#333; font-weight:bold;">
                            <div align="center">
                              <h3>Tus Datos Personales</h3>
                              <br>
                            </div>
                        </font>
                        <br>                            <font style="color:#333; font-weight:bold;">
                            Tu ID de Usuario: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $ideusu0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Nombres: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $nomusu0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Apellidos: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $apeusu0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Usuario: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $aliusu0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Correo Electrónico: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $corusu0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Cédula: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $cedusu0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Fecha Nacimiento: 
                        </font>
                        <font style="color:#333;">
                            <?php
                                if ($nacusu0 == "0000-00-00")
                                {echo "<br>El 00 del ".$mesdes." 00 de 0000";}else
                                {echo "<br>El ".$dia." de ".$mesdes." de ".$anno;}
                                ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Stausu: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $stausu0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Teléfono: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $telusu0; ?>
                        </font><br>
                        <font style="color:#333; font-weight:bold;">
                            Dirección: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $dirusu0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Ciudad: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $ciuusu0; ?> -
                          <?php echo $ciudes0; ?>                            </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Estado: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $edousu0; ?> - 
                            <?php echo $edodes0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Pais: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $paisusu0; ?> - 
                            <?php echo $paisdes0; ?>
                        </font>
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Tipo de Cuenta: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $tipcue0; ?>
                        </font><br>
                        <font style="color:#333; font-weight:bold;">
                            Tipo de Suscriptor: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $tipsus0; ?>
                        </font><br>
                        <font style="color:#333; font-weight:bold;">
                            Estado Cuenta: 
                        </font>
                        <font style="color:#333;">
                            <?php echo $stacue0; ?>
                        </font>
                        <br><br>
                      </td>
                            
                            
					  <td valign="top">
                        <br>
                        <font style="color:#333; font-weight:bold;">
                            Estas con Nosotros desde:
                        </font>
                        <font style="color:#333;">
                            <?php
                                if ($ingusu0 == "0000-00-00")
                                {echo "<br>El 00 del ".$mesdes1." 00 de 0000";}else
                                {echo "<br>El ".$dia1." de ".$mesdes1." de ".$anno1;}
                                ?>
                        </font>
                        <br><br>
                        <table cellpadding="0" cellspacing="0" border="0" width="150">
                            <tr>
                                <td>
                                  <div align="center">
                                    <table class="Advertencia" cellpadding="0" cellspacing="0" border="0" width="115">
                                        <tr>
                                            <td>
                                            <?php
                                            $idficha=$ideusu0;
                                            if (empty($nombre_img)) {	$nombre_img2 = "perfil_jpg";}else{$nombre_img2 = $nombre_img;}
                                            if (empty($ruta_img)) {	$ruta_img2 = "imagen/perfil.jpg";}else{$ruta_img2 = $ruta_img;}
                                            if (empty($exten_img)) {	$exten_img2 = "JPG";}else{$exten_img2 = $exten_img;}
                                            if ($imgusu0!="")
                                            {
                                                $ruta_img2 = $imgusu0;
                                            }else{
                                                $ruta_img2 = $ruta_img2;
                                            }
                                            ?>
                                            <img src="perfil/<?php echo @$ruta_img2; ?>" border="0" alt="Foto del Usuario" title="Foto del Usuario" width="115">
                                            <input type="hidden" name="nombre_img" value="<?php echo @$nombre_img2; ?>">
                                            <input type="hidden" name="ruta_img" value="<?php echo @$ruta_img2; ?>">
                                            <input type="hidden" name="exten_img" value="<?php echo @$exten_img2; ?>">
                                            </td>
                                        </tr>
                                    </table>
                                    <p>Foto del Usuario.</p>
                                  </div>
                           	  </td>
                       	  </tr>
					    </table>
				      </td>
			      </tr>
				  <tr>
					  <td valign="top">
                        <font style="color:#333; font-weight:bold;">
                        Cambiar Contraseña.
                        </font>
                        <br>
					    <font style="color:#333; font-weight:bold;">
                        Cambiar Pines de los Perfiles.
                        </font>
                      </td>
			      </tr>
   	          </table>
    <br>
					<?php
					$perfilmenuact="dJTfAev-r0Fg3U5";
					$perfilmenu="dA-g3JTfUerV50F";
					include ('notificacion.php');
					?>
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


