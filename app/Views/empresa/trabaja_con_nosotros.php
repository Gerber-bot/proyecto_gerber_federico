<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<main class="trabaja-con-nosotros">
    <!-- Hero Section -->
    <section class="trabaja-hero bg-white">
        <div class="container text-center py-5">
            <h1 class="display-4 fw-bold mb-3">Impulsa tu carrera en Automotors</h1>
            <p class="lead fs-4">Forma parte del equipo líder en el sector automotriz</p>
            <a href="#formulario" class="btn btn-primary btn-lg mt-3 px-4 py-2">
                <i class="bi bi-lightning-charge-fill me-2"></i>Únete ahora
            </a>
        </div>
    </section>

    <!-- Sección talento -->
    <section class="talento-buscado py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Buscamos talento como el tuyo</h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">En Automotors valoramos la pasión por
                    los vehículos y el compromiso con la excelencia</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-primary mb-3 mx-auto">
                                <i class="bi bi-people-fill text-white fs-3"></i>
                            </div>
                            <h3 class="h4 mb-3">Asesores Comerciales</h3>
                            <p class="text-muted">Profesionales con don de gentes y pasión por el mundo del motor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-success mb-3 mx-auto">
                                <i class="bi bi-tools text-white fs-3"></i>
                            </div>
                            <h3 class="h4 mb-3">Técnicos Especializados</h3>
                            <p class="text-muted">Mecánicos certificados con habilidades de diagnóstico avanzado</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-warning mb-3 mx-auto">
                                <i class="bi bi-headset text-white fs-3"></i>
                            </div>
                            <h3 class="h4 mb-3">Atención al Cliente</h3>
                            <p class="text-muted">Expertos en servicio con enfoque en satisfacción del cliente</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-circle bg-info mb-3 mx-auto">
                                <i class="bi bi-gear-fill text-white fs-3"></i>
                            </div>
                            <h3 class="h4 mb-3">Personal de Taller</h3>
                            <p class="text-muted">Profesionales meticulosos con atención al detalle</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de beneficios y formulario -->
    <section class="beneficios-proceso py-5" id="formulario">
        <div class="container">
            <div class="row g-4">
                <!-- Beneficios -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h2 class="fw-bold mb-4 text-primary">
                                <i class="bi bi-award-fill me-2"></i>Por qué elegirnos
                            </h2>
                            <div class="d-flex mb-4">
                                <div class="me-4 text-primary">
                                    <i class="bi bi-graph-up-arrow fs-1"></i>
                                </div>
                                <div>
                                    <h3 class="h4">Crecimiento profesional</h3>
                                    <p class="mb-0">Formación continua y planes de carrera personalizados</p>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="me-4 text-success">
                                    <i class="bi bi-coin fs-1"></i>
                                </div>
                                <div>
                                    <h3 class="h4">Compensación atractiva</h3>
                                    <p class="mb-0">Salarios competitivos y beneficios exclusivos</p>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="me-4 text-warning">
                                    <i class="bi bi-heart-pulse-fill fs-1"></i>
                                </div>
                                <div>
                                    <h3 class="h4">Bienestar integral</h3>
                                    <p class="mb-0">Seguro médico, salud mental y vida laboral balanceada</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-4 text-info">
                                    <i class="bi bi-car-front-fill fs-1"></i>
                                </div>
                                <div>
                                    <h3 class="h4">Ventajas automotrices</h3>
                                    <p class="mb-0">Descuentos y acceso a vehículos nuevos</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulario -->
                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h2 class="fw-bold mb-4 text-primary">
                                <i class="bi bi-send-check-fill me-2"></i>Únete a nuestro equipo
                            </h2>
                            <form id="cvForm" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Apellido</label>
                                    <input type="text" name="apellido" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Teléfono</label>
                                    <input type="tel" name="telefono" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Área de interés</label>
                                    <select name="area_interes" class="form-select" required>
                                        <option value="">Selecciona un área</option>
                                        <option value="Ventas">Ventas</option>
                                        <option value="Taller">Taller</option>
                                        <option value="Atención">Atención</option>
                                        <option value="Administrativo">Administrativo</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Curriculum (PDF, DOCX)</label>
                                    <input type="file" name="curriculum" accept=".pdf,.doc,.docx" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-send-fill me-2"></i>Enviar solicitud
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.getElementById('cvForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);

    fetch("<?= base_url('trabaja-con-nosotros/guardar') ?>", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            form.reset();
        } else if (data.errors) {
            alert('Errores:\n' + Object.values(data.errors).join("\n"));
        } else {
            alert('Error inesperado');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error al enviar el formulario.');
    });
});
</script>
<?= $this->endSection() ?>
