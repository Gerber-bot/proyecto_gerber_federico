<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
<<<<<<< Updated upstream
    protected $table      = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'email', 'password'];
    protected $returnType    = 'array';
=======
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre', 'apellido', 'email', 'password', 'identificador', 'estado',
        'telefono', 'dni', 'fecha_nacimiento', 'oficio'
    ];
    protected $returnType = 'array';
>>>>>>> Stashed changes
    protected $useTimestamps = true;
}
