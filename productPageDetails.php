<?php
$page_title = "Produtos";

include_once("Layout/layoutHeader.php");
include_once('DbFactory.php');

$products =  $db->Produto()->getTodos();
?>




<div class="col-md-12 col-sm-12 col-xs-12">

    <div class="page-title">
        <span>Lista de Produtos</span>
    </div>


    <div class="search-panel">

        <form action="productSingle.php" method="get">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <label for="idInput"># </label>
                    <input type="number" class="form-control form-control-sm" id="idInput" aria-describedby="idInput" name="idInput" placeholder="Ex: 1">
                </div>

                <div class="col-md-3 col-sm-4">
                    <label for="nameInput">Nome </label>
                    <input type="text" class="form-control form-control-sm" id="nameInput" aria-describedby="nameInput" name="nameInput" placeholder="Ex: Gphone">
                </div>


                <div class="col-md-12">
                    <button type="submit" class="btn btn-purple mb-2 btn-sm" id="btn-user-search">Pesquisar</button>
                </div>

            </div>



        </form>

    </div>



    <div>
        <?php include_once "productListPartial.php"; ?>
    </div>

</div>