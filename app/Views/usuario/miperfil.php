<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<<<<<<< Updated upstream
    <!-- CONTENIDO DEL PERFIL -->
    <div class="container my-5">
        <h1 class="text-center mb-4">Mi Perfil</h1>

        <!-- Información Personal -->
        <section class="card perfil-section mb-4">
            <div class="card-header bg-primary text-white"><i class="bi bi-person-fill"></i> Información Personal</div>
            <div class="card-body">
                <p><strong>Nombre:</strong> Gerber Federico Augusto</p>
                <p><strong>Email:</strong> ejemplo@correo.com</p>
                <p><strong>Teléfono:</strong> +54 123 456 789</p>
            </div>
        </section>

        <!-- Vehículos -->
        <section class="card perfil-section mb-4">
            <div class="card-header bg-secondary text-white"><i class="bi bi-car-front-fill"></i> Mis Vehículos</div>
            <div class="card-body">
                <ul>
                    <li>Renault Sandero - Año 2021 - Patente ABC123</li>
                    <li>Peugeot 208 - Año 2020 - Patente XYZ789</li>
                </ul>
            </div>
        </section>

        <!-- Servicios Realizados -->
        <section class="card perfil-section mb-4">
            <div class="card-header bg-success text-white"><i class="bi bi-tools"></i> Servicios Realizados</div>
            <div class="card-body">
                <ul>
                    <li>12/01/2024 - Cambio de aceite - Renault Sandero</li>
                    <li>05/03/2024 - Revisión general - Peugeot 208</li>
                </ul>
            </div>
        </section>

        <!-- Facturas -->
        <section class="card perfil-section mb-4">
            <div class="card-header bg-warning text-dark"><i class="bi bi-receipt"></i> Mis Facturas</div>
            <div class="card-body">
                <ul>
                    <li>Factura #1234 - $15.000 - 12/01/2024</li>
                    <li>Factura #1235 - $22.000 - 05/03/2024</li>
                </ul>
            </div>
        </section>

        <!-- Experiencias -->
        <section class="card perfil-section mb-4">
            <div class="card-header bg-info text-white"><i class="bi bi-chat-square-dots"></i> Mis Experiencias</div>
            <div class="card-body">
                <p>¿Querés ver o compartir tus experiencias?</p>
                <a class="btn btn-outline-primary" href="<?= base_url('experiencias') ?>">EXPERIENCIA DE LOS
                    CLIENTES</a>
            </div>
        </section>
    </div>

    <?= $this->endSection() ?>
=======
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-primary text-white d-flex align-items-center">
                    <i class="bi bi-person-circle fs-2 me-2"></i>
                    <h2 class="mb-0">Mi Perfil</h2>
                </div>
                <form id="perfilForm" action="<?= base_url('usuario/actualizar_perfil') ?>" method="post"
                    autocomplete="off">
                    <div class="card-body bg-light">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-person"></i> Nombre</label>
                                <input type="text" name="nombre" class="form-control"
                                    value="<?= esc($usuario['nombre']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-person"></i> Apellido</label>
                                <input type="text" name="apellido" class="form-control"
                                    value="<?= esc($usuario['apellido']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="<?= esc($usuario['email']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-telephone"></i> Teléfono</label>
                                <input type="text" name="telefono" class="form-control"
                                    value="<?= esc($usuario['telefono']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-credit-card-2-front"></i> DNI</label>
                                <input type="text" name="dni" class="form-control"
                                    value="<?= esc($usuario['dni']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-calendar-date"></i> Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control"
                                    value="<?= esc($usuario['fecha_nacimiento']) ?>" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><i class="bi bi-briefcase"></i> Oficio</label>
                                <input type="text" name="oficio" class="form-control"
                                    value="<?= esc($usuario['oficio']) ?>" disabled>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" id="modificarBtn" class="btn btn-outline-primary">
                                <i class="bi bi-pencil-square"></i> Modificar datos
                            </button>
                            <button type="submit" id="guardarBtn" class="btn btn-success d-none">
                                <i class="bi bi-save"></i> Guardar Cambios
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Animaciones de Bootstrap y Animate.css (si tienes animate.css) -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<script>
document.getElementById('modificarBtn').addEventListener('click', function() {
    document.querySelectorAll('#perfilForm input').forEach(function(input) {
        input.removeAttribute('disabled');
        input.classList.add('bg-white');
    });
    document.getElementById('guardarBtn').classList.remove('d-none');
    document.getElementById('modificarBtn').classList.add('d-none');
});
</script>

<?= $this->endSection() ?>
>>>>>>> Stashed changes
