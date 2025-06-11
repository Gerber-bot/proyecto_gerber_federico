<?php

namespace App\Controllers;

use App\Models\TransaccionMaestroModel;
use App\Models\TransaccionDetalleModel;
use App\Models\ProductoModel;
use App\Models\UsuarioModel;

class EstadisticasController extends BaseController
{
    protected $transaccionMaestroModel;
    protected $transaccionDetalleModel;
    protected $productoModel;
    protected $usuarioModel;

    public function __construct()
    {
        $this->transaccionMaestroModel = new TransaccionMaestroModel();
        $this->transaccionDetalleModel = new TransaccionDetalleModel();
        $this->productoModel = new ProductoModel();
        $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        $busqueda = $this->request->getGet('q');

        $data = [
            'totalVentas' => $this->getTotalVentas(),
            'ventasPorMes' => $this->getVentasPorMes(),
            'productosMasVendidos' => $this->getProductosMasVendidos(),
            'mejoresClientes' => $this->getMejoresClientes(),
            'ventasPorEstado' => $this->getVentasPorEstado(),
            'transaccionesRecientes' => $this->transaccionDetalleModel->buscarTodo($busqueda),
            'busqueda' => $busqueda
        ];

        return view('back/compras/estadisticas', $data);
    }




    protected function getTotalVentas()
    {
        return $this->transaccionMaestroModel
            ->selectSum('total')
            ->where('estado', 'completada')
            ->first()['total'] ?? 0;
    }

    protected function getVentasPorMes()
    {
        return $this->transaccionMaestroModel
            ->select("DATE_FORMAT(fecha_creacion, '%Y-%m') as mes, SUM(total) as total")
            ->where('estado', 'completada')
            ->groupBy('mes')
            ->orderBy('mes', 'ASC')
            ->findAll();
    }

    protected function getProductosMasVendidos()
    {
        return $this->transaccionDetalleModel
            ->select('productos.nombre, SUM(transacciones_detalle.cantidad) as cantidad_vendida, SUM(transacciones_detalle.subtotal) as total_ventas')
            ->join('productos', 'productos.id = transacciones_detalle.producto_id')
            ->join('transacciones_maestro', 'transacciones_maestro.id = transacciones_detalle.transaccion_id')
            ->where('transacciones_maestro.estado', 'completada')
            ->groupBy('productos.nombre')
            ->orderBy('cantidad_vendida', 'DESC')
            ->limit(5)
            ->findAll();
    }

    protected function getMejoresClientes()
    {
        return $this->transaccionMaestroModel
            ->select('usuarios.nombre, usuarios.apellido, usuarios.email, COUNT(transacciones_maestro.id) as total_compras, SUM(transacciones_maestro.total) as total_gastado')
            ->join('usuarios', 'usuarios.id = transacciones_maestro.usuario_id')
            ->where('transacciones_maestro.estado', 'completada')
            ->groupBy('usuarios.id')
            ->orderBy('total_gastado', 'DESC')
            ->limit(5)
            ->findAll();
    }

    protected function getVentasPorEstado()
    {
        return $this->transaccionMaestroModel
            ->select('estado, COUNT(*) as cantidad, SUM(total) as total')
            ->groupBy('estado')
            ->findAll();
    }
}