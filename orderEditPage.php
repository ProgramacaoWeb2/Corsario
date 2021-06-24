<?php

$page_title = "Editar Pedido";

include_once('Layout/layoutHeader.php');
include_once('DbFactory.php');
include_once("authentication.php");

$id = @$_GET['id'];

$order = $db->Pedido()->getPorCodigo($id);


?>

<body>

    <div id="loginbBody">

        <span id="title">Editar Pedido</span>

        <div class="col-md-12">
            <div class="formArea">

                <form action="/orderEdit.php" method="POST">

                    <div class="formGroup">
                        <label for="inputOrderId">Identificação:</label>
                        <input class="form-control" type="text" readonly="readonly" value="<?= $order->getId() ?>" id="inputOrderId" name="inputOrderId">
                    </div>

                    <div class="form-group row">

                        <div class="col-md-12 mb-1">
                            <label for="dataPedido" class="col-form-label">Data do Pedido</label>
                            <input class="form-control" id="dataPedido" name="dataPedido" type="date" value="<?= $order->getDataPedido()  ?>">
                        </div>

                    </div>

                    <div class="form-group row">

                        <div class="col-md-12 mb-1">
                            <label for="dataEntrega" class="col-form-label">Data de Entrega</label>
                            <input class="form-control" id="dataEntrega" name="dataEntrega" type="date" value="<?= $order->getDataEntrega()  ?>">
                        </div>

                    </div>


                    <div class="form-group row p-2">


                        <div class="col-md-12">
                            <legend class="mb-4">Qual é a situação do pedido?</legend>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline9" name="customRadioInline9" class="custom-control-input" value="Novo">
                                <label class="custom-control-label" for="customRadioInline9">Novo</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline10" name="customRadioInline9" class="custom-control-input" value="Entregue">
                                <label class="custom-control-label" for="customRadioInline10">Entregue</label>
                            </div>


                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline12" name="customRadioInline9" class="custom-control-input" value="Cancelado">
                                <label class="custom-control-label" for="customRadioInline12">Cancelado</label>
                            </div>

                        </div>

                    </div>

                    <button class="corsBtn btn-purple" id="order-edit" type="submit">Editar</button>


                </form>
            </div>

        </div>
    </div>
</body>