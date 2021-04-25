<?php
$page_title = "Cadastro de produtos";
include_once("Views/Layout/layoutSimpleHeader.php");
include "authetication.php"
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
                        <textarea type="textarea" id="inputProductDescription" name="inputProductDescription" rows="5" cols="53" maxlength="100" required></textarea>
                    </div>

                    <div class="formGroup">
                        <label for="inputProductPhoto">Foto:</label>
                        <input type="text" id="inputProductPhoto" name="inputProductPhoto">
                    </div>

                    <button class="corsBtn btn-purple" type="submit">Cadastrar</button>


                </form>

            </div>

        </div>


    </div>
</body>