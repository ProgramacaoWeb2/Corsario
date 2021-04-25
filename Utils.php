<?php

class TResult {

    public $status;
    public $message;

    public function __construct($status, $message)
    {
        $this->status = $status;
        $this->message = $message;
    }
}

class ETipoUsuario {
    const cliente = 0;
    const interno = 1;
};
