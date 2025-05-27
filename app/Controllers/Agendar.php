<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\AgendaModel;

class Agendar extends Controller
{
    public function guardar()
    {
        log_message('debug', 'Entrando al método guardar()');

        $request = \Config\Services::request();

        $agendaModel = new AgendaModel();

        $data = [
            'nombre' => $request->getPost('nombre'),
            'apellido' => $request->getPost('apellido'),
            'email' => $request->getPost('email'),
            'servicio' => $request->getPost('servicio'),
            'comentario' => $request->getPost('comentario'),
            'fecha' => $request->getPost('fecha'),
            'fecha_registro' => date('Y-m-d H:i:s')
        ];

        log_message('debug', 'Datos recibidos: ' . print_r($data, true));

        if ($agendaModel->insert($data)) {
            return $this->response->setStatusCode(200)->setBody('ok');
        } else {
            log_message('error', 'Error al insertar en la base de datos: ' . $agendaModel->errors());
            return $this->response->setStatusCode(500)->setBody('Error al guardar');
        }
    }
}
