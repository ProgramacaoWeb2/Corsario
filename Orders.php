<?php
require "DbFactory.php";

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
   case 'GET':

    

    $Pedidos;

    if(!empty($_GET["idPedido"]))
    {
        $idPedido= $_GET["idPedido"]; 
        $Pedidos = $db->Pedido()->getTodosJSON(["idPedido" => $idPedido]);
    }
    else
    {
        $Pedidos = $db->Pedido()->getTodosJSON();
    }
    
    echo  $Pedidos;

    http_response_code(200);
   
    break;

    default:
       http_response_code(405);
       break;
}

?>

