<?php
header("Content-Type: application/json");

include_once('./DbFactory.php');

$numberOrder = $_POST('numberOrder');
$dateOrder = $_POST('dateOrder');
$dateDelivery = $_POST('dateDelivery');
$situation = $_POST('situationOrder');
$idUser= $_POST('idUsuario');
$
$quantityOrder = $_POST('quantityOrder');




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

    $estoqueNew = new Estoque(1, $price, $ultimoCadastro);

    $estoqueDb->insere($estoqueNew);
} else {


    $product->setId($id);
    $product->setNome($name);
    $product->setDescricao($description);
    //$product->setFoto($photo);
    $product->setIdFornecedor($supplierId);

    $productDb->altera($product);

    $estoque = $estoqueDb->pesquisaProdutoPorId($id);

    $estoque->setPreco($price);
    $estoque->setQuantidade($stock);
    $estoque->setIdProduto($id);

    $estoqueDb->alteraPorProduto($estoque);
}


//header("Location: productPageDetails.php");
exit;
