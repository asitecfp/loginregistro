<?php
    $perfupdat='';
	$tipousua='';
    $perfupdat = @$_GET['perfupdat'];
	
    session_start();
	
	$tipousua= $_SESSION['tipousuario'];
	
	if (($tipousua=='admin')||($tipousua=='contri')){
		echo '
        <script>
           // alert("Administrador de contenido");
           // window.location = "index.php";
        </script>
        ';
	}else{
		echo '
        <script>
            alert("No autorizado");
            window.location = "../../index.php";
        </script>
        ';
	}

    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("Debe iniciar sesión para ver este contenido");
            window.location = "../../index.php";
        </script>
        ';
      
        session_destroy();
        die();
    }        
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inventory</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../css/main.css">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="../js/material.min.js" ></script>
	<script src="../js/sweetalert2.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../js/main.js" ></script>
</head>
<body>
	<!-- Notifications area -->
	<section class="full-width container-notifications">
		<div class="full-width container-notifications-bg btn-Notification"></div>
	    <section class="NotificationArea">
	        <div class="full-width text-center NotificationArea-title tittles">Notifications <i class="zmdi zmdi-close btn-Notification"></i></div>
	        <a href="#" class="Notification" id="notifation-unread-1">
	            <div class="Notification-icon"><i class="zmdi zmdi-accounts-alt bg-info"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle"></i>
	                    <strong>New User Registration</strong> 
	                    <br>
	                    <small>Just Now</small>
	                </p>
	            </div>
	        	<div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-1">Notification as UnRead</div> 
	        </a>
	        <a href="#" class="Notification" id="notifation-read-1">
	            <div class="Notification-icon"><i class="zmdi zmdi-cloud-download bg-primary"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle-o"></i>
	                    <strong>New Updates</strong> 
	                    <br>
	                    <small>30 Mins Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-1">Notification as Read</div>
	        </a>
	        <a href="#" class="Notification" id="notifation-unread-2">
	            <div class="Notification-icon"><i class="zmdi zmdi-upload bg-success"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle"></i>
	                    <strong>Archive uploaded</strong> 
	                    <br>
	                    <small>31 Mins Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-unread-2">Notification as UnRead</div>
	        </a> 
	        <a href="#" class="Notification" id="notifation-read-2">
	            <div class="Notification-icon"><i class="zmdi zmdi-mail-send bg-danger"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle-o"></i>
	                    <strong>New Mail</strong> 
	                    <br>
	                    <small>37 Mins Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-2">Notification as Read</div>
	        </a>
	        <a href="#" class="Notification" id="notifation-read-3">
	            <div class="Notification-icon"><i class="zmdi zmdi-folder bg-primary"></i></div>
	            <div class="Notification-text">
	                <p>
	                    <i class="zmdi zmdi-circle-o"></i>
	                    <strong>Folder delete</strong> 
	                    <br>
	                    <small>1 hours Ago</small>
	                </p>
	            </div>
	            <div class="mdl-tooltip mdl-tooltip--left" for="notifation-read-3">Notification as Read</div>
	        </a>  
	    </section>
	</section>
	<!-- navBar -->
	<div class="full-width navBar">
		<div class="full-width navBar-options">
			<i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			<div class="mdl-tooltip" for="btn-menu">Menu</div>
			<nav class="navBar-options-list">
				<ul class="list-unstyle">
					<li class="btn-Notification" id="notifications">
						<i class="zmdi zmdi-notifications"></i>
						<!-- <i class="zmdi zmdi-notifications-active btn-Notification" id="notifications"></i> -->
						<div class="mdl-tooltip" for="notifications">Notifications</div>
					</li>
					<li class="btn-exit" id="btn-exit">
						<i class="zmdi zmdi-power"></i>
						<div class="mdl-tooltip" for="btn-exit">LogOut</div>
					</li>
					<li class="text-condensedLight noLink" ><small>User Name</small></li>
					<li class="noLink">
						<figure>
							<img src="../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
						</figure>
					</li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- navLateral -->
	<?php 
		include 'menu.php';
		//$perfil=$_SESSION['perfil'];
		include 'cargar_datos_in.php';
	?>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-store"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Lista de registros del contenido por revisar y aprobar
				</p>
			</div>
		</section>
		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<form id="FrmAprDes" name="FrmAprDes">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>					
						<tr>
							<th>Cant.</th>
							<th class="mdl-data-table__cell--non-numeric" hidden>Id</th>
							<th>Id Cont.</th>
							<th>Nombre contenido</th>
							<th>Temporada</th>
							<th>Capitulo</th>
							<th>Fecha</th>
							<th>Fecha</th>
							<th>Usuario</th>
                       <!---  <th>Sinopsis</th> -->
                            <th hidden>Estatus</th>
							<th>Nivel 1</th>
							<th>Nivel 2</th>
                            <th>Devolver</th>
							<th>Revisar</th>
                            <th>Aprobar</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
                            if ($mysqli->connect_errno) {
                                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                        
							$resultado = $mysqli->query("SELECT * FROM maecap18 WHERE status18='REV'");

                            $resultado->data_seek(0);
                            $bot = 0;
                            while ($fila = $resultado->fetch_assoc()) {
								$bot++;
								if ($bot <= 1) {
                                echo '
								
                                    <tr id="col">
										<td name='.$bot.'>'.$bot.'</td>
                                        <td  class="mdl-data-table__cell--non-numeric" value="'.$fila['idcapi18'].'" hidden>'.$fila['idcapi18'].'</td>
										';
										$idcont = $fila['idcont18'];
										$valores='';
										$nomcont = '';
										$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
										$query = $mysqli -> query ("SELECT nomcon04 FROM maecon04 WHERE idecon04=$idcont");
                            			$valores = $query->fetch_assoc();				
								   		$nomcont = $valores['nomcon04'];
								   
								   echo '
                                  		<td>'.$fila['idcont18'].'</td>      
								   		<td>'.$nomcont.'</td>
                                        <td>'.$fila['idtemp18'].'</td>
                                        <td>'.$fila['numcap18'].'</td>
                                        <td>'.$fila['feccap18'].'</td>
										<td>'.$fila['usucap18'].'</td>
										<td hidden><input id="diractu" name="diractu" class="diractu" value="'.$fila['dircap183'].'">'.$fila['dircap183'].'</td>
                                       	<td hidden>'.$fila['status18'].'</td>
										<td><input name="nivel1" type="checkbox" value="1"></td>
										<td><input name="nivel2" type="checkbox" value="2"></td>
                                        <td><button type="submit" name="buttonDev" value="'.$fila['idcapi18'].'" class="buttonDev" id="buttonDev'.$bot.'" onclick="devolver()">X</button></td>
										<!--<td><button type="submit" onclick="revisar()" class="buttonRev" id="buttonRev'.$bot.'">O</button></td>-->
										<td>	<video id="repcont" class="repcont" width="160" height="100" autoplay preload onloadstart="this.volume=1" autoplay controls controlsList="nodownload" disablePictureInPicture>
													<source src="/../../../'.$aliarray[1].''.$almarray[1].''.$fila['idcapi18'].'" type="video/mp4">
													<track label="Español" kind="subtitles" srclang="es" >
													<source src="" type="video/webm">
													<track label="Español" kind="subtitles" srclang="es" >
														Tu navegador no es compatible con este formato, consulta la guia de compatibilidad en los ajustes de tu equipo (mp4, mkv).
												</video></td>
                                        <td><button type="submit" name="buttonApr" value="'.$fila['idcapi18'].'" class="buttonApr" id="buttonApr'.$bot.'" onclick="aprobar()">✔</button></td>
                                    </tr>
								';
								
								}
								if ($bot <> 1) {
									echo ' 
                                    <tr disabled>
										<td name='.$bot.'>'.$bot.'</td>
                                        <td class="mdl-data-table__cell--non-numeric" hidden>'.$fila['idcapi18'].'</td>

										';
										$idcont = $fila['idcont18'];
										$valores='';
										$nomcont = '';
										$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
										$query = $mysqli -> query ("SELECT nomcon04 FROM maecon04 WHERE idecon04=$idcont");
                            			$valores = $query->fetch_assoc();				
								   		$nomcont = $valores['nomcon04'];
								   
								   	echo '
										<td>'.$fila['idcont18'].'</td>
									   	<td>'.$nomcont.'</td>
                                        <td>'.$fila['idtemp18'].'</td>
                                        <td>'.$fila['numcap18'].'</td>
                                        <td>'.$fila['feccap18'].'</td>
										<td>'.$fila['usucap18'].'</td>
                                        <td hidden>'.$fila['status18'].'</td>
										<td><input type="checkbox" disabled></td>
										<td><input type="checkbox" disabled></td>
                                        <td><button onclick="" class="buttonDev" id="buttonDev'.$bot.'" type="submit" disabled>-</button></td>
										<!--<td><a href="review.php"><button class="buttonRev" id="buttonRev'.$bot.'" src="review.php" disabled>-</button></a></td>--->
										<td><a href="/../../../'.$aliarray[1].''.$almarray[1].''.$fila['idcapi18'].'" class="buttonRev">Ver</a></td>
                                        <td><button class="buttonApr" id="buttonApr'.$bot.'" class="buttonA" type="submit" disabled>-</button></td>
                                    </tr>';

								}
                            }
                        ?>
					</tbody>
				</table>
				</form>
			</div>
		</div>
	</section>
	<script>
//var tabla = document.getElementById('col');
//function devolver(){	
//tabla.submit();
//tabla.remove();

var formulario = document.getElementById('FrmAprDes');

function devolver(){
	formulario.action = "desaprobar_ser.php";
	formulario.method = "POST";
	formulario.enctype= "multipart/form-data";
	formulario.submit();
}

function aprobar(){

	formulario.action = "aprobar_ser.php";
	formulario.method = "POST";
	formulario.enctype= "multipart/form-data";
	formulario.submit();
}

function revisar(){
	formulario.action = "review_ser.php";
	formulario.submit();
}
</script>

</body>

</html>