<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Panel_controller extends Controller
{
    public function index()
{
    $session = session();

    $data = [
        'titulo'        => 'Panel del Usuario',
        'nombre'        => $session->get('nombre'),
        'perfil_id'     => $session->get('perfil_id'),
        'identificador' => $session->get('identificador') // esto es clave
    ];

    return view('panel', $data);
}

}
