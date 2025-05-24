<?= $this->extend('layouts/plantilla') ?>


<?= $this->section('content') ?>

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
        <?php foreach ($vehiculos as $v): ?>
          <?php
            // Si es cliente y el producto está deshabilitado, no lo muestra
            if ($v['estado'] == 0 && (!session()->get('isLoggedIn') || session()->get('identificador') != 1)) {
                continue;
            }
          ?>
          <div class="col-md-4 position-relative">
            <div class="card h-100 shadow-sm">
              <?php if (session()->get('isLoggedIn') && session()->get('identificador') == 1): ?>
                <?php if ($v['estado'] == 1): ?>
                  <!-- Botón X para deshabilitar -->
                  <a href="<?= base_url('catalogo/deshabilitar/' . $v['id']) ?>"
                     onclick="return confirm('¿Deshabilitar este vehículo?')"
                     class="position-absolute top-0 end-0 m-2 btn btn-sm btn-danger rounded-circle"
                     title="Deshabilitar">
                    <i class="bi bi-x-lg"></i>
                  </a>
                <?php else: ?>
                  <!-- Botón para habilitar -->
                  <a href="<?= base_url('catalogo/habilitar/' . $v['id']) ?>"
                     onclick="return confirm('¿Habilitar este vehículo?')"
                     class="position-absolute top-0 end-0 m-2 btn btn-sm btn-success rounded-circle"
                     title="Habilitar">
                    <i class="bi bi-check-lg"></i>
                  </a>
                <?php endif; ?>
              <?php endif; ?>
              <img src="<?= base_url('assets/img/catalogo/' . esc($v['imagen'])) ?>" class="card-img-top" alt="<?= esc($v['marca'] . ' ' . $v['modelo']) ?>">
              <div class="card-body">
                <h3 class="card-title"><?= esc($v['marca'] . ' ' . $v['modelo']) ?></h3>
                <p class="card-text"><?= esc($v['anio']) ?> | <?= esc(number_format($v['kilometros'], 0, ',', '.')) ?> km | <?= esc($v['transmision']) ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="fw-bold text-primary">$<?= esc(number_format($v['precio'], 0, ',', '.')) ?></span>
                  <a href="<?= base_url('catalogo/vehiculo/' . $v['id']) ?>" class="btn btn-sm btn-outline-primary">Ver detalles</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
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

    <?php if (session()->get('isLoggedIn') && session()->get('identificador') == 1): ?>
      <div class="mb-4 text-end">
        <a href="<?= base_url('catalogo/agregar') ?>" class="btn btn-success">
          <i class="bi bi-plus-circle"></i> Agregar Vehículo
        </a>
      </div>
    <?php endif; ?>
  </main>

  <?= $this->endSection() ?>