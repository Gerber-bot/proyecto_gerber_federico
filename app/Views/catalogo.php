<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Automotors- Catalogo</title>

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


  <!-- CONTENIDO ESPECÍFICO DE CATÁLOGO -->
  <main class="container my-5">
    <!-- Título del catálogo -->
    <section class="text-center mb-5">
      <h1 class="display-4 fw-bold">Catalogo de vehiculos</h1>
      <p class="lead">Descubre nuestra amplia gama de vehículos disponibles</p>
    </section>

    <!-- Filtros -->
    <section class="filtros bg-white p-4 rounded shadow-sm mb-5">
      <div class="row g-3">
        <div class="col-md-3">
          <label for="marca" class="form-label">Marca</label>
          <select class="form-select" id="marca">
            <option selected>Todas las marcas</option>
            <option>Fiat</option>
            <option>Renault</option>
            <option>Chevrolet</option>
            <option>Ford</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="modelo" class="form-label">Modelo</label>
          <select class="form-select" id="modelo">
            <option selected>Todos los modelos</option>
            <option>Modelo 1</option>
            <option>Modelo 2</option>
            <option>Modelo 3</option>
          </select>
        </div>
        <div class="col-md-3">
          <label for="precio" class="form-label">Precio máximo</label>
          <select class="form-select" id="precio">
            <option selected>Cualquier precio</option>
            <option>Hasta $10,000</option>
            <option>Hasta $20,000</option>
            <option>Hasta $30,000</option>
            <option>Hasta $50,000</option>
          </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
          <button class="btn btn-dark w-100">Filtrar</button>
        </div>
      </div>
    </section>

    <!-- Vehículos -->
    <section class="vehiculos">
      <div class="row g-4">
        <!-- Vehículo 1 -->
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="<?= base_url('assets/img/catalogo/vehiculo1.jpg') ?>" class="card-img-top" alt="Fiat Cronos">
            <div class="card-body">
              <h3 class="card-title">Fiat Cronos</h3>
              <p class="card-text">2023 | 45,000 km | Automático</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">$15,000</span>
                <a href="<?= base_url('vehiculo') ?>" class="btn btn-sm btn-outline-primary">Ver detalles</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Vehículo 2 -->
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="<?= base_url('assets/img/catalogo/vehiculo2.jpg') ?>" class="card-img-top" alt="Renault Kwid">
            <div class="card-body">
              <h3 class="card-title">Renault Kwid</h3>
              <p class="card-text">Del año | 0 km | Manual</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">$5,000</span>
                <a href="<?= base_url('vehiculo') ?>" class="btn btn-sm btn-outline-primary">Ver detalles</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Vehículo 3 -->
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="<?= base_url('assets/img/catalogo/vehiculo3.jpg') ?>" class="card-img-top" alt="Chevrolet Onix">
            <div class="card-body">
              <h3 class="card-title">Chevrolet Onix</h3>
              <p class="card-text">2001 | 500,000 km | Manual</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">$1,000</span>
                <a href="<?= base_url('vehiculo') ?>" class="btn btn-sm btn-outline-primary">Ver detalles</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Paginación -->
      <nav class="mt-5">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#">Anterior</a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Siguiente</a>
          </li>
        </ul>
      </nav>
    </section>
  </main>

  <!-- PIE DE PÁGINA -->
  <?php include('partials/footer.php'); ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>