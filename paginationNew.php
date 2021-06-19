<?php

include_once("Layout/layoutHeader.php");
include_once("authentication.php");
include_once("DbFactory.php");

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$productList = $db->Produto()->getTodosPaginacao($results, $pageResult);
$totalPages = $db->Produto()->countProdutos();

$output =
    '<label class="color-purple">Quantidade de Registros | ' . $totalPages . '</label>
    <table class="table">
        <thead class="thead-purple">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Fornecedor</th>
                <th>
            </tr>
        </thead>';
foreach ($productList as $product) {

    $supplier = $supplierDB->getPorCodigo($product->getIdFornecedor());

    $output .= '<tr>
                <td>' . $product->getId() . '</td>
                <td>' . $product->getNome() . '</td>
                <td>' . $product->getDescricao() . '</td>
                <td>' . $supplier->getNome() . '</td>

                <td> 
                    <div class="btn-group float-right" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" id="btn-edit-product" href="productEdit.php?id=' . $product->getId() . 'Editar Produto</a>
                            <a class="dropdown-item" id="btn-delete-product" href="productDelete.php?id=' . $product->getId() . 'Deletar Produto</a>
                        </div>
                    </div>



                </td>


            </tr>
 
    </table>';
}


$results = 5;
$pageResult = ($page - 1) * $results;

$products = $db->Produto()->getTodosPaginacao($results, $pageResult);

$pages = ceil($totalPages / $results);

for ($page = 1; $page <= $number_of_page; $page++) {
    $output .=  '<a href = "productPageDetails.php?page=' . $page . '">' . $page . ' </a>';
}

echo $output;