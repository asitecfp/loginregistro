<?php
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
/*
CONFIGURACION
*/
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*




//
$carpeta1 = "https://www.123english.com.ve/sisinspdf/1-6/perfil/pdf";
//$carpeta1 = "http://www.inversionesalmarza.com.ve/123e/1-5/perfil/pdf";
//$carpeta1 = "http://localhost/123englishilc/sistema de inscripcion/0subir/1-5/perfil/pdf";
//$carpeta1 = "http://localhost/123englishilc/sistema de inscripcion/0subir/perfil/pdf";



//
$carpeta2 = '/home/englishcom/public_html/sisinspdf/1-6/perfil/pdf';
//$carpeta2 = '/home/inversalmarza/public_html/123e/1-5/perfil/pdf';
//$carpeta2 = "C:\wamp64/www/123englishilc/sistema de inscripcion/0subir/1-5/perfil/pdf";
//$carpeta2 = 'C:\wamp64/www/123englishilc/sistema de inscripcion/0subir/perfil/pdf';

$carpeta3 = $carpeta2;
$carpeta4 = $carpeta2;
$listar_archivos = $carpeta2;

// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*
// *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-* *-*-*-*-*-*-*-*-*-*-*-*-*



function listar_archivos($carpeta){
global $carpeta1;
echo '<br><hr width="85%"  size="5" color="#0033FF">';
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess' && $archivo != 'index.html'){
//****                    echo '<li><a target="_blank" href="'.$carpeta2.'/'.$archivo.'">'.$archivo.'</a></li>';
                    @$arch++;
					//
					echo '<br>
					<div align="left">
					Ficha #'.$arch.': 
					<br> 
					Nombre: '.$archivo.'
					</div>

					<br>
					<div align="center">
					<a target="_blank" href="'.$carpeta1.'/'.$archivo.'">
					<img border="0" width="50" src="imagen/logo/logo_pdf.jpg" />
					<br>
					VER fICHA</a>
					</div>

					<!--<div align="right">
					<a href="lista2.php?p3m1=r0Sd5u&p3m2=r0Sd5u2&nft='.$arch.'&f1l3='.$archivo.'">
					ELIMINAR 
					</a><br>
					</div>-->
					<hr width="85%"  size="4" color="#0033FF">
					';

                }
            }
            closedir($dir);
        }
    }
}

$total_pdf = count(glob($carpeta4.'/{*.pdf}',GLOB_BRACE));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Lista de PDF Generados</title>
	<link href="css/estilo.css" rel="stylesheet" type="text/css">

</head>

<body>
<div align="center">
<table cellpadding="0" cellspacing="0" border="0" width="450" class="Advertencia">
<tr>
<td align="justify">
<div align="center">
<h2>
Lista de PDF Generados
</h2>
PDF en el directorio (perfil/pdf)
<br>
<?php
echo "<br>Total de archivos en PDF : ".$total_pdf."<br>";
?>
</div>
<div align="justify">
<br>
<strong>Leyenda de los archivos</strong>
<br>
Sede.
<br>
Cédula de identidad.
<br>
Apellido del participante.
<br>
ID de la Ficha.
<br><br>
<p align="center">
<strong>Nombre del archivo:</strong>
<br>
"VeVal-34162108-Almarza Durand-NF230121556087461.pdf"
<br>
<br>
<strong>Posiciones de los campos</strong>
<br>
"01-02-03-04.pdf"
</p>
<br>
<strong>Sede:</strong> posición 01.
<br>
<strong>Cédula de identidad:</strong> posición 02.
<br>
<strong>Apellido del participante:</strong> posición 03.
<br>
<strong>ID de la Ficha:</strong> posición 04.
<br>
<br>
<strong>Nota:</strong> al inicio del ID de la Ficha saldrán dos variables que notifican si el participante inserto o no su fotografia, NF y SF.
<br>
<strong>NF:</strong> no inserto su fotografia.
<br>
<strong>SF:</strong> si inserto su fotografia.
<br>
<strong>Ejemplo:</strong> "<strong>NF</strong>230121556087461", este participante no inserto la fotografia ya que al inicio sale el NF.
<br>
<br>
<?php /*?><?php */

 if( $permi == "ger100%mac68")
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
 
</div>
</td>
</tr>
</table>
</div>
</body>
</html>
