<?php

$page_title = "Editar produto";

include_once('Views/Layout/layoutHeader.php');
include_once('DbFactory.php');

$productDB = $db->Produto();

$name = @$_GET['name'];
$id = @$_GET['id'];

if ($name === NULL) {
    $product = $productDB->getPorCodigo($id);
} else {
    $product = $productDB->getPorNome($name);
}

if ($product === NULL) {
    $product = new Produto(NULL, NULL, NULL, NULL, NULL);
}

?>

<body>

    <div id="loginbBody">

        <span id="title">Editar produto</span>

        <div id="loginContent">
            <div class="formArea">

                <form action="productCreate.php" method="POST">
                    
                    <div class="formGroup">
                        <label for="inputProductId">Identificação:</label>
                        <input type="text" readonly="readonly" value="<?= $product->getId() ?>" id="inputProductId" name="inputProductId">
                    </div>

                    <div class="formGroup">
                        <label for="inputProductName">Nome:</label>
                        <input type="text" value="<?= $product->getNome() ?>" id="inputProductName" name="inputProductName" placeholder="Ex. Gphone ">
                    </div>

                    <div class="formGroup">
                        <label for="inputProductDescription">Descrição:</label>
                        <input type="text" value="<?= $product->getDescricao() ?>" id="inputProductDescription" name="inputProductDescription" placeholder="Gphone 12 Pro">
                    </div>

                    <div class="formGroup">
                        <label for="inputProductPhoto">Foto:</label>
                        <input type="text" value="<?= $product->getFoto() ?>" id="inputProductPhoto" name="inputProductPhoto">
                    </div>
            
                    <button class="corsBtn btn-purple" type="submit">Editar</button>


                </form>
            </div>

        </div>