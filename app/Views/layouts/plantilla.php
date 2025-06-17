<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Automotors' ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- CSS personalizado -->
  <link href="<?= base_url('assets/css/miestilo.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <?= $this->renderSection('head') ?>
</head>

<body>
  <?= $this->include('layouts/header') ?>
  <?= $this->include('layouts/nav') ?>

  <main>
    <?= $this->renderSection('content') ?>
  </main>

  <?= $this->include('layouts/footer') ?>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Scripts globales -->
  <script>
    // Activar tooltips de Bootstrap
    document.addEventListener('DOMContentLoaded', function () {
      // Tooltips
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });

      // Animaciones al cargar la página
      const animatedElements = document.querySelectorAll('.fade-in');
      animatedElements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.2}s`;
      });
    });

    // Efecto ripple para botones
    document.querySelectorAll('.btn-ripple').forEach(button => {
      button.addEventListener('click', function (e) {
        const x = e.clientX - e.target.getBoundingClientRect().left;
        const y = e.clientY - e.target.getBoundingClientRect().top;

        const ripples = document.createElement('span');
        ripples.style.left = `${x}px`;
        ripples.style.top = `${y}px`;
        this.appendChild(ripples);

        setTimeout(() => {
          ripples.remove();
        }, 1000);
      });
    });

    // Navbar que cambia al hacer scroll
    window.addEventListener('scroll', function () {
      const navbar = document.querySelector('.navbar');
      navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
  </script>

  <!-- Sección para scripts específicos de cada vista -->
  <?= $this->renderSection('scripts') ?>
</body>

</html>