//------------------- Comprobar velocidad de conexion -------------------------------AMV
async function test_speed(){
    //JUST AN EXAMPLE, PLEASE USE YOUR OWN PICTURE!
    var imageAddr = "https://upload.wikimedia.org/wikipedia/commons/2/2d/Snake_River_%285mb%29.jpg"; 
    var downloadSize = 4995374; //bytes
    var duration, bitsLoaded, speedBps, speedKbps, speedMbps;
    //var calidad;

    InitiateSpeedDetection();

    function InitiateSpeedDetection() {
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
            //calidad = "SD";
            calidad = "FHD";
            //alert("Revisa su conexion a internet");
            $('#onload').fadeOut();
            $('body').removeClass('hidden');
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
               // alert("Velocidad Inferior a los 3MB Calidad SD!")
            }
            if (speedMbps >= 4 && speedMbps <= 15){
                calidad = "HD";
                //alert("Velocidad entre los 4 y 10MB Calidad HD!")
            }
            if (speedMbps >= 16 && speedMbps <= 60){
                calidad = "FHD";
              //  alert("Velocidad entre los 16 y 60MB Calidad FHD!")
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