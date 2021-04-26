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

$adress = new Endereco(null, $street, $number, $complement, $district, $cep, $city, $state);


$adressDb->insere($adress);

$adressId = $adressDb->ultimoIdCadastrado();

$supplier = $supplierDb->getPorNome($name);

$supplier = $supplierDb->getPorCodigo($id);

if ($supplier === null) {
    $supplierNew = new Fornecedor(null, $name, $description, $phone, $mail,$adressId[0]);
    $supplierDb->insere($supplierNew);
} else {
    $supplier->setId($id);
    $supplier->setNome($name);
    $supplier->setTelefone($phone);
    $supplier->setEmail($mail);
    $supplier->setDescricao($description);

    $supplierDb->altera($supplier);
}






header("Location: supplierPageDetails.php");
exit;
?>