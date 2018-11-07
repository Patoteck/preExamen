<?php

class FrontController{

	public static function main(){

		if (!empty($_GET['controller'])) {

			$controllerName = ucfirst($_GET['controller']) . 'Controller';

		} else {

			$controllerName = "HomeController";
		}

		if (!empty($_GET['action'])) {
			
			$action = $_GET['action'];

		} else {

			$action = "home";
		}

		include_once "controller/$controllerName.php";
          
        $controller = $controllerName::getInstance();
        $controller->$action();

		/*
		if (is_file("controller/$controllerName.php")) {

          include_once "controller/$controllerName.php";
          
          $controller = $controllerName::getInstance();
          $controller->$action();

        } else {
          
          include_once "controller/HomeController.php";

          $controller = HomeController::getInstance();
          $controller->home();
        }
        */
	}
}

