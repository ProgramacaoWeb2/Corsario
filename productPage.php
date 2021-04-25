<?php
$page_title = "Cadastro de produtos";
include_once("Layout/layoutHeader.php");
include "authentication.php";

include_once("DbFactory.php");

$suppliers = $db->Fornecedor()->getTodos();
?>



<body>

    <div id="loginbBody">

        <span>Cadastro de produto</span>

        <div id="loginContent">
            <div class="formArea">

                <form action="productCreate.php" method="POST">

                    <div class="formGroup">
                        <label for="inputProductName">Nome:</label>
                        <input type="text" id="inputProductName" name="inputProductName" placeholder="Ex. Gphone " required>
                    </div>


                    <div class="formGroup">
                        <label for="inputProductDescription">Descrição:</label>
                        <textarea type="textarea" id="inputProductDescription" name="inputProductDescription" rows="5" cols="42" maxlength="100" required></textarea>
                    </div>

                    <div class="formGroup">
                        <label for="inputProductPhoto">Foto:</label>
                        <input type="text" id="inputProductPhoto" name="inputProductPhoto">
                    </div>


                    <div class="formGroup">
                        <label for="inputPreco">Valor:</label>
                        <input type="number" id="inputPreco" name="inputPreco" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Fornecedores</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="inputSupplierId" required>
                            <?php
                            foreach ($suppliers as $supplier) { ?>
                                <option value=<?= $supplier->getId() ?>><?= $supplier->getNome() ?></option>
                            <?php  } ?>
                        </select>
                    </div>


                    <button class="corsBtn btn-purple" type="submit">Cadastrar</button>


                </form>

            </div>

        </div>


    </div>
</body>