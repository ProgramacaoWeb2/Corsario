<?php

include_once('./Dao/DaoPedido.php');
include_once('./Dao/Dao.php');

class MySqlPedidoDao extends Dao implements DaoPedido
{
    private $tabela = "pedido";



    public function insere($pedido)
    {

        $query = "INSERT INTO " . $this->tabela . "(numero, dataPedido, dataEntrega, situacao, idUsuario) VALUES" . "(:numero,:dataPedido,:dataEntrega, :situacao, :idUsuario )";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":numero", $pedido->getNumero());
        $prep->bindValue(":dataPedido", $pedido->getDataPedido());
        $prep->bindValue(":dataEntrega", $pedido->getDataEntrega());
        $prep->bindValue(":situacao", $pedido->getSituacao());
        $prep->bindValue(":idUsuario", $pedido->getUsuario());

        if ($prep->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function altera($pedido)
    {
        $query = "UPDATE " . $this->tabela .
            " SET numero = :numero, dataPedido = :dataPedido, dataEntrega = :dataEntrega, situacao = :situacao,  idUsuario = :idUsuario " .
            " WHERE idPedido = :idPedido";

        $prep = $this->connection->prepare($query);


        $prep->bindValue(":numero", $pedido->getNumero());
        $prep->bindValue(":dataPedido", $pedido->getDataPedido());
        $prep->bindValue(":dataEntrega", $pedido->getDataEntrega());
        $prep->bindValue(":situacao", $pedido->getSituacao());
        $prep->bindValue(":idUsuario", $pedido->getUsuario());
        $prep->bindValue(":idPedido", $pedido->getId());

        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getPorCodigo($id)
    {

        $pedido = null;

        $query = "SELECT idPedido ,numero, dataPedido, dataEntrega, situacao, idUsuario FROM " . $this->tabela . " WHERE idPedido = :idPedido LIMIT 1";


        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":idPedido", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $pedido = new Pedido($row['idPedido'], $row['numero'], $row['dataPedido'], $row['dataEntrega'], $row['situacao'], $row['idUsuario']);
        }

        return $pedido;
    }


    public function getTodos($searchArray = NULL)
    {
        $query = "SELECT idPedido ,numero, dataPedido, dataEntrega, situacao, idUsuario FROM " . $this->tabela;

        $conditions = [];

        if (isset($searchArray)) {

            if (!empty($searchArray['idUsuario']))
                $conditions[] = ' idUsuario = ' . $searchArray['idUsuario'];

            if (!empty($searchArray['idPedido']))
                $conditions[] = ' idPedido = ' . $searchArray['idPedido'];

            if (!empty($searchArray['numero']))
                $conditions[] = ' numero = ' . $searchArray['numero'];

            if ($conditions) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }
        }


        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $pedidos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $pedido = new Pedido($idPedido, $numero, $dataPedido, $dataEntrega, $situacao, $idUsuario);
            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

    public function getTodosJSON($searchArray = NULL)
    {
        $query = "SELECT idPedido,numero, dataPedido, dataEntrega, situacao, idUsuario FROM " . $this->tabela;

        $conditions = [];

        if (isset($searchArray)) {

            // if (!empty($searchArray['idUsuario']))
            //     $conditions[] = ' idUsuario = ' . $searchArray['idUsuario'];

            if (!empty($searchArray['idPedido']))
                $conditions[] = ' idPedido = ' . $searchArray['idPedido'];

            if ($conditions) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }
        }


        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $pedidos = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $itens = $this->getItensJSON($idPedido);

            array_push($pedidos, [
                "num_pedido" => $row['idPedido'],
                "num_cliente" => $row['idUsuario'],
                "dt_pedido" => $row['dataPedido'],
                "dt_entrega" => $row['dataEntrega'],
                "situacao" => $row['situacao'],
                "itens" =>  $itens
            ]);
        }
        return stripslashes(json_encode($pedidos,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function getItensJSON($idPedido)
    {
        $query = "SELECT idItemPedido, quantidade, fkPedido, fkProduto, preco FROM pedidoitens WHERE fkPedido = ".$idPedido;

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $itens = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            array_push($itens, [
                "id_produto" => $row['fkProduto'],
                "preco" => $row['preco'],
                "qtd" => $row['quantidade']
            ]);

        }
        return $itens;
    }

    public function deleta($pedido)
    {
        $query = "DELETE FROM " . $this->tabela .
            " WHERE idPedido = :idPedido";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':idPedido', $pedido->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getTodosPaginacao($limit, $offset, $searchArray)
    {
        $query =  "SELECT idPedido ,numero, dataPedido, dataEntrega, situacao, idUsuario FROM " . $this->tabela;

        $conditions = [];

        if (isset($searchArray)) {

            if (!empty($searchArray['idUsuario']))
                $conditions[] = ' idUsuario = ' . $searchArray['idUsuario'];

            if (!empty($searchArray['idPedido']))
                $conditions[] = ' idPedido = ' . $searchArray['idPedido'];

            if (!empty($searchArray['numero']))
                $conditions[] = ' numero = ' . $searchArray['numero'];

            if ($conditions) {
                $query .= " WHERE " . implode(" AND ", $conditions);
            }
        }


        $query =   $query . " limit " . $limit . " offset " . $offset;

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $pedidos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $pedido = new Pedido($idPedido, $numero, $dataPedido, $dataEntrega, $situacao, $idUsuario);
            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

    public function countPedido()
    {
        $query =  "SELECT COUNT(idPedido) as ultimo FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();


        $row = $stmt->fetch();
        if ($row) {
            return $row[0];
        }

        return null;
    }


    public function ultimoIdCadastrado()
    {
        $query =  "SELECT MAX(IdPedido) as ultimo FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();


        $row = $stmt->fetch();
        if ($row) {
            return $row[0];
        }

        return null;
    }
}
