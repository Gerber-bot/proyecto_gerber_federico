<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('catalogo', 'Home::catalogo');
$routes->get('servicios', 'Home::servicios');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('informacion_corporativa', 'Home::informacion_corporativa');
$routes->get('informacion_legal', 'Home::informacion_legal');
$routes->get('experiencias', 'Home::experiencias');
$routes->get('miperfil', 'Home::miperfil');
$routes->get('vehiculo', 'Home::vehiculo');
$routes->get('trabajaConNosotros', 'Home::trabajaConNosotros');
$routes->get('compraYVenta', 'Home::compraYVenta');