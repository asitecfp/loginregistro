<!-------------------------------------------Valida sesion usuario ------------------------------------------->
<?php
    $perfupdat='';
    $perfupdat = @$_GET['perfupdat'];


    session_start();

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

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido a su Streaming-Pro</title>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
            $('body').hide();
            $('body').fadeIn(2000);
            });
        </script>
        
    </head>
    <body>
        <header>
            <div class="contenedor">
                <h2 class="logotipo">Streaming-Pro</h2>          
                <?php 
                    $perfil=$_SESSION['perfil'];
                    include 'php/notific_data.php';
                    include 'php/seleccion.php';
                    include 'menu2.php';
                ?>
                <table width="150" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
				        <?php
                            $perfact="b13nV3gV5-F50rY8dFVT";
                 
                            if (($imgusu0=="imagen/perfil.jpg")||($imgusu0==""))
                                {echo '<a href="index.php?perfact='.$perfact.'" title='.$UsuPerfil.'><img height="40" src="assets/imagen/icon/usu.png" class="usu" alt="Usuario" ></a>';}else
                                {echo '<img height="40" src="php/perfil/'.$imgusu0.'" alt="Usuario" >';}
                                //echo ''.$UsuarioSES;
				        ?>
                        
                    </td>
                </tr>            
            </table>
		</div>
            </div>
        </header>
    
        <?php echo llamar();?>
        <!--<body oncontextmenu="return false;">-->
	    <main>  
<!---------------- Consultando Categorias "catcon07" / "idecat07" "nomcat07" ------------------>
<!---------------- Consultando Contenido "catcon07" / "idecat07" "nomcat07" ------------------>

            <div style="Background:black; display:flex; align-items:center; padding-left:0px;" class="piso" aling="center" style>
                <table style="aling:center; color:white; margin-left:auto; margin-right:auto;" id="tablapiso" width="150" border="0" cellspacing="50" cellpadding="50">
 <!----                   <tr>
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
                    </tr>----->
                </table>
            </div>
        </main>
        <script> document.querySelector('.contenedor-carrousel').scrollLeft = document.querySelector('.contenedor-carrousel').scrollLeft + document.querySelector('.contenedor-carrousel').offsetWidth</script>
        <script src="assets/js/main2.js"></script>
        
        <!--<script language="JavaScript" type="text/JavaScript"> window.resizeTo(screen.availWidth, screen.availHeight); window.moveTo(0,0); </script>-->
    </body>
    <script type='text/javascript'> 
      document.oncontextmenu = function(){return false} 
</script>
   <link rel="stylesheet" href="assets/css/estilos3.css">
</html>