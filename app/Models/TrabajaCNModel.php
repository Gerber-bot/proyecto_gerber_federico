<?php

namespace App\Models;

use CodeIgniter\Model;

class TrabajaCNModel extends Model
{
    protected $table = 'trabaja_con_nosotros';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre', 'apellido', 'email', 'telefono',
        'area_interes', 'curriculum', 'fecha_postulacion'
    ];
    protected $useTimestamps = false;
}
