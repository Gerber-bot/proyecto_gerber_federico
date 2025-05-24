<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehiculoModel;

class CatalogoController extends BaseController
{
    public function catalogo()
    {
        $vehiculoModel = new VehiculoModel();
        $data['vehiculos'] = $vehiculoModel->findAll();
        return view('catalogo/catalogo', $data);
    }
    public function agregar()
    {
        // Solo para administradores
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo/catalogo');
        }
        return view('catalogo/agregar');
    }

    public function guardar()
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo/catalogo');
        }

        $file = $this->request->getFile('imagen');
        $nombreImagen = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $nombreImagen = $file->getRandomName();
            $file->move(ROOTPATH . 'public/assets/img/catalogo', $nombreImagen);
        }

        $vehiculoModel = new \App\Models\VehiculoModel();
        $data = [
            'marca'        => $this->request->getPost('marca'),
            'modelo'       => $this->request->getPost('modelo'),
            'anio'         => $this->request->getPost('anio'),
            'kilometros'   => $this->request->getPost('kilometros'),
            'transmision'  => $this->request->getPost('transmision'),
            'precio'       => $this->request->getPost('precio'),
            'imagen'       => $nombreImagen,
            'descripcion'  => $this->request->getPost('descripcion'),
        ];
        $vehiculoModel->insert($data);

        return redirect()->to('catalogo/catalogo')->with('msg', 'Vehículo agregado correctamente');
    }

    public function deshabilitar($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo/catalogo');
        }
        $vehiculoModel = new \App\Models\VehiculoModel();
        $vehiculoModel->update($id, ['estado' => 0]);
        return redirect()->to('catalogo/catalogo');
    }

    public function habilitar($id)
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo/catalogo');
        }
        $vehiculoModel = new \App\Models\VehiculoModel();
        $vehiculoModel->update($id, ['estado' => 1]);
        return redirect()->to('catalogo/catalogo');
    }
}
