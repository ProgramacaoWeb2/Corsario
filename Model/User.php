<?php

class User
{

    private $id;
    private $login;
    private $password;
    private $name;

    public function __construct($id, $login, $password, $name)
    {
        $this->id = $id;
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
        return $this->password;
    }


    public function setPassword($password)
    {
        $this->senha = $password;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setName($name)
    {
        $this->name = $name;
    }
}
