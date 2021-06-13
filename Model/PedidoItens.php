<?php

class Pedidoitens
{

    private $id;
    private $quantidade;
    private $pedido;
    private $produto;
    private $preco;

    public function __construct($id, $quantidade, $pedido, $produto, $preco)
    {
        $this->id = $id;
        $this->quantidade = $quantidade;
        $this->pedido = $pedido;
        $this->produto = $produto;
        $this->preco = $preco;
    }

    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }


    public function getPedido()
    {
        return $this->pedido;
    }

    public function setPedido($pedido)
    {
        $this->pedido = $pedido;
    }


    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function getPreco()
    {
        return $this->preco;
    }


    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
}
