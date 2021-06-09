<?php
header("Content-Type: application/json");

$result = NULL;
$photoTemp = $_FILES["Arquivo"]["tmp_name"];

$data = new DateTime();

$nameFile = $_FILES["Arquivo"]["name"];
$nameFile = str_replace(" ","_",$nameFile);

$nameFile = $data->getTimestamp() . "_"  . $nameFile;

copy($photoTemp,"./Uploads/$nameFile");

echo json_encode($nameFile);
exit;