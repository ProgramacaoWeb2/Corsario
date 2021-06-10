<?php
header("Content-Type: application/json");

$result = NULL;
$photoTemp = $_FILES["Arquivo"]["tmp_name"];
$id = $_POST['id'];

$directoryPath = "./Uploads/$id";
mkdir(__DIR__ . $directoryPath , 0777, false);

$nameFile = $_FILES["Arquivo"]["name"];
$nameFile = str_replace(" ","_",$nameFile);

copy($photoTemp,"$directoryPath/$nameFile");

echo json_encode($directory);
exit;