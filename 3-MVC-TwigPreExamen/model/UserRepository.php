<?php

require_once('./model/User.php');
require_once('./model/PDORepository.php');

class UserRepository extends PDORepository
{

  private static $instance;

  public static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function getUsernameByUser($username)
  {
    $stmt = $this->executeQuery("SELECT * FROM usuario WHERE usuario=?;", [$username]);
    $user = $stmt->fetchAll(PDO::FETCH_CLASS, "User");
    if (!is_null($user)){
      if (count($user) > 0){
        return $user[0];
      }
    }
    $user = new User();
    $user->setClave('');
    return $user;
  }
}
