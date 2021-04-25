<?php
interface DaoUsuario{

    public function insere($user);
    public function altera($user);
    public function getPorCodigo($id);
    public function getPorLogin($name);
    public function getTodos();
    public function deleta($user);
    
}
