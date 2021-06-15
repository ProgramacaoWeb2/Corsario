<?php

interface DaoPedido{

    public function insere($pedido);
    public function altera($pedido);
    public function getPorCodigo($id);
    public function getTodos($searchArray);
    public function deleta($pedido);
    
}
