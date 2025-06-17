<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <h2>Administrar Marcas</h2>
    <div class="mb-3"> 
        <a href="<?= base_url('catalogo_admin') ?>" class="btn btn-outline-secondary me-2">
            <i class="bi bi-arrow-left"></i> Volver al Catálogo
        </a>
        <a href="<?= base_url('back/catalogo/marcas/crear') ?>" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nueva Marca
        </a>
    </div>

    <?php if (session('success')): ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th>Logo</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($marcas as $marca): ?>
                        <tr>
                            <td>
                                <?php if (!empty($marca['logo'])): ?>
                                    <?php
                                    $logoPath = FCPATH . 'assets/img/marcas/' . $marca['logo'];
                                    if (file_exists($logoPath)): ?>
                                        <img src="<?= base_url('assets/img/marcas/' . $marca['logo']) ?>"
                                            alt="<?= esc($marca['nombre']) ?>" class="img-thumbnail"
                                            style="max-width: 50px; max-height: 50px;">
                                    <?php else: ?>
                                        <span class="badge bg-warning">Logo no encontrado</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Sin logo</span>
                                <?php endif; ?>
                            </td>
                            <td><?= esc($marca['nombre']) ?></td>
                            <td><?= esc($marca['descripcion'] ?? 'N/A') ?></td>
                            <td>
                                <span class="badge bg-<?= $marca['estado'] ? 'success' : 'danger' ?>">
                                    <?= $marca['estado'] ? 'Activa' : 'Inactiva' ?>
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('back/catalogo/marcas/editar/' . $marca['id']) ?>"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="<?= base_url('back/catalogo/marcas/cambiar-estado/' . $marca['id']) ?>"
                                        class="btn btn-sm btn-<?= $marca['estado'] ? 'danger' : 'success' ?>">
                                        <i class="bi bi-power"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>