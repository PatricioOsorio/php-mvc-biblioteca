<?php
class Libros extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->librosModel = $this->loadModel("Libro");
  }

  public function index()
  {
    // Obtener los libros
    $books = $this->librosModel->getLibros();

    $data = [
      "title" => "Libros",
      "books" => $books,
    ];
    $this->loadView("libros/index", $data);
  }

  public function agregar()
  {
    $data = ["title" => "Agregar libro"];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        ...$data,
        "titulo" => trim($_POST["titulo"]),
        "no_paginas" => trim($_POST["no_paginas"]),
        "nombre_autor" => trim($_POST["nombre_autor"]),
        "imprenta" => trim($_POST["imprenta"]),
      ];
      if ($this->librosModel->agregarLibro($data)) {
        redirect("libros/index");
      } else {
        die("algo salio mal");
      }
    } else {
      $this->loadView("libros/agregar", $data);
    }
  }

  public function editar($id)
  {
    $data = ["title" => "Editar libro"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        ...$data,
        "id_libro" => $id,
        "titulo" => trim($_POST["titulo"]),
        "no_paginas" => trim($_POST["no_paginas"]),
        "nombre_autor" => trim($_POST["nombre_autor"]),
        "imprenta" => trim($_POST["imprenta"]),
      ];
      if ($this->librosModel->actualizarLibro($data)) {
        redirect("libros/index");
      } else {
        die("Algo salio mal");
      }
    } else {
      // Obtener informacion de usuario desde el modelo
      $book = $this->librosModel->getLibro($id);

      $data = [
        ...$data,
        "id_libro" => $book->id_libro,
        "titulo" => $book->titulo,
        "no_paginas" => $book->no_paginas,
        "nombre_autor" => $book->nombre_autor,
        "imprenta" => $book->imprenta,
      ];

      $this->loadView("libros/editar", $data);
    }
  }

  public function borrar($id)
  {
    // Obtener informacion de usuario desde el modelo
    $book = $this->librosModel->getLibro($id);

    $data = ["title" => "Borrar libro"];

    $data = [
      ...$data,
      "id_libro" => $book->id_libro,
      "titulo" => $book->titulo,
      "no_paginas" => $book->no_paginas,
      "nombre_autor" => $book->nombre_autor,
      "imprenta" => $book->imprenta,
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        "id_libro" => $id,
      ];
      if ($this->librosModel->borrarLibro($data)) {
        redirect("libros/index");
      } else {
        die("Algo salio mal");
      }
    }

    $this->loadView("libros/borrar", $data);
  }
}
