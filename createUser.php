<?php
header("Content-Type: application/json");

require "DbFactory.php";
require "Utils.php";

$name = $_POST['inputName'];
$userName = $_POST['inputUsername'];
$password = $_POST['inputPassword'];
$comfirmPassword = $_POST['inputConfirmPassword'];



$newUser = new Usuario(null, $userName, $password, $name);

$insertResult = $db->Usuario()->insere($newUser);

if(!$insertResult)
    $result =  new TResult(true, "Erro ao criar usuário");
else
    $result =  new TResult(true, "Usuário criado");


echo json_encode($result);