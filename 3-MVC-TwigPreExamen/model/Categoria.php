<?php

class Categoria
{
  private $id;
  private $nombre;

  function __set($name, $value)
  {
    switch ($name) {
      case 'id':
        $this->id = $value;
        break;

      case 'nombre':
        $this->nombre = $value;
        break;
    }
  }

  public function getId(){
    return $this->id;
  }

  public function getNombre(){
    return $this->nombre;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }
}
