<?php

interface DaoPedidoItens{

    public function insere($pedidoItem);
    public function altera($pedidoItem);
    public function getPorCodigo($id);
    public function getTodos();
    public function deleta($pedidoItem);
    
}
