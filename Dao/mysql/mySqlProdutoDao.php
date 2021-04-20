<?php

include_once('./Dao/DaoProduto.php');
include_once('./Dao/Dao.php');

class MySqlProdutoDao extends DAO implements DaoProduto
{
    private $tabela = "produto";



    public function insere($produto)
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

    public function altera($produto)
    {
        $query = "UPDATE " . $this->tabela .
            " SET nome = :nome, descricao = :descricao, foto = :foto" .
            " WHERE id = :id";

        $prep = $this->connection->prepare($query);


        $prep->bindParam(":nome", $produto->getNome());
        $prep->bindParam(":descricao", $produto->getDescricao());
        $prep->bindParam(":foto", $produto->getFoto());
        $prep->bindParam(":id", $produto->getId());


        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getPorCodigo($id)
    {

        $produto = null;

        $query = "SELECT id, nome, descricao, foto FROM " . $this->tabela . "
        WHERE id = :id LIMIT 1";


        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $produto = new Produto($row['id'], $row['nome'], $row['descricao'], $row['foto']);
        }

        return $produto;
    }

    public function getPorNome($nome)
    {
        $produto = null;

        $query = "SELECT id, nome, descricao, foto FROM " . $this->tabela . " WHERE nome :nome ? LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $produto = new Produto($row['id'], $row['nome'], $row['descricao'], $row['foto']);
        }

        return $produto;
    }

    public function getTodos()
    {
        $query = "SELECT id, nome, descricao, foto FROM " . $this->tabela;
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


    public function deleta($produto)
    {
        $query = "DELETE FROM " . $this->tabela .
            " WHERE id = :id";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':id', $produto->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}

?>