<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automotors</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">


    <!-- CSS personalizado -->
    <link href="assets/css/miestilo.css" rel="stylesheet">

</head>

<body style="background-color: #dddddd;">

    <!-- ENCABEZADO -->
    <?php include('partials/header.php'); ?>

    <!-- BARRA DE NAVEGACIÓN PRINCIPAL -->
    <?php include('partials/nav.php'); ?>

    <!-- Contenido de la página -->
    <div class="container py-5">
        <!-- Imagen del vehículo -->
        <div class="row mb-4">
            <div class="col-lg-6">
                <img src="assets/img/kwid.jpg" alt="Renault Kwid ICE" class="img-fluid rounded shadow-lg">
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

        <!-- Diseño del Motor -->
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="h4">Diseño del Motor</h3>
                <img src="assets/img/kwid_motor.jpg" alt="Diseño del Motor Renault Kwid"
                    class="img-fluid rounded shadow-lg">
                <p class="mt-3">El motor 1.0L 12V del Renault Kwid ICE está diseñado para ofrecer una mayor eficiencia y
                    rendimiento, combinado con un bajo consumo de combustible. Este motor ofrece 66 CV, ideal para el
                    uso urbano.</p>
            </div>
        </div>


        <!-- Diseño Exterior -->
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="h4">Diseño Exterior</h3>
                <img src="assets/img/kwid_exterior.jpg" alt="Diseño Exterior Renault Kwid"
                    class="img-fluid rounded shadow-lg">
                <p class="mt-3">El diseño exterior del Renault Kwid ICE destaca por sus líneas modernas y compactas,
                    ideales para la conducción urbana. La parrilla frontal, los faros LED y los detalles cromados le
                    otorgan un aspecto robusto y dinámico.</p>
            </div>
        </div>

        <!-- Diseño Interior -->
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="h4">Diseño Interior</h3>
                <img src="assets/img/kwid_interior.jpg" alt="Diseño Interior Renault Kwid"
                    class="img-fluid rounded shadow-lg">
                <p class="mt-3">El interior del Renault Kwid ICE está pensado para brindar comodidad y practicidad. Con
                    acabados modernos, un tablero digital, asientos ergonómicos y amplio espacio para los ocupantes,
                    este auto proporciona una experiencia de manejo placentera.</p>
            </div>
        </div>

        <!-- Tamaño del Baúl -->
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="h4">Tamaño del Baúl</h3>
                <img src="assets/img/kwid_baul.jpg" alt="Tamaño del Baúl Renault Kwid"
                    class="img-fluid rounded shadow-lg">
                <p class="mt-3">El Renault Kwid ICE ofrece un baúl con capacidad de hasta 290 litros, lo que lo
                    convierte en uno de los autos más prácticos en su segmento, permitiendo transportar equipaje o carga
                    de forma cómoda.</p>
            </div>
        </div>

        <!-- Neumáticos -->
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="h4">Neumáticos</h3>
                <img src="assets/img/kwid_neumaticos.jpg" alt="Neumáticos Renault Kwid"
                    class="img-fluid rounded shadow-lg">
                <p class="mt-3">El Renault Kwid ICE está equipado con neumáticos de 175/65 R14, diseñados para ofrecer
                    un excelente desempeño tanto en ciudad como en carretera, asegurando estabilidad y confort en todo
                    momento.</p>
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

        <!-- Precios según accesorios -->
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="h4">Precios según Accesorios</h3>
                <p>Al seleccionar diferentes accesorios para personalizar tu Renault Kwid ICE, los precios pueden
                    variar. A continuación se presentan los precios aproximados de los accesorios más populares:</p>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Precio Base:</strong> $1,250,000</li>
                    <li class="list-group-item"><strong>Con Accesorios (al menos 3):</strong> Precio</li>
                </ul>
            </div>
        </div>

        <!-- Modelos de Kwid y Diferencias -->
        <div class="row mb-4">
            <div class="col-12">
                <h3 class="h4">Modelos de Renault Kwid</h3>
                <p>A continuación, te mostramos los diferentes modelos disponibles del Renault Kwid, sus diferencias y
                    precios.</p>
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
                                <td>$1,350,000</td>
                            </tr>
                            <tr>
                                <td>Kwid Intense</td>
                                <td>1.0L 12V</td>
                                <td>66 CV</td>
                                <td>$1,400,000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="text-center my-4">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCita">
            Solicitar una cita con un asesor
        </button>
    </div>


    <!-- Modal Cita con Asesor -->
    <div class="modal fade" id="modalCita" tabindex="-1" aria-labelledby="modalCitaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalCitaLabel">Solicitar una cita con un asesor</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="formCita">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Tu nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ej: Juan Pérez" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Número de contacto</label>
                            <input type="tel" class="form-control" id="telefono" placeholder="Ej: 3794xxxxxx" required>
                        </div>
                        <div class="mb-3">
                            <label for="metodo" class="form-label">Método de contacto</label>
                            <select class="form-select" id="metodo" required>
                                <option value="">Selecciona una opción</option>
                                <option value="llamada">Llamada Telefónica</option>
                                <option value="whatsapp">WhatsApp</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha deseada</label>
                            <input type="date" class="form-control" id="fecha" required>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Confirmar Cita</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- PIE DE PÁGINA -->
    <?php include('partials/footer.php'); ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById("formCita").addEventListener("submit", function (e) {
            e.preventDefault();
            const nombre = document.getElementById("nombre").value;
            const metodo = document.getElementById("metodo").value;

            alert(`¡Gracias ${nombre}! Pronto un asesor te contactará por ${metodo === 'llamada' ? 'llamada telefónica' : 'WhatsApp'}.`);

            // Cierra el modal
            var modal = bootstrap.Modal.getInstance(document.getElementById('modalCita'));
            modal.hide();

            // Reinicia el formulario
            this.reset();
        });
    </script>


</body>

</html>