             

const peliculas = document.querySelectorAll('.pelicula');
const trailer = document.getElementById('trailer');

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
    //fila.scrollLeft -= fila.offsetwidth;
    fila.scrollLeft -= 400;
});
}

//------------------- paginacion -----------------
const numeroPaginas = Math.ceil(peliculas.length / 5);
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
}
calidad = "";
//----------------------------------------------------------
//test_speed(); //--Obneter desde asset/js/testspeed.js
// ------- ------ Event Listener para las series ------- -------- AMV
function si(val, cat, serv){
    
    const getcon = document.getElementById(cat+'id'+val);
    const getcap = document.getElementById(cat+'ca'+val);
    const gettem = document.getElementById(cat+'te'+val);
    const setcon = document.getElementById('con');
    const url = "vercontenido.php?mae="+getcon.innerHTML+"&con="+getcap.innerHTML+"&tem="+gettem.innerHTML;
    setcon.value = getcon.innerHTML;
    setcon.href = url;

    if (calidad == "SD"){
//------------------ Servidor, disco y Contenido ------------------------------------- AMV
    const getcon = document.getElementById(cat+'id'+val);
    const getcap = document.getElementById(cat+'ca'+val);
    const gettem = document.getElementById(cat+'te'+val);
    const getserv = document.getElementById(cat+'ser'+val);
    const getdir = document.getElementById(cat+'dirsd'+val);
    const setcon = document.getElementById('con');

    //const dircon1 = "vercontenido.php?cont="+getdir.innerHTML;  //internet
    const url = "vercontenido.php?mae="+getcon.innerHTML+"&con="+getcap.innerHTML+"&tem="+gettem.innerHTML;
    setcon.value = getcon.innerHTML;
    //setcon.href = dircon1+getcon.innerHTML;
    setcon.href = url;

    }
    if (calidad == "HD"){
        const getcon = document.getElementById(cat+'id'+val);
        const getserv = document.getElementById(cat+'ser'+val);
        const getdir = document.getElementById(cat+'dirhd'+val);
        const setcon = document.getElementById('con');
    
        const dircon1 = "vercontenido.php?cont="+getdir.innerHTML;  //internet
        
        setcon.value = getcon.innerHTML;
        setcon.href = dircon1+getcon.innerHTML;
    }  
    if (calidad == "FHD"){
        const getcon = document.getElementById(cat+'id'+val);
        const getserv = document.getElementById(cat+'ser'+val);
        const getdir = document.getElementById(cat+'dirfhd'+val);
        const setcon = document.getElementById('con');
    
        const dircon1 = "vercontenido.php?cont="+getdir.innerHTML;  //internet
        
        setcon.value = getcon.innerHTML;
        setcon.href = dircon1+getcon.innerHTML;
    }
    if (calidad == "4K"){
        const getcon = document.getElementById(cat+'id'+val);
        const getserv = document.getElementById(cat+'ser'+val);
        const getdir = document.getElementById(cat+'dirfhd'+val);
        const setcon = document.getElementById('con');
    
        const dircon1 = "vercontenido.php?cont="+getdir.innerHTML;  //internet
        
        setcon.value = getcon.innerHTML;
        setcon.href = dircon1+getcon.innerHTML;
    }
    if (calidad == "8K"){
        const getcon = document.getElementById(cat+'id'+val);
        const getserv = document.getElementById(cat+'ser'+val);
        const getdir = document.getElementById(cat+'dirfhd'+val);
        const setcon = document.getElementById('con');
    
        const dircon1 = "vercontenido.php?cont="+getdir.innerHTML;  //internet
        
        setcon.value = getcon.innerHTML;
        setcon.href = dircon1+getcon.innerHTML;
    }
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
    
