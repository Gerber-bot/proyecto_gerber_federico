<<<<<<< HEAD
<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

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

    <!-- Modal para agendar servicios-->
<?= $this->include('layouts/modals/agendar_servicio') ?>

=======
<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

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

    <!-- Modal para agendar servicios-->
<?= $this->include('layouts/modals/agendar_servicio') ?>

>>>>>>> adb5ca7151cc3a9f97342981057be4a997df9fba
  <?= $this->endSection() ?>