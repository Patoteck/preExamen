<?php

require_once('./controller/LoginController.php');
require_once('./controller/ProductController.php');
require_once('./controller/ErrorController.php');

session_start();

if ((isset($_GET['controller'])) && (isset($_GET['action']))) {
  $controller = trim($_GET['controller']);
  $action = trim($_GET['action']);
}

switch ($controller)
{
  case 'login':
    switch ($action)
    {
      case 'loginHome':
        LoginController::getInstance()->loginHome();
        return;
        break;
      case 'validateLogin':
        LoginController::getInstance()->validateLogin();
        return;
        break;
      case 'closeSession':
        LoginController::getInstance()->closeSession();
        return;
        break;
    }
  case 'product':
    switch ($action)
    {
      case 'productHome':
        ProductController::getInstance()->productHome();
        return;
        break;
      case 'formNewProduct':
        ProductController::getInstance()->formNewProduct();
        return;
        break;
      case 'addProduct':
        ProductController::getInstance()->addProduct();
        return;
        break;
    }
  case 'error':
    switch ($action)
    {
      case 'errorHome':
        ErrorController::getInstance()->errorHome();
        return;
        break;
    }
}

if (!isset($_SESSION['username'])){
  LoginController::getInstance()->loginHome();
} else {
  ProductController::getInstance()->productHome();
}
