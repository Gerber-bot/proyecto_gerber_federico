<!-- Modal Agendar -->
<div class="modal fade" id="modalAgendar" tabindex="-1" aria-labelledby="modalAgendarLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalAgendarLabel">Agendar Servicio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="servicioSeleccionado" class="form-label">Servicio</label>
              <select class="form-select" id="servicioSeleccionado">
                <option selected disabled>Seleccione un servicio</option>
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
              <textarea class="form-control" id="comentario" rows="3"
                placeholder="Describe brevemente el problema o lo que deseas hacer"></textarea>
            </div>
            <div class="mb-3">
              <label for="fecha" class="form-label">Fecha deseada</label>
              <input type="date" class="form-control" id="fecha" min="<?= date('Y-m-d') ?>">
            </div>
            <button type="submit" class="btn btn-success">Solicitar turno</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </main>