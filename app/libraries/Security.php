<?php

class Security
{
  public function __construct()
  {
    if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] == true) {
      // print_r("Sesion: " . $_SESSION["authenticated"] . "<br>");
      // echo "Hay sesion";
    } else {
      // echo "No hay sesion";
      redirect("sesiones/index");
    }
  }
}
