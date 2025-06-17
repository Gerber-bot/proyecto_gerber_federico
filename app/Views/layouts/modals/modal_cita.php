<div class="modal fade" id="modalCita" tabindex="-1" aria-labelledby="modalCitaLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalCitaLabel">Agendar cita para <?= esc($vehiculo['nombre']) ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="px-4 pt-4 pb-2">
        <p class="mb-0 text-secondary">
          Complete los campos y uno de nuestros vendedores se contactará con usted dentro de las 72 horas hábiles.
        </p>
      </div>

      <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger mx-4">
          <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <div><?= esc($error) ?></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('citas/agendar') ?>" method="post">
        <input type="hidden" name="vehiculo_id" value="<?= esc($vehiculo['id']) ?>">
        <div class="modal-body pt-0">
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label">Nombre y Apellido</label>
              <input type="text" class="form-control" name="nombre" required value="<?= old('nombre') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" required value="<?= old('email') ?>">
            </div>
            <div class="col-md-6">
              <label class="form-label">Teléfono</label>
              <input type="tel" class="form-control" name="telefono" required value="<?= old('telefono') ?>" placeholder="Ej: 3416123456">
            </div>
            <div class="col-md-6">
              <label class="form-label">Método de contacto</label>
              <select class="form-select" name="metodo_contacto" required>
                <option value="" disabled selected>Seleccione...</option>
                <option value="email" <?= old('metodo_contacto') == 'email' ? 'selected' : '' ?>>Email</option>
                <option value="llamada" <?= old('metodo_contacto') == 'llamada' ? 'selected' : '' ?>>Llamada telefónica</option>
                <option value="whatsapp" <?= old('metodo_contacto') == 'whatsapp' ? 'selected' : '' ?>>WhatsApp</option>
              </select>
            </div>
            <div class="col-md-6">
              <label class="form-label">Turno</label>
              <select class="form-select" name="turno" required>
                <option value="" disabled selected>Seleccione...</option>
                <option value="mañana" <?= old('turno') == 'mañana' ? 'selected' : '' ?>>Mañana (7:30 - 12:00)</option>
                <option value="tarde" <?= old('turno') == 'tarde' ? 'selected' : '' ?>>Tarde (14:00 - 22:00)</option>
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">
            <i class="bi bi-calendar-plus"></i> Confirmar cita
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  <?php if (session()->getFlashdata('errors')): ?>
    var citaModal = new bootstrap.Modal(document.getElementById('modalCita'));
    citaModal.show();
  <?php endif; ?>
});
</script>