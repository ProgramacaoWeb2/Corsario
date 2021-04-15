<?php

class Endereco
{

    private $rua;
    private $numero;
    private $complemento;
    private $bairro;
    private $cep;
    private $cidade;
    private $estado;

    public function __construct($rua, $numero, $complemento, $bairro, $cep, $cidade, $estado)
    {
        
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getBairro()
    {
        return $this->bairro;
    }


    public function getCep()
    {
        return $this->cep;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setRua($rua)
    {
        $this->rua = $rua;
    }


    public function setNumero($numero)
    {
        $this->numero = $numero;
    }



    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }


    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }



    public function setCep($cep)
    {
        $this->cep = $cep;
    }


    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }



    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
}
