<?php

namespace App\Models;

use CodeIgniter\Model;

class ComentarioModel extends Model
{
    protected $table = 'experiencia_usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario', 'comentario', 'imagen', 'fecha_subida'];
    protected $useTimestamps = false;
    protected $returnType = 'array';
    
    protected $validationRules = [
        'usuario' => 'required|max_length[100]',
        'comentario' => 'required|min_length[3]|max_length[1000]',
        'imagen' => 'permit_empty|max_length[255]'
    ];
    
    protected $validationMessages = [
        'usuario' => [
            'required' => 'El usuario es requerido',
            'max_length' => 'El usuario no puede exceder 100 caracteres'
        ],
        'comentario' => [
            'required' => 'El comentario es requerido',
            'min_length' => 'El comentario debe tener al menos 3 caracteres',
            'max_length' => 'El comentario no puede exceder 1000 caracteres'
        ]
    ];
}