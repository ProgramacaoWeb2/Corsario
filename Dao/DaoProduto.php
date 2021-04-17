<?php

interface DaoProduto{

    public function insere($produto);
    public function altera($produto);
    public function getPorCodigo($id);
    public function getPorNome($nome);
    public function getTodos();
    public function deleta($produto);
    
}
