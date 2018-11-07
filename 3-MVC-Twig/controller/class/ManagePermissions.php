<?php
include_once './model/UserRepository.php'; 

class ManagePermissions{

	private static $instance;

	public static function getInstance(){

		if (!isset(self::$instance)) {
				
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function initializeSession()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();
    }

     public function validateSession()
    {
        $this->initializeSession();
        return isset($_SESSION['username']) ? true : false;
    }

    public function hasRole($role)
    {
        if($this->validateSession()){
			return UserRepository::getInstance()->askRoleByUsername($_SESSION['username'], $role);
        } else {
            return false;
        }
    }

    public function sessionData()
    {
        $this->initializeSession();
        return array(
            'logued' => $this->validateSession(),
            'username' => isset($_SESSION['username'])? $_SESSION['username'] : "",
            'admin' => self::getInstance()->hasRole('administrador')
        );
    }

    public function passAuthenticated($user, $pass)
    {
        return password_verify($pass, UserRepository::getInstance()->pass($user)->getPassword());
    }
}