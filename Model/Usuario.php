<?php

class Usuario
{

    private $idUsuario;
    private $login;
    private $senha;
    private $nome;

    public function __construct($id, $login, $password, $name)
    {
        $this->idUsuario = $id;
        $this->login = $login;
        $this->senha = $password;
        $this->nome = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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
