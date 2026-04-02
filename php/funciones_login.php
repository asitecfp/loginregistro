<script>
		function direccion(e){
			key=e.keyCode || e.which;
			teclado=String.fromCharCode(key).toLowerCase();
			letras=" abcdefghijklmnñopqrstuvwxyzáéíóúü-.,1234567890#";
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

		function cambiarconpin(){
			tipo=document.getElementById("conusuactu");
			imgn=document.getElementById("ver_pass");

			if(tipo.type=="password")
			{tipo.type="text"; imgn.src="../assets/imagen/icon/ver_pass_2.png";}else
			{tipo.type="password"; imgn.src="../assets/imagen/icon/ver_pass.png";}
		}

		function cambiarconpin00(){
			tipo=document.getElementById("conusuactu_00");
			imgn=document.getElementById("ver_pass_00");

			if(tipo.type=="password")
			{tipo.type="text"; imgn.src="../assets/imagen/icon/ver_pass_2.png";}else
			{tipo.type="password"; imgn.src="../assets/imagen/icon/ver_pass.png";}
		}

		function cambiarconpin01(){
			tipo=document.getElementById("conusu");
			imgn=document.getElementById("ver_pass_01");

			if(tipo.type=="password")
			{tipo.type="text"; imgn.src="../assets/imagen/icon/ver_pass_2.png";}else
			{tipo.type="password"; imgn.src="../assets/imagen/icon/ver_pass.png";}
		}

		function cambiarconpin02(){
			tipo=document.getElementById("conusu2");
			imgn=document.getElementById("ver_pass_02");

			if(tipo.type=="password")
			{tipo.type="text"; imgn.src="../assets/imagen/icon/ver_pass_2.png";}else
			{tipo.type="password"; imgn.src="../assets/imagen/icon/ver_pass.png";}
		}

		function cambiarconpin03(){
			tipo=document.getElementById("pinful");
			imgn=document.getElementById("ver_pass_03");

			if(tipo.type=="password")
			{tipo.type="text"; imgn.src="../assets/imagen/icon/ver_pass_2.png";}else
			{tipo.type="password"; imgn.src="../assets/imagen/icon/ver_pass.png";}
		}
		function cambiarconpin04(){
			tipo=document.getElementById("pinfam");
			imgn=document.getElementById("ver_pass_04");

			if(tipo.type=="password")
			{tipo.type="text"; imgn.src="../assets/imagen/icon/ver_pass_2.png";}else
			{tipo.type="password"; imgn.src="../assets/imagen/icon/ver_pass.png";}
		}
		function cambiarconpin05(){
			tipo=document.getElementById("pininf");
			imgn=document.getElementById("ver_pass_05");

			if(tipo.type=="password")
			{tipo.type="text"; imgn.src="../assets/imagen/icon/ver_pass_2.png";}else
			{tipo.type="password"; imgn.src="../assets/imagen/icon/ver_pass.png";}
		}
</script>

<script>

function validarcorreo(){
	var corusu="";
	var corusu2="";
	var msj="";
		corusu = document.getElementsByName("corusu")[0].value;
		corusu2 = document.getElementsByName("corusu2")[0].value;
	if((corusu=="")&&(corusu2!=""))
	{
		if(corusu=="")
		{
			msj+="-Debes colocar tu\nCorreo Electrónico y Confirmarlo.\n";
			
		}
		
		if(corusu!=corusu2)
		{
			msj+="-Deben ser iguales los dos campos del\nCorreo Electrónico.\n";
		}
	}
	if(msj!="")
	{
		alert("..ERROR..\n"+msj);
	}
}

function validarcorreo2(){
	var corusu="";
	var corusu2="";
		corusu = document.getElementsByName("corusu")[0].value;
		corusu2 = document.getElementsByName("corusu2")[0].value;
	if(corusu!=corusu2)
	{
		alert("..ERROR..\n-Deben ser iguales los dos campos del\nCorreo Electrónico.\n");
		//alert("..ERROR..\n-Deben ser iguales los dos campos del\nCorreo Electrónico\n"+corusu+"\n"+corusu2+"\n");
	}
}

function validarcontra(){
	var conusu="";
	var conusu2="";
		conusu = document.getElementsByName("conusu")[0].value;
		conusu2 = document.getElementsByName("conusu2")[0].value;
	var msj="";
		conusu = document.getElementsByName("conusu")[0].value;
		conusu2 = document.getElementsByName("conusu2")[0].value;
	if((conusu=="")&&(conusu2!=""))
	{
		if(conusu=="")
		{
			msj+="-Debes colocar tu\nContraseña y Confirmarla.\n";
			//alert("ERROR.. debes colocar tu\n-Correo Electrónico y Confirmarlo.");
		}
		
		if(conusu!=conusu2)
		{
			msj+="-Deben ser iguales los dos campos de la\nContraseña.\n";
			//msj+="-Deben ser iguales los dos campos del\nCorreo Electrónico\n"+corusu+"\n"+corusu2+"\n";
			//alert("ERffROR.. deben ser iguales los dos campos del\n-Correo Electrónico\n"+corusu+"\n"+corusu2+"\n");
		}
	}
	if(msj!="")
	{
		alert("..ERROR..\n"+msj);
	}
}

function validarcontra2(){
	var conusu="";
	var conusu2="";
		conusu = document.getElementsByName("conusu")[0].value;
		conusu2 = document.getElementsByName("conusu2")[0].value;
	if(conusu!=conusu2)
	{
		alert("..ERROR..\n-Deben ser iguales los dos campos de la\nContraseña.\n");
		//alert("..ERROR..\n-Deben ser iguales los dos campos del\nCorreo Electrónico\n"+corusu+"\n"+corusu2+"\n");
	}
}

</script>


<script language="javascript" type="text/javascript"> 

/* * /
var nomusu = null;
var corusu = null;
var aliusu = null;
var conusu = null;
var apeusu = null;
var ingusu = null;
/ * */

function popUp(){

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
	
	/*if (aliusu==''){
		msjconta++;
		msj+="-Usuario.\n";
		document.getElementsByName("aliusu")[0].focus();
	}*/
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


	/*if (pinful==''){
		//msjconta++;
		//msj+="-Pin Full Perfil.\n";
		document.getElementsByName("pinful")[0].focus();
	}
	if (pinfam==''){
		//msjconta++;
		//msj+="-Pin Familiar.\n";
		document.getElementsByName("pinfam")[0].focus();
	}
	if (pininf==''){
		msjconta++;
		//msj+="-Pin Infantil.\n";
		document.getElementsByName("pininf")[0].focus();
	}*/
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

<!-- FIN popUp FIN popUp FIN popUp FIN popUp+++++++++++++++ -->
