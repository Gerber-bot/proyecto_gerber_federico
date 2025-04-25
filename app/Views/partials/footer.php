<footer class="pie-pagina bg-dark text-white py-4">
  <div id="contactanos" class="container d-flex flex-column flex-md-row justify-content-between">

    <!-- Columna 1: Contacto y Redes -->
    <div class="columna-pie d-flex flex-column mb-4 mb-md-0">
      <h5 class="mb-3">Contacto</h5>
      <span><i class="bi bi-envelope-fill me-2"></i> contacto@automotors.com</span>
      <span><i class="bi bi-telephone-fill me-2"></i> +54 9 379 000-0000</span>
      <span><i class="bi bi-geo-alt-fill me-2"></i> Av. Libertad 1234, Corrientes, Argentina</span>

      <div class="mt-3">
        <a href="#" class="text-white fs-4 me-3"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-white fs-4 me-3"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-white fs-4"><i class="bi bi-twitter"></i></a>
      </div>
      
      <!-- Botón Agregar Consulta -->
      <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#consultaModal">
        Agregar Consulta
      </button>
    </div>

    <!-- Columna 2: Información -->
    <div class="columna-pie d-flex flex-column">
      <h5 class="mb-3">Información</h5>
      <a href="<?= base_url('informacion_legal') ?>" class="text-white text-decoration-none mb-1">Información Legal</a>
      <a href="<?= base_url('trabajaConNosotros') ?>" class="text-white text-decoration-none mb-1">Trabajá con
        Nosotros</a>
    </div>
  </div>
</footer>

<!-- Modal para Agregar Consulta -->
<div class="modal fade" id="consultaModal" tabindex="-1" aria-labelledby="consultaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="consultaModalLabel">Nueva Consulta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="consultaTexto" class="form-label">Tu consulta</label>
            <textarea class="form-control" id="consultaTexto" rows="5"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Agregar Consulta</button>
      </div>
    </div>
  </div>
</div>