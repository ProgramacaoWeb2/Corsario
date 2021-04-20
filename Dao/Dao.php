<?php

abstract class DAO{
   

    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection ;
    }





}
