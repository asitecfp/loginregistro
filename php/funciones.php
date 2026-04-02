<script>
		function direccion(e){
			key=e.keyCode || e.which;
			teclado=String.fromCharCode(key).toLowerCase();
			letras=" abcdefghijklmnñopqrstuvwxyzáéíóúü-_.,1234567890#";
			especiales="8-37-38-46-164";
			teclado_especial=false;
			for(var i in especiales){
				if(key==especiales[i]){
					teclado_especial=true;break;
				}
			}
			if(letras.indexOf(teclado)==-1 && !teclado_especial){
				return false;
			}
		}
		
		function telefono(e){
			key=e.keyCode || e.which;
			teclado=String.fromCharCode(key).toLowerCase();
			letras=" 1234567890+";
			especiales="8-37-38-46-164";
			teclado_especial=false;
			for(var i in especiales){
				if(key==especiales[i]){
					teclado_especial=true;break;
				}
			}
			if(letras.indexOf(teclado)==-1 && !teclado_especial){
				return false;
			}
		}

		function email(e){
			key=e.keyCode || e.which;
			teclado=String.fromCharCode(key).toLowerCase();
			letras=" abcdefghijklmnñopqrstuvwxyzáéíóúü-_.@1234567890";
			especiales="8-37-38-46-164";
			teclado_especial=false;
			for(var i in especiales){
				if(key==especiales[i]){
					teclado_especial=true;break;
				}
			}
			if(letras.indexOf(teclado)==-1 && !teclado_especial){
				return false;
			}
		}

		function fecha(e){
		    key=e.keyCode || e.which;
		    tecla=String.fromCharCode(key).toLowerCase();
		    letras=" 0123456789/";
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

		function sololetras(e){
			key=e.keyCode || e.which;
			teclado=String.fromCharCode(key).toLowerCase();
			letras=" abcdefghijklmnñopqrstuvwxyzáéíóúü1234567890";
			especiales="8-37-38-46-164";
			teclado_especial=false;
			for(var i in especiales){
				if(key==especiales[i]){
					teclado_especial=true;break;
				}
			}
			if(letras.indexOf(teclado)==-1 && !teclado_especial){
				return false;
			}
		}

		function solonumeros(e){
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



<!-- INICIO popUp INICIO popUp INICIO popUp INICIO popUp ++++++++++++-->


<script language="javascript" type="text/javascript"> 

	/* * /
	var nomusu = null;
	var corusu = null;
	var aliusu = null;
	var conusu = null;
	var apeusu = null;
	var ingusu = null;
	/ * */

	function popUp()
	{

		var nomusu="";
		var apeusu="";
		var aliusu="";
		var corusu="";
		var corusu2="";
		var conusu="";
		var conusu2="";
		//var conusu2="";
		//var stacue="";
		var pinful = 0;
		var pinfam = 0;
		var pininf = 0;

		
		var r315tRou5US="";

		var error = 0;
		var msjconta= 0;
		var msjconta2= 0;
		var msj="";
		var msj2="";
		
		nomusu = document.getElementsByName("nomusu")[0].value;
		apeusu = document.getElementsByName("apeusu")[0].value;
		aliusu = document.getElementsByName("aliusu")[0].value;
		corusu = document.getElementsByName("corusu")[0].value;
		corusu2 = document.getElementsByName("corusu2")[0].value;
		conusu = document.getElementsByName("conusu")[0].value;
		conusu2 = document.getElementsByName("conusu2")[0].value;
		//conusu2 = document.getElementsByName("conusu2")[0].value;
		stacue = document.getElementsByName("stacue")[0].value;
		r315tRou5US = document.getElementsByName("r315tRou5US")[0].value;
		pinful = document.getElementsByName("pinful")[0].value;
		pinfam = document.getElementsByName("pinfam")[0].value;
		pininf = document.getElementsByName("pininf")[0].value;
		//alert("error telefono");

		if (nomusu=='')
		{
			msjconta++;
			msj+="-Nombres.\n";
			document.getElementsByName("nomusu")[0].focus();
		}
		
		if (apeusu=='')
		{
			msjconta++;
			msj+="-Apellidos.\n";
			document.getElementsByName("apeusu")[0].focus();
		}
		
		if (aliusu=='')
		{
			msjconta++;
			msj+="-Usuario.\n";
			document.getElementsByName("aliusu")[0].focus();
		}
		
		if (corusu=='')
		{
			msjconta++;
			msj+="-Correo Electrónico.\n";
			document.getElementsByName("corusu")[0].focus();
		}

		if (corusu2=='')
		{
			msjconta++;
			msj+="-Confirmar Correo Electrónico.\n";
			document.getElementsByName("corusu2")[0].focus();
		}

		if (conusu=='')
		{
			msjconta++;
			msj+="-Contraseña.\n";
			document.getElementsByName("conusu")[0].focus();
		}

		if (conusu2=='')
		{
			msjconta++;
			msj+="-Confirmar Contraseña.\n";
			document.getElementsByName("conusu2")[0].focus();
		}


		if (pinful=='')
		{
			msjconta++;
			msj+="-Pin Full Perfil.\n";
			document.getElementsByName("pinful")[0].focus();
		}
		if (pinfam=='')
		{
			msjconta++;
			msj+="-Pin Familiar.\n";
			document.getElementsByName("pinfam")[0].focus();
		}
		if (pininf=='')
		{
			msjconta++;
			msj+="-Pin Infantil.\n";
			document.getElementsByName("pininf")[0].focus();
		}

		if(corusu.indexOf("@")==-1 || corusu.indexOf(".")==-1)
		{
			msjconta2++;
			msj2+="-Correo Electrónico NO VALIDO.\nEj.: ejemplo@ejemplo.com\n";
		}
		if((corusu=="")&&(corusu2!=""))
		{
			if(corusu=="")
			{
				msjconta2++;
				msj2+="-Debes colocar tu\nCorreo Electrónico y Confirmarla.\n";
			}
		}
		if(corusu!=corusu2)
		{
			msjconta2++;
			msj2+="-Deben ser iguales los dos campos del\nCorreo Electrónico.\n";
		}
		if((conusu=="")&&(conusu2!=""))
		{
			if(conusu=="")
			{
				msjconta2++;
				msj2+="-Debes colocar tu\nContraseña y Confirmarla.\n";
			}
		}
		if(conusu!=conusu2)
		{
			msjconta2++;
			msj2+="-Deben ser iguales los dos campos de la\nContraseña.\n";
		}
		if (stacue=='')
		{
		//		msjconta++;
		//		msj+="-stacue "+stacue+".\n";
		//		document.getElementsByName("stacue")[0].focus();
		}


		
		if (msj!="")
		{
			if (msj2!="")
			{
				if (msjconta>=2)
				{
					alert("..ERROR..\n Llenar los campos: \n"+msj+"\n\n"+msj2+"\n");
				}else{
					alert("..ERROR..\n Llenar el campo: \n"+msj+"\n\n"+msj2+"\n");
				}
			}else{
				if (msjconta>=2)
				{
					alert("..ERROR..\n Llenar los campos: \n"+msj+"\n");
				}else{
					alert("..ERROR..\n Llenar el campo: \n"+msj+"\n");
				}
			}
		}


		if((msj=="")
		&&(msj2=="")
		&&(r315tRou5US=="true"))
		{
			//alert("..NO ERROR..\n 55 "+r315tRou5US+"\n msj"+msj+"\n msj2"+msj2+"\n");
			document.f007.submit();
		}else{
			//alert("..SI ERROR..\n 55 "+r315tRou5US+"\n msj"+msj+"\n msj2"+msj2+"\n");
			window.location = "index.php?nomusu="+nomusu+"&corusu="+corusu+"&aliusu="+aliusu+"&apeusu="+apeusu+"&ingusu="+ingusu+"&stacue="+stacue;
		}
	}
</script>

<!-- FIN popUp FIN popUp FIN popUp FIN popUp FIN +++++++++++++++ -->

<?php

if($edousu0=="2"){$edodes0="pedodes0";}
if($ciuusu0=="0"){$ciudes0="Pciudes0";}
if($paisusu0=="0"){$paisdes0="Ppaisdes0";}

if($paisusu0=="arg"){$paisdes0="Argentina";}
if($paisusu0=="col"){$paisdes0="Colombia";}
if($paisusu0=="mex"){$paisdes0="Mexico";}
if($paisusu0=="pan"){$paisdes0="Panama";}
if($paisusu0=="usa"){$paisdes0="Estados Unidos";}
if($paisusu0=="ven"){$paisdes0="Venezuela";}
  
if($edousu0=="bol"){$edodes0="Bolívar";}
if($edousu0=="cbb"){$edodes0="Carabobo";}
if($edousu0=="ccs"){$edodes0="Caracas";}
if($edousu0=="fal"){$edodes0="Falcón";}
if($edousu0=="zul"){$edodes0="Zulia";}

if($edodes0=="bar"){$edodes0="Buenos Aires";}
if($edodes0=="ba2"){$edodes0="02Buenos Aires";}

if($edodes0=="bog"){$edodes0="Bogota";}
if($edodes0=="cuc"){$edodes0="Cúcuta";}

if($edodes0=="aca"){$edodes0="Acapulco";}
if($edodes0=="dfe"){$edodes0="Distrito Federal";}
if($edodes0=="pue"){$edodes0="Puebla";}
if($edodes0=="tol"){$edodes0="Tolucas";}
if($edodes0=="vcr"){$edodes0="Vera Cruz";}

if($edodes0=="flo"){$edodes0="Florida";}
if($edodes0=="tex"){$edodes0="Texa";}


if($ciuusu0=="ba1"){$ciudes0="Ciud1-Buenos Aires";}
if($ciuusu0=="ba2"){$ciudes0="Ciud2-Buenos Aires";}

if($ciuusu0=="bg1"){$ciudes0="Ciud1-Bogota";}
if($ciuusu0=="bg2"){$ciudes0="Ciud2-Bogota";}
if($ciuusu0=="cu1"){$ciudes0="Ciud1-Cúcuta";}
if($ciuusu0=="cu2"){$ciudes0="Ciud2-Cúcuta";}

if($ciuusu0=="ac1"){$ciudes0="Ciud1-Acapulco";}
if($ciuusu0=="ac2"){$ciudes0="Ciud2-Acapulco";}
if($ciuusu0=="df1"){$ciudes0="Ciud1-Distrito Federal";}
if($ciuusu0=="df2"){$ciudes0="Ciud2-Distrito Federal";}

if($ciuusu0=="pu1"){$ciudes0="Ciud1-Puebla";}
if($ciuusu0=="pu2"){$ciudes0="Ciud2-Puebla";}
if($ciuusu0=="tl1"){$ciudes0="Ciud1-Tolucas";}
if($ciuusu0=="tl2"){$ciudes0="Ciud2-Tolucas";}
if($ciuusu0=="vc1"){$ciudes0="Ciud1-Vera Cruz";}
if($ciuusu0=="vc2"){$ciudes0="Ciud2-Vera Cruz";}



if($ciuusu0=="fl1"){$ciudes0="Ciud1-Florida";}
if($ciuusu0=="fl2"){$ciudes0="Ciud2-Florida";}
if($ciuusu0=="te1"){$ciudes0="Ciud1-Texa";}
if($ciuusu0=="te2"){$ciudes0="Ciud2-Texa";}


if($ciuusu0=="mag"){$ciudes0="Magdaleno";}
if($ciuusu0=="mcy"){$ciudes0="Maracay";}
if($ciuusu0=="lvc"){$ciudes0="La Victoria";}

if($ciuusu0=="cbv"){$ciudes0="Ciud. Bolivar";}
if($ciuusu0=="gsb"){$ciudes0="Gran Sabana";}
if($ciuusu0=="sfx"){$ciudes0="San Felix";}


if($ciuusu0=="gua"){$ciudes0="Guacara";}
if($ciuusu0=="nag"){$ciudes0="Nagüanagüa";}
if($ciuusu0=="sbl"){$ciudes0="San Blas";}
if($ciuusu0=="sdi"){$ciudes0="San  Diego";}
if($ciuusu0=="val"){$ciudes0="Valencia";}

if($ciuusu0=="alt"){$ciudes0="Altamira";}
if($ciuusu0=="lpz"){$ciudes0="La Paz";}
if($ciuusu0=="lvg"){$ciudes0="La Vega";}

if($ciuusu0=="cor"){$ciudes0="Coro";}
if($ciuusu0=="pfj"){$ciudes0="Punto Fijo";}
if($ciuusu0=="tcc"){$ciudes0="Tucacas";}

if($ciuusu0=="cbm"){$ciudes0="Cabimas";}
if($ciuusu0=="mcb"){$ciudes0="Maracaibo";}
if($ciuusu0=="mnj"){$ciudes0="Mojan";}

$fecha1=$ingusu0;

$objFecha1 = new DateTime($fecha1, new DateTimeZone('America/Mexico_City'));
$dia1= $objFecha1->format('d');
$mes1= $objFecha1->format('m');
$anno1= $objFecha1->format('Y');

if ($ingusu0 == "0000-00-00")
{
	$dia1= "00";
	$mes1= "00";
	$anno1= "0000";
}

//$mes=
$mesdes="";
switch ($mes1) 
{
	case "01":
		$mesdes1="enero";
		break;
	case "02":
		$mesdes1="febrero";
		break;
	case "03":
		$mesdes1="msrzo";
		break;
	case "04":
		$mesdes1="abril";
		break;
	case "05":
		$mesdes1="mayo";
		break;
	case "06":
		$mesdes1="junio";
		break;
	case "07":
		$mesdes1="julio";
		break;
	case "08":
		$mesdes1="agosto";
		break;
	case "09":
		$mesdes1="septiembre";
		break;
	case "10":
		$mesdes1="octubre";
		break;
	case "11":
		$mesdes1="noviembre";
		break;
	case "12":
		$mesdes1="diciembre";
		break;
	default:
		$mesdes1="mes";
}
/* */
//+++++++++++++++++++
//+++++++++++++++++++
/* */

$fecha=$nacusu0;

$objFecha = new DateTime($fecha, new DateTimeZone('America/Mexico_City'));
$dia= $objFecha->format('d');
$mes= $objFecha->format('m');
$anno= $objFecha->format('Y');
/* */

if ($nacusu0 == "0000-00-00")
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
function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

    return 'Other';
	echo get_browser_name($_SERVER['HTTP_USER_AGENT']);
}

?>

<script>
var ddus=null;
var mmus=null;
var aaus=null;
var nacus=null;
var nacus2=null;
var paedci;

/*
2012
2016
2020
2024
*/
	ddus="<?php echo $dia; ?>";
	mmus="<?php echo $mes; ?>";
	aaus="<?php echo $anno; ?>";

function onLoad()
{
/**/
	var paedci="";
	var ciuusu="<?php echo $ciuusu0; ?>";
	var edousu="<?php echo $edousu0; ?>";
	var paisusu="<?php echo $paisusu0; ?>";
	document.getElementsByName("ciuusu")[0].value=ciuusu;
	document.getElementsByName("edousu")[0].value=edousu;
	document.getElementsByName("paisusu")[0].value=paisusu;

//000000000000000000000000000000000000000000000000000000000000
//000000000000000000000000000000000000000000000000000000000000
//000000000000000000000000000000000000000000000000000000000000
//000000000000000000000000000000000000000000000000000000000000
	//paedci="act";
//	fun_edousu();
//	fun_paisusu();
//	fun_edousu();

//555555555555555555
//555555555555555555
//555555555555555555
	var paisusuvar = document.getElementById("paisusu").value;
	var xedousuvar = document.getElementById("edousu");	
	var i;
	for (i = 0; i < xedousuvar.length; i++) {
		if (xedousuvar.options[i].id == paisusuvar){
		    xedousuvar.options[i].style.display = 'block';
		} else {
		    xedousuvar.options[i].style.display = 'none';
		}
	}
	if (paisusuvar == 2 || paisusuvar == null) {
		var vacio = new Option("Elige una 0pais","2");
		xedousuvar.options[xedousuvar.options.length] = vacio;
		xedousuvar.selectedIndex = vacio;
	}
	edousu=document.getElementsByName("edousu")[0].value;
	document.getElementsByName("edousu2")[0].value=edousu;
	ciuusu=document.getElementsByName("ciuusu")[0].value;
	document.getElementsByName("ciuusu2")[0].value=ciuusu;
//555555555555555555
//555555555555555555
//555555555555555555

	var edousuvar = document.getElementById("edousu").value;
	var ciuusuvar = document.getElementById("ciuusu");	
	var i;
	for (i = 0; i < ciuusuvar.length; i++) {
		if (ciuusuvar.options[i].id == edousuvar){
		    ciuusuvar.options[i].style.display = 'block';
		} else {
		    ciuusuvar.options[i].style.display = 'none';
		}
	}
	if (edousuvar == 2 || edousuvar == null) {
		var vacio = new Option("Elige una 0Edo","2");
		ciuusuvar.options[ciuusuvar.options.length] = vacio;
		ciuusuvar.selectedIndex = vacio;
	}
	edousu=document.getElementsByName("edousu")[0].value;
	document.getElementsByName("edousu2")[0].value=edousu;
	ciuusu=document.getElementsByName("ciuusu")[0].value;
	document.getElementsByName("ciuusu2")[0].value=ciuusu;

//555555555555555555
//555555555555555555
//555555555555555555
	var estdousu1 = document.getElementById("edousu");	
	var ciuusu1 = document.getElementById("ciuusu");	
	if (ciuusu == 22)
	{
		var vacio2 = new Option("Elige un Estado2102","22");
		ciuusu1.options[ciuusu1.options.length] = vacio2;
		ciuusu1.selectedIndex = vacio2;
		document.getElementsByName("ciuusu")[0].value = 22; //2222222222
		ciuusu=document.getElementsByName("ciuusu2")[0].value = 22; //2222222222
	}
	if (edousu == 22)
	{
		var vacio1 = new Option("Elige un Paiso2102","22");
		estdousu1.options[estdousu1.options.length] = vacio1;
		estdousu1.selectedIndex = vacio1;
		document.getElementsByName("edousu")[0].value = 22; //2222222222
		edousu=document.getElementsByName("edousu2")[0].value = 22; //2222222222
	}


//000000000000000000000000000000000000000000000000000000000000
//000000000000000000000000000000000000000000000000000000000000
//000000000000000000000000000000000000000000000000000000000000
//000000000000000000000000000000000000000000000000000000000000



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

//0000000000000000000000000000000000000000
//0000000000000000000000000000000000000000
//0000000000000000000000000000000000000000

function fun_paisusu()
{
	var paisusuvar = document.getElementById("paisusu").value;
	var xedousuvar = document.getElementById("edousu");	
		//alert("ddddddddd");
		var vacio = new Option("Elige una 0pais","2");
		xedousuvar.options[xedousuvar.options.length] = vacio;
		xedousuvar.selectedIndex = vacio;

	var i;
	for (i = 0; i < xedousuvar.length; i++) {
		if (xedousuvar.options[i].id == paisusuvar){
		    xedousuvar.options[i].style.display = 'block';
		} else {
		    xedousuvar.options[i].style.display = 'none';
		}
	}
	if (paisusuvar == 2 || paisusuvar == null) {
		var vacio = new Option("Elige una 0pais","2");
		xedousuvar.options[xedousuvar.options.length] = vacio;
		xedousuvar.selectedIndex = vacio;
	}
	paisusu=document.getElementsByName("paisusu")[0].value;
	document.getElementsByName("paisusu2")[0].value=paisusu;

	edousu=document.getElementsByName("edousu")[0].value;
	document.getElementsByName("edousu2")[0].value=edousu;
	ciuusu=document.getElementsByName("ciuusu")[0].value;
	document.getElementsByName("ciuusu2")[0].value=ciuusu;

}

function fun_edousu()
{
	var edousuvar = document.getElementById("edousu").value;
	var ciuusuvar = document.getElementById("ciuusu");	
	
		var vacio = new Option("Elige una 0Edo","2");
		ciuusuvar.options[ciuusuvar.options.length] = vacio;
		ciuusuvar.selectedIndex = vacio;

	
	var i;
	for (i = 0; i < ciuusuvar.length; i++) {
		if (ciuusuvar.options[i].id == edousuvar){
		    ciuusuvar.options[i].style.display = 'block';
		} else {
		    ciuusuvar.options[i].style.display = 'none';
		}
	}
	if (edousuvar == 2 || edousuvar == null) {
		var vacio = new Option("Elige una 0Edo","2");
		ciuusuvar.options[ciuusuvar.options.length] = vacio;
		ciuusuvar.selectedIndex = vacio;
	}
	edousu=document.getElementsByName("edousu")[0].value;
	document.getElementsByName("edousu2")[0].value=edousu;
	ciuusu=document.getElementsByName("ciuusu")[0].value;
	document.getElementsByName("ciuusu2")[0].value=ciuusu;
}
//0000000000000000000000000000000000000000
//0000000000000000000000000000000000000000
//0000000000000000000000000000000000000000

function cbx_ciuusu()
{
	ciuusu=document.getElementsByName("ciuusu")[0].value;
	document.getElementsByName("ciuusu2")[0].value=ciuusu;
//cbx_edousu();
	cambiodatosintro_linea();
}


function XXXfun_edousu()
{
	var estdousu1 = document.getElementById("edousu").value;
	var ciuusu1 = document.getElementById("ciuusu");	
	var i2;
	for (i2 = 0; i2 < ciuusu1.length; i2++) {
		if (ciuusu1.options[i2].id == estdousu1){
		    ciuusu1.options[i2].style.display = 'block';
		} else {
		    ciuusu1.options[i2].style.display = 'none';
		}
	}


	if (estdousu1 == 2 || estdousu1 == 22 || estdousu1 == null) {
		var vacio2 = new Option("Elige un Estado2102","22");
		ciuusu1.options[ciuusu1.options.length] = vacio2;
		ciuusu1.selectedIndex = vacio2;

		//document.getElementById("ciuusu").selectedIndex = 0;
		document.getElementsByName("ciuusu")[0].value = 22; //2222222222
		ciuusu=document.getElementsByName("ciuusu2")[0].value = 22; //2222222222
	}else 
	if (i2 >= 1)
	//&&(estdousu1 != 2 || estdousu1 != 22 || estdousu1 != null))
	{
//
	document.getElementsByName("ciuusu")[0].value = 2; //2222222222
//	
	ciuusu=document.getElementsByName("ciuusu2")[0].value = 2; //2222222222
	}
/**/
	
 	
	edousu=document.getElementsByName("edousu")[0].value;
	document.getElementsByName("edousu2")[0].value=edousu;
	ciuusu=document.getElementsByName("ciuusu")[0].value;
	document.getElementsByName("ciuusu2")[0].value=ciuusu;
	

}


function cbx_edousu()
{
	fun_edousu();
	cambiodatosintro_linea();
}




function XXXfun_paisusu()
{
//	fun_edousu();
/* */

	var paisusu2 = document.getElementById("paisusu").value;
	var estdousu2 = document.getElementById("edousu");	
	var i;
	for (i = 0; i < estdousu2.length; i++) {
		    estdousu2.options[i].style.display = 'block';
		if (estdousu2.options[i].id == paisusu2){
		    estdousu2.options[i].style.display = 'block';
		} else {
		    estdousu2.options[i].style.display = 'none';
		}
	}

	if (paisusu2 == 2 || paisusu2 == null) {
		var vacio2 = new Option("Elige un PaisFD","22");
		estdousu2.options[estdousu2.options.length] = vacio2;
		estdousu2.selectedIndex = vacio2;

//		document.getElementById("edousu").selectedIndex =0;
//		document.getElementById("ciuusu").selectedIndex = 0;
//00		paisusu=document.getElementsByName("edousu2")[0].value = 22; //2222222222
//		edousu=document.getElementsByName("ciuusu2")[0].value = 22;//2222222222
		
//		document.getElementById("ciuusu").selectedIndex = 0;
		document.getElementsByName("edousu")[0].value = 22; //2222222222
//		document.getElementsByName("ciuusu")[0].value = 22; //2222222222
//		paisusu=
		document.getElementsByName("edousu2")[0].value = 22; //2222222222
//		edousu=document.getElementsByName("ciuusu2")[0].value = 22; //2222222222
//	 	cbx_edousu();
	}else {
//		document.getElementById("edousu").selectedIndex =0;
//		document.getElementById("ciuusu").selectedIndex = 0;
/////		document.getElementsByName("edousu")[0].value = 2; //2222222222
//		document.getElementsByName("ciuusu")[0].value = 22; //2222222222
//		paisusu=
//////		document.getElementsByName("edousu2")[0].value = 2; //2222222222
//		edousu=document.getElementsByName("ciuusu2")[0].value = 22; //2222222222
	}


//00000000000000000000000000000000000000000000000000000000000000000000
//00000000000000000000000000000000000000000000000000000000000000000000
//00000000000000000000000000000000000000000000000000000000000000000000
//00000000000000000000000000000000000000000000000000000000000000000000
/** /
	var estdousu1 = document.getElementById("edousu").value;
	var ciuusu1 = document.getElementById("ciuusu");	
	var i2;
	for (i2 = 0; i2 < ciuusu1.length; i2++) {
		if (ciuusu1.options[i2].id == estdousu1){
		    ciuusu1.options[i2].style.display = 'block';
		} else {
		    ciuusu1.options[i2].style.display = 'none';
		}
	}
	if (estdousu1 == 2 || estdousu1 == null) {
		var vacio2 = new Option("Elige un estdousu7413","22");
		ciuusu1.options[ciuusu1.options.length] = vacio2;
		ciuusu1.selectedIndex = vacio2;

		document.getElementsByName("ciuusu")[0].value = 22; //2222222222
		edousu=document.getElementsByName("ciuusu2")[0].value = 22; //2222222222

//		document.getElementById("edousu").selectedIndex =0;
//		document.getElementById("ciuusu").selectedIndex = 0;
		paisusu=document.getElementsByName("edousu2")[0].value = 22; //2222222222
		edousu=document.getElementsByName("ciuusu2")[0].value = 22;//2222222222

	}else {
		document.getElementsByName("ciuusu")[0].value = 2; //2222222222
		edousu=document.getElementsByName("ciuusu2")[0].value = 2; //2222222222

//		document.getElementById("edousu").selectedIndex =0;
//		document.getElementById("ciuusu").selectedIndex = 0;
		paisusu=document.getElementsByName("edousu2")[0].value = 2;//2222222222
		edousu=document.getElementsByName("ciuusu2")[0].value = 2;//2222222222
	}
/ * */
//00000000000000000000000000000000000000000000000000000000000000000000
//00000000000000000000000000000000000000000000000000000000000000000000
//00000000000000000000000000000000000000000000000000000000000000000000
//00000000000000000000000000000000000000000000000000000000000000000000


	paisusu=document.getElementsByName("paisusu")[0].value;
	document.getElementsByName("paisusu2")[0].value=paisusu;
	edousu=document.getElementsByName("edousu")[0].value;
	document.getElementsByName("edousu2")[0].value=edousu;
}


function cbx_paisusu()
{
//	fun_edousu();
	fun_paisusu();
	fun_edousu();
	cambiodatosintro_linea();
}


function mostrar()
{



/* * /
	var estdousu = document.getElementById("edousu").value;
	var ciudusu = document.getElementById("ciuusu");	
	var i;
	for (i = 0; i < ciudusu.length; i++) {
		if (ciudusu.options[i].id == estdousu){
		    ciudusu.options[i].style.display = 'block';
		} else {
		    ciudusu.options[i].style.display = 'none';
		}
	}
	if (estdousu == 2 || estdousu == null) {
		var vacio = new Option("Elige un Estado","0");
		ciudusu.options[ciudusu.options.length] = vacio;
		ciudusu.selectedIndex = vacio;
	}
/ * */


/*
//	if (ciudusu2 == "lvc" || estdousu == null) {
	if (ciudusu2 == "ven")
	{
		document.getElementsByName("ciuusu")[0].disabled=false;
	}else{
		document.getElementsByName("ciuusu")[0].disabled=true;
	}
*/
	cambiodatosintro_linea();
}



function cbx_ddus(){
//	alert("cbx_dduscbx_ddus");
	ddus = document.getElementsByName("fdiaus")[0].value;
//	document.getElementsByName("fdiaus")[0].value=ddus;
	document.getElementsByName("fmesus")[0].value=mmus;
	document.getElementsByName("fanous")[0].value=aaus;

	cambiodatosintro_linea();
}

function cbx_mmus()
{
//		alert("ssmmus");
	mmus = document.getElementsByName("fmesus")[0].value;
	document.getElementsByName("fdiaus")[0].value=ddus;
//	document.getElementsByName("fmesus")[0].value=mmus;
	document.getElementsByName("fanous")[0].value=aaus;

	cambiodatosintro_linea();
}

function cbx_aaus()
	{
//		alert("vvvaaus");
	aaus = document.getElementsByName("fanous")[0].value;
	document.getElementsByName("fdiaus")[0].value=ddus;
	document.getElementsByName("fmesus")[0].value=mmus;
//	document.getElementsByName("fanous")[0].value=aaus;

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
function obtenerip()
{

	<?php
          
                    $ip = '8.8.4.4';
                    $ch = curl_init('http://ipwho.is/'.$ip);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    $ipwhois = json_decode(curl_exec($ch), true);
                    curl_close($ch);
                    echo '<script>
			            alert("'.$ipwhois['country'] . ' ' . $ipwhois['flag']['emoji'] . ' ' . $ipwhois['ip'] . '");
		            </script>';
                ?>
}

</script>