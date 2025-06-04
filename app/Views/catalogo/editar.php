<?= $this->extend('layouts/plantilla') ?>
<?= $this->section('content') ?>

<div class="container my-5">
    <h1 class="mb-4">Editar Producto</h1>
    <form action="<?= base_url('catalogo/actualizar/' . $producto['id']) ?>" method="post" enctype="multipart/form-data">
        
        <!-- Sección Básica -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Información Básica</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="<?= esc($producto['nombre']) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Marca</label>
                        <input type="text" name="marca" class="form-control" value="<?= esc($producto['marca']) ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Año</label>
                        <input type="number" name="anio" class="form-control" value="<?= esc($producto['anio']) ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Kilómetros</label>
                        <input type="number" name="kilometros" class="form-control" value="<?= esc($producto['kilometros']) ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Precio Base</label>
                        <input type="number" name="precio_base" class="form-control" value="<?= esc($producto['precio_base']) ?>" required step="0.01">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Descripción Principal</label>
                        <textarea name="descripcion" class="form-control" required><?= esc($producto['descripcion']) ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ficha Técnica -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Ficha Técnica</h4>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Motor</label>
                        <input type="text" name="motor" class="form-control" value="<?= esc($producto['motor'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Potencia</label>
                        <input type="text" name="potencia" class="form-control" value="<?= esc($producto['potencia'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Transmisión</label>
                        <input type="text" name="transmision" class="form-control" value="<?= esc($producto['transmision'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Consumo (L/100km)</label>
                        <input type="text" name="consumo" class="form-control" value="<?= esc($producto['consumo'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Capacidad del tanque</label>
                        <input type="text" name="tanque" class="form-control" value="<?= esc($producto['tanque'] ?? '') ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Velocidad máxima</label>
                        <input type="text" name="velocidad_maxima" class="form-control" value="<?= esc($producto['velocidad_maxima'] ?? '') ?>">
                    </div>
                </div>
            </div>
        </div>

        <!-- NUEVA Sección de Características Especiales (Reemplazo total de los checkboxes) -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h4>Características Especiales</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Descripción de Características</label>
                    <textarea name="caracteristicas_adicionales" class="form-control" rows="6" 
                        placeholder="Describe aquí todas las características especiales del vehículo en formato libre. Ej: 
                        
- Sistema de dirección asistida eléctrica
- Bluetooth integrado con manos libres
- 6 airbags frontales y laterales
- Frenos ABS con distribución electrónica de fuerza (EBD)
- Cámara de reversa con guías dinámicas
- Pantalla táctil de 10.1\" con Android Auto/Apple CarPlay"><?= esc($producto['caracteristicas_adicionales'] ?? '') ?></textarea>
                    <small class="text-muted">Puedes usar viñetas, saltos de línea o cualquier formato que prefieras.</small>
                </div>
            </div>
        </div>

        <!-- Descripciones Detalladas -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Descripciones Detalladas</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Diseño Exterior</label>
                    <textarea name="diseno_exterior" class="form-control" rows="3"><?= esc($producto['diseno_exterior'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Diseño Interior</label>
                    <textarea name="diseno_interior" class="form-control" rows="3"><?= esc($producto['diseno_interior'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tamaño del baúl</label>
                    <textarea name="tamano_baul" class="form-control" rows="3"><?= esc($producto['tamano_baul'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Información del motor</label>
                    <textarea name="motor_info" class="form-control" rows="3"><?= esc($producto['motor_info'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Neumáticos</label>
                    <textarea name="neumaticos" class="form-control" rows="3"><?= esc($producto['neumaticos'] ?? '') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Accesorios Incluidos (separados por comas)</label>
                    <textarea name="accesorios" class="form-control" rows="3" placeholder="Ej: Cámaras de retroceso, Kit de tapizados premium, Alfombrillas personalizadas"><?= esc($producto['accesorios'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <!-- Imágenes -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Imágenes del Producto</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Imagen principal</label>
                    <input type="file" name="img_principal" class="form-control">
                    <?php if (!empty($producto['img_principal'])): ?>
                        <div class="mt-2">
                            <img src="<?= base_url('assets/img/catalogo/productos/' . $producto['img_principal']) ?>" alt="Imagen actual" style="max-height: 150px;">
                            <input type="hidden" name="img_principal_actual" value="<?= $producto['img_principal'] ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?= base_url('catalogo_admin') ?>" class="btn btn-secondary me-md-2">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>