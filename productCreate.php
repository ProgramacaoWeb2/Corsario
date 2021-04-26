<?php
include_once('./DbFactory.php');

$productDb = $db->Produto();
$supplierDb = $db->Fornecedor();
$estoqueDb = $db->Estoque();


$product = NULL;


$id = @$_POST['inputProductId'];
$name = @$_POST['inputProductName'];
$description = @$_POST['inputProductDescription'];
$photo = @$_POST['inputProductPhoto'];


$supplierId = @$_POST['inputSupplierId'];

$stock = @$_POST['inputEstoque'];
$price = @$_POST['inputPreco'];



$product = $productDb->getPorNome($name);

$product = $productDb->getPorCodigo($id);

if ($product === NULL) {
    $productNew = new Produto(NULL, $name, $description, $photo, $supplierId);

    $productDb->insere($productNew);

    $ultimoCadastro = $productDb->ultimoIdCadastrado();


    $estoqueNew = new Estoque(1, $price, $ultimoCadastro[0]);

    $estoqueDb->insere($estoqueNew);
} else {
    $product->setId($id);
    $product->setNome($name);
    $product->setDescricao($description);
    $product->setFoto($photo);
    $product->setIdFornecedor($supplierId);


    $productDb->altera($product);

    $estoque = $estoqueDb->pesquisaProdutoPorId($id);

    $estoque->setPreco($price);
    $estoque->setQuantidade($stock);
    $estoque->setIdProduto($id);

    $estoqueDb->alteraPorProduto($estoque);

}

header("Location: productPageDetails.php");
exit;
