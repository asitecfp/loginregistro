<?php 
if(isset($_FILES['images'])){

//Funciones optimizar imagenes



//Ruta de la carpeta donde se guardarán las imagenes
$patch='imagenes';


//Parámetros optimización, resolución máxima permitida
$max_ancho = 340;
$max_alto = 260;


if($_FILES['images']['type']=='image/png' || $_FILES['images']['type']=='image/jpeg' || $_FILES['images']['type']=='image/gif'){
	

    $medidasimagen= getimagesize($_FILES['images']['tmp_name']);

//Si las imagenes tienen una resolución y un peso aceptable se suben tal cual
	if($medidasimagen[0] < 1280 && $_FILES['images']['size'] < 100000){

	$nombrearchivo=$_FILES['images']['name'];
	move_uploaded_file($_FILES['images']['tmp_name'], $patch.'/'.$nombrearchivo);
	
}

//Si no, se generan nuevas imagenes optimizadas
else {

    $nombrearchivo=$_FILES['images']['name'];

//Redimensionar
    $rtOriginal=$_FILES['images']['tmp_name'];

    if($_FILES['images']['type']=='image/jpeg'){
        $original = imagecreatefromjpeg($rtOriginal);
    }
    else if($_FILES['images']['type']=='image/png'){
        $original = imagecreatefrompng($rtOriginal);
    }
    else if($_FILES['images']['type']=='image/gif'){
    $original = imagecreatefromgif($rtOriginal);
    }

 
list($ancho,$alto)=getimagesize($rtOriginal);

$x_ratio = $max_ancho / $ancho;
$y_ratio = $max_alto / $alto;


if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){
    $ancho_final = $ancho;
    $alto_final = $alto;
}
elseif (($x_ratio * $alto) < $max_alto){
    $alto_final = ceil($x_ratio * $alto);
    $ancho_final = $max_ancho;
}
else{
    $ancho_final = ceil($y_ratio * $ancho);
    $alto_final = $max_alto;
}

$lienzo=imagecreatetruecolor($ancho_final,$alto_final); 

imagecopyresampled($lienzo,$original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
 
//imagedestroy($original);
 
$cal=8;

if($_FILES['images']['type']=='image/jpeg'){
imagejpeg($lienzo,$patch."/".$nombrearchivo);
}
else if($_FILES['images']['type']=='image/png'){
imagepng($lienzo,$patch."/".$nombrearchivo);
}
else if($_FILES['images']['type']=='image/gif'){
imagegif($lienzo,$patch."/".$nombrearchivo);
}

}

	}
	else echo 'fichero no soportado';

}
?>