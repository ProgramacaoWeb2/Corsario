<?php

class Pedido{

    private $id;
    private $numero;
    private $dataPedido;
    private $dataEntrega;
    private $situacao;
    private $idUsuario;
    private $Itens;



    public function __construct($id, $numero, $dataPedido, $dataEntrega, $situacao, $idUsuario,$Itens = null)
    {
        $this->id = $id;
        $this->numero = $numero;
        $this->dataPedido = $dataPedido;
        $this->dataEntrega = $dataEntrega;
        $this->situacao = $situacao;
        $this->idUsuario = $idUsuario;
        $this->Itens = $Itens;
    }


    public function getItens()
    {
        return $this->Itens;
    }

    public function getId()
    {
        return $this->id;
    }

  
    public function setId($id)
    {
        $this->id = $id;

    }


    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }


    public function getDataPedido()
    {
        return $this->dataPedido;
    }

    public function setDataPedido($dataPedido)
    {
        $this->dataPedido = $dataPedido;
    }


    public function getDataEntrega()
    {
        return $this->dataEntrega;
    }

    public function setDataEntrega($dataEntrega)
    {
        $this->dataEntrega = $dataEntrega;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }


    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    public function setUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getUsuario()
    {
       return $this->idUsuario;
    }

}
