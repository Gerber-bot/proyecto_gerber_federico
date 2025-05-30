<?php
namespace App\Models;

use CodeIgniter\Model;

class TransaccionMaestroModel extends Model
{
    protected $table = 'transacciones_maestro';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario_id', 'fecha_creacion', 'estado', 'total', 'metodo_pago'];
    protected $returnType = 'array';
}