<?php

include_once('./DbFactory.php');

$id = @$_GET['id'];

$supplierDb = $db->Fornecedor();
$productList = $db->Produto()->getTodos();


$deleteSupplier = $supplierDb->getPorCodigo($id);

if ($supplierDb->deleta($deleteSupplier) == true);
 
header("Location: supplierPageDetails.php");
exit;
