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
</form>
