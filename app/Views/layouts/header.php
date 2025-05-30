<header class="bg-black py-2">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url() ?>">
          <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="Logo" class="me-2" style="height: 80px;">
          <h1 class="h4 mb-0 text-white">AUTOMOTORS</h1>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuSuperior"
          aria-controls="menuSuperior" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuSuperior">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#contactanos">CONTACTANOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('empresa/quienes_somos') ?>">CONÓCENOS</a>
            </li>
          </ul>

          <div class="d-flex align-items-center gap-3">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar vehículos" aria-label="Buscar">
              <button class="btn btn-outline-light" type="submit">
                <i class="bi bi-search"></i>
              </button>
            </form>

            <!-- Ícono con menú desplegable -->
            <div class="dropdown">
              <button class="btn btn-dark border-0 dropdown-toggle" type="button" id="usuarioDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4 text-white"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
                <?php if (session()->get('isLoggedIn')): ?>
                    <?php if (session()->get('identificador') == 1): ?>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('panel') ?>">Panel de Administración</a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a class="dropdown-item" href="<?= base_url('usuario/miperfil') ?>">Mi Perfil</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= base_url('logout') ?>">Cerrar Sesión</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin">Iniciar
                            Sesión</a>
                    </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>
<!-- Modal de inicio de sesión -->
<?= $this->include('layouts/modals/login') ?>