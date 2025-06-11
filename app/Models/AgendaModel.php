<?php

namespace App\Models;
use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table = 'agenda_servicio';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

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

    public $timestamps = false;
}
