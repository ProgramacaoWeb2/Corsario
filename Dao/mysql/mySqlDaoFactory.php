<?php

include_once('./Dao/daoFactory.php');
include_once('./Dao/produtoDao.php');


class mySqlDaoFactory extends DaoFactory
{

    private $host = "localhost";
    private $db = "db";
    private $port = "3306";
    private $user = "root";
    private $password = "";
    public $connection = NULL;


    public function getConnection()
    {

        $this->connection = NULL;
        $dsn = "mysql:host=" . $this->host  . ";port=" . $this->port . ";dbname=" . $this->db;

        try {
            $this->connection = new PDO($dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Erro na conexão" . $e->getMessage();
        }

        return $this->connection;
    }

    public function getProdutoDao()
    {
        return new mySqlProdutoDao($this->getConnection());
    }
}
