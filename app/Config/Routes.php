<<<<<<< Updated upstream
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
=======
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
$routes->get('usuario/miperfil', 'UsuarioController::miperfil');
$routes->get('catalogo/catalogo', 'CatalogoController::catalogo');
$routes->get('catalogo/vehiculo', 'Home::vehiculo');
$routes->get('clientes/experiencias', 'Home::experiencias');

$routes->post('auth/login', 'Auth::login');
$routes->post('auth/register', 'Auth::register');
$routes->get('logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('panel', 'panel_controller::index');


$routes->get('usuarios', 'UsuarioController::index');
$routes->get('usuarios/agregar', 'UsuarioController::agregar');
$routes->post('usuarios/guardar', 'UsuarioController::guardar');
$routes->get('usuarios/editar/(:num)', 'UsuarioController::editar/$1');
$routes->post('usuarios/actualizar/(:num)', 'UsuarioController::actualizar/$1');
$routes->get('usuarios/eliminar/(:num)', 'UsuarioController::eliminar/$1');
$routes->get('usuarios/habilitar/(:num)', 'UsuarioController::habilitar/$1');
$routes->get('usuarios/deshabilitar/(:num)', 'UsuarioController::deshabilitar/$1');
$routes->post('usuario/actualizar_perfil', 'UsuarioController::actualizar_perfil');
$routes->get('catalogo/agregar', 'CatalogoController::agregar');
$routes->post('catalogo/guardar', 'CatalogoController::guardar');
$routes->get('catalogo/deshabilitar/(:num)', 'CatalogoController::deshabilitar/$1');
$routes->get('catalogo/habilitar/(:num)', 'CatalogoController::habilitar/$1');
$routes->post('agendar/guardar', 'Agendar::guardar');



$routes->post('comentarios/guardar', 'Comentarios::guardar');
$routes->get('comentarios/mostrarImagen/(:any)', 'Comentarios::mostrarImagen/$1');
$routes->get('comentarios/listar', 'Comentarios::listar');
$routes->get('clientes/experiencias', 'Home::experiencias'); // Asegúrate que esta ruta use el controlador correcto


// Catálogo principal
$routes->get('catalogo', 'CatalogoController::catalogo');
$routes->get('catalogo/vehiculo/(:num)', 'CatalogoController::vehiculo/$1');

// Rutas protegidas para admin
$routes->group('', ['filter' => 'auth:identificador,1'], function($routes) {
    $routes->get('catalogo/agregar', 'CatalogoController::agregar');
    $routes->post('catalogo/guardar', 'CatalogoController::guardar');

});
>>>>>>> Stashed changes
