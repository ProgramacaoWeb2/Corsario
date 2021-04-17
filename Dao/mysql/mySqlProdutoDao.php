<?php

include_once('./Dao/produtoDao.php');
include_once('./Dao/dao.php');

class mySqlProdutoDao extends dao implements ProdutoDao
{
    private $tabela = "produto";



    public function insert($produto)
    {

        $query = "INSERT INTO " . $this->tabela . "(nome, descricao, foto) VALUES" . "(:nome,:descricao,:foto)";

        $prep = $this->connection->prepare($query);

        $prep->bindParam(":nome", $produto->getNome());
        $prep->bindParam(":descricao", $produto->getDescricao());
        $prep->bindParam(":foto", $produto->getFoto());

        if ($prep->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($produto)
    {
        $query = "UPDATE " . $this->tabela .
            " SET nome = :nome, descricao = :descricao, foto = :foto" .
            " WHERE id = :id";

        $prep = $this->conn->prepare($query);


        $prep->bindParam(":nome", $produto->getNome());
        $prep->bindParam(":descricao", $produto->getDescricao());
        $prep->bindParam(":foto", $produto->getFoto());
        $prep->bindParam(':id', $produto->getId());


        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getCode($id)
    {

        $produto = null;

        $query = "SELECT
                    id, nome, descricao, foto
                FROM
                    " . $this->tabela . "
                WHERE
                    id = ?
                LIMIT
                    1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $produto = new produto($row['id'], $row['nome'], $row['descricao'], $row['foto']);
        }

        return $produto;
    }

    public function getName($nome)
    {
        $produto = null;

        $query = "SELECT
                    id, nome, descricao, foto
                FROM
                    " . $this->tabela . "
                WHERE
                    nome = ?
                LIMIT
                    1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $nome);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $produto = new Produto($row['id'], $row['nome'], $row['descricao'], $row['foto']);
        }

        return $produto;
    }

    public function getAll()
    {
        $query = "SELECT
                    id, nome, descricao, foto
                FROM
                    " . $this->tabela;

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $produtos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $produto = new Produto($id, $nome, $descricao, $foto);
            $produtos[] = $produto;
        }
        return $produtos;
    }


    public function delete($produto)
    {
        $query = "DELETE FROM " . $this->tabela .
            " WHERE id = :id";

        $stmt = $this->connection->prepare($query);

        // bind parameters
        $stmt->bindParam(':id', $produto->getId());


        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
