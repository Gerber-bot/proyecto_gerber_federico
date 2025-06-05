  <!-- Modal Agendar -->
  <div class="modal fade" id="modalAgendar" tabindex="-1" aria-labelledby="modalAgendarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgendarLabel">Agendar Servicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <form id="formAgendarServicio">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
              <label for="apellido" class="form-label">Apellido</label>
              <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="servicio" class="form-label">Servicio</label>
              <select class="form-select" id="servicio" name="servicio" required>
                <option value="" disabled selected>Seleccione un servicio</option>
                <option value="Mantenimiento">Mantenimiento</option>
                <option value="Reparación de Motor">Reparación de Motor</option>
                <option value="Servicio de Neumáticos">Servicio de Neumáticos</option>
                <option value="Aire Acondicionado">Revisión de Aire Acondicionado</option>
                <option value="Accesorios">Instalación de Accesorios</option>
                <option value="Frenos">Revisión de Frenos</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="comentario" class="form-label">Comentario (opcional)</label>
              <textarea class="form-control" id="comentario" name="comentario" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="fecha" class="form-label">Fecha deseada</label>
              <input type="date" class="form-control" id="fecha" name="fecha" min="<?= date('Y-m-d') ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Solicitar turno</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById("formAgendarServicio").addEventListener("submit", function(e) {
      e.preventDefault();

      const formData = new FormData(this);

      fetch("/proyecto_gerber_federico/agendar/guardar", {
        method: "POST",
        body: formData
      })
      .then(response => {
        if (!response.ok) throw new Error("Error al guardar");
        return response.text();
      })
      .then(data => {
        alert("Servicio agendado correctamente.");
        bootstrap.Modal.getInstance(document.getElementById("modalAgendar")).hide();
        document.getElementById("formAgendarServicio").reset();
      })
      .catch(error => {
        alert("Hubo un error al enviar tu solicitud.");
      });
    });
  </script>
