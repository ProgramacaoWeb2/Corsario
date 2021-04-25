<?php

class Usuario
{

    private $idUsuario;
    private $login;
    private $senha;
    private $nome;
    private $tipoUsuario;

    private $telefone;
    private $cartaoCredito;

    public function __construct($id, $login, $password, $name, $tipoUsuario, $telefone, $cartaoCredito)
    {
        $this->idUsuario = $id;
        $this->login = $login;
        $this->senha = $password;
        $this->nome = $name;
        $this->tipoUsuario = $tipoUsuario;

        $this->telefone = $telefone;
        $this->cartaoCredito = $cartaoCredito;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getCartaoCredito()
    {
        return $this->cartaoCredito;
    }

    public function setCartaoCredito($cartaoCredito)
    {
        $this->cartaoCredito = $cartaoCredito;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getUserType()
    {
        return $this->tipoUsuario;
    }

    public function setUserType($tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function getId()
    {
        return $this->idUsuario;
    }

    public function setId($id)
    {
        $this->idUsuario = $id;
    }

    public function getLogin()
    {
        return $this->login;
    }


    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword()
    {
        return $this->senha;
    }


    public function setPassword($password)
    {
        $this->senha = $password;
    }

    public function getName()
    {
        return $this->nome;
    }


    public function setName($name)
    {
        $this->nome = $name;
    }
}

?>
