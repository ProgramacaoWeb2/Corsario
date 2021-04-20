<?php

include_once('./Dao/DaoUser.php');
include_once('./Dao/Dao.php');

class mySqlDaoUser extends mySqlDaoFactory implements DaoUser{
    
    private $table_name = 'usuario';


    public function Add($user){
        $query = "INSERT INTO " . $this->table_name . 
        " (login, senha, nome) VALUES" .
        " (:login, :senha, :nome)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":login", $user->getLogin());
        $stmt->bindParam(":senha", md5($user->getSPassword()));
        $stmt->bindParam(":nome", $user->getName());

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function Update($user){

    }
    public function GetById($id){

    }
    public function GetByName($name){

    }
    public function Get(){

    }
    public function Delete($user){

    }
}


?>