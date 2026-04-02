<?php
/*
window.location = "index.php?
		nomusu='<?php echo $nomusu0; ?>'
		&corusu='<?php echo $corusu0; ?>'
		&aliusu='<?php echo $aliusu0; ?>'
		&conusu='<?php echo $conusu0; ?>'
		&apeusu='<?php echo $apeusu0; ?>'
		&ingusu='<?php echo $ingusu0; ?>'&stacue='<?php echo $stacue0; ?>'";
		
*/
include 'conexion_bd.php';


$nombre = 1;
$correo = '101010';
$alias = 0;
$contrasena = 0;
$msj11 = 0;
$msj12 = '';
$msj13 = 0;
$msj14 = 0;
global $msj15; 
$msj15 = 0;
echo '
<script>
	msj1 = "";
</script>
';

echo 'nombre'.$nombre.'<br />';
echo 'correo'.$correo.'<br />';
echo 'alias'.$alias.'<br />';
echo 'contrasena'.$contrasena.'<br />';



echo '
<script>
function validar()
{
	msj1010="jjjjjj";
	correo = document.getElementsByName("correo")[0].value;
';
global $correo1;
$correo1='"+correo+"';
$msj122='"+msj1010+"';
echo '
	alert("0000"+correo+"000 "+msj1010+" 88\ncorreo1 '.$correo1.'90");
';

echo '

	alert("555555"+correo+"000 "+msj1010+" 88\ncorreo1 '.$correo1.'90");
}


</script>

1correo '.$correo.'<br />
1correo1 '.$correo1.'<br />
';


//+++++++++++++++++++++++
echo '
<script>
function nnmouseover()
{
	var cotra="";
	var cotra2="";
		alert("mouse NN mouse \n"+cotra+"\ncotra2 \n"+cotra2+" \n123\n");
}

function sffmouseover()
{
	var cotra="";
	var cotra2="";
		alert("mouse FF mouse \n"+cotra+"\ncotra2 \n"+cotra2+" \n123\n");
}

function validarcotra()
	{
	var cotra="";
	var cotra2="";
	var cotra3="";
		cotra = document.getElementsByName("cotra")[0].value;
		cotra2 = document.getElementsByName("cotra2")[0].value;
	if(cotra==cotra2){
		
		alert("cotra \n"+cotra+"\ncotra2 \n"+cotra2+" \n123\n");
		document.getElementsByName("cotra3")[0].value=456;
	}else{
		alert("XXXcotra \n"+cotra+"\ncotra2 \n"+cotra2+" \n123XXX\n");
		document.getElementsByName("cotra3")[0].value=678;
	}
}
</script>
';
//+++++++++++++++++++++++++++++++


//+++++++++++++++++++++++++++++++
echo 'fecha<br />';
echo '<br />// Día del mes con 2 dígitos, y con ceros iniciales, de 01 a 31<br />'.
date("d");
echo '<br />// Día del mes, sin ceros iniciales, de 1 a 31<br />'.
date("j");
echo '<br />// Día de la semana en inglés, con 3 letras, de Mon a Sun<br />'.
date("D");
echo '<br />// Día de la semana en inglés, de Sunday a Saturday<br />'.
date("l");
echo '<br />// del día de la semana, desde 1 (lunes) hasta 7 (domingo)<br />'.
date("N");
echo '<br />// Sufijo del día del mes con 2 caracteres --> st, nd, rd o th<br />'.
date("S");
echo '<br />// Número entero que representa el día de la semana, de 0 (dom) a 6 (sab)<br />'.
date("w");
echo '<br />// Día del año, de 0 a 365<br />'.
date("z");

//Semana actual, de 1 a 52
date("W");

// Mes actual en inglés, de January a December
date("F");
// Mes actual en 2 dígitos y con 0 en caso del 1 al 9, de 1 a 12
date("m");
// Mes actual en texto en 3 dígitos en inglés, de Jan a Dec
date("M");
// Mes actual en digitos sin 0 inicial, de 1 a 12
date("n");
// Número de días del mes actual, de 28 a 31
date("t");

// Detectar si el año es bisiesto, 1 es bisiesto y 0 no bisiesto
date("L");
// Año actual con 4 dígitos, ej 2013
date("Y");
// Año actual con 2 dígitos, ej 13
date("y");


// Antes del mediodía, despues del mediodía, am o pm (minúsculas)
date("a");
// Antes del mediodía, despues del mediodía, AM o PM (mayúsculas)
date("A");
// Horario de 12 horas sin ceros, de 1 a 12
date("g");
// Horario de 12 horas con ceros, de 01 a 12
date("h");
// Horario de 24 horas sin ceros, de 0 a 23
date("G");
// Horario de 24 horas con ceros, de 01 a 23
date("H");
// minutos con ceros iniciales
date("i");
// segundos con ceros iniciales
date("s");



//formato para RSS
date(DATE_RSS);
//formato W3C
date(DATE_W3C);
//formato para COOKIES
date(DATE_COOKIE);
//formato para ATOM
date(DATE_ATOM);


//Establecer la información local en castellano de España
//setlocale(LC_TIME,"es_ES");
setlocale(LC_ALL,"es_ES");

		
echo strftime("<br />Hoy es %A y son las %H:%M");
echo strftime("<br />El año es %Y y el mes es %B");
setlocale(LC_ALL,"es_ES");





echo "<br />la fecha actual es " . date("d") . " del " . date("m") . " de " . date("Y");
echo "<br />";
echo date("Y")."-".date("m")."-".date("d");

//echo '<br />Para obtener la fecha local<br />'.
//date_default_timezone_get(d);

//echo '<br />Para asignar la fecha local<br />'.
//date_default_timezone_set(d);


echo '<br />Para time<br />'.
time();

echo '<br />fin fecha fin<br />';
//+++++++++++++++++++++++++++++++

//000011111000000000000000000
//0000000111000000000000000
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE corusu01='$correo'");

if(mysqli_num_rows($verificar_correo) > 0){
	$msj11++;
	$msj12.= 'Este correo ya esta registrado\n';
	echo '
	<script>
	//	msj1+="Este correo ya esta registrado\n";
	</script>
	';    
}else{
	echo '
	<script>
	//	msj1+="000Este correo ya esta registrado\n";
	</script>
	';    
	}

//0000000000000000000000
//000000000000000000000000

function validar2()
{
echo '
<script>
	alert("333333333");
</script>
';

//+++++++++++++++++++
/**/
include 'conexion_bd.php';
global $correo;
$correo = 'disdesweb@gmail.com';
$msj11 = 0;
$msj12 = '';
global $msj15;
$msj15 = 77777777;


//
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuario WHERE corusu01='$correo'");

if(mysqli_num_rows($verificar_correo) > 0){
	$msj11++;
	$msj12.= 'Este correo ya esta registrado\n';
	echo '
	<script>
	//	msj1+="Este correo ya esta registrado\n";
	</script>
	';    
}else{
	echo '
	<script>
	//	msj1+="000Este correo ya esta registrado\n";
	</script>
	';    
	}
/* */
}
echo 'msj15'.$msj15.'<br />';

//validar2();
echo 'msj15.1 '.$msj15.'<br />';




		
if($nombre > 0){
	$msj11++;
	$msj12.= 'nombre user\n';
	echo '
	<script>
		msj1+="nombre user\n";
	</script>
	';    
}



if($correo > 0){
	$msj11++;
	$msj12.= 'correo user\n';
	echo '
	<script>
		msj1+="correo user\n";
	</script>
	';    
}



if($alias > 0){
	$msj11++;
	$msj12.= 'alias user\n';
	echo '
	<script>
		msj1+="alias user\n";
	</script>
	';    
}


//++++++++++++++++++++++++++++++++
//++++++++++++++++++++++++

if($msj11 > 0){
	echo '
	11msj11..'.$msj11.'<br />
	11msj12..'.$msj12.'<br />
	<script>
		alert("Validar user\n\n"+msj1+" 88\n'.$msj12.'99");
		//window.location ="../index.php";
	</script>
';

}else{  
	echo '
	22msjl1..'.$msj11.'<br />
	22msj12..'.$msj12.'<br />
	<script>
		alert("REGISTRO user "+msj1+" 88\n'.$msj12.'99");
		//window.location ="../index.php";
	</script>
';
}
?>
<input name="correo" id="correo" type="text" onChange="validar()" />
<br /><br />
<input name="cotra" id="cotra" type="text" onChange="" />
<br />
<input name="cotra2" id="cotra2" type="text" onChange="validarcotra()" />
<br /><br />
<input name="cotra3" id="cotra3" type="text" onChange="" disabled="disabled" />
<br />
<br />
<br />fecha<br />
<input name="fecha" id="fecha" type="text" onChange="" value="
<?php
echo date("Y")."-".date("m")."-".date("d"); ?>" />
<br /><br /><br />
00000000000<br />
<input name="cotra3" id="cotra3" type="text" 
onmouseover="nnmouseover()"
onmouseup="" 
onmouseout="ffmouseover()" />
<br />
<img width="500" height="500" border="10"
onmouseup="nnmouseover()" />
<br />
<br />





<?php 
//echo date("Y")."-".date("m")."-".date("d");
echo '<br />
correo '.$correo.'<br />
correo1 '.$correo1.'<br />

';
?>