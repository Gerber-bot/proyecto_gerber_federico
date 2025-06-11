<!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow rounded-4">
      <div class="modal-header bg-primary text-white rounded-top-4">
        <h5 class="modal-title fw-bold" id="modalLoginLabel">Iniciar Sesión</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body p-4">
        <form id="loginForm" novalidate>
          <div class="mb-3">
            <label for="emailLogin" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="emailLogin" required>
            <div class="invalid-feedback">Ingrese un correo válido</div>
          </div>
          <div class="mb-3">
            <label for="passwordLogin" class="form-label">Contraseña</label>
            <div class="input-group">
              <input type="password" class="form-control" id="passwordLogin" required minlength="8">
              <button class="btn btn-outline-secondary toggle-password" type="button">
                <i class="bi bi-eye"></i>
              </button>
            </div>
            <div class="invalid-feedback">Mínimo 8 caracteres</div>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Recordarme</label>
            </div>
            <a href="#" class="text-decoration-none small" id="forgotPasswordLink">¿Olvidaste tu contraseña?</a>
          </div>
          <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill">
            <span id="loginSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
            Ingresar
          </button>
          <div class="text-center mt-3">
            <span class="text-muted">¿No tienes cuenta? </span>
            <a href="#" id="registerLink" class="text-decoration-none fw-semibold">Regístrate</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Registro -->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegisterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow rounded-4">
      <div class="modal-header bg-success text-white rounded-top-4">
        <h5 class="modal-title fw-bold" id="modalRegisterLabel">Crear Cuenta</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body p-4">
        <form id="registerForm" novalidate>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="nameRegister" class="form-label">Nombre *</label>
              <input type="text" class="form-control" id="nameRegister" required minlength="2">
              <div class="invalid-feedback">Mínimo 2 caracteres</div>
            </div>
            <div class="col-md-6">
              <label for="lastnameRegister" class="form-label">Apellido *</label>
              <input type="text" class="form-control" id="lastnameRegister" required minlength="2">
              <div class="invalid-feedback">Mínimo 2 caracteres</div>
            </div>
          </div>
          <div class="mt-3">
            <label for="emailRegister" class="form-label">Correo electrónico *</label>
            <input type="email" class="form-control" id="emailRegister" required>
            <div class="invalid-feedback">Ingrese un correo válido</div>
          </div>
          <div class="mt-3">
            <label for="passwordRegister" class="form-label">Contraseña *</label>
            <div class="input-group">
              <input type="password" class="form-control" id="passwordRegister" required minlength="8">
              <button class="btn btn-outline-secondary toggle-password" type="button">
                <i class="bi bi-eye"></i>
              </button>
            </div>
            <div class="form-text">Mínimo 8 caracteres con mayúsculas y números</div>
          </div>
          <div class="mt-3">
            <label for="confirmPasswordRegister" class="form-label">Confirmar Contraseña *</label>
            <input type="password" class="form-control" id="confirmPasswordRegister" required>
            <div class="invalid-feedback">Las contraseñas no coinciden</div>
          </div>
          <button type="submit" class="btn btn-success w-100 mt-4 py-2 rounded-pill">
            <span id="registerSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
            Registrarse
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  // Toggle para mostrar/ocultar contraseña
  document.querySelectorAll('.toggle-password').forEach(button => {
    button.addEventListener('click', () => {
      const input = button.closest('.input-group').querySelector('input');
      const icon = button.querySelector('i');

      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
      } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
      }
    });
  });

  // Validación y envío del formulario de login
  document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = this;
    if (!form.checkValidity()) {
      form.classList.add('was-validated');
      return;
    }

    const spinner = document.getElementById('loginSpinner');
    const submitButton = form.querySelector('button[type="submit"]');

    spinner.classList.remove('d-none');
    submitButton.disabled = true;

    try {
      const response = await fetch("<?= base_url('auth/login') ?>", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
          email: document.getElementById('emailLogin').value,
          password: document.getElementById('passwordLogin').value,
          remember: document.getElementById('rememberMe').checked
        })
      });

      const data = await response.json();

      if (data.success) {
        const modal = bootstrap.Modal.getInstance(document.getElementById('modalLogin'));
        if (modal) modal.hide();

        Swal.fire({
          icon: 'success',
          title: '¡Inicio exitoso!',
          text: 'Bienvenido nuevamente',
          timer: 2000,
          showConfirmButton: false,
          willClose: () => window.location.reload()
        });
      }
      else {
        Swal.fire('Error', data.message || 'Error en el login', 'error');
      }
    } catch (error) {
      Swal.fire('Error', 'Error de conexión', 'error');
    } finally {
      spinner.classList.add('d-none');
      submitButton.disabled = false;
    }
  });

  // Cambio de modal: Login → Registro
  document.getElementById('registerLink').addEventListener('click', function (e) {
    e.preventDefault();
    const loginModalEl = document.getElementById('modalLogin');
    const registerModalEl = document.getElementById('modalRegister');

    const loginModal = bootstrap.Modal.getInstance(loginModalEl);
    const registerModal = new bootstrap.Modal(registerModalEl);

    if (loginModal) {
      loginModal.hide();
      loginModalEl.addEventListener('hidden.bs.modal', () => registerModal.show(), { once: true });
    } else {
      registerModal.show();
    }
  });

  // Validación y envío del formulario de registro
  document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = this;
    const spinner = document.getElementById('registerSpinner');
    const submitButton = form.querySelector('button[type="submit"]');
    const passwordInput = document.getElementById('passwordRegister');
    const confirmInput = document.getElementById('confirmPasswordRegister');

    // Reset errores previos
    confirmInput.classList.remove('is-invalid');

    if (passwordInput.value !== confirmInput.value) {
      confirmInput.classList.add('is-invalid');
      return;
    }

    if (form.checkValidity()) {
      spinner.classList.remove('d-none');
      submitButton.disabled = true;

      try {
        const response = await fetch("<?= base_url('auth/register') ?>", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify({
            nombre: document.getElementById('nameRegister').value,
            apellido: document.getElementById('lastnameRegister').value,
            email: document.getElementById('emailRegister').value,
            password: passwordInput.value,
            confirm_password: confirmInput.value
          })
        });

        const data = await response.json();

        if (response.status === 201) {
          bootstrap.Modal.getInstance(form.closest('.modal')).hide();
          Swal.fire({
            icon: 'success',
            title: '¡Registro exitoso!',
            text: data.message || 'Tu cuenta ha sido creada',
            willClose: () => window.location.reload()
          });
        } else {
          if (data.errors) {
            for (const [field, error] of Object.entries(data.errors)) {
              const input = document.getElementById(`${field}Register`);
              if (input) {
                input.classList.add('is-invalid');
                const feedback = input.nextElementSibling;
                if (feedback && feedback.classList.contains('invalid-feedback')) {
                  feedback.textContent = error;
                }
              }
            }
          } else {
            Swal.fire('Error', data.message || 'Error en el registro', 'error');
          }
        }
      } catch (error) {
        console.error(error);
        Swal.fire('Error', 'No se pudo conectar al servidor', 'error');
      } finally {
        spinner.classList.add('d-none');
        submitButton.disabled = false;
      }
    }

    form.classList.add('was-validated');
  });
</script>