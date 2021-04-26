<?php

include_once('./Dao/DaoEndereco.php');
include_once('./Dao/Dao.php');

class MySqlEnderecoDao extends Dao implements DaoEndereco
{
    private $tabela = "endereco";



    public function insere($endereco)
    {

        $query = "INSERT INTO " . $this->tabela . "(rua, numero, complemento, bairro, cep, cidade, estado) VALUES" . "(:rua,:numero,:complemento,:bairro,:cep,:cidade, :estado)";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":rua", $endereco->getRua());
        $prep->bindValue(":numero", $endereco->getNumero());
        $prep->bindValue(":complemento", $endereco->getComplemento());
        $prep->bindValue(":bairro", $endereco->getBairro());
        $prep->bindValue(":cep", $endereco->getCep());
        $prep->bindValue(":cidade", $endereco->getCidade());
        $prep->bindValue(":estado", $endereco->getEstado());

        if ($prep->execute()) {
            return $this->connection->lastInsertId();
        } else {
            return null;
        }
    }

    public function altera($endereco)
    {
        $query = "UPDATE " . $this->tabela .
            " SET rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro,  cep =  :cep, cidade = :cidade, estado = :estado" .
            " WHERE idEndereco = :idEndereco";

        $prep = $this->connection->prepare($query);



        $prep->bindValue(":rua", $endereco->getRua());
        $prep->bindValue(":numero", $endereco->getNumero());
        $prep->bindValue(":complemento", $endereco->getComplemento());
        $prep->bindValue(":bairro", $endereco->getBairro());
        $prep->bindValue(":cep", $endereco->getCep());
        $prep->bindValue(":cidade", $endereco->getCidade());
        $prep->bindValue(":estado", $endereco->getEstado());
        $prep->bindValue(":idEndereco", $endereco->getId());

        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getPorCodigo($id)
    {

        $endereco = null;

        $query = "SELECT idEndereco, rua, numero, complemento, bairro, cep, cidade, estado FROM " . $this->tabela . " WHERE idEndereco = :idEndereco LIMIT 1";


        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":idEndereco", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $endereco = new Endereco($row['idEndereco'], $row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
        }

        return $endereco;
    }

    public function getPorRua($rua)
    {
        $endereco = null;

        $query = "SELECT idEndereco, rua, numero, complemento, bairro, cep, cidade, estado FROM " . $this->tabela . " WHERE rua = :rua LIMIT 1";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":rua", $rua);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $endereco = new Endereco($row['idEndereco'], $row['rua'], $row['numero'], $row['complemento'], $row['bairro'], $row['cep'], $row['cidade'], $row['estado']);
        }

        return $endereco;
    }

    public function getTodos()
    {
        $query = "SELECT idEndereco, rua, numero, complemento, bairro, cep, cidade, estado FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $enderecos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $endereco = new Endereco($idEndereco, $rua, $numero, $complemento, $bairro, $cep, $cidade, $estado);
            $enderecos[] = $endereco;
        }
        return $enderecos;
    }


    public function deleta($endereco)
    {
        $query = "DELETE FROM " . $this->tabela .
            " WHERE idEndereco = :idEndereco";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':idEndereco', $endereco->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
