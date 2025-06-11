<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class MarcasController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('marcas');
        $data['marcas'] = $builder->orderBy('nombre', 'ASC')->get()->getResultArray();

        return view('back/catalogo/marcas/marcas', $data);
    }

    public function crear()
    {
        return view('back/catalogo/marcas/crear');
    }

    public function guardar()
    {
        $rules = [
            'nombre' => 'required|min_length[2]|max_length[50]|is_unique[marcas.nombre]',
            'logo' => 'uploaded[logo]|max_size[logo,1024]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png,image/gif]',
            'descripcion' => 'max_length[500]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Procesar imagen del logo con manejo de errores
        $file = $this->request->getFile('logo');
        $db = \Config\Database::connect();

        try {
            if ($file->isValid() && !$file->hasMoved()) {
                $nombreLogo = $file->getRandomName();

                // Mover el archivo con verificación
                if ($file->move(FCPATH . 'assets/img/marcas', $nombreLogo)) {
                    // Insertar en la base de datos
                    $db->table('marcas')->insert([
                        'nombre' => $this->request->getPost('nombre'),
                        'descripcion' => $this->request->getPost('descripcion'),
                        'logo' => $nombreLogo,
                        'estado' => 1
                    ]);

                    return redirect()->to('/back/catalogo/marcas')->with('success', 'Marca creada exitosamente');
                }
            }
        } catch (\Exception $e) {
            // Eliminar archivo si se subió pero falló la BD
            if (isset($nombreLogo) && file_exists(FCPATH . 'assets/img/marcas/' . $nombreLogo)) {
                unlink(FCPATH . 'assets/img/marcas/' . $nombreLogo);
            }
            return redirect()->back()->withInput()->with('error', 'Error al guardar: ' . $e->getMessage());
        }

        return redirect()->back()->withInput()->with('error', 'No se pudo procesar la imagen del logo');
    }

    public function editar($id)
    {
        $db = \Config\Database::connect();
        $marca = $db->table('marcas')->where('id', $id)->get()->getRowArray();

        if (!$marca) {
            return redirect()->to('/back/catalogo/marcas')->with('error', 'Marca no encontrada');
        }

        return view('back/catalogo/marcas/editar', ['marca' => $marca]);
    }

    public function actualizar($id)
    {
        $db = \Config\Database::connect();
        $marca = $db->table('marcas')->where('id', $id)->get()->getRow();

        if (!$marca) {
            return redirect()->to('/back/catalogo/marcas')->with('error', 'Marca no encontrada');
        }

        // Validación
        $rules = [
            'nombre' => "required|min_length[2]|max_length[50]|is_unique[marcas.nombre,id,{$id}]",
            'logo' => 'max_size[logo,1024]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png,image/gif]',
            'descripcion' => 'max_length[500]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Procesar datos básicos
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion')
        ];

        // Manejar eliminación de logo
        if ($this->request->getPost('eliminar_logo')) {
            if ($marca->logo) {
                $oldLogo = FCPATH . 'assets/img/marcas/' . $marca->logo;
                if (file_exists($oldLogo)) {
                    unlink($oldLogo);
                }
            }
            $data['logo'] = null;
        }

        // Procesar nuevo logo
        $file = $this->request->getFile('logo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            try {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'assets/img/marcas', $newName);
                $data['logo'] = $newName;

                // Eliminar logo anterior si existe
                if ($marca->logo && !$this->request->getPost('eliminar_logo')) {
                    $oldLogo = FCPATH . 'assets/img/marcas/' . $marca->logo;
                    if (file_exists($oldLogo)) {
                        unlink($oldLogo);
                    }
                }
            } catch (\Exception $e) {
                return redirect()->back()
                    ->withInput()
                    ->with('error_imagen', 'Error al subir el logo: ' . $e->getMessage());
            }
        }

        // Actualizar la marca
        $db->table('marcas')->where('id', $id)->update($data);

        return redirect()->to('/back/catalogo/marcas')->with('success', 'Marca actualizada exitosamente');
    }
    public function cambiarEstado($id)
    {
        $db = \Config\Database::connect();
        $marca = $db->table('marcas')->where('id', $id)->get()->getRow();

        if (!$marca) {
            return redirect()->back()->with('error', 'Marca no encontrada');
        }

        $nuevoEstado = $marca->estado ? 0 : 1;
        $db->table('marcas')->where('id', $id)->update(['estado' => $nuevoEstado]);

        return redirect()->back()->with('success', 'Estado de la marca actualizado');
    }
}