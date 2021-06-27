<?php

include_once("./DbFactory.php");

$orderId = @$_POST['orderId'];
$formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
$pedidosItens = $db->PedidoItens()->getPedidosItensPorPedido($orderId);
$pedido = $db->Pedido()->getPorCodigo($orderId);
?>

<td colspan="7">
  <div>
    <table class="col-md-12" style="text-align: left;">
      <tr>
        <th scope="col" class="color-purple">Descricao do Produto</th>
        <th scope="col" class="color-purple">Quantidade</th>
        <th scope="col" class="color-purple">Preço</th>
        <th scope="col" class="color-purple">Preço Total Por Item</th>

      </tr>
      <?php $valorTotalCompra = 0;
      foreach ($pedidosItens as $pedidoItem) {
        $produto = $db->Produto()->getPorCodigo($pedidoItem->getProduto());

        $path = dirname(__FILE__).$produto->getFoto();
        $firstFile = scandir($path)[2];
        $firstFile = $produto->getFoto()."/".$firstFile;
        $totalSum = 0;
        $totalSum += ((int)$pedidoItem->getQuantidade()) * (float)$pedidoItem->getPreco();
        $valorTotalCompra = $totalSum + $valorTotalCompra;
        $totalSum = $formatter->formatCurrency($totalSum, 'BRL');
      ?>
        <tr>
          <td>
              <div style="display: inline-flex;">
                <div>
                  <img src="<?php echo $firstFile?>" alt="" style="max-width: 6rem;">
                </div>
                <div>
                  <?php echo $produto->getNome(); ?>
                </div>
              </div>
         
          </td>

          <td>
            <?php echo $pedidoItem->getQuantidade(); ?>
          </td>

          <td style="text-align: center">
            <?php echo  $formatter->formatCurrency($pedidoItem->getPreco(), 'BRL'); ?>
          </td>

          <td style="text-align: center">
            <?php echo $totalSum; ?>
          </td>

        <?php } ?>

       

        </tr>
        <tr class="color-purple">
          <td colspan="7" style="text-align: right;font-weight: bold;font-size: 1.3rem;
}">
            Total: <?php echo $formatter->formatCurrency($valorTotalCompra, 'BRL'); ?>
          </td>
        
        </td>

    </table>
  </div>
</td>