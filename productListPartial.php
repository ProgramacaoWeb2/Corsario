<?php
$page_title = "Pesquisa Detalhada";

include_once("Layout/layoutHeader.php");
include_once("DbFactory.php");
include_once("authentication.php");

$productList = NULL;

$productList = $db->Produto()->getTodos();
$supplierDB = $db->Fornecedor();


if ($productList != NULL) {

?>


    <table class="table">
        <thead class="thead-purple">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Fornecedor</th>
                <th>
            </tr>
        </thead>



        <?php
        foreach ($productList as $product) {

            $supplier = $supplierDB->getPorCodigo($product->getIdFornecedor());

        ?>



            <tr>
                <td><?= $product->getId() ?></td>
                <td><?= $product->getNome() ?></td>
                <td><?= $product->getDescricao() ?></td>
                <td><?= $supplier->getNome() ?></td>

                <td>


                    <div class="btn-group float-right" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" id="btn-edit-product" href="productEdit.php?id=<?= $product->getId() ?>"> Editar Produto</a>
                            <a class="dropdown-item" id="btn-delete-product" href="productDelete.php?id=<?= $product->getId() ?>"> Deletar Produto</a>
                        </div>
                    </div>



                </td>


            </tr>


        <?php  } ?>



    </table>
<?php
} else { ?>

<?php } ?>