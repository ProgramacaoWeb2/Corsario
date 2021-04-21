<?php

include_once('./Dao/DaoFactory.php');
include_once('MySqlUsuarioDao.php');
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

    public function Produto()
    {
        return new MySqlProdutoDao($this->getConnection());
    }

    public function Usuario()
    {
        return new MySqlUsuarioDao($this->getConnection());

    }
    public function Cliente()
    {
        return new MySqlClienteDao($this->getConnection());
    }

    public function Endereco()
    {
        return new MySqlEnderecoDao($this->getConnection());
    }

    public function Estoque()
    {
        return new MySqlEstoqueDao($this->getConnection());
    }

    public function Fornecedor()
    {
        return new MySqlFornecedorDao($this->getConnection());
    }
}
