<?php

include_once('./Dao/DaoFactory.php');
include_once('./Dao/DaoUser.php');
include_once('./Dao/DaoProduto.php');


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
    public function getClienteDao()
    {
        return new MySqlClienteDao($this->getConnection());
    }

    public function getEnderecoDao()
    {
        return new MySqlEnderecoDao($this->getConnection());
    }

    public function getEstoqueDao()
    {
        return new MySqlEstoqueDao($this->getConnection());
    }

    public function getFornecedorDao()
    {
        return new MySqlFornecedorDao($this->getConnection());
    }
}
