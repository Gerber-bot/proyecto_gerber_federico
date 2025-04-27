<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Automotors - compraYVenta</title>

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

  <!-- SECCIÓN COMPRA Y VENTA -->
  <div class="seccion-conocenos py-5">
    <div class="container">
      <div class="header-conocenos text-center">
        <h1 class="titulo-principal">Opciones de Compra y Venta</h1>
        <p class="subtitulo">Elegí la forma más segura y confiable de hacer negocios con tu vehículo</p>
      </div>

      <!-- Item 1: Compra de Vehículos -->
      <div class="item-conocenos">
        <div class="imagen-conocenos">
          <img src="<?= base_url('assets/img/compraventa/compra.jpg') ?>" alt="Comprar vehículo" class="img-fluid">
        </div>
        <div class="texto-conocenos">
          <h2>Comprá con confianza</h2>
          <div class="separador"></div>
          <p>Te ofrecemos una amplia variedad de vehículos, financiación flexible, garantía y asesoramiento
            personalizado para que elijas el auto ideal.</p>
        </div>
      </div>

      <!-- Item 2: Venta de Vehículos -->
      <div class="item-conocenos inverso">
        <div class="imagen-conocenos">
          <img src="<?= base_url('assets/img/compraventa/venta.jpg') ?>" alt="Vender vehículo" class="img-fluid">
        </div>
        <div class="texto-conocenos">
          <h2>Vendé con tranquilidad</h2>
          <div class="separador"></div>
          <p>Publicamos tu vehículo en nuestros catalogos, gestionamos todo el proceso y te garantizamos transparencia,
            asesoría y una venta rápida.</p>
        </div>
      </div>

      <!-- Item 3: Planes de financiación -->
      <div class="item-conocenos">
        <div class="imagen-conocenos">
          <img src="<?= base_url('assets/img/compraventa/financiacion.jpg') ?>" alt="Financiación" class="img-fluid">
        </div>
        <div class="texto-conocenos">
          <h2>Financiación a medida</h2>
          <div class="separador"></div>
          <p>Adaptamos los planes de pago a tu necesidad. Obtené tu auto con cuotas accesibles, mínima entrega y
            requisitos simples.</p>
        </div>
      </div>

      <!-- Item 4: Tasación online -->
      <div class="item-conocenos inverso">
        <div class="imagen-conocenos">
          <img src="<?= base_url('assets/img/compraventa/tasacion.jpg') ?>" alt="Tasación" class="img-fluid">
        </div>
        <div class="texto-conocenos">
          <h2>Tasá tu auto en minutos</h2>
          <div class="separador"></div>
          <p>Ingresá los datos de tu vehículo y recibí una estimación de su valor al instante. Rápido, gratis y sin
            compromiso.</p>
        </div>
      </div>

      <!-- Item 5: Canje de vehículos -->
      <div class="item-conocenos">
        <div class="imagen-conocenos">
          <img src="<?= base_url('assets/img/compraventa/canje.jpg') ?>" alt="Canje de vehículos" class="img-fluid">
        </div>
        <div class="texto-conocenos">
          <h2>Canjeá tu vehículo</h2>
          <div class="separador"></div>
          <p>¿Querés renovar tu auto? Traé el tuyo y te lo tomamos como parte de pago. Un proceso justo y sin
            complicaciones.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- PIE DE PÁGINA -->
  <?php include('partials/footer.php'); ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>