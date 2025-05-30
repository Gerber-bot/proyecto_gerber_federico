<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre', 'apellido', 'email', 'password', 'identificador', 'estado',
        'telefono', 'dni', 'fecha_nacimiento', 'oficio'
    ];
    protected $returnType = 'array';
    protected $useTimestamps = true;
}
