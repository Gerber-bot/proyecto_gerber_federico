<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<section class="experiencias py-5">
    <section class="text-center mb-5">
        <h1 class="display-4 fw-bold">EXPERIENCIAS DE CLIENTES</h1>
        <p class="lead">Lo que dicen nuestros clientes</p>
    </section>

    <div class="container">
        <!-- Botón centrado con fondo negro -->
        <ul class="nav justify-content-center mb-4">
            <li class="nav-item">
                <a class="btn btn-dark text-white px-4 py-2 rounded"
                    href="<?= session()->get('isLoggedIn') ? 'javascript:void(0)' : 'javascript:void(0)' ?>"
                    <?= session()->get('isLoggedIn') ? 'data-bs-toggle="modal" data-bs-target="#modalComentario"' : 'data-bs-toggle="tooltip" data-bs-placement="bottom" title="Debes iniciar sesión para comentar"' ?>>
                    <i class="bi bi-plus-circle me-2"></i> Añadir Comentario
                </a>
            </li>
        </ul>


        <!-- Modal para añadir comentario (solo visible si está logueado) -->
        <?php if (session()->get('isLoggedIn')): ?>
            <div class="modal fade" id="modalComentario" tabindex="-1" aria-labelledby="modalComentarioLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="formComentario" enctype="multipart/form-data">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="modalComentarioLabel">Nueva Experiencia</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="usuario" value="<?= session()->get('nombre') ?>">

                                <div class="mb-3">
                                    <label for="comentarioUsuario" class="form-label">Comentario</label>
                                    <textarea class="form-control" id="comentarioUsuario" name="comentario" rows="3"
                                        required></textarea>
                                    <div class="invalid-feedback">Por favor escribe un comentario válido (mínimo 3
                                        caracteres)</div>
                                </div>

                                <div class="mb-3">
                                    <label for="imagenUsuario" class="form-label">Imagen (opcional, máx. 2MB)</label>
                                    <input class="form-control" type="file" id="imagenUsuario" name="imagen"
                                        accept="image/*">
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
        return fecha.toLocaleDateString('es-AR', {
            day: '2-digit', month: 'short', year: 'numeric',
            hour: '2-digit', minute: '2-digit',
            hour12: false,
            timeZone: 'America/Argentina/Buenos_Aires'
        });
    }


    // Variable para el intervalo de recarga
    let intervaloRecarga;

    // Función para agregar un solo comentario al DOM
    function agregarComentario(comentario, prepend = true) {
        const galeria = document.getElementById('galeria-experiencias');

        // Si no hay comentarios (mensaje de "No hay experiencias"), limpiamos
        if (galeria.querySelector('.alert-info')) {
            galeria.innerHTML = '';
        }

        const card = `
<div class="col-12 mb-4 comentario-card">
    <div class="comentario-header">
        <span class="usuario-tag">${comentario.usuario}</span>
        <span class="comentario-fecha">${formatFecha(comentario.fecha_subida)}</span>
    </div>
    <div class="comentario-separador"></div>
    <p class="comentario-texto">${comentario.comentario}</p>
    ${comentario.imagen ? `
    <div class="comentario-imagen-contenedor">
        <img src="<?= base_url('comentarios/mostrarImagen') ?>/${encodeURIComponent(comentario.imagen)}" 
             class="comentario-imagen" 
             alt="Imagen del comentario de ${comentario.usuario}"
             loading="lazy"
             decoding="async"
             onerror="this.parentElement.style.display='none'">
    </div>` : ''}
</div>
    `;

        if (prepend) {
            galeria.insertAdjacentHTML('afterbegin', card);
            // Agregar clase 'nuevo' al comentario recién añadido
            const nuevoCard = galeria.firstElementChild;
            nuevoCard.classList.add('nuevo');

            // Eliminar la clase después de la animación
            setTimeout(() => {
                nuevoCard.classList.remove('nuevo');
            }, 1500);
        } else {
            galeria.innerHTML += card;
        }
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
                        agregarComentario(comentario, false);
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
        // Validación en tiempo real
        formComentario.addEventListener('input', function () {
            const comentario = this.elements.comentario.value.trim();
            const imagen = this.elements.imagen.files[0];

            // Validar comentario
            if (comentario.length < 3 || comentario.length > 1000) {
                this.elements.comentario.classList.add('is-invalid');
            } else {
                this.elements.comentario.classList.remove('is-invalid');
            }

            // Validar imagen si existe
            if (imagen) {
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!validTypes.includes(imagen.type) || imagen.size > 2 * 1024 * 1024) {
                    this.elements.imagen.classList.add('is-invalid');
                } else {
                    this.elements.imagen.classList.remove('is-invalid');
                }
            }
        });

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

                        // Verificar que existe data.nuevoComentario antes de agregarlo
                        if (data.nuevoComentario) {
                            agregarComentario(data.nuevoComentario, true);
                        } else {
                            // Si no viene el comentario, recargar todos
                            cargarComentarios();
                        }

                        // Reiniciar el intervalo de recarga
                        clearInterval(intervaloRecarga);
                        iniciarIntervaloRecarga();
                    } else {
                        throw new Error(data.message || 'Error al guardar el comentario');
                    }
                })
                .catch(error => {
                    console.error(error);
                    let errorMsg = 'Error inesperado';

                    if (error.message.includes('Failed to fetch')) {
                        errorMsg = 'Error de conexión. Verifica tu internet.';
                    } else if (error.message) {
                        errorMsg = error.message;
                    }

                    document.getElementById('errorMessage').textContent = errorMsg;
                    bootstrap.Toast.getOrCreateInstance(document.getElementById('toastError')).show();
                })
                .finally(() => {
                    spinner.classList.add('d-none');
                    submitBtn.disabled = false;
                });
        });
    }

    // Función para iniciar el intervalo de recarga
    function iniciarIntervaloRecarga() {
        clearInterval(intervaloRecarga); // Limpiar por si acaso
        intervaloRecarga = setInterval(() => {
            // Verificar que no haya operaciones pendientes
            if (!document.querySelector('.spinner-border:not(.d-none)')) {
                cargarComentarios();
            }
        }, 30000); // 30 segundos
    }

    // Iniciar tooltips y cargar comentarios al cargar la página
    document.addEventListener('DOMContentLoaded', function () {
        // Iniciar tooltips de Bootstrap
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Cargar comentarios iniciales
        cargarComentarios();

        // Iniciar el intervalo de recarga
        iniciarIntervaloRecarga();
    });
</script>
<?= $this->endSection() ?>