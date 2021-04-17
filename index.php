<?php

include_once "Views/Layout/layoutHeader.php";
include_once "./fachada.php";

$dao = $factory->getProdutoDao();

$id = 1;
$nome = "Celular";
$desc = "Caro pra cacete";
$foto = "A";


$pd =new Produto($id,$nome,$desc,$foto) ;   

$resl= $dao->insere($pd);


echo ($resl);


echo "CU";

echo " XD ";

echo "bootstrap me usem";

echo "<br/> bootstrap é pra quem não se garante no soco";

echo "<br>";

echo "You crazy men... Não acredite nas mentiras dele";

echo "<br>";



?>

