<?php

include_once('./Dao/DaoFactory.php');
include_once('./Dao/DaoProduto.php');
include_once('./Dao/DaoUser.php');


class MySqlDaoFactory extends DaoFactory
{

    private $host = "localhost";
    private $db = "CorsarioDb";
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
        return new MySqlProdutoDao($this->getConnection());
    }

    public function User()
    {
        return new mySqlDaoUser($this->getConnection());
    }
}
