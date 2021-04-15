<?php

class Cliente
{
    private $nome;
    private $telefone;
    private $email;
    private $cartaoCredito;

    public function __construct($nome, $telefone, $email, $cartaoCredito)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cartaoCredito = $cartaoCredito;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCartaoCredito()
    {
        return $this->cartaoCredito;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setCartaoCredito($cartaoCredito)
    {
        $this->cartaoCredito = $cartaoCredito;
    }
}
