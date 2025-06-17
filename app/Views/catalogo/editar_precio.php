<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Editar Precio</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('catalogo/actualizar_precio/' . $producto['id']) ?>" method="post">
                        <div class="mb-3">
                            <label for="precio_base" class="form-label">Nuevo Precio ($)</label>
                            <input type="number" step="0.01" class="form-control form-control-lg" 
                                   id="precio_base" name="precio_base"
                                   value="<?= old('precio_base', $producto['precio_base']) ?>" 
                                   min="0.01" required>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="<?= base_url('catalogo_admin') ?>" class="btn btn-secondary me-md-2">
                                <i class="bi bi-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>