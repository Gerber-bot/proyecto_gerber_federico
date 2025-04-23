<header class="bg-dark py-2">
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
              <a class="nav-link" href="<?= base_url('quienes_somos') ?>">CONÓCENOS</a>
            </li>
          </ul>

          <div class="d-flex align-items-center gap-3">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar vehículos" aria-label="Buscar">
              <button class="btn btn-outline-light" type="submit">🔍</button>
            </form>

            <!-- Ícono con menú desplegable -->
            <div class="dropdown">
              <button class="btn btn-dark border-0 dropdown-toggle" type="button" id="usuarioDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4 text-white"></i>
              </button>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="usuarioDropdown">
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin">Iniciar
                    Sesión</a></li>
                <li><a class="dropdown-item" href="<?= base_url('miperfil') ?>">Mi Perfil</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</header>

<!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalLoginLabel">Iniciar Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <!-- Formulario de inicio de sesión -->
        <form id="loginForm">
          <div class="mb-3">
            <label for="emailLogin" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="emailLogin" required>
          </div>
          <div class="mb-3">
            <label for="passwordLogin" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="passwordLogin" required>
          </div>

          <!-- Opción de recordar contraseña -->
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Recordarme</label>
          </div>

          <!-- Enlaces para "Olvidé mi contraseña" y "Registrarse" -->
          <div class="d-flex justify-content-between">
            <a href="#" id="forgotPasswordLink">¿Olvidaste tu contraseña?</a>
            <a href="#" id="registerLink">¿No tienes cuenta? Regístrate</a>
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-3">Ingresar</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal de Registro -->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegisterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="modalRegisterLabel">Registrarse</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <!-- Formulario de registro -->
        <form id="registerForm">
          <div class="mb-3">
            <label for="nameRegister" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="nameRegister" required>
          </div>
          <div class="mb-3">
            <label for="documentRegister" class="form-label">Número de Documento</label>
            <input type="text" class="form-control" id="documentRegister" required>
          </div>
          <div class="mb-3">
            <label for="dobRegister" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="dobRegister" required>
          </div>
          <div class="mb-3">
            <label for="emailRegister" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="emailRegister" required>
          </div>
          <div class="mb-3">
            <label for="phoneRegister" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="phoneRegister" required>
          </div>
          <div class="mb-3">
            <label for="professionRegister" class="form-label">Profesión</label>
            <input type="text" class="form-control" id="professionRegister" required>
          </div>
          <div class="mb-3">
            <label for="maritalStatusRegister" class="form-label">Estado Civil</label>
            <select class="form-select" id="maritalStatusRegister" required>
              <option value="">Seleccione</option>
              <option value="soltero">Soltero</option>
              <option value="casado">Casado</option>
              <option value="divorciado">Divorciado</option>
              <option value="viudo">Viudo</option>
            </select>
          </div>

          <button type="submit" class="btn btn-success w-100 mt-3">Registrarse</button>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
  // Cambiar a formulario de registro
  document.getElementById('registerLink').addEventListener('click', function (e) {
    e.preventDefault();

    // Obtener las instancias de los modales
    var modalLoginEl = document.getElementById('modalLogin');
    var modalRegisterEl = document.getElementById('modalRegister');

    var modalLogin = bootstrap.Modal.getInstance(modalLoginEl) || new bootstrap.Modal(modalLoginEl);
    var modalRegister = new bootstrap.Modal(modalRegisterEl);

    // Esperar a que se cierre el modalLogin antes de abrir el modalRegister
    modalLoginEl.addEventListener('hidden.bs.modal', function () {
      modalRegister.show();
    }, { once: true });

    modalLogin.hide(); // Ocultar el modal de inicio de sesión
  });

  // Funcionalidad de recuperación de contraseña (placeholder)
  document.getElementById('forgotPasswordLink').addEventListener('click', function (e) {
    e.preventDefault();
    alert('Funcionalidad de recuperación de contraseña en desarrollo.');
  });
</script>