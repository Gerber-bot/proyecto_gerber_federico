<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Panel_controller extends Controller
{
    public function index()
    {
        $session = session();

        $data = [
            'titulo'     => 'Panel del Usuario',
            'nombre'     => $session->get('nombre'),
            'perfil_id'  => $session->get('perfil_id')
        ];

        return view('panel', $data);
    }
}
