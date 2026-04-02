<?php
   $user = $_POST['user'];
   $password = $_POST['password'];
   
    
//   $user1 = "cc";//alfonso
   $user1 = "alfonso";//cc
//   $pass1 = "01";//xX2019Xx
   $pass1 = "xX2019Xx";//01
   $nameuser1 = "Sr. Alfonso";
   $user2 = "aa";
   $pass2 = "01";
   $nameuser2 = "Usuario2";
   $user3 = "ss";
   $pass3 = "01";
   $nameuser3 = "Usuario3";
    
   $error_notif = "<div align='center'><p>¡Contraseña o usuario incorrecto!" . '<a href="'.$_SERVER['HTTP_REFERER'].'">Volver</a></p></div>';

   switch ($user) {
      case $user1:
         if ($password == $pass1) {
            echo "
			<div align='center'>
			<p><strong>Bienvenido:</strong> " . $nameuser1."</p></div>";
			$permi = "ger100%mac68";
			//$permi="r0Sd5u";
			require('lista.php');
         } else {
            echo $error_notif;
         }
      break;
      case $user2:
         if ($password == $pass2) {
            echo "
			<div align='center'>
			<p><strong>Bienvenido:</strong> " . $nameuser2."</p></div>";
			$permi = "ger100%mac68";
			//$permi="r0Sd5u";
			require('lista.php');
         } else {
            echo $error_notif;
         }
      break;
      case $user3:
         if ($password == $pass3) {
            echo "
			<div align='center'>
			<p><strong>Bienvenido:</strong> " . $nameuser3."</p></div>";
			$permi="r0Sd5u";
			require('lista2.php');
         } else {
            echo $error_notif;
         }
      break;
      default:
         echo $error_notif;
		 $permi="r0Sd5u";
   }
?>
