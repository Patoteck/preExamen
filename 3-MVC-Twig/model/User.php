<?php

class User
{
	private $id;
    private $email;
    private $username;
    private $password;
    private $updated_at;
    private $created_at;
    private $activo;
    private $first_name;
    private $last_name;
    private $roles;
    
    public function __construct(){
   
    }

    function  __set($name, $value){
        switch ($name) {
        case "id":
            $this->id = $value;
            break;
        case "email":
            $this->email = $value;
            break;
        case "username":
            $this->username = $value;
            break;
        case "password":
            $this->password = $value;
            break;
        case "updated_at":
            $this->updated_at = $value;
            break;
        case "created_at":
            $this->created_at = $value;
            break;
        case "activo":
            $this->activo = $value;
            break;
        case "first_name":
            $this->first_name = $value;
            break;
        case "last_name":
            $this->last_name = $value;
            break;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getRoles(){
        return $this->roles;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getUpdated_at(){
        return $this->updated_at;
    }

    public function getCreated_at(){
        return $this->created_at;
    }

    public function getActivo(){
        return $this->activo;
    }

    public function getFirst_name(){
        return $this->first_name;
    }

    public function getLast_name(){
        return $this->last_name;
    }

     public function setId($id){
        $this->id = $id;
     }

     public function setEmail($email){
         $this->email = $email;
    }

    public function setUsername($username){
         $this->username = $username;
    }

    public function setPassword($password){
         $this->password = $password;
    }

    public function setUpdated_at($updated_at){
         $this->updated_at = $updated_at;
    }

    public function setCreated_at($created_at){
         $this->created_at = $created_at;
    }

    public function setActivo($activo){
         $this->activo = $activo;
    }

    public function setFirst_name($first_name){
         $this->first_name = $first_name;
    }

    public function setLast_name($last_name){
         $this->last_name = $last_name;
    }

    public function setRoles($roles){
        $this->roles = $roles;
    }
}
?>