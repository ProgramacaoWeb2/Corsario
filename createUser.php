<?php
header("Content-Type: application/json");

require "DbFactory.php";
require "Utils.php";

$name = $_POST['inputName'];
$userName = $_POST['inputUsername'];
$password = $_POST['inputPassword'];
$confirmPassword = $_POST['inputConfirmPassword'];
$typeUser = $_POST['inputTypeUser'];
$result = null;

if($password != $confirmPassword ){
    $result =  new TResult(false, "Error: Senhas não correspondem.");
}
else{

    $checkUser =  $db->Usuario()->getPorLogin($userName);

    if(isset($checkUser) && $checkUser->getLogin() == $userName){
        $result =  new TResult(false, "Error: Email já cadastrado");
    }
    else{
        $newUser = new Usuario(null, $userName, $password, $name, $typeUser);

        $insertResult = $db->Usuario()->insere($newUser);
    
        if(!$insertResult)
            $result =  new TResult(true, "Erro ao criar usuário");
        else
            $result =  new TResult(true, "Usuário criado");
    }
}




echo json_encode($result);