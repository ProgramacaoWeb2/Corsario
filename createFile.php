<?php
header("Content-Type: application/json");

$result = NULL;
$photoTemp = $_FILES["Arquivo"]["tmp_name"];


$nameFile = $_FILES["Arquivo"]["name"];
$nameFile = str_replace(" ","_", $nameFile);

copy($photoTemp,"./Uploads/$nameFile");

$result= "TESTE";

echo json_encode($result);
