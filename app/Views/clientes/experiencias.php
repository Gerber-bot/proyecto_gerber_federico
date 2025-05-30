<?= $this->extend('layouts/plantilla') ?>

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

  <!-- Modal para añadir comentarios-->
<?= $this->include('layouts/modals/agregar_comentarios') ?>

<?= $this->endSection() ?>

