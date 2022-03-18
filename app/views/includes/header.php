<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <!-- Nombre del sitio -->
  <title><?php echo NOMBRE_SITIO ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Estilos Bootstrap -->
  <link rel="stylesheet" href="<?php echo RUTA_URL ?>public/styles/bootstrap.min.css">
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="<?php echo RUTA_URL ?>public/styles/main.css">
  <!-- Iconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- Iconos de FontAwesome -->
  <script src="https://kit.fontawesome.com/56d0ffeffa.js" crossorigin="anonymous"></script>
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo RUTA_URL ?>public/assets/icons/brand.png" type="image/x-icon" />
</head>

<body class="container d-flex flex-column vh-100">
  <header class="border-bottom p-3">
    <nav class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="<?php echo RUTA_URL ?>paginas/index" class="d-flex align-items-center mb-2 mb-lg-0">
        <img src="<?php echo RUTA_URL ?>public/assets/icons/brand.png" alt="brand" width="40" height="40">
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

        <li><a href="<?php echo RUTA_URL ?>paginas/index" class="nav-link px-2 link-dark">Inicio</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link link-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
            Usuarios
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>usuarios/index">Consultar usuarios</a></li>
            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>usuarios/agregar">Agregar usuario</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link link-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
            Libros
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>libros/index">Consultar libros</a></li>
            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>libros/agregar">Agregar libros</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link link-dark dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown">
            Prestamos
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>prestamos/index">Consultar prestamos</a></li>
            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>prestamos/agregar">Agregar prestamo</a></li>
          </ul>
        </li>

      </ul>

      <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown">
          <img src="<?php echo RUTA_URL ?>public/assets/icons/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small">
          <li><a class="dropdown-item disabled" href="#">Configuracion</a></li>
          <li><a class="dropdown-item disabled" href="#">Perfil</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>sesiones/logout">Salir</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main class="flex-fill">