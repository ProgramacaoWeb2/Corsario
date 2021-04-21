<?php

include_once('./Dao/DaoUsuario.php');
include_once('./Dao/Dao.php');

class mySqlUsuarioDao extends mySqlDaoFactory implements DaoUsuario{
    
    private $table_name = 'usuario';


    public function insere($user){
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
    public function altera($user){

    }
    public function getPorCodigo($id){

    }
    public function getPorPreco($name){

    }
    public function getTodos(){

    }
    public function deleta($user){

    }
}


?>