<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<?php
if (!isset($vehiculo) || !$vehiculo) {
    die('Error: variable $vehiculo no está definida o está vacía');
}
?>

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
                class="img-fluid rounded-3 shadow" alt="<?= esc($vehiculo['nombre']) ?>"
                style="max-height: 400px; width: 100%; object-fit: cover;">
        </div>
        <div class="col-md-6">
            <div class="bg-light p-4 rounded-3">
                <h2 class="text-primary">$<?= esc(number_format($vehiculo['precio_base'], 0, ',', '.')) ?></h2>

                <!-- Mostrar stock -->
                <div class="mb-3">
                    <?php if ($vehiculo['stock'] > 0): ?>
                        <span class="badge bg-success fs-6">Disponible: <?= $vehiculo['stock'] ?> unidades</span>
                    <?php else: ?>
                        <span class="badge bg-danger fs-6">Producto agotado</span>
                    <?php endif; ?>
                </div>

                <div class="d-grid gap-2">
                    <?php if ($vehiculo['stock'] > 0): ?>
                        <?php if (session('isLoggedIn')): ?>
                            <!-- Botón normal para usuarios logueados -->
                            <a href="<?= base_url('agregar-carrito/' . $vehiculo['id']) ?>" class="btn btn-primary btn-lg py-3">
                                <i class="bi bi-cart-plus"></i> Añadir al carrito
                            </a>
                        <?php else: ?>
                            <!-- Solo botón desactivado (sin acción ni enlace) -->
                            <button class="btn btn-secondary btn-lg py-3" disabled>
                                <i class="bi bi-exclamation-circle"></i> Inicia sesión para comprar
                            </button>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- Botón sin stock -->
                        <button class="btn btn-secondary btn-lg py-3" disabled>
                            <i class="bi bi-exclamation-circle"></i> Sin stock disponible
                        </button>
                    <?php endif; ?>

                    <a href="#contacto" class="btn btn-outline-primary btn-lg py-3">
                        <i class="bi bi-chat-left-text"></i> Solicitar información
                    </a>

                    <a href="<?= base_url('catalogo') ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Volver al catálogo
                    </a>
                </div>
            </div>
        </div>
    </div>

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
                            <span
                                class="badge bg-primary rounded-pill"><?= esc($vehiculo['potencia'] ?? 'N/A') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                            <span class="fw-bold">Transmisión</span>
                            <span
                                class="badge bg-primary rounded-pill"><?= esc($vehiculo['transmision'] ?? 'N/A') ?></span>
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
                            <span
                                class="badge bg-primary rounded-pill"><?= esc($vehiculo['velocidad_maxima'] ?? 'N/A') ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Sección de Características Especiales -->
    <?php if (!empty($vehiculo['caracteristicas_adicionales'])): ?>
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="border-bottom pb-2 mb-4 text-primary">Características Especiales</h2>
                <div class="bg-light p-4 rounded-3">
                    <?= nl2br(esc($vehiculo['caracteristicas_adicionales'])) ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Diseño Exterior -->
    <?php if (!empty($vehiculo['diseno_exterior'])): ?>
        <div class="row mb-5 align-items-center">
            <div class="col-12 mb-4">
                <h2 class="border-bottom pb-2 text-primary">Diseño Exterior</h2>
            </div>
            <div class="col-md-6">
                <?php if (!empty($vehiculo['img_exterior'])): ?>
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_exterior'])) ?>"
                        class="seccion-imagen rounded-3 shadow-sm" alt="Diseño exterior">
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <p class="px-3"><?= esc($vehiculo['diseno_exterior']) ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Diseño Interior -->
    <?php if (!empty($vehiculo['diseno_interior'])): ?>
        <div class="row mb-5 align-items-center">
            <div class="col-12 mb-4">
                <h2 class="border-bottom pb-2 text-primary">Diseño Interior</h2>
            </div>
            <div class="col-md-6 order-md-2">
                <?php if (!empty($vehiculo['img_interior1'])): ?>
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_interior1'])) ?>"
                        class="seccion-imagen rounded-3 shadow-sm" alt="Diseño interior">
                <?php endif; ?>
            </div>
            <div class="col-md-6 order-md-1">
                <p class="px-3"><?= esc($vehiculo['diseno_interior']) ?></p>
            </div>
        </div>
        <?php if (!empty($vehiculo['img_interior2'])): ?>
            <div class="row mb-5">
                <div class="col-md-6 offset-md-6">
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_interior2'])) ?>"
                        class="seccion-imagen rounded-3 shadow-sm mt-3" alt="Diseño interior">
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Tamaño del Baúl -->
    <?php if (!empty($vehiculo['tamano_baul'])): ?>
        <div class="row mb-5 align-items-center">
            <div class="col-12 mb-4">
                <h2 class="border-bottom pb-2 text-primary">Tamaño del Baúl</h2>
            </div>
            <div class="col-md-6">
                <?php if (!empty($vehiculo['img_baul'])): ?>
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_baul'])) ?>"
                        class="seccion-imagen rounded-3 shadow-sm" alt="Tamaño del baúl">
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <p class="px-3"><?= esc($vehiculo['tamano_baul']) ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Motor -->
    <?php if (!empty($vehiculo['motor_info'])): ?>
        <div class="row mb-5 align-items-center">
            <div class="col-12 mb-4">
                <h2 class="border-bottom pb-2 text-primary">Motor</h2>
            </div>
            <div class="col-md-6 order-md-2">
                <?php if (!empty($vehiculo['img_motor'])): ?>
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_motor'])) ?>"
                        class="seccion-imagen rounded-3 shadow-sm" alt="Motor">
                <?php endif; ?>
            </div>
            <div class="col-md-6 order-md-1">
                <p class="px-3"><?= esc($vehiculo['motor_info']) ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Neumáticos -->
    <?php if (!empty($vehiculo['neumaticos'])): ?>
        <div class="row mb-5 align-items-center">
            <div class="col-12 mb-4">
                <h2 class="border-bottom pb-2 text-primary">Neumáticos</h2>
            </div>
            <div class="col-md-6">
                <?php if (!empty($vehiculo['img_neumaticos'])): ?>
                    <img src="<?= base_url('assets/img/catalogo/productos/' . esc($vehiculo['img_neumaticos'])) ?>"
                        class="seccion-imagen rounded-3 shadow-sm" alt="Neumáticos">
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <p class="px-3"><?= esc($vehiculo['neumaticos']) ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Accesorios -->
    <?php if (!empty($vehiculo['accesorios'])): ?>
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

    <!-- Sección de agendar cita -->
    <div id="contacto" class="row mt-5">
        <div class="col-12">
            <div class="bg-primary text-white p-4 rounded-3 text-center">
                <h2 class="mb-4">¿Interesado en este vehículo?</h2>
                <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal" data-bs-target="#modalCita">
                    <i class="bi bi-calendar-plus"></i> Agendar cita
                </button>
            </div>
        </div>
    </div>

    <!-- Modal de cita -->
    <?= view('layouts/modals/modal_cita', ['vehiculo' => $vehiculo]) ?>

    <?= $this->endSection() ?>