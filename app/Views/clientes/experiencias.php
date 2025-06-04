<?= $this->extend('layouts/plantilla') ?>

<<<<<<< Updated upstream

<?= $this->section('content') ?>

  <section class="experiencias py-5">
    <section class="text-center mb-5">
      <h1 class="display-4 fw-bold">Cuéntanos tu Experiencia</h1>
      <p class="lead">Valoramos tu opinión</p>
    </section>

    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalComentario">Añadir
          Comentario</button>
      </div>

      <div class="row" id="galeria-experiencias">
        <div class="col-md-4 mb-4">
          <div class="card experiencia-card shadow-sm">
            <img src="<?= base_url('assets/img/ejemplo1.jpg') ?>" class="card-img-top" alt="Experiencia 1">
            <div class="card-body">
              <h5 class="card-title">@usuario123</h5>
              <p class="card-text">Excelente atención y muy buenos precios, ¡recomendado!</p>
            </div>
          </div>
        </div>
        <!-- Más experiencias pueden ir aquí -->
      </div>
    </div>
  </section>

  <!-- Modal para añadir comentarios-->
<?= $this->include('layouts/modals/agregar_comentarios') ?>

<?= $this->endSection() ?>

=======
<?= $this->section('content') ?>

<section class="experiencias py-5">
    <section class="text-center mb-5">
        <h1 class="display-4 fw-bold">Experiencias de Clientes</h1>
        <p class="lead">Lo que dicen nuestros clientes</p>
    </section>

    <div class="container">
        <!-- Botón en el formato solicitado -->
        <ul class="nav justify-content-end mb-4">
            <li class="nav-item">
                <a class="nav-link btn btn-primary text-white" 
                   href="<?= session()->get('isLoggedIn') ? 'javascript:void(0)' : 'javascript:void(0)' ?>"
                   <?= session()->get('isLoggedIn') ? 'data-bs-toggle="modal" data-bs-target="#modalComentario"' : 'data-bs-toggle="tooltip" data-bs-placement="bottom" title="Debes iniciar sesión para comentar"' ?>>
                    <i class="bi bi-plus-circle me-2"></i> Añadir Comentario
                </a>
            </li>
        </ul>

        <!-- Modal para añadir comentario (solo visible si está logueado) -->
        <?php if (session()->get('isLoggedIn')): ?>
        <div class="modal fade" id="modalComentario" tabindex="-1" aria-labelledby="modalComentarioLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="formComentario" enctype="multipart/form-data">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="modalComentarioLabel">Nueva Experiencia</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="usuario" value="<?= session()->get('nombre') ?>">

                            <div class="mb-3">
                                <label for="comentarioUsuario" class="form-label">Comentario</label>
                                <textarea class="form-control" id="comentarioUsuario" name="comentario" rows="3" required></textarea>
                                <div class="invalid-feedback">Por favor escribe un comentario válido (mínimo 3 caracteres)</div>
                            </div>

                            <div class="mb-3">
                                <label for="imagenUsuario" class="form-label">Imagen (opcional, máx. 2MB)</label>
                                <input class="form-control" type="file" id="imagenUsuario" name="imagen" accept="image/*">
                                <div class="form-text">Formatos permitidos: JPG, PNG</div>
                                <div class="invalid-feedback">Solo imágenes JPG/PNG de hasta 2MB</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">
                                <span class="spinner-border spinner-border-sm d-none" id="spinner" role="status"></span>
                                Publicar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Comentarios dinámicos -->
        <div class="row" id="galeria-experiencias">
            <div class="col-12 text-center py-5">
                <div class="spinner-border text-primary" id="loading-spinner" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Toasts para notificaciones -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="toastSuccess" class="toast align-items-center text-white bg-success" role="alert">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>

    <div id="toastError" class="toast align-items-center text-white bg-danger" role="alert">
        <div class="d-flex">
            <div class="toast-body" id="errorMessage"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

<script>
// Formatear fecha
function formatFecha(fechaStr) {
    const fecha = new Date(fechaStr);
    return fecha.toLocaleDateString('es-ES', {
        day: '2-digit', month: 'short', year: 'numeric',
        hour: '2-digit', minute: '2-digit'
    });
}

// Cargar comentarios
function cargarComentarios() {
    const galeria = document.getElementById('galeria-experiencias');
    const spinner = document.getElementById('loading-spinner');

    fetch("<?= base_url('comentarios/listar') ?>")
        .then(response => {
            if (!response.ok) throw new Error("Error en la respuesta del servidor");
            return response.json();
        })
        .then(data => {
            spinner.classList.add('d-none');
            galeria.innerHTML = '';

            if (data.success && data.comentarios.length > 0) {
                data.comentarios.forEach(comentario => {
                    let imagen = '';
                    if (comentario.imagen && comentario.imagen !== 'null') {
                        imagen = `
                            <img src="<?= base_url('comentarios/mostrarImagen') ?>/${encodeURIComponent(comentario.imagen)}" 
                                 class="card-img-top" alt="Imagen del comentario"
                                 style="height: 200px; object-fit: cover;"
                                 onerror="this.style.display='none'">
                        `;
                    }

                    const card = `
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                ${imagen}
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h5 class="card-title mb-0">@${comentario.usuario}</h5>
                                        <small class="text-muted">${formatFecha(comentario.fecha_subida)}</small>
                                    </div>
                                    <p class="card-text">${comentario.comentario}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    galeria.innerHTML += card;
                });
            } else {
                galeria.innerHTML = `
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="bi bi-info-circle me-2"></i> No hay experiencias aún.
                        </div>
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error(error);
            spinner.classList.add('d-none');
            galeria.innerHTML = `
                <div class="col-12">
                    <div class="alert alert-danger text-center">
                        <i class="bi bi-exclamation-triangle me-2"></i> No se pudieron cargar los comentarios.
                    </div>
                </div>
            `;
        });
}

// Enviar formulario
const formComentario = document.getElementById("formComentario");
if (formComentario) {
    formComentario.addEventListener("submit", function (e) {
        e.preventDefault();

        const spinner = document.getElementById('spinner');
        const submitBtn = this.querySelector('button[type="submit"]');
        spinner.classList.remove('d-none');
        submitBtn.disabled = true;

        const formData = new FormData(this);

        fetch("<?= base_url('comentarios/guardar') ?>", {
            method: "POST",
            headers: { 'X-Requested-With': 'XMLHttpRequest' },
            body: formData
        })
            .then(response => {
                if (!response.ok) throw new Error("Error en la respuesta del servidor");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    document.getElementById('toastMessage').textContent = "Comentario publicado correctamente";
                    bootstrap.Toast.getOrCreateInstance(document.getElementById('toastSuccess')).show();
                    
                    const modal = bootstrap.Modal.getInstance(document.getElementById("modalComentario"));
                    if (modal) modal.hide();
                    
                    this.reset();
                    cargarComentarios();
                } else {
                    throw new Error(data.message || 'Error al guardar el comentario');
                }
            })
            .catch(error => {
                console.error(error);
                document.getElementById('errorMessage').textContent = error.message || 'Error inesperado';
                bootstrap.Toast.getOrCreateInstance(document.getElementById('toastError')).show();
            })
            .finally(() => {
                spinner.classList.add('d-none');
                submitBtn.disabled = false;
            });
    });
}

// Iniciar tooltips
document.addEventListener('DOMContentLoaded', function() {
    // Iniciar tooltips de Bootstrap
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Cargar comentarios
    cargarComentarios();
});
</script>

<?= $this->endSection() ?>
>>>>>>> Stashed changes
