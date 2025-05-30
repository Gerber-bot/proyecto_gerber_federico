<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ConsultaModel;
    
class Consultas extends Controller
{
    public function guardar()
    {
        $nombre_usuario = $this->request->getPost('nombre_usuario');
        $correo = $this->request->getPost('correo');
        $consulta = $this->request->getPost('consulta');

        $consultaModel = new ConsultaModel();

        $data = [
            'nombre_usuario' => $nombre_usuario,
            'correo' => $correo,
            'consulta' => $consulta,
            'fecha' => date('Y-m-d H:i:s')
        ];

        if ($consultaModel->insert($data)) {
            return $this->response->setStatusCode(200)->setBody('ok');
        } else {
            return $this->response->setStatusCode(500)->setBody('Error al guardar');
        }
    }
}