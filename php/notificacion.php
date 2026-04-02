<?php
$perfilmenu="";
$perfupdat='';
$tipousua='';
$perfupdat = @$_GET['perfupdat'];

session_start();
error_reporting(0);
$tipousua= $_SESSION['tipousuario'];

if(!isset($_SESSION['usuario'])){
    echo '
    <script>
        alert("Debe iniciar sesión para ver este contenido");
        window.location = "index.php";
    </script>
    ';
  
    session_destroy();
    die();
}        
include 'notific_data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones</title>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">
    
  <?php
    include ('funciones.php');
  ?>

</head>
<body>
<main>
<?php
if (@$perfilmenuact!="dJTfAev-r0Fg3U5")
{
	$perfilmenu="dA-g3JTfUerV50F";
	include ('menu2.php');
}
?>
    <div class="contenedor__todo">
        <div class="caja__trasera">
            <div class="caja__trasera-login" style="width:550px;">
                <div class="contenedor__login-registro"><!--Login-->
                    
                    <table width="450" border="0" cellspacing="0" cellpadding="10">
                        
                        <tr>
                            
                            <td colspan="2">
                                <?php	
                                if ($noti > 1)
                                {
                                    echo "<br><h2><strong>Notificaciones</strong></h2>";
                                    echo "<br>Tienes ".$noti." notificaciones por actualizar.";
                                    echo "<br>..Perfil.. <br>".$notimsj;
                                    echo '<br>
                                    <a href="perfil_usuario.php" style="text-decoration:none;">
                                    <button>Actualizar Perfil</button>
                                    </a>
                                    <br>';
                                }else
                                if ($noti < 1)
                                {
                                    echo "<br>No tienes notificaciones.";

                                }else{
                                    echo "<br>Tienes ".$noti." notificación por actualizar.";
                                    echo "<br>..Perfil.. <br>".$notimsj;
                                    echo '<br>
                                    <a href="perfil_usuario.php" style="text-decoration:none;">
                                    <button>Actualizar Perfil</button>
                                    </a>
                                    <br>';
                                }
                                ?>
                                <br>
                                <br><br>      
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>


