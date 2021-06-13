<?php

abstract class DaoFactory
{

    protected abstract function getConnection();

    public abstract function Produto();
    public abstract function Usuario();
    public abstract function Endereco();
    public abstract function Estoque();
    public abstract function Fornecedor();
    public abstract function Pedido();
    public abstract function PedidoItens();
}
