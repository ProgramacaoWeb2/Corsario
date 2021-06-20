<?php

include_once('./Dao/DaoEstoque.php');
include_once('./Dao/Dao.php');

class MySqlEstoqueDao extends Dao implements DaoEstoque
{
    private $tabela = "estoque";



    public function insere($estoque)
    {

        $query = "INSERT INTO " . $this->tabela . "(fkProdutoEstoque,quantidade, preco ) VALUES" . "(:fkProdutoEstoque,:quantidade,:preco)";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":fkProdutoEstoque", $estoque->getIdProduto());
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
            " SET quantidade = :quantidade, preco = :preco, fkProdutoEstoque =:fkProdutoEstoque" .
            " WHERE idEstoque = :idEstoque";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":quantidade", $estoque->getQuantidade());
        $prep->bindValue(":preco", $estoque->getPreco());
        $prep->bindValue(":fkProdutoEstoque", $estoque->getIdProduto());
        $prep->bindValue(":idEstoque", $estoque->getId());


        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getPorCodigo($id)
    {

        $estoque = null;

        $query = "SELECT idEstoque,quantidade, fkProdutoEstoque preco FROM " . $this->tabela . " WHERE idEstoque = :idEstoque LIMIT 1";


        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":idEstoque", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $estoque = new Estoque($row['idEstoque'], $row['quantidade'], $row['preco'], $row['fkProdutoEstoque']);
        }

        return $estoque;
    }

    public function getPorPreco($preco)
    {
        $estoque = null;

        $query = "SELECT idEstoque,quantidade, preco, fkProdutoEstoque FROM " . $this->tabela . " WHERE preco = :preco LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":preco", $preco);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $estoque = new Estoque($row['idEstoque'], $row['quantidade'], $row['preco'],  $row['fkProdutoEstoque']);
        }

        return $estoque;
    }

    public function getTodos()
    {
        $query = "SELECT idEstoque,quantidade, preco, fkProdutoEstoque  FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $estoques = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $estoque = new Estoque($idEstoque, $quantidade, $preco, $fkProdutoEstoque);
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

    public function pesquisaTodosProdutos()
    {
        $query = "SELECT * FROM " . $this->tabela .  " as estoque, produto as produto where produto.idProduto = estoque.fkProdutoEstoque";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $estoques = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $estoque = new Estoque($idEstoque, $quantidade, $preco, $fkProdutoEstoque);
            $estoques[] = $estoque;
        }
        return $estoques;
    }

    public function pesquisaProdutoPorId($idProduto)
    {

        $estoque = null;

        $query = "SELECT * FROM " . $this->tabela .  " as estoque where estoque.fkProdutoEstoque = :idProduto";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":idProduto", $idProduto);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $estoque = new Estoque($row['idEstoque'] ,$row['quantidade'], $row['preco'], $row['fkProdutoEstoque']);
        }

        return $estoque;
    }

    public function alteraPorProduto($estoque)
    {
    
        $query = "UPDATE " . $this->tabela .
            " SET quantidade = :quantidade, preco = :preco ".
            " WHERE fkProdutoEstoque =:fkProdutoEstoque";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":quantidade", $estoque->getQuantidade());
        $prep->bindValue(":preco", $estoque->getPreco());
        $prep->bindValue(":fkProdutoEstoque", $estoque->getIdProduto());


        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function ultimoIdCadastrado()
    {
        $query =  "SELECT MAX(idEstoque) as ultimo FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();


        $row = $stmt->fetch();
        if ($row) {
            return $row[0];
        }

        return null;
    }

}
