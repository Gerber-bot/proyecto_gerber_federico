<!-- Modal para Agregar Consulta -->
<div class="modal fade" id="consultaModal" tabindex="-1" aria-labelledby="consultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consultaModalLabel">Nueva Consulta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Quitamos el action y method del form ya que lo manejaremos con JS -->
      <form id="formConsulta">
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombreConsulta" class="form-label">Tu nombre</label>
            <input type="text" class="form-control" id="nombreConsulta" name="nombre_usuario" required>
          </div>
          <div class="mb-3">
            <label for="correoConsulta" class="form-label">Tu correo</label>
            <input type="email" class="form-control" id="correoConsulta" name="correo" required>
          </div>
          <div class="mb-3">
            <label for="consultaTexto" class="form-label">Tu consulta</label>
            <textarea class="form-control" id="consultaTexto" name="consulta" rows="5" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Agregar Consulta</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.getElementById('formConsulta').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('<?= base_url('consultas/guardar') ?>', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Mostrar mensaje de éxito con Toast o SweetAlert (mejor que alert)
            const toast = new bootstrap.Toast(document.getElementById('liveToast'));
            document.getElementById('toastMessage').innerText = 'Gracias por tu consulta. Nos pondremos en contacto contigo pronto.';
            toast.show();
            
            // Cerrar el modal
            var modal = bootstrap.Modal.getInstance(document.getElementById('consultaModal'));
            modal.hide();
            
            // Limpiar el formulario
            this.reset();
        } else {
            // Mostrar errores de validación
            if (data.errors) {
                let errorMessages = '';
                for (const error in data.errors) {
                    errorMessages += `${data.errors[error]}\n`;
                }
                alert('Errores:\n' + errorMessages);
            } else {
                alert('Hubo un error: ' + data.message);
            }
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Ocurrió un error al enviar la consulta. Por favor intenta nuevamente.');
    });
});
</script>

<!-- Agrega este toast para mostrar mensajes  -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Mensaje</strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body" id="toastMessage">
      <!-- Mensaje se insertará aquí -->
    </div>
  </div>
</div>