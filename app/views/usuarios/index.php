<?php require_once RUTA_APP . "/views/includes/header.php" ?>

<h1 class="display-4 fw-bold text-center py-3"><?php echo $data['title'] ?></h1>

<table class="table table-borderless table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th class="text-center">Id</th>
      <th class="text-center">Nombre</th>
      <th class="text-center">Apellidos</th>
      <th class="text-center">Correo</th>
      <th class="text-center">Telefono</th>
      <th class="text-center">Tipo Usuario</th>
      <th class="text-center">Contraseña</th>
      <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data["users"] as $user) { ?>
      <tr>
        <td><?php echo $user->id_usuario ?></td>
        <td><?php echo $user->nombre ?></td>
        <td><?php echo $user->apellidos ?></td>
        <td><?php echo $user->correo ?></td>
        <td><?php echo $user->telefono ?></td>
        <td><?php echo $user->tipo_usuario ?></td>
        <td><?php echo $user->contrasenia ?></td>
        <td class="d-flex justify-content-center gap-2">
          <a class="btn btn-warning" href="<?php echo RUTA_URL ?>usuarios/editar/<?php echo $user->id_usuario ?>">
            <i class="fas fa-edit"></i> Modificar
          </a>
          <a class="btn btn-danger" href="<?php echo RUTA_URL ?>usuarios/borrar/<?php echo $user->id_usuario ?>">
            <i class="fas fa-trash"></i> Eliminar
          </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php require_once RUTA_APP . "/views/includes/footer.php" ?>