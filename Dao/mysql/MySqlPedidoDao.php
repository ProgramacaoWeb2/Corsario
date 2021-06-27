<?php

include_once('./Dao/DaoPedido.php');
include_once('./Dao/Dao.php');

class MySqlPedidoDao extends Dao implements DaoPedido
{
    private $tabela = "pedido";



    public function insere($pedido)
    {

        $query = "INSERT INTO " . $this->tabela . "(numero, dataPedido,  dataEntrega, situacao, idUsuario) VALUES" . "(:numero, STR_TO_DATE(:dataPedido, '%Y-%m-%d'),STR_TO_DATE(:dataEntrega, '%Y-%m-%d'), :situacao, :idUsuario )";

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
            " SET numero = :numero, dataPedido = STR_TO_DATE(:dataPedido, '%Y-%m-%d'), dataEntrega = STR_TO_DATE(:dataEntrega, '%Y-%m-%d'), situacao = :situacao,  idUsuario = :idUsuario " .
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

        $query = "SELECT idPedido ,numero, STR_TO_DATE(dataPedido, '%Y-%m-%d') as dataPedido, STR_TO_DATE(dataEntrega, '%Y-%m-%d') as dataEntrega, situacao, idUsuario FROM " . $this->tabela . " WHERE idPedido = :idPedido LIMIT 1";


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

            if (!empty($searchArray['orderNameInput']))
                $conditions[] = ' idUsuario = ' . $searchArray['orderNameInput'];

            if (!empty($searchArray['idInput']))
                $conditions[] = ' idPedido = ' . $searchArray['idInput'];

            if (!empty($searchArray['numeroInput']))
                $conditions[] = ' numero = ' . $searchArray['numeroInput'];

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
                "id_pedido" => $row['idPedido'],
                "id_cliente" => $row['idUsuario'],
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

    public function getTodosPaginacao($limit, $offset, $searchArray=NULL)
    {
        $query =  "SELECT idPedido ,numero, dataPedido, dataEntrega, situacao, idUsuario FROM " . $this->tabela;

        $conditions = [];

        if(isset($_SESSION["userType"]) && $_SESSION["userType"] == 0){
            $conditions[] = ' idUsuario = ' .$_SESSION["idUsuario"];
        }

        if (isset($searchArray)) {
           
            if (!empty($searchArray['nomeCliente']))
                $conditions[] = ' idUsuario = ' . $searchArray['nomeCliente'];

            if (!empty($searchArray['idPedido']))
                $conditions[] = ' idPedido = ' . $searchArray['idPedido'];

            if (!empty($searchArray['numeroPedido']))
                $conditions[] = ' numero = ' . $searchArray['numeroPedido'];

        }

        if ($conditions) {
            $query .= " WHERE " . implode(" AND ", $conditions);
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

    public function countPedidos(){

        $query =  "SELECT COUNT(idPedido) as ultimo FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();


        $row = $stmt->fetch();
        if ($row) {
            return $row[0];
        }

        return null;
    }

    
}
