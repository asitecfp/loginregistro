
document.getElementById("btn__iniciar-sesion").addEventListener("click", IniciarSesion);
document.getElementById("btn__registro").addEventListener("click", registro);

window.addEventListener("resize", AnchoPagina);
//--------- ---------------------------------------------------service worker pwa------------
//Configurar SW
let swLocation = "sw.js";
// "/beerjs/sw.js";

if (navigator.serviceWorker) {
  if (window.location.href.includes("localhost")) swLocation = "/home/sw.js"; //Varia según el host
  navigator.serviceWorker.register(swLocation);
}
//Declaración de variables
var contenedor_login_registro = document.querySelector(".contenedor__login-registro");
var formulario_login = document.querySelector(".formulario__login");
var formulario_registro = document.querySelector(".formulario__registro");
//01 //var background_login_registro = document.querySelector("body");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_registro = document.querySelector(".caja__trasera-registro");

function AnchoPagina(){

    if(window.innerWidth > 850){
        caja_trasera_login.style.display = "block";
        caja_trasera_registro.style.display = "block";
        
    }else{
    
    }
}

//AnchoPagina();

function IniciarSesion(){

    if(window.innerwidth > 850){
        formulario_registro.style.display = "none";
        contenedor_login_registro.style.left = "10px";
        formulario_login.style.display = "block";
        caja_trasera_registro.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
       
    }else{
        formulario_registro.style.display = "none";
        contenedor_login_registro.style.left = "0px";
        formulario_login.style.display = "block";
        caja_trasera_registro.style.display = "block";
        caja_trasera_login.style.display = "block";
        caja_trasera_registro.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    }
  
}
function registro(){    

    if(window.innerWidth > 850){
        formulario_registro.style.display = "block";
        contenedor_login_registro.style.left = "410px";
        formulario_login.style.display = "none";
        caja_trasera_registro.style.opacity = "0";
        caja_trasera_login.style.opacity ="1";
    }else{
        //01 //background_login_registro.style.backgroundImage = "none"
        
        formulario_registro.style.display = "block";
        contenedor_login_registro.style.left = "0px";
        formulario_login.style.display = "none";
        caja_trasera_registro.style.display = "none";
        caja_trasera_login.style.display ="block";
        caja_trasera_login.style.opacity ="1";

    }
 
}

