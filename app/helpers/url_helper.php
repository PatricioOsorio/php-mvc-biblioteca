<?php
function redirect($page)
{
  header("Location:" . RUTA_URL . $page);
}
