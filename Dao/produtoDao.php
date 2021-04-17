<?php

interface ProdutoDao{

    public function insert($produto);
    public function update($produto);
    public function getCode($id);
    public function getName($nome);
    public function getAll();
    public function delete($produto);
    
}
