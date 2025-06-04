<!-- Modal de Inicio de Sesión -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalLoginLabel">Iniciar Sesión</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
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

          <div class="d-flex justify-content-between mb-4">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Recordarme</label>
            </div>
            <a href="#" class="text-decoration-none" id="forgotPasswordLink">¿Olvidaste tu contraseña?</a>
          </div>

          <button type="submit" class="btn btn-primary w-100 py-2">
            <span id="loginSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
            Ingresar
          </button>

          <div class="text-center mt-3">
            <span class="text-muted">¿No tienes cuenta? </span>
            <a href="#" id="registerLink" class="text-decoration-none">Regístrate</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Registro -->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="modalRegisterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalRegisterLabel">Crear Cuenta</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
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
            <input type="email" class="form-control" id="emailRegister" required
              pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
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

          <button type="submit" class="btn btn-success w-100 mt-4 py-2">
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
document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = this;
    const spinner = document.getElementById('loginSpinner');
    const submitButton = form.querySelector('button[type="submit"]');

    if (form.checkValidity()) {
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

            if (response.ok) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Bienvenido!',
                    text: data.message || 'Inicio de sesión exitoso',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
<<<<<<< Updated upstream
                    window.location.href = "<?= base_url('panel') ?>";
=======
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else {
                        window.location.reload();
                    }
>>>>>>> Stashed changes
                });
            } else {
                Swal.fire('Error', data.message || 'Correo o contraseña incorrectos', 'error');
            }
        } catch (error) {
            console.error('Error:', error);
            Swal.fire('Error', 'No se pudo conectar al servidor', 'error');
        } finally {
            spinner.classList.add('d-none');
            submitButton.disabled = false;
        }
    }

    form.classList.add('was-validated');
});

  // Cambiar entre modales
  document.getElementById('registerLink').addEventListener('click', function (e) {
    e.preventDefault();
    const loginModal = bootstrap.Modal.getInstance(document.getElementById('modalLogin'));
    const registerModal = new bootstrap.Modal(document.getElementById('modalRegister'));

    loginModal.hide();
    loginModal._element.addEventListener('hidden.bs.modal', () => {
      registerModal.show();
    }, { once: true });
  });

  // Validación en tiempo real
  document.getElementById('registerForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const form = this;
    const spinner = document.getElementById('registerSpinner');
    const submitButton = form.querySelector('button[type="submit"]');

    // Validación de contraseña
    const password = document.getElementById('passwordRegister').value;
    const confirmPassword = document.getElementById('confirmPasswordRegister').value;

    if (password !== confirmPassword) {
      document.getElementById('confirmPasswordRegister').classList.add('is-invalid');
      return;
    }

    if (form.checkValidity()) {
      spinner.classList.remove('d-none');
      submitButton.disabled = true;

      try {
        const response = await fetch('<?= base_url('auth/register') ?>', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: JSON.stringify({
            nombre: document.getElementById('nameRegister').value,
            apellido: document.getElementById('lastnameRegister').value,
            email: document.getElementById('emailRegister').value,
            password: password,
            confirm_password: confirmPassword
          })
        });

        const data = await response.json();

        if (response.status === 201) {
          // Registro exitoso
          bootstrap.Modal.getInstance(form.closest('.modal')).hide();
          Swal.fire({
            icon: 'success',
            title: '¡Registro exitoso!',
            text: data.message,
            willClose: () => {
              window.location.reload();
            }
          });
        } else {
          // Mostrar errores
          if (data.errors) {
            for (const [field, error] of Object.entries(data.errors)) {
              const input = document.getElementById(`${field}Register`);
              input.classList.add('is-invalid');
              input.nextElementSibling.textContent = error;
            }
          } else {
            Swal.fire('Error', data.message || 'Error desconocido', 'error');
          }
        }
      } catch (error) {
        console.error('Error:', error);
        Swal.fire('Error', 'No se pudo conectar al servidor', 'error');
      } finally {
        spinner.classList.add('d-none');
        submitButton.disabled = false;
      }
    }

    form.classList.add('was-validated');
  });
</script>