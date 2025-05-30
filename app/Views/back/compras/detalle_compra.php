<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><?= esc($titulo) ?></h1>
        <a href="<?= base_url('compras') ?>" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <!-- Resumen de la compra -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <p class="mb-1"><strong>Fecha:</strong> <?= date('d/m/Y H:i', strtotime($compra['fecha_creacion'])) ?></p>
                </div>
                <div class="col-md-4">
                    <p class="mb-1"><strong>Total:</strong> $<?= number_format($compra['total'], 2) ?></p>
                </div>
                <div class="col-md-4">
                    <p class="mb-1">
                        <strong>Estado:</strong>
                        <span class="badge bg-<?= $compra['estado'] == 'completada' ? 'success' : 'warning' ?>">
                            <?= ucfirst($compra['estado']) ?>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Lista de productos -->
    <h3 class="mb-3">Productos</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                <tr>
                    <td>
                        <img src="<?= base_url('assets/img/catalogo/productos/' . $producto['img_principal']) ?>" 
                             alt="<?= esc($producto['nombre']) ?>" 
                             style="width: 60px; height: 45px; object-fit: cover;">
                    </td>
                    <td><?= esc($producto['nombre']) ?></td>
                    <td>$<?= number_format($producto['precio_unitario'], 2) ?></td>
                    <td><?= $producto['cantidad'] ?></td>
                    <td>$<?= number_format($producto['subtotal'], 2) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-end fw-bold">Total:</td>
                    <td class="fw-bold">$<?= number_format($compra['total'], 2) ?></td>
                </tr>
            </tfoot>
        </table>
    </div>

<?= $this->endSection() ?>