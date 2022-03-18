<?php
class Prestamos extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->prestamosModel = $this->loadModel("Prestamo");
  }

  public function index()
  {
    // Obtener los prestamos
    $prestamos = $this->prestamosModel->getPrestamos();

    $data = [
      "title" => "Prestamos",
      "prestamos" => $prestamos,
    ];
    $this->loadView("prestamos/index", $data);
  }

  public function agregar()
  {
    $libros = $this->prestamosModel->getLibros();
    $usuarios = $this->prestamosModel->getUsuarios();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        "title" => "Agregar prestamo",
        "id_libro" => trim($_POST["id_libro"]),
        "id_usuario" => trim($_POST["id_usuario"]),
        "fecha_prestamo" => trim($_POST["fecha_prestamo"]),
        "fecha_regreso" => trim($_POST["fecha_regreso"]),
      ];
      if ($this->prestamosModel->agregarPrestamo($data)) {
        redirect("prestamos");
      } else {
        die("algo salio mal");
      }
    } else {
      $data = [
        "title" => "Agregar prestamo",
        "libros" => $libros,
        "usuarios" => $usuarios,
      ];

      $this->loadView("prestamos/agregar", $data);
    }
  }

  public function editar($id)
  {
    $libros = $this->prestamosModel->getLibros();
    $usuarios = $this->prestamosModel->getUsuarios();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        "title" => "Editar prestamo",
        "id_prestamo" => $id,
        "id_libro" => trim($_POST["id_libro"]),
        "id_usuario" => trim($_POST["id_usuario"]),
        "fecha_prestamo" => trim($_POST["fecha_prestamo"]),
        "fecha_regreso" => trim($_POST["fecha_regreso"]),
      ];
      if ($this->prestamosModel->actualizarPrestamo($data)) {
        redirect("prestamos");
      } else {
        die("Algo salio mal");
      }
    } else {
      // Obtener informacion de usuario desde el modelo
      $prestamo = $this->prestamosModel->getPrestamo($id);

      $data = [
        "title" => "Editar prestamo",
        "id_prestamo" => $id,
        "id_libro" => $prestamo->id_libro,
        "titulo" => $prestamo->titulo,
        "id_usuario" => $prestamo->id_usuario,
        "nombre" => $prestamo->nombre,
        "fecha_prestamo" => $prestamo->fecha_prestamo,
        "fecha_regreso" => $prestamo->fecha_regreso,
        "libros" => $libros,
        "usuarios" => $usuarios,
      ];

      $this->loadView("prestamos/editar", $data);
    }
  }

  public function borrar($id)
  {
    // Obtener informacion de usuario desde el modelo
    $prestamo = $this->prestamosModel->getPrestamo($id);

    $data = [
      "title" => "Borrar prestamo",
      "id_prestamo" => $prestamo->id_prestamo,
      "id_libro" => $prestamo->id_libro,
      "id_usuario" => $prestamo->id_usuario,
      "fecha_prestamo" => $prestamo->fecha_prestamo,
      "fecha_regreso" => $prestamo->fecha_regreso,
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        // "title" => "Borrar usuario",
        "id_prestamo" => $id,
      ];
      if ($this->prestamosModel->borrarPrestamo($data)) {
        redirect("prestamos");
      } else {
        die("Algo salio mal");
      }
    }

    $this->loadView("prestamos/borrar", $data);
  }
}
