<?php
include_once('./DbFactory.php');

$productDb = $db->Produto();

$product = NULL;


$id = @$_POST['inputProductId'];
$name = @$_POST['inputProductName'];
$description = @$_POST['inputProductDescription'];
$photo = @$_POST['inputProductPhoto'];

$product = $productDb->getPorNome($name);

$product = $productDb->getPorCodigo($id);

if ($product === NULL) {
    $productNew = new Produto(NULL, $name,$description,$photo);
    $productDb->insere($productNew);
} else {
    $product->setId($id);
    $product->setNome($name);
    $product->setDescricao($description);
    $product->setFoto($photo);


    $productDb->altera($product);
}

header("Location: http://localhost/corsario/productPageDetails.php");
exit;
?>