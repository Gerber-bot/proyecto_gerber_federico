<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductoModel;

class CatalogoController extends BaseController
{
    // Método para mostrar el catálogo principal
    public function catalogo()
    {
        $productoModel = new ProductoModel();

        // Obtener parámetros de filtrado
        $filtros = [
            'marca' => $this->request->getGet('marca'),
            'anio' => $this->request->getGet('anio'),
            'transmision' => $this->request->getGet('transmision'),
            'precio_max' => $this->request->getGet('precio_max')
        ];

        // Construir consulta con filtros
        $builder = $productoModel->builder();

        if (!empty($filtros['marca'])) {
            $builder->like('nombre', $filtros['marca']);
        }

        if (!empty($filtros['anio'])) {
            $builder->where('anio', $filtros['anio']);
        }

        if (!empty($filtros['transmision'])) {
            $builder->where('transmision', $filtros['transmision']);
        }

        if (!empty($filtros['precio_max'])) {
            $builder->where('precio_base <=', $filtros['precio_max']);
        }

        $data['productos'] = $builder->get()->getResultArray();
        $data['filtros'] = $filtros;

        // Obtener valores únicos para los selectores
        $data['marcas'] = $productoModel->distinct()->select('nombre')->findAll();
        $data['anios'] = $productoModel->distinct()->select('anio')->orderBy('anio', 'DESC')->findAll();
        $data['transmisiones'] = $productoModel->distinct()->select('transmision')->findAll();

        return view('catalogo/catalogo', $data);
    }

    // Método para mostrar detalles de un producto
    public function vehiculo($id)
    {
        $productoModel = new ProductoModel();
        $data['vehiculo'] = $productoModel->find($id);

        if (!$data['vehiculo']) {
            return redirect()->to('catalogo')->with('error', 'Producto no encontrado');
        }

        return view('catalogo/vehiculo', $data);
    }

    // Método para mostrar formulario de agregar producto (solo admin)
    public function agregar()
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        return view('catalogo/agregar');
    }

    // Método para procesar el guardado (solo admin)
    public function guardar()
    {
        if (!session()->get('isLoggedIn') || session()->get('identificador') != 1) {
            return redirect()->to('catalogo')->with('error', 'Acceso denegado');
        }

        // Validación
        $rules = [
            'nombre' => 'required|min_length[3]',
            'descripcion' => 'required',
            'precio_base' => 'required|decimal',
            'img_principal' => 'uploaded[img_principal]|max_size[img_principal,2048]|is_image[img_principal]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Procesar imágenes
        $imagenes = [];
        $camposImagen = [
            'img_principal',
            'img_exterior',
            'img_interior1',
            'img_interior2',
            'img_baul',
            'img_motor',
            'img_neumaticos'
        ];

        foreach ($camposImagen as $campo) {
            $file = $this->request->getFile($campo);

            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'assets/img/catalogo/productos', $newName);
                $imagenes[$campo] = $newName;
            }
        }

        // Preparar datos - asegúrate que los nombres coincidan con la BD
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'motor' => $this->request->getPost('motor'),
            'potencia' => $this->request->getPost('potencia'),
            'transmision' => $this->request->getPost('transmision'),
            'consumo' => $this->request->getPost('consumo'),
            'tanque' => $this->request->getPost('tanque'), // Corregido de 'tangue'
            'velocidad_maxima' => $this->request->getPost('velocidad_maxima'),
            'direccion_asistida' => $this->request->getPost('direccion_asistida') ? 1 : 0,
            'bluetooth' => $this->request->getPost('bluetooth') ? 1 : 0,
            'pantalla_tactil' => $this->request->getPost('pantalla_tactil'), // Corregido de 'pantalla_lacili'
            'airbags_frontales' => $this->request->getPost('airbags_frontales') ? 1 : 0,
            'abs_ebd' => $this->request->getPost('abs_ebd') ? 1 : 0, // Corregido de 'abs_pbd'
            'camara_reversa' => $this->request->getPost('camara_reversa') ? 1 : 0,
            'diseno_exterior' => $this->request->getPost('diseno_exterior'),
            'diseno_interior' => $this->request->getPost('diseno_interior'),
            'tamano_baul' => $this->request->getPost('tamano_baul'), // Corregido de 'tamano_baui'
            'motor_info' => $this->request->getPost('motor_info'),
            'neumaticos' => $this->request->getPost('neumaticos'),
            'accesorios' => $this->request->getPost('accesorios'),
            'precio_base' => $this->request->getPost('precio_base'),
        ];

        // Combinar con imágenes
        $data = array_merge($data, $imagenes);

        // Guardar en BD
        $productoModel = new ProductoModel();

        if ($productoModel->insert($data)) {
            return redirect()->to('catalogo')->with('success', 'Producto agregado correctamente');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al guardar el producto');
        }
    }
}