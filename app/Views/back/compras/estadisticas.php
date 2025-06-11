<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h1 class="mb-4">Estadísticas de Ventas</h1>
    <form method="get" class="mb-3" action="#tablaTransacciones">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Buscar por cliente o producto..."
                value="<?= esc($busqueda) ?>">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </div>
    </form>

    <?php if (!empty($transaccionesRecientes)): ?>
        <form method="get" class="mb-3" action="#tablaTransacciones">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transaccionesRecientes as $t): ?>
                        <tr>
                            <td><?= $t['transaccion_id'] ?></td>
                            <td><?= $t['nombre'] ?>         <?= $t['apellido'] ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($t['fecha_creacion'])) ?></td>
                            <td><?= $t['producto'] ?></td>
                            <td><?= $t['cantidad'] ?></td>
                            <td>$<?= number_format($t['precio_unitario'], 2) ?></td>
                            <td>$<?= number_format($t['subtotal'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
    </div>
<?php else: ?>
    <p>No se encontraron transacciones.</p>
<?php endif; ?>


<div class="container mt-4">
    <!-- Resumen General -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Ventas</h5>
                    <p class="card-text h4">$<?= number_format($totalVentas, 2) ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Transacciones Completadas</h5>
                    <p class="card-text h4">
                        <?= array_reduce($ventasPorEstado, function ($carry, $item) {
                            return $carry + ($item['estado'] == 'completada' ? $item['cantidad'] : 0);
                        }, 0) ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Clientes Activos</h5>
                    <p class="card-text h4"><?= count($mejoresClientes) ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Productos más vendidos -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Productos Más Vendidos</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($productosMasVendidos as $producto): ?>
                                    <tr>
                                        <td><?= $producto['nombre'] ?></td>
                                        <td><?= $producto['cantidad_vendida'] ?></td>
                                        <td>$<?= number_format($producto['total_ventas'], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mejores clientes -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Mejores Clientes</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Compras</th>
                                    <th>Total Gastado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($mejoresClientes as $cliente): ?>
                                    <tr>
                                        <td><?= $cliente['nombre'] ?>
                                            <?= $cliente['apellido'] ?><br><small><?= $cliente['email'] ?></small>
                                        </td>
                                        <td><?= $cliente['total_compras'] ?></td>
                                        <td>$<?= number_format($cliente['total_gastado'], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>