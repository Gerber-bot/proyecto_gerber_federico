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
            'logo' => 'uploaded[logo]|max_size[logo,1024]|is_image[logo]',
            'descripcion' => 'max_length[500]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Procesar imagen del logo
        $logo = $this->request->getFile('logo');

        // Validar que el archivo es válido y no se ha movido
        if ($logo->isValid() && !$logo->hasMoved()) {
            $nombreLogo = $logo->getRandomName();

            // Mover a la carpeta temporal (opcional) y luego a la final
            $tempPath = WRITEPATH . 'temp/' . $nombreLogo;
            $finalPath = ROOTPATH . 'public/assets/img/marcas/' . $nombreLogo;

            // Mover primero a temporal (opcional)
            $logo->move(WRITEPATH . 'temp', $nombreLogo);

            // Copiar a la ubicación final
            copy($tempPath, $finalPath);

            // Opcional: eliminar el temporal
            unlink($tempPath);
        }

        $db = \Config\Database::connect();
        $db->table('marcas')->insert([
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'logo' => $nombreLogo,
            'estado' => 1
        ]);

        return redirect()->to('/back/catalogo/marcas')->with('success', 'Marca creada exitosamente');
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

        $rules = [
            'nombre' => "required|min_length[2]|max_length[50]|is_unique[marcas.nombre,id,{$id}]",
            'logo' => 'max_size[logo,1024]|is_image[logo]',
            'descripcion' => 'max_length[500]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion')
        ];

        // Procesar nueva imagen si se subió
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $nombreLogo = $logo->getRandomName();

            // Rutas
            $tempPath = WRITEPATH . 'temp/' . $nombreLogo;
            $finalPath = ROOTPATH . 'public/assets/img/marcas/' . $nombreLogo;

            // Mover a temporal
            $logo->move(WRITEPATH . 'temp', $nombreLogo);

            // Copiar a ubicación final
            copy($tempPath, $finalPath);

            // Eliminar temporal
            unlink($tempPath);

            $data['logo'] = $nombreLogo;

            // Eliminar logo anterior si existe
            $marca = $db->table('marcas')->where('id', $id)->get()->getRow();
            if ($marca->logo && file_exists(ROOTPATH . 'public/assets/img/marcas/' . $marca->logo)) {
                unlink(ROOTPATH . 'public/assets/img/marcas/' . $marca->logo);
            }
        }

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