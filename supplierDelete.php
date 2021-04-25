<?php

include_once('./DbFactory.php');

$supplierDb = $db->Fornecedor();

$id = @$_GET['id'];

$supplierDb = $db->Fornecedor();

$deleteSupplier=$supplierDb->getPorCodigo($id);

$supplierDb->deleta($deleteSupplier);


header("Location: http://localhost/supplierPageDetails.php");
exit;
?>
