<?php

include_once("Layout/layoutHeader.php");
include_once("DbFactory.php");

$dao = $db->Produto();
$daoCliente = $db->Cliente();
$daoFornecedor = $db->Fornecedor();
$daoEstoque = $db->Estoque();
$daoEndereco = $db->Endereco();
$daoEstoque = $db->Estoque();
$daoUsuario = $db->Usuario();

$pd =new Produto(1,"Gphone","teste","dsad") ;   
$cliente = new Cliente(1,"Cliente", "1234", "dsad", "124");
$fornecedor = new Fornecedor(94,"OP","OPSADASDASD","123", "dasda");
$endereco = new Endereco(1,"dsa","dsf","dsaas","dsf","sda","ewae","rs");
$estoque = new Estoque(12,10);



$daoCliente->insere($cliente);
//$daoFornecedor->altera($fornecedor);
$daoEndereco->insere($endereco);
$daoEstoque->insere($estoque);
$dao->insere($pd);

$result = $dao->getPorNome("ak47"); 

echo($result->getNome());
echo($result->getId());
echo($result->getDescricao());
// $result = $dao->altera($pd); OK

//$result=$dao->deleta($pd); OK

// $result = $dao->getPorNome("Celular"); OK

//$result = $dao->getPorCodigo(4); OK

//$result = $dao->getTodos(); OK

//echo $result[4]->getNome();

//$dao->deleta($v); OK




echo "CU";
echo " XD 888 ";

echo "bootstrap me usem";

echo "<br/> bootstrap é pra quem não se garante no soco";

echo "<br>";

echo "You crazy men... Não acredite nas mentiras dele";


include_once "Layout/layoutFooter.php";

?>
