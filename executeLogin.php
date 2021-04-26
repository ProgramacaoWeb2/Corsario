<?php
header("Content-Type: application/json");

require "DbFactory.php";
require "Utils.php";

$userName = @$_POST['inputUsername'];
$password = @$_POST['inputPassword'];

if(!isset($userName) || !isset($password) ){
    $result =  new TResult(false, "Error: Informe um login e senha.");
}
else{

    $user = $db->Usuario()->getPorLogin($userName);

    if(!isset($user)){
        $result =  new TResult(false, "Nenhum usuário localizado");
    }
    else{

        $cripPassword = md5($password);

        if(!strcmp($cripPassword, $user->getPassword())){
            $_SESSION["idUsuario"]= $user->getId(); 
            $_SESSION["nomeUsuario"] = stripslashes($user->getName()); 
            $_SESSION["userType"]= $user->getUserType();

            $result =  new TResult(true,null);
        }
        else{
            $result =  new TResult(false, "Error: Usuário ou senha incorretos");
        }

    }

}


echo json_encode($result);