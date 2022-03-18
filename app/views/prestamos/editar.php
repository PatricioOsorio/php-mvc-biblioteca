<?php require_once RUTA_APP . "/views/includes/header.php" ?>

<a href="<?php echo RUTA_URL ?>prestamos/index" class="btn btn-primary"><i class="fas fa-chevron-left pe-3"></i>Volver</a>

<h1 class="display-4 fw-bold text-center py-3"><?php echo $data['title']; ?></h1>

<div class="card card-body bg-light mt-5">
  <form action="<?php echo RUTA_URL ?>prestamos/editar/<?php echo $data["id_prestamo"] ?>" method="POST" class="row">
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="id_libro">Libro</label>
      <select name="id_libro" id="id_libro" class="form-select" required>
        <?php foreach ($data["libros"] as $libro) { ?>
          <option 
            value="<?php echo $libro->id_libro ?>" 
            <?php echo ($libro->id_libro == $data["id_libro"] ? "selected" : "") ?>
            > 
              <?php echo $libro->titulo ?>
        </option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="id_usuario">Usuario</label>
      <select name="id_usuario" id="id_usuario" class="form-select" required>
        <?php foreach ($data["usuarios"] as $usuario) { ?>
          <option 
            value="<?php echo $usuario->id_usuario ?>"
            <?php echo ($usuario->id_usuario == $data["id_usuario"] ? "selected" : "") ?>
            >
            <?php echo $usuario->nombre ?>
        </option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="fecha_prestamo">Fecha Prestamo</label>
      <input 
        type="datetime-local" 
        class="form-control" 
        name="fecha_prestamo" 
        id="fecha_prestamo" 
        value="<?php echo date('Y-m-d\TH:i', strtotime($data["fecha_prestamo"])) ?>" 
        required>
    </div>
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="fecha_regreso">Fecha regreso</label>
      <input 
      type="datetime-local" 
      class="form-control" 
      name="fecha_regreso" 
      id="fecha_regreso" 
      value="<?php echo date('Y-m-d\TH:i', strtotime($data["fecha_regreso"])) ?>" 
      required>
    </div>
    <input type="submit" class="btn btn-warning" value="Editar usuario">
  </form>
</div>

<?php require_once RUTA_APP . "/views/includes/footer.php" ?>