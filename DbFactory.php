<?php

include_once('./Model/Produto.php');
include_once('./Model/Usuario.php');


include_once('./Dao/DaoFactory.php');
include_once("./Dao/Dao.php");

include_once('./Dao/mysql/MySqlDaoFactory.php');


include_once("Dao/mysql/MySqlDaoFactory.php");
include_once("Dao/Dao.php");

include_once("Model/Produto.php");
include_once("Model/Endereco.php");
include_once("Model/Fornecedor.php");
include_once("Model/Estoque.php");
include_once("Model/Usuario.php");
include_once("Model/Pedido.php");
include_once("Model/PedidoItens.php");

include_once("Dao/mysql/MySqlProdutoDao.php");
include_once("Dao/mysql/MySqlFornecedorDao.php");
include_once("Dao/mysql/MySqlEnderecoDao.php");
include_once("Dao/mysql/MySqlEstoqueDao.php");
include_once("Dao/mysql/MySqlPedidoDao.php");
include_once("Dao/mysql/MySqlPedidoItensDao.php");
include_once("Dao/mysql/mySqlUsuarioDao.php");



$db = new MySqlDaoFactory();



?>