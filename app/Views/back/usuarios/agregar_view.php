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
</form>
