<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <h2>Editar Marca</h2>

    <?php if (session('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('back/catalogo/marcas/actualizar/' . $marca['id']) ?>"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                value="<?= old('nombre', $marca['nombre']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"
                rows="3"><?= old('descripcion', $marca['descripcion']) ?></textarea>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <?php if ($marca['logo']): ?>
                <div class="mb-2">
                    <img src="<?= base_url('assets/img/marcas/' . $marca['logo']) ?>" alt="Logo actual"
                        style="max-width: 100px; max-height: 100px;">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
            <small class="text-muted">Dejar en blanco para mantener el logo actual</small>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="<?= base_url('back/catalogo/marcas') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
<?= $this->endSection() ?>