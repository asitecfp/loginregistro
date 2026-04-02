<?php

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a su Streaming-Pro</title>
    
    <link rel="stylesheet" href="assets/css/vercont.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>

<!--<body oncontextmenu="return false;">-->
    <header></haeader>
<!--<script>function ver();</script>-->
    <main>

   
    </main>
    
    <?php
    
    
    $mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
    $query = $mysqli->query("SELECT * FROM maecon04 WHERE idecon04=$_GET[mae]");
    $query->data_seek(0);

    $valores = $query->fetch_assoc();				
    
    $idecont = $valores['idecon04'];
    $nombrecont = $valores['nomcon04'];
    $nombrecont2 = $valores['nomco204'];
    $tipocont = $valores['tipcon04'];

    if ($tipocont == "Pelicula") {
      
        $querymov = $mysqli->query("SELECT * FROM maerut19 WHERE idcont19=$_GET[mae]");
        $querymov->data_seek(0);
    
        $valoresmov = $querymov->fetch_assoc();				

        
        $rutsd = $valoresmov['sdruta19'];
        $ruthd = $valoresmov['hdruta19'];
        $rutfhd = $valoresmov['fhdrut19'];

        
        echo '
     

    <div class="video-container" id="contenedor">
        <video id="repcont" class="repcont" width="100%" height="100%" autoplay preload onloadstart="this.volume=1" autoplay controls controlsList="nodownload" disablePictureInPicture>
            <source src="'.$rutfhd.''.$idecont.'.mp4" type="video/mp4">
            <track label="Español" kind="subtitles" srclang="es" >
            <source src="'.$rutfhd.''.$idecont.'.mkv" type="video/webm">
            <track label="Español" kind="subtitles" srclang="es" >
                Tu navegador no es compatible con este formato, consulta la guia de compatibilidad en los ajustes de tu equipo (mp4, mkv).
        </video>					
              <div class="capa-controles" id="controles">
                    <button class="btn-circular" id="btnAtras">⬅</button>
                    <button class="btn-circular btn-principal" id="btnPlay">⏯</button>
                    <button class="btn-circular" id="btnMax">⛶</button>

            </div> 
    </div>                   

        <a id="tiempototal"><div></div></a>
        <a id="tiempoactual"><div></div></a>
        <a id="porcentaje"><div></div></a>
        <a hidden id="ID" value='.$idecont.'>'.$idecont.'</a>
        <a hidden id="SD" value='.$rutsd.'>'.$rutsd.'</a>
        <a hidden id="HD" value='.$ruthd.'>'.$ruthd.'</a>
        <a hidden id="FHD" value='.$rutfhd.'>'.$rutfhd.'</a>
        <div id="progress-bar"></div>
        <div id="mae" value="'.$_GET['mae'].'">'.$_GET['mae'].'</div>
                            ';
        }
    
    if ($tipocont == "Serie") {
       
        $capsig = $_GET['con'] + 1;

        $mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
        $queryser = $mysqli->query("SELECT * FROM maecap18 WHERE idcont18=$_GET[mae] and numcap18=$_GET[con] and idtemp18=$_GET[tem] ");
        $queryser->data_seek(0);
    
        $valoresser = $queryser->fetch_assoc();				
        
        $idcapit = $valoresser['idcapi18'];
        $nombrecap = $valoresser['nomcap18'];
        $descripcap = $valoresser['descap18'];
        $direcapSD = $valoresser['dircap181'];
        $direcapHD = $valoresser['dircap182'];
        $direcapFHD = $valoresser['dircap183'];

        echo '
    
                        
        <video id="repcont" class="repcont" width="100%" height="100%" autoplay preload onloadstart="this.volume=1" autoplay controls controlsList="nodownload" disablePictureInPicture>
        
            <source src="'.$direcapFHD.''.$idcapit.'.mp4" type="video/mp4">
            <source src="'.$direcapFHD.''.$idcapit.'.mkv" type="video/webm">
        
            <source src="" type="video/mp4">
            <source src="" type="video/webm">

            <track label="Español" kind="subtitles" srclang="es" >
            Tu navegador no es compatible con este formato, consulta la guia de compatibilidad en los ajustes de tu equipo (mp4, mkv).
        </video>

        <a id="tiempototal"><div></div></a>
        <a id="tiempoactual"><div></div></a>
        <a id="porcentaje"><div></div></a>
        <a id="porcentaje"><div></div></a>
        <div id="progress-bar"></div>
        
        <a hidden id="ID" value='.$idcapit.'>'.$idcapit.'</a>
        <a hidden id="SD" value='.$direcapSD.'>'.$direcapSD.'</a>
        <a hidden id="HD" value='.$direcapHD.'>'.$direcapHD.'</a>
        <a hidden id="FHD" value='.$direcapFHD.'>'.$direcapFHD.'</a>
        <div id="mae" value="'.$_GET['mae'].'">'.$_GET['mae'].'</div>
        <div id="con" value="'.$_GET['con'].'">'.$_GET['con'].'</div>
        <div id="tem" value="'.$_GET['tem'].'">'.$_GET['tem'].'</div>
        <div id="capsig">'.$capsig.'</div>
                            ';
        }
       
    

    ?>
 <button id="botsig" class="botsig" onclick=nextmov($capsig); hidden>Ver siguiente video</button>
    
    <script src="assets/js/vercont.js">
 
    </script>
    
 <style>
  .video-container {
    position: relative;
    width: fit-content;
    overflow: hidden;
    background: #000;
  }

  video {
    display: block;
    max-width: 100%;
  }

  /* Capa que centra los botones */
  .capa-controles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center; /* Centrado horizontal */
    align-items: center;     /* Centrado vertical */
    gap: 20px;
    background: rgba(0, 0, 0, 0.2); /* Sombra suave sobre el video */
    transition: opacity 0.4s ease;  /* Transición suave al aparecer/desaparecer */
    opacity: 0;                     /* Ocultos por defecto */
    pointer-events: none;           /* Evita que bloqueen el clic al video si están invisibles */
  }

  /* Clase que activaremos con JS */
  .mostrar-controles {
    opacity: 1;
    pointer-events: auto;
  }

  /* Botones redondos y naranjas */
  .btn-circular {
    background-color: #cc5500; /* Naranja oscuro */
    color: white;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    font-size: 24px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.5);
    transition: transform 0.2s;
  }

  .btn-circular:hover {
    background-color: #ff6600;
    transform: scale(1.1);
  }

  .btn-principal {
    width: 80px; /* Botón central un poco más grande */
    height: 80px;
    font-size: 32px;
  }
  
</style>
           
</body>
<script type='text/javascript'> 
      document.oncontextmenu = function(){return false} 
</script>
</html>