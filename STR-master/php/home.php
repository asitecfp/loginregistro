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
	error_reporting(0);
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/sweetalert2.css">
	<link rel="stylesheet" href="../css/material.min.css">
	<link rel="stylesheet" href="../css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
	<link rel="stylesheet" href="../css/main.css">
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
							<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
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
	<!-- pageContent -->
	<section class="full-width pageContent">
		<section class="full-width text-center" style="padding: 40px 0;">
			<h3 class="text-center tittles">USUARIOS</h3>
			<!-- Tiles -->
			<article class="full-width tile">
				<div class="tile-text">
				<?php
					$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         			$query = $mysqli -> query ("SELECT COUNT(*) ideusu01 FROM usuario WHERE tipcue01='admin'");
          			$valores = $query->fetch_assoc();	
				?>
					<span class="text-condensedLight">
					<?php echo ''.$valores['ideusu01'].'';?><br>
						<small>Administradores</small><br>
						<br>0<br>
						<small>En linea</small>
					</span>
				</div>
				<i class="zmdi zmdi-account tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
				<?php
					$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         			$query = $mysqli -> query ("SELECT COUNT(*) ideusu01 FROM usuario WHERE tipcue01='contri'");
          			$valores = $query->fetch_assoc();	
				?>
					<span class="text-condensedLight">
					<?php echo ''.$valores['ideusu01'].'';?><br>
						<small>Colaboradores</small><br>
						<br>0<br>
						<small>En linea</small>
					</span>
				</div>
				<i class="zmdi zmdi-accounts tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
				<?php
					$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         			$query = $mysqli -> query ("SELECT COUNT(*) ideusu01 FROM usuario WHERE tipcue01='visor'");
          			$valores = $query->fetch_assoc();	
				?>
					<span class="text-condensedLight">
					<?php echo ''.$valores['ideusu01'].'';?><br>
						<small>Clientes</small><br>
						<br>0<br>
						<small>En linea</small>
					</span>
				</div>
				<i class="zmdi zmdi-accounts tile-icon"></i>
			</article>
			<h3 class="text-center tittles">CONTENIDO</h3>
			<article class="full-width tile">
				<div class="tile-text">
				<?php
					$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         			$query = $mysqli -> query ("SELECT COUNT(*) idecon04 FROM maecon04 WHERE tipcon04='pelicula'");
          			$valores = $query->fetch_assoc();	
				?>
					<span class="text-condensedLight">
					<?php echo ''.$valores['idecon04'].'';?><br>
						<small>Peliculas</small>
					</span>
				</div>
				<i class="zmdi zmdi-movie tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
				<?php
					$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         			$query = $mysqli -> query ("SELECT COUNT(*) idecon04 FROM maecon04 WHERE tipcon04='serie'");
          			$valores = $query->fetch_assoc();	
				?>
					<span class="text-condensedLight">
					<?php echo ''.$valores['idecon04'].'';?><br>
						<small>Series</small>
					</span>
				</div>
				<i class="zmdi zmdi-movie-alt tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="tile-text">
				<?php
					$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         			$query = $mysqli -> query ("SELECT COUNT(*) idecon04 FROM maecon04");
          			$valores = $query->fetch_assoc();	
				?>
					<span class="text-condensedLight">
					<?php echo ''.$valores['idecon04'].'';?><br>
						<small>Todas</small>
					</span>
				</div>
				<i class="zmdi zmdi-movie-alt tile-icon"></i>
			</article>
	
		</section>
		<section class="full-width" style="margin: 30px 0;">
			<h3 class="text-center tittles">NOVEDADES</h3>
			<!-- TimeLine -->
			<div id="timeline-c" class="timeline-c">
			<?php
					$mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
         			if ($mysqli->connect_errno) {
					  echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
					}
				  
					$resultado = $mysqli->query("SELECT idecon04, nomcon04, catcon04, durcon04, fecpro04, feclan04, procon04, tipcon04, calcon04, forcon04,
														  sincon04, status04, dirtra04, dircon04  FROM maecon04 ORDER BY idecon04 DESC LIMIT 20");
					$resultado->data_seek(0);
					$bot = "";
					while ($fila = $resultado->fetch_assoc()) {
					  $bot = $bot + 1;
						echo ' 
						<div class="timeline-c-box">
							<div class="timeline-c-box-icon bg-info">

								<i class="zmdi zmdi-movie"></i>
							</div>
							<!--<div style="background-image: url(/prin/'.$fila['idecon04'].'.webp);   background-size: contain;" class="timeline-c-box-content">-->
							<div class="timeline-c-box-content">
								<img src="/cover/'.$fila['idecon04'].'.webp" alt='.$fila['nomcon04'].'>
								<h4  class="text-center text-condensedLight">'.$fila['nomcon04'].'</h4>
								<p class="text-center">
								'.$fila['sincon04'].'
								</p>
								<span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>'.$fila['feclan04'].'</span>
							</div>
						</div>';
				}
				?>
			
			<!--	<div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-info">
	                    <i class="zmdi zmdi-twitter"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>05-04-2016</span>
	                </div>
	            </div>
				<div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-success">
	                    <i class="zmdi zmdi-whatsapp"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>06-04-2016</span>
	                </div>
	            </div>
	            <div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-primary">
	                    <i class="zmdi zmdi-facebook"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>07-04-2016</span>
	                </div>
	            </div>
	            <div class="timeline-c-box">
	                <div class="timeline-c-box-icon bg-danger">
	                    <i class="zmdi zmdi-youtube"></i>
	                </div>
	                <div class="timeline-c-box-content">
	                    <h4 class="text-center text-condensedLight">Tittle timeline</h4>
	                    <p class="text-center">
	                    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nobis rerum iure nostrum dolor. Quo totam possimus, ex, sapiente rerum vel maxime fugiat, ipsam blanditiis veniam, suscipit labore excepturi veritatis.
	                    </p>
	                    <span class="timeline-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>08-04-2016</span>
	                </div>
	            </div>
			</div>-->
		</section>
	</section>
</body>
</html>