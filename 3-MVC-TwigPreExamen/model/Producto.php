<?php

class Producto
{
  private $id;
  private $nombre;
  private $precio;
  private $categoria_id;
  private $stock_minimo;

  function __set($name, $value)
  {
    switch ($name) {
      case 'id':
        $this->id = $value;
        break;

      case 'nombre':
        $this->nombre = $value;
        break;

      case 'precio':
        $this->precio = $value;
        break;

      case 'categoria_id':
        $this->categoria_id = $value;
        break;

      case 'stock_minimo':
        $this->stock_minimo = $value;
        break;
    }
  }

  public function getId(){
    return $this->id;
  }

  public function getNombre(){
    return $this->nombre;
  }

  public function getPrecio(){
    return $this->precio;
  }

  public function getCategoria_id(){
    return $this->categoria_id;
  }

  public function getStock_min(){
    return $this->stock_minimo;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function setPrecio($precio)
  {
    $this->precio = $precio;
  }

  public function setCategoria_id($categoria_id)
  {
    $this->categoria_id = $categoria_id;
  }

  public function setStock_min($stock_minimo)
  {
    $this->stock_minimo = $stock_minimo;
  }
}
