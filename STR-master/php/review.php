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
	<title>Products</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../css/main.css">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../js/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="../js/material.min.js" ></script>
	<script src="../js/sweetalert2.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../js/main.js" ></script>
</head>
<body onload="rev();"><!--Rev cont por convert-->
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
		include "cargar_datos_in.php";
		include "func_test.php";
		//$perfil=$_SESSION['perfil'];
	?>
	<!-- pageContent CARGA DEL CONTENIDO DE PELICULAS! -->
	<section class="full-width pageContent">

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Revisar contenido
							</div>
							<div class="full-width panel-content">
								
														
			                <div class="full-width panel-content">
                                <form id="FrmAprDes" name="FrmAprDes">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop"><!----->
											
										<form action="" method="POST" enctype="multipart/form-data">
								<h5 class="text-condensedLight">Seleccione el Contenido</h5>
									<div class="mdl-grid">
										

									<div id="tlist" style="height: 720px !important; overflow: auto; width:100%; max-width:1280px; padding: 5px">

											<table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
												
                                   				<thead>
                                                   <tr>
                                                        <th class="mdl-data-table__cell--non-numeric">Id</th>
                                                        <th>Nombre</th>
														<th hidden>SD</th>
														<th>HD</th>
														<th hidden>FHD</th>
														<th hidden>QHD</th>
                                                        <th>Logo</th>
                                                        <th>Imagen Principal</th>
                                                        <th>Imagen Categoría</th>
                                                        <th>Cover</th>
                                                        <th>Trailer</th>
                                                        <th>Contenido</th>
                                                        
                                                    
                                                    </tr>
                                    			</thead>
												<tbody>
												
												<?php
													$mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
													if ($mysqli->connect_errno) {
														echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
													}
													

													$resultado = $mysqli->query("SELECT idecon04, nomcon04, nomco204, sincon04, tipcon04, clacon04, catcon04, durcon04,
                                                        fecpro04, feclan04, procon04, calcon04, forcon04, sincon04, status04  FROM maecon04 WHERE status04='REV'");

													$resultado->data_seek(0);
													$bot = "";
													while ($fila = $resultado->fetch_assoc()) {
														$bot = $bot + 1;
														$id= $fila['idecon04'];
														$calidad_sd = "";
														$calidad_hd = "";
														$calidad_fhd = "";
														$calidad_qhd = "";
														$file = "";
														

														$resultado3 = $mysqli->QUERY("SELECT sdruta19, hdruta19, fhdrut19, 4kruta19 FROM maerut19 WHERE idcont19=$id");
														$valores3 = $resultado3->fetch_assoc();

														$calidad_sd = $valores3['sdruta19'] .$id .".mp4";
														$calidad_hd = $valores3['hdruta19'] .$id .".mp4";
														$calidad_fhd = $valores3['fhdrut19'] .$id .".mp4";
														$calidad_qhd = $valores3['4kruta19'] .$id .".mp4";
														
														/*Revisa existencia del archivo en calidad FHD*/
														$ruta_review = $letarray[0] .$almarray[0];
														$result = verificarArchivo($id, $ruta_review);
														/********************************************** */  
															echo "<tr hidden>";
															echo "<td hidden>" . $result["id"] . "</td>";
															echo "<td hidden>" . $result["ruta"] . "</td>";
															echo '<td hidden id="'.$bot.'status" >' . $result["estado"] . '</td>';
															echo "<td hidden>" . $result["rr"] . "</td>";
															echo "</tr hidden>";

													
																																					
														echo ' 
                                                        <tr onclick="ob1('.$bot.')" class="'.$bot.'btn-temp" id="btn-temp">
                                                            <td id="'.$bot.'ide_cont" class="mdl-data-table__cell--non-numeric" value="'.$bot.'">'.$fila['idecon04'].'</td>
                                                            <td id="'.$bot.'nom_cont" value="'.$bot.'">'.$fila['nomcon04'].'</td>
                                                            <td id="'.$bot.'nom_cont2" value="'.$bot.'" hidden>'.$fila['nomco204'].'</td>
                                                            <td id="'.$bot.'sinop" value="'.$bot.'" hidden>'.$fila['sincon04'].'</td>
                                                            <td id="'.$bot.'tip_cont" value="'.$bot.'" hidden>'.$fila['tipcon04'].'</td>
                                                            <td id="'.$bot.'cla_cont" value="'.$bot.'" hidden>'.$fila['clacon04'].'</td>
                                                            <td id="'.$bot.'cat_cont" value="'.$bot.'" hidden>'.$fila['catcon04'].'</td>
                                                            <td id="'.$bot.'dur_cont" value="'.$bot.'" hidden>'.$fila['durcon04'].'</td>
															<td id="'.$bot.'fec_prod" value="'.$bot.'" hidden>'.$fila['fecpro04'].'</td>
															<td id="'.$bot.'fec_lanz" value="'.$bot.'" hidden>'.$fila['feclan04'].'</td>
															
															<td id="'.$bot.'cal_sd" value="'.$bot.'" hidden>'.$calidad_sd.'</td>
                                                            <td id="'.$bot.'cal_hd" value="'.$bot.'" hidden>'.$calidad_hd.'</td>
                                                            <td id="'.$bot.'cal_fhd" value="'.$bot.'" hidden>'.$calidad_fhd.'</td>
                                                            <td id="'.$bot.'cal_qhd" value="'.$bot.'" hidden>'.$calidad_qhd.'</td>
															
															';
															if ($result["estado"] != "Existe") {
																echo '
																<td hidden> <label style="background:red" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="sd">SD</label> </td>
																<td hidden> <label style="background:red" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label></td>
																<td> <label style="background:red" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label></td>
																<td hidden> <label class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label></td>';
															}else{
																echo '
																<td hidden> <label style="background:red" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="sd">SD</label> </td>
																<td hidden> <label style="background:green" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label></td>
																<td> <label style="background:green" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label></td>
																<td hidden> <label class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label></td>';

															}

															echo '


                                                            <td><img class="img_log" width=60 height=30 src="/logos/'.$id.'.png"></td>
                                                            <td><img class="img_pri" width=50 height=50 src="/prin/'.$id.'.webp"></td>
                                                            <td><img class="img_cat" width=60 height=30 src="/prin/cat/'.$id.'.webp"></td>
                                                            <td><img class="img_cov" width=40 height=50 src="/cover/'.$id.'.webp"></td>
                                                            <td><a href="/../../../'.$almarray[3].''.$id.'.mp4" class="full-width">Ver</a></td>
                                                            <td><a href="/../../../'.$aliarray[0].''.$almarray[0].''.$id.'" class="full-width">Ver</a></td>`

                                                        </tr>	

                                                        ';
													}
												?>
                                    			</tbody>
													
											</table>
										</div>
									</div>
								</form>
										</div><!---->
										
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
										
										<h5 class="text-condensedLight">Contenido seleccionado</h5>									
										<div id="tlist" style="height: 720px !important; overflow: auto; width:100%; max-width:1280px; padding: 5px">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
										
												<input id="ide_conte" name="ide_conte" class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="BarCode" value="0" readonly>
												<label class="mdl-textfield__label" for="BarCode">Codigo Contenido</label>
												<span class="mdl-textfield__error">Invalid barcode</span>	
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input id="nom_conte" name="nombre_UP" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value=" " readonly>
												<label class="mdl-textfield__label" for="NameProduct">Nombre</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input id="nom_conte2" name="nom_conte2" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value=" " readonly>
												<label class="mdl-textfield__label" for="NameProduct">Nombre 2</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input id="sinop" name="sinop" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value=" " readonly>
												<label class="mdl-textfield__label" for="NameProduct">Sinopsis</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<h5 class="text-condensedLight">Detalles</h5>	
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<div class="image-container">
													<img style="border-radius: 5px" id="img_conte" class="img_conte" width=100px height=150px>
													<input type="file" accept="image/jpeg" class="edit-button" data-target="img_conte">
       												<i class="material-icons">edit</i>
												</input>	<span class="mdl-textfield__error">Invalid name</span>
													
													
												</div>
												<img style="border-radius: 5px" id="img_princ" class="img_princ" width=160px height=100px>
												<img style="border-radius: 5px" id="img_cat" class="img_cat" width=100px height=150px>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											
												<video id="repcont" class="repcont" width="160" height="100" autoplay preload onloadstart="this.volume=1" autoplay controls controlsList="nodownload" disablePictureInPicture>
													<source src="" type="video/mp4">
													<track label="Español" kind="subtitles" srclang="es" >
													<source src="" type="video/webm">
													<track label="Español" kind="subtitles" srclang="es" >
														Tu navegador no es compatible con este formato, consulta la guia de compatibilidad en los ajustes de tu equipo (mp4, mkv).
												</video>
												</div>
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
											
													<video id="reptra" class="repcont" width="160" height="100" autoplay preload onloadstart="this.volume=1" autoplay controls controlsList="nodownload" disablePictureInPicture>
														<source src="" type="video/mp4">
														<track label="Español" kind="subtitles" srclang="es" >
														<source src="" type="video/webm">
														<track label="Español" kind="subtitles" srclang="es" >
															Tu navegador no es compatible con este formato, consulta la guia de compatibilidad en los ajustes de tu equipo (mp4, mkv).
													</video>
													<form id="#form" class="upload-form" action="upload_trailer.php?idegrilla='.$id.'"  method="post" enctype="multipart/form-data">
													
														<label id="id" readonly hidden></label>                             
																					
														<label class="label" for="filess" id="tra"><i class="fa-solid fa-folder-open fa-2x"></i>Seleccione trailer ...</label>
														<input id="filess" type="file" name="tra" hidden>

														<div class="progress" id="progress"></div>
														<button class="button" type="submit">Upload</button>
														<div class="result"></div>
													</form>
												</div>
												
													<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div id="quality-labels">
												
													<label id="quality-labels-sd" for="sd">SD</label>
												
												<label id="quality-labels-hd" for="hd">HD</label>
												<label id="quality-labels-fhd" for="fhd">FHD</label>
												<label id="quality-labels-qhd" for="qhd">QHD</label>
												
											</div>
											<h5 class="text-condensedLight">Datos generales</h5>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input id="tip_conte" name="tip_conte" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value=" " readonly>
												<label class="mdl-textfield__label" for="tip_conte">Tipo</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
                                            
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input id="cla_conte" name="cla_conte" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value=" " readonly>
												<label class="mdl-textfield__label" for="cla_conte">Clase</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
										
											<h5 class="text-condensedLight">Otros Datos</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input id="cat_conte" name="cat_conte" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value=" " readonly>
												<label class="mdl-textfield__label" for="cat_conte">Categoria</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="dur_conte" name="dur_conte" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value=" " readonly>
												<label class="mdl-textfield__label" for="dur_conte">Duracion</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<label class="mdl-textfield__label">Fecha Produccion</label>
												<input name="Fecha-Pro" type="date" class="mdl-textfield__input" id="Fecha-Pro" value="">
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<label class="mdl-textfield__label">Fecha Lanzamiento</label>
												<input name="Fecha-Lan" type="date" class="mdl-textfield__input" id="Fecha-Lan" value="">
											</div>
											
                                                    <br>
                                                    <label class="" for="">Devolver:</label>
                                                        <br>
                                                        <br>
                                                        <label class="" for="">Nivel 1</label>
                                                        <input name="nivel1" type="checkbox" value="1">
                                                        <br>
                                                        <label class="" for="">Nivel 2</label>
										                <input name="nivel2" type="checkbox" value="2">
										    </div>
                                                    <!--button aprobar y desaprobar anteriormente aqui! -->
													<button type="submit" name="buttonDev" value="" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-danger" id="buttonDev" onclick="devolver()">X</button>
                                                    <div class="mdl-tooltip" for="buttonDev">Devolver Contenido</div>
										        <button disabled class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct"><i class="zmdi zmdi-plus"></i></button>
										            <div class="mdl-tooltip" for="btn-addProduct"></div>
                                                <button type="submit" name="buttonApr" value="" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-success" id="buttonApr" onclick="aprobar()">✔</button>
                                                    <div class="mdl-tooltip" for="buttonApr">Aprobar Contenido</div>
										</div>
									</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>
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
	formulario.action = "desaprobar.php";
	formulario.method = "POST";
	formulario.enctype= "multipart/form-data";
	formulario.submit();
}

function aprobar(){
	formulario.action = "aprobar.php";
	formulario.method = "POST";
	formulario.enctype= "multipart/form-data";
	formulario.submit();
}

function revisar(){
	formulario.action = "review.php";
	formulario.submit();
}

// Declare global variables for easy access 
const idelement = document.querySelector('#id');
const elemento = idelement.innerHTML;
const uploadForm = document.querySelector('.upload-form');
							
//const filesInput = uploadForm.querySelector('#filess' + elemento);
const filesInput = uploadForm.querySelector('#filess');

filesInput.onchange = () => {																	
	const labelelem = document.getElementById("tra");
	labelelem.innerHTML = filesInput.files[0].name; 								
};
							

// Attach submit event handler to form
uploadForm.onsubmit = event => {
	event.preventDefault();
	// Make sure files are selected
	if (!filesInput.files.length) {
		uploadForm.querySelector('.result').innerHTML = 'Please select a file!';
	} else {
		// Create the form object
		let uploadFormData = new FormData(uploadForm);
		// Initiate the AJAX request
		let request = new XMLHttpRequest();
		// Ensure the request method is POST
		request.open('POST', uploadForm.action);
		// Attach the progress event handler to the AJAX request
		
		request.upload.addEventListener('#progress', event => {
			// Add the current progress to the button
			uploadForm.querySelector('.button').innerHTML = 'Uploading... ' + '(' + ((event.loaded/event.total)*100).toFixed(2) + '%)';
			// Update the progress bar
			uploadForm.querySelector('#progress').style.background = 'linear-gradient(to right, #25b350, #25b350 ' + Math.round((event.loaded/event.total)*100) + '%, #e6e8ec ' + Math.round((event.loaded/event.total)*100) + '%)';
			// Disable the submit button
			uploadForm.querySelector('.button').disabled = true;
		});
		// The following c	ode will execute when the request is complete
		request.onreadystatechange = () => {
		if (request.readyState == 4 && request.status == 200) {
			// Output the response message
			uploadForm.querySelector('.result').innerHTML = request.responseText;
		}
	};
	// Execute request
	request.send(uploadFormData);
	}
};
</script>

</body>
</html>