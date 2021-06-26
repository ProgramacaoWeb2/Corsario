<?php
header("Content-Type: application/json");

include_once('./DbFactory.php');

$id = @$_POST['inputProductId'];
$name = @$_POST['inputProductName'];
$description = @$_POST['inputProductDescription'];
$supplierId = @$_POST['inputSupplierId'];
$stock = @$_POST['inputEstoque'];
$price = @$_POST['inputPreco'];
$photoTemp = $_FILES["Arquivo"]["tmp_name"];
$nameFile = $_FILES["Arquivo"]["name"];

$productDb = $db->Produto();
$supplierDb = $db->Fornecedor();
$estoqueDb = $db->Estoque();
$product = NULL;

$product = $productDb->getPorNome($name);

$product = $productDb->getPorCodigo($id);

if ($product === NULL) {

    $lastId = $productDb->ultimoIdCadastrado();
    $lastId = $lastId + 1;
    $directoryPath = "/Uploads/$lastId";

    mkdir(__DIR__ . "." . $directoryPath, 0777, false);


    $nameFile = str_replace(" ", "_", $nameFile);
    copy($photoTemp, ".$directoryPath/$nameFile");


    $productNew = new Produto(NULL, $name, $description, $directoryPath, $supplierId);

    $productDb->insere($productNew);
    $ultimoCadastro = $productDb->ultimoIdCadastrado();

    $estoqueNew = new Estoque(NULL, $stock, $price, $ultimoCadastro);
    $estoqueDb->insere($estoqueNew);
} else {


    $product->setId($id);
    $product->setNome($name);
    $product->setDescricao($description);
    $product->setIdFornecedor($supplierId);

    $productDb->altera($product);

    $estoque = $estoqueDb->pesquisaProdutoPorId($id);


    $estoque->setPreco($price);
    $estoque->setQuantidade($stock);
    $estoque->setIdProduto($id);

    $estoqueDb->alteraPorProduto($estoque);
}