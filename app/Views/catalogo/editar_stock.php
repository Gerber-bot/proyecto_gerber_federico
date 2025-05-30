<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Editar Stock</h3>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h4><?= esc($producto['nombre']) ?></h4>
                        <p class="text-muted mb-1">Marca: <?= esc($producto['marca']) ?></p>
                        <p class="text-muted">Precio: $<?= number_format($producto['precio_base'], 2) ?></p>
                    </div>

                    <form action="<?= base_url('catalogo/actualizar_stock/' . $producto['id']) ?>" method="post">
                        <div class="mb-3">
                            <label for="stock" class="form-label">Cantidad en Stock</label>
                            <input type="number" class="form-control form-control-lg" id="stock" name="stock" 
                                   value="<?= old('stock', $producto['stock']) ?>" min="0" required>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="<?= base_url('catalogo_admin') ?>" class="btn btn-secondary me-md-2">
                                <i class="bi bi-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Actualizar Stock
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>