<?php
//$tiptic9="rcn";
//$fectik9="2001-10-25";
?>
<script>
function comentario (e)
{
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key).toLowerCase();
	letras=' abcdefghijklmnñopqrstuvwxyzáéíóúü-_.,;:"*@+=()!¿?$%&/1234567890#';
	especiales="8-37-38-46-164";
	teclado_especial=false;
	for(var i in especiales)
	{
		if(key==especiales[i])
		{
			teclado_especial=true;break;
		}
	}
	if(letras.indexOf(teclado)==-1 && !teclado_especial)
	{
		return false;
	}
}

function direccion(e)
{
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key).toLowerCase();
	letras=" abcdefghijklmnñopqrstuvwxyzáéíóúü-_.,1234567890#";
	especiales="8-37-38-46-164";
	teclado_especial=false;
	for(var i in especiales)
	{
		if(key==especiales[i])
		{
			teclado_especial=true;break;
		}
	}
	if(letras.indexOf(teclado)==-1 && !teclado_especial)
	{
		return false;
	}
}
		
function telefono(e)
{
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key).toLowerCase();
	letras=" 1234567890+";
	especiales="8-37-38-46-164";
	teclado_especial=false;
	for(var i in especiales)
	{
		if(key==especiales[i])
		{
			teclado_especial=true;break;
		}
	}
	if(letras.indexOf(teclado)==-1 && !teclado_especial){
		return false;
	}
		}

function email(e)
{
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key).toLowerCase();
	letras=" abcdefghijklmnñopqrstuvwxyzáéíóúü-_.@1234567890";
	especiales="8-37-38-46-164";
	teclado_especial=false;
	for(var i in especiales)
	{
		if(key==especiales[i])
		{
			teclado_especial=true;break;
		}
	}
	if(letras.indexOf(teclado)==-1 && !teclado_especial){
		return false;
	}
}


function fecha(e)
{
    key=e.keyCode || e.which;
    tecla=String.fromCharCode(key).toLowerCase();
    letras=" 0123456789/";
    especiales="8,37,39,46";
    tecla_especial = false;
    for(var i in especiales)
	{
 		if(key==especiales[i]){
    		tecla_especial = true;break;
        } 
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}


function sololetras(e)
{
	key=e.keyCode || e.which;
	teclado=String.fromCharCode(key).toLowerCase();
	letras=" abcdefghijklmnñopqrstuvwxyzáéíóúü1234567890";
	especiales="8-37-38-46-164";
	teclado_especial=false;
	for(var i in especiales)
	{
		if(key==especiales[i]){
			teclado_especial=true;break;
		}
	}
	if(letras.indexOf(teclado)==-1 && !teclado_especial){
		return false;
	}
}


function solonumeros(e)
{
    key=e.keyCode || e.which;
    tecla=String.fromCharCode(key).toLowerCase();
    letras=" 0123456789";
    especiales="8,37,39,46";
    tecla_especial = false;
    for(var i in especiales){
 		if(key==especiales[i]){
    		tecla_especial = true;break;
        } 
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}
</script>


<!-- INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUp INICIO popUpv 
++++++++++++++++++++
+++++++++++++++++++
+++++++++++++++++++
++++++++++++-->
<script language="javascript" type="text/javascript"> 
function popUp()
{
	var idtick0="";
	var idreti0="";
	var tiptic0="";
	var asutic0="";
	var corusu0="";
	var nomtik0="";
	var apeusu0="";
	var teltik0="";
	var comtik0="";
	var fectik0="";
	var check00="";
	var check02="";

	var error = 0;
	var msj="";
	var msjconta="";
	

	idtick0 = document.getElementsByName("idtick")[0].value;
	idreti0 = document.getElementsByName("idreti")[0].value;
	tiptic0 = document.getElementsByName("tiptic")[0].value;
	asutic0 = document.getElementsByName("asutic")[0].value;
	corusu0 = document.getElementsByName("corusu")[0].value;
	nomtik0 = document.getElementsByName("nomtik")[0].value;
	apeusu0 = document.getElementsByName("apeusu")[0].value;
	teltik0 = document.getElementsByName("teltik")[0].value;
	comtik0 = document.getElementsByName("comtik")[0].value;
	fectik0 = document.getElementsByName("fectik")[0].value;
	check00 = document.getElementsByName("check0")[0].value;


	if (nomtik0=='')
	{
		msjconta++;
		msj+="-Nombres.\n";
		document.getElementsByName("nomtik")[0].focus();
	}
	
	if (apeusu0=='')
	{
		msjconta++;
		msj+="-Apellidos.\n";
		document.getElementsByName("apeusu")[0].focus();
	}
	
	if (teltik0=='')
	{
		msjconta++;
		msj+="-Teléfono.\n";
		document.getElementsByName("teltik")[0].focus();
	}
	
	if (corusu0=='')
	{
		msjconta++;
		msj+="-Correo Electrónico.\n";
		document.getElementsByName("corusu")[0].focus();
	}
	if(corusu0.indexOf("@")==-1 || corusu0.indexOf(".")==-1)
	{
		msjconta++;
		msj+="-Correo Electrónico NO VALIDO.\nEj.: ejemplo@ejemplo.com\n";
	}

	if (tiptic0=='' || tiptic0==2)
	{
		msjconta++;
		msj+="-Tipo de Ticket.\n";
		document.getElementsByName("tiptic")[0].focus();
	}

	if (asutic0=='')
	{
		msjconta++;
		msj+="-Asunto.\n";
		document.getElementsByName("asutic")[0].focus();
	}

	if (comtik0=='')
	{
		msjconta++;
		msj+="-Comentario.\n";
		document.getElementsByName("comtik")[0].focus();
	}

	if (msj!="")
	{
		if (msjconta>=2)
		{
			alert("..ERROR..\n Llenar los campos: \n"+msj+"\n");
		}else{
			alert("..ERROR..\n Llenar el campo: \n"+msj+"\n");
		}
	}

	if((msj=="")
	&&(check00=="act"))
	{
		//alert("xxxxxxxxx..NO ERROR..\n 55\n msj"+msj+"\n");
		document.f007.submit();
	}else{
		check02="0Ff-5g";
		//alert("..SI ERROR..\n msj"+msj+"\n");
		window.location = "ticket_usuario.php?check2="+check02+"&idtick="+idtick0+"&idreti="+idreti0+"&nomtik="+nomtik0+"&apeusu="+apeusu0+"&corusu="+corusu0+"&teltik="+teltik0+"&tiptic="+tiptic0+"&asutic="+asutic0+"&comtik="+comtik0;

//alert("..55555I ERROR..\n 55");
	}
}
</script>
<!-- FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp FIN popUp
+++++++++++++++++++++++++
+++++++++++++++++++++++++
+++++++++++++++++++++++++
+++++++++++++++ -->

<?php
//+++++++++++++++++++
//++++++++++++++++++++++++++++
//+++++++++++++++++++++++++++
/* */
$fecha=$fectik9;

$objFecha = new DateTime($fecha, new DateTimeZone('America/Mexico_City'));
$dia= $objFecha->format('d');
$mes= $objFecha->format('m');
$anno= $objFecha->format('Y');
/* */

if ($fectik9 == "0000-00-00")
{
	$dia= "00";
	$mes= "00";
	$anno= "0000";
}


//$mes=
$mesdes="";
switch ($mes) 
{
	case "01":
		$mesdes="enero";
		break;
	case "02":
		$mesdes="febrero";
		break;
	case "03":
		$mesdes="msrzo";
		break;
	case "04":
		$mesdes="abril";
		break;
	case "05":
		$mesdes="mayo";
		break;
	case "06":
		$mesdes="junio";
		break;
	case "07":
		$mesdes="julio";
		break;
	case "08":
		$mesdes="agosto";
		break;
	case "09":
		$mesdes="septiembre";
		break;
	case "10":
		$mesdes="octubre";
		break;
	case "11":
		$mesdes="noviembre";
		break;
	case "12":
		$mesdes="diciembre";
		break;
	default:
		$mesdes="mes";
}
//+++++++++++++++++++
//+++++++++++++++++++
//+++++++++++++++++++





//+++++++++++++++++++

//+++++++++++++++++++
//+++++++++++++++++++
//+++++++++++++++++++

?>
<script>
var ddus=null;
var mmus=null;
var aaus=null;
var nacus=null;
var nacus2=null;
var paedci;


	ddus="<?php echo $dia; ?>";
	mmus="<?php echo $mes; ?>";
	aaus="<?php echo $anno; ?>";

function onLoad()
{
	var tiptic0="";
	var tiptic0="<?php echo $tiptic9; ?>";
	document.getElementsByName("tiptic")[0].value=tiptic0;


	ddus="<?php echo $dia; ?>";
	mmus="<?php echo $mes; ?>";
	aaus="<?php echo $anno; ?>";
	<?php $ncusu0=12; ?>
	//alert("onccccnkXXddud");

	document.getElementsByName("fdiaus")[0].value=ddus;
	document.getElementsByName("fmesus")[0].value=mmus;
	document.getElementsByName("fanous")[0].value=aaus;

	//alert("XXddus "+ddus+"\nXXmmus "+mmus+"\nXXaaus "+aaus+"\nxV <?php echo $ncusu0; ?>");
/**/
	cambiodatosintro_linea();
}

function cbx_tipoticket()
{
	TipoTicket = document.getElementsByName("tiptic")[0].value;
	document.getElementsByName("tiptic2")[0].value=TipoTicket;

	cambiodatosintro_linea();
}

function cambiodatosintro_linea(elemento)
{
	if ((mmus==2)&&(ddus>=29))
	{
		alert("..ERROR..\nFecha no Valida\nCorregir: Día");
		document.getElementsByName("fdiaus")[0].value="00";
		ddus ="00";
	}

	/* * /
	var nacusua="<?php echo $nacusu0; ?>";
	if (nacusua == "0000-00-00")
	{
		ddus= "00";
		mmus= "00";
		aaus= "0000";
	}
	/ **/
	nacus=aaus+"-"+mmus+"-"+ddus;
	nacus2=ddus+"-"+mmus+"-"+aaus;
	
	document.getElementsByName("nacusu")[0].value=nacus;
	document.getElementsByName("nacusu2")[0].value=nacus2;
	  //document.getElementsByName("nacusu")[0].value="+nacus+";



	if ($(elemento).val() === "") {
		//    $(elemento).css("background-color", "#FFFF00");
		$(elemento).css("background-color", "");
	}else
	{
		$(elemento).css("background-color", "");
		//    $(elemento).css("background-color", "#FFFF00");
		
		$(elemento).css("vertical-align", "bottom");
		$(elemento).css("color", "#000");
		$(elemento).css("font-weight", "bold");
		$(elemento).css("font-size", "14px");
		$(elemento).css("font-family", "Calibri, Arial, Helvetica, sans-serif");
		$(elemento).css("border-style", "solid");
		$(elemento).css("border-left-width", "0px");
		$(elemento).css("border-right-width", "0px");
		$(elemento).css("border-bottom-width", "3px");
		$(elemento).css("border-top-width", "0px");
		$(elemento).css("padding", "5px 5px 5px 5px");
		$(elemento).css("border-color", "#000");
	
	//	$(elemento).css("text-align", "left");
	
	//*/
	}
}
</script>