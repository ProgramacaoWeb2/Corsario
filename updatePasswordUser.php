<?php
header("Content-Type: application/json");

require "DbFactory.php";
require "Utils.php";

$idUsuario = $_POST['inputIdUsuario'];

$inputOldPassword = $_POST['inputOldPassword'];
$inputNewPassword = $_POST['inputNewPassword'];
$inputConfirmNewPassword = $_POST['inputConfirmNewPassword'];

$result = null;

if($inputNewPassword != $inputConfirmNewPassword ){
    $result =  new TResult(false, "Error: Senhas novas não correspondem.");
}
else{

    $user = $db->Usuario()->getPorCodigo($idUsuario);

    if(md5($inputOldPassword) != $user->getPassword()){
        $result =  new TResult(false, "Error: Senha anterior não corresponde.");
    }
    else{
        $user->setPassword($inputNewPassword);
    
        $updateResult = $db->Usuario()->altera($user);
        
        if(!$updateResult)
            $result =  new TResult(false, "Erro ao editar senha");
        else
            $result =  new TResult(true, "Senha salva");
    }    
}



echo json_encode($result);