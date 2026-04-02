
<?php
header("Content-Type: text/html;charset=utf-8");
error_reporting(0);
//$idcon = '';
//$idcon = $_POST['con'];
//echo ''.$idcon.'';
function cargarprincipal($perfil){
      
        $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        
        if ($perfil == "Infantil"){
            
            $resultado0 = $mysqli->query("SELECT idecon04, nomcon04, procon04, sercon04, dircon04, dirtra04,
                                                 sincon04 FROM maecon04 WHERE tipcon04='Pelicula' and catcon04='Animadas' ORDER BY RAND() LIMIT 1");
            $resultado0->data_seek(0);
        
            if ($fila0 = $resultado0->fetch_assoc()) {
                
                $contenidoid = $fila0['idecon04'];      //--'1'--
                $contenidoimg = $fila0['nomcon04'];     //--'SpiderMan Un Nuevo Universo'--
                $contenidoser = $fila0['sercon04'];     //--'192.168.100.104'--
                $contenidodir = $fila0['dircon04'];     //--'/peli/'--
                $contenidosin = $fila0['sincon04'];     //--'En un universo paralelo...'--
                $productor = $fila0['procon04'];        //--'marvel'--
                $contenidotra = $fila0['dirtra04'];     //--'/trailer/'--
                 //$contenidovid = $fila0['arccon04'];
                //$contenidopri = $fila0['precon04'];
                //$contenidolg = $fila0['nomcon04'];
                // = $fila0['nomcon04'];
                $resultado3 = $mysqli->QUERY("SELECT sdruta19, sdrtra19 FROM maerut19 WHERE idcont19=$contenidoid");
                                    $valores3 = $resultado3->fetch_assoc();

                                    $contdirsd = $valores3['sdruta19'];
                                    $tradirsd = $valores3['sdrtra19'];
                                  

                echo '
                    <div class="pelicula-principal" >
                        <div class="contenedor2">
                            <img id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                            <img id="prod" src="/logos/'.$productor.'.png" alt="">
                            <h3 id="titulo" class="titulo" ></h3>
                            <!--<h3 class="titulo" ></h3>--->
                            <p class="descripcion" id="sinopsis" >'.$contenidosin.'</p>
                            <a id="con" href="vercontenido.php?mae='.$contenidoid.'"><button onclick="ver()" role="button" value="" class="boton">&#9654;</button></a></>
                        <button id="fullscreen" action="pelicula.php" method="POST" role="button" class="boton">&#x26F6;</button>
                        <button id="trailer" action="pelicula.php" method="POST" role="button" class="boton">&#x23EF;</button>
                        </div>
                        <!--<div class="contenedor3 stye="background-image: url(/prin/'.$contenidoid.'.webp)"">--->
                        <div class="contenedor3">   
                            
                            <video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" controlsList="nodownload"></video>
                            <div class="espaciador2"></div>
                        </div>
                    </div>
                    <div class="espaciador"></div>
                ';
           }
        }
      
        if ($perfil == "Familiar"){
            
            $resultado0 = $mysqli->query("SELECT idecon04, nomcon04, procon04, sercon04, dircon04, dirtra04,
                                                 sincon04 FROM maecon04 WHERE tipcon04='Pelicula' and catcon04='Ver en Familia' ORDER BY RAND() LIMIT 1");
            $resultado0->data_seek(0);
        
            if ($fila0 = $resultado0->fetch_assoc()) {
                
                $contenidoid = $fila0['idecon04'];      //--'1'--
                $contenidoimg = $fila0['nomcon04'];     //--'SpiderMan Un Nuevo Universo'--
                $contenidoser = $fila0['sercon04'];     //--'192.168.100.104'--
                //$contenidodir = $fila0['dircon04'];     //--'/peli/'--
                $contenidosin = $fila0['sincon04'];     //--'En un universo paralelo...'--
                $productor = $fila0['procon04'];        //--'marvel'--
                //$contenidotra = $fila0['dirtra04'];     //--'/trailer/'--
                 //$contenidovid = $fila0['arccon04'];
                //$contenidopri = $fila0['precon04'];
                //$contenidolg = $fila0['nomcon04'];
                // = $fila0['nomcon04'];
                $resultado3 = $mysqli->QUERY("SELECT sdruta19, sdrtra19 FROM maerut19 WHERE idcont19=$contenidoid");
                $valores3 = $resultado3->fetch_assoc();

                $contdirsd = $valores3['sdruta19'];
                $tradirsd = $valores3['sdrtra19'];
                echo '
                <div class="pelicula-principal" >
                
                <div class="contenedor2">
                    <img id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                    <img id="prod" src="/logos/'.$productor.'.png" alt="">
                    <h3 id="titulo" class="titulo" ></h3>
                    <!--<h3 class="titulo" ></h3>--->
                    <p class="descripcion" id="sinopsis" >'.$contenidosin.'</p>
                    <a id="con" href="vercontenido.php?mae='.$contenidoid.'"><button onclick="ver()" role="button" value="" class="boton">&#9654;</button></a></>
                    <button id="fullscreen" action="pelicula.php" method="POST" role="button" class="boton">&#x26F6;</button>
                    <button id="trailer" action="pelicula.php" method="POST" role="button" class="boton">&#x23EF;</button>
                </div>
                <!--<div class="contenedor3 stye="background-image: url(/prin/'.$contenidoid.'.webp)"">--->
                <div class="contenedor3">   
                    
                    <video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" controlsList="nodownload"></video>
                    <div class="espaciador2"></div>
                </div>
            </div>
        ';   
            }
        }
        
        if ($perfil == "Full Perfil"){
            
            $resultado0 = $mysqli->query("SELECT idecon04, nomcon04, procon04, sercon04, dircon04, dirtra04,
                                                 sincon04 FROM maecon04 WHERE tipcon04='Pelicula' ORDER BY RAND() LIMIT 1");
            $resultado0->data_seek(0);
        
            if ($fila0 = $resultado0->fetch_assoc()) {
                
                $contenidoid = $fila0['idecon04'];      //--'1'--
                $contenidoimg = $fila0['nomcon04'];     //--'SpiderMan Un Nuevo Universo'--
                $contenidoser = $fila0['sercon04'];     //--'192.168.100.104'--
                $contenidodir = $fila0['dircon04'];     //--'/peli/'--
                $contenidosin = $fila0['sincon04'];     //--'En un universo paralelo...'--
                $productor = $fila0['procon04'];        //--'marvel'--
                //$contenidotra = $fila0['dirtra04'];     //--'/trailer/'--
                 //$contenidovid = $fila0['arccon04'];
                //$contenidopri = $fila0['precon04'];
                //$contenidolg = $fila0['nomcon04'];
                // = $fila0['nomcon04'];
                $resultado3 = $mysqli->QUERY("SELECT sdruta19, sdrtra19 FROM maerut19 WHERE idcont19=$contenidoid");
                $valores3 = $resultado3->fetch_assoc();

                $contdirsd = $valores3['sdruta19'];
                $tradirsd = $valores3['sdrtra19'];
                echo '
                <div class="pelicula-principal" >
                
                <div class="contenedor2">

                    <img id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                    <img id="prod" src="/logos/'.$productor.'.png" alt="">
                    <h3 id="titulo" class="titulo" ></h3>
                    <!--<h3 class="titulo" ></h3>--->
                    <p class="descripcion" id="sinopsis" >'.$contenidosin.'</p>
                    <a id="con" href="vercontenido.php?mae='.$contenidoid.'"><button onclick="ver()" role="button" value="" class="boton">&#9654;</button></a></>
                    <button id="fullscreen" action="pelicula.php" method="POST" role="button" class="boton">&#x26F6;</button>
                    <button id="trailer" action="pelicula.php" method="POST" role="button" class="boton">&#x23EF;</button>
                  
                </div>
                <!--<div class="contenedor3 stye="background-image: url(/prin/'.$contenidoid.'.webp)"">--->
                <div class="contenedor3">   
                    
                    <video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" controlsList="nodownload"></video>
                    <div class="espaciador2"></div>

                </div>
                <div class="espaciador">
                <nav>';
            }
            $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
            if ($mysqli->connect_errno) {
                echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
             
            $resultado = $mysqli->query("SELECT * FROM catcon07 WHERE match(percat07) against('+$perfil' IN BOOLEAN MODE) LIMIT 13");
                                             
            $resultado->data_seek(0);
            $bot = 0;

            while ($fila = $resultado->fetch_assoc()) {
                $bot++;
                echo '
                        
                            <a class="m2" href="#page-'.$bot.'">'.$fila['nomcat07'].'</a>
                    ';
            }
            echo '
            </nav>
            </div>
                </div>

                
          <scroll-container>';
        }
}
function cargarprincipalser($perfil){
      
    $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    if ($perfil == "Infantil"){
        
        $resultado0 = $mysqli->query("SELECT idecon04, nomcon04, procon04, sercon04, dircon04, dirtra04,
                                             sincon04 FROM maecon04 WHERE tipcon04='Serie' and catcon04='Animadas' ORDER BY RAND() LIMIT 1");
        $resultado0->data_seek(0);
    
        if ($fila0 = $resultado0->fetch_assoc()) {
            
            $contenidoid = $fila0['idecon04'];      //--'1'--
            $contenidoimg = $fila0['nomcon04'];     //--'SpiderMan Un Nuevo Universo'--
            $contenidoser = $fila0['sercon04'];     //--'192.168.100.104'--
            $contenidodir = $fila0['dircon04'];     //--'/peli/'--
            $contenidosin = $fila0['sincon04'];     //--'En un universo paralelo...'--
            $productor = $fila0['procon04'];        //--'marvel'--
            $contenidotra = $fila0['dirtra04'];     //--'/trailer/'--

            $resultado3 = $mysqli->QUERY("SELECT sdrtra19 FROM maerut19 WHERE idcont19=$contenidoid");
                                    $valores3 = $resultado3->fetch_assoc();

                                    
                                    $tradirsd = $valores3['sdrtra19'];
                                  
      
            echo '
            <div class="pelicula-principal" >
            <!--<video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" preload onloadstart="this.volume=1"  controlsList="nodownload"></video>
                <video class="videoPrin" id="videoPrin" poster="assets/imagen/pngv.png" autoplay controls preload onloadstart="this.volume=1"  controlsList="nodownload nopictureinpicture" disablePictureInPicture>
                <source src="assets/video/Spider Man Un Nuevo Universo (2018) Tráiler.mp4#t=,00:01:13" type="video/mp4">
            </video>--->
            <div class="contenedor2">
                <img id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                <img id="prod" src="/logos/'.$productor.'.png" alt="">
                <h3 id="titulo" class="titulo" ></h3>
                <!--<h3 class="titulo" ></h3>--->
                <p class="descripcion" id="sinopsis" >'.$contenidosin.'</p>
                
                <a id="con" href="seriesdet.php?cont='.$contdirsd.''.$contenidoid.'"><button onclick="ver()" role="button" value="" class="boton">&#9654;</button></a></>
                <button id="fullscreen" action="pelicula.php" method="POST" role="button" class="boton">&#x26F6;</button>
                <button id="trailer" action="pelicula.php" method="POST" role="button" class="boton">&#x23EF;</button>
            </div>
            <!--<div class="contenedor3 stye="background-image: url(/prin/'.$contenidoid.'.webp)"">--->
            <div class="contenedor3">   
                
                <video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" controlsList="nodownload"></video>
                <div class="espaciador2"></div>
            </div>
        </div>
        <div class="espaciador"></div>
            ';
       }
    }
  
    if ($perfil == "Familiar"){
        
        $resultado0 = $mysqli->query("SELECT idecon04, nomcon04, procon04, sercon04, dircon04, dirtra04,
                                             sincon04 FROM maecon04 WHERE tipcon04='Serie' and catcon04<>'Accion' and catcon04<>'terror' ORDER BY RAND() LIMIT 1");
        $resultado0->data_seek(0);
    
        if ($fila0 = $resultado0->fetch_assoc()) {
            
            $contenidoid = $fila0['idecon04'];      //--'1'--
            $contenidoimg = $fila0['nomcon04'];     //--'SpiderMan Un Nuevo Universo'--
            $contenidoser = $fila0['sercon04'];     //--'192.168.100.104'--
            $contenidodir = $fila0['dircon04'];     //--'/peli/'--
            $contenidosin = $fila0['sincon04'];     //--'En un universo paralelo...'--
            $productor = $fila0['procon04'];        //--'marvel'--
            $contenidotra = $fila0['dirtra04'];     //--'/trailer/'--
          
            $resultado3 = $mysqli->QUERY("SELECT sdrtra19 FROM maerut19 WHERE idcont19=$contenidoid");
            $valores3 = $resultado3->fetch_assoc();

            
            $tradirsd = $valores3['sdrtra19'];
          
            echo '
            <div class="pelicula-principal" >
            <!--<video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" preload onloadstart="this.volume=1"  controlsList="nodownload"></video>
                <video class="videoPrin" id="videoPrin" poster="assets/imagen/pngv.png" autoplay controls preload onloadstart="this.volume=1"  controlsList="nodownload nopictureinpicture" disablePictureInPicture>
                <source src="assets/video/Spider Man Un Nuevo Universo (2018) Tráiler.mp4#t=,00:01:13" type="video/mp4">
            </video>--->
            <div class="contenedor2">
                <img id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                <img id="prod" src="/logos/'.$productor.'.png" alt="">
                <h3 id="titulo" class="titulo" ></h3>
                <!--<h3 class="titulo" ></h3>--->
                <p class="descripcion" id="sinopsis" >'.$contenidosin.'</p>
                
                <a id="con" href="seriesdet.php?cont='.$contdirsd.''.$contenidoid.'"><button onclick="ver()" role="button" value="" class="boton">&#9654;</button></a></>
                <button id="fullscreen" action="pelicula.php" method="POST" role="button" class="boton">&#x26F6;</button>
                <button id="trailer" action="pelicula.php" method="POST" role="button" class="boton">&#x23EF;</button>
            </div>
            <!--<div class="contenedor3 stye="background-image: url(/prin/'.$contenidoid.'.webp)"">--->
            <div class="contenedor3">   
                
                <video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" controlsList="nodownload"></video>
                <div class="espaciador2"></div>
            </div>
        </div>
        <div class="espaciador"></div>
            ';         
        }
    }
    
    if ($perfil == "Full Perfil"){
        
        $resultado0 = $mysqli->query("SELECT idecon04, nomcon04, procon04, sercon04, dircon04, dirtra04,
                                             sincon04 FROM maecon04 WHERE tipcon04='Serie' ORDER BY RAND() LIMIT 1");
        $resultado0->data_seek(0);
    
        if ($fila0 = $resultado0->fetch_assoc()) {
            
            $contenidoid = $fila0['idecon04'];      //--'1'--
            $contenidoimg = $fila0['nomcon04'];     //--'SpiderMan Un Nuevo Universo'--
            $contenidoser = $fila0['sercon04'];     //--'192.168.100.104'--
            $contenidodir = $fila0['dircon04'];     //--'/peli/'--
            $contenidosin = $fila0['sincon04'];     //--'En un universo paralelo...'--
            $productor = $fila0['procon04'];        //--'marvel'--
            $contenidotra = $fila0['dirtra04'];     //--'/trailer/'--
            
            $resultado3 = $mysqli->QUERY("SELECT sdrtra19 FROM maerut19 WHERE idcont19=$contenidoid");
            $valores3 = $resultado3->fetch_assoc();

            
            $tradirsd = $valores3['sdrtra19'];

            echo '
            <div class="pelicula-principal" >
            <!--<video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" preload onloadstart="this.volume=1"  controlsList="nodownload"></video>
                <video class="videoPrin" id="videoPrin" poster="assets/imagen/pngv.png" autoplay controls preload onloadstart="this.volume=1"  controlsList="nodownload nopictureinpicture" disablePictureInPicture>
                <source src="assets/video/Spider Man Un Nuevo Universo (2018) Tráiler.mp4#t=,00:01:13" type="video/mp4">
            </video>--->
            <div class="contenedor2">
                <img id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                <img id="prod" src="/logos/'.$productor.'.png" alt="">
                <h3 id="titulo" class="titulo" ></h3>
                <!--<h3 class="titulo" ></h3>--->
                <p class="descripcion" id="sinopsis" >'.$contenidosin.'</p>
                               
                <a id="con" href="seriesdet.php?cont='.$contdirsd.''.$contenidoid.'"><button onclick="ver()" role="button" value="" class="boton">&#9654;</button></a></>
                <button id="fullscreen" action="pelicula.php" method="POST" role="button" class="boton">&#x26F6;</button>
                <button id="trailer" action="pelicula.php" method="POST" role="button" class="boton">&#x23EF;</button>

            </div>
            <!--<div class="contenedor3 stye="background-image: url(/prin/'.$contenidoid.'.webp)"">--->
            <div class="contenedor3">   
                
                <video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" controlsList="nodownload"></video>
                <div class="espaciador2"></div>
            </div>
        </div>
        <div class="espaciador"></div>
            ';
        }
    }
}
function cargarprincipalserdet($perfil){
    //Traer variable post desde formulario series hasta el detalle
    global $idcon;
    $id = $_GET['cont'];
  
    $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    if ($perfil == "Infantil"){
      
        $resultado0 = $mysqli->query("SELECT idecon04, nomcon04, procon04, sercon04, dircon04, dirtra04,
                                             sincon04 FROM maecon04 WHERE idecon04=$id");
        $resultado0->data_seek(0);
    
        if ($fila0 = $resultado0->fetch_assoc()) {
            
            $contenidoid = $fila0['idecon04'];      //--'1'--
            $contenidoimg = $fila0['nomcon04'];     //--'SpiderMan Un Nuevo Universo'--
            $contenidoser = $fila0['sercon04'];     //--'192.168.100.104'--
            $contenidodir = $fila0['dircon04'];     //--'/peli/'--
            $contenidosin = $fila0['sincon04'];     //--'En un universo paralelo...'--
            $productor = $fila0['procon04'];        //--'marvel'--
            $contenidotra = $fila0['dirtra04'];     //--'/trailer/'--
            
            $resultado3 = $mysqli->QUERY("SELECT sdrtra19 FROM maerut19 WHERE idcont19=$contenidoid");
            $valores3 = $resultado3->fetch_assoc();

            
            $tradirsd = $valores3['sdrtra19'];

            echo '
            <div class="pelicula-principal" >
                <div class="contenedor2">
                    <img id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                    <img id="prod" src="/logos/'.$productor.'.png" alt="">
                    <h3 id="titulo" class="titulo" ></h3>
                    <!--<h3 class="titulo" ></h3>--->
                    <p class="descripcion" id="sinopsis" >'.$contenidosin.'</p>
                                
                    <a id="con" href="vercontenido.php?mae='.$contenidoid.'&con=1&tem=1"><button role="button" value="" class="boton">&#9654;</button></a></>
                    <button id="fullscreen" action="pelicula.php" method="POST" role="button" class="boton">&#x26F6;</button>
                    <button id="trailer" action="pelicula.php" method="POST" role="button" class="boton">&#x23EF;</button>
                </div>
            <div class="contenedor3">   
                <video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" controlsList="nodownload"></video>
                <div class="espaciador2"></div>
            </div>
        </div>
        <div class="espaciador"></div>
            ';
       }
    }
  
    if ($perfil == "Familiar"){
       
        $resultado0 = $mysqli->query("SELECT idecon04, nomcon04, procon04, sercon04, dircon04, dirtra04,
                                             sincon04 FROM maecon04 WHERE idecon04=$id");
        $resultado0->data_seek(0);
    
        if ($fila0 = $resultado0->fetch_assoc()) {
            
            $contenidoid = $fila0['idecon04'];      //--'1'--
            $contenidoimg = $fila0['nomcon04'];     //--'SpiderMan Un Nuevo Universo'--
            $contenidoser = $fila0['sercon04'];     //--'192.168.100.104'--
            $contenidodir = $fila0['dircon04'];     //--'/peli/'--
            $contenidosin = $fila0['sincon04'];     //--'En un universo paralelo...'--
            $productor = $fila0['procon04'];        //--'marvel'--
            $contenidotra = $fila0['dirtra04'];     //--'/trailer/'--
             //$contenidovid = $fila0['arccon04'];
            //$contenidopri = $fila0['precon04'];
            //$contenidolg = $fila0['nomcon04'];
            // = $fila0['nomcon04'];
            $resultado3 = $mysqli->QUERY("SELECT sdrtra19 FROM maerut19 WHERE idcont19=$contenidoid");
            $valores3 = $resultado3->fetch_assoc();

            
            $tradirsd = $valores3['sdrtra19'];

            echo '
            <div class="pelicula-principal" >
                <div class="contenedor2">
                    <img id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                    <img id="prod" src="/logos/'.$productor.'.png" alt="">
                    <h3 id="titulo" class="titulo" ></h3>
                    <!--<h3 class="titulo" ></h3>--->
                    <p class="descripcion" id="sinopsis" >'.$contenidosin.'</p>
                                
                    <a id="con" href="vercontenido.php?mae='.$contenidoid.'&con=1&tem=1"><button role="button" value="" class="boton">&#9654;</button></a></>
                    <button id="fullscreen" action="pelicula.php" method="POST" role="button" class="boton">&#x26F6;</button>
                    <button id="trailer" action="pelicula.php" method="POST" role="button" class="boton">&#x23EF;</button>
                </div>
            <div class="contenedor3">   
                <video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" controlsList="nodownload"></video>
                <div class="espaciador2">
                </div>
            </div>
        </div>
        <div class="espaciador"></div>
            ';         
        }
    }
    
    if ($perfil == "Full Perfil"){
        
        $resultado0 = $mysqli->query("SELECT idecon04, nomcon04, procon04, sercon04, dircon04, dirtra04,
                                             sincon04 FROM maecon04 WHERE idecon04=$id");
        $resultado0->data_seek(0);
    
        if ($fila0 = $resultado0->fetch_assoc()) {
            
            $contenidoid = $fila0['idecon04'];      //--'1'--
            $contenidoimg = $fila0['nomcon04'];     //--'SpiderMan Un Nuevo Universo'--
            $contenidoser = $fila0['sercon04'];     //--'192.168.100.104'--
            $contenidodir = $fila0['dircon04'];     //--'/peli/'--
            $contenidosin = $fila0['sincon04'];     //--'En un universo paralelo...'--
            $productor = $fila0['procon04'];        //--'marvel'--
            $contenidotra = $fila0['dirtra04'];     //--'/trailer/'--
             //$contenidovid = $fila0['arccon04'];
            //$contenidopri = $fila0['precon04'];
            //$contenidolg = $fila0['nomcon04'];
            // = $fila0['nomcon04'];
            $resultado3 = $mysqli->QUERY("SELECT sdrtra19 FROM maerut19 WHERE idcont19=$contenidoid");
            $valores3 = $resultado3->fetch_assoc();

            
            $tradirsd = $valores3['sdrtra19'];

            echo '
            <div class="pelicula-principal" >
                <div class="contenedor2">
                    <img id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                    <img id="prod" src="/logos/'.$productor.'.png" alt="">
                    <h3 id="titulo" class="titulo" ></h3>
                    <!--<h3 class="titulo" ></h3>--->
                    <p class="descripcion" id="sinopsis" >'.$contenidosin.'</p>
                    
                    <a id="con" href="vercontenido.php?mae='.$contenidoid.'&con=1&tem=1"><button role="button" value="" class="boton">&#9654;</button></a></>
                    <button id="fullscreen" action="pelicula.php" method="POST" role="button" class="boton">&#x26F6;</button>
                    <button id="trailer" action="pelicula.php" method="POST" role="button" class="boton">&#x23EF;</button>
                </div>
            <div class="contenedor3">   
                
                <video width="100%" height="100%"class="videoPrin" id="videoPrin" poster="/prin/'.$contenidoid.'.webp" src="'.$tradirsd.''.$contenidoid.'.mp4" controlsList="nodownload"></video>
                <div class="espaciador2"></div>
            </div>
        </div>
        <div class="espaciador"></div>
            ';
        }
    }
}
function cargacont($perfil){
    echo 'entro en funcionn caargacont';

    $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
         
        //$resultado = $mysqli->query("SELECT * FROM catcon07 WHERE match(percat07) against('+$perfil' IN BOOLEAN MODE) LIMIT 13");
        $resultado = $mysqli->query("SELECT * FROM catcon07 WHERE match(percat07) against('+$perfil' IN BOOLEAN MODE)");
                                                                        
        $resultado->data_seek(0);
        $bot = 0;
        while ($fila = $resultado->fetch_assoc()) {
            $bot++;
            echo '
            
            <scroll-page id="page-'.$bot.'"><div id="desaparecer'.$bot.'" class="peliculas-populares">    
                <div class="contenedor-titulos-controles">
                    <!--<h3><a href="categoria.php?cont='.$fila['nomcat07'].'" id="categ">'.$fila['nomcat07'].'</a></h3>-->
                    <h3><a id="categ">'.$fila['nomcat07'].'</a></h3>
                    <div class="indicadores">
                    </div>
                </div>
         
                <div class="contenedor-principal">
                    <button onclick="bt('.$bot.')" role="button" id="'.$bot.'flecha-izquierda" class="flecha-izquierda"><</button>
                    <div class="contenedor-carrousel'.$bot.'">
                        <div class="carrousel">';
                            $resultado2 = $mysqli->QUERY("SELECT idecon04, nomcon04, dircon04, procon04, sercon04, arccon04, precon04, covcon04, dirtra04, sincon04, status04, feclan04 FROM maecon04 WHERE status04='ACT' and tipcon04='pelicula' and catcon04='".$fila['nomcat07']."' ORDER BY RAND() LIMIT 30");
                            $resultado2->data_seek(0);
                            $guia2 = 0;
                            $cat = "";
                            while ($fila2 = $resultado2->fetch_assoc()) {
                                $contenidoid = $fila2['idecon04'];
                                $contenidovid = $fila2['arccon04'];
                                $contenidoimg = $fila2['covcon04'];
                                $contenidodir = $fila2['dircon04'];
                                $contenidolg = $fila2['nomcon04'];
                                $contenido = $fila2['nomcon04'];
                                $productor = $fila2['procon04'];
                                $contenidopri = $fila2['precon04'];
                                $contenidosin = $fila2['sincon04'];
                                $contenidotra = $fila2['dirtra04'];
                                
                                $resultado3 = $mysqli->QUERY("SELECT sdruta19, hdruta19, fhdrut19, 4kruta19, 8kruta19, sdrtra19, hdrtra19, fhdtra19 FROM maerut19 WHERE idcont19=$contenidoid");
                                $valores3 = $resultado3->fetch_assoc();
                                
                                $contdirsd = $valores3['sdruta19'];
                                $contdirhd = $valores3['hdruta19'];
                                $contdirfhd = $valores3['fhdrut19'];
                                $contdir4k = $valores3['4kruta19'];
                                $contdir8k = $valores3['8kruta19'];

                                $tradirsd = $valores3['sdrtra19'];
                                $tradirhd = $valores3['hdrtra19'];
                                $tradirfhd = $valores3['fhdtra19'];
                                //$contdirsd = $valores3[''];
                                //$contdirsd = $valores3[''];
                                //$contdirsd = $valores3[''];
                                //$contdirsd = $valores3[''];
                                //$contdirsd = $valores3[''];
                                //$contdirsd = $valores3[''];
                                //<p id="'.$cat.'dir'.$val.'" value="'.$contenidodir.'">'.$contenidodir.'</p>
                                
                                $ser = $fila2['sercon04']; 
                                $guia2++;
                                $val = $guia2;
                                $cat = $fila['idecat07'];
                                $fechacon = $fila2['feclan04'];
                                $fechacon1 = new datetime($fechacon);
                                $fechaActual = date ( 'd-m-Y' );
                                $fechasis = new datetime($fechaActual);
                                $diff = date_diff($fechacon1,$fechasis);
                                        
                                if ($diff-> days <= 60){
                                    echo '
                                        <div onclick="si('.$val.','.$cat.')" class="pelicula" id="nueva">
                                            <a href="#" id="cover"><img src="/cover/'.$contenidoid.'.webp" alt="" ></a>
                                                <p hidden id="'.$cat.'id'.$val.'" value="'.$contenidoid.'">'.$contenidoid.'</p> 
                                                <p hidden id="'.$cat.'video'.$val.'" value="'.$contenidovid.'">'.$contenidovid.'</p>
                                                <p hidden id="'.$cat.'cover'.$val.'" value="'.$contenidoimg.'">'.$contenidoimg.'</p>
                                                <!--<p id="'.$cat.'logo'.$val.'" value="'.$contenidolg.'">'.$contenidolg.'</p>-->
                                                <p hidden id="'.$cat.'prod'.$val.'" value="'.$productor.'">'.$productor.'</p>
                                                <p hidden id="'.$cat.'imgprin'.$val.'" value="'.$contenidopri.'">'.$contenidopri.'</p>
                                                <p hidden id="'.$cat.'sinop'.$val.'" value="'.$contenidosin.'">'.$contenidosin.'</p>
                                                <!--<p id="'.$cat.'cont'.$val.'" value="'.$contenido.'">'.$contenido.'</p>-->
                                                <p hidden id="'.$cat.'ser'.$val.'" value="'.$ser.'">'.$ser.'</p>
                                                
                                                <p hidden id="'.$cat.'trasd'.$val.'" value="'.$tradirsd.'">'.$tradirsd.'</p>
                                                <p hidden id="'.$cat.'trahd'.$val.'" value="'.$tradirhd.'">'.$tradirhd.'</p>
                                                <p hidden id="'.$cat.'trafhd'.$val.'" value="'.$tradirfhd.'">'.$tradirfhd.'</p>
                                                
                                                <p hidden id="'.$cat.'dirsd'.$val.'" value="'.$contdirsd.'">'.$contdirsd.'</p>
                                                <p hidden id="'.$cat.'dirhd'.$val.'" value="'.$contdirhd.'">'.$contdirhd.'</p>
                                                <p hidden id="'.$cat.'dirfhd'.$val.'" value="'.$contdirfhd.'">'.$contdirfhd.'</p>
                                                <p hidden id="'.$cat.'dir4k'.$val.'" value="'.$contdirfhd.'">'.$contdirfhd.'</p>
                                                <p hidden id="'.$cat.'dir8k'.$val.'" value="'.$contdirfhd.'">'.$contdirfhd.'</p>

                                            </div>
                                   ';
                                }
                                       
                                if ($diff-> days > 60){
                                    echo '
                                        <div onclick="si('.$val.','.$cat.')" class="pelicula" id="aa">
                                            <a href="#" id="cover"><img src="/cover/'.$contenidoid.'.webp" alt="" ></a>
                                                <p hidden id="'.$cat.'id'.$val.'" value="'.$contenidoid.'">'.$contenidoid.'</p> 
                                                <p hidden id="'.$cat.'video'.$val.'" value="'.$contenidovid.'">'.$contenidovid.'</p>
                                                <p hidden id="'.$cat.'cover'.$val.'" value="'.$contenidoimg.'">'.$contenidoimg.'</p>
                                                <!--<p id="'.$cat.'logo'.$val.'" value="'.$contenidolg.'">'.$contenidolg.'</p>-->
                                                <p hidden id="'.$cat.'prod'.$val.'" value="'.$productor.'">'.$productor.'</p>
                                                <p hidden id="'.$cat.'imgprin'.$val.'" value="'.$contenidopri.'">'.$contenidopri.'</p>
                                                <p hidden id="'.$cat.'sinop'.$val.'" value="'.$contenidosin.'">'.$contenidosin.'</p>
                                                <!--<p id="'.$cat.'cont'.$val.'" value="'.$contenido.'">'.$contenido.'</p>-->
                                                <p hidden id="'.$cat.'ser'.$val.'" value="'.$ser.'">'.$ser.'</p>
                                                
                                                <p hidden id="'.$cat.'trasd'.$val.'" value="'.$tradirsd.'">'.$tradirsd.'</p>
                                                <p hidden id="'.$cat.'trahd'.$val.'" value="'.$tradirhd.'">'.$tradirhd.'</p>
                                                <p hidden id="'.$cat.'trafhd'.$val.'" value="'.$tradirfhd.'">'.$tradirfhd.'</p>
                                                
                                                <p hidden id="'.$cat.'dirsd'.$val.'" value="'.$contdirsd.'">'.$contdirsd.'</p>
                                                <p hidden id="'.$cat.'dirhd'.$val.'" value="'.$contdirhd.'">'.$contdirhd.'</p>
                                                <p hidden id="'.$cat.'dirfhd'.$val.'" value="'.$contdirfhd.'">'.$contdirfhd.'</p>
                                                <p hidden id="'.$cat.'dir4k'.$val.'" value="'.$contdirfhd.'">'.$contdirfhd.'</p>
                                                <p hidden id="'.$cat.'dir8k'.$val.'" value="'.$contdirfhd.'">'.$contdirfhd.'</p>
                                         </div>
                                            ';
                                }
                            }
            echo '
                        </div>
                    </div>
                    <button onclick="bt('.$bot.')" role="button" id="'.$bot.'flecha-derecha" class="flecha-derecha" >></button>
                </div>
                </div>
                </scroll-page>
            </scroll-container></div>
                            ';
        }
}
function cargacontser($perfil){
    
    $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
         
        //$resultado = $mysqli->query("SELECT * FROM catcon07 WHERE match(percat07) against('+$perfil' IN BOOLEAN MODE) LIMIT 13");// CONSULTA TODAS LAS CATEGORIAS 
        $resultado = $mysqli->query("SELECT * FROM catcon07 WHERE match(percat07) against('+$perfil' IN BOOLEAN MODE) LIMIT 13");// CONSULTA TODAS LAS CATEGORIAS 
        $resultado->data_seek(0);
        $bot = 0;
        while ($fila = $resultado->fetch_assoc()) {
            $bot++;
            echo '
                <div class="peliculas-populares">    
                    <div class="contenedor-titulos-controles">
                        <!--<h3><a href="categoria.php?cont='.$fila['nomcat07'].'" id="categ">'.$fila['nomcat07'].'</a></h3>--cattegoria con acceso-->
                        <h3><a id="categ">'.$fila['nomcat07'].'</a></h3>
                            <div class="indicadores">
                               
                            </div>
                    </div>
         
                    <div class="contenedor-principal">
                        <button onclick="bt('.$bot.')" role="button" id="'.$bot.'flecha-izquierda" class="flecha-izquierda"><</button>
                        <div class="contenedor-carrousel'.$bot.'">
                            <div class="carrousel">';
                     
                                $resultado2 = $mysqli->QUERY("SELECT idecon04, nomcon04, dircon04, procon04, sercon04, arccon04, precon04, covcon04, dirtra04, sincon04, status04, feclan04 FROM maecon04 WHERE status04='ACT' and tipcon04='Serie' and catcon04='".$fila['nomcat07']."' ORDER BY RAND() LIMIT 30");
                                $resultado2->data_seek(0);
                                $guia2 = 0;
                                $cat = "";
                                while ($fila2 = $resultado2->fetch_assoc()) {
                                    $contenidoid = $fila2['idecon04'];
                                    $contenidovid = $fila2['arccon04'];
                                    $contenidoimg = $fila2['covcon04'];
                                    $contenidodir = $fila2['dircon04'];
                                    $contenidolg = $fila2['nomcon04'];
                                    $contenido = $fila2['nomcon04'];
                                    $productor = $fila2['procon04'];
                                    $contenidopri = $fila2['precon04'];
                                    $contenidosin = $fila2['sincon04'];
                                    $contenidotra = $fila2['dirtra04'];
                                    $ser = $fila2['sercon04']; 
                                    $guia2++;
                                    $val = $guia2;
                                    $cat = $fila['idecat07'];
                                    $fechacon = $fila2['feclan04'];
                                    $fechacon1 = new datetime($fechacon);
                                    $fechaActual = date ( 'd-m-Y' );
                                    $fechasis = new datetime($fechaActual);
                                    $diff = date_diff($fechacon1,$fechasis);
                                    
                                    //--    
                                    $resultado3 = $mysqli->QUERY("SELECT sdrtra19, hdrtra19, fhdtra19 FROM maerut19 WHERE idcont19=$contenidoid");
                                    $valores3 = $resultado3->fetch_assoc(); 

                                    $tradirsd = $valores3['sdrtra19'];
                                    $tradirhd = $valores3['hdrtra19'];
                                    $tradirfhd = $valores3['fhdtra19'];

                                    //--
                                //     if ($diff-> days <= 60){
                                            
                                //             echo '
                                //             <div onclick="si('.$val.','.$cat.')" class="pelicula" id="nueva">
                                //             <a href="#" id="cover"><img src="/cover/'.$contenidoid.'.webp" alt="" ></a>
                                //                 <p hidden id="'.$cat.'id'.$val.'" value="'.$contenidoid.'">'.$contenidoid.'</p> 
                                //                 <p hidden id="'.$cat.'video'.$val.'" value="'.$contenidovid.'">'.$contenidovid.'</p>
                                //                 <p hidden id="'.$cat.'cover'.$val.'" value="'.$contenidoimg.'">'.$contenidoimg.'</p>
                                //                 <p hidden id="'.$cat.'logo'.$val.'" value="'.$contenidolg.'">'.$contenidolg.'</p>
                                //                 <p hidden id="'.$cat.'prod'.$val.'" value="'.$productor.'">'.$productor.'</p>
                                //                 <p hidden id="'.$cat.'imgprin'.$val.'" value="'.$contenidopri.'">'.$contenidopri.'</p>
                                //                 <p hidden id="'.$cat.'sinop'.$val.'" value="'.$contenidosin.'">'.$contenidosin.'</p>
                                //                 <p hidden id="'.$cat.'cont'.$val.'" value="'.$contenido.'">'.$contenido.'</p>
                                //                 <p hidden id="'.$cat.'ser'.$val.'" value="'.$ser.'">'.$ser.'</p>
                                                                                                
                                //                 <p hidden id="'.$cat.'trasd'.$val.'" value="'.$tradirsd.'">'.$tradirsd.'</p>
                                //                 <p hidden id="'.$cat.'trahd'.$val.'" value="'.$tradirhd.'">'.$tradirhd.'</p>
                                //                 <p hidden id="'.$cat.'trafhd'.$val.'" value="'.$tradirfhd.'">'.$tradirfhd.'</p>

                                //                 <p hidden id="'.$cat.'dir'.$val.'" value="'.$contenidodir.'">'.$contenidodir.'</p>
                                //             </div>
                                //    ';
                                //     }
                                       
                                //    if ($diff-> days > 60){
                                          
                                            echo '
                                            <div onclick="si('.$val.','.$cat.')" class="pelicula" id="aa">
                                            <a href="#" id="cover"><img src="/cover/'.$contenidoid.'.webp" alt="" ></a>
                                                <p hidden id="'.$cat.'id'.$val.'" value="'.$contenidoid.'">'.$contenidoid.'</p> 
                                                <p hidden id="'.$cat.'video'.$val.'" value="'.$contenidovid.'">'.$contenidovid.'</p>
                                                <p hidden id="'.$cat.'cover'.$val.'" value="'.$contenidoimg.'">'.$contenidoimg.'</p>
                                                <p hidden id="'.$cat.'logo'.$val.'" value="'.$contenidolg.'">'.$contenidolg.'</p>
                                                <p hidden id="'.$cat.'prod'.$val.'" value="'.$productor.'">'.$productor.'</p>
                                                <p hidden id="'.$cat.'imgprin'.$val.'" value="'.$contenidopri.'">'.$contenidopri.'</p>
                                                <p hidden id="'.$cat.'sinop'.$val.'" value="'.$contenidosin.'">'.$contenidosin.'</p>
                                                <p hidden id="'.$cat.'cont'.$val.'" value="'.$contenido.'">'.$contenido.'</p>
                                                <p hidden id="'.$cat.'ser'.$val.'" value="'.$ser.'">'.$ser.'</p>

                                                <p hidden id="'.$cat.'trasd'.$val.'" value="'.$tradirsd.'">'.$tradirsd.'</p>
                                                <p hidden id="'.$cat.'trahd'.$val.'" value="'.$tradirhd.'">'.$tradirhd.'</p>
                                                <p hidden id="'.$cat.'trafhd'.$val.'" value="'.$tradirfhd.'">'.$tradirfhd.'</p>

                                                <p hidden id="'.$cat.'dir'.$val.'" value="'.$contenidodir.'">'.$contenidodir.'</p>
                                            </div>
                            ';
                                //        }
                                         
                                 
                         }
                 echo '
                             </div>
                         </div>
         
                         <button onclick="bt('.$bot.')" role="button" id="'.$bot.'flecha-derecha" class="flecha-derecha" >></button>
                     </div>
         </div>
                     ';
        }
}
function cargacontserdet($perfil){
    
    $id = $_GET['cont'];
    $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
     
    $resultado = $mysqli->query("SELECT * FROM maetem17 WHERE  idmaec17=$id"); //CONSULTA TODAS LAS TEMPORADAS O CATEGORIAS 
   
    $resultado->data_seek(0);
    $bot = 0;
    while ($fila = $resultado->fetch_assoc()) {
        $cat++;
        $bot++;
        echo '
            <div class="peliculas-populares">    
                <div class="contenedor-titulos-controles">
                    <!--<h3><a href="categoria.php?cont='.$fila['nomtem17'].'" id="categ">'.$fila['nomtem17'].'</a></h3>-->
                    <h3><a id="categ">'.$fila['nomtem17'].'</a></h3>
                        <div class="indicadores">
                           
                        </div>
                </div>
     
                <div class="contenedor-principal">
                    <button onclick="bt('.$bot.')" role="button" id="'.$bot.'flecha-izquierda" class="flecha-izquierda"><</button>
                    <div class="contenedor-carrousel'.$bot.'">
                        <div class="carrousel">';
                 
                            $resultado2 = $mysqli->QUERY("SELECT * FROM maecap18 WHERE idtemp18=$bot and idcont18=$id and status18='ACT' ORDER BY numcap18");
                            $resultado2->data_seek(0);
                            $guia2 = 0;
                            //$cat = "";
                            while ($fila2 = $resultado2->fetch_assoc()) {
                                $idcapitulo = $fila2['idcapi18'];
                                $idtemporada = $fila2['idtemp18'];
                                $idcontenido = $fila2['idcont18'];
                                $nombrecapitulo = $fila2['nomcap18'];
                                $descricapitulo = $fila2['descap18'];
                                $duracapitulo = $fila2['durcap18'];
                                $vistascapitulo = $fila2['viscap18'];
                                $numerocapitulo = $fila2['numcap18'];
                                $fechacapitulo = $fila2['feccap18'];
                                $usuariocaptitulo = $fila2['usucap18'];
                                $dircapituloSD = $fila2['dircap181'];
                                $dircapituloHD = $fila2['dircap182'];
                                $dircapituloFHD = $fila2['dircap183'];
                                //$ser = $fila2['sercon04']; 
                                $guia2++;
                                $val = $guia2;
                                //$cat = $fila['idecat07'];
                                
                                $fechacon1 = new datetime($fechacapitulo);
                                $fechaActual = date ( 'd-m-Y' );
                                $fechasis = new datetime($fechaActual);
                                $diff = date_diff($fechacon1,$fechasis);
                                    
                            //     if ($diff-> days <= 60){
                                        
                            //             echo '
                            //             <div onclick="si('.$val.','.$cat.')" class="pelicula" id="nueva">
                            //             <a href="#" id="cover"></a>
                                         
                            //                     <p id="'.$cat.'ca'.$val.'" value="'.$numerocapitulo.'" hidden>'.$numerocapitulo.'</p> 
                            //                     <p id="'.$cat.'te'.$val.'" value="'.$idtemporada.'" hidden>'.$idtemporada.'</p>
                            //                     <p id="'.$cat.'id'.$val.'" value="'.$idcontenido.'" hidden>'.$idcontenido.'</p>
                            //                     <p id="'.$cat.'id'.$val.'" value="'.$numerocapitulo.'">'.$numerocapitulo.'</p>
                            //                     <p id="'.$cat.'id'.$val.'" value="'.$nombrecapitulo.'">'.$nombrecapitulo.'</p>
                                               

                            //                     <p id="'.$cat.'cover'.$val.'" value=""></p>
                                                
                            //                     <p id="'.$cat.'sinop'.$val.'" value=""></p>
                                                
                            //                     <p id="'.$cat.'dirsd'.$val.'" value="'.$dircapituloSD.'" hidden>'.$dircapituloSD.'</p>
                            //                     <p id="'.$cat.'dirhd'.$val.'" value="'.$dircapituloHD.'" hidden>'.$dircapituloHD.'</p>
                            //                     <p id="'.$cat.'dirfhd'.$val.'" value="'.$dircapituloFHD.'" hidden>'.$dircapituloFHD.'</p>
                            //                 <!--<track label="Español" kind="subtitles" srclang="es" >
                            //                     Your browser does not support the video tag.
                            //                 </video>-->
                            //             </div>
                            //         <!--    <div class="identi"><h class="ident" id="'.$cat.'id'.$val.'" value="'.$numerocapitulo.'">'.$numerocapitulo.'</h> </div>-->
                            //    ';
                            //     }
                                   
                            //    if ($diff-> days > 60){
                                      
                                echo '
                                        <div onclick="si('.$val.','.$cat.')" class="pelicula" id="nueva">
                                        <a href="#" id="cover"></a>
                                                <p id="'.$cat.'ca'.$val.'" value="'.$numerocapitulo.'" hidden>'.$numerocapitulo.'</p> 
                                                <p id="'.$cat.'te'.$val.'" value="'.$idtemporada.'" hidden>'.$idtemporada.'</p>
                                                <p id="'.$cat.'id'.$val.'" value="'.$idcontenido.'" hidden>'.$idcontenido.'</p>
                                                <p id="'.$cat.'id'.$val.'" value="'.$numerocapitulo.'">'.$numerocapitulo.'</p>
                                                <p id="'.$cat.'id'.$val.'" value="'.$nombrecapitulo.'">'.$nombrecapitulo.'</p>

                                                <p id="'.$cat.'cover'.$val.'" value=""></p>
                                                
                                                <p id="'.$cat.'sinop'.$val.'" value=""></p>
                                                
                                                <p id="'.$cat.'dirsd'.$val.'" value="'.$dircapituloSD.'" hidden>'.$dircapituloSD.'</p>
                                                <p id="'.$cat.'dirhd'.$val.'" value="'.$dircapituloHD.'" hidden>'.$dircapituloHD.'</p>
                                                <p id="'.$cat.'dirfhd'.$val.'" value="'.$dircapituloFHD.'" hidden>'.$dircapituloFHD.'</p>
                                        
                                        </div>
                                     <!--   <div class="identi"><h class="ident" id="'.$cat.'id'.$val.'" value="'.$numerocapitulo.'">'.$numerocapitulo.'</h> </div>-->
                        ';
                            //        }
                                     
                             
                     }
             echo '
                         </div>
                     </div>
     
                     <button onclick="bt('.$bot.')" role="button" id="'.$bot.'flecha-derecha" class="flecha-derecha" >></button>
                 </div>
     </div>
                 ';
    }

}
function llamar(){
    
    $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    $categ=$_GET['cont'];

    echo '
        <div class="peliculas-populares">        
            <div class="contenedor-titulos-controles">
                <h3>'.$categ.'</h3>
            </div>
            
                <div class="contenedor-carrousel">
                    <div class="carrousel">'
    ;        
                        $resultado2 = $mysqli->QUERY("SELECT idecon04, nomcon04, clacon04, tipcon04, dircon04, dirtra04, durcon04, procon04, vistas04,
                            aprcon04, descon04, arccon04, precon04, covcon04, sincon04, forcon04 FROM maecon04 WHERE catcon04='".$categ."' ORDER BY idecon04 ASC");
                        $resultado2->data_seek(0);
                        $guia2 = 0;
                        $cat = "";
                        $trailer = "";
                        $formato = "";
                        while ($fila2 = $resultado2->fetch_assoc()) {
                            $contenidoid = $fila2['idecon04'];
                            $contenidovid = $fila2['arccon04'];
                            $contenidoimg = $fila2['covcon04'];
                            $contenidolg = $fila2['nomcon04'];
                            $contenido = $fila2['nomcon04'];
                            $productor = $fila2['procon04'];
                            $contenidopri = $fila2['precon04'];
                            $contenidosin = $fila2['sincon04'];
                            $dir = $fila2['dircon04'];
                            $guia2++;
                            $val = $guia2;
                            $trailer = $fila2['dirtra04'];
                            $formato = $fila2['forcon04'];
                        echo '
                        <a class="imgp" href="vercontenido.php?cont='.$dir.''.$contenidoid.'" id="cover">
                        <div class="video" id="aa">
                        
                        <img heigth="30%" width="35%" id="logo" src="/logos/'.$contenidoid.'.png" alt="">
                            
                            <img style="overflow:hidden;" class="imgp"  src="/prin/cat/'.$contenidoid.'.webp"></img>
                            
                                <div id="caja-desc" class="aa">
                                    <div id="parrafo" class="caja-desc">
                                    
                                        <video width="100%" height="100%" class="video" id="video" 
                                            poster="/prin/cat/'.$contenidoid.'.webp"
                                            src="'.$trailer.''.$contenidoid.'" preload="none" loop="" onloadstart="this.volume=50" 
                                            controlsList="nodownload">
                                            
                                        </video>
                                        
                                        <p id="'.$categ.'dir'.$val.'" class="video" value="'.$dir.'">'.$contenidosin.'</p>
                                    </div>
                                </div>
            
                            
                            
                        </div></a>
                        ';
                        }
                        echo '
                        </div>
                    </div>
    
               
                
    </div>
                ';
}
 ?> 