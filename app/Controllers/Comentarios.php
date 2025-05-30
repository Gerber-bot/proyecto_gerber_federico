<?php

namespace App\Controllers;

use App\Models\ComentarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class Comentarios extends BaseController
{
    public function guardar()
    {
        try {
            if (!session()->get('isLoggedIn') || empty(session()->get('nombre'))) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Debes iniciar sesión para comentar'
                ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
            }

            $validation = \Config\Services::validation();
            $validation->setRules([
                'comentario' => 'required|string|min_length[3]',
                'imagen' => 'permit_empty|is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]|max_size[imagen,2048]'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $validation->getErrors()
                ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
            }

            $nombreImagen = null;
            $imagen = $this->request->getFile('imagen');

            if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
                $nombreImagen = $imagen->getRandomName();
                $rutaDestino = FCPATH . 'assets/uploads/comentarios/';
                if (!is_dir($rutaDestino)) {
                    mkdir($rutaDestino, 0777, true);
                }
                $imagen->move($rutaDestino, $nombreImagen);
            }

            $model = new ComentarioModel();
            $insertado = $model->insert([
                'usuario'       => session()->get('nombre'),
                'comentario'    => $this->request->getPost('comentario'),
                'imagen'        => $nombreImagen,
                'fecha_subida'  => date('Y-m-d H:i:s')
            ]);

            if (!$insertado) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al guardar en base de datos',
                    'db_errors' => $model->errors()
                ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Comentario guardado correctamente',
                'insert_id' => $model->getInsertID()
            ]);
        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error en el servidor',
                'error' => $e->getMessage()
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listar()
    {
        $model = new ComentarioModel();
        $comentarios = $model->orderBy('fecha_subida', 'DESC')->findAll();

        return $this->response->setJSON([
            'success' => true,
            'comentarios' => $comentarios
        ]);
    }

    public function mostrarImagen($nombre)
    {
        $ruta = FCPATH . 'assets/uploads/comentarios/' . $nombre;
        if (!file_exists($ruta)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $mime = mime_content_type($ruta);
        header('Content-Type: ' . $mime);
        readfile($ruta);
        exit;
    }
}
