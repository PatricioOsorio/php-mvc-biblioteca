<?php
class Paginas extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->paginasModel = $this->loadModel("Pagina");
  }

  public function index()
  {
    $data = [
      "title" => "Libreria \"Barco de papel\"",
    ];
    $this->loadView("paginas/index", $data);
  }
}
