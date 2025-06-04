<?= $this->extend('layouts/plantilla') ?>

<<<<<<< Updated upstream

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
        <!-- Vehículo 1 -->
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="<?= base_url('assets/img/catalogo/vehiculo1.jpg') ?>" class="card-img-top" alt="Fiat Cronos">
            <div class="card-body">
              <h3 class="card-title">Fiat Cronos</h3>
              <p class="card-text">2023 | 45,000 km | Automático</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">$15,000</span>
                <a href="<?= base_url('catalogo/vehiculo') ?>" class="btn btn-sm btn-outline-primary">Ver detalles</a>
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
                <a href="<?= base_url('catalogo/vehiculo') ?>" class="btn btn-sm btn-outline-primary">Ver detalles</a>
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
                <a href="<?= base_url('catalogo/vehiculo') ?>" class="btn btn-sm btn-outline-primary">Ver detalles</a>
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

  <?= $this->endSection() ?>
=======
<?= $this->section('content') ?>

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-primary">CATÁLOGO DE VEHÍCULOS</h1>
        <p class="lead">Descubre nuestra amplia gama de vehículos disponibles</p>
    </div>

    <!-- Filtros -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="get" action="<?= base_url('catalogo') ?>" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Marca</label>
                    <select name="marca" class="form-select">
                        <option value="">Todas las marcas</option>
                        <?php foreach ($marcas as $marca): ?>
                            <option value="<?= esc($marca['nombre']) ?>" <?= ($filtros['marca'] ?? '') == $marca['nombre'] ? 'selected' : '' ?>>
                                <?= esc($marca['nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-2">
                    <label class="form-label">Año</label>
                    <select name="anio" class="form-select">
                        <option value="">Todos los años</option>
                        <?php foreach ($anios as $anio): ?>
                            <?php if ($anio['anio']): ?>
                                <option value="<?= esc($anio['anio']) ?>" <?= ($filtros['anio'] ?? '') == $anio['anio'] ? 'selected' : '' ?>>
                                    <?= esc($anio['anio']) ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-2">
                    <label class="form-label">Transmisión</label>
                    <select name="transmision" class="form-select">
                        <option value="">Todas</option>
                        <?php foreach ($transmisiones as $trans): ?>
                            <?php if ($trans['transmision']): ?>
                                <option value="<?= esc($trans['transmision']) ?>" <?= ($filtros['transmision'] ?? '') == $trans['transmision'] ? 'selected' : '' ?>>
                                    <?= esc($trans['transmision']) ?>
                                </option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">Precio máximo</label>
                    <select name="precio_max" class="form-select">
                        <option value="">Sin límite</option>
                        <option value="1000000" <?= ($filtros['precio_max'] ?? '') == '1000000' ? 'selected' : '' ?>>Hasta $1.000.000</option>
                        <option value="3000000" <?= ($filtros['precio_max'] ?? '') == '3000000' ? 'selected' : '' ?>>Hasta $3.000.000</option>
                        <option value="5000000" <?= ($filtros['precio_max'] ?? '') == '5000000' ? 'selected' : '' ?>>Hasta $5.000.000</option>
                        <option value="10000000" <?= ($filtros['precio_max'] ?? '') == '10000000' ? 'selected' : '' ?>>Hasta $10.000.000</option>
                    </select>
                </div>
                
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Resultados -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php if (empty($productos)): ?>
            <div class="col-12">
                <div class="alert alert-warning">
                    No se encontraron vehículos con los filtros seleccionados
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($productos as $producto): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="ratio ratio-16x9">
                            <img src="<?= base_url('assets/img/catalogo/productos/' . esc($producto['img_principal'])) ?>" 
                                 class="card-img-top object-fit-cover" 
                                 alt="<?= esc($producto['nombre']) ?>">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title fw-bold"><?= esc($producto['nombre']) ?></h3>
                            <p class="card-text text-muted mb-3"><?= esc($producto['descripcion']) ?></p>
                            
                            <div class="d-flex flex-wrap gap-3 mb-3">
                                <?php if (isset($producto['anio'])): ?>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-calendar text-primary me-2"></i>
                                        <span class="small"><?= esc($producto['anio']) ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (isset($producto['kilometros'])): ?>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-speedometer2 text-primary me-2"></i>
                                        <span class="small"><?= number_format($producto['kilometros'], 0, ',', '.') ?> km</span>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if (isset($producto['transmision'])): ?>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-gear text-primary me-2"></i>
                                        <span class="small"><?= esc($producto['transmision']) ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-0 pt-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h4 text-primary fw-bold">$<?= esc(number_format($producto['precio_base'], 0, ',', '.')) ?></span>
                                <a href="<?= base_url('catalogo/vehiculo/' . $producto['id']) ?>" 
                                   class="btn btn-outline-primary btn-sm">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
>>>>>>> Stashed changes
