<?php

class User
{
  private $id;
  private $usuario;
  private $clave;
  private $nombre;
  private $apellido;
  private $mail;

  function __set($name, $value)
  {
    switch ($name) {
      case 'id':
        $this->id = $value;
        break;

      case 'usuario':
        $this->usuario = $value;
        break;

      case 'clave':
        $this->clave = $value;
        break;

      case 'nombre':
        $this->nombre = $value;
        break;

      case 'apellido':
        $this->apellido = $value;
        break;

      case 'mail':
        $this->mail = $value;
        break;
    }
  }

  public function getId()
  {
    return $this->id;
  }

  public function getUsuario()
  {
    return $this->usuario;
  }

  public function getClave()
  {
    return $this->clave;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getApellido()
  {
    return $this->apellido;
  }

  public function getMail()
  {
    return $this->mail;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setUsuario($usuario)
  {
    $this->usuario = $usuario;
  }

  public function setClave($clave)
  {
    $this->clave = $clave;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function setApellido($apellido)
  {
    $this->apellido = $apellido;
  }

  public function setMail($mail)
  {
    $this->mail = $mail;
  }
}
