<?php
header("Content-Type: application/json");

require "DbFactory.php";
require "Utils.php";

$newName = $_POST['inputName'];
$idUsuario = $_POST['inputIdUsuario'];


$user = $db->Usuario()->getPorCodigo($idUsuario);

$user->setName($newName);

$updateResult = $db->Usuario()->altera($user);

if(!$updateResult)
    $result =  new TResult(false, "Erro ao editar usuário");
else
    $result =  new TResult(true, "Usuário salvo");


echo json_encode($result);