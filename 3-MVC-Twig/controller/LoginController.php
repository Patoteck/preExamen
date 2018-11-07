<?php

include_once "./view/Login.php";
include_once "class/ManagePermissions.php";
include_once './controller/HomeController.php';

class LoginController{

	private static $instance;

	public static function getInstance(){

		if (!isset(self::$instance)) {
				
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function login(){

		$array = array('login' => 'Contenido del arreglo de LoginController pasado por parametro a la vista');
		$view = new Login();
		$view->show($array, 'login');
	}


	public function validateLogin(){

		ManagePermissions::getInstance()->initializeSession();

		if (isset($_POST['username']) && isset($_POST['password'])) 
        {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $authenticated = ManagePermissions::getInstance()->passAuthenticated($username, $password);

            if ($authenticated) {

                $_SESSION['username'] = $username;
                $_SESSION['userId'] = UserRepository::getInstance()->getUserByUsername($username)->getId();
            }
                
            HomeController::getInstance()->home();
        }
	}

	public function closeSession(){

        ManagePermissions::getInstance()->initializeSession();
        $_SESSION = [];
        HomeController::getInstance()->home();
    }
}