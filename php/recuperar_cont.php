<?php
include "PHPMailer/class.phpmailer.php";
include "PHPMailer/class.smtp.php";

use PHPMailermaster\PHPMailer;
use PHPMailermaster\Exception;


require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

function enviarEmail( $email, $link ){
$email_user = "usemail";
$email_password = "pass";
$the_subject = "Cancelar cuenta Depildiodo";
$address_to = "$email";
$from_name = "Depildiodo";
$phpmailer = new PHPMailer();
$body = '<html>
  <head>
    <title>Restablece tu contraseña</title>
  </head>
  <body>
   <p>Hemos recibido una petici&oacuten para restablecer la contrase&ntildea de tu cuenta.</p>
   <p>Si hiciste esta petici&oacuten, haz clic en el siguiente enlace, si no hiciste esta petici&oacuten puedes ignorar este correo.</p>
   <p>
     <strong>Enlace para restablecer tu contrase&ntildea</strong><br>
     <a href="'.$link.'"> Restablecer contrase&ntildea </a>
   </p>
 </body>
</html>';
// ---------- datos de la cuenta de Gmail -------------------------------
$phpmailer->Username = $email_user;
$phpmailer->Password = $email_password; 
//-----------------------------------------------------------------------
// $phpmailer->SMTPDebug = 1;
$phpmailer->CharSet = 'UTF-8';
$phpmailer->SMTPSecure = 'ssl';
$phpmailer->Host = "mail.depildiodo.com"; // GMail
$phpmailer->Port = 465;
$phpmailer->IsSMTP(); // use SMTP
$phpmailer->SMTPAuth = true;
$phpmailer->setFrom($phpmailer->Username,$from_name);
$phpmailer->AddAddress($address_to); // recipients email
$phpmailer->Subject = $the_subject; 
$phpmailer->Body = $body;
//$phpmailer->Body .="<h1 style='color:#3498db;'>Hola $name!</h1>";
//$phpmailer->Body .= "<p>Mensaje personalizado</p>";
//$phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
$phpmailer->IsHTML(true);
$phpmailer->Send();
}
?>