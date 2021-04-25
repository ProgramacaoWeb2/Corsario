<?php
$page_title = "Pesquisa detalhada de Fornecedores";

include_once("Layout/layoutHeader.php");
include_once('DbFactory.php');


$supliers = NULL;

$supliers =  $db->Fornecedor()->getTodos();


if ($supliers != NULL) {

?>


    <table class="table">
        <thead class="thead-purple">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th>
            </tr>
        </thead>



        <?php
        foreach ($supliers as $supplier) { ?>



            <tr>
                <td><?= $supplier->getId() ?></td>
                <td><?= $supplier->getNome() ?></td>
                <td><?= $supplier->getDescricao() ?></td>
                <td><?= $supplier->getTelefone() ?></td>
                <td><?= $supplier->getEmail() ?></td>

                <td>


                    <div class="btn-group float-right" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="supplierEdit.php?id=<?= $supplier->getId() ?>"> Editar Fornecedor</a>
                            <a class="dropdown-item btn-delete-user" href="supplierDelete.php?id=<?= $supplier->getId() ?>"> Deletar Fornecedor</a>
                        </div>
                    </div>



                </td>


            </tr>


        <?php  } ?>



    </table>
<?php
} else { ?>



<?php } ?>