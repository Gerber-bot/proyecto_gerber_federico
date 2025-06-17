<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="mb-4">Postulantes</h2>

    <?php if (empty($postulantes)): ?>
        <div class="alert alert-info">No hay postulantes registrados</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <!-- Cabecera de la tabla -->
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Área</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($postulantes as $postulante): ?>
                        <tr>
                            <td><?= esc($postulante['nombre'] . ' ' . $postulante['apellido']) ?></td>
                            <td><?= esc($postulante['email']) ?></td>
                            <td><?= esc($postulante['telefono']) ?></td>
                            <td><?= esc($postulante['area_interes']) ?></td>
                            <td>
                                <a href="<?= base_url('assets/uploads/cv/' . $postulante['curriculum']) ?>"
                                    class="btn btn-sm btn-primary" target="_blank">
                                    Ver CV
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>