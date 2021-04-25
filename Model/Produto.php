<?php

class Produto{
    
    private $id;
    private $nome;
    private $descricao;
    private $foto;
    private $idFornecedor;


    public function __construct($id, $nome, $descricao, $foto, $idFornecedor)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->foto = $foto;
        $this->idFornecedor = $idFornecedor;
        
    }

    public function getId()
    {
        return $this->id;
    }

   
    public function setId($id)
    {
        $this->id = $id;

    }


    public function getNome()
    {
        return $this->nome;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }

 
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getFoto()
    {
        return $this->foto;
    }


    public function setFoto($foto)
    {
        $this->foto = $foto;
    }


    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

  
    public function setIdFornecedor($idFornecedor)
    {
        $this->idFornecedor = $idFornecedor;
    }

    /**
     * Get the value of fornecedor
     */ 
    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    /**
     * Set the value of fornecedor
     *
     * @return  self
     */ 
    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }
}



?>