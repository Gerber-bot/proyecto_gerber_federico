<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Automotors - Experiencias</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- CSS personalizado -->
  <link href="assets/css/miestilo.css" rel="stylesheet">
</head>

<body>

  <?php include('partials/header.php'); ?>
  <?php include('partials/nav.php'); ?>

  <section class="experiencias py-5 bg-light">
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
            <img src="assets/img/ejemplo1.jpg" class="card-img-top" alt="Experiencia 1">
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

  <!-- Modal para añadir comentario -->
  <div class="modal fade" id="modalComentario" tabindex="-1" aria-labelledby="modalComentarioLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="modalComentarioLabel">Nueva Experiencia</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="nombreUsuario" class="form-label">Nombre de usuario</label>
              <input type="text" class="form-control" id="nombreUsuario" required>
            </div>
            <div class="mb-3">
              <label for="comentarioUsuario" class="form-label">Comentario</label>
              <textarea class="form-control" id="comentarioUsuario" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="imagenUsuario" class="form-label">Imagen</label>
              <input class="form-control" type="file" id="imagenUsuario" accept="image/*">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Enviar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include('partials/footer.php'); ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
</body>

</html>