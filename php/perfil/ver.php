<html>
   <head>
      <title>Login</title>
	<link href="css/estilo.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div id="login">
         <form action= "usuario.php" method="POST"><!-- method="GET"-->
            <label>Usuario: </label>
            <input type="text" name="user"/>
            <label>Contraseña: </label>
            <input type="password" name="password"/>
            <input type="submit" value="Enviar"/>
         </form>
      </div>
   </body>
</html>
