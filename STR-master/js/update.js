const serv = document.getElementById(serv).ariaValueMax;

const setser = document.getElementById(serv);

//serv.

const getcon = document.getElementById(cat+'id'+val);
const getdirSD = document.getElementById(cat+'dirsd'+val);
const setcon = document.getElementById('con');
const dircon1 = "vercontenido.php?cont="+getdirSD.innerHTML+"";
setcon.href = dircon1+getcon.innerHTML;