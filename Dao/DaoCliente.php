<?php

interface DaoCliente{

    public function insere($cliente);
    public function altera($cliente);
    public function getPorCodigo($id);
    public function getPorNome($nome);
    public function getTodos();
    public function deleta($cliente);
    
}
