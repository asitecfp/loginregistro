<?php
//echo exec("C:\ffmpeg\bin\ffmpeg.exe");
error_reporting(1);
//echo shell_exec("c:\ffmpeg\bin\ffmpeg -i 22.mp4 -c:v libsvtav1 -crf 35 -vf scale=854:480 -b:v 0 -c:a libopus -movflags faststart out2.mp4 2>&1");
//echo exec("c:\ffmpeg\bin\ffmpeg -i 22.mp4 -c:v libsvtav1 -crf 35 -vf scale=854:480 -b:v 0 -c:a libopus -movflags faststart out2.mp4 2>&1");
// $srcFile = "22.mp4";
// $destFile = "23.avi";
// //$output = "prueba.mp4";
// //exec("/usr/bin/ffmpeg -i $srcFile $destFile 2>&1");
// //var_dump($output);
// //exec("/usr/bin/ffmpeg -i $srcFile $destFile 2>&1", $output);
// //var_dump($output);

// // Crear un archivo de texto
// $output = exec("echo 'Hola, mundo!' > archivo.txt", $error);
// var_dump($error);
// // Comprobar si el archivo se creó correctamente
// if ($output === 0) {
//     echo "El archivo se creó correctamente.";
// } else {
//     echo "No se pudo crear el archivo.";
// }

//----------------CONVERTIR PELICULAS LLAMANDO A ARCHIVO .BAT YA CREADO----------------------------------------------------------------
// $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");                                                    //
// if ($mysqli->connect_errno) {
//     echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }

// $estatus = 'REV';
// $idecont = 501;

// $sql = "SELECT * FROM maecon04 WHERE idecon04>=501 AND idecon04<=501 AND status04='rev' AND tipcon04='Pelicula'";
// $resultado = $mysqli->query($sql);

// if ($resultado->num_rows > 0) {

//     while ($fila = $resultado->fetch_assoc()) {

//         $contador = $fila['idecon04'];
    
//         // $nombre_archivo = "archivo" . $contador . ".bat";
//         ini_set('max_execution_time', 0);
//         exec('cmd /c prueba_convert_aut'.$contador.'.bat');// Ejecuta consola y la muestra primer plano
//         echo 'Contenido Convertido '.$contador.'';
//         $contador++;
//     }
// } else {
//     echo "No se encontraron registros.";
// }
//---------------------------------------------------------------------------------------------------------------------------------

//---------------------------------------------------------------------------------------------------------------------------------
//----------------CONVERTIR PELICULA SIN TRAILER SIN LLAMAR A ARCHIVO .BAT, USANDO PARAMETROS ESPECIFICOS----------------------------------------

if (isset($_POST['convertir']) && isset($_POST['videos']))  {
    $videos_seleccionados = $_POST['videos'];
   
    foreach ($videos_seleccionados as $video_id) {
        $i = $video_id;
        $input_file_name = $i .".mp4"; // Obtiene el nombre del archivo de video

        $direcDestinCont = "m:/cont/mov/";// Contendio
            $direcDestinTrai = "i:/trailer/mov/";// Trailer

        $output_dir_csd = $direcDestinCont ."sd/";// Contenido sd
        $output_dir_chd = $direcDestinCont ."hd/";// Contenido hd
            $output_dir_tsd = $direcDestinTrai ."sd/";// Trailer sd
            $output_dir_thd = $direcDestinTrai ."hd/";// Trailer hd
     
        $defiorig_csd = $direcDestinCont .$input_file_name;
        $defidest_csd = $output_dir_csd .$input_file_name;
            $defiorig_tsd = $direcDestinTrai .$input_file_name;// Direccion Origen trailer sd
            $defidest_tsd = $output_dir_tsd .$input_file_name;// Direccion Destino trailer sd

        $defiorig_chd = $direcDestinCont .$input_file_name;
        $defidest_chd = $output_dir_chd .$input_file_name;
            $defiorig_thd = $direcDestinTrai .$input_file_name;// Direccion Origen trailer hd
            $defidest_thd = $output_dir_thd .$input_file_name;// Direccion Origen trailer hd

    file_put_contents('convert'.$i.'.txt', 'ffmpeg.exe -i '.$defiorig_csd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 650k -c:a aac -movflags faststart '.$defidest_csd.'' . PHP_EOL, FILE_APPEND);
    file_put_contents('convert'.$i.'.txt', 'ffmpeg.exe -i '.$defiorig_chd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=1280:720 -b:v 1500k -c:a aac -movflags faststart '.$defidest_chd.'' . PHP_EOL, FILE_APPEND);
       // file_put_contents('convert'.$i.'.txt', 'ffmpeg.exe -i '.$defiorig_tsd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 650k -c:a aac -movflags faststart '.$defidest_tsd.'' . PHP_EOL, FILE_APPEND);
       // file_put_contents('convert'.$i.'.txt', 'ffmpeg.exe -i '.$defiorig_thd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=1280:720 -b:v 1500k -c:a aac -movflags faststart '.$defidest_thd.'' . PHP_EOL, FILE_APPEND);
    rename('convert'.$i.'.txt', 'convert'.$i.'.bat');
    exec('cmd /c convert'.$i.'.bat');// Ejecuta consola y la muestra primer plano 
    //echo 'Contenido Convertido '.$i.'';
    }
} else {
    echo "No se seleccionaron videos para convertir.";
}
    //----------------CONVERTIR SERIES SIN LLAMAR A ARCHIVO .BAT, USANDO PARAMETROS ESPECIFICOS----------------------------------------


// $limite = 383;

// for ($i = 382; $i < $limite; $i++) {

//     $input_file_name = $i .".mp4"; // Obtiene el nombre del archivo de video

//     $direcDestinCont = "l:/cont/series/";
     
//     $output_dir_csd = $direcDestinCont ."sd/";
//     $output_dir_chd = $direcDestinCont ."hd/";
//     $defiorig_csd = $direcDestinCont .$input_file_name;
//     $defidest_csd = $output_dir_csd .$input_file_name;
    
//     $defiorig_chd = $direcDestinCont .$input_file_name;
//     $defidest_chd = $output_dir_chd .$input_file_name;

// file_put_contents('convert_cap_man'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_csd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 450k -c:a aac -movflags faststart '.$defidest_csd.'' . PHP_EOL, FILE_APPEND);
// file_put_contents('convert_cap_man'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_chd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=1280:720 -b:v 1500k -c:a aac -movflags faststart '.$defidest_chd.'' . PHP_EOL, FILE_APPEND);
// rename('convert_cap_man'.$ideg.'.txt', 'convert_cap_man'.$ideg.'.bat');
// exec('cmd /c convert_cap_man'.$ideg.'.bat');// Ejecuta consola y la muestra primer plano 
// }
//----------------CONVERTIR PELICULAS LLAMANDO A BASE DE DATOS----------------------------------------------------------------
//  $mysqli = new mysqli("localhost", "antonio", "*Lm2638220$", "bnucleds");                                                    //
//  if ($mysqli->connect_errno) {
//      echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
//  }

//  $estatus = 'REV';
//  $idecont = 789;

//  //$sql = "SELECT * FROM maecap18 WHERE idcapi18>=432 AND idcapi18<=482 AND status18='rev'";
//  $sql = "SELECT * FROM maecap18 WHERE idcapi18>=432 AND idcapi18<=482";
//  $resultado = $mysqli->query($sql);

//  if ($resultado->num_rows > 0) {

//      while ($fila = $resultado->fetch_assoc()) {

//          $ideg = $fila['idcapi18'];
        
//          $input_file_name = $ideg .".mp4"; // Obtiene el nombre del archivo de video

//          //$direcDestinCont = "l:/cont/series/";
//          $direcDestinCont = "l:/cont/series/fhd/";

//          //$output_dir_csd = $direcDestinCont ."sd/";
//          $output_dir_csd = "l:/cont/series/" ."sd/";

//          $output_dir_chd = $direcDestinCont ."hd/";
//          $defiorig_csd = $direcDestinCont .$input_file_name;
//          $defidest_csd = $output_dir_csd .$input_file_name;
         
//          $defiorig_chd = $direcDestinCont .$input_file_name;
//          $defidest_chd = $output_dir_chd .$input_file_name;
        
//          ini_set('max_execution_time', 0);
//          file_put_contents('convert_cap_man'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_csd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 450k -c:a aac -movflags faststart '.$defidest_csd.'' . PHP_EOL, FILE_APPEND);
//         // file_put_contents('convert_cap_man'.$ideg.'.txt', 'ffmpeg.exe -i '.$defiorig_chd.' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=1280:720 -b:v 1500k -c:a aac -movflags faststart '.$defidest_chd.'' . PHP_EOL, FILE_APPEND);
//          rename('convert_cap_man'.$ideg.'.txt', 'convert_cap_man'.$ideg.'.bat');
//          exec('cmd /c convert_cap_man'.$ideg.'.bat');// Ejecuta consola y la muestra primer plano 
//          echo 'Contenido Convertido '.$ideg.'';
//          //$contador++;
//      }
//  } else {
//      echo "No se encontraron registros.";
//  }
?>
