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
		include 'cargar_datosf_in.php';
		include 'func_test.php';
		//$perfil=$_SESSION['perfil'];
		error_reporting(1);
	?>
	<!-- pageContent -->
	<section class="full-width pageContent">
	<input class="campo-busqueda" type="search" placeholder="Buscar..." onkeyup="filtrar()">
	<label for="tipcon">Tipo contenido:</label>

		<select id="tipcon">
			<option value="Pelicula">Pelicula</option>
			<option value="Serie">Serie</option>
			<option value="Documental">Documental</option>
			<option value="Anime">Anime</option>
		</select>
  
		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid" >
		<div id="tlist_all" style="height: 100%; max-height:1200 px; width:100%; padding: 5px">
		<div id="tlist_all" style="overflow: auto; height: 100%; max-height:100%; width:100%; max-width:1920px; padding: 5px">
			<!--<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">-->
			<!--<input class="campo-busqueda" type="search" placeholder="Buscar..." onkeyup="filtrar()">-->
			<form method="post" action="convert_tra.php">
			<button type="submit" name="convertir">Convertir Seleccionados</button>
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">Id</th>
							<th>Nombre</th>
							<th>Categoria</th>
							<th>Duracion</th>
							<th>Fecha Prod.</th>
                            <th>Fecha Lanz.</th>
                            <th>Productora</th>
							<th>Tipo</th>
                            <th>Calidad</th>
                            <th>Formato</th>
                          <!---  <th>Sinopsis</th> -->
                            <th>Estatus</th>
                            <th hidden>Triler</th>
                            <th hidden>Contenido</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
                            if ($mysqli->connect_errno) {
                                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                        
							$resultado = $mysqli->query("SELECT idecon04, nomcon04, catcon04, durcon04, fecpro04, feclan04, procon04, tipcon04, calcon04, forcon04,
                                                                 sincon04, status04, dirtra04, dircon04  FROM maecon04 WHERE idecon04>690 and tipcon04='Pelicula' and status04='REV'");
                            // $resultado = $mysqli->query("SELECT idecon04, nomcon04, catcon04, durcon04, fecpro04, feclan04, procon04, tipcon04, calcon04, forcon04,
                              //                                   sincon04, status04, dirtra04, dircon04  FROM maecon04 WHERE idecon04=702 and tipcon04='Serie' and status04='REV'");
																//status04='REV'378
							
                            $resultado->data_seek(0);
                            $bot = "";
							$count = 0;
							$count_sd = "";
							$count_hd = "";
							$count_fhd = "";
                            while ($fila = $resultado->fetch_assoc()) {
                                $bot = $bot + 1;
								$id = $fila['idecon04'];

								$resultado3 = $mysqli->QUERY("SELECT sdruta19, hdruta19, fhdrut19, 4kruta19 FROM maerut19 WHERE idcont19=$id");
														$valores3 = $resultado3->fetch_assoc();

														$calidad_sd = $valores3['sdruta19'];
														$calidad_hd = $valores3['hdruta19'];
														$calidad_fhd = $valores3['fhdrut19'];
														$calidad_qhd = $valores3['4kruta19'];
								
								
                                
								echo ' 
                                    <tr>
										<td><input type="checkbox" name="videos[]" value="'.$fila['idecon04']. '"></td>
                                        <td class="mdl-data-table__cell--non-numeric">'.$fila['idecon04'].'</td>
                                        <td>'.$fila['nomcon04'].'</td>
                                        <td>'.$fila['catcon04'].'</td>
                                        <td>'.$fila['durcon04'].'</td>
                                        <td>'.$fila['fecpro04'].'</td>
                                        <td>'.$fila['feclan04'].'</td>
                                        <td>'.$fila['procon04'].'</td>
										<td>'.$fila['tipcon04'].'</td>
                                        <td>'.$fila['calcon04'].'</td>
                                        <td>'.$fila['forcon04'].'</td>
                                        <td>'.$fila['status04'].'</td>
                                        <td hidden>'.$fila['dirtra04'].'</td>
                                        <td hidden>'.$fila['dircon04'].'</td>
                                    </tr>';
									/*Revisa existencia del archivo en calidad FHD*/
									$ruta_review = $letarray[0] .$almarray[0]; /* Ruta predeterminada */
									$tipcon = $fila['tipcon04'];
									$calidad_rev_trailer = "i:/trailer\mov/";
									$calidad_sd_trailer = "i:/trailer\mov/sd/";
									$calidad_hd_trailer = "i:/trailer\mov/hd/";
									$calidad_fhd_trailer = "i:/trailer\mov/fhd/";
									$calidad_qhd_trailer = "i:/trailer\mov/qhd/";
									
									if ($tipcon === "Serie"){
									
										
										/*----------------*/
												/*Disco Rev ruta l*/
										$estatus = $fila['status04'];
										
										if ($estatus === "REV") {
											$ruta_real = "l:\cont\series/";
										}
												
										/*-------Revisa el archivo mov en revision---------*/
										
										$result = verificarArchivo($id, $ruta_real);
										

										echo '<tr><td></td><td>';
													echo'
													<label>'.$tipcon.'</label>
													<label>'.$capit.'</label>
													<label>'.$ruta_real_sd.'</label>
													<label>'.$ruta_real_hd.'</label>
													<label>'.$ruta_real_fhd.'</label>
													';
	
										
											echo ' </td></tr>';

										/**********Revisa los trailer************ */
										/*-------Revisa el archivo mov en revision---------*/
										
										$result = verificarArchivo($id, $calidad_rev_trailer);
										

										echo '<tr><td></td><td>';
													echo'
													<label>'.$tipcon.'</label>';
	
										if (($result["estado"] != "Existe") && ($estatus == "REV")) {
											echo '
												<label style="background:red;cursor:pointer" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">REV</label>';
											}
										if (($result["estado"] == "Existe") && ($estatus == "REV")) {
												$count_rev = $count_rev + 1;
												echo '
													<label style="background:green" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">REV</label>';
										}
									

										/*-------Revisa el archivo sd en sd---------*/


											$result = verificarArchivo($id, $calidad_sd_trailer);
												
												
											
										if ($result["estado"] != "Existe") {
												echo '
										
										
												<label style="background:red;cursor:pointer" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="hd">SD</label>';
													$count_sd = $count_sd + 1;
										}else{
												
												echo '
													<label style="background:green" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="hd">SD</label>';
										}
										/*-------Revisa el archivo hd ---------*/

											$result = verificarArchivo($id, $calidad_hd_trailer);
												 
														
										if ($result["estado"] != "Existe") {
												echo '
													<label style="background:red;cursor:pointer" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label>';
													$count_hd = $count_hd + 1;
										}else{
												echo '
													<label style="background:green" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label>';
										}
										/*-------Revisa el archivo fhd---------*/

											
											$result = verificarArchivo($id, $calidad_fhd_trailer);
													 
											
										if ($result["estado"] != "Existe") {
												echo '
													<label style="background:red;cursor:pointer" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label>';
													$count_fhd = $count_fhd + 1;
										}else{
															
												echo '
													<label style="background:green" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label>';
										}
										/*-------Revisa el archivo qhd---------*/

		
											$result = verificarArchivo($id, $calidad_qhd_trailer);
														 
											
										if ($result["estado"] != "Existe") {
												echo '
													<label style="background:red;cursor:pointer" class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label>';
													$count_qhd = $count_qhd + 1;
										}else{
															
												echo '
													<label style="background:green" class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label>';
										}

											echo ' </td></tr>';
										
											//$resultado2 = $mysqli->query("SELECT * FROM maecap18 WHERE idcont18=$id AND status18='rev' or status18='act'");
											$resultado2 = $mysqli->query("SELECT * FROM maecap18 WHERE idcont18=$id AND status18<>'rev'");
											$resultado2->data_seek(0);

											while  ($fila2 = $resultado2->fetch_assoc()) {
													/*----------------*/
													$calidad_cap_sd = "";
													$calidad_cap_hd = "";
													$calidad_cap_fhd = "";
													$calidad_cap_qhd = "";
												/*Disco Rev ruta l*/
													$estatus = $fila2['status18'];
													$tempo = $fila2['idtemp18'];
													$idcap = $fila2['idcapi18'];
													$capit = $fila2['numcap18'];

													$calidad_cap_sd = $fila2['dircap181'];
													$calidad_cap_hd = $fila2['dircap182'];
													$calidad_cap_fhd = $fila2['dircap183'];
													$calidad_cap_qhd = $fila2['dircap184'];

														$ruta_real = "";
														$ruta_real_sd = "";
														$ruta_real_hd = "";
														$ruta_real_fhd = "";
														$ruta_real_qhd = "";

													/*Disco 1 ruta g//d5-l-s/cont/series/hd/*/
										
														if ($calidad_cap_sd === "/d1-g/cont/series/sd/") {
															$ruta_real_sd = "g:\cont\series/sd/";
														}
														if ($calidad_cap_hd === "/d1-g/cont/series/hd/") {
															$ruta_real_hd = "g:\cont\series/hd/";
														}
														if ($calidad_cap_fhd === "/d1-g/cont/series/fhd/") {
															$ruta_real_fhd = "g:\cont\series/fhd/";
														}
														if ($calidad_cap_qhd === "/d1-g/cont/series/qhd/") {
															$ruta_real_qhd = "g:\cont\series/qhd/";
														}
														/*----------------*/
														/*Disco 1 ruta h*/
														
														if ($calidad_cap_sd === "/d1-h/cont/series/sd/") {
															$ruta_real_sd = "h:\cont\series/sd/";
														}
														if ($calidad_cap_hd === "/d1-h/cont/series/hd/") {
															$ruta_real_hd = "h:\cont\series/hd/";
														}
														if ($calidad_cap_fhd === "/d1-h/cont/series/fhd/") {
															$ruta_real_fhd = "h:\cont\series/fhd/";
														}
														if ($calidad_cap_qhd === "/d1-h/cont/series/qhd/") {
															$ruta_real_qhd = "h:\cont\series/qhd/";
														}
														/*----------------*/
														/*Disco 2 ruta f*/
														
														if ($calidad_cap_sd === "/d2-f/cont/series/sd/") {
															$ruta_real_sd = "f:\cont\series/sd/";
														}
														if ($calidad_cap_hd === "/d2-f/cont/series/hd/") {
															$ruta_real_hd = "f:\cont\series/hd/";
														}
														if ($calidad_cap_fhd === "/d2-f/cont/series/fhd/") {
															$ruta_real_fhd = "f:\cont\series/fhd/";
														}
														if ($calidad_cap_qhd === "/d2-f/cont/series/qhd/") {
															$ruta_real_qhd = "f:\cont\series/qhd/";
														}
														/*----------------*/
														/*Disco 3 ruta k*/
														
														if ($calidad_cap_sd === "/d3-k-s/cont/series/sd/" || $calidad_cap_sd === "/d3-k/cont/series/sd/") {
															$ruta_real_sd = "k:\cont\series/sd/";
														}
														if ($calidad_cap_hd === "/d3-k-s/cont/series/hd/" || $calidad_cap_hd === "/d3-k/cont/series/hd/") {
															$ruta_real_hd = "k:\cont\series/hd/";
														}
														if ($calidad_cap_fhd === "/d3-k-s/cont/series/fhd/" || $calidad_cap_fhd === "/d3-k/cont/series/fhd/") {
															$ruta_real_fhd = "k:\cont\series/fhd/";
														}
														if ($calidad_cap_qhd === "/d3-k-s/cont/series/qhd/" || $calidad_cap_qhd === "/d3-k/cont/series/qhd/") {
															$ruta_real_qhd = "k:\cont\series/qhd/";
														}
														/*----------------*/
														/*Disco 4 ruta e*/
													
														if ($calidad_cap_sd === "/d4-e/cont/series/sd/") {
															$ruta_real_sd = "e:\cont\series/sd/";
														}
														if ($calidad_cap_hd === "/d4-e/cont/series/hd/") {
															$ruta_real_hd = "e:\cont\series/hd/";
														}
														if ($calidad_cap_fhd === "/d4-e/cont/series/fhd/") {
															$ruta_real_fhd = "e:\cont\series/fhd/";
														}
														if ($calidad_cap_qhd === "/d4-e/cont/series/qhd/") {
															$ruta_real_qhd = "e:\cont\series/qhd/";
														}
														/*----------------*/
														/*Disco 5 ruta l*/
													
														if ($calidad_cap_sd === "/d5-l-s/cont/series/sd/") {
															$ruta_real_sd = "l:\cont\series/sd/";
														}
														if ($calidad_cap_hd === "/d5-l-s/cont/series/hd/") {
															$ruta_real_hd = "l:\cont\series/hd/";
														}
														if ($calidad_cap_fhd === "/d5-l-s/cont/series/fhd/") {
															$ruta_real_fhd = "l:\cont\series/fhd/";
														}
														if ($calidad_cap_qhd === "/d5-l-s/cont/series/qhd/") {
															$ruta_real_qhd = "l:\cont\series/qhd/";
														}
														/*----------------*/
															/*Disco 5 ruta m*/
													
														if ($calidad_cap_sd === "/d5-m/cont/series/sd/") {
															$ruta_real_sd = "m:\cont\series/sd/";
														}
														if ($calidad_cap_hd === "/d5-m/cont/series/hd/") {
															$ruta_real_hd = "m:\cont\series/hd/";
														}
														if ($calidad_cap_fhd === "/d5-m/cont/series/fhd/") {
															$ruta_real_fhd = "m:\cont\series/fhd/";
														}
														if ($calidad_cap_qhd === "/d5-m/cont/series/qhd/") {
															$ruta_real_qhd = "m:\cont\series/qhd/";
														}

													if ($estatus === "REV") {
														$ruta_real = "l:\cont\series/";
													}
															
													/*-------Revisa el archivo mov en revision---------*/
													
													$result = verificarArchivo($id, $ruta_real);
													

													echo '<tr><td></td><td>';
																echo'
																<label>ID: '.$idcap.'</label>
																<label>Temporada: '.$tempo.'</label>
																<label>Capitulo Nro.: '.$capit.'</label>
																<label>Capitulo Nro.: '.$calidad_cap_sd.'</label>
																<label>Capitulo Nro.: '.$ruta_real_sd.'</label>
																';
				
													
														echo ' </td></tr>';

													/**********Revisa los trailer************ */
													/*-------Revisa el archivo mov en revision---------*/
													
													$result = verificarArchivo($idcap, $ruta_real);
													

													echo '<tr><td></td><td>';
																echo'
																<label>'.$tipcon.'</label>';
				
													if (($result["estado"] != "Existe") && ($estatus == "REV")) {
														echo '
															<label title='.$ruta_real.' style="background:red;cursor:pointer" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">REV</label>';
														}
													if (($result["estado"] == "Existe") && ($estatus == "REV")) {
															$count_rev = $count_rev + 1;
															echo '
																<label title='.$ruta_real.' style="background:green" value="'.$idcap.'" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">REV</label>';
													}
												

													/*-------Revisa el archivo sd en sd---------*/


														$result = verificarArchivo($idcap, $ruta_real_sd);
															
															
														
													if ($result["estado"] != "Existe") {
															echo '
																<!--<label title='.$ruta_real_sd.' style="background:red;cursor:pointer" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="hd">SD</label>-->
																<label title='.$ruta_real_sd.' style="cursor:pointer" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="hd">SD</label>';
																$count_sd = $count_sd + 1;
													}else{
															
															echo '
																<label title='.$ruta_real_sd.' style="background:green" value="'.$idcap.'" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="hd">SD</label>';
													}
													/*-------Revisa el archivo hd ---------*/

														$result = verificarArchivo($idcap, $ruta_real_hd);
															
																	
													if ($result["estado"] != "Existe") {
															echo '
																<!--<label title='.$ruta_real_hd.' style="background:red;cursor:pointer" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label>-->
																<label title='.$ruta_real_hd.' style="cursor:pointer" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label>';
																$count_hd = $count_hd + 1;
													}else{
															echo '
																<label title='.$ruta_real_hd.' style="background:green" value="'.$idcap.'" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label>';
													}
													/*-------Revisa el archivo fhd---------*/

														
														$result = verificarArchivo($idcap, $ruta_real_fhd);
																
														
													if ($result["estado"] != "Existe") {
															echo '
																<!--<label title='.$ruta_real_fhd.' style="background:red;cursor:pointer" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label>-->
																<label title='.$ruta_real_fhd.' style="cursor:pointer" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label>';
																$count_fhd = $count_fhd + 1;
													}else{
																		
															echo '
																<label title='.$ruta_real_fhd.' style="background:green" value="'.$idcap.'" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label>';
													}
													/*-------Revisa el archivo qhd---------*/

					
														$result = verificarArchivo($idcap, $ruta_real_qhd);
																	
														
													if ($result["estado"] != "Existe") {
															echo '
																<!--<label title='.$ruta_real_qhd.' style="background:red;cursor:pointer" class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label>-->
																<label title='.$ruta_real_qhd.' style="cursor:pointer" class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label>';
																$count_qhd = $count_qhd + 1;
													}else{
																		
															echo '
																<label title='.$ruta_real_qhd.' style="background:green" value="'.$idcap.'" class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label>';
													}

														echo ' </td></tr>';
														}
									}

									if ($tipcon === "Pelicula"){
									
										/*Disco 1 ruta g*/
										
										if ($calidad_sd === "/d1-g/cont/mov/sd/") {
											$ruta_real_sd = "g:\cont\mov/sd/";
										}
										if ($calidad_hd === "/d1-g/cont/mov/hd/") {
											$ruta_real_hd = "g:\cont\mov/hd/";
										}
										if ($calidad_fhd === "/d1-g/cont/mov/fhd/") {
											$ruta_real_fhd = "g:\cont\mov/fhd/";
										}
										if ($calidad_qhd === "/d1-g/cont/mov/qhd/") {
											$ruta_real_qhd = "g:\cont\mov/qhd/";
										}
										/*----------------*/
										/*Disco 1 ruta h*/
										
										if ($calidad_sd === "/d1-h/cont/mov/sd/") {
											$ruta_real_sd = "h:\cont\mov/sd/";
										}
										if ($calidad_hd === "/d1-h/cont/mov/hd/") {
											$ruta_real_hd = "h:\cont\mov/hd/";
										}
										if ($calidad_fhd === "/d1-h/cont/mov/fhd/") {
											$ruta_real_fhd = "h:\cont\mov/fhd/";
										}
										if ($calidad_qhd === "/d1-h/cont/mov/qhd/") {
											$ruta_real_qhd = "h:\cont\mov/qhd/";
										}
										/*----------------*/
										/*Disco 2 ruta f*/
										
										if ($calidad_sd === "/d2-f/cont/mov/sd/") {
											$ruta_real_sd = "f:\cont\mov/sd/";
										}
										if ($calidad_hd === "/d2-f/cont/mov/hd/") {
											$ruta_real_hd = "f:\cont\mov/hd/";
										}
										if ($calidad_fhd === "/d2-f/cont/mov/fhd/") {
											$ruta_real_fhd = "f:\cont\mov/fhd/";
										}
										if ($calidad_qhd === "/d2-f/cont/mov/qhd/") {
											$ruta_real_qhd = "f:\cont\mov/qhd/";
										}
										/*----------------*/
										/*Disco 3 ruta k*/
										
										if ($calidad_sd === "/d3-k/cont/mov/sd/") {
											$ruta_real_sd = "k:\cont\mov/sd/";
										}
										if ($calidad_hd === "/d3-k/cont/mov/hd/") {
											$ruta_real_hd = "k:\cont\mov/hd/";
										}
										if ($calidad_fhd === "/d3-k/cont/mov/fhd/") {
											$ruta_real_fhd = "k:\cont\mov/fhd/";
										}
										if ($calidad_qhd === "/d3-k/cont/mov/qhd/") {
											$ruta_real_qhd = "k:\cont\mov/qhd/";
										}
										/*----------------*/
										/*Disco 4 ruta e*/
									
										if ($calidad_sd === "/d4-e/cont/mov/sd/") {
											$ruta_real_sd = "e:\cont\mov/sd/";
										}
										if ($calidad_hd === "/d4-e/cont/mov/hd/") {
											$ruta_real_hd = "e:\cont\mov/hd/";
										}
										if ($calidad_fhd === "/d4-e/cont/mov/fhd/") {
											$ruta_real_fhd = "e:\cont\mov/fhd/";
										}
										if ($calidad_qhd === "/d4-e/cont/mov/qhd/") {
											$ruta_real_qhd = "e:\cont\mov/qhd/";
										}
										/*----------------*/
										/*Disco 5 ruta l*/
									
										if ($calidad_sd === "/d5-l/cont/mov/sd/") {
											$ruta_real_sd = "l:\cont\mov/sd/";
										}
										if ($calidad_hd === "/d5-l/cont/mov/hd/") {
											$ruta_real_hd = "l:\cont\mov/hd/";
										}
										if ($calidad_fhd === "/d5-l/cont/mov/fhd/") {
											$ruta_real_fhd = "l:\cont\mov/fhd/";
										}
										if ($calidad_qhd === "/d5-l/cont/mov/qhd/") {
											$ruta_real_qhd = "l:\cont\mov/qhd/";
										}
										/*----------------*/
											/*Disco 5 ruta m*/
									
										if ($calidad_sd === "/d5-m/cont/mov/sd/") {
											$ruta_real_sd = "m:\cont\mov/sd/";
										}
										if ($calidad_hd === "/d5-m/cont/mov/hd/") {
											$ruta_real_hd = "m:\cont\mov/hd/";
										}
										if ($calidad_fhd === "/d5-m/cont/mov/fhd/") {
											$ruta_real_fhd = "m:\cont\mov/fhd/";
										}
										if ($calidad_qhd === "/d5-m/cont/mov/qhd/") {
											$ruta_real_qhd = "m:\cont\mov/qhd/";
										}
										/*----------------*/
											/*Disco Rev ruta l*/
											$estatus = $fila['status04'];
											if ($estatus === "REV") {
												$ruta_real = "m:\cont\mov/";
											}
											
											/*----------------*/
									
										$result = verificarArchivo($id, $ruta_real);
									

										/********************************************** */  
										echo '<tr><td></td><td>';
												echo'<label>'.$calidad_sd.'</label>
												<label>'.$calidad_hd.'</label>
												<label>'.$calidad_fhd.'</label>
												<label>'.$calidad_qhd.'</label>';

										if (($result["estado"] != "Existe") && ($estatus == "REV")) {
											echo '
												<label style="background:red;cursor:pointer" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">REV</label>';
										}
										if (($result["estado"] == "Existe") && ($estatus == "REV")) {
											$count_rev = $count_rev + 1;
											echo '
												<label style="background:green" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">REV</label>';
										}
								

										$result = verificarArchivo($id, $ruta_real_sd);
										/********************************************** */  
										
										
								
									
										if ($result["estado"] != "Existe") {
										echo '
												<label style="background:red;cursor:pointer" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="hd">SD</label>';
												$count_sd = $count_sd + 1;
										}else{
											
											echo '
												<label style="background:green" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="hd">SD</label>';
										}

										$result = verificarArchivo($id, $ruta_real_hd);
										/********************************************** */  
											
										
												
										if ($result["estado"] != "Existe") {
											echo '
												<label style="background:red;cursor:pointer" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label>';
												$count_hd = $count_hd + 1;
										}else{
													
											echo '
												<label style="background:green" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label>';
										}
												

										$result = verificarArchivo($id, $ruta_real_fhd);
											/********************************************** */  
									
												
										if ($result["estado"] != "Existe") {
											echo '
												<label style="background:red;cursor:pointer" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label>';
												$count_fhd = $count_fhd + 1;
										}else{
											echo '
												<label style="background:green" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label>';
										}

										$result = verificarArchivo($id, $ruta_real_qhd);
											/********************************************** */  
									
												
										if ($result["estado"] != "Existe") {
											echo '
												<label style="background:red;cursor:pointer" class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label>';
												$count_qhd = $count_qhd + 1;
										}else{
													
											echo '
												<label style="background:green" class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label>';
										}
										
										echo ' </td></tr>';

										/**********Revisa los trailer************ */
										/*-------Revisa el archivo mov en revision---------*/
										
										$result = verificarArchivo($id, $calidad_rev_trailer);
										

										echo '<tr><td></td><td>';
										echo'<label>'.$tipcon.'</label>';
	
										if (($result["estado"] != "Existe") && ($estatus == "REV")) {
											echo '
												<label style="background:red;cursor:pointer" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">REV</label>';
											}
										if (($result["estado"] == "Existe") && ($estatus == "REV")) {
												$count_rev = $count_rev + 1;
												echo '
													<label style="background:green" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">REV</label>';
										}


										/*-------Revisa el archivo sd en sd---------*/

										$result = verificarArchivo($id, $calidad_sd_trailer);												
												
										if ($result["estado"] != "Existe") {
											echo '
												<label style="background:red;cursor:pointer" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="hd">SD</label>';
											$count_sd = $count_sd + 1;
										}else{
												
											echo '
												<label style="background:green" class="quality-labels-sd" id="'.$bot.'quality-labels-sd" for="hd">SD</label>';
										}
										/*-------Revisa el archivo hd ---------*/

										$result = verificarArchivo($id, $calidad_hd_trailer);
												 
														
										if ($result["estado"] != "Existe") {
											echo '
												<label style="background:red;cursor:pointer" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label>';
												$count_hd = $count_hd + 1;
										}else{
												echo '
													<label style="background:green" class="quality-labels-hd" id="'.$bot.'quality-labels-hd" for="hd">HD</label>';
										}
										/*-------Revisa el archivo fhd---------*/

											
											$result = verificarArchivo($id, $calidad_fhd_trailer);
													 
											
										if ($result["estado"] != "Existe") {
												echo '
													<label style="background:red;cursor:pointer" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label>';
													$count_fhd = $count_fhd + 1;
										}else{
															
												echo '
													<label style="background:green" class="quality-labels-fhd" id="'.$bot.'quality-labels-fhd" for="fhd">FHD</label>';
										}
										/*-------Revisa el archivo qhd---------*/

		
											$result = verificarArchivo($id, $calidad_qhd_trailer);
														 
											
										if ($result["estado"] != "Existe") {
												echo '
													<label style="background:red;cursor:pointer" class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label>';
													$count_qhd = $count_qhd + 1;
										}else{
															
												echo '
													<label style="background:green" class="quality-labels-qhd" id="'.$bot.'quality-labels-qhd" for="qhd">QHD</label>';
										}

											echo ' </td></tr>';
										
									}
							}
											
                        ?>
					</tbody>
				</table>
				</table>
			</form>
			</div>
			<?php
			echo'<table>
				<tr>
					<td>'.$count_fhd.'</td>
					<td>En FHD</td>
				</tr>

				<tr>
					<td>'.$count_hd.'</td>
					<td>En HD</td></tr>
				<tr>
					<td>'.$count_sd.'</td>
					<td>En SD</td>
				</tr>

				<tr>
					<td>'.$count.'</td>
					<td>En MOV</td>
				</tr>
				</table>';
														?>
		</div>
	</section>
	<script>
		function filtrar() {
  		const valorBusqueda = document.querySelector('.campo-busqueda').value;
  		const filas = document.querySelectorAll('tbody tr');

		filas.forEach(fila => {
    	const celdas = fila.querySelectorAll('td');
    	let encontrado = false;

    	for (const celda of celdas) {
      		if (celda.textContent.toLowerCase().includes(valorBusqueda.toLowerCase())) {
        		encontrado = true;
        	break;
      	}
    	}

    	if (!encontrado) {
      		fila.style.display = 'none';
    	} else {
      		fila.style.display = '';
    	}
  		});
		}
	</script>
</body>
</html>