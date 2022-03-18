<?php require_once RUTA_APP . "/views/includes/header.php" ?>

<h1 class="display-4 fw-bold text-center py-3"><?php echo $data['title'] ?></h1>

<table class="table table-borderless table-hover table-responsive">
  <thead class="table-primary">
    <tr>
      <th class="text-center">Id</th>
      <th class="text-center">Titulo</th>
      <th class="text-center">Numero paginas</th>
      <th class="text-center">Nombre autor</th>
      <th class="text-center">Imprenta</th>
      <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data["books"] as $book) { ?>
      <tr>
        <td><?php echo $book->id_libro ?></td>
        <td><?php echo $book->titulo ?></td>
        <td><?php echo $book->no_paginas ?></td>
        <td><?php echo $book->nombre_autor ?></td>
        <td><?php echo $book->imprenta ?></td>
        <td class="d-flex justify-content-center gap-2">
          <a class="btn btn-warning" href="<?php echo RUTA_URL ?>libros/editar/<?php echo $book->id_libro ?>">
            <i class="fas fa-edit"></i> Modificar
          </a>
          <a class="btn btn-danger" href="<?php echo RUTA_URL ?>libros/borrar/<?php echo $book->id_libro ?>">
            <i class="fas fa-trash"></i> Eliminar
          </a>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php require_once RUTA_APP . "/views/includes/footer.php" ?>