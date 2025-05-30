<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kilometros',
        'anio',
        'nombre',
        'descripcion',
        'motor',
        'potencia',
        'transmision',
        'consumo',
        'tanque',
        'velocidad_maxima',
        'direccion_asistida',
        'bluetooth',
        'pantalla_tactil',
        'airbags_frontales',
        'abs_ebd',
        'camara_reversa',
        'diseno_exterior',
        'diseno_interior',
        'tamano_baul',
        'motor_info',
        'neumaticos',
        'accesorios',
        'precio_base',
        'img_principal',
        'img_exterior',
        'img_interior1',
        'img_interior2',
        'img_baul',
        'img_motor',
        'img_neumaticos'
    ];
}