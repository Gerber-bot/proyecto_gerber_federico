<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h2>Agregar Vehículo</h2>
    <form action="<?= base_url('catalogo/guardar') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Modelo</label>
            <input type="text" name="modelo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Año</label>
            <input type="number" name="anio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kilómetros</label>
            <input type="number" name="kilometros" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Transmisión</label>
            <select name="transmision" class="form-select" required>
                <option value="Manual">Manual</option>
                <option value="Automático">Automático</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Precio</label>
            <input type="number" name="precio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Imagen</label>
            <input type="file" name="imagen" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="<?= base_url('catalogo/catalogo') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= $this->endSection() ?>