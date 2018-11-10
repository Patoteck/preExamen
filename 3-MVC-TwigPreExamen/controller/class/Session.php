<?php

require_once('./model/UserRepository.php');

class Session
{
    private static $instance;

    public static function getInstance()
    {
      if(!isset($instance)){
        self::$instance = new self();
      }
      return self::$instance;
    }

    public function sessionData()
    {
      return array(
        'logued' => (isset($_SESSION['username']))? true:false,
        'username' => (isset($_SESSION['username']))? $_SESSION['username']:''
      );
    }

}
