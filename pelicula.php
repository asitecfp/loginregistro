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
    /*Carpeta1*/

//$carpeta1 = "http://192.168.50.26/as/video/";
$carpeta1 = "http://localhost/loginregistro/assets/video/";

/*Carpeta2*/

$carpeta2 = "c:/wamp64/www/loginregistro/assets/video/";
//$carpeta2 = '/home/disdesweb/public_html/j3video/007/video';


/*Carpeta3*/
$carpeta3 = $carpeta2;
$carpeta4 = $carpeta2;
$listar_archivos = $carpeta2;
    function ShowFileExtension($filepath)
    {
           preg_match('/[^?]*/', $filepath, $matches);
           $string = $matches[0];
    
           $pattern = preg_split('/\./', $string, -1, PREG_SPLIT_OFFSET_CAPTURE);
    
           if(count($pattern) > 1)
           {
               $filenamepart = $pattern[count($pattern)-1][0];
               preg_match('/[^?]*/', $filenamepart, $matches);
               return strtolower($matches[0]);
           }
    }
    
    function file_name($archivo){
    
    $path_parts2 = pathinfo($archivo);
    
    }
    
   
    function listar_archivos($carpeta){
    global $carpeta1;
    
        if(is_dir($carpeta)){
            if($dir = opendir($carpeta)){
                while(($archivo = readdir($dir)) !== false){
                    if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess' && $archivo != 'index.html'){
    
                        @$arch++;
    
                        $path_parts2 = pathinfo($archivo);
    
                        echo '
                        
                        
    <video id="repcont" width="100%" height="100%" autoplay preload  onloadstart="this.volume=0.35" controls controlsList="nodownload nopictureinpicture" disablePictureInPicture>
      <source src="'.$carpeta1.'/'.$archivo.'" type="video/mp4">
    <track label="Español" kind="subtitles" srclang="es" >
    Your browser does not support the video tag.
    </video>					                                  
    
                        ';
    
                    }
                }
                closedir($dir);
            }
        }
    }
    
    $total_pdf = count(glob($carpeta4.'/{*.mp4}',GLOB_BRACE));
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a su Streaming-Pro</title>
    
    <link rel="stylesheet" href="assets/css/estilos2.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>
<body oncontextmenu="return false;">
    <header>
       
    </haeader>

    <main>
  

    </main>
    
    <script src="assets/js/main.js"></script>
    
    <?php /*?><?php */

 $permi = "ger10V1d3o68";

 if( $permi == "ger10V1d3o68")
 {
	//echo "<br>Permi: ".$permi."<br>"; 

echo listar_archivos($listar_archivos);

 }else{
	//echo "<br>000Permi: ".$permi."<br>"; 
	echo '<br>Sin Permiso, no se puede mostra el contenido. <a href="ver.php" title="Inicio de sesión">Iniciar de sesión</a>
	<br>'; 
 }
 

?>
</body>
</html>