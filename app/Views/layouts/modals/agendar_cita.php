<<<<<<< HEAD

    <!-- Modal agendar cita -->
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
=======

    <!-- Modal agendar cita -->
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
>>>>>>> adb5ca7151cc3a9f97342981057be4a997df9fba
