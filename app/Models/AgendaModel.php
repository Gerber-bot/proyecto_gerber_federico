<?php

namespace App\Models;
use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table = 'agenda_servicio';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos permitidos para insertar/actualizar
    protected $allowedFields = [
        'nombre',
        'apellido',
        'email',
        'servicio',
        'comentario',
        'fecha',
        'fecha_registro',
        'estado' 
    ];

    // No usar timestamps automáticos de CI4 (created_at, updated_at)
    public $timestamps = false;
}
