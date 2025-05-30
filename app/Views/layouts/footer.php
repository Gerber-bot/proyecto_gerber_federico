<footer class="pie-pagina bg-black text-white py-4">
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
      <a href="<?= base_url('empresa/informacion_legal') ?>" class="text-white text-decoration-none mb-1">Información Legal</a>
      <a href="<?= base_url('empresa/trabaja_con_nosotros') ?>" class="text-white text-decoration-none mb-1">Trabajá con
        Nosotros</a>
    </div>
  </div>
</footer>

<!-- Modal para agregar consultas-->
<?= $this->include('layouts/modals/consultas') ?>