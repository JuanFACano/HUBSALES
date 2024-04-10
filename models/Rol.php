<?php

namespace Model;

class Rol extends ActiveRecord
{
  // Base de Datos
  protected static $tabla = 'roles';
  protected static $columnasDB = [
    'rol_id',
    'rol_nombre',
    'rol_descripcion'
  ];

  public $rol_id;
  public $rol_nombre;
  public $rol_descripcion;

  public function __construct($args = [])
  {
    $this->rol_id = $args['rol_id'];
    $this->rol_nombre = $args['rol_nombre'];
    $this->rol_descripcion = $args['rol_descripcion'];
  }
}
