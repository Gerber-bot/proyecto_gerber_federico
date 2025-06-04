<?= $this->extend('layouts/plantilla') ?>

<<<<<<< Updated upstream

<?= $this->section('content') ?>

<!-- CONTENIDO DE LA PAGINA -->
<div class="container py-5">

    <!-- Imagen del vehículo -->
    <div class="row mb-4">
        <div class="col-lg-6">
            <img src="<?= base_url('assets/img/vehiculo/kwid/kwid.jpg') ?>" alt="Renault Kwid ICE"
                class="img-fluid rounded shadow-lg">
        </div>
        <div class="col-lg-6">
            <h1 class="display-4">Renault Kwid ICE</h1>
            <p class="lead text-muted">El Renault Kwid ICE es un modelo urbano que combina estilo, tecnología y
                economía. Ideal para quienes buscan un automóvil compacto, versátil y accesible.</p>
        </div>
    </div>

    <!-- Ficha Técnica -->
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="h4">Ficha Técnica</h3>
            <ul class="list-group">
                <li class="list-group-item"><strong>Motor:</strong> 1.0L 12V</li>
                <li class="list-group-item"><strong>Potencia:</strong> 66 CV</li>
                <li class="list-group-item"><strong>Transmisión:</strong> Manual de 5 marchas</li>
                <li class="list-group-item"><strong>Consumo:</strong> 6.2L/100km</li>
                <li class="list-group-item"><strong>Capacidad del tanque:</strong> 38L</li>
                <li class="list-group-item"><strong>Velocidad máxima:</strong> 150 km/h</li>
            </ul>
        </div>

        <!-- Características adicionales -->
        <div class="col-md-6">
            <h3 class="h4">Características Adicionales</h3>
            <ul class="list-group">
                <li class="list-group-item"><strong>Dirección asistida eléctrica</strong></li>
                <li class="list-group-item"><strong>Bluetooth</strong></li>
                <li class="list-group-item"><strong>Pantalla táctil de 7”</strong></li>
                <li class="list-group-item"><strong>Airbags frontales</strong></li>
                <li class="list-group-item"><strong>ABS con EBD</strong></li>
                <li class="list-group-item"><strong>Cámara de retroceso</strong></li>
            </ul>
        </div>
    </div>

    <!-- Diseño Exterior -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="<?= base_url('assets/img/vehiculo/kwid/kwid_exterior.jpg') ?>" class="img-fluid rounded"
                alt="Diseño Exterior">
        </div>
        <div class="col-md-6">
            <h2>Diseño Exterior</h2>
            <p>El Renault Kwid se destaca por un diseño robusto y moderno. Con una distancia elevada respecto al
                suelo, nuevos faros LED DRL y una parrilla frontal renovada, su estilo urbano combina elegancia y
                espíritu aventurero, ideal para desplazarte por la ciudad con personalidad.</p>
        </div>
    </div>

    <!-- Diseño Interior -->
    <div class="row align-items-center mb-5 flex-md-row-reverse">
        <div class="col-md-6">
            <!-- Dos imágenes una encima de otra -->
            <img src="<?= base_url('assets/img/vehiculo/kwid/kwid_interior.jpg') ?>" class="img-fluid rounded mb-3"
                alt="Diseño Interior 1">
            <img src="<?= base_url('assets/img/vehiculo/kwid/kwid_interior2.jpg') ?>" class="img-fluid rounded"
                alt="Diseño Interior 2">
        </div>
        <div class="col-md-6">
            <h2>Diseño Interior</h2>
            <p>El interior del Renault Kwid ofrece un ambiente tecnológico y confortable. Incorpora un panel de
                instrumentos digital, pantalla multimedia de 8" compatible con Android Auto® y Apple CarPlay®,
                además de espacios inteligentes de almacenamiento que maximizan la comodidad en cada trayecto.</p>
        </div>
    </div>

    <!-- Tamaño del Baúl -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="<?= base_url('assets/img/vehiculo/kwid/kwid_baul.jpg') ?>" class="img-fluid rounded"
                alt="Tamaño del Baúl">
        </div>
        <div class="col-md-6">
            <h2>Tamaño del Baúl</h2>
            <p>El Renault Kwid ofrece uno de los baúles más grandes de su categoría, con una capacidad de 290
                litros. Ideal para llevar todo lo que necesites en tu día a día o para escapadas de fin de semana,
                con un acceso cómodo y fácil de usar.</p>
        </div>
    </div>

    <!-- Diseño del Motor -->
    <div class="row align-items-center mb-5 flex-md-row-reverse">
        <div class="col-md-6">
            <img src="<?= base_url('assets/img/vehiculo/kwid/kwid_motor.jpg') ?>" class="img-fluid rounded"
                alt="Diseño del Motor">
        </div>
        <div class="col-md-6">
            <h2>Diseño del Motor</h2>
            <p>Equipado con un motor 1.0 SCe de 3 cilindros, el Renault Kwid combina eficiencia de combustible con
                un excelente desempeño urbano. Este motor liviano mejora el rendimiento y contribuye al bajo
                consumo, reduciendo también las emisiones de CO₂.</p>
        </div>
    </div>

    <!-- Neumáticos -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6">
            <img src="<?= base_url('assets/img/vehiculo/kwid/kwid_neumaticos.jpg') ?>" class="img-fluid rounded"
                alt="Neumáticos">
        </div>
        <div class="col-md-6">
            <h2>Neumáticos</h2>
            <p>El Renault Kwid está equipado con neumáticos de perfil alto y llantas de 14 pulgadas, que
                proporcionan mejor estabilidad y absorción de impactos. Ideal para ofrecer confort tanto en calles
                urbanas como en caminos irregulares.</p>
        </div>
    </div>

    <!-- Accesorios -->
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="h4">Accesorios</h3>
            <ul class="list-group">
                <li class="list-group-item"><strong>Cámaras de retroceso</strong> - $15,000</li>
                <li class="list-group-item"><strong>Kit de tapizados premium</strong> - $12,000</li>
                <li class="list-group-item"><strong>Alfombrillas personalizadas</strong> - $3,500</li>
                <li class="list-group-item"><strong>Rines de aleación</strong> - $25,000</li>
                <li class="list-group-item"><strong>Faros antiniebla</strong> - $7,000</li>
            </ul>
        </div>
    </div>

    <!-- Precios -->
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="h4">Precios según Accesorios</h3>
            <p>Los precios pueden variar al agregar accesorios personalizados:</p>
            <ul class="list-group">
                <li class="list-group-item"><strong>Precio Base:</strong> $1,250,000</li>
                <li class="list-group-item"><strong>Con Accesorios (al menos 3):</strong> Ajuste de precio final
                </li>
            </ul>
        </div>
    </div>

    <!-- Modelos -->
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="h4">Modelos de Renault Kwid</h3>
            <p>Comparativa de los modelos disponibles:</p>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Modelo</th>
                            <th>Motor</th>
                            <th>Potencia</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kwid ICE</td>
                            <td>1.0L 12V</td>
                            <td>66 CV</td>
                            <td>$1,250,000</td>
                        </tr>
                        <tr>
                            <td>Kwid Outsider</td>
                            <td>1.0L 12V</td>
                            <td>66 CV</td>
                            <td>$1,300,000</td>
                        </tr>
                        <tr>
                            <td>Kwid Intense</td>
                            <td>1.0L 12V</td>
                            <td>66 CV</td>
                            <td>$1,320,000</td>
                        </tr>
                    </tbody>
                </table>
=======
<?= $this->section('content') ?>

<div class="container py-5">
    <!-- Encabezado -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary"><?= esc($vehiculo['nombre']) ?></h1>
            <p class="lead"><?= esc($vehiculo['descripcion']) ?></p>
        </div>
    </div>

    <!-- Imagen principal y precio -->
    <div class="row mb-5 align-items-center">
        <div class="col-md-6">
            <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_principal'])) ?>" 
                 class="img-fluid rounded-3 shadow" 
                 alt="<?= esc($vehiculo['nombre']) ?>"
                 style="max-height: 400px; width: 100%; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <div class="bg-light p-4 rounded-3">
                <h2 class="text-primary">$<?= esc(number_format($vehiculo['precio_base'], 0, ',', '.')) ?></h2>
                <div class="d-grid gap-2">
                    <a href="#contacto" class="btn btn-primary btn-lg py-3">
                        <i class="bi bi-chat-left-text"></i> Solicitar información
                    </a>
                    <a href="<?= base_url('catalogo') ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Volver al catálogo
                    </a>
                </div>
>>>>>>> Stashed changes
            </div>
        </div>
    </div>

<<<<<<< Updated upstream
    <!-- Botón de Cita -->
    <div class="text-center my-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCita">
            Solicitar una cita con un asesor
        </button>
    </div>

</div>
<!-- Modal para agendar cita-->
<?= $this->include('layouts/modals/agendar_cita') ?>
=======
    <!-- Ficha Técnica -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="border-bottom pb-2 mb-4 text-primary">Ficha Técnica</h2>
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="fw-bold">Motor</span>
                            <span class="badge bg-primary rounded-pill"><?= esc($vehiculo['motor'] ?? 'N/A') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="fw-bold">Potencia</span>
                            <span class="badge bg-primary rounded-pill"><?= esc($vehiculo['potencia'] ?? 'N/A') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="fw-bold">Transmisión</span>
                            <span class="badge bg-primary rounded-pill"><?= esc($vehiculo['transmision'] ?? 'N/A') ?></span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="fw-bold">Consumo</span>
                            <span class="badge bg-primary rounded-pill"><?= esc($vehiculo['consumo'] ?? 'N/A') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="fw-bold">Capacidad tanque</span>
                            <span class="badge bg-primary rounded-pill"><?= esc($vehiculo['tanque'] ?? 'N/A') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="fw-bold">Velocidad máxima</span>
                            <span class="badge bg-primary rounded-pill"><?= esc($vehiculo['velocidad_maxima'] ?? 'N/A') ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Características Adicionales -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="border-bottom pb-2 mb-4 text-primary">Características Adicionales</h2>
            <div class="row">
                <?php if ($vehiculo['direccion_asistida']): ?>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                        <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                        <span class="fw-medium">Dirección asistida eléctrica</span>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($vehiculo['bluetooth']): ?>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                        <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                        <span class="fw-medium">Sistema Bluetooth</span>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($vehiculo['pantalla_tactil']): ?>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                        <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                        <span class="fw-medium">Pantalla táctil <?= esc($vehiculo['pantalla_tactil']) ?></span>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($vehiculo['airbags_frontales']): ?>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                        <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                        <span class="fw-medium">Airbags frontales</span>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($vehiculo['abs_ebd']): ?>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                        <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                        <span class="fw-medium">ABS con EBD</span>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if ($vehiculo['camara_reversa']): ?>
                <div class="col-md-4 mb-3">
                    <div class="d-flex align-items-center p-3 bg-light rounded-3">
                        <i class="bi bi-check-circle-fill text-success me-3 fs-4"></i>
                        <span class="fw-medium">Cámara de reversa</span>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Diseño Exterior -->
    <?php if ($vehiculo['diseno_exterior']): ?>
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="border-bottom pb-2 mb-4 text-primary">Diseño Exterior</h2>
            <div class="row align-items-center">
                <?php if ($vehiculo['img_exterior']): ?>
                <div class="col-md-6">
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_exterior'])) ?>" 
                         class="img-fluid rounded-3 shadow-sm mb-3 mb-md-0"
                         alt="Diseño exterior">
                </div>
                <?php endif; ?>
                <div class="col-md-6">
                    <p><?= esc($vehiculo['diseno_exterior']) ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Diseño Interior -->
    <?php if ($vehiculo['diseno_interior']): ?>
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="border-bottom pb-2 mb-4 text-primary">Diseño Interior</h2>
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <?php if ($vehiculo['img_interior1']): ?>
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_interior1'])) ?>" 
                         class="img-fluid rounded-3 shadow-sm mb-3"
                         alt="Diseño interior">
                    <?php endif; ?>
                </div>
                <div class="col-md-6 order-md-1">
                    <p><?= esc($vehiculo['diseno_interior']) ?></p>
                    <?php if ($vehiculo['img_interior2']): ?>
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_interior2'])) ?>" 
                         class="img-fluid rounded-3 shadow-sm mt-3"
                         alt="Diseño interior">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Tamaño del Baúl -->
    <?php if ($vehiculo['tamano_baul']): ?>
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="border-bottom pb-2 mb-4 text-primary">Tamaño del Baúl</h2>
            <div class="row align-items-center">
                <?php if ($vehiculo['img_baul']): ?>
                <div class="col-md-6">
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_baul'])) ?>" 
                         class="img-fluid rounded-3 shadow-sm mb-3 mb-md-0"
                         alt="Tamaño del baúl">
                </div>
                <?php endif; ?>
                <div class="col-md-6">
                    <p><?= esc($vehiculo['tamano_baul']) ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Motor -->
    <?php if ($vehiculo['motor_info']): ?>
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="border-bottom pb-2 mb-4 text-primary">Motor</h2>
            <div class="row align-items-center">
                <?php if ($vehiculo['img_motor']): ?>
                <div class="col-md-6">
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_motor'])) ?>" 
                         class="img-fluid rounded-3 shadow-sm mb-3 mb-md-0"
                         alt="Motor">
                </div>
                <?php endif; ?>
                <div class="col-md-6">
                    <p><?= esc($vehiculo['motor_info']) ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Neumáticos -->
    <?php if ($vehiculo['neumaticos']): ?>
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="border-bottom pb-2 mb-4 text-primary">Neumáticos</h2>
            <div class="row align-items-center">
                <?php if ($vehiculo['img_neumaticos']): ?>
                <div class="col-md-6">
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_neumaticos'])) ?>" 
                         class="img-fluid rounded-3 shadow-sm mb-3 mb-md-0"
                         alt="Neumáticos">
                </div>
                <?php endif; ?>
                <div class="col-md-6">
                    <p><?= esc($vehiculo['neumaticos']) ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Accesorios -->
    <?php if ($vehiculo['accesorios']): ?>
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="border-bottom pb-2 mb-4 text-primary">Accesorios</h2>
            <div class="bg-light p-4 rounded-3">
                <ul class="list-unstyled">
                    <?php 
                    $accesorios = explode(',', $vehiculo['accesorios']);
                    foreach ($accesorios as $accesorio): 
                        if (trim($accesorio)): ?>
                            <li class="mb-2">
                                <i class="bi bi-check2-circle text-primary me-2"></i>
                                <?= esc(trim($accesorio)) ?>
                            </li>
                        <?php endif;
                    endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Sección de contacto -->
    <div id="contacto" class="row">
        <div class="col-12">
            <div class="bg-primary text-white p-4 rounded-3">
                <h2 class="mb-4">¿Interesado en este vehículo?</h2>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nombre completo" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Correo electrónico" required>
                        </div>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" placeholder="Teléfono">
                        </div>
                        <div class="col-md-6">
                            <select class="form-select">
                                <option selected disabled>¿Cómo prefieres que te contactemos?</option>
                                <option>Llamada telefónica</option>
                                <option>Correo electrónico</option>
                                <option>WhatsApp</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="3" placeholder="Mensaje o consulta adicional"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-light btn-lg">
                                <i class="bi bi-send"></i> Enviar consulta
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
>>>>>>> Stashed changes

<?= $this->endSection() ?>