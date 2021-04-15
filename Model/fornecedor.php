<?php

class Fornecedor{

    private $nome;
    private $descricao;
    private $telefone;
    private $email;

 

    public function __construct($nome, $descricao, $telefone, $email)
    {
        $this->nome =$nome;
        $this->descricao = $descricao;
        $this->telefone = $telefone;
        $this->email = $email;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }


    public function getTelefone()
    {
        return $this->telefone;
    }

 
    public function getEmail()
    {
        return $this->email;
    }


    public function setNome($nome)
    {
        $this->nome = $nome;
    }


    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

    }
    public function setEmail($email)
    {
        $this->email = $email;

    }
}
