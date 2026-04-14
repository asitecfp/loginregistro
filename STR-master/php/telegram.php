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
		include 'cargar_datos_in.php';
		include 'funciones_mas.php';
		//$perfil=$_SESSION['perfil'];
	?>
	<!-- pageContent CARGA DEL CONTENIDO DE PELICULAS! -->
	<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Cargue su contenido a ser revisado y aprobado para su publicacion.
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewProduct" class="mdl-tabs__tab is-active">Nuevo</a>
				<a href="#tabListProducts" class="mdl-tabs__tab">Devueltos</a>
				<a href="#tabUpdProduct" class="mdl-tabs__tab is-active">Corregir</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Telegram API
							</div>
							<div class="full-width panel-content">
								<form action="registro_cont.php" method="POST" enctype="multipart/form-data">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop"><!---->
											<h5 class="text-condensedLight">Informacion basica</h5>									
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
												<?php
													$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         											$query = $mysqli -> query ("SELECT COUNT(*) idecon04 FROM maecon04");
          											$valores = $query->fetch_assoc();	
        										?>
												<input name="idcont" class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="BarCode" value="<?php echo ''.$valores['idecon04'] += '2'.'';?>" readonly>
												<label class="mdl-textfield__label" for="BarCode">Codigo Contenido</label>
												<span class="mdl-textfield__error">Invalid barcode</span>	
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input name="nombre" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" require>
												<label class="mdl-textfield__label" for="NameProduct">Nombre</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input name="nombre2" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct">
												<label class="mdl-textfield__label" for="NameProduct">Nombre 2</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input name="sinopsis" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct">
												<label class="mdl-textfield__label" for="NameProduct">Sinopsis</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>	
										</div>
									</div>
									<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProduct">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addProduct">Añadir Contenido</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListProducts">
			<div class="full-width panel-content">
			<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">Id</th>
							<th>Nombre</th>
							<th>Categoria</th>
							<th>Duracion</th>
							<th>Fecha Produccion</th>
                            <th>Fecha Lanzamiento</th>
                            <th>Productora</th>
                            <th>Calidad</th>
                            <th>Formato</th>
                          <!---  <th>Sinopsis</th> -->
                            <th>Estatus</th>
                            <th>Triler</th>
                            <th>Contenido</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                            $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
                            if ($mysqli->connect_errno) {
                                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                            }
                        
                            // $resultado = $mysqli->query("SELECT idecon04, nomcon04, catcon04, durcon04, fecpro04, feclan04, procon04, calcon04, forcon04,
                            //                                     sincon04, status04, dirtra04, dircon04  FROM maecon04 WHERE status04 = 'DEV'");
                            

							$usuario= $_SESSION['usuario'];
							
							if ($tipousua=='admin'){
								$resultado = $mysqli->query("SELECT * FROM maecon04 WHERE status04='DEV' and nivest04=1");
							}
							if($tipousua=='contri'){
								$resultado = $mysqli->query("SELECT * FROM maecon04 WHERE status04='DEV' and nivest04=1 and usuari04='$usuario'");
							}

							$resultado->data_seek(0);
                            $bot = 0;
                            while ($fila = $resultado->fetch_assoc()) {
                                $bot++;
                                echo ' 
                                    <tr>
                                        <td class="mdl-data-table__cell--non-numeric">'.$fila['idecon04'].'</td>
                                        <td>'.$fila['nomcon04'].'</td>
                                        <td>'.$fila['catcon04'].'</td>
                                        <td>'.$fila['durcon04'].'</td>
                                        <td class="mdl-data-table__cell--non-numeric">'.$fila['fecpro04'].'</td>
                                        <td>'.$fila['feclan04'].'</td>
                                        <td>'.$fila['procon04'].'</td>
                                        <td>'.$fila['calcon04'].'</td>
                                        <td class="mdl-data-table__cell--non-numeric">'.$fila['forcon04'].'</td>
                                        <td>'.$fila['status04'].'</td>
                                        <td>'.$fila['dirtra04'].'</td>
                                        <td>'.$fila['dircon04'].'</td>
                                    </tr>';
                            }
                        ?>
					</tbody>
				</table>
			</div>
		</div>
							</div>
						</div>
			
			
			<div class="mdl-tabs__panel" id="tabUpdProduct">
			<div class="full-width panel-content">
								<form action="update_cont.php" method="POST" enctype="multipart/form-data">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop"><!---->
											<h5 class="text-condensedLight">Informacion basica</h5>									
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
												<?php
							

													$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         											// $query = $mysqli -> query ("SELECT `idecon04`, `nomcon04`, `nomco204`, `tipcon04`, `clacon04`, `durcon04`, `fecpro04`, `feclan04`,
													//  `catcon04`, `procon04`, `forcon04`, `calcon04`, `sincon04`, `status04` FROM `maecon04` WHERE  status04 = 'DEV' and `nivest04` <> '2'  ");
														
														$usuario= $_SESSION['usuario'];
							
														if ($tipousua=='admin'){
															$query = $mysqli->query("SELECT * FROM maecon04 WHERE status04='DEV' and nivest04=1");
														}
														if($tipousua=='contri'){
															$query = $mysqli->query("SELECT * FROM maecon04 WHERE status04='DEV' and nivest04=1 and usuari04='$usuario'");
														}
							
														$query->data_seek(0);




													$valores = $query->fetch_assoc();				
													$idecont = $valores['idecon04'];
													$nombrecont = $valores['nomcon04'];
													$nombrecont2 = $valores['nomco204'];
													$tipocont = $valores['tipcon04'];
													$clasecont = $valores['clacon04'];
													$duracont = $valores['durcon04'];
													$fechapro = $valores['fecpro04'];
													$fechalan = $valores['feclan04'];
													$categoriacont = $valores['catcon04'];
													$productoracont = $valores['procon04'];
													$formatocont = $valores['forcon04'];
													$calidadcont = $valores['calcon04'];
													$sinopsiscont = $valores['sincon04'];
													$estadocont = $valores['status04'];
													
        										?>
												<input name="idcont_UP" class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="BarCode" value="<?php echo ''.$idecont.'';?>" readonly>
												<label class="mdl-textfield__label" for="BarCode">Codigo Contenido</label>
												<span class="mdl-textfield__error">Invalid barcode</span>	
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input name="nombre_UP" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value="<?php echo ''.$nombrecont.'';?>" require>
												<label class="mdl-textfield__label" for="NameProduct">Nombre</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input name="nombre2_UP" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value="<?php echo ''.$nombrecont2.'';?>">
												<label class="mdl-textfield__label" for="NameProduct">Nombre 2</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input name="sinopsis_UP" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProduct" value="<?php echo ''.$sinopsiscont.'';?>">
												<label class="mdl-textfield__label" for="NameProduct">Sinopsis</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<h5 class="text-condensedLight">Detalles</h5>	
											<div class="mdl-textfield mdl-js-textfield">
												<select name="genero_UP[]" class="mdl-textfield__input">
													<option value="" disabled="" selected="<?php echo ''.$categoriacont.'';?>"><?php echo ''.$categoriacont.'';?></option>
														<?php
															$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         													$query = $mysqli -> query ("SELECT * FROM catcon07");
          													while ($valores = mysqli_fetch_array($query)) {
            												echo '<option value="'.$valores["nomcat07"].'">'.$valores["nomcat07"].'</option>';
          													}
        												?>
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select name="tipocont_UP[]" class="mdl-textfield__input">
													<option value="" disabled="" selected="<?php echo ''.$tipocont.'';?>"><?php echo ''.$tipocont.'';?></option>
													<?php
														$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         												$query = $mysqli -> query ("SELECT * FROM tipcon05");
          												while ($valores = mysqli_fetch_array($query)) {
            											echo '<option value="'.$valores["nomtip05"].'">'.$valores["nomtip05"].'</option>';
          												}
        											?>
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<select name="clasecont_UP[]" class="mdl-textfield__input">
													<option value="" disabled="" selected=""><?php echo ''.$clasecont.'';?></option>
														<?php
														$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         												$query = $mysqli -> query ("SELECT * FROM clacon06");
          												while ($valores = mysqli_fetch_array($query)) {
            											echo '<option value="'.$valores["nomcla06"].'">'.$valores["nomcla06"].'</option>';
          												}
        											?>
												</select>	
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input name="duracion_UP" class="mdl-textfield__input" type="text" id="DuraCont" value="<?php echo ''.$duracont.'';?>" >
												<label class="mdl-textfield__label" for="DuraCont">Duracion Contenido</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
										</div><!---->
										<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">
											<h5 class="text-condensedLight">Datos adicionales</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<select name="productora_UP[]" class="mdl-textfield__input">
													<option value="" disabled="" selected=""><?php echo ''.$productoracont.'';?></option>
														<?php
															$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         													$query = $mysqli -> query ("SELECT * FROM procon12");
          													while ($valores = mysqli_fetch_array($query)) {
            												echo '<option value="'.$valores["nomtip12"].'">'.$valores["nomtip12"].'</option>';
          													}
        												?>
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<select name="calidad_UP[]" class="mdl-textfield__input">
													<option value="" disabled="" selected=""><?php echo ''.$calidadcont.'';?></option>
														<?php
															$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         													$query = $mysqli -> query ("SELECT * FROM calcon13");
          													while ($valores = mysqli_fetch_array($query)) {
            												echo '<option value="'.$valores["rescal13"].'">'.$valores["nomcla13"].'</option>';
          													}
        												?>
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<select name="formato_UP[]" class="mdl-textfield__input">
													<option value="" disabled="" selected=""><?php echo ''.$formatocont.'';?></option>
														<?php
															$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         													$query = $mysqli -> query ("SELECT * FROM forcon14");
          													while ($valores = mysqli_fetch_array($query)) {
            												echo '<option value="'.$valores["nomcla14"].'">'.$valores["nomcla14"].'</option>';
          													}
        												?>
												</select>
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<select name="estado_UP[]" class="mdl-textfield__input">
													<option value="" disabled="" selected="">Estado</option>
													<option value="ACT" disabled>Activa</option>
													<option value="INA" disabled>Inactiva</option>
													<option value="REV">Revisión</option>
													<option value="INC" disabled>Incompleta</option>
												</select>
											</div>
											<h5 class="text-condensedLight">Otros Datos</h5>
											<div class="mdl-textfield mdl-js-textfield">
												<label class="" for="Fecha-Pro">Fecha Produccion</label>
												<input name="FechaPro_UP" type="date" class="mdl-textfield__input" id="Fecha-Pro" value="<?php echo ''.$fechapro.'';?>">
											</div>
											<div class="mdl-textfield mdl-js-textfield">
												<label class="" for="fecha-lan">Fecha Lanzamiento</label>
												<input name="FechaLan_UP" type="date" class="mdl-textfield__input" id="Fecha-Lan" value="<?php echo ''.$fechalan.'';?>">
											</div>
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<label class="" for="NameProduct">Logo del Contenido</label>
													<span class="mdl-textfield__error">Invalid name</span>
													<input name="LogoCon_UP" class="mdl-textfield__input" type="file" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameLogo_UP" accept="image/x-png" onchange="validateFileType1()">
													<script type="text/javascript">
   														function validateFileType1(){
        													var fileName = document.getElementById("NameLogo_UP").value;
        													var idxDot = fileName.lastIndexOf(".") + 1;
       														var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        													if (extFile==".png"){
            																//TO DO
        													}else{
           														alert("Solo archivos tipo /.png/ son admitidos!");
       														}   
   														}
													</script>
												<br>
												<label class="" for="NameProduct">Imagen Principal del Contenido</label>
													<span class="mdl-textfield__error">Invalid name</span>	
													<input name="ImagenCon_UP" class="mdl-textfield__input" type="file" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NamePrin_UP" accept="image/jpeg" onchange="validateFileType2()">
													<script type="text/javascript">
   														function validateFileType2(){
        													var fileName = document.getElementById("NamePrin_UP").value;
        													var idxDot = fileName.lastIndexOf(".") + 1;
       														var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        													if (extFile==".jpg" || extFile==".jpeg"){
            																//TO DO
        													}else{
           														alert("Solo archivos tipo /.jpg/.jpeg son admitidos!");
       														}   
   														}
													</script>
												<br>
												<label class="" for="NameProduct">Cover del Contenido</label>
													<span class="mdl-textfield__error">Invalid name</span>	
													<input name="CoverCon_UP" class="mdl-textfield__input" type="file" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameCov_UP" accept="image/jpeg" onchange="validateFileType3()">
													<script type="text/javascript">
   														function validateFileType3(){
        													var fileName = document.getElementById("NameCov_UP").value;
        													var idxDot = fileName.lastIndexOf(".") + 1;
       														var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        													if (extFile==".jpg" || extFile==".jpeg"){
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
										<div class="mdl-tooltip" for="btn-addProduct">Update Contenido</div>
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
<script src="https://api.telegram.org/js/telegram.min.js"></script>

<script>
  // Crea un bot de Telegram
  var bot = new Telegram("6942588690:AAFgud-zHfNfyRrM_ReEvU-2aeAxSZsp2Cs");
  


  // Escucha mensajes de Telegram
  bot.onMessage(function(message) {
    // Envia un mensaje de respuesta
    bot.sendMessage(message.chat.id, message.text);
  });
</script>
<script>
  // Obtén el ID del grupo
  var group_id = "+htZlsLTSOd8xMmNh";

  // Crea un objeto para el grupo
  var group = new TelegramGroup(group_id);

  // Escucha mensajes del grupo
  group.onMessage(function(message) {
    // Realiza una consulta a la base de datos
    $mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
    $query = $mysqli -> query ("SELECT * FROM maecon04 WHERE nomcon04 = " + message.text);
    $result = db.query($query);
    
    // Si el resultado no está vacío
    if (result.length > 0) {
      // Envia una imagen y una descripción
      group.sendMessage(result[0].image, result[0].description);
      echo '<script>alert("Se encotro");</script>';
    } else {
      // Registra el pedido como pendiente
      //var query = "INSERT INTO `pending_orders` (`id`, `description`) VALUES (" + message.text + ", '');";
      //db.query(query);
      echo '<script>alert("no se encotro");</script>';
    }
  });
</script>


</html>