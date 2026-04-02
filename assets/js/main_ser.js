             

const peliculas = document.querySelectorAll('.pelicula');
const trailer = document.getElementById('trailer');
var calidad

function bt(bot){
    const fila = document.querySelector('.contenedor-carrousel'+bot);
    const flechaIzquierda = document.getElementById(bot+'flecha-izquierda');
    const flechaDerecha = document.getElementById(bot+'flecha-derecha');
    // -------  --------Event Listener para la flecha derecha. -------  -----
    flechaDerecha.addEventListener('click', () => {
        fila.scrollLeft += 400;   
 
    });
    // -------  --------Event Listener para la flecha izquierda. -------  ----
    flechaIzquierda.addEventListener('click', () => {
        //fila.scrollLeft -= fila.offsetwidth;
        fila.scrollLeft -= 400;
        
    });
}

//------------------- paginacion -----------------
/*const numeroPaginas = Math.ceil(peliculas.length / 5);

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

calidad = "FHD";

//test_speed(); //--Obneter desde asset/js/testspeed.js

// ------- ------ Event Listener para las series ------- -------- AMV
function si(val, cat, serv){
    //------------------ Servidor, disco y Contenido ------------------------------------- AMV
    const getserv = document.getElementById(cat+'ser'+val);    

    const getcon = document.getElementById(cat+'id'+val);
    const setcon = document.getElementById('con');
       
    setcon.value = "seriesdet.php?cont="+getcon.innerHTML;
    setcon.href = "seriesdet.php?cont="+getcon.innerHTML;
    
//------------------ Sinopsis -------------------------------------- AMV
    const getsinopsis = document.getElementById(cat+'sinop'+val);
    const setsinopsis = document.getElementById('sinopsis');
    setsinopsis.innerHTML = getsinopsis.innerHTML;
//------------------ Img. Principal -------------------------------- AMV

    const setimgprin = document.getElementById('imgprin');
    
    const dirimg = "/prin/" //internet

//------------------ Trailer --------------------------------------- AMV--OK
    const gettra = document.getElementById(cat+'trasd'+val);
    const setvideo = document.getElementById('videoPrin');

    const dirvid = gettra.innerHTML+""; //internet
    setvideo.poster = dirimg+getcon.innerHTML+".webp"; // getcon lin. 50
    setvideo.src = dirvid+getcon.innerHTML+".mp4"; // getcon lin. 50
//------------------ Logo y Contenido------------------------------- AMV
    const getlogo = document.getElementById(cat+'id'+val);
    const setlogo = document.getElementById('logo');
    

    const dirlog = "/logos/" //internet
    setlogo.src = dirlog+getlogo.innerHTML+".png"

//------------------ Productora ------------------------------------ AMV
    const getprod = document.getElementById(cat+'prod'+val);
    const setprod = document.getElementById('prod');
    setprod.src = dirlog+getprod.innerHTML+".png"
///////////////////////////BLOQUE DE CODIGO ANTIGU UNA SOLA CALIDADA SERIES ///////////////////////    
// //------------------ Servidor, disco y Contenido ------------------------------------- AMV//////
//     const getserv = document.getElementById(cat+'ser'+val);                              ///////
                                                                                            ///////
//     const getcon = document.getElementById(cat+'id'+val);                                ///////
//     const setcon = document.getElementById('con');                                       ///////

//     setcon.value = "seriesdet.php?cont="+getcon.innerHTML;
//     setcon.href = "seriesdet.php?cont="+getcon.innerHTML;
    
// //------------------ Sinopsis -------------------------------------- AMV
//     const getsinopsis = document.getElementById(cat+'sinop'+val);
//     const setsinopsis = document.getElementById('sinopsis');
//     setsinopsis.innerHTML = getsinopsis.innerHTML;
// //------------------ Img. Principal -------------------------------- AMV

//     const setimgprin = document.getElementById('imgprin');
    
//     const dirimg = "/prin/" //internet

// //------------------ Trailer --------------------------------------- AMV--OK
//     const gettra = document.getElementById(cat+'trasd'+val);
//     const setvideo = document.getElementById('videoPrin');

//     const dirvid = gettra.innerHTML+""; //internet
//     setvideo.poster = dirimg+getcon.innerHTML+".webp"; // getcon lin. 50
//     setvideo.src = dirvid+getcon.innerHTML+".mp4"; // getcon lin. 50
// //------------------ Logo y Contenido------------------------------- AMV
//     const getlogo = document.getElementById(cat+'id'+val);
//     const setlogo = document.getElementById('logo');
    

//     const dirlog = "/logos/" //internet
//     setlogo.src = dirlog+getlogo.innerHTML+".png"

// //------------------ Productora ------------------------------------ AMV
//     const getprod = document.getElementById(cat+'prod'+val);                             ////////
//     const setprod = document.getElementById('prod');                                     ////////
//     setprod.src = dirlog+getprod.innerHTML+".png"                                        ////////
////////////////////////////////////////////////////////////////////////////////////////////////////
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
window.addEventListener('load', iniciar, false); 

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
//  }
