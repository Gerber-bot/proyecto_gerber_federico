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
        'comentario' => 'required|min_length[3]',
        'imagen' => 'permit_empty|max_length[255]'
    ];
    
    protected $beforeInsert = ['logBeforeInsert'];
    
    protected function logBeforeInsert(array $data)
    {
        log_message('debug', 'Insertando comentario: ' . print_r($data, true));
        return $data;
    }
}