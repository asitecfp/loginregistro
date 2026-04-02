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
								<form >
									<div class="mdl-grid">
									<div class="full-width panel-content">
										<!--<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--6-col-desktop">-->
											<h5 class="text-condensedLight">Servisor Remoto</h5>									
                                            <div class="mdl-textfield mdl-js-textfield">
												<select name="genero[]" class="mdl-textfield__input">
													<option value="" disabled="" selected="">Seleccione el servidor</option>
														<!--<?php
															$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         													$query = $mysqli -> query ("SELECT * FROM server13 WHERE 1");
          													while ($valores = mysqli_fetch_array($query)) {
            												echo '<option id="cont" value="'.$valores["ip4ser13"].'">'.$valores["ip4ser13"]." ---> ".$valores["namser13"].'</option>';
															//echo '<option id="cont" value="'.$valores["ip4ser13"].'">".$valores["ip4ser13"]."</option>';
          													}
        												?>-->
												</select>
											</div>
											<p class="text-center">
												<button onclick="encontrar()" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addProd">
												<i class="zmdi zmdi-plus"></i>
												</button>
												<div class="mdl-tooltip" for="btn-addProd">Encontrar</div>
											</p>
											<!---  <> -->

											<h5 class="text-condensedLight">Listar</h5>	
											<div class="mdl-textfield mdl-js-textfield">
											<!---  <> -->
											<div class="mdl-grid">
												<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
												<div id="resultados"></div>
												<!--- 	<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
														<thead>
															<tr>
																<th class="mdl-data-table__cell--non-numeric">Id Cont</th>
																
																<th>Nombre</th>
																<th>Tipo</th>
																<th>Duracion</th>
                                                                <th>Productora</th>
															</tr>
														</thead>
														<tbody>
															<?php/*
																$mysqli = new mysqli("", "antonio", "*Lm2638220$", "bnucleds");
																if ($mysqli->connect_errno) {
																	echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
																}
															
																$resultado = $mysqli->query("SELECT idecon04, nomcon04, tipcon04, durcon04, procon04 FROM maecon04 WHERE 1");
																$resultado->data_seek(0);
																$bot = "";
																while ($fila = $resultado->fetch_assoc()) {
																	$bot = $bot + 1;
																	echo ' 
																		<tr>
																			<td class="mdl-data-table__cell--non-numeric">'.$fila['idecon04'].'</td>
																			<td>'.$fila['nomcon04'].'</td>
																			<td>'.$fila['tipcon04'].'</td>
																			<td>'.$fila['durcon04'].'</td>
                                                                            <td>'.$fila['procon04'].'</td>

																		</tr>';
																}*/
															?>
														</tbody>
													</table>-->
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
			
		</div>
	</section>
	<script>

// 			// Obtener el valor de IP seleccionado
// 			const ip = document.getElementById("cont").value;

// 			// Crear una nueva instancia de XMLHttpRequest
// 			const xhr = new XMLHttpRequest();

// 			// Abrir la solicitud con el método POST
// 			xhr.open("POST", "find_new_cont.php");

// 			// Establecer el tipo de contenido de la solicitud
// 			xhr.setRequestHeader("Content-Type", "application/json");

// 			// Crear los datos de la solicitud
// 			const data = JSON.stringify({
// 			ip: ip
// 			});

// 			// Enviar la solicitud
// 			xhr.send(data);

// 			// Procesar la respuesta
// 			xhr.onload = function() {
// 			if (xhr.status === 200) {
// 				// Mostrar los resultados de la consulta
// 				const results = JSON.parse(xhr.responseText);
// 				document.getElementById("resultados").innerHTML = results;
// 			} else {
// 				// Manejar el error
// 				alert("Error");
// 			}
// 			xhr.onload = function() {
//   if (xhr.status === 200) {
//     // Parse the JSON response
//     const results = JSON.parse(xhr.responseText);

//     // Create an HTML string
//     let html = '<table>';

//     // Iterate over the results and add them to the HTML string
//     for (let i = 0; i < results.length; i++) {
//       html += '<tr>';
//       html += '<td>' + results[i].idecon04 + '</td>';
//       html += '<td>' + results[i].nomcon04 + '</td>';
//       // Add more columns as needed...
//       html += '</tr>';
//     }

//     html += '</table>';

//     // Display the results
//     document.getElementById("resultados").innerHTML = html;
//   } else {
//     // Handle the error
//     alert("Error");
//   }
// };
xhr.onload = function() {
  if (xhr.status === 200) {
    // Parse the JSON response
    const results = JSON.parse(xhr.responseText);

    // Create an HTML string
    let html = '<table>';

    // Iterate over the results and add them to the HTML string
    for (let i = 0; i < results.length; i++) {
      html += '<tr>';
      html += '<td>' + results[i].idecon04 + '</td>';
      html += '<td>' + results[i].nomcon04 + '</td>';
      // Add more columns as needed...
      html += '</tr>';
    }

    html += '</table>';

    // Display the results
    document.getElementById("resultados").innerHTML = html;
  } else {
    // Handle the error
    alert("Error");
  }
};
	</script>
</body>
</html>