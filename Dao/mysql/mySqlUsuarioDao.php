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

        $query = "SELECT idUsuario, login, nome FROM " . $this->table_name;
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $usuarios = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $usuarios[] = new Usuario($idUsuario,$login,null,$nome);
        }
        
        return $usuarios;

    }
    public function deleta($idUsuario){
        $query = "DELETE FROM " . $this->table_name . 
        " WHERE idUsuario = :idUsuario";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(":idUsuario", $idUsuario);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}


?>