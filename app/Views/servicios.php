<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Automotors - Servicios</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- CSS personalizado -->
  <link href="assets/css/miestilo.css" rel="stylesheet">
</head>

<body>
  <!-- ENCABEZADO -->
  <?php include('partials/header.php'); ?>

  <!-- BARRA DE NAVEGACIÓN PRINCIPAL -->
  <?php include('partials/nav.php'); ?>

  <!-- CONTENIDO PRINCIPAL -->
<main class="container my-5">
  <section class="text-center mb-5">
    <h1 class="display-4 fw-bold">Nuestros Servicios</h1>
    <p class="lead">Descubre lo que podemos ofrecerte</p>
    <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#modalAgendar">
      <i class="bi bi-calendar-check"></i> Agendar un Servicio
    </button>
  </section>

  <div class="container p-4 bg-dark text-white">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card-servicio">
          <div class="img-box">
            <img src="<?= base_url('assets/img/servicios/mantenimiento.jpg') ?>" alt="Mantenimiento">
          </div>
          <h3>Mantenimiento</h3>
          <p>Servicios programados como cambio de aceite, filtros, inspección general y diagnóstico computarizado.</p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card-servicio">
          <div class="img-box">
            <img src="<?= base_url('assets/img/servicios/reparacion_motor.jpg') ?>" alt="Reparación de Motor">
          </div>
          <h3>Reparación de Motor</h3>
          <p>Incluye diagnóstico de fallas, reemplazo de piezas, puesta a punto y limpieza de inyectores.</p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card-servicio">
          <div class="img-box">
            <img src="<?= base_url('assets/img/servicios/servicio_neumaticos.jpg') ?>" alt="Servicio de Neumáticos">
          </div>
          <h3>Servicio de Neumáticos</h3>
          <p>Revisión de presión, alineación, balanceo, rotación y cambio de cubiertas.</p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card-servicio">
          <div class="img-box">
            <img src="<?= base_url('assets/img/servicios/aire_acondicionado.jpg') ?>" alt="Aire Acondicionado">
          </div>
          <h3>Revisión de Aire Acondicionado</h3>
          <p>Chequeo de carga de gas, limpieza de filtros, reparación de compresor y detección de fugas.</p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card-servicio">
          <div class="img-box">
            <img src="<?= base_url('assets/img/servicios/accesorios.jpg') ?>" alt="Accesorios">
          </div>
          <h3>Instalación de Accesorios</h3>
          <p>Colocación de alarmas, sensores de estacionamiento, estéreos, cámaras y luces LED.</p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card-servicio">
          <div class="img-box">
            <img src="<?= base_url('assets/img/servicios/revision_frenos.jpg') ?>" alt="Revisión de Frenos">
          </div>
          <h3>Revisión de Frenos</h3>
          <p>Revisión de pastillas, discos, líquido de frenos, ABS y purgado completo.</p>
        </div>
      </div>
    </div>
  </div>
</main>

    <!-- Modal Agendar -->
    <div class="modal fade" id="modalAgendar" tabindex="-1" aria-labelledby="modalAgendarLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAgendarLabel">Agendar Servicio</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="servicioSeleccionado" class="form-label">Servicio</label>
                <select class="form-select" id="servicioSeleccionado">
                  <option selected disabled>Seleccione un servicio</option>
                  <option value="Mantenimiento">Mantenimiento</option>
                  <option value="Reparación de Motor">Reparación de Motor</option>
                  <option value="Servicio de Neumáticos">Servicio de Neumáticos</option>
                  <option value="Aire Acondicionado">Revisión de Aire Acondicionado</option>
                  <option value="Accesorios">Instalación de Accesorios</option>
                  <option value="Frenos">Revisión de Frenos</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="comentario" class="form-label">Comentario (opcional)</label>
                <textarea class="form-control" id="comentario" rows="3" placeholder="Describe brevemente el problema o lo que deseas hacer"></textarea>
              </div>
              <div class="mb-3">
                <label for="fecha" class="form-label">Fecha deseada</label>
                <input type="date" class="form-control" id="fecha" min="<?= date('Y-m-d') ?>">
              </div>
              <button type="submit" class="btn btn-success">Solicitar turno</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- PIE DE PÁGINA -->
  <?php include('partials/footer.php'); ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
