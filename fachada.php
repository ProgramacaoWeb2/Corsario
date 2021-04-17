<?php

include_once('./Model/Produto.php');
include_once('./Dao/ProdutoDao.php');
include_once('./Dao/DaoFactory.php');
include_once('./Dao/mysql/MySqlDaoFactory.php');
include_once('./Dao/mysql/MySqlProdutoDao.php');

$factory = new MySqlDaoFactory();



?>