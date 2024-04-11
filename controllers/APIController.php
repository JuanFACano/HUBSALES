<?php

namespace Controllers;

use Model\ActiveRecord;
use Model\Categoria;
use Model\Producto;
use Model\Rol;
use Model\Usuario;

class APIController extends ActiveRecord
{
  public static function usuarios()
  {
    $campos = ['user_id', 'user_nombre', 'rol_nombre', 'user_correo'];
    $tablas_join = ['usuarios', 'roles'];
    $columnas = ['user_rol', 'rol_id'];
    $usuariosJoin = Usuario::queryBuilderAll($campos, $tablas_join, $columnas);
    echo json_encode($usuariosJoin);
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
