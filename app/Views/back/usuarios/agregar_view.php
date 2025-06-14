<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('content') ?>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>
<div class="container py-4">
    <form action="<?= base_url('usuarios/guardar') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= old('nombre') ?>" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" value="<?= old('apellido') ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="identificador" class="form-label">Rol</label>
            <select name="identificador" class="form-select" required>
                <option value="">Seleccionar rol...</option>
                <option value="0" <?= old('identificador') == '0' ? 'selected' : '' ?>>Cliente</option>
                <option value="1" <?= old('identificador') == '1' ? 'selected' : '' ?>>Administrador</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Guardar Usuario</button>
        <a href="<?= base_url('usuarios') ?>" class="btn btn-outline-secondary me-2">
            <i class="bi bi-arrow-left"></i> Canselar
        </a>
    </form>
</div>
<?= $this->endSection() ?>