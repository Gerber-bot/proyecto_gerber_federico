<?php
namespace App\Controllers;

use App\Models\ConsultaModel;
use App\Models\CitaClienteModel;
use App\Models\UsuarioModel;

class Consultas extends BaseController
{
    protected $usuarioModel;
    protected $citaClienteModel;
    protected $consultaModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
        $this->citaClienteModel = new CitaClienteModel(); 
        $this->consultaModel = new ConsultaModel();
    }
    public function guardar()
    {
        // Verificar si es una solicitud AJAX
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Solicitud inválida']);
        }

        // Validación
        $rules = [
            'nombre_usuario' => 'required|min_length[3]|max_length[100]',
            'correo' => 'required|valid_email|max_length[100]',
            'consulta' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setStatusCode(400)->setJSON([
                'success' => false,
                'message' => 'Error de validación',
                'errors' => $this->validator->getErrors()
            ]);
        }

        // Guardar datos
        $model = new ConsultaModel();
        $model->save([
            'nombre_usuario' => $this->request->getPost('nombre_usuario'),
            'correo' => $this->request->getPost('correo'),
            'consulta' => $this->request->getPost('consulta'),
            'fecha' => date('Y-m-d H:i:s')
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Consulta enviada con éxito'
        ]);
    }

    public function marcar_atendida($id)
    {
        $this->consultaModel->update($id, ['atendida' => 1]);
        return redirect()->back();
    }

    public function eliminar($id)
    {
        $this->consultaModel->delete($id);
        return redirect()->back();
    }


}