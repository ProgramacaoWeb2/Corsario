
<?php
header("Content-Type: application/json");
require "Utils.php";
$idProduto = @$_GET['idProduto'];

$cartArray = json_decode($_SESSION["SessionCart"]);

$cartArray = array_filter(
    $cartArray,
    function ($e) use (&$idProduto) {
        return $e->idProduto != (int)$idProduto;
    }
);
$reindex = array_values($cartArray);
$cartArray = $reindex;

$count = count($cartArray);

if($count == 0)
    unset( $_SESSION["SessionCart"] );
else
    $_SESSION["SessionCart"] = json_encode($cartArray);

$result =  new TResult(true, "");

echo json_encode($result);

?>