<?php

interface DaoEstoque{

    public function insere($estoque);
    public function altera($estoque);
    public function getPorCodigo($id);
    public function getPorPreco($preco);
    public function getTodos();
    public function deleta($estoque);
    
}
