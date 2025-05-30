<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="mb-4">Editar Producto</h1>
    <form action="<?= base_url('catalogo/actualizar/' . $producto['id']) ?>" method="post"
        enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= esc($producto['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Marca</label>
            <input type="text" name="marca" class="form-control" value="<?= esc($producto['marca']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Año</label>
            <input type="number" name="anio" class="form-control" value="<?= esc($producto['anio']) ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Kilómetros</label>
            <input type="number" name="kilometros" class="form-control" value="<?= esc($producto['kilometros']) ?>"
                required>
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" required><?= esc($producto['descripcion']) ?></textarea>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Ficha Técnica</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Motor</label>
                        <input type="text" name="motor" class="form-control"
                            value="<?= esc($producto['motor'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Potencia</label>
                        <input type="text" name="potencia" class="form-control"
                            value="<?= esc($producto['potencia'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Transmisión</label>
                        <input type="text" name="transmision" class="form-control"
                            value="<?= esc($producto['transmision'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Consumo (L/100km)</label>
                        <input type="text" name="consumo" class="form-control"
                            value="<?= esc($producto['consumo'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Capacidad del tanque</label>
                        <input type="text" name="tanque" class="form-control"
                            value="<?= esc($producto['tanque'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Velocidad máxima</label>
                        <input type="text" name="velocidad_maxima" class="form-control"
                            value="<?= esc($producto['velocidad_maxima'] ?? '') ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Características</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="direccion_asistida"
                                id="direccion_asistida" <?= (!empty($producto['direccion_asistida'])) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="direccion_asistida">Dirección asistida</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="bluetooth" id="bluetooth"
                                <?= (!empty($producto['bluetooth'])) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="bluetooth">Bluetooth</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="airbags_frontales"
                                id="airbags_frontales" <?= (!empty($producto['airbags_frontales'])) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="airbags_frontales">Airbags frontales</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="abs_ebd" id="abs_ebd"
                                <?= (!empty($producto['abs_ebd'])) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="abs_ebd">ABS con EBD</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="camara_reversa" id="camara_reversa"
                                <?= (!empty($producto['camara_reversa'])) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="camara_reversa">Cámara de reversa</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pantalla táctil</label>
                            <input type="text" name="pantalla_tactil" class="form-control"
                                value="<?= esc($producto['pantalla_tactil'] ?? '') ?>" placeholder="Ej: 7 pulgadas">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Descripciones Detalladas</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Diseño Exterior</label>
                    <textarea name="diseno_exterior" class="form-control"
                        rows="3"><?= esc($producto['diseno_exterior'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Diseño Interior</label>
                    <textarea name="diseno_interior" class="form-control"
                        rows="3"><?= esc($producto['diseno_interior'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tamaño del baúl</label>
                    <textarea name="tamano_baul" class="form-control"
                        rows="3"><?= esc($producto['tamano_baul'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Información del motor</label>
                    <textarea name="motor_info" class="form-control"
                        rows="3"><?= esc($producto['motor_info'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Neumáticos</label>
                    <textarea name="neumaticos" class="form-control"
                        rows="3"><?= esc($producto['neumaticos'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Accesorios (separados por comas)</label>
                    <textarea name="accesorios" class="form-control" rows="3"
                        placeholder="Ej: Cámaras de retroceso, Kit de tapizados premium, Alfombrillas personalizadas"><?= esc($producto['accesorios'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagen principal</label>
            <input type="file" name="img_principal" class="form-control">
            <?php if (isset($producto['img_principal']) && !empty($producto['img_principal'])): ?>
                <div class="mt-2">
                    <img src="<?= base_url('uploads/' . $producto['img_principal']) ?>" alt="Imagen actual"
                        style="max-height: 150px;">
                    <input type="hidden" name="img_principal_actual" value="<?= $producto['img_principal'] ?>">
                </div>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="<?= base_url('catalogo_admin') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?= $this->endSection() ?>