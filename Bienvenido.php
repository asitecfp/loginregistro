<?php
/**
 * FASE 1 — Bienvenido.php
 * Correcciones aplicadas:
 *  [1] Carga de config central (error reporting, sesión segura)
 *  [2] Eliminado @$_GET['perfupdat'] — parámetro de token en URL removido
 *  [3] Verificación de sesión con session_unset antes de destroy
 *  [4] $tipousua leído de sesión de forma segura (sin @ silenciador)
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/config/config.php';

// Forzar ocultamiento de errores en pantalla independientemente del php.ini
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');

// [4] Leer tipousuario de forma segura
$tipousua = isset($_SESSION['tipousuario']) ? $_SESSION['tipousuario'] : '';

// [3] Verificar sesión activa
if (!isset($_SESSION['usuario'])) {
    echo '<script>
        alert("Debe iniciar sesión para ver este contenido.");
        window.location = "index.php";
    </script>';
    session_unset();
    session_destroy();
    exit;
}
// [2] perfupdat eliminado — el flujo de autenticación ya no usa tokens en URL
?>
<!---->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido a su Streaming-Pro</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="STR-master/css/normalize.css">
	    <link rel="stylesheet" href="assets/css/estilos2.css">
    </head>
<body class="hidden">
        
      <div class="preload" id="onload">
			<h2 class="prelogo">STREAMING-PRO</h2>      
		</div>     
	<header>
 
<!-------------------------------------------MENSAJE CONTADOR ------------------------------------------->
        <?php 
            include 'php/notific_data.php';
            include 'php/seleccion.php';

            $perfilcontador = '';
            // Notificaciones: ya no se usa perfupdat en URL
            $noti = isset($noti) ? (int)$noti : 0;
            if ($noti >= 1) {
                $_SESSION['perfilcontador'] = isset($_SESSION['perfilcontador'])
                    ? $_SESSION['perfilcontador'] + 1 : 1;
                $perfilcontador = $_SESSION['perfilcontador'];
            }
        ?>
<!---->
<!-------------------------------------------Menú---------------------------------------------------------->
		<div class="contenedor">
			<h2 class="logotipo2">STREAMING-PRO</h2>       
           
            <!--<span>Streaming-Pro</span> -->
       
            <?php
                include 'menu2.php';  
            ?>
        
		</div>
	</header>
<!---->
<!-------------------------------------------Cargar contenido Principal------------------------------------->
<main>  
    <?php
        $perfil=$_SESSION['perfil'];
        echo cargarprincipal($perfil);
    ?>
<!---->
  
<!-------------------------------------------Consultando Categorías y Contenido------------------------------->
<?php
$perfil=$_SESSION['perfil'];
  echo cargacont($perfil);
?>
<!---->
<div style="Background:black; display:flex; align-items:center; padding-left:0px;" class="piso" aling="center" style>
    <table style="aling:center; color:white; margin-left:auto; margin-right:auto;" id="tablapiso" width="150" border="0" cellspacing="50" cellpadding="50">
      <!--  <tr>
            <td>Línea1</td>
            <br>
            <td>Línea2</td>
            <br><br>
            <td>Línea3</td>
            <br><br><br>
            <td>Línea4</td>
            <td>Línea5</td>
        </tr>
            <tr>
                <td>Línea1</td>
                <br>
                <td>Línea1</td>
                    <br><br>
                        <td>Línea1</td>
                    <br><br><br>
                <td>Línea1</td>
                <td>Línea1</td>
            </tr>
        <tr>
            <td>Línea1</td>
                <br>
            <td>Línea1</td>
                <br><br>
            <td>Línea1</td>
            <br><br><br>
            <td>Línea1</td>
            <td>Línea1</td>
        </tr>-->
    </table>
</div>
   </main>
   <!--<script> document.querySelector('.contenedor-carrousel').scrollLeft = document.querySelector('.contenedor-carrousel').scrollLeft + document.querySelector('.contenedor-carrousel').offsetWidth</script>-->
        <script src="assets/js/testspeed.js"></script>
        <script src="assets/js/main.js"></script>
   <!--<script language="JavaScript" type="text/JavaScript"> window.resizeTo(screen.availWidth, screen.availHeight); window.moveTo(0,0); </script>-->
</body>

 <!--libreria js para ocultar el preload en el archivo main.js-->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script>
/*

window.addEventListener('scroll', function(evt) {
    if (desaparecer1.scrollTop === 0) {
     
     desaparecer1.style.display = "none";
    }
    if (desaparecer1.scrolscrollTop =! 0) {
        desaparecer1.style.display = "fixed";
    }
    if (desaparecer2.scrollTop === 0) {
     
     desaparecer2.style.display = "none";
    }
    if (desaparecer3.scrollTop === 0) {
     
     desaparecer3.style.display = "none";
    }
    if (desaparecer4.scrollTop === 0) {
     
     desaparecer4.style.display = "none";
    }
    if (desaparecer5.scrollTop === 0) {
     
     desaparecer5.style.display = "none";
    }
    if (desaparecer6.scrollTop === 0) {
     
     desaparecer6.style.display = "none";
    }
    /*let transparencia = window.scrollY / window.innerHeight * 2
    transparencia = transparencia < 1 ? transparencia : 1;
    desaparecer.style.opacity = 1 - transparencia
}, false);
*/
</script>

 <!--elimina la opcion de click derecho-->
 <!--<script type='text/javascript'> 
      document.oncontextmenu = function(){return false} 
</script>-->
 
</html>