<?php

$usu=@$_SESSION['usuario'];
$cont=0;

$fechaactual= date("Y")."-".date("m")."-".date("d");
$objFecha = new DateTime($fechaactual, new DateTimeZone('America/Caracas'));
$dia= $objFecha->format('d');
$mes= $objFecha->format('m');
$anno= $objFecha->format('Y');

$fechacompar= ".$anno.'-'.$mes.'-'.$dia.";
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
                
               // session_abort();

            }else{
                echo'En espera de autenticación...';

            }
        }
        if(session_status() == PHP_SESSION_ACTIVE){
           // echo'<script>alert("'.$cont.'");</script>';
        }
        
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
?>