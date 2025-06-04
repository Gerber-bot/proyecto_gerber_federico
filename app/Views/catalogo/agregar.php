<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <h2>Agregar Nuevo Producto al Catálogo</h2>
    
    <?php if (session('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    
    <form action="<?= base_url('catalogo/guardar') ?>" method="post" enctype="multipart/form-data">
        <!-- Información básica -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Información Básica</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre del vehículo*</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Precio base*</label>
                        <input type="number" step="0.01" name="precio_base" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Descripción*</label>
                        <textarea name="descripcion" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Imagen principal*</label>
                        <input type="file" name="img_principal" class="form-control" accept="image/*" required>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ficha técnica -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Ficha Técnica</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Motor</label>
                        <input type="text" name="motor" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Potencia</label>
                        <input type="text" name="potencia" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Transmisión</label>
                        <input type="text" name="transmision" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Consumo (L/100km)</label>
                        <input type="text" name="consumo" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Capacidad del tanque</label>
                        <input type="text" name="tanque" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Velocidad máxima</label>
                        <input type="text" name="velocidad_maxima" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <!-- Características -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Características</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="direccion_asistida" id="direccion_asistida">
                            <label class="form-check-label" for="direccion_asistida">Dirección asistida</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="bluetooth" id="bluetooth">
                            <label class="form-check-label" for="bluetooth">Bluetooth</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="airbags_frontales" id="airbags_frontales">
                            <label class="form-check-label" for="airbags_frontales">Airbags frontales</label>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="abs_ebd" id="abs_ebd">
                            <label class="form-check-label" for="abs_ebd">ABS con EBD</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="camara_reversa" id="camara_reversa">
                            <label class="form-check-label" for="camara_reversa">Cámara de reversa</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pantalla táctil</label>
                            <input type="text" name="pantalla_tactil" class="form-control" placeholder="Ej: 7 pulgadas">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Descripciones -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Descripciones Detalladas</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Diseño Exterior</label>
                    <textarea name="diseno_exterior" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Diseño Interior</label>
                    <textarea name="diseno_interior" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tamaño del baúl</label>
                    <input type="text" name="tamano_baul" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Información del motor</label>
                    <textarea name="motor_info" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Neumáticos</label>
                    <textarea name="neumaticos" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Accesorios (separados por comas)</label>
                    <textarea name="accesorios" class="form-control" rows="3" placeholder="Ej: Cámaras de retroceso, Kit de tapizados premium, Alfombrillas personalizadas"></textarea>
                </div>
            </div>
        </div>

        <!-- Imágenes adicionales -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Imágenes Adicionales</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Imagen exterior</label>
                        <input type="file" name="img_exterior" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Imagen interior 1</label>
                        <input type="file" name="img_interior1" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Imagen interior 2</label>
                        <input type="file" name="img_interior2" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Imagen del baúl</label>
                        <input type="file" name="img_baul" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Imagen del motor</label>
                        <input type="file" name="img_motor" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Imagen de neumáticos</label>
                        <input type="file" name="img_neumaticos" class="form-control" accept="image/*">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary me-md-2">
                <i class="bi bi-save"></i> Guardar Producto
            </button>
            <a href="<?= base_url('catalogo') ?>" class="btn btn-secondary">
                <i class="bi bi-x-circle"></i> Cancelar
            </a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>