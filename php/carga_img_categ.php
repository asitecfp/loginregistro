<?php

include 'conexion_bd.php';

/*$consulta_cat1 = mysqli_query($conexion, "SELECT ideusu01 FROM usuario");

if(mysqli_num_rows($consulta_cat1) > 0){
    echo()
    
}else{
    echo 'Negativo';
   
}    



/* Comprobar la conexión 


if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}
*/



/* ejecutar una multi consulta */
if (mysqli_query($conexion, "SELECT ideusu01 FROM usuario")) {
    
        /* primero almacenar el conjunto de resultados */
        if ($resultado = mysqli_use_result($conexion)) {
            while ($fila = mysqli_fetch_row($resultado)) {
                printf("%s\n", $fila[0]);
            }
            mysqli_free_result($resultado);
        }
        /* imprimir un separador 
        if (mysqli_more_results($conexion)) {
            printf("-----------------\n");
        }
    } while (mysqli_next_result($conexion));
 /* imprimir un separador */
 if (mysqli_more_results($conexion)) {
    printf("-----------------\n");
}
echo($resultado);
/* close connection */
}

?>