<?php

namespace App\Models;

use CodeIgniter\Model;

class MarcaModel extends Model
{
    protected $table = 'marcas';
    protected $primaryKey = 'id';
    
    protected $allowedFields = [
        'nombre',
        'logo',
        'descripcion',
        'estado'
    ];

    protected $validationRules = [
        'nombre' => 'required|min_length[2]|max_length[50]|is_unique[marcas.nombre]',
    ];

    protected $validationMessages = [
        'nombre' => [
            'required' => 'El nombre de la marca es obligatorio',
            'is_unique' => 'Esta marca ya existe'
        ]
    ];
}