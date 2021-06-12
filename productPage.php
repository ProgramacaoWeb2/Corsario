<?php
$page_title = "Cadastro de produtos";

include_once("Layout/layoutHeader.php");
include_once("authentication.php");
include_once("DbFactory.php");

$suppliers = $db->Fornecedor()->getTodos();
?>



<body>

    <div id="loginbBody">

        <span class="mb-3">Cadastro de produto</span>

        <div id="loginContent">
            <div class="formArea">

                <form enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="inputProductName">Nome:</label>
                        <input class="form-control" type="text" id="inputProductName" name="inputProductName" placeholder="Ex. Gphone " required>
                    </div>


                    <div class="form-group">
                        <label for="inputProductDescription">Descrição:</label>
                        <textarea class="form-control" type="textarea" id="inputProductDescription" name="inputProductDescription" rows="5" cols="49" maxlength="100" required></textarea>
                    </div>





                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputProductPhoto" name="inputProductPhoto">
                            <label class="custom-file-label" for="inputProductPhoto" id="inputProductPhotoLabel">Escolha uma imagem</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPreco">Valor:</label>
                        <input class="form-control" type="number" id="inputPreco" name="inputPreco" required>
                    </div>

                    <div class="form-group input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputSupplierId">Fornecedores</label>
                        </div>
                        <select class="custom-select" id="inputSupplierId" name="inputSupplierId" required>
                            <?php
                            foreach ($suppliers as $supplier) { ?>
                                <option value=<?= $supplier->getId() ?>><?= $supplier->getNome() ?></option>
                            <?php  } ?>
                        </select>
                    </div>


                    <button class="corsBtn btn-purple" id="btn-create-product" type="submit">Cadastrar</button>


                </form>

            </div>

        </div>


    </div>



</body>