<?php
$page_title = "Pesquisa Detalhada";

include_once("Layout/layoutHeader.php");
include_once("DbFactory.php");
include_once("authentication.php");

$orderList = NULL;
$orderList = $db->Pedido()->getTodos();

if ($orderList != NULL) {

?>


    <table class="table">
        <thead class="thead-purple">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Número</th>
                <th scope="col">Data do Pedido</th>
                <th scope="col">Data da Entrega</th>
                <th scope="col">Situação</th>
                <th scope="col">Nome Usuário</th>
                <th>
            </tr>
        </thead>



        <?php
        foreach ($orderList as $order) {
            $user = $db->Usuario()->getPorCodigo($order->getUsuario());
        ?>



            <tr>
                <td><?= $order->getId() ?></td>
                <td><?= $order->getId() ?></td>
                <td><?= $order->getDataPedido() ?></td>
                <td><?= $order->getDataEntrega() ?></td>
                <td><?= $order->getSituacao() ?></td>
                <td><?= $user->getName() ?></td>

                <td>


                    <div class="btn-group float-right" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-purple dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Opções
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" id="btn-edit-product" href="productEdit.php?id=<?= $order->getId() ?>"> Editar Produto</a>
                            <a class="dropdown-item" id="btn-delete-product" href="productDelete.php?id=<?= $order->getId() ?>"> Deletar Produto</a>
                            <a class="dropdown-item" id="btn-order-details" href="orderListPartialNoPag.php?id=<?= $order->getId() ?>"> Detalhes Pedido</a>
                        </div>
                    </div>



                </td>


            </tr>


        <?php  } ?>



    </table>
<?php
} else { ?>

<?php } ?>