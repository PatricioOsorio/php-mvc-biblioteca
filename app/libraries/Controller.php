<?php
// Controlador principal: encargado de cargar modelos y vistas
class Controller
{
  public function __construct() {
    $security = new Security();
  }
  
  // Carga modelo
  public function loadModel($model)
  {
    require_once "../app/models/" . $model . ".php";
    return new $model();
  }

  // Carga vista
  public function loadView($view, $data = [])
  {
    $path = "../app/views/" . $view . ".php";
    
    // Checa si la vista existe
    file_exists($path) ? require_once $path : die("La vista no existe");
  }
}