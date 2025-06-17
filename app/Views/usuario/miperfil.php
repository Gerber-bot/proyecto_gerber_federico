<?= $this->extend('layouts/plantilla') ?>

<?= $this->section('content') ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 animate__animated animate__fadeIn">
                <div class="card-header bg-gradient-primary text-white d-flex align-items-center">
                    <i class="bi bi-person-circle fs-2 me-2"></i>
                    <h2 class="mb-0">Mi Perfil</h2>
                </div>
                <form id="perfilForm" action="<?= base_url('usuario/actualizar_perfil') ?>" method="post"
                    autocomplete="off">
                    <div class="card-body bg-light">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-person"></i> Nombre</label>
                                <input type="text" name="nombre" class="form-control"
                                    value="<?= esc($usuario['nombre']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-person"></i> Apellido</label>
                                <input type="text" name="apellido" class="form-control"
                                    value="<?= esc($usuario['apellido']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="<?= esc($usuario['email']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-telephone"></i> Teléfono</label>
                                <input type="text" name="telefono" class="form-control"
                                    value="<?= esc($usuario['telefono']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-credit-card-2-front"></i> DNI</label>
                                <input type="text" name="dni" class="form-control"
                                    value="<?= esc($usuario['dni']) ?>" disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="bi bi-calendar-date"></i> Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control"
                                    value="<?= esc($usuario['fecha_nacimiento']) ?>" disabled>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><i class="bi bi-briefcase"></i> Oficio</label>
                                <input type="text" name="oficio" class="form-control"
                                    value="<?= esc($usuario['oficio']) ?>" disabled>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <button type="button" id="modificarBtn" class="btn btn-outline-primary">
                                <i class="bi bi-pencil-square"></i> Modificar datos
                            </button>
                            <button type="submit" id="guardarBtn" class="btn btn-success d-none">
                                <i class="bi bi-save"></i> Guardar Cambios
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Animaciones de Bootstrap  -->
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<script>
document.getElementById('modificarBtn').addEventListener('click', function() {
    document.querySelectorAll('#perfilForm input').forEach(function(input) {
        input.removeAttribute('disabled');
        input.classList.add('bg-white');
    });
    document.getElementById('guardarBtn').classList.remove('d-none');
    document.getElementById('modificarBtn').classList.add('d-none');
});
</script>

<?= $this->endSection() ?>
