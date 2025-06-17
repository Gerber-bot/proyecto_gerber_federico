<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestión de Vehículos</h2>
        <div>
            <a href="<?= base_url('catalogo/agregar') ?>" class="btn btn-primary me-2">
                <i class="bi bi-plus-circle"></i> Agregar Nuevo Vehículo
            </a>
            <a href="<?= base_url('/back/catalogo/marcas') ?>" class="btn btn-secondary">
                <i class="bi bi-tags"></i> Gestionar Marcas
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('msg') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?= esc($producto['nombre']) ?></td>
                        <td><?= esc($producto['marca']) ?></td>
                        <td>$<?= number_format($producto['precio_base'], 2) ?></td>
                        <td>
                            <?= $producto['stock'] ?>
                            <a href="<?= base_url('catalogo/editar_stock/' . $producto['id']) ?>"
                                class="btn btn-sm btn-outline-primary ms-2" title="Editar stock">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </td>
                        <td>
                            <?php if ($producto['estado'] == 1): ?>
                                <span class="badge bg-success">Habilitado</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Deshabilitado</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if ($producto['estado'] == 1): ?>
                                <a href="<?= base_url('catalogo/deshabilitar/' . $producto['id']) ?>"
                                    class="btn btn-sm btn-warning">Deshabilitar</a>
                            <?php else: ?>
                                <a href="<?= base_url('catalogo/habilitar/' . $producto['id']) ?>"
                                    class="btn btn-sm btn-success">Habilitar</a>
                            <?php endif; ?>
                            <a href="<?= base_url('catalogo/vehiculo/' . $producto['id']) ?>"
                                class="btn btn-sm btn-info">Ver</a>
                            <a href="<?= base_url('catalogo/editar_precio/' . $producto['id']) ?>"
                                class="btn btn-sm btn-secondary">Editar precio</a>
                            <a href="<?= base_url('catalogo/editar/' . $producto['id']) ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>