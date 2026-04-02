<!-------------------------------------------Valida sesion usuario ------------------------------------------->
<?php
    $perfupdat='';
    $tipousua='';
    $perfupdat = @$_GET['perfupdat'];

    session_start();
    error_reporting(1);
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
?>
<!---->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido a su Streaming-Pro</title>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
        <script type="text/javascript">
            $(document).ready(function(){
            $('body').hide();
            $('body').fadeIn(2000);
            });
        </script>
        <link rel="stylesheet" href="assets/css/estilos_ser_det.css">
    <link rel="stylesheet" href="assets/css/menu.css">
    
    </head>
<body>
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
        //$serieselect=304;
        echo  cargarprincipalserdet($perfil);    
    ?>
<!---->
  
<!-------------------------------------------Consultando Categorías y Contenido------------------------------->
<?php
  echo cargacontserdet($perfil);
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
   <script> document.querySelector('.contenedor-carrousel').scrollLeft = document.querySelector('.contenedor-carrousel').scrollLeft + document.querySelector('.contenedor-carrousel').offsetWidth</script>
   <script src="assets/js/testspeed.js"></script>
        <script src="assets/js/main_ser_det.js"></script>
        <!--<script language="JavaScript" type="text/JavaScript"> window.resizeTo(screen.availWidth, screen.availHeight); window.moveTo(0,0); </script>-->
</body>
<script type='text/javascript'> 
      document.oncontextmenu = function(){return false} 
</script>
 
</html>