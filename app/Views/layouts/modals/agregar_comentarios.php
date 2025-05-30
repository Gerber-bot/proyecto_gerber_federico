<!DOCTYPE html>
<html>
<head>
    <title>Comentarios</title>
    <script>
        const BASE_URL = "<?= base_url() ?>";
    </script>
</head>
<body>
    <h2>Agregar Comentario</h2>
    <form id="formComentario" enctype="multipart/form-data">
        <textarea name="comentario" placeholder="Escribe un comentario..." required></textarea><br>
        <input type="file" name="imagen" accept="image/*"><br>
        <button type="submit">Enviar</button>
    </form>

    <div id="resultado"></div>
    <h3>Comentarios recientes</h3>
    <div id="listaComentarios"></div>

    <script>
        document.getElementById("formComentario").addEventListener("submit", function (e) {
            e.preventDefault();

            const form = e.target;
            const formData = new FormData(form);

            fetch(`${BASE_URL}/comentarios/guardar`, {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                const resultado = document.getElementById("resultado");
                if (data.success) {
                    resultado.textContent = data.message;
                    form.reset();
                    cargarComentarios();
                } else {
                    resultado.textContent = data.message || 'Error';
                }
            })
            .catch(err => {
                document.getElementById("resultado").textContent = 'Error al enviar comentario';
            });
        });

        function cargarComentarios() {
            fetch(`${BASE_URL}/comentarios/listar`)
                .then(res => res.json())
                .then(data => {
                    const lista = document.getElementById("listaComentarios");
                    lista.innerHTML = '';
                    if (data.success && data.comentarios.length) {
                        data.comentarios.forEach(c => {
                            const div = document.createElement("div");
                            div.innerHTML = `<strong>${c.usuario}</strong> (${c.fecha_subida}):<br>
                                             ${c.comentario}<br>
                                             ${c.imagen ? `<img src="${BASE_URL}/comentarios/mostrarImagen/${c.imagen}" width="200"><br>` : ''}
                                             <hr>`;
                            lista.appendChild(div);
                        });
                    } else {
                        lista.textContent = 'No hay comentarios aún.';
                    }
                });
        }

        window.addEventListener("load", cargarComentarios);
    </script>
</body>
</html>
