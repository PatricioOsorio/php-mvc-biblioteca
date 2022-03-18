<?php require_once RUTA_APP . "/views/includes/header.php" ?>

<div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg mt-3">
  <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
    <h1 class="display-4 fw-bold lh-1"><?php echo $data['title'] ?></h1>
    <p class="lead">Texto de la libreria...</p>
    
  </div>
  <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
    <img class="rounded-lg-3" src="<?php echo RUTA_URL ?>public/assets/images/wall.jpg" alt="walllpaper" width="720">
  </div>
</div>

<?php require_once RUTA_APP . "/views/includes/footer.php" ?>