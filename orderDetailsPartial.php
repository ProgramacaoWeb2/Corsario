<?php

include_once("./DbFactory.php");

$orderId = @$_POST['orderId'];
$formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
$pedidosItens = $db->PedidoItens()->getPedidosItensPorPedido($orderId);
$pedido = $db->Pedido()->getPorCodigo($orderId);
?>

<td colspan="7">
  <div>
    <table class="col-md-12">
      <tr>
        <th scope="col" class="color-purple">Descricao do Produto</th>
        <th scope="col" class="color-purple">Quantidade</th>
        <th scope="col" class="color-purple">Preço</th>
        <th scope="col" class="color-purple">Preço Total Por Item</th>
        <th scope="col" class="color-purple">Preço Total da Compra</th>
        <th>
      </tr>
      <?php $valorTotalCompra = 0;
      foreach ($pedidosItens as $pedidoItem) {
        $produto = $db->Produto()->getPorCodigo($pedidoItem->getProduto());
        $totalSum = 0;
        $totalSum += ((int)$pedidoItem->getQuantidade()) * (float)$pedidoItem->getPreco();
        $valorTotalCompra = $totalSum + $valorTotalCompra;
        $totalSum = $formatter->formatCurrency($totalSum, 'BRL');
      ?>
        <tr>
          <td>
            <?php echo $produto->getDescricao(); ?>
          </td>

          <td>
            <?php echo $pedidoItem->getQuantidade(); ?>
          </td>

          <td>
            <?php echo  $formatter->formatCurrency($pedidoItem->getPreco(), 'BRL'); ?>
          </td>

          <td>
            <?php echo $totalSum; ?>
          </td>

        <?php } ?>

        <td class="color-purple">
          <?php echo $formatter->formatCurrency($valorTotalCompra, 'BRL'); ?>
        </td>

        </tr>


    </table>
  </div>
</td>