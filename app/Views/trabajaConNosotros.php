<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automotors - Carreras</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS personalizado -->
    <link href="assets/css/miestilo.css" rel="stylesheet">

</head>

<body>

    <!-- ENCABEZADO -->
    <?php include('partials/header.php'); ?>

    <!-- BARRA DE NAVEGACIÓN PRINCIPAL -->
    <?php include('partials/nav.php'); ?>

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

        <!-- Sección de talento buscado -->
        <section class="talento-buscado py-5 bg-light">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold mb-3">Buscamos talento como el tuyo</h2>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">En Automotors valoramos la pasión por los vehículos y el compromiso con la excelencia</p>
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

        <!-- Sección de beneficios y proceso -->
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
                                        <p class="mb-0">Programas de formación continua y planes de carrera personalizados</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex mb-4">
                                    <div class="me-4 text-success">
                                        <i class="bi bi-coin fs-1"></i>
                                    </div>
                                    <div>
                                        <h3 class="h4">Compensación atractiva</h3>
                                        <p class="mb-0">Salarios competitivos, bonos por desempeño y beneficios exclusivos</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex mb-4">
                                    <div class="me-4 text-warning">
                                        <i class="bi bi-heart-pulse-fill fs-1"></i>
                                    </div>
                                    <div>
                                        <h3 class="h4">Bienestar integral</h3>
                                        <p class="mb-0">Seguro médico, programas de salud mental y balance vida-trabajo</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex">
                                    <div class="me-4 text-info">
                                        <i class="bi bi-car-front-fill fs-1"></i>
                                    </div>
                                    <div>
                                        <h3 class="h4">Ventajas automotrices</h3>
                                        <p class="mb-0">Descuentos en vehículos, servicio gratuito y acceso a nuevos modelos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Proceso y formulario -->
                    <div class="col-lg-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h2 class="fw-bold mb-4 text-primary">
                                    <i class="bi bi-send-check-fill me-2"></i>Únete a nuestro equipo
                                </h2>
                                
                                <div class="proceso-steps mb-4">
                                    <div class="step mb-3">
                                        <div class="step-number">1</div>
                                        <div class="step-content">
                                            <h3 class="h5">Envía tu información</h3>
                                            <p>Completa este formulario con tus datos básicos</p>
                                        </div>
                                    </div>
                                    
                                    <div class="step mb-3">
                                        <div class="step-number">2</div>
                                        <div class="step-content">
                                            <h3 class="h5">Entrevista inicial</h3>
                                            <p>Conoceremos tus habilidades y expectativas</p>
                                        </div>
                                    </div>
                                    
                                    <div class="step">
                                        <div class="step-number">3</div>
                                        <div class="step-content">
                                            <h3 class="h5">Prueba práctica</h3>
                                            <p>Demuestra tus capacidades en un entorno real</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <form id="cvForm" class="mt-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="firstName" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="firstName" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="lastName" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="lastName" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="phone" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="phone">
                                        </div>
                                        <div class="col-12">
                                            <label for="position" class="form-label">Área de interés</label>
                                            <select class="form-select" id="position" required>
                                                <option value="" selected disabled>Selecciona un área</option>
                                                <option value="Ventas">Ventas y Asesoría Comercial</option>
                                                <option value="Taller">Taller Mecánico</option>
                                                <option value="Atencion">Atención al Cliente</option>
                                                <option value="Administrativo">Área Administrativa</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="cvFile" class="form-label">Curriculum Vitae (PDF, DOCX)</label>
                                            <input class="form-control" type="file" id="cvFile" accept=".pdf,.doc,.docx" required>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary w-100 py-2">
                                                <i class="bi bi-send-fill me-2"></i>Enviar solicitud
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- PIE DE PÁGINA -->
    <?php include('partials/footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Manejo del formulario
        document.getElementById('cvForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Aquí iría la lógica para enviar el formulario
            alert('¡Gracias por tu interés en Automotors! Hemos recibido tu solicitud y nos pondremos en contacto contigo pronto.');
            this.reset();
        });
    </script>

</body>

</html>