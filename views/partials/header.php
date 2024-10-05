<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegistraRH</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">RegistraRH</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <?php if (isset($_SESSION['employee_id'])): ?>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
          <!-- Mostrar todas las opciones para admin -->
          <li class="nav-item">
            <a class="nav-link" href="/attendance">Asistencias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/employees">Empleados</a>
          </li>
        <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'user'): ?>
          <!-- Mostrar solo la opción de asistencias para usuario -->
          <li class="nav-item">
            <a class="nav-link" href="/attendance">Asistencias</a>
          </li>
        <?php endif; ?>
      <?php endif; ?>
    </ul>
    <?php if (isset($_SESSION['employee_id'])): ?>
      <!-- Mostrar botón de cerrar sesión siempre que haya sesión activa -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/auth/logout">Cerrar sesión</a>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</nav>
