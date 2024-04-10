<?php

namespace Controllers;

use Model\Categoria;
use Model\Producto;
use Model\Rol;
use Model\Usuario;

class APIController
{
  public static function index()
  {
    $usuarios = Usuario::all();
    echo json_encode($usuarios);
  }

  public static function roles()
  {
    $roles = Rol::all();
    echo json_encode($roles);
  }

  public static function productos()
  {
    $productos = Producto::all();
    echo json_encode($productos);
  }

  public static function categorias()
  {
    $categorias = Categoria::all();
    echo json_encode($categorias);
  }
}
