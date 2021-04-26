<?php

$page_title = "Editar Fornecedor";

include_once('Layout/layoutHeader.php');
include_once('DbFactory.php');

$supplierDb = $db->Fornecedor();
$adressdB = $db->Endereco()->getTodos(); 

$name = @$_GET['name'];
$id = @$_GET['id'];

if ($name === NULL) {
    $supplier = $supplierDb->getPorCodigo($id);
} else {
    $supplier = $supplierDb->getPorNome($name);
}



?>

<body>

    <div id="loginbBody">

        <span id="title">Editar fornecedor</span>

        <div id="loginContent">
            <div class="formArea">

                <form action="supplierCreate.php" method="POST">
                    
                    <div class="formGroup">
                        <label for="inputSupplierId">Identificação:</label>
                        <input type="text" readonly="readonly" value="<?= $supplier->getId() ?>" id="inputSupplierId" name="inputSupplierId" placeholder="Ex. João das Neves ">
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierName">Nome:</label>
                        <input type="text" value="<?= $supplier->getNome() ?>" id="inputSupplierName" name="inputSupplierName" placeholder="Ex. João das Neves ">
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierPhone">Telefone:</label>
                        <input type="number" value="<?= $supplier->getTelefone() ?>" id="inputSupplierPhone" name="inputSupplierPhone" placeholder="Ex. joaodasilva@gmail.com">
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierMail">E-mail:</label>
                        <input type="email" value="<?= $supplier->getEmail() ?>" id="inputSupplierMail" name="inputSupplierMail" placeholder="Ex. joaodasilva@gmail.com">
                    </div>

                    <div class="formGroup">
                        <label for="inputSupplierDescription">Descrição:</label>
                        <textarea type="textarea" id="inputSupplierDescription" name="inputSupplierDescription" rows="5" cols="53" maxlength="100"><?= $supplier->getDescricao() ?></textarea>
                    </div>


                    <button class="corsBtn btn-purple" type="submit">Editar</button>


                </form>
            </div>

        </div>