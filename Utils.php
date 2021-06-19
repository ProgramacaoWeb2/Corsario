<?php

class TResult {

    public $status;
    public $message;
    public  $setUnavailable;
    public  $qtd;

    

    public function __construct($status, $message, $setUnavailable = false,$qtd = 0 )
    {
        $this->status = $status;
        $this->message = $message;
        $this->setUnavailable = $setUnavailable;
        $this->qtd = $qtd;
    }
}

class ETipoUsuario {
    const cliente = 0;
    const interno = 1;
}

class SessionCart {
    public $idProduto;
    public $qtd;
}


function array_remove_object(&$array, $value, $prop)
{
    return array_filter($array, function($a) use($value, $prop) {
        return $a->$prop !== $value;
    });
}
