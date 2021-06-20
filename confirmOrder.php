<?php
include_once('./DbFactory.php');
header("Content-Type: application/json");


$cartArray = json_decode($_SESSION["SessionCart"]); // [ {idProduto: 1, qtd: 2}, {idProduto: 3, qtd: 1}]
$idUsuarioPedido = $_SESSION["idUsuario"];
$count = 0;

$listaProdutosPedido = array_map(function($item){
    return $item->idProduto;
},  $cartArray );

$listaProdutosQtd = array_map(function($item){
    return $item->qtd;
},  $cartArray );


//Chamar create do pedido

foreach ($listaProdutosPedido as $produtoPedido) {

    $produto = $db->Produto()->getPorCodigo($produtoPedido);   
    $estoque = $db->Estoque()->pesquisaProdutoPorId($produto->getId());



    if ($listaProdutosQtd[$count] > $estoque->getQuantidade()) {
        $res = "Quantidade em estoque insuficiente | Quantidade em estoque{$estoque}";
        return $res;
    }
    $count++;
}

$count = 0;
$dataDoPedido = new DateTime();
$dataDoPedido = $dataDoPedido->format('d-m-y');
$numeroPedido = $db->Pedido()->countPedido() + 1;


$pedidoNovo = new Pedido(null, $numeroPedido, $dataDoPedido, $dataDoPedido, "novo", $idUsuarioPedido);
$db->Pedido()->insere($pedidoNovo);
$idPedidoNovo = $db->Pedido()->ultimoIdCadastrado();

foreach ($listaProdutosPedido as $produtoPedido) {

    $produto = $db->Produto()->getPorCodigo($produtoPedido);
    $estoque = $db->Estoque()->pesquisaProdutoPorId($produto->getId());

    $pedidoItens = new Pedidoitens(NULL, $listaProdutosQtd[$count], $idPedidoNovo, $produtoPedido, $estoque->getPreco());
    $db->PedidoItens()->insere($pedidoItens);


    $novaQtdEstoque =  $estoque->getQuantidade() - $listaProdutosQtd[$count];
    $estoqueAtualizado = new Estoque($estoque->getId(),$novaQtdEstoque, $estoque->getPreco(), $produtoPedido);
 
    echo $estoqueAtualizado->getId();

    $db->Estoque()->altera($estoqueAtualizado);
    $count++;
}

echo "Pedido inserido com sucesso";
