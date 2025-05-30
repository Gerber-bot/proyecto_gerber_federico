<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<div class="container py-5">
    <h1 class="mb-4">Mis Compras</h1>
    <?php if (empty($carrito)): ?>
        <div class="alert alert-info">
            Tu carrito está vacío. <a href="<?= base_url('catalogo') ?>">Explora nuestro catálogo</a> para agregar
            productos.
        </div>
    <?php else: ?>
        <form action="<?= base_url('carrito/actualizar') ?>" method="post">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($carrito as $item): ?>
                            <?php $subtotal = $item['precio'] * $item['cantidad']; ?>
                            <?php $total += $subtotal; ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('assets/img/catalogo/productos/' . $item['imagen']) ?>"
                                            alt="<?= esc($item['nombre']) ?>" class="img-thumbnail me-3"
                                            style="width: 80px; height: 60px; object-fit: cover;">
                                        <div>
                                            <h5 class="mb-0"><?= esc($item['nombre']) ?></h5>
                                        </div>
                                    </div>
                                </td>
                                <td>$<?= number_format($item['precio'], 2) ?></td>
                                <td>
                                    <input type="number" name="productos[<?= $item['id'] ?>]" value="<?= $item['cantidad'] ?>"
                                        min="1" class="form-control" style="width: 80px;">
                                </td>
                                <td>$<?= number_format($subtotal, 2) ?></td>
                                <td>
                                    <a href="<?= base_url('carrito/eliminar/' . $item['id']) ?>" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end fw-bold">Total:</td>
                            <td colspan="2" class="fw-bold">$<?= number_format($total, 2) ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="<?= base_url('catalogo') ?>" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Seguir comprando
                </a>
                <div>
                    <button type="submit" class="btn btn-warning me-2">
                        <i class="bi bi-arrow-clockwise"></i> Actualizar carrito
                    </button>
                    <a href="<?= base_url('carrito/finalizar') ?>" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Finalizar compra
                    </a>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>
<!-- Sección: Historial de compras -->
<h2 class="mt-5 mb-4">Tus Compras Anteriores</h2>

<?php if (!empty($compras_historicas)): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compras_historicas as $compra): ?>
                    <tr>
                        <td><?= $compra['id'] ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($compra['fecha_creacion'])) ?></td>
                        <td>$<?= number_format($compra['total'], 2) ?></td>
                        <td>
                            <span class="badge bg-<?= $compra['estado'] == 'completada' ? 'success' : 'warning' ?>">
                                <?= ucfirst($compra['estado']) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('detalle-compra/' . $compra['id']) ?>" class="btn btn-sm btn-primary">
                                Ver Detalle
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php else: ?>
    <div class="alert alert-warning">
        Aún no has realizado compras.
    </div>
<?php endif; ?>
</div>
<?= $this->endSection() ?>