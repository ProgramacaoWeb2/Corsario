<?php

interface DaoFornecedor{

    public function insere($fornecedor);
    public function altera($fornecedor);
    public function getPorCodigo($id);
    public function getPorNome($nome);
    public function getTodos();
    public function deleta($fornecedor);
    
}
