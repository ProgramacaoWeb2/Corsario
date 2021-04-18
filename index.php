<?php

include_once "Views/Layout/layoutHeader.php";
include_once "./fachada.php";

$dao = $factory->getProdutoDao();
$daoCliente = $factory->getClienteDao();
$daoFornecedor = $factory->getFornecedorDao();
$daoEstoque = $factory->getEstoqueDao();
$daoEndereco = $factory->getEnderecoDao();
$daoEstoque = $factory->getEstoqueDao();

$pd =new Produto(1,"Gphone","teste","dsad") ;   
$cliente = new Cliente(1,"Cliente", "1234", "dsad", "124");
$fornecedor = new Fornecedor(1,"Fornecedor","teste","123", "dasda");
$endereco = new Endereco(1,"dsa","dsf","dsaas","dsf","sda","ewae","rs");
$estoque = new Estoque(12,10);

$daoCliente->insere($cliente);
$daoFornecedor->insere($fornecedor);
$daoEndereco->insere($endereco);
$daoEstoque->insere($estoque);
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

