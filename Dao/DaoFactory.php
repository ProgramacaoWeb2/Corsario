<?php

abstract class DaoFactory
{

    protected abstract function getConnection();

    public abstract function getProdutoDao();
    public abstract function User();
    public abstract function getClienteDao();
    public abstract function getEnderecoDao();
    public abstract function getEstoqueDao();
    public abstract function getFornecedorDao();
}
