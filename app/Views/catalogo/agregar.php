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
                    <div class="mb-3">
                        <label class="form-label">Marca*</label>
                        <select name="marca_id" class="form-select" required>
                            <option value="">Seleccione una marca</option>
                            <?php foreach ($marcas as $marca): ?>
                                <option value="<?= esc($marca['id']) ?>"><?= esc($marca['nombre']) ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Año*</label>
                        <input type="number" name="anio" class="form-control" min="1900" max="2100" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Kilómetros*</label>
                        <input type="number" name="kilometros" class="form-control" min="0" required>
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

        <!-- Características Especiales -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h4>Características Especiales</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Descripción de Características</label>
                    <textarea name="caracteristicas_adicionales" class="form-control" rows="6" placeholder="Describe aquí todas las características especiales del vehículo en formato libre. Ej: 
                        
- Sistema de dirección asistida eléctrica
- Bluetooth integrado con manos libres
- 6 airbags frontales y laterales
- Frenos ABS con distribución electrónica de fuerza (EBD)
- Cámara de reversa con guías dinámicas
- Pantalla táctil de 10.1\" con Android Auto/Apple CarPlay"></textarea>
                    <small class="text-muted">Puedes usar viñetas, saltos de línea o cualquier formato que
                        prefieras.</small>
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
                    <textarea name="tamano_baul" class="form-control" rows="3"></textarea>
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
                    <textarea name="accesorios" class="form-control" rows="3"
                        placeholder="Ej: Cámaras de retroceso, Kit de tapizados premium, Alfombrillas personalizadas"></textarea>
                </div>
            </div>
        </div>
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
        <div class="col-md-3">
            <label class="form-label">Stock*</label>
            <input type="number" name="stock" class="form-control" min="0" required>
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