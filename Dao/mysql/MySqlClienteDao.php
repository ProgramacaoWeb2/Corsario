<?php

include_once('./Dao/DaoCliente.php');
include_once('./Dao/Dao.php');

class MySqlClienteDao extends Dao implements DaoCliente
{
    private $tabela = "cliente";

    public function insere($cliente)
    {

        $query = "INSERT INTO " . $this->tabela . "(nome, telefone , email, cartaoCredito) VALUES" . "(:nome,:telefone,:email,:cartaoCredito )";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":nome", $cliente->getNome());
        $prep->bindValue(":telefone", $cliente->getTelefone());
        $prep->bindValue(":email", $cliente->getEmail());
        $prep->bindValue(":cartaoCredito", $cliente->getCartaoCredito());

        if ($prep->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function altera($cliente)
    {
        $query = "UPDATE " . $this->tabela .
            " SET nome = :nome, telefone = :telefone, email = :email, cartaoCredito = :cartaoCredito" .
            " WHERE idCliente = :idCliente";

        $prep = $this->connection->prepare($query);


        $prep->bindValue(":nome", $cliente->getNome());
        $prep->bindValue(":telefone", $cliente->getTelefone());
        $prep->bindValue(":email", $cliente->getEmail());
        $prep->bindValue(":cartaoCredito", $cliente->getCartaoCredito());
        $prep->bindValue(":idCliente", $cliente->getId());


        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getPorCodigo($id)
    {

        $cliente = null;

        $query = "SELECT idCliente, nome, telefone, email, cartaoCredito FROM " . $this->tabela . " WHERE idCliente = :idCliente LIMIT 1";


        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":idCliente", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $cliente = new Cliente($row['idCliente'], $row['nome'], $row['telefone'], $row['email'], $row['cartaoCredito']);
        }

        return $cliente;
    }

    public function getPorNome($nome)
    {
        $cliente = null;

        $query = "SELECT idCliente, nome, telefone, email , cartaoCredito FROM " . $this->tabela . " WHERE nome = :nome LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":nome", $nome);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $cliente = new Cliente($row['idCliente'], $row['nome'], $row['telefone'], $row['email'], $row("cartaoCredito"));
        }

        return $cliente;
    }

    public function getTodos()
    {
        $query = "SELECT idCliente, nome, telefone, email, cartaoCredito FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $clientes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $cliente = new Cliente($idCliente, $nome, $telefone, $email, $cartaoCredito);
            $clientes[] = $cliente;
        }
        return $clientes;
    }


    public function deleta($cliente)
    {
        $query = "DELETE FROM " . $this->tabela .
            " WHERE idCliente = :idCliente";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':idCliente', $cliente->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
