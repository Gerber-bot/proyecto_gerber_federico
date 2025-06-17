<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('content') ?>

<div class="container py-4">

  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <h2 class="mb-0">Listado de Usuarios</h2>
    <a href="<?= site_url('usuarios/agregar') ?>" class="btn btn-success">
      <i class="bi bi-person-plus-fill"></i> Agregar Usuario
    </a>
  </div>

  <form class="mb-4" method="get" action="<?= site_url('usuarios') ?>">
    <div class="input-group">
      <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre, apellido o email"
        value="<?= esc($_GET['buscar'] ?? '') ?>">
      <button class="btn btn-primary" type="submit">
        <i class="bi bi-search"></i> Buscar
      </button>
    </div>
  </form>

  <div class="card mb-5">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover table-striped mb-0">
          <thead class="table-dark">
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
                  <span class="badge bg-<?= $u['identificador'] == 1 ? 'primary' : 'secondary' ?>">
                    <?= $u['identificador'] == 1 ? 'Administrador' : 'Usuario' ?>
                  </span>
                </td>
                <td>
                  <span class="badge bg-<?= $u['estado'] == 1 ? 'success' : 'danger' ?>">
                    <?= $u['estado'] == 1 ? 'Habilitado' : 'Deshabilitado' ?>
                  </span>
                </td>
                <td>
                  <div class="btn-group btn-group-sm">
                    <a href="<?= site_url('usuarios/editar/' . $u['id']) ?>" class="btn btn-warning">
                      <i class="bi bi-pencil-square"></i>
                    </a>
                    <?php if ($u['estado'] == 1): ?>
                      <?php if ($u['id'] != session()->get('id')): ?>
                        <a href="<?= site_url('usuarios/deshabilitar/' . $u['id']) ?>" class="btn btn-danger"
                          onclick="return confirm('¿Deshabilitar este usuario?')">
                          <i class="bi bi-person-dash-fill"></i>
                        </a>
                      <?php endif; ?>
                    <?php else: ?>
                      <a href="<?= site_url('usuarios/habilitar/' . $u['id']) ?>" class="btn btn-success"
                        onclick="return confirm('¿Habilitar este usuario?')">
                        <i class="bi bi-person-check-fill"></i>
                      </a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <h3 class="mb-3">Listado de Citas</h3>
  <div class="card mb-5">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover table-striped mb-0">
          <thead class="table-dark">
            <tr>
              <th>Nombre y Apellido</th>
              <th>Email</th>
              <th>Fecha Ingreso</th>
              <th>Horario</th>
              <th>Vehículo</th>
              <th>Método</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($citas as $cita): ?>
              <tr>
                <td><?= esc($cita['nombre_cliente']) ?></td>
                <td><?= esc($cita['email_cliente']) ?></td>
                <td><?= date('d/m/Y', strtotime($cita['fecha_creacion'])) ?></td>
                <td>
                  <?= $cita['horario'] == 'mañana' ? 'Mañana (8-12)' :
                    ($cita['horario'] == 'tarde' ? 'Tarde (14-18)' : 'Noche (18-22)') ?>
                </td>
                <td>
                  <?= $cita['vehiculo_id'] ?
                    '<a href="' . site_url('catalogo/vehiculo/' . $cita['vehiculo_id']) . '" target="_blank">Ver</a>' :
                    'General' ?>
                </td>
                <td><?= ucfirst($cita['metodo_contacto']) ?></td>
                <td>
                  <span class="badge bg-<?=
                    $cita['estado'] == 'completada' ? 'success' :
                    ($cita['estado'] == 'cancelada' ? 'danger' : 'warning text-dark') ?>">
                    <?= ucfirst($cita['estado']) ?>
                  </span>
                </td>
                <td>
                  <div class="btn-group btn-group-sm">
                    <?php if ($cita['estado'] != 'completada' && $cita['estado'] != 'cancelada'): ?>
                      <a href="<?= site_url('citas/marcar_atendido/' . $cita['id']) ?>" class="btn btn-success"
                        title="Marcar como atendido">
                        <i class="bi bi-check-circle-fill"></i>
                      </a>
                      <a href="<?= site_url('citas/cancelar/' . $cita['id']) ?>" class="btn btn-danger"
                        onclick="return confirm('¿Cancelar esta cita?')" title="Cancelar cita">
                        <i class="bi bi-x-circle-fill"></i>
                      </a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <h3 class="mb-3">Listado de Consultas</h3>
  <?php if (!empty($consultas)): ?>
    <div class="card mb-5">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Consulta</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($consultas as $consulta): ?>
                <tr>
                  <td><?= esc($consulta['id']) ?></td>
                  <td><?= esc($consulta['nombre_usuario']) ?></td>
                  <td><?= esc($consulta['correo']) ?></td>
                  <td><?= esc($consulta['consulta']) ?></td>
                  <td><?= date('d/m/Y H:i', strtotime($consulta['fecha'])) ?></td>
                  <td>
                    <span class="badge bg-<?= $consulta['atendida'] ? 'success' : 'warning text-dark' ?>">
                      <?= $consulta['atendida'] ? 'Atendida' : 'Pendiente' ?>
                    </span>
                  </td>
                  <td>
                    <?php if (!$consulta['atendida']): ?>
                      <a href="<?= site_url('consultas/marcar_atendida/' . $consulta['id']) ?>" class="btn btn-sm btn-success"
                        onclick="return confirm('¿Marcar esta consulta como atendida?')">
                        <i class="bi bi-check-circle-fill"></i>
                      </a>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  <?php else: ?>
    <p class="text-muted">No hay consultas registradas.</p>
  <?php endif; ?>

  <h3 class="mb-3">Turnos Agendados</h3>
  <div class="card">
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
          <thead class="table-dark">
            <tr>
              <th>Nombre</th>
              <th>Email</th>
              <th>Servicio</th>
              <th>Comentario</th>
              <th>Fecha Turno</th>
              <th>Fecha Registro</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($agendas)): ?>
              <?php foreach ($agendas as $agenda): ?>
                <tr>
                  <td><?= esc($agenda['nombre']) . ' ' . esc($agenda['apellido']) ?></td>
                  <td><?= esc($agenda['email']) ?></td>
                  <td><?= esc($agenda['servicio']) ?></td>
                  <td><?= esc($agenda['comentario']) ?></td>
                  <td><?= esc($agenda['fecha']) ?></td>
                  <td><?= esc($agenda['fecha_registro']) ?></td>
                  <td>
                    <span class="badge bg-<?= $agenda['estado'] === 'pendiente' ? 'warning text-dark' :
                      ($agenda['estado'] === 'atendido' ? 'success' : 'danger') ?>">
                      <?= ucfirst($agenda['estado']) ?>
                    </span>
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <a href="<?= base_url("agenda/estado/{$agenda['id']}/atendido") ?>" class="btn btn-success">
                        <i class="bi bi-check-lg"></i>
                      </a>
                      <a href="<?= base_url("agenda/estado/{$agenda['id']}/cancelado") ?>" class="btn btn-danger">
                        <i class="bi bi-x-lg"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="8" class="text-center text-muted">No hay turnos agendados.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection() ?>