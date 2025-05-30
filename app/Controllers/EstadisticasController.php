<?php
namespace App\Controllers;

use App\Models\TransaccionMaestroModel;

class EstadisticasController extends BaseController 
{
    public function index()
    {
        $model = new TransaccionMaestroModel();

        // 1. Diagnóstico: Ver datos crudos de la base de datos
        $transaccionesCompletadas = $model->where('estado', 'completada')->findAll();
        
        // 2. Cálculo alternativo del total (por si falla selectSum)
        $totalCalculadoManual = 0;
        foreach ($transaccionesCompletadas as $transaccion) {
            $totalCalculadoManual += (float)$transaccion['total'];
        }

        // 3. Obtener datos para la vista
        $data = [
            'titulo' => 'Estadísticas de Ventas',
            'ventasTotales' => $model->where('estado', 'completada')
                                   ->selectSum('total')
                                   ->first()['total'] ?? $totalCalculadoManual,
            'ventasPorMes' => $model->where('estado', 'completada')
                                   ->select("DATE_FORMAT(fecha_creacion, '%Y-%m') AS mes, SUM(total) AS total")
                                   ->groupBy('mes')
                                   ->findAll(),
            'ultimasVentas' => $model->where('estado', 'completada')
                                   ->orderBy('fecha_creacion', 'DESC')
                                   ->limit(10)
                                   ->findAll(),
            'debug_data' => [ // Datos para diagnóstico
                'transacciones_count' => count($transaccionesCompletadas),
                'total_manual' => $totalCalculadoManual,
                'query_log' => $model->getLastQuery()
            ]
        ];

        return view('back/compras/estadisticas', $data);
    }
}