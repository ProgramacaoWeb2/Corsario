<?php

include_once "Views/Layout/layoutHeader.php";
include_once "./fachada.php";

$dao = $factory->getProdutoDao();

$pd =new Produto(1,"Gphone","teste","dsad") ;   

$dao->insere($pd);

// $result = $dao->altera($pd); OK

//$result=$dao->deleta($pd); OK

// $result = $dao->getPorNome("Celular"); OK

//$result = $dao->getPorCodigo(4); OK

//$result = $dao->getTodos(); OK

//echo $result[4]->getNome();

//$dao->deleta($v); OK




echo "CU";

echo " XD ";

echo "bootstrap me usem";

echo "<br/> bootstrap é pra quem não se garante no soco";

echo "<br>";

echo "You crazy men... Não acredite nas mentiras dele";



?>

