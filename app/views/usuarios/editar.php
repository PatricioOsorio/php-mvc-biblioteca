<?php require_once RUTA_APP . "/views/includes/header.php" ?>

<a href="<?php echo RUTA_URL ?>usuarios/index" class="btn btn-primary"><i class="fas fa-chevron-left pe-3"></i>Volver</a>

<h1 class="display-4 fw-bold text-center py-3"><?php echo $data['title']; ?></h1>

<div class="card card-body bg-light mt-5">
  <form action="<?php echo RUTA_URL ?>usuarios/editar/<?php echo $data["id_usuario"] ?>" method="POST" class="row">
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $data["nombre"] ?>" required>
    </div>
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="apellidos">Apellidos</label>
      <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $data["apellidos"] ?>" required>
    </div>
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="correo">Correo</label>
      <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $data["correo"] ?>" required>
    </div>
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="telefono">Telefono</label>
      <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $data["telefono"] ?>"  pattern="[0-9]{10}" minlength="10" maxlength="10" required>
    </div>
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="tipo_usuario">Tipo de usuario</label>
      <select name="tipo_usuario" id="tipo_usuario" class="form-select">
        <option value="administrador">Administrador</option>
        <option value="usuario">Usuario</option>
      </select>
    </div>
    <div class="form-group col-md-6 mb-3">
      <label class="form-label" for="contrasenia">Contraseña</label>
      <input type="password" class="form-control" id="contrasenia" name="contrasenia" value="<?php echo $data["contrasenia"] ?>" required>
    </div>
    <input type="submit" class="btn btn-warning" value="Editar usuario">
  </form>
</div>

<?php require_once RUTA_APP . "/views/includes/footer.php" ?>