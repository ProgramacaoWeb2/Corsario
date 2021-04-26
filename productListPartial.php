<?php
$page_title = "Pesquisa Detalhada";

include_once("Layout/layoutHeader.php");
include_once("DbFactory.php");




$productList = NULL;

$productList = $db->Produto()->getTodos();



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
        foreach ($productList as $product) { ?>
            
            

            <tr>
                <td><?= $product->getId() ?></td>
                <td><?= $product->getNome() ?></td>
                <td><?= $product->getDescricao() ?></td>
                <td><?= $product->getIdFornecedor()?></td>

                <td>


                    <div class="btn-group float-right" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="productEdit.php?id=<?= $product->getId() ?>"> Editar Produto</a>
                            <a class="dropdown-item btn-delete-user" href="productDelete.php?id=<?= $product->getId() ?>"> Deletar usuário</a>
                        </div>
                    </div>



                </td>


            </tr>


        <?php  } ?>



    </table>
<?php
} else { ?>

<?php } ?>