$(document).ready(function(){
	/*Mostrar ocultar area de notificaciones*/
	$('.btn-Notification').on('click', function(){
        var ContainerNoty=$('.container-notifications');
        var NotificationArea=$('.NotificationArea');
        if(NotificationArea.hasClass('NotificationArea-show')&&ContainerNoty.hasClass('container-notifications-show')){
            NotificationArea.removeClass('NotificationArea-show');
            ContainerNoty.removeClass('container-notifications-show');
        }else{
            NotificationArea.addClass('NotificationArea-show');
            ContainerNoty.addClass('container-notifications-show');
        }
    });
    /*Mostrar ocultar menu principal*/
    $('.btn-menu').on('click', function(){
    	var navLateral=$('.navLateral');
    	var pageContent=$('.pageContent');
    	var navOption=$('.navBar-options');
    	if(navLateral.hasClass('navLateral-change')&&pageContent.hasClass('pageContent-change')){
    		navLateral.removeClass('navLateral-change');
    		pageContent.removeClass('pageContent-change');
    		navOption.removeClass('navBar-options-change');
    	}else{
    		navLateral.addClass('navLateral-change');
    		pageContent.addClass('pageContent-change');
    		navOption.addClass('navBar-options-change');
    	}
    });
    /*Salir del sistema*/
    $('.btn-exit').on('click', function(){
    	swal({
		  	title: 'You want out of the system?',
		 	text: "The current session will be closed and will leave the system",
		  	type: 'warning',
		  	showCancelButton: true,
		  	confirmButtonText: 'Yes, exit',
		  	closeOnConfirm: false
		},
		function(isConfirm) {
		  	if (isConfirm) {
		    	window.location='index.html'; 
		  	}
		});
    });
    /*Mostrar y ocultar submenus*/
    $('.btn-subMenu').on('click', function(){
    	var subMenu=$(this).next('ul');
    	var icon=$(this).children("span");
    	if(subMenu.hasClass('sub-menu-options-show')){
    		subMenu.removeClass('sub-menu-options-show');
    		icon.addClass('zmdi-chevron-left').removeClass('zmdi-chevron-down');
    	}else{
    		subMenu.addClass('sub-menu-options-show');
    		icon.addClass('zmdi-chevron-down').removeClass('zmdi-chevron-left');
    	}
    });
	/*Obtener datos de temporada
	$('.btn-temp').on('click', function(val){
		
		//const contenido = document.getElementById('idcont_tem');
		//const document = document.querySelectorAll('.mdl-textfield mdl-js-textfield mdl-textfield--floating-label');

		const getidecont = document.getElementById(val+'ide_cont');
		const setidecont = document.getElementById('ide_conte');
		
		const getnomcont = document.getElementById(val+'nom_cont');
		const setnomcont = document.getElementById('nom_conte');

		setidecont.value = getidecont.value;
		//setidcont.value = getidcont.value;
		alert("fasdf");

	});*/
});

function rev(){
	
}	/*Obtener datos de contenido en revision*/
	function ob1(val){
		
		//const contenido = document.getElementById('idcont_tem');
		//const document = document.querySelectorAll('.mdl-textfield mdl-js-textfield mdl-textfield--floating-label');

		const getidecont = document.getElementById(val+'ide_cont');
		const setidecont = document.getElementById('ide_conte');
		const getnomcont = document.getElementById(val+'nom_cont');
		const setnomcont = document.getElementById('nom_conte');
		const getnomcon2 = document.getElementById(val+'nom_cont2');
		const setnomcon2 = document.getElementById('nom_conte2');
		const getsinopsi = document.getElementById(val+'sinop');
		const setsinopsi = document.getElementById('sinop');
		const gettipcont = document.getElementById(val+'tip_cont');
		const settipcont = document.getElementById('tip_conte');
		const getclacont = document.getElementById(val+'cla_cont');
		const setclacont = document.getElementById('cla_conte');
		const getcatcont = document.getElementById(val+'cat_cont');
		const setcatcont = document.getElementById('cat_conte');
		const getdurcont = document.getElementById(val+'dur_cont');
		const setdurcont = document.getElementById('dur_conte');
		const getfecprod = document.getElementById(val+'fec_prod');
		const setfecprod = document.getElementById('Fecha-Pro');
		const getfeclanz = document.getElementById(val+'fec_lanz');
		const setfeclanz = document.getElementById('Fecha-Lan');
		//const getimgcont = document.getElementById(val+'ide_cont');
		const setimgcont = document.getElementById('img_conte');
		const setimgprin = document.getElementById('img_princ');
		const setimgcat = document.getElementById('img_cat');

		const setcont = document.getElementById('reptra');
		const settrai = document.getElementById('reptra');
		const setfiles = document.getElementById('#form');

		const getcalidsd = document.getElementById(val+'cal_sd');
		const setcalidsd = document.getElementById('quality-labels-sd');
		const getcalidhd = document.getElementById(val+'cal_hd');
		const setcalidhd = document.getElementById(val+'quality-labels-hd');
		const getcalifhd = document.getElementById(val+'cal_fhd');
		const setcalifhd =  document.getElementById('quality-labels-fhd');
		const getcaliqhd = document.getElementById(val+'cal_qhd');
		const setcaliqhd =  document.getElementById('quality-labels-qhd');
		
		const setdevcont = document.getElementById('buttonDev');
		const setaprcont = document.getElementById('buttonApr');

		const getestado = document.getElementById(val+'status');
		//const setestado = document.getElementById('status');
		
		const dirimg = "/cover/"
		const dirpri = "/prin/"
		const dircat = "/prin/cat/"
		const dircon = "/trailer/mov/"
		const dirtra = "/trailer/mov/"

		setidecont.value = getidecont.innerHTML;
		setnomcont.value = getnomcont.innerHTML;
		setnomcon2.value = getnomcon2.innerHTML;
		setsinopsi.value = getsinopsi.innerHTML;
		settipcont.value = gettipcont.innerHTML;
		setclacont.value = getclacont.innerHTML;
		setcatcont.value = getcatcont.innerHTML;
		setdurcont.value = getdurcont.innerHTML;
		setfecprod.value = getfecprod.innerHTML;
		setfeclanz.value = getfeclanz.innerHTML;
		setdevcont.value = getidecont.innerHTML;
		setaprcont.value = getidecont.innerHTML;
		//setstatus.value = getstatus.innerHTML;

		/*Cambiando atributos a las etiquetas*/

		if (getestado.innerHTML != "Existe") {
			getcalifhd.style.background = "red";
		}else{
			getcalifhd.style.background = "green";
		}
		if (getcalidsd.innerHTML != "") {	
			//setcalidsd.style.backgroundColor = "blue";
			setcalidsd.style.animationPlayState = 'paused'
		}
		if (getcalidhd.innerHTML != "") {	
			//setcalidhd.style.background = "red";
			setcalidhd.style.animationPlayState = 'paused';
		}
		if (getcalifhd.innerHTML != "") {	
			//setcalifhd.style.backgroundColor = "red";
			setcalifhd.style.animationPlayState = 'paused'
			//setcalidhd.style.removeProperty("background");
		}
		if (getcaliqhd.innerHTML != "") {	
			//setcalifhd.style.backgroundColor = "red";
			setcaliqhd.style.animationPlayState = 'paused'
			//setcalidhd.style.removeProperty("background");
		}
		//const labels = [setcalidsd, setcalidhd, setcalifhd];
		// Inicializa el efecto de carga
//		function ejec(){
//			var tr = 0.1, tt=1; 
//					for (let i = 1; i <= 9; i++) {
						// Actualiza el valor de transparencia
						
//						tt = tt - tr;
//							setcalidhd.style.opacity = tt;
						//alert(i);
						// Espera un segundo
					
//					}

//		}
//		setTimeout(ejec, 1000);						
					
		/*------------------------------------*/
		setimgcont.src = dirimg+getidecont.innerHTML+".webp";
		setimgprin.src = dirpri+getidecont.innerHTML+".webp";
		setimgcat.src = dircat+getidecont.innerHTML+".webp";

		setcont.src = dircon+getidecont.innerHTML+".mp4";
		settrai.src = dircon+getidecont.innerHTML+".mp4";

		setfiles.action = "upload_trailer.php?idegrilla="+getidecont.innerHTML;
	
	};
	/*Obtener datos de temporada*/
	function ob(val){
		
		//const contenido = document.getElementById('idcont_tem');
		//const document = document.querySelectorAll('.mdl-textfield mdl-js-textfield mdl-textfield--floating-label');

		const getidecont = document.getElementById(val+'ide_cont');
		const setidecont = document.getElementById('ide_conte');
		
		const getnomcont = document.getElementById(val+'nom_cont');
		const setnomcont = document.getElementById('nom_conte');

		const getimgcont = document.getElementById(val+'ide_cont');
		const setimgcont = document.getElementById('img_conte');

		const getnumtemp = document.getElementById(val+'num_temp');
		const setnumtemp = document.getElementById('num_tempe');
		
		const dirimg = "/cover/"

		setidecont.value = getidecont.innerHTML;
		setnomcont.value = getnomcont.innerHTML;
		setimgcont.src = dirimg+getimgcont.innerHTML+".webp";
		
		var valor = 1
		var valor2 = getnumtemp.innerHTML;
		var valor3 = parseInt(valor2);
		var valor4 = valor + valor3;
		setnumtemp.value = valor4;

	};
		/*Obtener datos de Capitulos*/
		function ob2(val, val2){
		
			//const contenido = document.getElementById('idcont_tem');
			//const document = document.querySelectorAll('.mdl-textfield mdl-js-textfield mdl-textfield--floating-label');
			
			const getidecont = document.getElementById(val+'ide_cont');
			const setidecont = document.getElementById('ide_conte');
			
			const getnomcont = document.getElementById(val+'nom_cont');
			const setnomcont = document.getElementById('nom_conte');
	
			const getimgcont = document.getElementById(val+'ide_cont');
			const setimgcont = document.getElementById('img_conte');
	
			//const getnumtemp = document.getElementById(val+'num_tempcap'+val2);
			//const options = document.getElementsByTagName("option");
			//const getnumtemp = document.getElementById(val+'num_tempc'+val2);
			const getnumtemp = document.getElementById(val+'num_tempc'+val2);
			const setnumtemp = document.getElementById('num_tempecap');
			
			const dirimg = "/cover/"
	
			
			
			setidecont.value = getidecont.innerHTML;
			setnomcont.value = getnomcont.innerHTML;
			setimgcont.src = dirimg+getimgcont.innerHTML+".webp";
			setnumtemp.value = getnumtemp.options[getnumtemp.selectedIndex].text;
			
			//var valor = 1
			//var valor2 = getnumtemp.innerHTML;
			//var valor3 = parseInt(valor2);
			//var valor4 = valor + valor3;
			//setnumtemp.value = valor4;
	//alert( combo.options[combo.selectedIndex].text);
	//options[getnumtemp.value-1].innerHTML

	//alert()
		};
	
(function($){
    $(window).load(function(){
        $(".navLateral-body, .NotificationArea, .pageContent").mCustomScrollbar({
            theme:"dark-thin",
            scrollbarPosition: "inside",
            autoHideScrollbar: true,
            scrollButtons:{ enable: true }
        });
    });

})(jQuery);

