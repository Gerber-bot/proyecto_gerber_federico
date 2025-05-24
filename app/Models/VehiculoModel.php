<?php

namespace App\Models;

use CodeIgniter\Model;

class VehiculoModel extends Model
{
    protected $table      = 'vehiculos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'marca', 'modelo', 'anio', 'kilometros', 'transmision', 'precio', 'imagen', 'descripcion'
    ];
}