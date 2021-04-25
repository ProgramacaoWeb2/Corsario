<?php
abstract class Dao{
   

    protected $connection;

    public function __construct($connection)
    {
        $this->connection = $connection ;
    }





}
