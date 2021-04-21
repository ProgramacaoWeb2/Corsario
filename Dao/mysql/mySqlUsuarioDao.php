<?php

include_once('./Dao/DaoUsuario.php');
include_once('./Dao/Dao.php');

class MySqlUsuarioDao extends Dao implements DaoUsuario{
    
    private $table_name = 'Usuario';


    public function insere($user){
        $query = "INSERT INTO " . $this->table_name . 
        " (login, senha, nome) VALUES" .
        " (:login, :senha, :nome)";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(":login", $user->getLogin());
        $stmt->bindValue(":senha", md5($user->getPassword()));
        $stmt->bindValue(":nome", $user->getName());
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