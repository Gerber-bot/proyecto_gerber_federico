<?php

namespace App\Models;

use CodeIgniter\Model;

class CitaClienteModel extends Model
{
    protected $table      = 'cita_clientes';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'usuario_id',
        'vehiculo_id',
        'horario',
        'metodo_contacto',
        'telefono',
        'estado',
        'fecha_creacion',
        'nombre_cliente',
        'email_cliente'
    ];

    protected $useTimestamps = false;
    protected $with = ['usuario', 'vehiculo'];
}