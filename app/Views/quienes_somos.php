<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Automotors- Quienes Somos</title>

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

  <!--  CONTENIDO DE LA PAGUINA-->
  <section class="container my-5">
    <div class="row align-items-center bg-white rounded shadow p-4">
      <div class="col-md-6">
        <img src="assets/img/quienes_somos.jpg" class="img-fluid rounded" alt="Quiénes somos Automotors">
      </div>
      <div class="col-md-6">
        <h2 class="mb-3">¿Quiénes Somos?</h2>
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

  <!-- PIE DE PÁGINA -->
  <?php include('partials/footer.php'); ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>