<?php 
include "conexion.php";
$perfupdat='';
$tipousua='';
$perfupdat = @$_GET['perfupdat'];

session_start();

/*
//////////////////////////////////////////////////
//$server_pre='';
//function check_server($perfupdat){
    $server_pre ='';
    $mysqli1 = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds'); 
    $query1 = $mysqli1 -> query ("SELECT * FROM server13 WHERE ususer13 = $perfupdat and preser13 = 1");
    $valores1 = $query1->data_seek(0);
    if($server_pre = $valores1['idserv13']){
            echo "server $server_pre";
    }
//}

//function check_almacen($server_pre, $perfupdat){

    $mysqli2 = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
    $query2 = $mysqli2 -> query ("SELECT * FROM almser15 WHERE usualm15 = $perfupdat and idservi15 = $server_pre");
    if ($valores2 = $query2->fetch_assoc()) {
        $almacen_pre = $valores2['idserv13'];
        echo "almacen $almacen_pre";
    }
//}*/

function check_almacen_cont($perfupdat){

    $mysqli2 = new mysqli('localhost', 'antonio', '*Lm2638220$', 'bnucleds');
    $query2 = $mysqli2 -> query ("SELECT * FROM almser15 WHERE usualm15 = $perfupdat and idservi15 = $server_pre");
    if ($valores2 = $query2->fetch_assoc()) {
        $almacen_pre = $valores2['idserv13'];
        echo "almacen $almacen_pre";
    }
}

?>
