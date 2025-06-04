<<<<<<< Updated upstream
<h2>Agregar usuario</h2>
<form action="<?= site_url('usuarios/guardar') ?>" method="post">
  <input name="nombre" placeholder="Nombre"><br>
  <input name="apellido" placeholder="Apellido"><br>
  <input name="email" placeholder="Email"><br>
  <input name="usuario" placeholder="Usuario"><br>
  <input name="pass" placeholder="Contraseña"><br>
  <input name="perfil_id" placeholder="Perfil ID"><br>
  <input name="baja" value="no"><br>
  <button type="submit">Guardar</button>
=======
<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>

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
>>>>>>> Stashed changes
</form>
