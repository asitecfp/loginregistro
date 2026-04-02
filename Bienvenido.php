<!-------------------------------------------Valida sesion usuario ------------------------------------------->
<?php

    $perfupdat='';
    $tipousua='';
    $perfupdat = @$_GET['perfupdat'];

    session_start();
   // error_reporting(0);
    $tipousua= $_SESSION['tipousuario'];
    /*
    $_SESSION['usuario']="antoniomorenovillamizar@gmail.com";//inicio sin login
    $_SESSION['perfil']="Full Perfil";//inicio sin logi
    $perfil="Full Perfil";//inicio sin logi
*/
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
			
            $perfilmenu="dF-g2JTfUerV50F";           
            $perfilcontador='';
            if(($noti >=1) && ($perfupdat=="gS5tGN-5DfBTh5gF5R0t"))
            {
                $_SESSION['perfilcontador']++;
                $perfilcontador=$_SESSION['perfilcontador'];
                if($perfilcontador<=1)
                {
                    echo '
                    <script>
                        //alert("Gracias!\n\nTienes ('.$perfilcontador.') contador.");
                        //alert("Por Favor Actualiza los Datos de tu Perfil.\nEn Actualizar Perfil o Notificaciones.\n!Gracias!\n\nTienes ('.$noti.') Notificaciones.");
                    </script>
                    ';
                }
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