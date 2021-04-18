<?php

include_once('./Dao/DaoEstoque.php');
include_once('./Dao/Dao.php');

class MySqlEstoqueDao extends Dao implements DaoEstoque
{
    private $tabela = "estoque";



    public function insere($estoque)
    {

        $query = "INSERT INTO " . $this->tabela . "(quantidade, preco) VALUES" . "(:quantidade,:preco)";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":quantidade", $estoque->getQuantidade());
        $prep->bindValue(":preco", $estoque->getPreco());

        if ($prep->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function altera($estoque)
    {
        $query = "UPDATE " . $this->tabela .
            " SET quantidade = :quantidade, preco = :preco" .
            " WHERE idEstoque = :idEstoque";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":quantidade", $estoque->getQuantidade());
        $prep->bindValue(":preco", $estoque->getPreco());


        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getPorCodigo($id)
    {

        $estoque = null;

        $query = "SELECT idEstoque,quantidade, preco FROM " . $this->tabela . " WHERE idEstoque = :idEstoque LIMIT 1";


        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":idEstoque", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $estoque = new Estoque($row['idEstoque'], $row['quantidade'], $row['preco']);
        }

        return $estoque;
    }

    public function getPorPreco($preco)
    {
        $estoque = null;

        $query = "SELECT idEstoque,quantidade, preco FROM " . $this->tabela . " WHERE preco = :preco LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":preco", $preco);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $estoque = new Estoque($row['idEstoque'], $row['quantidade'], $row['preco']);
        }

        return $estoque;
    }

    public function getTodos()
    {
        $query = "SELECT idEstoque,quantidade, preco FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $estoques = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $estoque = new Estoque($idEstoque, $quantidade, $preco);
            $estoques[] = $estoque;
        }
        return $estoques;
    }


    public function deleta($estoque)
    {
        $query = "DELETE FROM " . $this->tabela .
            " WHERE idEstoque = :idEstoque";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':idEstoque', $estoque->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
