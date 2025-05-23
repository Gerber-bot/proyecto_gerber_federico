<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

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