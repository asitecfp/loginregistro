<?php
    $perfupdat='';
	$tipousua='';
    $perfupdat = @$_GET['perfupdat'];
	
    session_start();
	error_reporting(1);
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
	<title>Clients</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../css/main.css">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
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
	<?php 
		include 'menu.php';
		include 'cargar_datosf_in.php';
		include 'func_test.php';
		
	?>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-accounts"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Crea, edita o busca un cliente.
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewClient" class="mdl-tabs__tab is-active">NUEVO</a>
				<a href="#tabListClient" class="mdl-tabs__tab">LISTADO</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewClient">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Nuevo cliente
							</div>
							<div class="full-width panel-content">
								<form name="" action="../../php/registro_usuario_bd.php" method="POST" class="formulario__registro">
									<h5 class="text-condensedLight">Datos cliente</h5>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
									<?php
													$mysqli = new mysqli('100.109.85.15', 'antonio', '*Lm2638220$', 'bnucleds');
         											$query = $mysqli -> query ("SELECT COUNT(*) ideusu01 FROM usuario WHERE tipsus01='ZNET' AND stausu01='ACTIVO'");
          											$valores = $query->fetch_assoc();	
        							?>
										<input name="" disabled class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" value="<?php echo ''.$valores['ideusu01'] += '2'.'';?>" id="DNIClient">
										<label class="mdl-textfield__label" for="DNIClient">ID</label>
										<span class="mdl-textfield__error">Invalid number</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="nomusu" class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="NameClient">
										<label class="mdl-textfield__label" for="NameClient">Nombres</label>
										<span class="mdl-textfield__error">Invalid name</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="apeusu" class="mdl-textfield__input" type="text" pattern="-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="LastNameClient">
										<label class="mdl-textfield__label" for="LastNameClient">Apellidos</label>
										<span class="mdl-textfield__error">Invalid last name</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="dniced" class="mdl-textfield__input" type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="addressClient1">
										<label class="mdl-textfield__label" for="addressClient1">DNI/Cédula</label>
										<span class="mdl-textfield__error">Invalid dni</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="conusu" class="mdl-textfield__input" type="password" id="passwordClient">
										<label class="mdl-textfield__label" for="passwordClient">Contraseña</label>
										<span class="mdl-textfield__error">Invalid password</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="" disabled class="mdl-textfield__input" type="tel" value="ACTIVO" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="phoneClient">
										<label class="mdl-textfield__label" for="phoneClient">Estatus</label>
										<span class="mdl-textfield__error">Invalid status</span>
									</div>
									<div hidden class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="stacue" disabled class="mdl-textfield__input" type="tel" value="Regi" pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="phoneClient">
										<label class="mdl-textfield__label" for="phoneClient">Estatus</label>
										<span class="mdl-textfield__error">Invalid status</span>
									</div>
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="corusu" class="mdl-textfield__input" type="email" id="emailClient">
										<label class="mdl-textfield__label" for="emailClient">E-mail</label>
										<span class="mdl-textfield__error">Invalid E-mail</span>
									</div>
									<p class="text-center">
										<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addClient">
											<i class="zmdi zmdi-plus"></i>
										</button>
										<div class="mdl-tooltip" for="btn-addClient">Agregar cliente</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabListClient">
				<div class="mdl-grid">
				
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-success text-center tittles">
								List Clients
							</div>
							<div class="full-width panel-content">
								<form action="#">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
										<label class="mdl-button mdl-js-button mdl-button--icon" for="searchClient">
											<i class="zmdi zmdi-search"></i>
										</label>
										<div class="mdl-textfield__expandable-holder">
										
											<input class="mdl-textfield__input" type="text" id="searchClient">
											<label class="mdl-textfield__label"></label>
										</div>
									</div>
								</form>
								
								<input class="campo-busqueda" type="search" placeholder="Buscar..." onkeyup="filtrar()">
								<div class="mdl-list__item">
								<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>
						<tr>
							<th class="mdl-data-table__cell--non-numeric">Id</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Cédula</th>
							<th>Ingreso</th>
							<th>Status</th>
							
						</tr>
					</thead>
								<tbody>
								<?php
									$mysqli = new mysqli("100.109.85.15", "antonio", "*Lm2638220$", "bnucleds");
									if ($mysqli->connect_errno) {
										echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
									}
									$tipocuenta = "visor";
									$tipsuscrip = "ZNET";
									$statuscli = "ACTIVO";

									$resultado = $mysqli->query("SELECT corusu01, nomusu01, apeusu01, stausu01, ingusu01 FROM usuario WHERE stausu01='activo' AND tipsus01='ZNET' AND tipcue01='visor'");
									$resultado->data_seek(0);

									$bot = 0;
									$count = 0;							
									$correo = "";
									$nombre = "";
									$apellido = "";
									$status = "";
									$fecha = "";
									
									while ($fila = $resultado->fetch_assoc()) {
										$bot++;
										
										$correo = $fila['corusu01'];
										$nombre = $fila['nomusu01'];
										$apellido = $fila['apeusu01'];
										$status = $fila['stausu01'];
										$fecha = $fila['ingusu01'];
																
										echo '
										<span class="mdl-list__item-primary-content">
										
										<tr>
											
											<td><i class="zmdi zmdi-account mdl-list__item-avatar"></i> '.$bot.' .- </td>
											<td>'.$nombre.'</td>
											<td>'.$apellido.'</td>
											<td>'.$correo.'</td>
											<td>'.$fecha.'</td>
											<td>'.$status.'</td>											
										</tr>
										</span>
										
										';
								
									}
											
                        ?>
									
								</tbody>
										<a class="mdl-list__item-secondary-action" href="#!"><i class="zmdi zmdi-more"></i></a>
								</table>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
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