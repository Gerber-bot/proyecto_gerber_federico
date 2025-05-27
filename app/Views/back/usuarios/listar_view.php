<h2>Listado de Usuarios</h2>
<a href="<?= site_url('usuarios/agregar') ?>">Agregar Usuario</a>

<form class="mb-3" method="get" action="<?= site_url('usuarios') ?>">
  <div class="input-group">
    <input type="text" class="form-control" name="buscar" placeholder="Buscar usuario por nombre, apellido o email" value="<?= esc($_GET['buscar'] ?? '') ?>">
    <button class="btn btn-primary" type="submit">Buscar</button>
  </div>
</form>

<table border="1" class="table table-bordered mt-3">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Email</th>
      <th>Identificador</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usuarios as $u): ?>
      <tr>
        <td><?= esc($u['id']) ?></td>
        <td><?= esc($u['nombre']) ?></td>
        <td><?= esc($u['apellido']) ?></td>
        <td><?= esc($u['email']) ?></td>
        <td>
          <?= $u['identificador'] == 1 ? 'Administrador' : 'Usuario' ?>
        </td>
        <td>
          <?= $u['estado'] == 1 ? 'Habilitado' : 'Deshabilitado' ?>
        </td>
        <td>
          <a href="<?= site_url('usuarios/editar/' . $u['id']) ?>">Editar</a> |
          <?php if ($u['estado'] == 1): ?>
            <a href="<?= site_url('usuarios/deshabilitar/' . $u['id']) ?>"
              onclick="return confirm('¿Deshabilitar este usuario?')">
              Deshabilitar
            </a>
          <?php else: ?>
            <a href="<?= site_url('usuarios/habilitar/' . $u['id']) ?>"
              onclick="return confirm('¿Habilitar este usuario?')">
              Habilitar
            </a>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
