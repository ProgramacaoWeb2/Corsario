<?php
$page_title = "Pesquisa Detalhada";

//include_once("Layout/layoutHeader.php");
include_once("DbFactory.php");
//include_once("authentication.php");

$orderList = NULL;
$orderList = $db->Pedido()->getTodos();
$search = @$_POST['search'];

if (isset($search)) {
    $orderList = $db->Pedido()->getTodos($search);
} else {
    $orderList = $db->Pedido()->getTodos();
}


if ($orderList != NULL) {

?>
    <table class="table" id="display-orders">
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



            <tr class="order-row" data-order="<?php echo $order->getId(); ?>">

                <td id="orderId"><?= $order->getId() ?></td>
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
                            <a class="dropdown-item" id="btn-order-edit" href="orderEditPage.php?id=<?= $order->getId() ?>"> Editar Pedido</a>
                            <a class="dropdown-item" id="btn-order-details2" href="javascript:void(0);" name="<?= $order->getId() ?>"> <?= $order->getId() ?></a>
                        </div>
                    </div>



                </td>


            </tr>

            <tr class="order-details-<?php echo $order->getId();?> " style = "display:none;">



            </tr>


        <?php  } ?>



    </table>
<?php
} else { ?>

<?php } ?>