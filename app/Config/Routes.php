<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */

// 1. RUTAS PÚBLICAS PRINCIPALES


$routes->get('/', 'Home::index');
$routes->get('logout', 'Auth::logout');
$routes->get('login', 'Auth::login');
$routes->get('buscar', 'Home::buscar');

// 2. SECCIONES PÚBLICAS


// Empresa (manteniendo URLs originales)
$routes->group('empresa', function ($routes) {
    $routes->get('informacion_corporativa', 'Home::informacion_corporativa');
    $routes->get('informacion_legal', 'Home::informacion_legal');
    $routes->get('quienes_somos', 'Home::quienes_somos');
    $routes->get('trabaja_con_nosotros', 'Home::trabaja_con_nosotros');
});
$routes->get('trabaja-con-nosotros', 'TrabajaConNosotros::index');
$routes->post('trabaja-con-nosotros/guardar', 'TrabajaConNosotros::guardar');
// Servicios 
$routes->group('servicios', function ($routes) {
    $routes->get('compra_venta', 'Home::compra_venta');
    $routes->get('servicios', 'Home::servicios');
});

// Clientes
$routes->get('clientes/experiencias', 'Home::experiencias');
$routes->post('comentarios/guardar', 'Comentarios::guardar');
$routes->get('comentarios/mostrarImagen/(:any)', 'Comentarios::mostrarImagen/$1');
$routes->get('comentarios/listar', 'Comentarios::listar');
$routes->get('clientes/experiencias', 'Home::experiencias');

// 3. AUTENTICACIÓN

$routes->group('auth', function ($routes) {
    $routes->post('login', 'Auth::login');
    $routes->post('register', 'Auth::register');
});


// 4. USUARIOS (públicas y protegidas)

$routes->get('usuario/miperfil', 'UsuarioController::miperfil', ['filter' => 'Auth']);
$routes->post('usuario/actualizar_perfil', 'UsuarioController::actualizar_perfil', ['filter' => 'Auth']);

// 5. CATÁLOGO Y COMPRAS


// Catálogo público
$routes->group('catalogo', function ($routes) {
    $routes->get('/', 'CatalogoController::catalogo');
    $routes->get('catalogo', 'CatalogoController::catalogo');
    $routes->get('vehiculo/(:num)', 'CatalogoController::vehiculo/$1');
});

// Carrito 
$routes->get('compras', 'CatalogoController::ver_carrito');
$routes->get('detalle-compra/(:num)', 'CatalogoController::detalle_compra/$1');
$routes->post('carrito/actualizar', 'CatalogoController::actualizar_carrito');
$routes->get('carrito/eliminar/(:num)', 'CatalogoController::eliminar_del_carrito/$1');
$routes->get('carrito/finalizar', 'CatalogoController::finalizar_compra');
$routes->get('agregar-carrito/(:num)', 'CatalogoController::agregar_al_carrito/$1');


// 6. CITAS, CONSULTAS, AGENDASERVICIOS (públicas)

$routes->post('citas/agendar', 'CitaController::agendar');
$routes->post('consultas/guardar', 'Consultas::guardar');
$routes->post('agendar/guardar', 'Agendar::guardar');

// 7. PANEL ADMIN (protegido)

$routes->group('', ['filter' => 'Auth:1'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('panel', 'panel_controller::index');

    // ---------------------------
    // MÓDULO DE CONSULTAS 
    $routes->get('consultas/marcar_atendida/(:num)', 'Consultas::marcar_atendida/$1');
    $routes->get('consultas/eliminar/(:num)', 'Consultas::eliminar/$1');

    // ---------------------------
    // MÓDULO DE CATÁLOGO 
    $routes->get('catalogo/agregar', 'CatalogoController::agregar');
    $routes->post('catalogo/guardar', 'CatalogoController::guardar');
    $routes->get('catalogo_admin', 'CatalogoController::catalogo_admin');
    $routes->group('back/catalogo/marcas', function ($routes) {
        $routes->get('/', 'MarcasController::index');
        $routes->get('crear', 'MarcasController::crear');
        $routes->post('guardar', 'MarcasController::guardar');
        $routes->get('editar/(:num)', 'MarcasController::editar/$1');
        $routes->post('actualizar/(:num)', 'MarcasController::actualizar/$1');
        $routes->get('cambiar-estado/(:num)', 'MarcasController::cambiarEstado/$1');
    });
    // Operaciones por ID 
    $routes->get('catalogo/deshabilitar/(:num)', 'CatalogoController::deshabilitar/$1');
    $routes->get('catalogo/habilitar/(:num)', 'CatalogoController::habilitar/$1');
    $routes->get('catalogo/editar_precio/(:num)', 'CatalogoController::editar_precio/$1');
    $routes->post('catalogo/actualizar_precio/(:num)', 'CatalogoController::actualizar_precio/$1');
    $routes->get('catalogo/editar/(:num)', 'CatalogoController::editar/$1');
    $routes->post('catalogo/actualizar/(:num)', 'CatalogoController::actualizar/$1');
    $routes->get('catalogo/editar_stock/(:num)', 'CatalogoController::editar_stock/$1');
    $routes->post('catalogo/actualizar_stock/(:num)', 'CatalogoController::actualizar_stock/$1');

    // ---------------------------
    // MÓDULO DE USUARIOS (URLs originales)
    $routes->get('usuarios', 'UsuarioController::index');
    $routes->get('usuarios/agregar', 'UsuarioController::agregar');
    $routes->post('usuarios/guardar', 'UsuarioController::guardar');
    $routes->get('usuarios/editar/(:num)', 'UsuarioController::editar/$1');
    $routes->post('usuarios/actualizar/(:num)', 'UsuarioController::actualizar/$1');
    $routes->get('usuarios/eliminar/(:num)', 'UsuarioController::eliminar/$1');
    $routes->get('usuarios/habilitar/(:num)', 'UsuarioController::habilitar/$1');
    $routes->get('usuarios/deshabilitar/(:num)', 'UsuarioController::deshabilitar/$1');
    $routes->get('panel/postulantes', 'Panel_controller::postulantes');

    // ---------------------------
    // MÓDULO DE CITAS (URLs originales)
    $routes->get('citas/marcar_atendido/(:num)', 'CitaController::marcar_atendido/$1');
    $routes->get('citas/cancelar/(:num)', 'CitaController::cancelar/$1');
    $routes->post('citas/agregar/(:num)', 'CitaController::actualizar/$1');

    // ---------------------------
    // ESTADÍSTICAS
    $routes->get('estadisticas', 'EstadisticasController::index');

    //----------------------------
    //AGENDA SERVICIOS
    $routes->get('agenda/estado/(:num)/(:segment)', 'Agendar::cambiarEstado/$1/$2'); // ID, nuevo estado

});
