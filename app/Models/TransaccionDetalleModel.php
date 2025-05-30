<?php
namespace App\Models;

use CodeIgniter\Model;

class TransaccionDetalleModel extends Model
{
    protected $table = 'transacciones_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['transaccion_id', 'producto_id', 'cantidad', 'precio_unitario', 'subtotal'];
    protected $returnType = 'array';
}