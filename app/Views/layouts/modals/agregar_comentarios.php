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
