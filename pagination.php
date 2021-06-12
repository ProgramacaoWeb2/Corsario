<?php
$page_title = "Pesquisa Detalhada";

include_once("Layout/layoutHeader.php");
include_once("DbFactory.php");
include_once("authentication.php");

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$limit = 10;
$offset = ($page - 1) * $limit;

$totalRows = $db->Produto()->ultimoIdCadastrado();
$totalPages = ceil($totalRows / $limit);


$productList = $db->Produto()->getTodosPaginacao($offset, $limit);



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

    <ul class="pagination">
        <li><a href="?page=1">First</a></li>
        <li class="<?php if ($page <= 1) {
                        echo 'disabled';
                    } ?>">
            <a href="<?php if ($page <= 1) {
                            echo '#';
                        } else {
                            echo "?page=" . ($page - 1);
                        } ?>">Prev</a>
        </li>
        <li class="<?php if ($page >= $totalPages) {
                        echo 'disabled';
                    } ?>">
            <a href="<?php if ($page >= $totalPages) {
                            echo '#';
                        } else {
                            echo "?page=" . ($page + 1);
                        } ?>">Next</a>
        </li>
        <li><a href="?page=<?php echo $totalPages; ?>">Last</a></li>
    </ul>

<?php
} else { ?>

<?php } ?>