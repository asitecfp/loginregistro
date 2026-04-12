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
		//$perfil=$_SESSION['perfil'];
	?>
	<!-- pageContent CARGA DEL CONTENIDO DE PELICULAS! -->
	<section class="full-width pageContent">

		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProduct" class="mdl-tabs__tab is-active">Nueva</a>
					<!--<a href="#tabListProducts" class="mdl-tabs__tab">Devueltos</a>
				<a href="#tabUpdProduct" class="mdl-tabs__tab is-active">Actualizar</a>-->
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nueva Temporada
							</div>
							<div class="full-width panel-content">
								<form action="" method="POST" enctype="multipart/form-data">
								<h5 class="text-condensedLight">Seleccione el Contenido</h5>
									<div class="mdl-grid">
										

									<div id="tlist" style="height: 250px !important; overflow: auto; width:100%; max-width:1280px; padding: 5px">
																		
											<table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
												
                                   				<thead>
                                        			<tr>
														<th class="mdl-data-table__cell--non-numeric">Id</th>
														<th>Nombre</th>
														<th>Tipo Contenido</th>
														<th>Categoria</th>
														<th>Temporadas</th>
														<th>Capítulos</th>
                                        			</tr>
                                    			</thead>
												<tbody>
												
												<?php
													$mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
													if ($mysqli->connect_errno) {
														echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
													}
													

													$resultado = $mysqli->query("SELECT idecon04, nomcon04, catcon04, tipcon04  FROM maecon04 WHERE tipcon04<>'pelicula' ORDER BY idecon04 DESC ");
													$resultado->data_seek(0);
													$bot = 0;
													while ($fila = $resultado->fetch_assoc()) {
														$bot++;
														$id= $fila['idecon04'];
														//Consulta cantidad de temporadas del contenido seleccionado
														$result1 = $mysqli->query("SELECT COUNT(*) numtem17 FROM maetem17 WHERE idmaec17 = $id");
														$valores1 = $result1->fetch_assoc();
														
														echo ' 
															<tr onclick="ob('.$bot.')" class="'.$bot.'btn-temp" id="btn-temp">
																<td id="'.$bot.'ide_cont" class="mdl-data-table__cell--non-numeric" value="'.$bot.'">'.$fila['idecon04'].'</td>
																<td id="'.$bot.'nom_cont" value="'.$bot.'">'.$fila['nomcon04'].'</td>
																<td>'.$fila['catcon04'].'</td>
																<td>'.$fila['tipcon04'].'</td>
																<td id="'.$bot.'num_temp" value="'.$bot.'">'.$valores1['numtem17'].'</td>
																<td></td>
																
															</tr>';
													}
												?>
                                    			</tbody>
													
											</table>
											</div>
									</div>
								</form>
														
							
			
			
			<div class="full-width panel-content">
								<form action="registro_temporada.php" method="POST" enctype="multipart/form-data">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop"><!---->
											<h5 class="text-condensedLight">Contenido seleccionado</h5>									
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
											
											<h5 class="text-condensedLight">Detalles</h5>	
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<img style="border-radius: 5px" id="img_conte" class="img_pri" width=380px height=500 src="">
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											

										</div><!---->
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos de la temporada</h5>
											<div class="mdl-textfield mdl-js-textfield">
												
												<input id="num_tempe" name="num_tempe" class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="BarCode" value="0" readonly>
												<label class="mdl-textfield__label" for="BarCode">Número</label>
												<span class="mdl-textfield__error">Invalid barcode</span>	
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input id="nom_temp" name="nom_temp" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" require>
												<label class="mdl-textfield__label" for="NameProduct">Nombre</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
										
											<h5 class="text-condensedLight">Otros Datos</h5>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input id="des_temp" name="des_temp" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" require>
												<label class="mdl-textfield__label" for="NameProduct">Descripción</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input name="dur_temp" class="mdl-textfield__input" type="text" id="DuraCont">
												<label class="mdl-textfield__label" for="DuraCont">Duracion</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<label class="" for="Fecha-Pro">Fecha Produccion</label>
												<input name="FechaPro_UP" type="date" class="mdl-textfield__input" id="Fecha-Pro" value="" disabled>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<label class="" for="fecha-lan">Fecha Lanzamiento</label>
												<input name="FechaLan_UP" type="date" class="mdl-textfield__input" id="Fecha-Lan" value="" disabled>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<label class="" for="NameProduct">Logo</label>
													<span class="mdl-textfield__error">Invalid name</span>
													<input disabled name="LogoCon_UP" class="mdl-textfield__input" type="file" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameLogo_UP" accept="image/x-png" onchange="validateFileType1()">
													<script type="text/javascript">
   														function validateFileType1(){
        													var fileName = document.getElementById("NameLogo_UP").value;
        													var idxDot = fileName.lastIndexOf(".") + 1;
       														var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        													if (extFile=="png"){
            																//TO DO
        													}else{
           														alert("Solo archivos tipo /.png/ son admitidos!");
       														}   
   														}
													</script>
												<br>
												<label class="" for="NameProduct">Imagen Principal</label>
													<span class="mdl-textfield__error">Invalid name</span>	
													<input disabled name="ImagenCon_UP" class="mdl-textfield__input" type="file" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NamePrin_UP" accept="image/jpeg" onchange="validateFileType2()">
													<script type="text/javascript">
   														function validateFileType2(){
        													var fileName = document.getElementById("NamePrin_UP").value;
        													var idxDot = fileName.lastIndexOf(".") + 1;
       														var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        													if (extFile=="jpg" || extFile=="jpeg"){
            																//TO DO
        													}else{
           														alert("Solo archivos tipo /.jpg/.jpeg son admitidos!");
       														}   
   														}
													</script>
												<br>
												<label class="" for="NameProduct">Cover</label>
													<span class="mdl-textfield__error">Invalid name</span>	
													<input disabled  name="CoverCon_UP" class="mdl-textfield__input" type="file" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameCov_UP" accept="image/jpeg" onchange="validateFileType3()">
													<script type="text/javascript">
   														function validateFileType3(){
        													var fileName = document.getElementById("NameCov_UP").value;
        													var idxDot = fileName.lastIndexOf(".") + 1;
       														var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        													if (extFile=="jpg" || extFile=="jpeg"){
            																//TO DO
        													}else{
           														alert("Solo archivos tipo /.jpg/.jpeg son admitidos!");
       														}   
   														}
													</script>
										</div>
													</div>
									</div>
									<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Asignar Temporada</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</section>
</body>
</html>