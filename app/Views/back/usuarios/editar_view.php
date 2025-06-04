<<<<<<< Updated upstream
<h2>Editar Usuario</h2>
<form action="<?= site_url('usuarios/actualizar/' . $usuario['id']) ?>" method="post">
  <input name="nombre" value="<?= $usuario['nombre'] ?>"><br>
  <input name="apellido" value="<?= $usuario['apellido'] ?>"><br>
  <input name="email" value="<?= $usuario['email'] ?>"><br>
  <input name="usuario" value="<?= $usuario['usuario'] ?>"><br>
  <input name="pass" placeholder="Nueva contraseña (opcional)"><br>
  <input name="perfil_id" value="<?= $usuario['perfil_id'] ?>"><br>
  <input name="baja" value="<?= $usuario['baja'] ?>"><br>
  <button type="submit">Actualizar</button>
=======
<?php if (session()->getFlashdata('_ci_validation_errors')): ?>
    <div class="alert alert-danger">
        <?= \Config\Services::validation()->listErrors() ?>
    </div>
<?php endif; ?>

<form action="<?= base_url('usuarios/actualizar/' . $usuario['id']) ?>" method="post">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= old('nombre', $usuario['nombre']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" name="apellido" class="form-control" value="<?= old('apellido', $usuario['apellido']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Correo Electrónico</label>
        <input type="email" name="email" class="form-control" value="<?= old('email', $usuario['email']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Nueva Contraseña (opcional)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label for="identificador" class="form-label">Rol</label>
        <select name="identificador" class="form-select" required>
            <option value="0" <?= old('identificador', $usuario['identificador']) == '0' ? 'selected' : '' ?>>Cliente</option>
            <option value="1" <?= old('identificador', $usuario['identificador']) == '1' ? 'selected' : '' ?>>Administrador</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
>>>>>>> Stashed changes
</form>
