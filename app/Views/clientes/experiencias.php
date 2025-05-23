<?= $this->extend('layouts/plantilla') ?>


<?= $this->section('content') ?>

  <section class="experiencias py-5">
    <section class="text-center mb-5">
      <h1 class="display-4 fw-bold">Cuéntanos tu Experiencia</h1>
      <p class="lead">Valoramos tu opinión</p>
    </section>

    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalComentario">Añadir
          Comentario</button>
      </div>

      <div class="row" id="galeria-experiencias">
        <div class="col-md-4 mb-4">
          <div class="card experiencia-card shadow-sm">
            <img src="<?= base_url('assets/img/ejemplo1.jpg') ?>" class="card-img-top" alt="Experiencia 1">
            <div class="card-body">
              <h5 class="card-title">@usuario123</h5>
              <p class="card-text">Excelente atención y muy buenos precios, ¡recomendado!</p>
            </div>
          </div>
        </div>
        <!-- Más experiencias pueden ir aquí -->
      </div>
    </div>
  </section>

  <!-- Modal para añadir comentarios-->
<?= $this->include('layouts/modals/agregar_comentarios') ?>

<?= $this->endSection() ?>

