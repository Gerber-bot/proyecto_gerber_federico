<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <h1 class="mb-4"><?= esc($titulo) ?></h1>

    <!-- Resumen rápido -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h5 class="card-title">Ventas Totales</h5>
                    <p class="card-text h4">$<?= number_format($ventasTotales, 2) ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico de ventas por mes (usando Chart.js) -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Ventas por Mes</h5>
        </div>
        <div class="card-body">
            <canvas id="ventasChart" height="150"></canvas>
        </div>
    </div>

    <!-- Tabla de últimas ventas -->
    <div class="card">
        <div class="card-header">
            <h5>Últimas 10 Ventas</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ultimasVentas as $venta): ?>
                        <tr>
                            <td><?= $venta['id'] ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($venta['fecha_creacion'])) ?></td>
                            <td>$<?= number_format($venta['total'], 2) ?></td>
                            <td>
                                <span class="badge bg-<?= $venta['estado'] == 'completada' ? 'success' : 'warning' ?>">
                                    <?= ucfirst($venta['estado']) ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Script para el gráfico -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('ventasChart').getContext('2d');
    const ventasData = {
        labels: <?= json_encode(array_column($ventasPorMes, 'mes')) ?>,
        datasets: [{
            label: 'Ventas por Mes',
            data: <?= json_encode(array_column($ventasPorMes, 'total')) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };
    new Chart(ctx, {
        type: 'bar',
        data: ventasData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>