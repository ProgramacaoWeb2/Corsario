<?php

interface DaoEndereco{

    public function insere($endereco);
    public function altera($endereco);
    public function getPorCodigo($id);
    public function getPorRua($rua);
    public function getTodos();
    public function deleta($endereco);
    
}
