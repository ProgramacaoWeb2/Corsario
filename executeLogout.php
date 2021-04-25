<?php 
require "Utils.php";

header("Content-Type: application/json");


if(isset($_SESSION["idUsuario"])) {
    session_destroy();
    $result =  new TResult(true,null);
} 
else{
    $result =  new TResult(false, "Error: Não foi possível efetuar logout");
}



echo json_encode($result);

?>