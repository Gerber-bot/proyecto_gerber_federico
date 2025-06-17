<?php
namespace App\Models;

use CodeIgniter\Model;

class TransaccionDetalleModel extends Model
{
    protected $table = 'transacciones_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['transaccion_id', 'producto_id', 'cantidad', 'precio_unitario', 'subtotal'];
    protected $returnType = 'array';

    public function buscarTodo($busqueda = null)
    {
        $builder = $this->db->table('transacciones_detalle')
            ->select('transacciones_detalle.id as detalle_id, transacciones_maestro.id as transaccion_id, usuarios.nombre, usuarios.apellido, transacciones_maestro.fecha_creacion, productos.nombre as producto, transacciones_detalle.cantidad, transacciones_detalle.precio_unitario, transacciones_detalle.subtotal')
            ->join('transacciones_maestro', 'transacciones_detalle.transaccion_id = transacciones_maestro.id')
            ->join('usuarios', 'transacciones_maestro.usuario_id = usuarios.id')
            ->join('productos', 'transacciones_detalle.producto_id = productos.id')
            ->orderBy('transacciones_maestro.fecha_creacion', 'DESC');

        if (!empty($busqueda)) {
            $builder->groupStart()
                ->like('usuarios.nombre', $busqueda)
                ->orLike('usuarios.apellido', $busqueda)
                ->orLike('productos.nombre', $busqueda)
                ->groupEnd();
        }

        return $builder->get()->getResultArray();
    }
}
