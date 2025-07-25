<?= $this->extend('layouts/plantilla') ?>


<?= $this->section('content') ?>

  <!--  CONTENIDO DE LA PAGUINA-->
  <section class="container my-5">
    <div class="row bg-white shadow rounded p-4">
      <div class="col">
        <h2 class="mb-4 text-center">INFORMACIÓN CORPORATIVA</h2>

        <p><strong>Automotors S.R.L.</strong> es una empresa argentina dedicada a la venta de vehículos nuevos y usados,
          servicios automotrices y asesoramiento personalizado. Nacida en 2025, se posiciona como una nueva alternativa
          para clientes que buscan innovación, transparencia y calidad en el sector automotor.</p>

        <ul class="list-group list-group-flush my-4">
          <li class="list-group-item"><strong>Razón Social:</strong> Automotors S.R.L.</li>
          <li class="list-group-item"><strong>CUIT:</strong> 30-12345678-9</li>
          <li class="list-group-item"><strong>Dirección Legal:</strong> Av. Libertad 1234, Corrientes Capital, Argentina
          </li>
          <li class="list-group-item"><strong>Correo Electrónico:</strong> contacto@automotors.com</li>
          <li class="list-group-item"><strong>Teléfono:</strong> +54 9 379 000-0000</li>
          <li class="list-group-item"><strong>Año de Fundación:</strong> 2025</li>
        </ul>

        <h5 class="mt-4">Compromiso Legal y Transparencia</h5>
        <p>Automotors cumple con todas las normativas vigentes en materia de comercio electrónico, protección al
          consumidor y políticas de datos. Nuestra misión es brindar una experiencia de compra segura, clara y
          eficiente.</p>

        <p>Los términos y condiciones, así como nuestra política de privacidad, se encuentran disponibles para su
          consulta en la sección correspondiente del sitio web.</p>
      </div>
    </div>
  </section>
  <?= $this->endSection() ?>