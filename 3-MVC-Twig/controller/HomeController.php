<?php

include_once "./view/Home.php";
include_once "class/ManagePermissions.php";	 

class HomeController{

	private static $instance;

	public static function getInstance(){

		if (!isset(self::$instance)) {
				
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function home(){

		$array = ManagePermissions::getInstance()->sessionData();
		/*$array = array('home' => 'Contenido del arreglo de HomeController pasado por parametro a la vista');*/
		$view = new Home();
		$view->show($array, 'home');
	}
}