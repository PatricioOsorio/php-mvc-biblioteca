<?php require_once RUTA_APP . "/views/includes/header.php" ?>

<h1 class="display-4 fw-bold text-center py-3"><?php echo $data['title'] ?></h1>

<table class="table table-borderless table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th class="text-center">Id prestamo</th>
      <th class="text-center">Id libro</th>
      <th class="text-center">Nombre Libro</th>
      <th class="text-center">Id usuario</th>
      <th class="text-center">Nombre usuario</th>
      <th class="text-center">Fecha prestamo</th>
      <th class="text-center">Fecha regreso</th>
      <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data["prestamos"] as $prestamo) { ?>
      <tr>
        <td><?php echo $prestamo->id_prestamo ?></td>
        <td><?php echo $prestamo->id_libro ?></td>
        <td><?php echo $prestamo->titulo ?></td>
        <td><?php echo $prestamo->id_usuario ?></td>
        <td><?php echo $prestamo->nombre ?></td>
        <td><?php echo $prestamo->fecha_prestamo ?></td>
        <td><?php echo $prestamo->fecha_regreso ?></td>
        <td class="d-flex justify-content-center gap-2">
          <a class="btn btn-warning" href="<?php echo RUTA_URL ?>prestamos/editar/<?php echo $prestamo->id_prestamo ?>">
            <i class="fas fa-edit"></i> Modificar
          </a>
          <a class="btn btn-danger" href="<?php echo RUTA_URL ?>prestamos/borrar/<?php echo $prestamo->id_prestamo ?>">
            <i class="fas fa-trash"></i> Eliminar
          </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php require_once RUTA_APP . "/views/includes/footer.php" ?>