<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre',
        'marca_id',
        'descripcion',
        'kilometros',
        'anio',
        'motor',
        'potencia',
        'transmision',
        'consumo',
        'tanque',
        'velocidad_maxima',
        // Eliminados: direccion_asistida, bluetooth, airbags_frontales, abs_ebd, camara_reversa
        'pantalla_tactil',
        'diseno_exterior',
        'diseno_interior',
        'tamano_baul',
        'motor_info',
        'neumaticos',
        'accesorios',
        'caracteristicas_adicionales', // Este campo queda para las características especiales
        'precio_base',
        'stock',
        'img_principal',
        'img_exterior',
        'img_interior1',
        'img_interior2',
        'img_baul',
        'img_motor',
        'img_neumaticos',
        'estado'
    ];

    // Elimina también las referencias a estos campos en las reglas de validación si existen
    protected $validationRules = [
        'nombre' => 'required|min_length[3]|max_length[100]',
        'marca_id' => 'required|is_natural_no_zero', // Validación para ID de marca
        'precio_base' => 'required|numeric|greater_than[0]',
        'stock' => 'required|integer|greater_than_equal_to[0]'
    ];

    protected $validationMessages = [
        'nombre' => [
            'required' => 'El nombre del producto es obligatorio',
            'min_length' => 'El nombre debe tener al menos 3 caracteres'
        ],
        'marca_id' => [
            'required' => 'Debe seleccionar una marca',
            'is_natural_no_zero' => 'Debe seleccionar una marca válida'
        ],
        'precio_base' => [
            'greater_than' => 'El precio debe ser mayor que cero'
        ]
    ];

    protected $beforeInsert = ['limpiarDatos'];
    protected $beforeUpdate = ['limpiarDatos'];

    protected function limpiarDatos(array $data)
    {
        // Convertir campos de texto vacíos a NULL
        $textFields = [
            'descripcion',
            'motor',
            'potencia',
            'transmision',
            'consumo',
            'tanque',
            'velocidad_maxima',
            'pantalla_tactil',
            'diseno_exterior',
            'diseno_interior',
            'tamano_baul',
            'motor_info',
            'neumaticos',
            'accesorios',
            'caracteristicas_adicionales'
        ];

        foreach ($textFields as $field) {
            if (isset($data['data'][$field])) {
                $data['data'][$field] = !empty(trim($data['data'][$field])) ? $data['data'][$field] : null;
            }
        }

        return $data;
    }

    /**
     * Obtiene productos con información de marca
     */
    public function getWithMarca($id = null)
    {
        $builder = $this->select('productos.*, marcas.nombre as marca_nombre')
            ->join('marcas', 'marcas.id = productos.marca_id');

        if ($id) {
            $builder->where('productos.id', $id);
            return $builder->first();
        }

        return $builder->findAll();
    }

    /**
     * Obtiene productos filtrados por marca
     */
    public function getByMarca($marca_id)
    {
        return $this->where('marca_id', $marca_id)
            ->where('estado', 1)
            ->findAll();
    }

    /**
     * Busca productos por término (nombre, descripción o características)
     */
    public function buscarProductos($termino)
    {
        return $this->select('productos.*, marcas.nombre as marca_nombre')
            ->join('marcas', 'marcas.id = productos.marca_id')
            ->groupStart()
            ->like('productos.nombre', $termino)
            ->orLike('productos.descripcion', $termino)
            ->orLike('marcas.nombre', $termino)
            ->orLike('productos.caracteristicas_adicionales', $termino)
            ->groupEnd()
            ->where('productos.estado', 1)
            ->findAll();
    }
}