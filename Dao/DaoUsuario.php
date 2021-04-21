<?php
interface DaoUsuario{

    public function insere($user);
    public function altera($user);
    public function getPorCodigo($id);
    public function getPorPreco($name);
    public function getTodos();
    public function deleta($user);
    
}
