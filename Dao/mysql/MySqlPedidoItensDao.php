<?php

include_once('./Dao/DaoPedidoItens.php');
include_once('./Dao/Dao.php');

class MySqlPedidoItens extends Dao implements DaoPedidoItens
{
    private $tabela = "pedidoitens";



    public function insere($pedidoItens)
    {

        $query = "INSERT INTO " . $this->tabela . "(quantidade, fkPedido, fkProduto, preco) VALUES" . "(:quantidade,:fkPedido,:fkProduto, :preco)";

        $prep = $this->connection->prepare($query);

        $prep->bindValue(":quantidade", $pedidoItens->getQuantidade());
        $prep->bindValue(":fkPedido", $pedidoItens->getPedido());
        $prep->bindValue(":fkProduto", $pedidoItens->getProduto());
        $prep->bindValue(":preco", $pedidoItens->getPreco());

        if ($prep->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function altera($pedidoItens)
    {
        $query = "UPDATE " . $this->tabela .
            " SET quantidade = :quantidade, fkPedido = :fkPedido, fkProduto = :fkProduto, preco = :preco " .
            " WHERE idItemPedido = :idItemPedido";

        $prep = $this->connection->prepare($query);


        $prep->bindValue(":quantidade", $pedidoItens->getQuantidade());
        $prep->bindValue(":fkPedido", $pedidoItens->getPedido());
        $prep->bindValue(":fkProduto", $pedidoItens->getProduto());
        $prep->bindValue(":preco", $pedidoItens->getPreco());
        $prep->bindValue(":idItemPedido", $pedidoItens->getId());


        if ($prep->execute()) {
            return true;
        }

        return false;
    }

    public function getPorCodigo($id)
    {

        $pedido = null;

        $query = "SELECT idItemPedido, quantidade, fkPedido, fkProduto, preco FROM " . $this->tabela . " WHERE idItemPedido = :idItemPedido LIMIT 1";


        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(":idItemPedido", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $pedido = new Produto($row['idItemPedido'], $row['quantidade'], $row['fkPedido'], $row['fkProduto'], $row['preco']);
        }

        return $pedido;
    }


    public function getTodos()
    {
        $query = "SELECT idItemPedido, quantidade, fkPedido, fkProduto, preco FROM " . $this->tabela;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $pedidos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $pedido = new Pedidoitens($idItemPedido, $quantidade, $pedido, $produto, $preco);
            $pedidos[] = $pedido;
        }
        return $pedidos;
    }


    public function deleta($pedidoItens)
    {
        $query = "DELETE FROM " . $this->tabela .
            " WHERE idItemPedido = :idItemPedido";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(':idItemPedido', $pedidoItens->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    public function getTodosPaginacao($limit, $offset)
    {
        $query =  "SELECT idItemPedido, quantidade, fkPedido, fkProduto, preco FROM " . $this->tabela . " limit " . $limit . " offset " . $offset;

        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $pedidos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $pedido = new Pedidoitens($idItemPedido, $quantidade, $pedido, $produto, $preco);
            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

    public function getPedidos($id, $limit, $offset)
    {
        $query =  "SELECT p.* FROM pedidoitens as pei, pedido as p WHERE p.idPedido = pei. :id " . " limit " . $limit . " offset " . $offset;

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $pedidos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $pedido = new Pedido($idPedido, $numero, $dataPedido, $dataEntrega, $situacao, $idUsuario);
            $pedidos[] = $pedido;
        }
        return $pedidos;
    }

    public function getProdutos($idProduto, $limit, $offset)
    {
        $query =  "SELECT p.* FROM pedidoitens as pei, produto as p WHERE p.idProduto = pei. :idProduto"   . " limit " . $limit . " offset " . $offset;

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':idProduto', $idProduto);
        $stmt->execute();

        $produto = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $produto = new Produto($id, $nome, $descricao, $foto, $idFornecedor);
            $produtos[] = $produto;
        }
        return $produtos;
    }
}
