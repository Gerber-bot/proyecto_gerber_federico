<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<!-- CARRUSEL DE IMÁGENES -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
  </div>
  <div class="carousel-inner">
    <!-- Slide 1 -->
    <div class="carousel-item active">
      <img src="<?= base_url('assets/img/carrusel/Slide1.jpg') ?>" class="d-block w-100" alt="Slide 1">
      <div class="carousel-caption d-none d-md-block">
        <h2>EL VEHÍCULO DE TUS SUEÑOS</h2>
        <a href="<?= base_url('catalogo') ?>" class="btn btn-primary">A TU ALCANCE</a>
      </div>
    </div>
    <!-- Slide 2 -->
    <div class="carousel-item">
      <img src="<?= base_url('assets/img/carrusel/Slide2.jpg') ?>" class="d-block w-100" alt="Slide 2">
      <div class="carousel-caption d-none d-md-block">
        <h2>A TU GUSTO</h2>
        <a href="<?= base_url('catalogo') ?>" class="btn btn-secondary">DESCUBRILO</a>
      </div>
    </div>
    <!-- Slide 3 -->
    <div class="carousel-item">
      <img src="<?= base_url('assets/img/carrusel/Slide3.jpg') ?>" class="d-block w-100" alt="Slide 3">
      <div class="carousel-caption d-none d-md-block">
        <h2>O TAMBIEN</h2>
        <a href="<?= base_url('catalogo') ?>" class="btn btn-dark">VER MÁS</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

<!-- SECCIÓN DE MARCAS -->
<section class="marcas text-center py-5">
  <h2>ELIGE TU DESTINO</h2>
  <div class="contenedor-marcas d-flex justify-content-center flex-wrap gap-4 mt-4">
    <?php foreach ($marcas_populares as $marca): ?>
      <div class="marca">
        <a href="<?= base_url('catalogo?marca_id=' . $marca['id']) ?>" class="logo-marca">
          <?php if ($marca['logo']): ?>
            <img src="<?= base_url('assets/img/marcas/' . esc($marca['logo'])) ?>" alt="<?= esc($marca['nombre']) ?>">
          <?php else: ?>
            <img src="<?= base_url('assets/img/marcas/default.png') ?>" alt="<?= esc($marca['nombre']) ?>">
          <?php endif; ?>
          <p><?= esc($marca['nombre']) ?></p>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- SECCION CONOCENOS -->
<div id="conocenos" class="seccion-conocenos">
  <div class="container">
    <div class="header-conocenos text-center">
      <h1 class="titulo-principal">MÁS QUE AUTOS, EXPERIENCIAS DE CONFIANZA</h1>
      <p class="subtitulo">Descubrí todo lo que tenemos para ofrecerte</p>
    </div>

    <!-- Item 1 -->
    <div class="item-conocenos">
      <div class="imagen-conocenos">
        <img src="<?= base_url('assets/img/descripcion/catalogo.jpg') ?>" alt="Catálogo de Vehículos" class="img-fluid">
      </div>
      <div class="texto-conocenos">
        <h2>Catálogo de Vehículos</h2>
        <div class="separador"></div>
        <p>Accedé a nuestra colección completa de vehículos disponibles. Encontrá tu próximo auto según marca, modelo,
          precio y características.</p>
      </div>
    </div>

    <!-- Item 2 -->
    <div class="item-conocenos inverso">
      <div class="imagen-conocenos">
        <img src="<?= base_url('assets/img/descripcion/servicios.jpg') ?>" alt="Servicios" class="img-fluid">
      </div>
      <div class="texto-conocenos">
        <h2>Servicios</h2>
        <div class="separador"></div>
        <p>Ofrecemos mantenimiento, reparaciones, limpieza y diagnósticos técnicos realizados por profesionales
          especializados.</p>
      </div>
    </div>

    <!-- Item 3 -->
    <div class="item-conocenos">
      <div class="imagen-conocenos">
        <img src="<?= base_url('assets/img/descripcion/clientes.jpg') ?>" alt="Experiencia de clientes"
          class="img-fluid">
      </div>
      <div class="texto-conocenos">
        <h2>Experiencia de Clientes</h2>
        <div class="separador"></div>
        <p>Leé las opiniones de quienes ya confiaron en nosotros. Valoramos la transparencia y la calidad en cada
          interacción.</p>
      </div>
    </div>

    <!-- Item 4 -->
    <div class="item-conocenos inverso">
      <div class="imagen-conocenos">
        <img src="<?= base_url('assets/img/descripcion/empresa.jpg') ?>" alt="Información corporativa"
          class="img-fluid">
      </div>
      <div class="texto-conocenos">
        <h2>Información Corporativa</h2>
        <div class="separador"></div>
        <p>Conocé nuestra historia, misión, visión y el equipo que conforma nuestra empresa. Somos más que una
          concesionaria.</p>
      </div>
    </div>

    <!-- Item 5 -->
    <div class="item-conocenos">
      <div class="imagen-conocenos">
        <img src="<?= base_url('assets/img/descripcion/compraventa.jpg') ?>" alt="Opciones de compra/venta"
          class="img-fluid">
      </div>
      <div class="texto-conocenos">
        <h2>Opciones de Compra/Venta</h2>
        <div class="separador"></div>
        <p>Te ofrecemos múltiples alternativas para comprar o vender tu vehículo con seguridad, financiación y
          asesoramiento personalizado.</p>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
