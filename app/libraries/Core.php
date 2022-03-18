<?php
/*
  Mapear url ingresada en el navegador
  1 - Controlador
  2 - Metodos
  3 - Parametro

  Ej. articulos/actualizar/4
*/

class Core
{
  protected $currentController = "sesiones";
  protected $currentMethod = "index";
  protected $paramethers = [];

  public function __construct()
  {

    $url = $this->getUrl();

    // 1 - Busca si existe controlador
    if (isset($url[0])) {
      if (file_exists("../app/controllers/" . ucwords($url[0]) . ".php")) {

        // Si existe se setea como controlador por defecto
        $this->currentController = ucwords($url[0]);

        // unset del indice
        unset($url[0]);
      }
    }

    // Importa el controlador
    require_once "../app/controllers/" . $this->currentController . ".php";
    $this->currentController = new $this->currentController;

    // 2 - Checa la parte del Metodo
    if (isset($url[1])) {
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];

        // unset del indice
        unset($url[1]);
      }
    }

    // 3 - Checa la parte de los parametros
    $this->paramethers = $url ? array_values($url) : [];

    // Callback con parametros
    call_user_func_array(
      [$this->currentController, $this->currentMethod],
      $this->paramethers
    );
  }

  public function getUrl()
  {
    // Extraccion de la url
    // Ej: controller/method/parameter
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
