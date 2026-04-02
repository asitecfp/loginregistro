//------ ------Elimina el preload y muestra la pagina cargada--------------

 window.onload || setTimeout(cargaconte, 5000);
 function cargaconte(){
    
     $('#onload').fadeOut();
     $('body').removeClass('hidden');
  
 }             
// window.onload || setTimeout(cargaconte, 5000);

// function cargaconte(){
//   document.querySelector('#onload').fadeOut();
//   document.querySelector('body').classList.remove('hidden');
// }

//-----------------------------------------------------------------------------------
const peliculas = document.querySelectorAll('.pelicula');
const trailer = document.getElementById('trailer');
var calidad;

function bt(bot){
    const fila = document.querySelector('.contenedor-carrousel'+bot);
    const flechaIzquierda = document.getElementById(bot+'flecha-izquierda');
    const flechaDerecha = document.getElementById(bot+'flecha-derecha');
    // -------  --------Event Listener para la flecha derecha. -------  -----
    flechaDerecha.addEventListener('click', () => {
        fila.scrollLeft += 400;   
 
    });
    // -------  --------Event Listener para la flecha izquierda. -------  -----
    flechaIzquierda.addEventListener('click', () => {
        fila.scrollLeft -= fila.offsetwidth;
        fila.scrollLeft -= 400;
    });
 /*   //------------------- paginacion -----------------
    const numeroPaginas = Math.ceil(peliculas.length / 6);
    
    for(let i = 0; i < numeroPaginas; i++){
            const indicador = document.createElement("button");

        if (i === 0){
            indicador.classList.add('activo');
        }
        
        document.querySelector(".indicadores").appendChild(indicador);
        
       indicador.addEventListener('click', (e) => {
           fila.scrollLeft = i * fila.offsetWidth;

           document.querySelector('.indicadores .activo').classList.remove('activo');
          e.target.classList.add('activo');
       });
   }*/
//----------------------------------------------------------
}



calidad = "FHD";

test_speed(); //--Obneter desde asset/js/testspeed.js
    
// ------- ------ Event Listener para las peliculas ------- -------- AMV
function si(val, cat, serv){
   //contenido
    const getcon = document.getElementById(cat+'id'+val);
    const setcon = document.getElementById('con');
    const url = "vercontenido.php?mae="+getcon.innerHTML;
    setcon.value = getcon.innerHTML;
    setcon.href = url;
  
    

//------------------ Servidor, disco y Contenido ------------------------------------- AMV
    
    const getserv = document.getElementById(cat+'ser'+val);
    
    if (calidad == "SD"){
    

    //    //--contenido--//
    //     const getcon = document.getElementById(cat+'id'+val);
    //     const getdirSD = document.getElementById(cat+'dirsd'+val);
    //     const setcon = document.getElementById('con');
    //     //const dircon1 = "vercontenido.php?cont="+getdirSD.innerHTML+"";
    //     //setcon.href = dircon1+getcon.innerHTML;

    //     const url = "vercontenido.php?mae="+getcon.innerHTML;
    //     setcon.value = getcon.innerHTML;
    //     setcon.href = url;


        //--trailer--//
        const getvideo = document.getElementById(cat+'id'+val);
        const gettraSD = document.getElementById(cat+'trasd'+val);
        const setvideo = document.getElementById('videoPrin');
        const dirvid = gettraSD.innerHTML+"";
        setvideo.src = dirvid+getvideo.innerHTML+".mp4";

       
    
    }
      if (calidad == "HD") {
    //      //--contenido--//
    //     const getcon = document.getElementById(cat+'id'+val);
    //     const getdirHD = document.getElementById(cat+'dirhd'+val);
    //     const setcon = document.getElementById('con');

    //     const dircon1 = "vercontenido.php?cont=" + getserv.innerHTML + getdirHD.innerHTML;
    //     setcon.href = dircon1 + getcon.innerHTML;
         //--trailer--//
        const getvideo = document.getElementById(cat+'id'+val);
        const gettraHD = document.getElementById(cat+'trahd'+val);
        const setvideo = document.getElementById('videoPrin');
        
        const dirvid = gettraHD.innerHTML + "";
        setvideo.src = dirvid + getvideo.innerHTML + ".mp4";
      }
    if (calidad == "FHD"){
       
        //   //--contenido--//
        //   const getcon = document.getElementById(cat+'id'+val);
        //   const getdirFHD = document.getElementById(cat+'dirfhd'+val);
        //   const setcon = document.getElementById('con');

        // const dircon1 = "vercontenido.php?cont="+getserv.innerHTML+getdirFHD.innerHTML+"";
        // setcon.href = dircon1+getcon.innerHTML;
          //--trailer--//
          const getvideo = document.getElementById(cat+'id'+val);
          const gettraFHD = document.getElementById(cat+'trafhd'+val);
          const setvideo = document.getElementById('videoPrin');

        const dirvid = gettraFHD.innerHTML+"";
        setvideo.src = dirvid+getvideo.innerHTML+".mp4";
    }
    if (calidad == "4K"){
      
          //--contenido--//
          const getcon = document.getElementById(cat+'id'+val);
          const getdirFHD = document.getElementById(cat+'dirfhd'+val);
          const setcon = document.getElementById('con');

        const dircon1 = "vercontenido.php?cont="+getserv.innerHTML+getdirFHD.innerHTML+"";
        setcon.href = dircon1+getcon.innerHTML;

          //--trailer--//
          const getvideo = document.getElementById(cat+'id'+val);
          const gettraFHD = document.getElementById(cat+'trafhd'+val);
          const setvideo = document.getElementById('videoPrin');
        
        const dirvid = gettraFHD.innerHTML+"";
        setvideo.src = dirvid+getvideo.innerHTML+".mp4";
    }
    if (calidad == "8K"){
       
          //--contenido--//
          const getcon = document.getElementById(cat+'id'+val);
          const getdirFHD = document.getElementById(cat+'dirfhd'+val);
          const setcon = document.getElementById('con');

        const dircon1 = "vercontenido.php?cont="+getserv.innerHTML+getdirFHD.innerHTML+"";
        setcon.href = dircon1+getcon.innerHTML;

        
          //--trailer--//
          const getvideo = document.getElementById(cat+'id'+val);
          const gettraFHD = document.getElementById(cat+'trafhd'+val);
          const setvideo = document.getElementById('videoPrin');

        const dirvid = gettraFHD.innerHTML+""; 
        setvideo.src = dirvid+getvideo.innerHTML+".mp4";
    }

    const setvideo = document.getElementById('videoPrin');
//------------------ Sinopsis -------------------------------------- AMV
    const getsinopsis = document.getElementById(cat+'sinop'+val);
    const setsinopsis = document.getElementById('sinopsis');
    setsinopsis.innerHTML = getsinopsis.innerHTML;
//------------------ Img. Principal -------------------------------- AMV

    const getimgprin = document.getElementById(cat+'id'+val);
    const setimgprin = document.getElementById('imgprin');
    
    const dirimg = "/prin/" //internet
    setvideo.poster = dirimg+getimgprin.innerHTML+".webp";

//------------------ Logo y Contenido------------------------------- AMV
    const getlogo = document.getElementById(cat+'id'+val);
    const setlogo = document.getElementById('logo');
    
    const dirlog = "/logos/" //internet
    setlogo.src = dirlog+getlogo.innerHTML+".png"

//------------------ Productora ------------------------------------ AMV
    const getprod = document.getElementById(cat+'prod'+val);
    const setprod = document.getElementById('prod');
    setprod.src = dirlog+getprod.innerHTML+".png"

}


function iniciar() { 
   var boton=document.getElementById('trailer'); 
   boton.addEventListener('click', presionar, false); 
} 
function presionar() { 
   var video=document.getElementById('videoPrin'); 
   //video.play(); 
  
    if(!video.paused && !video.ended)   { 
        video.pause(); 
        video.innerHTML='Ver Trailer';   
    } 
    else 
    { 
        video.play(); 
        video.innerHTML= "Pausa";   
    } 
} 
var video = document.getElementById('videoPrin');
video.addEventListener('canplay', function(){
    setTimeout(function() {
        video.play();
    }, 10000);
});
//iniciar trailer automaticamente funciona bien desactivado
    window.addEventListener('load', iniciar, false); 

//-------------------Función Ver Contenido------------------

//function ver(){
    //window.location="vercontenido.php";
   // const getvercont = document.getElementById('con').value;
    //const setvercont = document.getElementById('repcont');

    //setvercont.src = "assets/video/"+getvercont+".mp4";
    //setvercont.src = "assets/video/mulan.mp4";
    //location.href=""
    //document.location("")
    //alert(getvercont.value);
//}

//-----FUNCION SCRIPT PARA CAMBIAR LA IMAGEN PRINCIPAL CON CLICK--

    function $(element_id)
{
    return document.getElementById(element_id);
}
    function setSrc(element_id, src)
{
    var element = $(element_id);
    element.src = src;
}
// ? ------ Hover --------
peliculas.forEach((pelicula) => {
    pelicula.addEventListener('mouseenter', (e) => {
        const elemento = e.currentTarget;
        setTimeout(() => {
            peliculas.forEach(pelicula => pelicula.classList.remove('hover'));
            elemento.classList.add('hover');
        }, 300);
        });
    });
    //--------------pantalla completa trailer----------------------
    function getFullscreen(element){
        if(element.requestFullscreen) {
            element.requestFullscreen();
          } else if(element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
          } else if(element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
          } else if(element.msRequestFullscreen) {
            element.msRequestFullscreen();
          }
      }
      document.getElementById("fullscreen").addEventListener("click", function(e){
        getFullscreen(document.getElementById("videoPrin"));
      },false);

//***********pictury ad pictury */
//const videoContainer = document.querySelector('#contenedor3');

//function onScroll() {
//  if (window.scrollY > videoContainer.offsetTop) {
//    videoContainer.classList.add('active');
//  } else {
//    videoContainer.classList.remove('active');
//  }
//}

//window.addEventListener('scroll', onScroll);
//  }


