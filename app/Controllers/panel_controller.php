<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TrabajaCNModel;

class Panel_controller extends Controller
{
    public function index()
    {
        $session = session();

        $data = [
            'titulo' => 'Panel del Usuario',
            'nombre' => $session->get('nombre'),
            'perfil_id' => $session->get('perfil_id'),
            'identificador' => $session->get('identificador')
        ];

        return view('panel', $data);
    }

    // Nuevo método para listar postulantes
    public function postulantes()
    {
        $session = session();

        if ($session->get('identificador') != 1) { 
            return redirect()->to('/panel')->with('error', 'Acceso no autorizado');
        }

        $model = new TrabajaCNModel();
        $postulantes = $model->findAll();

        $data = [
            'titulo' => 'Postulantes',
            'postulantes' => $postulantes,
            'nombre' => $session->get('nombre')
        ];

        // Especifica la ruta completa de la vista
        return view('back/usuarios/postulantes_view', $data);
    }
}