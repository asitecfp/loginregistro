calidad = "";
function test_speed(){
   //JUST AN EXAMPLE, PLEASE USE YOUR OWN PICTURE!
   var imageAddr = "https://upload.wikimedia.org/wikipedia/commons/2/2d/Snake_River_%285mb%29.jpg"; 
   var downloadSize = 4995374; //bytes
   var duration, bitsLoaded, speedBps, speedKbps, speedMbps;
   //var calidad;

InitiateSpeedDetection();

   async function InitiateSpeedDetection() {
       //alert("Loading the image, please wait...");
       window.setTimeout(MeasureConnectionSpeed, 1);
   };    

   if (window.addEventListener) {
       window.addEventListener('load', InitiateSpeedDetection, false);
   } else if (window.attachEvent) {
       window.attachEvent('onload', InitiateSpeedDetection);
   }

   function MeasureConnectionSpeed() {
       var startTime, endTime;
       var download = new Image();
       download.onload = function () {
           endTime = (new Date()).getTime();
           showResults();
       }
       
       download.onerror = function (err, msg) {
           calidad = "SD";
           alert("Revisa su conexion a internet");
       }
       
       startTime = (new Date()).getTime();
       var cacheBuster = "?nnn=" + startTime;
       download.src = imageAddr + cacheBuster;
       
       function showResults() {
           duration = (endTime - startTime) / 1000;
           bitsLoaded = downloadSize * 8;
           speedBps = (bitsLoaded / duration).toFixed(2);
           speedKbps = (speedBps / 1024).toFixed(2);
           speedMbps = (speedKbps / 1024).toFixed(2);
           //alert(["Your connection speed is:",duration,speedBps + " bps",speedKbps + " kbps",speedMbps + " Mbps"]);
           if (speedMbps <= 3){
               calidad = "SD";
               //alert("Velocidad Inferior a los 3MB Calidad SD!")
           }
           if (speedMbps >= 4 && speedMbps <= 15){
               calidad = "HD";
               //alert("Velocidad entre los 4 y 10MB Calidad HD!")
           }
           if (speedMbps >= 16 && speedMbps <= 60){
               calidad = "FHD";
               //alert("Velocidad entre los 16 y 60MB Calidad FHD!")
           }
           if (calidad == "SD"){
            const getid = document.getElementById('ID');
            const getcon = document.getElementById('SD');
            const setcon = document.getElementById('repcont');
            const url = getcon.innerHTML+getid.innerHTML+'.mp4';
            
            setcon.src = url;
            
          }
          if (calidad == "HD"){
            const getid = document.getElementById('ID');
            const getcon = document.getElementById('HD');
            const setcon = document.getElementById('repcont');
            const url = getcon.innerHTML+getid.innerHTML+'.mp4';
            
            setcon.src = url;
            
          }  
          if (calidad == "FHD"){
            const getid = document.getElementById('ID');
            const getcon = document.getElementById('FHD');
            const setcon = document.getElementById('repcont');
            const url = getcon.innerHTML+getid.innerHTML+'.mp4';
            
            setcon.src = url;
            
          }
           //if (speedMbps >= 61 && speedMbps <= 100){
           //    calidad = "4K";
               //alert("Velocidad entre los 61 y 100MB Calidad 4K!")
           //}
           //if (speedMbps > 101){
           //    calidad = "8K";
               //alert("Velocidad superior a los 101MB Calidad 8K!")
           //}
       }
     
   }
}
//test_speed();


var v = document.getElementById("repcont");
v.addEventListener("loadeddata",function(ev){
    document.getElementById("tiempototal").innerHTML = v.duration;
    document.getElementById("tiempoactual").innerHTML = v.duration - v.currentTime;
    const currentTime = document.getElementById("tiempototal").innerHTML;
    const duration = document.getElementById("tiempoactual").innerHTML;

    const percentageComplete = (currentTime / duration) * 100;
    document.getElementById("porcentaje").innerHTML = percentageComplete;

},true);


// Obtenemos la duración del video
//const duration = document.getElementById("my-video").duration;

// Creamos un contador
let progress = 0;

// Creamos un evento para detectar los cambios en el progreso del video
document.getElementById("repcont").addEventListener("timeupdate", () => {
   // Actualizamos el contador
   progress = document.getElementById("repcont").currentTime / v.duration;

   // Mostramos el porcentaje
   porcent = document.getElementById("progress-bar").innerHTML = Math.round(progress * 100) + "%";

   const buttonId = "my-button";
   // Verificamos si el botón existe
   const body = document.querySelector("body");
   const button = body.querySelector("#" + buttonId);
   const capsig = document.getElementById("capsig").innerHTML;

//    if (porcent >= "98%") {
//    // El video está por terminar


//       // Si el botón no se ha creado, lo creamos
//       if (!button) {
//          // Creamos el botón
//          const button = document.createElement("button");
//          button.textContent = "Ver siguiente video";
//          button.className = "botsig";
//          button.id = buttonId;
//          button.onclick = nextmov(vid);
//          button.addEventListener("click", () => {
//          // Hacemos algo
//          //video.appendChild(button);
//          alert("asdfasfdf");
//          });
         
//          body.appendChild(button);


//          }
//    }
// });

//       // Creamos un evento para detectar el final del video
//       v.addEventListener("ended", () => {
//       // El video ha terminado
      

//        // Creamos el botón
//        const button = document.createElement("button");
//        button.textContent = "Ver siguiente video";
//        button.className = "botsig";
//        //button.onclick = nextmov(vid);
//        button.addEventListener("click", () => {
//        // Hacemos algo
//        //video.appendChild(button);
//        //alert("booton");
//        });

//        const body = document.querySelector("body");
//          body.appendChild(button);
 });

function nextmov(vid){
   alert("video siguiente se reproducira");
}
v.addEventListener("ended", () => {
   let b = document.getElementById("botsig");
   b.removeAttribute("hidden");
});

function recargarPagina() {
   // Obtener los valores post del capítulo
   let capitulo = document.getElementById("capsig").innerHTML;
   let temporada = document.getElementById("tem").innerHTML;
   let maestro = document.getElementById("mae").innerHTML;
   // Crear la URL de la nueva petición
   
   let url = "vercontenido.php?mae=" + maestro + "&con=" + capitulo + "&tem=" + temporada;
   
   // Enviar la petición GET
   window.location.href = url;
 }
document.addEventListener("DOMContentLoaded", () => {
  // 1. Captura de elementos
  const contenedor = document.getElementById('contenedor');
  const controles = document.getElementById('controles');
  const video = document.getElementById('repcont');
  
  const btnPlay = document.getElementById('btnPlay');
  const btnMax = document.getElementById('btnMax');
  const btnAtras = document.getElementById('btnAtras');

  let temporizador;

  // --- LÓGICA DE VISIBILIDAD ---
  function mostrarControles() {
    controles.classList.add('mostrar-controles');
    clearTimeout(temporizador);
    
    // Si el video está andando, se ocultan tras 2 segundos de quietud
    if (!video.paused) {
      temporizador = setTimeout(() => {
        controles.classList.remove('mostrar-controles');
      }, 2000);
    }
  }

  // Eventos para mostrar/ocultar
  contenedor.addEventListener('mousemove', mostrarControles);
  contenedor.addEventListener('click', mostrarControles);
  
  // Si pausamos el video, los controles se quedan fijos
  video.addEventListener('pause', () => {
    clearTimeout(temporizador);
    controles.classList.add('mostrar-controles');
  });

  // --- LÓGICA DE LOS BOTONES ---

  // Botón Play/Pausa
  btnPlay.addEventListener('click', (e) => {
    e.stopPropagation(); // Evita que el clic se pase al contenedor
    if (video.paused) {
      video.play();
    } else {
      video.pause();
    }
  });

  // Botón Maximizar
  btnMax.addEventListener('click', (e) => {
    e.stopPropagation();
  // CÓDIGO NUEVO (REEMPLAZAR)
        if (contenedor.requestFullscreen) {
            contenedor.requestFullscreen();
        } else if (contenedor.webkitRequestFullscreen) {
            contenedor.webkitRequestFullscreen();
        }
  });

  // Botón Atrás
  btnAtras.addEventListener('click', (e) => {
    e.stopPropagation();
    window.history.back();
  });
});
 // Agregar un evento al botón "videosiguiente"
 document.querySelector("#botsig").addEventListener("click", recargarPagina);
