<?php
include_once('./DbFactory.php');

$id = @$_POST['inputOrderId'];
$dataPedido = @$_POST['dataPedido'];
$dataEntrega = @$_POST['dataEntrega'];
$situacao = @$_POST['customRadioInline9'];

$pedido=$db->Pedido()->getPorCodigo($id);
$novoPedido = new Pedido($id,$pedido->getNumero(),$dataPedido,$dataEntrega,$situacao,$pedido->getUsuario());
$db->Pedido()->altera($novoPedido);

header('orderPageDetails.php');
exit;
?>