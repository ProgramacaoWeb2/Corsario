<?php
header("Content-Type: application/json");

require "DbFactory.php";
require "Utils.php";

$idUsuario = $_GET['idUsuario'];

$insertResult = $db->Usuario()->deleta($idUsuario);

if(!$insertResult)
    $result =  new TResult(false, "Erro ao deletar usuário");
else
    $result =  new TResult(true, "Usuário deletado");


echo json_encode($result);