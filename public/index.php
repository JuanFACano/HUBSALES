<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\GeneralController;
use Controllers\LoginController;
use Controllers\ProductoController;
use Controllers\UsuarioController;
use MVC\Router;

session_start();
$router = new Router();

// ? Iniciar sesion
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
if ($_SESSION['user_login']) {

  // ? Cerrar sesión
  $router->get('/logout', [LoginController::class, 'logout']);

  // ? Vistas para usuario administrador
  if ($_SESSION['user_rol'] === 1) {

    // ? vista general
    $router->get('/general', [GeneralController::class, 'index']);
    $router->post('/general', [GeneralController::class, 'index']);

    // ? Vista Usuarios
    $router->get('/usuarios', [UsuarioController::class, 'index']);
    $router->post('/usuarios', [UsuarioController::class, 'index']);

    // ? Vista Crear Usuarios
    $router->get('/usuarios/crear', [UsuarioController::class, 'crear']);
    $router->post('/usuarios/crear', [UsuarioController::class, 'crear']);

    // ? Vista Mensaje Confirmar Cuenta
    $router->get('/confirmar-cuenta', [UsuarioController::class, 'confirmar']);

    // ? Vista Confirmar Cuenta
    $router->get('/mensaje', [UsuarioController::class, 'mensaje']);
  }

  // ? Vistas para usuario Base
  // ---------------------------------------------------------
  // Productos
  $router->get('/productos', [ProductoController::class, 'index']);
  $router->get('/productos/crear', [ProductoController::class, 'crear']);


  // API Productos
  $router->get('/api/usuarios', [APIController::class, 'index']);
  $router->get('/api/roles', [APIController::class, 'roles']);
  $router->get('/api/productos', [APIController::class, 'productos']);
  $router->get('/api/categorias', [APIController::class, 'categorias']);

  // Comprobar y validar las rutas, que existan y les asigna las funciones del Controlador
}

$router->comprobarRutas();
