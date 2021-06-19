
<?php
header("Content-Type: application/json");

require "DbFactory.php";
require "Utils.php";
$setUnavailable = false;
$idProduto = @$_POST['idProduto'];

$Produto = $db->Produto()->getPorCodigo($idProduto);
$Item;

if(isset($_SESSION["SessionCart"])){
    $cartArray = json_decode($_SESSION["SessionCart"]);

    $fItem = array_filter(
        $cartArray,
        function ($e) use (&$idProduto) {
            return $e->idProduto == (int)$idProduto;
        }
    );

    $count = count($fItem);
    if($count == 0){
        $newItem = new SessionCart();
        $newItem->idProduto = $idProduto;
        $newItem->qtd = 1;
        array_push( $cartArray, $newItem );
        $Item = $newItem;
    }
    else{
        $newItem = reset($fItem);
        $newItem->qtd += 1;
        $Item = $newItem;

    }

    $_SESSION["SessionCart"] = json_encode($cartArray);
    
}
else{

    $newItem = new SessionCart();
    $newItem->idProduto = $idProduto;
    $newItem->qtd = 1;
    $_SESSION["SessionCart"] = json_encode(array($newItem));
    $Item = $newItem;
}



if($Item->qtd == (int)$Produto->getEstoque()->getQuantidade())
    $setUnavailable = true;

 $cartArray = json_decode($_SESSION["SessionCart"]);
   
 $sum = count($cartArray);


$result =  new TResult(true, "", $setUnavailable,$sum);

echo json_encode($result);