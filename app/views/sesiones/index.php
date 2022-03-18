<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo RUTA_URL ?>public/styles/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo RUTA_URL ?>public/styles/main.css">
  <title><?php echo NOMBRE_SITIO ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <script src="https://kit.fontawesome.com/56d0ffeffa.js" crossorigin="anonymous"></script>
</head>

<body class="container d-flex flex-column vh-100">
  <main class="flex-fill">
    <div class="row vh-100 align-content-center">
      <div class="col-lg-4">
      </div>

      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h2><?php echo $data["title"] ?></h2>
          </div>
          <div class="card-body">
            <?php if (isset($data["error"]) && $data["error"] == true) {
              echo "<p class='alert alert-warning'>ocurrio un error</p>";
            } ?>
            <form action="<?php echo RUTA_URL ?>sesiones/index.php" method="post" class="d-flex flex-column">
              <div class="form-floating">
                <input type="text" class="form-control" id="user" name="user" placeholder="pablo" required>
                <label for="user">Usuario</label>
              </div>
              <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                <label for="password">Contraseña</label>
              </div>
              <button class="btn btn-primary btn-lg mt-3" type="submit">Entrar</button>
            </form>
          </div>
          <div class="card-footer text-muted">

          </div>
        </div>


      </div>

      <div class="col-lg-4">
      </div>
    </div>
  </main>

  <script src="<?php echo RUTA_URL ?>public/scripts/bootstrap.bundle.min.js"></script>
  <script src="<?php echo RUTA_URL ?>public/scripts/main.js"></script>

</body>

</html>