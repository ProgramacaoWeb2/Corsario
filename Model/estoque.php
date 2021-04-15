<?php

class Estoque
{
    
    private $quantidade;
    private $preco;

    public function __construct($quantidade, $preco)
    {
        $this->quantidade = $quantidade;
        $this->preco = $preco;
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
}
