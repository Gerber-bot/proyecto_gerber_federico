<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CitaClienteModel;

class CitaController extends BaseController
{
    public function agendar()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'vehiculo_id' => 'permit_empty|is_natural',
            'nombre' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'telefono' => 'required|min_length[6]',
            'metodo_contacto' => 'required|in_list[email,llamada,whatsapp]',
            'turno' => 'required|in_list[mañana,tarde]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $citaModel = new \App\Models\CitaClienteModel();

        $data = [
            'vehiculo_id' => $this->request->getPost('vehiculo_id'),
            'horario' => $this->request->getPost('turno'),
            'metodo_contacto' => $this->request->getPost('metodo_contacto'),
            'telefono' => $this->request->getPost('telefono'),
            'estado' => 'pendiente',
            'fecha_creacion' => date('Y-m-d'),
            'nombre_cliente' => $this->request->getPost('nombre'),
            'email_cliente' => $this->request->getPost('email'),
        ];

        $citaModel->insert($data);

        $vehiculo_id = $this->request->getPost('vehiculo_id');
        return redirect()->to('catalogo/vehiculo/' . $vehiculo_id)->with('success', 'Cita agendada correctamente.');
    }

    public function marcar_atendido($id)
    {
        $citaModel = new \App\Models\CitaClienteModel();
        if ($citaModel->find($id)) {
            $citaModel->update($id, ['estado' => 'completada']);
            return redirect()->back()->with('success', 'Cita marcada como atendida.');
        }
        return redirect()->back()->with('error', 'Cita no encontrada.');
    }

    public function cancelar($id)
    {
        $citaModel = new \App\Models\CitaClienteModel();
        if ($citaModel->find($id)) {
            $citaModel->update($id, ['estado' => 'cancelada']);
            return redirect()->back()->with('success', 'Cita cancelada.');
        }
        return redirect()->back()->with('error', 'Cita no encontrada.');
    }
}