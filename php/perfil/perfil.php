<!--<div align="center">
<table cellpadding="0" cellspacing="0" border="0" width="450">
<tr>
<td>-->
<?php
//** $número = 200000.5648;

// notación inglesa (por defecto)
//** $número_formato_inglés = number_format($número);
// 1,235

// notación francesa
//** $nombre_format_francais = number_format($número, 2, ',', ' ');
// 1 234,56

//** $número = 1234.5678;

// notación inglesa sin separador de millares
//** $english_format_number = number_format($número, 2, ',', '');
// 1234.5
//** echo "<h2>nombre_format_francais...: ".$nombre_format_francais."</h2>";
//** echo "<h2>english_format_number...: ".$english_format_number."</h2>";

/*
        $targetPath = "imagenes/" . $_FILES['userImage']['name'];

        if (move_uploaded_file($_FILES['userImage']['tmp_name'], $targetPath)) {
            $targetPath2 = "imagenes/001252.jpg";
			rename($targetPath, $targetPath2);
			$uploadedImagePath = $targetPath2;
		echo "<h2>222uploadedImagePath...: ".$uploadedImagePath."</h2>";
		echo "<h2>222nnombre...: ".$nnombre."</h2>";
		echo "<h2>222targetPath...: ".$targetPath."</h2>";
        }

*/
@$ruta_img = $_GET["rt"];
@$nombre_img_nt = $_GET["nt"];
@$id_ficha = $_POST["id_ficha"];

//echo "00nombre_img_nt ".$nombre_img_nt."<br>"; 



/* Recibo los datos de la imagen*/
@$nombre_img = $_FILES['imagen']['name'];
@$tipo = $_FILES['imagen']['type'];
@$tamano = $_FILES['imagen']['size'];
$tamano1 = $tamano/1024;
$tamano2 = number_format($tamano1, 2, ',', ' ');
/*Si existe imagen y tiene un tamaño correcto*/
//** ~   echo "<br>-tipo... ".$tipo;
//** ~   echo "<br>-tamano... ".$tamano;
//** ~   echo "<br>-tamano1... ".$tamano1;
//** ~   echo "<br>-tamano2... ".$tamano2;






if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 2013781)) //286100
{
   /*indicamos los formatos que permitimos subir a nuestro servidor*/
   /*
   if (($_FILES["imagen"]["type"] == "image/gif")
   || 
   || ($_FILES["imagen"]["type"] == "image/png")
   */
   if (($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg"))	//)
   {
      /* Ruta donde se guardarán las imágenes que subamos*/
//      $directorio = $_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';
      $directorio = 'foto/';

      /* Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente */
//      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
	  //$ruta_img = $directorio.$nombre_img;

$info = pathinfo($_FILES['imagen']['tmp_name']);
$info2 = $_FILES['imagen']['name'];
//$nnombre = "gg-".md5(rand().time()).".-.".$info['extension'];


//@$nombre_img_nt = $_GET["nt"];
//$nnombre1 = rand().time();
//$nnombre1 = $nombre_img_nt;
$nnombre1 = $id_ficha;


//echo "nombre_img_nt ".$nombre_img_nt."<br>"; 
//echo "nnombre1 ".$nnombre1."<br>"; 

   if ($_FILES["imagen"]["type"] == "image/jpeg"){$exten_img = "JPEG"; $exten = "jpeg";}
   if ($_FILES["imagen"]["type"] == "image/jpg"){$exten_img = "JPG"; $exten = "jpg";}
   if ($_FILES["imagen"]["type"] == "image/png"){$exten_img = "PNG"; $exten = "png";}
//** ~   echo "<br>-tipo... ".$tipo;
//** ~   echo "<br>-exten_img... ".$exten_img;
//** ~   echo "<br>-exten... ".$exten;

$nnombre = $nnombre1.".".$exten;
$nnombre2 = rand().time().".-.".$info2['extension'];
rename($directorio.$nombre_img, $directorio.$nnombre);
	  $ruta_img = $directorio.$nnombre;
	  //header("Location: ../ficha de inscripcion2.php?rt=$ruta_img&nt=$nnombre1");
	  
	  //header("Location: ../ficha004.php?rt=$ruta_img&nt=$nnombre1&extn=$exten_img");
/*
*/
	  echo '
	  <div align="center">
	   <table cellpadding="0" cellspacing="0" border="0" class="Advertencia">
	   <tr>
	   <td align="center">
	  Subiendo imagen, por favor espere.
	  <br>
	  <img src="imagen/preload-gif.gif" align="middle" border="0" alt="Subiendo imagen" title="Subiendo imagen" width="50">
	   </td>
	   </tr>
	   </table>
	  </div>
	  <br>
	  ';
	  echo "
	  <META HTTP-EQUIV='REFRESH' CONTENT='2;URL=../ficha2.php?rt=".$ruta_img."&nt=" .$nnombre1." &extn=" .$exten_img."'>
	  ";

//$targetPath2 = "imagenes/001252.jpg";
//rename($targetPath, $targetPath2);

//** echo "<br>-info... ".$info;
//** echo "<br>-info2... ".$info2;
//** echo "<br>-nnombre... ".$nnombre;
//** ~echo "<br>-nnombre2... ".$nnombre2;

	  
    } 
    else 
    {
       /*si no cumple con el formato*/
       echo "
	   <div align='center'>
	   <table cellpadding='0' cellspacing='0' border='0' class='Advertencia'>
	   <tr>
	   <td align='center'>
	   <h2 style='color:#F00'>ERROR DE PARÁMETROS</h2>
	   No se puede subir una imagen con ese formato:
	   <br>(".$tipo.").
	   <br>Usar formato jpeg, jpg o png.
	   </td>
	   </tr>
	   </table>
	   </div>
	   <p></p>";
    }
} 
else 
{
   /*si existe la variable pero se pasa del tamaño permitido*/
   if($nombre_img == !NULL) 
   echo "
   <div align='center'>
   <table cellpadding='0' cellspacing='0' border='0' class='Advertencia'>
   <tr>
   <td align='center'>
   <h2 style='color:#F00'>ERROR DE PARÁMETROS</h2>
   La imagen es demasiado grande (".$tamano2." Kb).
   </td>
   </tr>
   </table>
   </div>
   <p></p>"; 
}



/*888888888888888888888888888888888888888888888888888888888888888888888888888*/
/* en pasos anteriores deberíamos tener una conexión abierta a nuestra base de 
datos para ejecutar nuestra sentencia SQL */
 
/* con la siguiente sentencia le asignamos a nuestro campo de la tabla ruta_imagen 
el nombre de nuestra imagen */
 
//$sql = "UPDATE usuarios SET ruta_imagen = '$nombre_img' ";
//$result = mysql_query($sql);
 
/* volvemos a la página principal para cargar la imagen que hemos subido */

//** echo "<br> -------------------------------------------------------<br>";
//** echo "<br> -------------------------------------------------------<br>";
//** echo "<br> -------------------------------------------------------<br>";

//** echo "<br>-nombre_img... ".$nombre_img;
//** echo "<br>-tipo... ".$tipo;
//** echo "<br>-tamano... ".$tamano;
//** echo "<br>-tamano2... ".$tamano2;

//** echo "<br>-directorio2... ".@$directorio2;
//** echo "<br>-ruta_img... ".$ruta_img."<br>";

//header("Location: perfil.php?rt=$ruta_img");



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subir Imagen</title>
	<link href="css/estilo.css" rel="stylesheet" type="text/css">

</head>

<body>
<div align="center">
<table cellpadding="0" cellspacing="0" border="0" width="450">
<tr>
<td>
<h3><strong>Características de la imagen a subir:</strong>
</h3>
<ul >
  <li>    Los formatos permitidos: jpeg o jpg.</li>
  <li>El alto y ancho de la imagen debe tener el mismo tamaño, mejor si es cuadrado. Ej. 500 por 500 pixeles.</li>
  <li>    Tamaño de la imagen si es rectangular (valor superior del ancho o alto de la imagen): superior a 200 pixeles e inferior a 800 pixeles.</li>
  <li>
  Capacidad de la imagen (espacio en disco): superior a 160 Kb e inferior a 500 Kb.</li>
</ul>


  <?php
/* lanzamos la consulta para traernos el nombre de la imagen, en nuestro caso 
el campo ruta_imagen se encuentra en la tabla usuarios */ 

//$result = mysql_query("SELECT * FROM usuarios "); 
//while ($row=mysql_fetch_array($result)) 
//{ 
    /*almacenamos el nombre de la ruta en la variable $ruta_img*/ 

//    $ruta_img = $row["ruta_imagen"]; 
//}

$directorio = $_SERVER['DOCUMENT_ROOT'].'/foto/';
//** echo "-directorio... ".$directorio;
?>
<!--
<div align="center">
   <img src="<?php echo @$ruta_img; ?>" alt="" width="115" />
</div>
-->
<?php 
//** echo "-ruta_img... ".$ruta_img;

//<form action="cambiodatospersonales.php" enctype="multipart/form-data" method="post">


?>
  <div align="center"><form action="perfil.php" enctype="multipart/form-data" method="post">
  <label for="imagen">Imagen:</label> 
  <input id="imagen" name="imagen" size="30" type="file" />
  <br>

  <input type="submit" value="Subir imagen" />
  <input name="id_ficha" type="hidden" value="<?php echo $nombre_img_nt; ?>" size="5" readonly="readonly"></td>
</form>
  </div>

</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
</table>
</div>
</body>
</html>
