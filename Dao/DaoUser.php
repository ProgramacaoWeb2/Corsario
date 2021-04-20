<?php

interface DaoUser{

    public function Add($user);
    public function Update($user);
    public function GetById($id);
    public function GetByName($name);
    public function Get();
    public function Delete($user);
    
}
