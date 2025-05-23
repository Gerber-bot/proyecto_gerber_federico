<h2>Listado de Usuarios</h2>
<a href="<?= site_url('usuarios/agregar') ?>">Agregar Usuario</a>
<table border="1">
  <tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Email</th>
    <th>Acciones</th>
  </tr>
  <?php foreach ($usuarios as $u): ?>
    <tr>
      <td><?= $u['id'] ?></td>
      <td><?= $u['nombre'] ?></td>
      <td><?= $u['apellido'] ?></td>
      <td><?= $u['email'] ?></td>
      <td>
        <a href="<?= site_url('usuarios/editar/' . $u['id']) ?>">Editar</a> |
        <a href="<?= site_url('usuarios/eliminar/' . $u['id']) ?>"
          onclick="return confirm('¿Estás seguro de que querés eliminar este usuario?')">
          Eliminar
        </a>
      </td>

    </tr>
  <?php endforeach; ?>
</table>