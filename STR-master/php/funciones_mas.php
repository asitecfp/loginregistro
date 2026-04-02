<?php

error_reporting();
include 'cargar_datos_in.php';

/*Declaraciones*/
$free_space_mov ="";
$total_space_mov ="";
$usu=@$_SESSION['usuario'];
$cont=0;
$fechaactual= date("Y")."-".date("m")."-".date("d");
$objFecha = new DateTime($fechaactual, new DateTimeZone('America/Caracas'));
$dia= $objFecha->format('d');
$mes= $objFecha->format('m');
$anno= $objFecha->format('Y');
$fechacompar= ".$anno.'-'.$mes.'-'.$dia.";

/*Funciones*/
function obt_free_space_disk($uni){
	
    global $free_space_mov;
    $free_space_mov = round(disk_free_space("$uni") / 1024 / 1024 / 1024);
	
}

function obt_total_space_disk($uni){
	
    global $total_space_mov;
    $total_space_mov = round(disk_total_space("$uni") / 1024 / 1024 / 1024);
	
}

function ver_space_disk($uni_t, $uni_c){

    $space_tra = round(disk_free_space("$uni_t") / 1024 / 1024 / 1024);
    $space_mov = round(disk_free_space("$uni_c") / 1024 / 1024 / 1024);
    if($space_mov <= 20 or $space_tra <= 4){
        echo '
            <script>
                alert("El disco de almacenamiento ha llegado a su límite, contacte a su administrador. \n Peliculas ('.$space_mov.' GB disponibles '.$uni_c.') \n Trailer ('.$space_tra.' GB disponibles '.$uni_t.')");
                window.location = "/home/STR-master/php/almacen.php";
            </script>
            ';

        return false; //array($space_tra, $space_mov);
    } 
    return true;
    
}
/**
* @param string $name Nombre del proceso que se verificara puede contener la extencón o no
*/

function verify_run_app($name){
    
    $full_name = (strpos(strtolower($name), '.exe') !== false) ? $name : $name.'.exe'; //Asigno a esta variable el nombre completo del proceso en caso de que no hayan pasado el $name con el .exe
    $proc = @popen('tasklist.exe /FI "IMAGENAME eq '.$full_name.'"',"r"); //Listo las tareas en ejecución con el filtro donde el nombre de la imagen coincida con el nombre completo
    $content = ''; //Inicializo la variable que contendra la salida de la ejecución de el proceso tasklist
        
    while(!feof($proc)){ //While no llegue al fin del archivo voy almacenando la salida del proceso
        $content .= fread($proc,1024);  
    }
        
    pclose($proc); //Cierro el pipe
    return (strpos($content, 'no hay tareas') === false); //Devuelvo true si el texto que devolvio no contiene el texto 'no hay tareas'
}

function convert($ideg, $direcDestinC, $direcDestinT) {
        
    //     $input_file_size = $input_file['size']; // Obtiene el tamaño del archivo de video
    //     $input_file_type = $input_file['type']; // Obtiene el tipo de archivo de video

    $input_file_name = $ideg .".mp4"; // Obtiene el nombre del archivo de video
      
    //**Contenido SD */
    $output_dir_c = $direcDestinC ."sd/";
    $defiorig_c = $direcDestinC .$input_file_name;
    $defidest_c = $output_dir_c .$input_file_name;

    //**Contenido HD */
    $output_dir_chd = $direcDestinC ."hd/";
    $defidest_chd = $output_dir_chd .$input_file_name;

    //**Trailer SD */
    $output_dir_t = $direcDestinT ."sd/";
    $defiorig_t = $direcDestinT .$input_file_name;
    $defidest_t = $output_dir_t .$input_file_name;
    //**Trailer HD */
    $output_dir_thd = $direcDestinT ."hd/";
    $defidest_thd = $output_dir_thd .$input_file_name;

    //$output_dir_t = $letarray[3] .$almarray[3] ."sd";

    
    // Crea un archivo txt con el contenido "Hello world!"
    //Con un solo nucleo procesador//file_put_contents('prueba_convert_aut'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_t.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 298k -c:a aac -movflags faststart -threads 1 '.$defidest_t.'' . PHP_EOL, FILE_APPEND);
    file_put_contents('prueba_convert_aut'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_t.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 650k -c:a aac -movflags faststart '.$defidest_t.'' . PHP_EOL, FILE_APPEND);
    file_put_contents('prueba_convert_aut'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_t.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=1280:720 -b:v 1500k -c:a aac -movflags faststart '.$defidest_thd.'' . PHP_EOL, FILE_APPEND);
  
    file_put_contents('prueba_convert_aut'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_c.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 650k -c:a aac -movflags faststart '.$defidest_c.'' . PHP_EOL, FILE_APPEND);
    file_put_contents('prueba_convert_aut'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_c.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=1280:720 -b:v 1500k -c:a aac -movflags faststart '.$defidest_chd.'' . PHP_EOL, FILE_APPEND);
    
    rename('prueba_convert_aut'.$ideg.'.txt', 'prueba_convert_aut'.$ideg.'.bat');
    exec('cmd /c prueba_convert_aut'.$ideg.'.bat');// Ejecuta consola y la muestra primer plano
    //exec('start /B prueba_convert_aut.bat');// Ejecuta consola oculta segundo plano
    //exec('start /B "' . $ruta2 . '"');
      
}
function convert_ser($ideg, $direcDestinCont) {
        
    $input_file_name = $ideg .".mp4"; // Obtiene el nombre del archivo de video
         
    $output_dir_csd = $direcDestinCont ."sd/";
    $output_dir_chd = $direcDestinCont ."hd/";
    $defiorig_csd = $direcDestinCont .$input_file_name;
    $defidest_csd = $output_dir_csd .$input_file_name;

    $defiorig_chd = $direcDestinCont .$input_file_name;
    $defidest_chd = $output_dir_chd .$input_file_name;
    
    // Crea un archivo txt con el contenido "Hello world!"

    file_put_contents('convert_aut_cap'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_csd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 598k -c:a aac -movflags faststart '.$defidest_csd.'' . PHP_EOL, FILE_APPEND);
    file_put_contents('convert_aut_cap'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_chd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=1280:720 -b:v 1500k -c:a aac -movflags faststart '.$defidest_chd.'' . PHP_EOL, FILE_APPEND);
    rename('convert_aut_cap'.$ideg.'.txt', 'convert_aut_cap'.$ideg.'.bat');
    exec('cmd /c convert_aut_cap'.$ideg.'.bat');// Ejecuta consola y la muestra primer plano

    //file_put_contents('eject_conv_ser'.$ideg.'.txt', 'cmd /c "C:\wamp64\www\loginregistro\str-master\php\convert_aut_ser'.$ideg.'.bat" ');
   // rename('eject_conv_ser'.$ideg.'.txt', 'eject_conv_ser'.$ideg.'.bat');
//exec('cmd /c eject_conv_ser'.$ideg.'.bat');
      
}
Function verif_session_all(){

$allSessions = []; 
$sessionNames = scandir(session_save_path());
foreach($sessionNames as $sessionName) {
    $sessionName = str_replace("sess_","",$sessionName);
    if(strpos($sessionName,".") === false) { //This skips temp files that aren't sessions 
            
        $cont++;
        session_id($sessionName);
        
        if(session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
       
            echo '<h1>Cont:'.$cont.'';
            echo '<h1>Sesion id: '.$sessionName.'</h1>';
        
            if (isset($_SESSION['usuario'])) {
            
                $allSessions[$sessionName] = $_SESSION['usuario'];
                
                echo '<h1>Correo: '.$_SESSION['usuario'].'</h1>';
                
                session_abort();

            }else{
                echo'En espera de autenticación...';

            }
        }
        echo'--------------------------------------';
    }
}	 

// $allSessions = [];
// $sessionNames = scandir(session_save_path());

// foreach($sessionNames as $sessionName) {
//     $sessionName = str_replace("sess_","",$sessionName);
//     if(strpos($sessionName,".") === false) { //This skips temp files that aren't sessions
//         session_id($sessionName);
//         session_start();
//         $allSessions[$sessionName] = $_SESSION;
//         session_abort();
//     }
// }
// print_r($allSessions);
}
function ver_horario(){

}

?>