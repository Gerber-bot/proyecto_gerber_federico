<?= $this->extend('layouts/plantilla') ?>


<?= $this->section('content') ?>
  <!-- LO QUE SOMOS -->
  <section class="container my-5">
    <div class="row align-items-center bg-white rounded shadow p-4">
      <div class="col-md-6">
        <img src="<?= base_url('assets/img/quienes_somos.jpg') ?>" class="img-fluid rounded" alt="Quiénes somos Automotors">
      </div>
      <div class="col-md-6">
        <h2 class="mb-3">¿QUIÉNES SOMOS?</h2>
        <p><strong>Automotors</strong> nació hace apenas un mes con una misión clara: ofrecer soluciones ágiles,
          confiables y modernas en el mundo automotriz.</p>
        <p>Somos una empresa joven, pero impulsada por una gran pasión por los vehículos, la tecnología y el servicio al
          cliente. Creemos firmemente que comenzar bien es clave para crecer con fuerza, por eso desde el primer día
          trabajamos con compromiso, profesionalismo y cercanía.</p>
        <p>Aunque nuestros motores recién arrancan, nos proyectamos como un nuevo referente en el sector, apostando a la
          innovación, la confianza y la experiencia personalizada. En <strong>Automotors</strong>, queremos acompañarte
          en cada kilómetro de tu camino.</p>
      </div>
    </div>
  </section>

<?= $this->endSection() ?>