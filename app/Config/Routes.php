<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', 'Home::index');
$routes->get('empresa/informacion_corporativa', 'Home::informacion_corporativa');
$routes->get('empresa/informacion_legal', 'Home::informacion_legal');
$routes->get('empresa/quienes_somos', 'Home::quienes_somos');
$routes->get('empresa/trabaja_con_nosotros', 'Home::trabaja_con_nosotros');
$routes->get('servicios/compra_venta', 'Home::compra_venta');
$routes->get('servicios/servicios', 'Home::servicios');
$routes->get('usuario/miperfil', 'Home::miperfil');
$routes->get('catalogo/catalogo', 'Home::catalogo');
$routes->get('catalogo/vehiculo', 'Home::vehiculo');
$routes->get('clientes/experiencias', 'Home::experiencias');

$routes->post('auth/login', 'Auth::login');
$routes->post('auth/register', 'Auth::register');
$routes->get('logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('panel', 'panel_controller::index');

$routes->get('/usuarios', 'UsuarioController::index');
$routes->get('/usuarios/agregar', 'UsuarioController::agregar');
$routes->post('/usuarios/guardar', 'UsuarioController::guardar');
$routes->get('/usuarios/editar/(:num)', 'UsuarioController::editar/$1');
$routes->post('/usuarios/actualizar/(:num)', 'UsuarioController::actualizar/$1');
$routes->get('/usuarios/eliminar/(:num)', 'UsuarioController::eliminar/$1');
