<!-------------------------------------------Valida sesion usuario ------------------------------------------->
<?php
    // $perfupdat='';
    // $tipousua='';
    // $perfupdat = @$_GET['perfupdat'];

//   session_start();
	
//         $tipousua= $_SESSION['tipousuario'];
        
//         if (($tipousua=='admin')||($tipousua=='contri')){
//             echo '
//             <script>
//                // alert("Administrador de contenido");
//                // window.location = "index.php";
//             </script>
//             ';
//         }else{
//             echo '
//             <script>
//                 alert("No autorizado");
//                 window.location = "../../index.php";
//             </script>
//             ';
//         }
    
//         if(!isset($_SESSION['usuario'])){
//             echo '
//             <script>
//                 alert("Debe iniciar sesión para ver este contenido");
//                 window.location = "../../index.php";
//             </script>
//             ';
          
//             session_destroy();
//             die();
//         }    



    //////////////////// CONSULTA LAS DIRECCIONES DE ALMACENAMIENTO DEL CONTENIDO Y LAS ASIGNA A VARIABLES GLOBALES////////////////////////////

    $guiaarray=[
        'cont',
        'seri',
        'short',
        'trai',
        'logo',
        'prin',
        'cove',
        'cate'
    ];
    $almarray=[
        'cont',
        'seri',
        'short',
        'trai',
        'logo',
        'prin',
        'cove',
        'cate'
    ];
    $letarray=[
        'cont',
        'seri',
        'short',
        'trai',
        'logo',
        'prin',
        'cove',
        'cate'
    ];
    $aliarray=[
        'cont',
        'seri',
        'short',
        'trai',
        'logo',
        'prin',
        'cove',
        'cate'
    ];
    $cont = count($guiaarray);
    global $almarray;
    global $letarray;
    global $aliarray;
    
    for ($i=0;$i<$cont;$i++) {

        $mysqli = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
        $query = $mysqli -> query ("SELECT * FROM almser15 WHERE guialm15='$guiaarray[$i]' AND prealm15=1");
        while ($valores = mysqli_fetch_array($query)) {
            
            $almarray[$i]=$valores["diralm15"];
            $letarray[$i]=$valores["letalm15"];
            $aliarray[$i]=$valores["alialm15"];
        }
    }
 
    /*
    $GLOBALS["imgpri"]="";//01 imagen principal
    $GLOBALS["imgcov"]="";//02 imagen de cover
    $GLOBALS["logpro"]="";//03 logo productora
    $GLOBALS["logcon"]="";//04 logo contenido
    $GLOBALS["logpro"]="";//05 logo proveedor
    $GLOBALS["logpro"]="";//06 contenido
    $GLOBALS["logpro"]="";//07 lseries

	$usuari0 = $_SESSION['usuario'];
    $carga_ini = mysqli_query($conexion, "SELECT * FROM almser15 WHERE 1");
	
	$valores = $carga_ini->fetch_assoc();
	//$idecont = $valores['idecon04'];

    if(mysqli_num_rows($valores) < "0")
        {       
        echo '
            <script> alert("Configura las rutas de acceso iniciales")</script>
            window.location ="../str-master/php/almacen.php"
            ';
        }else{
            $GLOBALS["imgpri"]=$valores[''];//01 imagen principal
            $GLOBALS["imgpri"]=$valores[''];//01 imagen principal
            $GLOBALS["imgpri"]=$valores[''];//01 imagen principal
            $GLOBALS["imgcov"]="";//02 imagen de cover
            $GLOBALS["logpro"]="";//03 logo productora
            $GLOBALS["logcon"]="";//04 logo contenido
            $GLOBALS["logpro"]="";//05 logo proveedor
        }
/////////////////////////////////////////////////////////// NO TERMINADO*/
?>
