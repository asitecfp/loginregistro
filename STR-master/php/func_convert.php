<?php
include "cargar_datos_in.php";
include "funciones_mas.php";
error_reporting(1);
//1****************************Verifica espacio de almacenamiento************************************************/
$uni_t = $letarray[3];
$uni_c = $letarray[0];

ver_space_disk($uni_t, $uni_c);
                                                                                                       // 
//1*********************************************************FIN 1************************************************/

//2****************************Verifica si ffmpeg se encuentra en uso********************************************/

$esta_corriendo = verify_run_app("ffmpeg");
if($esta_corriendo){
    echo 
    '
     	<script>
         //alert("Proceso de conversion en curso");
     		//window.location = "/home/STR-master/php/almacen.php";
     	</script>
     	';
        exit();
} else {
    echo 
    '
     	<script>
     		//alert("La app NO esta en ejecucion");
     		//window.location = "/home/STR-master/php/almacen.php";
     	</script>
     	';
}
//2**************************************************************FIN 2********************************************/

//2****************************************Verifica si existe el video********************************************/
$ruta = "i:/trailer/mov/*.mp4";
if (file_exists($ruta)) {
    echo 
    '
     	<script>
         alert("El archivo EXISTE");
     		//window.location = "/home/STR-master/php/almacen.php";
     	</script>
     	';
} else {
    
    echo 
    '
     	<script>
         alert("El archivo NO existe");
     		//window.location = "/home/STR-master/php/almacen.php";
     	</script>
     	';
}

//3****************************Consulta rutas y llena matriz de contenido******************************************/

//3****************************Consulta rutas y llena matriz de contenido******************************************/

//3****************************Crear archivo de texto con rutina y cambia ext a .bat*******************************/
//                                                                                                                //
//3****************************Crear archivo de texto con rutina y cambia ext a .bat*******************************/

//3****************************Rutina busca archivos .mp4 en una ruta especificada.********************************/

// $carpeta = '/ruta/a/la/carpeta';

// // Crear un iterador para recorrer los archivos de la carpeta
// $archivos = new DirectoryIterator($carpeta);

// foreach ($archivos as $archivo) {
    
//     $extension = $archivo->getExtension();

//     if ($extension === 'mp4') {
//         echo 'El archivo .mp4 existe en la carpeta.';
//         break;
//     }
// }
//3****************************Fin *******************************/




//****************************Convertir contenido con ffmpeg*********************************************************/
function convert($id, $calidad) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verifica si el formulario se ha enviado

        
        $input_file = $_FILES['input_file']; // Obtiene el archivo de video cargado

        
        if ($input_file['error'] !== UPLOAD_ERR_OK) { // Verifica si el archivo de video se cargó correctamente
            echo "Error al cargar el archivo de video.";
            exit;
        }

        
        $input_file_name = $input_file['name']; // Obtiene el nombre del archivo de video
        $input_file_size = $input_file['size']; // Obtiene el tamaño del archivo de video
        $input_file_type = $input_file['type']; // Obtiene el tipo de archivo de video

        $output_dir = 'output'; // Obtiene el directorio de salida

        if (!is_dir($output_dir)) { // Crea el directorio de salida si no existe
            mkdir($output_dir);
        }

        $output_file_name = uniqid() . '.' . pathinfo($input_file_name, PATHINFO_EXTENSION); // Genera el nombre del archivo de video de salida
        $output_file_path = $output_dir . '/' . $output_file_name; // Obtiene la ruta al archivo de video de salida

        $progress = exec('ffmpeg -i ' . $input_file['tmp_name'] . ' -c:v h264_nvenc -crf 35 -gpu 0 -vf scale=854:480 -b:v 298k -c:a libopus -movflags faststart ' . $output_file_path, $output, $return_var);

        
        if ($return_var === 0) {
       // $progress = strstr($output, 'Progress: ');
        $progress = substr($progress, 10);
        echo $progress;
        } else {
        echo 'Error al convertir el archivo.';
        }
        
        echo "El archivo de video se convirtió correctamente."; // Imprime un mensaje de éxito
    }
}


?>
