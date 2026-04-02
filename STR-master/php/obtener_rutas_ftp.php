<?php
//$filename = "home";
//$fp_load = "192.168.100.63";


function get_text($filename) {

    $fp_load = fopen("$filename", "rb");

    if ( $fp_load ) {

        while ( !feof($fp_load) ) {
            $content .= fgets($fp_load, 8192);
        }

        fclose($fp_load);

        return $content;

    }  
}


$matches = array();

preg_match_all("/(a href\=\")([^\?\"]*)(\")/i", get_text('https://www.cinecalidad.ec/ver-pelicula/reyes-de-la-calle/'), $matches);

foreach($matches[2] as $match) {
echo $match . '<br>';
}
?>