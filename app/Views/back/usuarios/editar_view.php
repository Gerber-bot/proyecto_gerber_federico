<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('content') ?>

<?php if (session('errors')): ?>
    <div class="alert alert-danger">
        <?= implode('<br>', session('errors')) ?>
    </div>
<?php endif; ?>

<div class="container py-4">
    <form action="<?= base_url('usuarios/actualizar/' . $usuario['id']) ?>" method="post">
        <?= csrf_field() ?>
        
        <!-- Campos de solo lectura -->
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" value="<?= esc($usuario['nombre']) ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Apellido</label>
            <input type="text" class="form-control" value="<?= esc($usuario['apellido']) ?>" readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" value="<?= esc($usuario['email']) ?>" readonly>
        </div>

        <!-- Campo editable - Rol -->
        <div class="mb-3">
            <label for="identificador" class="form-label">Rol</label>
            <select name="identificador" class="form-select" required>
                <option value="0" <?= $usuario['identificador'] == 0 ? 'selected' : '' ?>>Cliente</option>
                <option value="1" <?= $usuario['identificador'] == 1 ? 'selected' : '' ?>>Administrador</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Rol</button>
        <a href="<?= base_url('usuarios') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= $this->endSection() ?>
