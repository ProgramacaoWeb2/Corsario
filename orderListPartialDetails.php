<?php
$page_title = "Pesquisa Detalhada";
//header("Content-Type: application/json");
include_once("./DbFactory.php");

$formatter = new NumberFormatter('pt_BR',  NumberFormatter::CURRENCY);
$orderId = @$_POST['orderId'];
$output = '';
$totalSum = 0;

$pedidosItens = $db->PedidoItens()->getPedidosItensPorPedido($orderId);
$pedido = $db->Pedido()->getPorCodigo($orderId);
$usuario = $db->Usuario()->getPorCodigo($pedido->getUsuario());
echo $orderId;




foreach ($pedidosItens as $pedidoItem) {
  $totalSum += ((int)$pedidoItem->getQuantidade()) * (double)$pedidoItem->getPreco();
}

$totalSum = $formatter->formatCurrency($totalSum, 'BRL');


$output = '<div class="container container-product col-md-12">
  <h2 class="py-2 text-center color-purple">Número do pedido ' .  $pedido->getNumero()   . '</h2>
  <h4 class="py-2 text-left color-purple">Preço Total ' . $totalSum  . '</h4>
  <div class="row" style="display:flex;"> ';

foreach ($pedidosItens as $pedidoItem) {

  $produto = $db->Produto()->getPorCodigo($pedidoItem->getProduto());



  $path = dirname(__FILE__) . $produto->getFoto();
  $firstFile = scandir($path)[2];
  $firstFile = $produto->getFoto() . "/" . $firstFile;

  $price = $formatter->formatCurrency($pedidoItem->getPreco(), 'BRL');

 
  $output .= '
    <div class="card-product col-md-3">
        <div class="card-content">
          <div class="main-image-product">
            <img src="  ' . $firstFile . ' " alt="">
          </div>

        <div class="desc-product">
        <div class="main-price-product">' . $pedidoItem->getProduto() . '</div>
        </div>


        <div class="desc-product">
           <div class="main-price-product">' . $produto->getDescricao() . '</div>
        </div>

        <div class="price-product">
          <div class="main-price-product"> ' .  $price . '</div>
        </div>

        <div class="price-product">
          <div class="main-price-product">Quantidade ' .  $pedidoItem->getQuantidade() . '</div>
        </div>
      </div>
    </div>';
}

echo $output;
