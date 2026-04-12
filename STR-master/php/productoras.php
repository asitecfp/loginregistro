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
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-washing-machine"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Agregue nuevos registro de productoras o revise las ya existentes.
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			
			<div class="mdl-tabs__panel is-active" id="tabNewProduct">
				<div class="mdl-grid">
				<!--<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">-->
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Productoras
							</div>
							<div class="full-width panel-content">
								<form action="registro_prod.php" method="POST" enctype="multipart/form-data">
									<div class="mdl-grid">
									<div class="full-width panel-content">
										<!--<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop"><!---->
											<h5 class="text-condensedLight">Nueva productora</h5>									
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">	
												<?php
													$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         											$query = $mysqli -> query ("SELECT COUNT(*) idecon12 FROM procon12");
          											$valores = $query->fetch_assoc();	
        										?>
												<input name="idprod" class="mdl-textfield__input" type="number" pattern="-?[0-9- ]*(\.[0-9]+)?" id="BarCode" value="<?php echo ''.$valores['idecon12'] + 1 .'';?>" readonly>
												<label class="mdl-textfield__label" for="BarCode">Codigo Contenido</label>
												<span class="mdl-textfield__error">Invalid barcode</span>	
											</div>
											<!---  <> -->
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input name="nombre" class="mdl-textfield__input" type="text" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameProd" require>
												<label class="mdl-textfield__label" for="NameProd">Nombre</label>
												<span class="mdl-textfield__error">Invalid name</span>
											</div>
											<label class="" for="NameProduct">Logo Productora</label>
													<span class="mdl-textfield__error">Invalid name</span>
													<input name="LogoPro" class="mdl-textfield__input" type="file" pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameLogo" accept="image/x-png" onchange="validateFileType1()">
													<script type="text/javascript">
   														function validateFileType1(){
        													var fileName = document.getElementById("NameLogo").value;
        													var idxDot = fileName.lastIndexOf(".") + 1;
       														var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
        													if (extFile=="png"){
            																//TO DO
        													}else{
           														alert("Solo archivos tipo /.png/ son admitidos!");
       														}   
   														}
													</script>
											<p class="text-center">
												<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProd">
												<i class="zmdi zmdi-plus"></i>
												</button>
												<div class="mdl-tooltip" for="btn-addProd">Add Productora</div>
											</p>
											<!---  <> -->

											<h5 class="text-condensedLight">Listar productoras</h5>	
											<div class="mdl-textfield mdl-js-textfield">
											<!---  <> -->
											<div class="mdl-grid">
												<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
													<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
														<thead>
															<tr>
																<th class="mdl-data-table__cell--non-numeric">Id</th>
																
																<th>Nombre</th>
																<th>Usuario</th>
																<th>Fecha Creacion</th>
															</tr>
														</thead>
														<tbody>
															<?php
																$mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
																if ($mysqli->connect_errno) {
																	echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
																}
															
																$resultado = $mysqli->query("SELECT idecon12, nomtip12, usutip12, fectip12 FROM procon12 WHERE 1");
																$resultado->data_seek(0);
																$bot = 0;
																while ($fila = $resultado->fetch_assoc()) {
																	$bot++;
																	echo ' 
																		<tr>
																			<td class="mdl-data-table__cell--non-numeric">'.$fila['idecon12'].'</td>
																			<td>'.$fila['nomtip12'].'</td>
																			<td>'.$fila['usutip12'].'</td>
																			<td>'.$fila['fectip12'].'</td>
																			
																		</tr>';
																}
															?>
														</tbody>
													</table>
												</div>
											</div>
											<!---  <> -->
										</div>
									</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListProducts">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
							<thead>
								<tr>
									<th class="mdl-data-table__cell--non-numeric">Name</th>
									<th>Code</th>
									<th>Stock</th>
									<th>Price</th>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="mdl-data-table__cell--non-numeric">Product Name</td>
									<td>Product Code</td>
									<td>7</td>
									<td>$77</td>
									<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
								</tr>
								<tr>
									<td class="mdl-data-table__cell--non-numeric">Product Name</td>
									<td>Product Code</td>
									<td>7</td>
									<td>$77</td>
									<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
								</tr>
								<tr>
									<td class="mdl-data-table__cell--non-numeric">Product Name</td>
									<td>Product Code</td>
									<td>7</td>
									<td>$77</td>
									<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
								</tr>
								<tr>
									<td class="mdl-data-table__cell--non-numeric">Product Name</td>
									<td>Product Code</td>
									<td>7</td>
									<td>$77</td>
									<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
								</tr>
								<tr>
									<td class="mdl-data-table__cell--non-numeric">Product Name</td>
									<td>Product Code</td>
									<td>7</td>
									<td>$77</td>
									<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
								</tr>
								<tr>
									<td class="mdl-data-table__cell--non-numeric">Product Name</td>
									<td>Product Code</td>
									<td>7</td>
									<td>$77</td>
									<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
								</tr>
								<tr>
									<td class="mdl-data-table__cell--non-numeric">Product Name</td>
									<td>Product Code</td>
									<td>7</td>
									<td>$77</td>
									<td><button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect"><i class="zmdi zmdi-more"></i></button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>