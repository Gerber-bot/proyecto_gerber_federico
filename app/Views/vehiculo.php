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

<body>

    <!-- ENCABEZADO -->
    <?php include('partials/header.php'); ?>

    <!-- BARRA DE NAVEGACIÓN PRINCIPAL -->
    <?php include('partials/nav.php'); ?>

    <!-- CONTENIDO DE LA PAGINA -->
    <div class="container py-5">

        <!-- Imagen del vehículo -->
        <div class="row mb-4">
            <div class="col-lg-6">
                <img src="assets/img/vehiculo/kwid/kwid.jpg" alt="Renault Kwid ICE" class="img-fluid rounded shadow-lg">
            </div>
            <div class="col-lg-6">
                <h1 class="display-4">Renault Kwid ICE</h1>
                <p class="lead text-muted">El Renault Kwid ICE es un modelo urbano que combina estilo, tecnología y economía. Ideal para quienes buscan un automóvil compacto, versátil y accesible.</p>
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
                <img src="assets/img/vehiculo/kwid/kwid_exterior.jpg" class="img-fluid rounded" alt="Diseño Exterior">
            </div>
            <div class="col-md-6">
                <h2>Diseño Exterior</h2>
                <p>El Renault Kwid se destaca por un diseño robusto y moderno. Con una distancia elevada respecto al suelo, nuevos faros LED DRL y una parrilla frontal renovada, su estilo urbano combina elegancia y espíritu aventurero, ideal para desplazarte por la ciudad con personalidad.</p>
            </div>
        </div>

        <!-- Diseño Interior -->
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
                <!-- Dos imágenes una encima de otra -->
                <img src="assets/img/vehiculo/kwid/kwid_interior.jpg" class="img-fluid rounded mb-3" alt="Diseño Interior 1">
                <img src="assets/img/vehiculo/kwid/kwid_interior2.jpg" class="img-fluid rounded" alt="Diseño Interior 2">
            </div>
            <div class="col-md-6">
                <h2>Diseño Interior</h2>
                <p>El interior del Renault Kwid ofrece un ambiente tecnológico y confortable. Incorpora un panel de instrumentos digital, pantalla multimedia de 8" compatible con Android Auto® y Apple CarPlay®, además de espacios inteligentes de almacenamiento que maximizan la comodidad en cada trayecto.</p>
            </div>
        </div>

        <!-- Tamaño del Baúl -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="assets/img/vehiculo/kwid/kwid_baul.jpg" class="img-fluid rounded" alt="Tamaño del Baúl">
            </div>
            <div class="col-md-6">
                <h2>Tamaño del Baúl</h2>
                <p>El Renault Kwid ofrece uno de los baúles más grandes de su categoría, con una capacidad de 290 litros. Ideal para llevar todo lo que necesites en tu día a día o para escapadas de fin de semana, con un acceso cómodo y fácil de usar.</p>
            </div>
        </div>

        <!-- Diseño del Motor -->
        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
                <img src="assets/img/vehiculo/kwid/kwid_motor.jpg" class="img-fluid rounded" alt="Diseño del Motor">
            </div>
            <div class="col-md-6">
                <h2>Diseño del Motor</h2>
                <p>Equipado con un motor 1.0 SCe de 3 cilindros, el Renault Kwid combina eficiencia de combustible con un excelente desempeño urbano. Este motor liviano mejora el rendimiento y contribuye al bajo consumo, reduciendo también las emisiones de CO₂.</p>
            </div>
        </div>

        <!-- Neumáticos -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <img src="assets/img/vehiculo/kwid/kwid_neumaticos.jpg" class="img-fluid rounded" alt="Neumáticos">
            </div>
            <div class="col-md-6">
                <h2>Neumáticos</h2>
                <p>El Renault Kwid está equipado con neumáticos de perfil alto y llantas de 14 pulgadas, que proporcionan mejor estabilidad y absorción de impactos. Ideal para ofrecer confort tanto en calles urbanas como en caminos irregulares.</p>
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
                    <li class="list-group-item"><strong>Con Accesorios (al menos 3):</strong> Ajuste de precio final</li>
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
                </div>
            </div>
        </div>

        <!-- Botón de Cita -->
        <div class="text-center my-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCita">
                Solicitar una cita con un asesor
            </button>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCita" tabindex="-1" aria-labelledby="modalCitaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalCitaLabel">Solicitar una cita con un asesor</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="formCita">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Tu nombre</label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Número de contacto</label>
                            <input type="tel" class="form-control" id="telefono" required>
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

    <!-- Script para el formulario -->
    <script>
        document.getElementById("formCita").addEventListener("submit", function (e) {
            e.preventDefault();
            const nombre = document.getElementById("nombre").value;
            const metodo = document.getElementById("metodo").value;
            alert(`¡Gracias ${nombre}! Pronto un asesor te contactará por ${metodo === 'llamada' ? 'llamada telefónica' : 'WhatsApp'}.`);
            var modal = bootstrap.Modal.getInstance(document.getElementById('modalCita'));
            modal.hide();
        });
    </script>

</body>

</html>
