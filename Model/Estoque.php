<?php

class Estoque
{
    private $idEstoque;
    private $quantidade;
    private $preco;
    private $idProduto;

    public function __construct($quantidade, $preco, $idProduto)
    {
        $this->quantidade = $quantidade;
        $this->preco = $preco;
        $this->idProduto = $idProduto;
    }


    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }


    public function getIdProduto()
    {
        return $this->idProduto;
    }


    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;
    }

    public function getId()
    {
        return $this->idEstoque;
    }

    public function setId($idEstoque)
    {
        $this->idEstoque = $idEstoque;
    }
}
