<?php

include_once('./Dao/DaoFornecedor.php');
include_once('./Dao/Dao.php');

class MySqlFornecedorDao extends Dao implements DaoFornecedor
{
    private $tabela = "fornecedor";

    public function insere($fornecedor)
    {

        $query = "INSERT INTO " . $this->tabela . " (nome, descricao, telefone , email, idEndereco) VALUES " . " (:nome,:descricao,:telefone, :email, :idEndereco)";
 
        $prep = $this->connection->prepare($query);

        $prep->bindValue(":nome", $fornecedor->getNome());
        $prep->bindValue(":descricao", $fornecedor->getDescricao());
        $prep->bindValue(":telefone", $fornecedor->getTelefone());
        $prep->bindValue(":email", $fornecedor->getEmail());
        $prep->bindValue(":idEndereco", $fornecedor->getIdEndereco());

        if ($prep->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function altera($fornecedor)
    {
        $query = "UPDATE " . $this->tabela .
            " SET nome = :nome, descricao = :descricao, telefone = :telefone, email = :email, idEndereco = :idEndereco " .
            " WHERE idFornecedor = :idFornecedor";

        $prep = $this->connection->prepare($query);


        $prep->bindValue(":nome", $fornecedor->getNome());
        $prep->bindValue(":descricao", $fornecedor->getDescricao());
        $prep->bindValue(":telefone", $fornecedor->getTelefone());
        $prep->bindValue(":email", $fornecedor->getEmail());
        $prep->bindValue(":idFornecedor", $fornecedor->getId());
        $prep->bindValue(":idEndereco", $fornecedor->getIdEndereco());



        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getPorCodigo($id)
    {

        $fornecedorNew = null;

        $query = "SELECT idFornecedor, nome, descricao, telefone, email, idEndereco FROM " . $this->tabela . " WHERE idFornecedor = :idFornecedor LIMIT 1";


        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":idFornecedor", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $fornecedorNew = new Fornecedor($row['idFornecedor'], $row['nome'], $row['descricao'], $row['telefone'], $row['email'], $row['idEndereco']);
        }
        return $fornecedorNew;
    }

    public function getPorNome($nome)
    {
        $fornecedor = null;

        $query = "SELECT idFornecedor, nome, descricao, telefone, email, idEndereco FROM " . $this->tabela . " WHERE nome = :nome LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":nome", $nome);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $fornecedor = new Fornecedor($row['idFornecedor'], $row['nome'], $row['descricao'], $row['telefone'], $row['email'], $row['idEndereco']);
        }

        return $fornecedor;
    }

    public function getTodos()
    {
        $query = "SELECT idFornecedor, nome, descricao, telefone, email, idEndereco FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $fornecedores = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $fornecedor = new Fornecedor($idFornecedor, $nome, $descricao, $telefone, $email, $idEndereco);
            $fornecedores[] = $fornecedor;
        }
        return $fornecedores;
    }


    public function deleta($fornecedor)
    {
        $query = "DELETE FROM " . $this->tabela .
            " WHERE idFornecedor = :idFornecedor";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':idFornecedor', $fornecedor->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getPorNomeId($idFornecedor, $nome)
    {
        $fornecedor = NULL;

        $query = "SELECT idFornecedor, nome, descricao, telefone, email, idEndereco  FROM  " . $this->tabela . " WHERE nome = :nome and idFornecedor = :idFornecedor LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":idFornecedor", $idFornecedor);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $fornecedor = new Fornecedor($row['idFornecedor'], $row['nome'], $row['descricao'], $row['telefone'], $row['email'], $row['idEndereco']);
        }

        return $fornecedor;
    }
}
