<?= $this->extend('layouts/plantilla') ?>

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