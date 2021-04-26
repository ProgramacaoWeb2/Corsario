<?php
header("Content-Type: application/json");

require "DbFactory.php";
require "Utils.php";

$newName = $_POST['inputName'];
$idUsuario = $_POST['inputIdUsuario'];

$typeUser = $_POST['inputTypeUser'];
$phone= $_POST['inputPhone'];
$cc= $_POST['inputCreditCard'];


$user = $db->Usuario()->getPorCodigo($idUsuario);
$user->setName($newName);

if($typeUser == 1){
    $user->setUserType(null);
    $user->setTelefone(null);
    $user->setCartaoCredito(null);
}
else{
    $user->setUserType($typeUser);
    $user->setTelefone($phone);
    $user->setCartaoCredito($cc);

    $AddressStreet = $_POST['inputAddressStreet'];
    $AddressNumber = $_POST['inputAddressNumber'];
    $AddressComplement = $_POST['inputAddressComplement'];
    $AddressDistrict = $_POST['inputAddressDistrict'];
    $AddressCep = $_POST['inputAddressCep'];
    $AddressCity = $_POST['inputAddressCity'];
    $AddressState = $_POST['inputAddressState'];

    $address = $db->Endereco()->getPorCodigo($user->getEndereco());

    if( $address != null){
        $address->setRua($AddressStreet);
        $address->setNumero($AddressNumber);
        $address->setComplemento($AddressComplement);
        $address->setBairro($AddressDistrict);
        $address->setCep($AddressCep);
        $address->setCidade($AddressCity);
        $address->setEstado($AddressState);

        $db->Endereco()->altera($address);
    }
}



$updateResult = $db->Usuario()->altera($user);



if(!$updateResult)
    $result =  new TResult(false, "Erro ao editar usuário");
else
    $result =  new TResult(true, "Usuário salvo");


echo json_encode($result);