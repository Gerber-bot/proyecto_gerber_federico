<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'nombre',
        'marca',
        'descripcion',
        'kilometros',
        'anio',
        'motor',
        'potencia',
        'transmision',
        'consumo',
        'tanque',
        'velocidad_maxima',
        'direccion_asistida',
        'bluetooth',
        'pantalla_tactil',
        'airbags_frontales',
        'abs_ebd',
        'camara_reversa',
        'diseno_exterior',
        'diseno_interior',
        'tamano_baul',
        'motor_info',
        'neumaticos',
        'accesorios',
        'caracteristicas_adicionales', 
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

    protected $validationRules = [
        'nombre' => 'required|min_length[3]|max_length[100]',
        'marca' => 'required|min_length[2]|max_length[50]',
        'precio_base' => 'required|numeric|greater_than[0]',
        'stock' => 'required|integer|greater_than_equal_to[0]'
    ];

    protected $validationMessages = [
        'nombre' => [
            'required' => 'El nombre del producto es obligatorio',
            'min_length' => 'El nombre debe tener al menos 3 caracteres'
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
}