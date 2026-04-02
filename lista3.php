<?php
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
/*
CONFIGURACION
*/
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*



/*Carpeta1*/
//
$carpeta1 = "http://192.168.50.26/as/video/";
//$carpeta1 = "https://j3video.disdesweb.com/007/video";



/*Carpeta2*/
//
$carpeta2 = "c:/wamp64/www/j3video/007/video/";
//$carpeta2 = '/home/disdesweb/public_html/j3video/007/video';


/*Carpeta3*/
$carpeta3 = $carpeta2;
$carpeta4 = $carpeta2;
$listar_archivos = $carpeta2;

// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*


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
/*
$path_parts = pathinfo('/www/htdocs/index.html');
echo "<br />".$path_parts['dirname'], "\n";
echo "<br />".$path_parts['basename'], "\n";
echo "<br />".$path_parts['extension'], "\n";
echo "<br />".$path_parts['filename'], "\n"; // filename is only since PHP 5.2.0
*/$path_parts2 = pathinfo($archivo);
//echo "<br />".@$path_parts2['filename'], "\n";
//echo '<br />v'.@$path_parts2["filename"], '\n';

//echo "<br />path_parts2;".@$path_parts2;


//$archivo2 = @$path_parts2['filename'], "\n";
//echo "<br />archivo; ".$archivo2;


//returnd $path_parts2['filename'], "\n";
}


function listar_archivos($carpeta){
global $carpeta1;
echo '<br>';
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess' && $archivo != 'index.html'){
//****                    echo '<li><a target="_blank" href="'.$carpeta2.'/'.$archivo.'">'.$archivo.'</a></li>';
                    @$arch++;
					//
					$path_parts2 = pathinfo($archivo);
					//echo "<br />".@$path_parts2['filename'], "\n";

					//
					echo '<br>
					<div align="left">
					Vídeo #'.$arch.': 
					<br> 
					Nombre: '.@$path_parts2["filename"], "\n".'
					<br />
					</div>

					<br />
					<br />
					<div align="center">
<video width="600" controlslist="nodownload" controls preload  onloadstart="this.volume=0.35" controlsList="nodownload" poster="http://192.168.50.208/as/Nueva carpeta/toy-story-4-4k.jpg" disablePictureInPicture> 
  <source src="'.$carpeta1.'/'.$archivo.'" type="video/mp4">
<track label="Español" kind="subtitles" srclang="es" >
Your browser does not support the video tag.
</video>					
					<br />
					<br />
					
					
					
					</div>

					<!--<div align="right">
					<a href="lista2.php?p3m1=r0Sd5u&p3m2=r0Sd5u2&nft='.$arch.'&f1l3='.$archivo.'">
					ELIMINAR 
					</a><br>
					</div>-->
					

					';

                }
            }
            closedir($dir);
        }
    }
}

$total_pdf = count(glob($carpeta4.'/{*.mp4}',GLOB_BRACE));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Vídeos</title>
	<link href="css/estilo.css" rel="stylesheet" type="text/css">

</head>

<body oncontextmenu="return false;" bgcolor="#282625" Font="gray" >
<div align="center">
<table cellpadding="0" cellspacing="0" border="0" width="450" class="Advertencia">
<tr>
<td align="justify">
<div align="center">
<h2>
<img border="0" width="30" src="https://j3video.disdesweb.com/007/imagen/logo/videos.jpg" />
Lista de Vídeos
<img src="https://j3video.disdesweb.com/007/imagen/logo/videos.jpg" width="30" border="0" />
</h2>

<br>

</div>
<div align="justify">
<br>
<strong>Categoria:</strong> sale el NetF.
<img border="0" width="200" src="http://192.168.50.208/as/video/toy-story-4-4k.jpg" />
<br>
<br>
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

/*
La ruta del directorio tiene que ser la del path del servidor. Por ejemplo Ejemplo:
<br>
linux: /var/www/vhosts/midominio.com/httpdocs/archivos
<br>
windows: C:\Inetpub\vhosts\midominio.com\httpdocs\archivos
*/
?>
 

</body>
</html>
