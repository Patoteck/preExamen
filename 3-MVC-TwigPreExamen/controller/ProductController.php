<?php

require_once('./view/ProductView.php');
require_once('./model/Producto.php');
require_once('./model/ProductsRepository.php');

class ProductController
{
  private static $instance;

  public static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function productHome()
  {
    $array = Session::getInstance()->sessionData();
    $array += ProductsRepository::getInstance()->listProducts();
    $view = new ProductView();
    $view->show('listProducts', $array);
  }

  public function formNewProduct()
  {
    $array = Session::getInstance()->sessionData();
    $array += ProductsRepository::getInstance()->getCategories();
    $view = new ProductView();
    $view->show('formNewProduct', $array);
  }

  public function addProduct()
  {
    $array = Session::getInstance()->sessionData();
    if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['categoria']) &&  isset($_POST['stockMin']))
    {
      $nombre = trim($_POST['nombre']);
      $precio = trim($_POST['precio']);
      $categoria = trim($_POST['categoria']);
      $stockMin = trim($_POST['stockMin']);

      $product = new Producto();
      $product->setNombre($nombre);
      $product->setPrecio($precio);
      $product->setCategoria_id($categoria);
      $product->setStock_min($stockMin);

      ProductsRepository::getInstance()->newProduct($product);
      header("Location: index.php");
    }
  }






}
