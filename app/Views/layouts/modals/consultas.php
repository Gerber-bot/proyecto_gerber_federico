
<!-- Modal para Agregar Consulta -->
<div class="modal fade" id="consultaModal" tabindex="-1" aria-labelledby="consultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consultaModalLabel">Nueva Consulta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formConsulta">
          <div class="mb-3">
            <label for="nombreConsulta" class="form-label">Tu nombre</label>
            <input type="text" class="form-control" id="nombreConsulta" required>
          </div>
          <div class="mb-3">
            <label for="correoConsulta" class="form-label">Tu correo</label>
            <input type="email" class="form-control" id="correoConsulta" required>
          </div>
          <div class="mb-3">
            <label for="consultaTexto" class="form-label">Tu consulta</label>
            <textarea class="form-control" id="consultaTexto" rows="5" required></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="btnAgregarConsulta">Agregar Consulta</button>
      </div>
    </div>
  </div>
</div>

<!-- Script para cerrar el modal al agregar consulta -->
<script>
  document.getElementById("formConsulta").addEventListener("submit", function (e) {
    e.preventDefault();

    const nombre = document.getElementById("nombreConsulta").value;
    const correo = document.getElementById("correoConsulta").value;
    const consultaTexto = document.getElementById("consultaTexto").value;


    alert(`Gracias ${nombre}! Hemos recibido tu consulta. Nos contactaremos contigo a ${correo}.`);

    var modal = bootstrap.Modal.getInstance(document.getElementById('consultaModal'));
    modal.hide();
  });

  document.getElementById("btnAgregarConsulta").addEventListener("click", function () {
    document.getElementById("formConsulta").submit();
  });
</script>