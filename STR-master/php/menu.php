<?php 
//include 'php/notific_data.php';
$perfil=$_SESSION['perfil'];
$username=$_SESSION['usuario'];
$tipusuer=$_SESSION['tipousuario'];
?>
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
					<li class="text-condensedLight noLink" ><small><?php echo''.$username.'';?></small></li>
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
<section class="full-width navLateral">
		<div class="full-width navLateral-bg btn-menu"></div>
		<div class="full-width navLateral-body">
			<div class="full-width navLateral-body-logo text-center tittles">
				<a class="logotipo2" href="../../Bienvenido.php">STREAMING-PRO </a>
			</div>
			<figure class="full-width" style="height: 77px;">
				<div class="navLateral-body-cl">
					<img src="../assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				</div>
				<figcaption class="navLateral-body-cr hide-on-tablet">
					<span>
					<?php 
					//include 'php/notific_data.php';
					echo''.$perfil.' 
					<br>
						<small>'.$tipusuer.'</small>
					</span>';
					?>
				</figcaption>
			</figure>
			<div class="full-width tittles navLateral-body-tittle-menu">
				<i class="zmdi zmdi-desktop-mac"></i><span class="hide-on-tablet">&nbsp; DASHBOARD</span>
			</div>
			<nav class="full-width">
				<ul class="full-width list-unstyle menu-principal">
					<li class="full-width"  >
						<a href="home.php" class="full-width">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-view-dashboard"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Home
							</div>
						</a>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width" hidden >
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-case"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Administracion
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width" >
								<a href="company.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-balance"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										COMPANY
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="providers.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-truck"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PROVIDERS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="payments.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-card"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										PAYMENTS
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="categories.html" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-label"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										CATEGORIES
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width">
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-face"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Usuarios
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="user.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-account"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Administradores
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="client.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-accounts"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Clientes
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width" >
					<!--<li class="full-width" hidden >-->
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Crear y editar
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="products.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Nuevo
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="products.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Devueltos
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="products.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Corregir
									</div>
								</a>
							</li>
                            <li class="full-width">
								<a href="temporadas.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Temporadas
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="capitulos.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Capítulos
									</div>
								</a>
							</li>
						</ul>
					</li>
					
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="productoras.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Productoras
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="Servidores.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Servidores
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="almacen.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Almacen
									</div>
								</a>
							</li>
						</ul>
					</li>
					<li class="full-width divider-menu-h"></li>
						<li class="full-width" hidden >
							<a href="sales.html" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-shopping-cart"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									SALES
								</div>
						</a>
					</li>
					<li class="full-width" >
					<!--<li class="full-width" hidden >-->
					<a href="#!" class="full-width btn-subMenu">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-wrench"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							Subir y revisar
						</div>
						<span class="zmdi zmdi-chevron-left"></span>
					</a>
						<ul class="full-width menu-principal sub-menu-options">

								<li class="full-width divider-menu-h"></li>
									<li class="full-width">
										<a href="invent_inc.php" class="full-width">
											<div class="navLateral-body-cl">
												<i class="zmdi zmdi-store"></i>
											</div>
											<div class="navLateral-body-cr hide-on-tablet">
												Subir contenido
											</div>
										</a>
									</li>
								
									<li class="full-width">
										<a href="invent_rev.php" class="full-width">
											<div class="navLateral-body-cl">
												<i class="zmdi zmdi-store"></i>
											</div>
											<div class="navLateral-body-cr hide-on-tablet">
												Revisar contenido
											</div>
										</a>
									</li>
								
								<li class="full-width">
									<a href="invent_inc_ser.php" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-store"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											Subir series
										</div>
									</a>
								</li>
								
								<li class="full-width">
									<a href="invent_rev_ser.php" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-store"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											Revisar series
										</div>
									</a>
								</li>
								
								<li class="full-width">
									<a href="invent_all.php" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-store"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											Ver todo el contenido
										</div>
									</a>
								</li>
								<li class="full-width">
									<a href="review_convert.php" class="full-width">
										<div class="navLateral-body-cl">
											<i class="zmdi zmdi-store"></i>
										</div>
										<div class="navLateral-body-cr hide-on-tablet">
											Revisar y Reconvertir
										</div>
									</a>
								</li>
								
						</ul>
					<li class="full-width divider-menu-h"></li>
					<li class="full-width" >
					<!--<li class="full-width" hidden >-->
						<a href="#!" class="full-width btn-subMenu">
							<div class="navLateral-body-cl">
								<i class="zmdi zmdi-wrench"></i>
							</div>
							<div class="navLateral-body-cr hide-on-tablet">
								Ajustes
							</div>
							<span class="zmdi zmdi-chevron-left"></span>
						</a>
						<ul class="full-width menu-principal sub-menu-options">
							<li class="full-width">
								<a href="productoras.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Productoras
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="Servidores.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Servidores
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="almacen.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Almacen
									</div>
								</a>
							<li class="full-width">
								<a href="update.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Actualizar
									</div>
								</a>
							</li>
							<li class="full-width">
								<a href="telegram.php" class="full-width">
									<div class="navLateral-body-cl">
										<i class="zmdi zmdi-widgets"></i>
									</div>
									<div class="navLateral-body-cr hide-on-tablet">
										Telegram API
									</div>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</section>