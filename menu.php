<?php 
//include 'php/notific_data.php';
$perfil=$_SESSION['perfil'];
?>
            <nav>
                <a href="#" id="Inicio" value="sasd" class='activo'>inicio</a>
                <!-- <a href="#" onclick="cargarcontenido($guia)">Programas</a> -->
                <a href="bienvenido.php" onclick="alert('Conviertete en usuario PREMIUN y disfruta de programas adicionales')">Peliculas</a>
                <a href="#" onclick="principal()">Series</a>
                <a href="#" action="php/seleccion.php" onclick='<?php //include 'C:\wamp64\www\loginregistro\php\seleccion.php'; $guia = ''; $guia2 = 0; $guia3 = 'gjh'; cargarcontenido($guia); ?>'>Mas recientes</a>             
                <li><a href="php/perfil.php">Mi Perfil</a>
                <ul>
					<?php
                    if (($perfil=="Familiar")||($perfil=="Infantil"))
					{// M/A
					}else
					{echo '<li><a href="php/perfil_usuario.php">Actualizar Perfil</a></li>';}
					?>                	<li><a href="#">Mi lista</a></li>
                	<li><a href="php/notificacion.php">Notificaciones<?php echo "(".$noti.")";?></a></li>
                	<li><a href="php/cerrar_session.php">Salir</a> </li>
                </li>
                </ul>            
            </nav>       
    