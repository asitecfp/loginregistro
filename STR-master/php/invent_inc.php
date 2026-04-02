<?php
    $perfupdat='';
	$tipousua='';
	$usuario='';
    $perfupdat = @$_GET['perfupdat'];
	
	error_reporting(1);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')</script>
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
		include 'cargar_datos_in.php';
		include 'funciones_mas.php';
		//$perfil=$_SESSION['perfil'];
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
			<div id="tlist_all" style="overflow: auto; height: 100%; max-height:720px; width:100%; max-width:1280px; padding: 5px">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
						<th class="mdl-data-table__cell--non-numeric">Cant.</th>
							<th class="mdl-data-table__cell--non-numeric">Id</th>
							<th>Nombre</th>
							<th>Categoria</th>
							
                            <th hidden>Calidad</th>
                            <th hidden>Formato</th>
							<th>Usuario</th>
                          <!---  <th>Sinopsis</th> -->
                            <th>Estatus</th>
                            <th>Triler / Contenido</th>
                          
						</tr>
					</thead>
					<tbody>
                        <?php
                            $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
                            if ($mysqli->connect_errno) {
                                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
							$usuario= $_SESSION['usuario'];
							
							if ($tipousua=='admin'){
                            $resultado = $mysqli->query("SELECT idecon04, nomcon04, catcon04, durcon04, fecpro04, feclan04, procon04, calcon04, forcon04,
                                                                sincon04, tipcon04, status04, usuari04 FROM maecon04 WHERE status04='DEV' and nivest04<>'1' OR status04='INC'");
							}
							if($tipousua=='contri'){
							$resultado = $mysqli->query("SELECT idecon04, nomcon04, catcon04, durcon04, fecpro04, feclan04, procon04, calcon04, forcon04,
                                                                sincon04, tipcon04, status04, usuari04 FROM maecon04 WHERE status04='DEV' and nivest04<>'1' and usuari04='$usuario' OR status04='INC' and usuari04='$usuario'");
							}
                            $resultado->data_seek(0);
                            $bot = "";
                            while ($fila = $resultado->fetch_assoc()) {
                                $bot = $bot + 1;
								$id = $fila['idecon04'];
								$tipcon = $fila['tipcon04'];
								$estatus = $fila['status04'];
								if ($bot <= 1) {
									if ($tipcon == "Pelicula") {
                                echo ' 
                                    <tr>
									<td name='.$bot.'>'.$bot.'</td>
									<td>'.$fila['idecon04'].'</td>
								
                                        <td>'.$fila['nomcon04'].'</td>
                                        <td>'.$fila['catcon04'].'</td>
                                        
                                        <td hidden>'.$fila['calcon04'].'</td>
                                        <td hidden>'.$fila['forcon04'].'</td>
										<td>'.$fila['usuari04'].'</td>
                                        <td mame="status'.$bot.'">'.$fila['status04'].'</td>
                                        <td>
                                            <form id="#form'.$bot.'" class="upload-form" action="upload_cont.php?idegrilla='.$fila['idecon04'].'&tipcon='.$fila['tipcon04'].'&estatus='.$fila['status04'].'" method="post" enctype="multipart/form-data">
												<label id="id" readonly hidden>'.$bot.'</label>
                                                
												<label class="label'.$bot.'" for="files'.$bot.'" id="tra"><i class="fa-solid fa-folder-open fa-2x"></i>Selecccione trailer ...</label>
                                                <input id="files'.$bot.'" type="file" name="tra" hidden>                                   
                                    										
												<label class="label'.$bot.'" for="filess'.$bot.'" id="con"><i class="fa-solid fa-folder-open fa-2x"></i>Seleccione contenido ...</label>
												<input id="filess'.$bot.'" type="file" name="con" hidden>

												<div class="progress"></div>
												<button class="button'.$bot.'" type="submit">Upload</button>
												<div class="result"></div>
											</form>
									</td>
                                    </tr>';	}
									if ($tipcon == "Serie") {
										echo ' 
											<tr>
											<td name='.$bot.'>'.$bot.'</td>
											<td>'.$fila['idecon04'].'</td>
										
												<td>'.$fila['nomcon04'].'</td>
												<td>'.$fila['catcon04'].'</td>
												
												<td hidden>'.$fila['calcon04'].'</td>
												<td hidden>'.$fila['forcon04'].'</td>
												<td>'.$fila['usuari04'].'</td>
												<td mame="status'.$bot.'">'.$fila['status04'].'</td>
												<td>
													<form id="#form'.$bot.'" class="upload-form" action="upload_cont.php?idegrilla='.$fila['idecon04'].'&tipcon='.$fila['tipcon04'].'&estatus='.$fila['status04'].'" method="post" enctype="multipart/form-data">
														<label id="id" readonly hidden>'.$bot.'</label>
														
														<label class="label'.$bot.'" for="files'.$bot.'" id="tra"><i class="fa-solid fa-folder-open fa-2x"></i>Selecccione trailer ...</label>
														<input id="files'.$bot.'" type="file" name="tra" hidden>                                   
																					
														<div class="progress"></div>
														<button class="button'.$bot.'" type="submit">Upload</button>
														<div class="result"></div>
													</form>
											</td>
											</tr>';	}
								}
								if ($bot <> 1) {
									
									$id = $fila['idecon04'];
									echo ' 
										<tr>
										<td name='.$bot.'>'.$bot.'</td>
										<td>'.$fila['idecon04'].'</td>
									
											<td>'.$fila['nomcon04'].'</td>
											<td>'.$fila['catcon04'].'</td>
											
											<td hidden>'.$fila['calcon04'].'</td>
											<td hidden>'.$fila['forcon04'].'</td>
											<td>'.$fila['usuari04'].'</td>
											<td mame="status'.$bot.'">'.$fila['status04'].'</td>
											<td>
												
											</td>
										
										</tr>';	
								}
							}
                            
							
                        ?>
						
						<script>
        
								// Declare global variables for easy access 
							const idelement = document.querySelector('#id');
							const elemento = idelement.innerHTML;
							const uploadForm = document.querySelector('.upload-form');
							
							const filesInput = uploadForm.querySelector('#files' + elemento);
							filesInput.onchange = () => {
																	
								const labelelem = document.getElementById("tra");
								labelelem.innerHTML = filesInput.files[0].name; 								
							};
							
							const filesInputt = uploadForm.querySelector('#filess' + elemento);
							filesInputt.onchange = () => {
																	
								const labeleleme = document.getElementById("con");
								labeleleme.innerHTML = filesInputt.files[0].name; 
								
							};
								// Attach submit event handler to form
							uploadForm.onsubmit = event => {
								event.preventDefault();
									// Make sure files are selected
								//if (!filesInput.files.length || !filesInputt.files.length) {
								//	uploadForm.querySelector('.result').innerHTML = 'Please select a file!';
								//} else {
										// Create the form object
									let uploadFormDate = new FormData(uploadForm);
										// Initiate the AJAX request
									let request = new XMLHttpRequest();
										// Ensure the request method is POST
									request.open('POST', uploadForm.action);
										// Attach the progress event handler to the AJAX request
									request.upload.addEventListener('progress', event => {
										// Add the current progress to the button
										uploadForm.querySelector('button').innerHTML = 'Uploading... ' + '(' + ((event.loaded/event.total)*100).toFixed(2) + '%)';
											// Update the progress bar
										uploadForm.querySelector('.progress').style.background = 'linear-gradient(to right, #25b350, #25b350 ' + Math.round((event.loaded/event.total)*100) + '%, #e6e8ec ' + Math.round((event.loaded/event.total)*100) + '%)';
											// Disable the submit button
										uploadForm.querySelector('button').disabled = true;
									});
										// The following code will execute when the request is complete
									request.onreadystatechange = () => {
										if (request.readyState == 4 && request.status == 200) {
												// Output the response message
											uploadForm.querySelector('.result').innerHTML = request.responseText;
										}
										
									};
									// Execute request
									request.send(uploadFormDate);
								//}
							};
							
							</script>
						<?php
							//Verifica espacio de almacenamiento
							$uni_t = $letarray[3];
							$uni_c = $letarray[0];
							
							ver_space_disk($uni_t, $uni_c);
						?>
					</tbody>
				
				</table>
				</div>	
			</div>
		</div>
	</section>
</body>



</html>