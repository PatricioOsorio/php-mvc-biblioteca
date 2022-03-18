<?php
class Sesiones extends Controller
{
  public function __construct()
  {
    $this->sesionesModel = $this->loadModel("Sesion");
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        "title" => "Iniciar sesion",
        "usuario" => $_POST["user"],
        "contrasenia" => $_POST["password"],
        "error" => false
      ];
      if ($this->sesionesModel->login($data)) {
        $_SESSION["authenticated"] = true;
        $_SESSION["user"] = $_POST["user"];
        $_SESSION["password"] = $_POST["password"];

        $this->loadView("paginas/index", $data);
      } else {
        // $_SESSION["authenticated"] = false;
        $data["error"] =  true;
        $this->loadView("sesiones/index", $data);
      }
    } else {
      $data = [
        "title" => "Iniciar sesion",
      ];

      $this->loadView("sesiones/index", $data);
    }
  }

  public function logout()
  {
    $data = [];
    $this->loadView("sesiones/logout", $data);
  }
}
