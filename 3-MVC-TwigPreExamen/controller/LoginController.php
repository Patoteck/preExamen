<?php

require_once('./view/LoginView.php');
require_once('./controller/class/Session.php');
require_once('./controller/ProductController.php');

class LoginController
{
  private static $instance;

  public static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function loginHome(){
    $array = array('login' => '');
    $array += Session::getInstance()->sessionData();
    $view = new LoginView();
    $view->show('login', $array);
  }

  public function loginError(){
    $array = array('login' => 'El usuario o password son incorrectas');
    $array += Session::getInstance()->sessionData();
    $view = new LoginView();
    $view->show('login', $array);
  }

  private function userAutenticathed($username, $password){
    return password_verify($password, UserRepository::getInstance()->getUsernameByUser($username)->getClave());
  }

  public function validateLogin(){
    if(isset($_POST['username']) && (isset($_POST['password'])))
    {
      $username = trim($_POST['username']);
      $password = trim($_POST['password']);

      if ($this->userAutenticathed($username, $password)){
        $_SESSION['username'] = $username;
        header('Location: index.php');
        return;
      }
    }
    $this->loginError();
  }

  public function closeSession()
  {
    $_SESSION=[];
    $this->loginHome();
  }

}
