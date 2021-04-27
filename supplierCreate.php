<?php
include_once('./DbFactory.php');

$supplierDb = $db->Fornecedor();
$adressDb = $db->Endereco();

$supplier = NULL;


$id = @$_POST['inputSupplierId'];
$name = @$_POST['inputSupplierName'];
$phone = @$_POST['inputSupplierPhone'];
$mail = @$_POST['inputSupplierMail'];
$description = @$_POST['inputSupplierDescription'];

$street = @$_POST['inputSupplierStreet'];
$number = @$_POST['inputSupplierNumber'];
$complement = @$_POST['inputSupplierComplement'];
$district = @$_POST['inputSupplierDistrict'];
$cep = @$_POST['inputSupplierCep'];
$city = @$_POST['inputSupplierCity'];
$state = @$_POST['inputSupplierState'];


$supplier = $supplierDb->getPorCodigo($id);

if ($supplier === null) {
    $adress = new Endereco(null, $street, $number, $complement, $district, $cep, $city, $state);
    $adressId = $adressDb->insere($adress);
    $supplierNew = new Fornecedor(null, $name, $description, $phone, $mail, $adressId);
    $supplierDb->insere($supplierNew);
} else {
    $supplier->setId($id);
    $supplier->setNome($name);
    $supplier->setTelefone($phone);
    $supplier->setEmail($mail);
    $supplier->setDescricao($description);


    $supplierDb->altera($supplier);

    $adress = $db->Endereco()->getPorCodigo($supplier->getIdEndereco());

    $adress->setRua($street);
    $adress->setNumero($number);
    $adress->setComplemento($complement);
    $adress->setBairro($district);
    $adress->setCidade($city);
    $adress->setEstado($state);

    $adressDb->altera($adress);
}






header("Location: supplierPageDetails.php");
exit;
