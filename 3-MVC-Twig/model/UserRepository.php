<?php

include_once "PDORepository.php";
include_once "model/User.php";

class UserRepository extends PDORepository{

	private static $instance;

    public static function getInstance() 
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getUserByUsername($username)
    {
        $stmt = $this->execute("SELECT * FROM usuario WHERE username=?;", [$username]);
        return ($stmt->fetchAll(PDO::FETCH_CLASS, "User")[0]);
    }

    public function pass($username) 
    {    
        $stmt = $this->execute("SELECT * FROM usuario WHERE activo = 1 AND username=?;", [$username]);
       	return ($stmt->fetchAll(PDO::FETCH_CLASS, "User")[0]);
    }

    public function askRoleByUsername($username, $role)
    {
        $answer = $this->execute("SELECT * from rol inner join usuario_tiene_rol on usuario_tiene_rol.rol_id = rol.id inner join usuario on usuario.id = usuario_tiene_rol.usuario_id where rol.nombre =? and usuario.username =?;", [$role, $username]);
         $result = $answer->fetchAll();
        if (!is_null($result))
        {
            if(count($result) > 0){
                return true;            
            } 
        }
        return false;
    }

}