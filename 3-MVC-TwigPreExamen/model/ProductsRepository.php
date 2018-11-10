<?php

require_once('./model/Categoria.php');

class ProductsRepository extends PDORepository
{
  private static $instance;

  public static function getInstance(){
    if(!isset(self::$instance)){
      self::$instance = new self();
    }
    return self::$instance;
  }

  public function listProducts(){
    $stmt = $this->executeQuery("SELECT * FROM producto");
    $product = $stmt->fetchAll(PDO::FETCH_CLASS, "Producto");
    return array('products' => $product);
  }

  public function newProduct($product)
  {
    $stmt = $this->executeQuery("INSERT INTO producto(nombre, precio, categoria_id, stock_minimo)
    VALUES (?,?,?,?);",
    [$product->getNombre(), $product->getPrecio(), $product->getCategoria_id(), $product->getStock_min()]);
  }

  public function getCategories()
  {
    $stmt = $this->executeQuery("SELECT * FROM categoria");
    $categoria = $stmt->fetchAll(PDO::FETCH_CLASS, "Categoria");
    return array('categorias' => $categoria);
  }

  public function alreadyExistsProduct($nombre)
  {
    $stmt = $this->executeQuery("SELECT * FROM producto WHERE nombre=?",[$nombre]);
    $product = $stmt->fetchAll(PDO::FETCH_CLASS, "Producto");
    //print_r($product[0]);
    if (!is_null($product)){
      if (count($product) > 0){
        return true;
      }
    }
    return false;
  }

}
