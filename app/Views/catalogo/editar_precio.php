<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h3>Editar precio de <?= esc($producto['nombre']) ?></h3>
    <form action="<?= base_url('catalogo/actualizar_precio/'.$producto['id']) ?>" method="post">
        <div class="mb-3">
            <label for="precio_base" class="form-label">Precio base</label>
            <input type="number" step="0.01" class="form-control" id="precio_base" name="precio_base" value="<?= esc($producto['precio_base']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= base_url('catalogo_admin') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= $this->endSection() ?>