<?php

$page_title = "Editar produto";

include_once('Layout/layoutHeader.php');
include_once('DbFactory.php');
include_once("authentication.php");


$productDB = $db->Produto();
$suppliers = $db->Fornecedor()->getTodos();


$name = @$_GET['name'];
$id = @$_GET['id'];

if ($name === NULL) {
    $product = $productDB->getPorCodigo($id);
    $estoque = $db->Estoque()->pesquisaProdutoPorId($product->getId());
} else {
    $product = $productDB->getPorNome($name);
}


?>

<body>

    <div id="loginbBody">

        <span id="title">Editar produto</span>

        <div id="loginContent">
            <div class="formArea">

                <form enctype="multipart/form-data" method="POST">

                    <div class="formGroup">
                        <label for="inputProductId">Identificação:</label>
                        <input class="form-control" type="text" readonly="readonly" value="<?= $product->getId() ?>" id="inputProductId" name="inputProductId">
                    </div>

                    <div class="formGroup">
                        <label for="inputProductName">Nome:</label>
                        <input class="form-control" type="text" value="<?= $product->getNome() ?>" id="inputProductName" name="inputProductName" placeholder="Ex. Gphone ">
                    </div>

                    <div class="formGroup">
                        <label for="inputProductDescription">Descrição:</label>
                        <input class="form-control" type="text" value="<?= $product->getDescricao() ?>" id="inputProductDescription" name="inputProductDescription" placeholder="Gphone 12 Pro">
                    </div>

                    <div class="formGroup">
                        <label for="inputPreco">Valor:</label>
                        <input class="form-control" type="number" id="inputPreco" name="inputPreco" value="<?= $estoque->getPreco() ?>" required>
                    </div>

                    <div class="formGroup">
                        <label for="inputEstoque">Quantidade em Estoque:</label>
                        <input class="form-control" type="number" id="inputEstoque" name="inputEstoque" value="<?= $estoque->getQuantidade() ?>" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Fornecedores</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="inputSupplierId" required>
                            <?php
                            foreach ($suppliers as $supplier) { ?>
                                <option id="inputSupplierId" value=<?= $supplier->getId() ?>><?= $supplier->getNome() ?></option>
                            <?php  } ?>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputProductPhoto" name="inputProductPhoto">
                            <label class="custom-file-label" for="inputProductPhoto">Escolha um arquivo</label>
                        </div>
                    </div>


                    <button class="corsBtn btn-purple" id="btn-edit-product" type="submit">Editar</button>


                </form>
            </div>

        </div>