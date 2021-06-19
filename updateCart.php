

<?php
header("Content-Type: application/json");
require "Utils.php";
$listItens = @$_POST['listItens'];

$_SESSION["SessionCart"] = json_encode($listItens);

$result =  new TResult(true, "");

echo json_encode($result);

?>