<?php

namespace App\Controllers;

use App\Models\TrabajaCNModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\ResponseInterface;

class TrabajaConNosotros extends BaseController
{
    public function index()
    {
        return view('trabaja_con_nosotros');
    }

    public function guardar()
    {
        helper(['form']);

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nombre'        => 'required|min_length[2]',
            'apellido'      => 'required|min_length[2]',
            'email'         => 'required|valid_email',
            'telefono'      => 'required',
            'area_interes'  => 'required',
            'curriculum'    => 'uploaded[curriculum]|max_size[curriculum,2048]|ext_in[curriculum,pdf,doc,docx]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $validation->getErrors()
            ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Procesar el archivo
        $cv = $this->request->getFile('curriculum');
        $nombreCV = null;

        if ($cv->isValid() && !$cv->hasMoved()) {
            $nombreCV = $cv->getRandomName();
            $directorio = FCPATH . 'assets/uploads/cv/';

            if (!is_dir($directorio)) {
                mkdir($directorio, 0777, true);
            }

            $cv->move($directorio, $nombreCV);
        }

        // Guardar en la base de datos
        $model = new TrabajaCNModel();
        $model->insert([
            'nombre'          => $this->request->getPost('nombre'),
            'apellido'        => $this->request->getPost('apellido'),
            'email'           => $this->request->getPost('email'),
            'telefono'        => $this->request->getPost('telefono'),
            'area_interes'    => $this->request->getPost('area_interes'),
            'curriculum'      => $nombreCV,
            'fecha_postulacion' => date('Y-m-d H:i:s'),
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => '¡Gracias por enviar tu solicitud!'
        ]);
    }
}
