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
        $query = "UPDATE " . $this->table_name . 
        " SET login = :login, senha = :senha, nome = :nome" .
        " WHERE idUsuario = :idUsuario";

        $stmt = $this->connection->prepare($query);

        $stmt->bindValue(":login", $user->getLogin());
        $stmt->bindValue(":senha", md5($user->getPassword()));
        $stmt->bindValue(":nome", $user->getName());
        $stmt->bindValue(':idUsuario', $user->getId());

        if($stmt->execute()){
            return true;
        }    
        return false;

    }


    public function getPorCodigo($id){
        $query = "SELECT idUsuario, login, nome, senha FROM " . $this->table_name ." WHERE idUsuario = :idUsuario LIMIT 1 OFFSET 0";
        
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":idUsuario", $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $usuario = null;
        if($row) 
            $usuario = new Usuario($row['idUsuario'],$row['login'],$row['senha'], $row['nome']);
        
        return $usuario;
        


    }
    public function getPorLogin($login){
        $query = "SELECT idUsuario, login, nome, senha FROM " . $this->table_name ." WHERE login = :login LIMIT 1 OFFSET 0";
        
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":login", $login);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $usuario = null;
        if($row) 
            $usuario = new Usuario($row['idUsuario'],$row['login'],$row['senha'], $row['nome']);
        
        return $usuario;
    }

    
    public function getTodos($searchArray= null){

        $query = "SELECT idUsuario, login, nome, senha FROM " . $this->table_name;

        $conditions = [];

        if(isset($searchArray)){

            if(!empty($searchArray['idUsuario']))
                $conditions[] = ' idUsuario = '.$searchArray['idUsuario'];
            

            if(!empty($searchArray['nome']))
                $conditions[] = ' nome LIKE '."'%".$searchArray['nome']."%' ";
            

            if(!empty($searchArray['login']))
                $conditions[] = ' login LIKE '."'%".$searchArray['login']."%' ";
            

            if ($conditions)
            {
                $query .= " WHERE ".implode(" AND ", $conditions);
            }


        }



        $stmt = $this->connection->prepare($query);
        $stmt->execute();
    


      

        $usuarios = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $usuarios[] = new Usuario($idUsuario,$login,$senha,$nome);
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