<!-- BARRA DE NAVEGACIÓN PRINCIPAL -->
<nav class="bg-black navbar barra-principal navbar-expand-lg sticky-top">
  <div class="container-fluid justify-content-center justify-content-lg-between">
    <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-caret-down-fill text-white fs-3"></i>
    </button>
    <div class="collapse navbar-collapse justify-content-start" id="menuPrincipal">
      <ul class="navbar-nav flex-column flex-lg-row text-center gap-2">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('catalogo/catalogo') ?>">CATÁLOGO DE VEHÍCULOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('servicios/servicios') ?>">SERVICIOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('clientes/experiencias') ?>">EXPERIENCIA DE CLIENTES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('empresa/informacion_corporativa') ?>">INFORMACIÓN CORPORATIVA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('servicios/compra_venta') ?>">COMPRA/VENTA</a>
        </li>
      </ul>
    </div>
  </div>
</nav>