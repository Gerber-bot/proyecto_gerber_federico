<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<div class="container mt-5">

    <?php if (session()->getFlashdata('msg')): ?>
        <div class="alert alert-success alert-dismissible fade show text-center mb-4" role="alert">
            <?= session()->getFlashdata('msg') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <?php if (!empty($perfil_id)): ?>
        <div class="text-center">
            <?php if ($perfil_id == 1): ?>
                <img src="<?= base_url('assets/img/admin.png') ?>" height="120" width="95" alt="Admin">
                <p class="mt-2">Perfil: Administrador</p>
            <?php elseif ($perfil_id == 2): ?>
                <img src="<?= base_url('assets/img/cliente.png') ?>" height="100" width="80" alt="Cliente">
                <img src="<?= base_url('assets/img/carrito.jpg') ?>" height="100" width="80" alt="Carrito">
                <p class="mt-2">Perfil: Cliente</p>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="mt-4 text-center">
        <h2>¡Bienvenido, <?= esc($nombre) ?>!</h2>
        <p class="text-muted">Este es tu panel personal. Desde aquí puedes acceder a tus opciones.</p>
        <a href="<?= base_url('logout') ?>" class="btn btn-danger mt-3">Cerrar Sesión</a>
    </div>

</div>

<?= $this->endSection() ?>
