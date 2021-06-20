<?php

include_once('./Dao/DaoProduto.php');
include_once('./Dao/Dao.php');

class MySqlProdutoDao extends Dao implements DaoProduto
{
    private $tabela = "produto";



    public function insere($produto)
    {

        $query = "INSERT INTO " . $this->tabela . "(nome, descricao, foto, fkFornecedorProduto) VALUES" . "(:nome,:descricao,:foto, :fkFornecedorProduto)";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":nome", $produto->getNome());
        $prep->bindValue(":descricao", $produto->getDescricao());
        $prep->bindValue(":foto", $produto->getFoto());
        $prep->bindValue(":fkFornecedorProduto", $produto->getIdFornecedor());

        if ($prep->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function altera($produto)
    {
        $query = "UPDATE " . $this->tabela .
            " SET nome = :nome, descricao = :descricao, foto = :foto, fkFornecedorProduto = :fkFornecedorProduto " .
            " WHERE idProduto = :idProduto";

        $prep = $this->connection->prepare($query);


        $prep->bindValue(":nome", $produto->getNome());
        $prep->bindValue(":descricao", $produto->getDescricao());
        $prep->bindValue(":foto", $produto->getFoto());
        $prep->bindValue(":idProduto", $produto->getId());
        $prep->bindValue(":fkFornecedorProduto", $produto->getIdFornecedor());


        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getPorCodigo($id)
    {

        $produto = null;

        $query = "SELECT t0.idProduto, t0.nome, t0.descricao, t0.foto, t0.fkFornecedorProduto, t1.idEstoque, t1.quantidade, t1.preco FROM ".$this->tabela." t0 JOIN estoque t1 on t1.fkProdutoEstoque = t0.idProduto WHERE t0.idProduto = :idProduto LIMIT 1";


        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":idProduto", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $estoque = new Estoque($row['idEstoque'],$row['quantidade'], $row['preco'], $row['idProduto']);
            $produto = new Produto($row['idProduto'], $row['nome'], $row['descricao'], $row['foto'], $row['fkFornecedorProduto'],$estoque );
        }

        return $produto;
    }

    public function getPorNome($nome)
    {
        $produto = null;

        $query = "SELECT idProduto, nome, descricao, foto, fkFornecedorProduto FROM " . $this->tabela . " WHERE nome = :nome LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":nome", $nome);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $produto = new Produto($row['idProduto'], $row['nome'], $row['descricao'], $row['foto'], $row['fkFornecedorProduto']);
        }

        return $produto;
    }

    public function getTodos()
    {
        $query = "SELECT t0.idProduto, t0.nome, t0.descricao, t0.foto, t0.fkFornecedorProduto, t1.idEstoque, t1.quantidade, t1.preco FROM ".$this->tabela." t0 JOIN estoque t1 on t1.fkProdutoEstoque = t0.idProduto";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $produtos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $estoque = new Estoque(null,$quantidade, $preco, $idProduto);
            $produto = new Produto($idProduto, $nome, $descricao, $foto, $fkFornecedorProduto, $estoque);
            $produtos[] = $produto;
        }
        return $produtos;
    }

    public function getByList($list){
        $query = "SELECT t0.idProduto, t0.nome, t0.descricao, t0.foto, t0.fkFornecedorProduto, t1.idEstoque, t1.quantidade, t1.preco FROM ".$this->tabela." t0 JOIN estoque t1 on t1.fkProdutoEstoque = t0.idProduto WHERE t0.idProduto in (".implode(" , ", $list).")";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $produtos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            $estoque = new Estoque(null,$quantidade, $preco, $idProduto);
            $produto = new Produto($idProduto, $nome, $descricao, $foto, $fkFornecedorProduto, $estoque);
            $produtos[] = $produto;
        }
        return $produtos;
    }


    public function deleta($produto)
    {
        $query = "DELETE FROM " . $this->tabela .
            " WHERE idProduto = :idProduto";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':idProduto', $produto->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    public function getPorNomeId($idProduto, $nome)
    {
        $produto = NULL;

        $query = "SELECT idProduto, nome, descricao, foto, fkFornecedorProduto  FROM  " . $this->tabela . " WHERE nome = :nome and idProduto = :idProduto LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":idProduto", $idProduto);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $produto = new Produto($row['idProduto'], $row['nome'], $row['descricao'], $row['foto'], $row['fkFornecedorProduto']);
        }

        return $produto;
    }

    public function getTodosPaginacao($limit, $offset)
    {
        $query =  "SELECT idProduto, nome, descricao, foto, fkFornecedorProduto FROM " . $this->tabela . " limit " . $limit . " offset " . $offset ; 
        
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $produtos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $produto = new Produto($idProduto, $nome, $descricao, $foto, $fkFornecedorProduto);
            $produtos[] = $produto;
        }
        return $produtos;
    }

    public function ultimoIdCadastrado()
    {
        $query =  "SELECT MAX(idProduto) as ultimo FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();


        $row = $stmt->fetch();
        if ($row) {
            return $row[0];
        }

        return null;
    }

    public function countProdutos()
    {
        $query =  "SELECT COUNT(idProduto) as ultimo FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();


        $row = $stmt->fetch();
        if ($row) {
            return $row[0];
        }

        return null;
    }



}
