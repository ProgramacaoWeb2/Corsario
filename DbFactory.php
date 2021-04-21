<?php

include_once('./Model/Produto.php');
include_once('./Model/Usuario.php');

include_once('./Dao/DaoFactory.php');
include_once('./Dao/DaoProduto.php');
include_once('./Dao/DaoUsuario.php');
include_once('./Dao/mysql/MySqlDaoFactory.php');

$db = new MySqlDaoFactory();



?>