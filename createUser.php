<?php
header("Content-Type: application/json");

require "DbFactory.php";
require "Utils.php";

$name = $_POST['inputName'];
$userName = $_POST['inputUsername'];
$password = $_POST['inputPassword'];
$confirmPassword = $_POST['inputConfirmPassword'];
$typeUser = $_POST['inputTypeUser'];

$phone= $_POST['inputPhone'];
$cc= $_POST['inputCreditCard'];






$result = null;

$errorAddress = false;

if($password != $confirmPassword ){
    $result =  new TResult(false, "Error: Senhas não correspondem.");
}
else{

    $checkUser =  $db->Usuario()->getPorLogin($userName);

    if(isset($checkUser) && $checkUser->getLogin() == $userName){
        $result =  new TResult(false, "Error: Email já cadastrado");
    }
    else{

        $idAddress = null;

        if($typeUser == 0){

            $AddressStreet = $_POST['inputAddressStreet'];
            $AddressNumber = $_POST['inputAddressNumber'];
            $AddressComplement = $_POST['inputAddressComplement'];
            $AddressDistrict = $_POST['inputAddressDistrict'];
            $AddressCep = $_POST['inputAddressCep'];
            $AddressCity = $_POST['inputAddressCity'];
            $AddressState = $_POST['inputAddressState'];
        
            $newAddress = new Endereco(null, $AddressStreet, $AddressNumber, $AddressComplement, $AddressDistrict, $AddressCep, $AddressCity, $AddressState);
            
            $addressResult = $db->Endereco()->insere($newAddress);

            if($addressResult != null)
                $idAddress = $addressResult;
            else
                $errorAddress = true;

        }


        if($errorAddress){
            $result =  new TResult(false, "Erro ao enviar endereço");
        }
        else{
            $newUser = new Usuario(null, $userName, $password, $name, $typeUser,$phone, $cc, $idAddress );

            $insertResult = $db->Usuario()->insere($newUser);
        
            if(!$insertResult)
                $result =  new TResult(false, "Erro ao criar usuário");
            else
                $result =  new TResult(true, "Usuário criado");
        }



       
    }
}




echo json_encode($result);