<?php

include_once('./Views/Layout/layoutSimpleHeader.php');
include_once('./DbFactory.php');


$id = @$_GET['id'];

$productDb = $db->Produto();

$deleteProduct=$productDb->getPorCodigo($id);

$productDb->deleta($deleteProduct);


header("Location: http://localhost/ProductPageDetails.php");
exit;
?>
