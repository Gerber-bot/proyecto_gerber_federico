<?php

namespace App\Controllers;

use App\Models\ComentarioModel;
use CodeIgniter\HTTP\ResponseInterface;

class Comentarios extends BaseController
{
    public function guardar()
    {
        header('Content-Type: application/json');

        try {
            // 1. Verificar sesión activa
            if (!session()->get('isLoggedIn') || empty(session()->get('nombre'))) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Debes iniciar sesión para comentar'
                ])->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
            }

            // 2. Configurar validación
            $validation = \Config\Services::validation();
            $validation->setRules([
                'comentario' => [
                    'rules' => 'required|string|min_length[3]|max_length[1000]',
                    'errors' => [
                        'required' => 'El comentario es obligatorio',
                        'min_length' => 'El comentario debe tener al menos 3 caracteres',
                        'max_length' => 'El comentario no puede exceder 1000 caracteres'
                    ]
                ],
                'imagen' => [
                    'rules' => 'permit_empty|uploaded[imagen]|is_image[imagen]|mime_in[imagen,image/jpg,image/jpeg,image/png]|max_size[imagen,2048]',
                    'errors' => [
                        'uploaded' => 'Error al subir la imagen',
                        'is_image' => 'El archivo debe ser una imagen',
                        'mime_in' => 'Solo se permiten imágenes JPG, JPEG o PNG',
                        'max_size' => 'La imagen no debe superar 2MB'
                    ]
                ]
            ]);

            // 3. Ejecutar validación
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error en los datos enviados',
                    'errors' => $validation->getErrors()
                ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
            }

            // 4. Procesar imagen
            $nombreImagen = null;
            $imagen = $this->request->getFile('imagen');
            
            if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
                $nombreImagen = $imagen->getRandomName();
                $rutaDestino = FCPATH . 'assets/uploads/comentarios/';
                
                // Crear directorio si no existe
                if (!is_dir($rutaDestino)) {
                    mkdir($rutaDestino, 0777, true);
                }

                // Mover imagen al directorio
                if (!$imagen->move($rutaDestino, $nombreImagen)) {
                    throw new \RuntimeException('No se pudo guardar la imagen en el servidor');
                }
            }

            // 5. Guardar en base de datos
            $model = new ComentarioModel();
            $data = [
                'usuario' => session()->get('nombre'),
                'comentario' => $this->request->getPost('comentario'),
                'imagen' => $nombreImagen,
                'fecha_subida' => date('Y-m-d H:i:s')
            ];

            $insertado = $model->insert($data);
            
            if (!$insertado) {
                log_message('error', 'Error al insertar comentario: ' . print_r($model->errors(), true));
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Error al guardar en la base de datos',
                    'db_errors' => $model->errors()
                ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }

            // 6. Obtener el comentario recién creado
            $nuevoComentario = $model->find($model->getInsertID());

            // 7. Respuesta exitosa
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Comentario publicado exitosamente',
                'nuevoComentario' => $nuevoComentario,
                'insert_id' => $model->getInsertID(),
                'reload' => false // Cambiar a true para recarga automática
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Error en Comentarios::guardar - ' . $e->getMessage() . "\n" . $e->getTraceAsString());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Ocurrió un error inesperado',
                'error' => (ENVIRONMENT === 'development') ? $e->getMessage() : null,
                'trace' => (ENVIRONMENT === 'development') ? $e->getTraceAsString() : null
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    // Método para mostrar imágenes
    public function mostrarImagen($nombreImagen)
    {
        $ruta = FCPATH . 'assets/uploads/comentarios/' . $nombreImagen;

        if (!file_exists($ruta)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $mime = mime_content_type($ruta);
        header('Content-Type: ' . $mime);
        readfile($ruta);
        exit;
    }

    // Método para listar comentarios
    public function listar()
    {
        try {
            $model = new ComentarioModel();
            $comentarios = $model->orderBy('fecha_subida', 'DESC')->findAll();
            
            return $this->response->setJSON([
                'success' => true,
                'comentarios' => $comentarios
            ]);

        } catch (\Throwable $e) {
            log_message('error', 'Error en Comentarios::listar - ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error al cargar comentarios'
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}