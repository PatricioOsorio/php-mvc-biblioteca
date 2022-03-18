<?php
class Libro
{
  private $db;

  public function __construct()
  {
    $this->db = new DataBase();
  }

  public function getLibros()
  {
    $this->db->query("SELECT * FROM libros");
    $results = $this->db->getRegisters();

    return $results;
  }

  public function getLibro($id)
  {
    $this->db->query("SELECT * FROM libros WHERE id_libro = :id");

    $this->db->bind(":id", $id);

    $row = $this->db->getRegister();

    return $row;
  }

  public function agregarLibro($data)
  {
    $this->db->query("INSERT INTO libros (titulo, no_paginas, nombre_autor, imprenta) VALUES (:titulo, :no_paginas, :nombre_autor, :imprenta)");

    // Vincular valores
    $this->db->bind(":titulo", $data["titulo"]);
    $this->db->bind(":no_paginas", $data["no_paginas"]);
    $this->db->bind(":nombre_autor", $data["nombre_autor"]);
    $this->db->bind(":imprenta", $data["imprenta"]);

    // Ejecutar
    return ($this->db->execute()) ? true : false;
  }

  public function actualizarLibro($data)
  {
    $this->db->query("UPDATE libros SET titulo = :titulo, no_paginas = :no_paginas, nombre_autor = :nombre_autor, imprenta = :imprenta WHERE id_libro = :id");

    // Vincular valores
    $this->db->bind(":id", $data["id_libro"]);
    $this->db->bind(":titulo", $data["titulo"]);
    $this->db->bind(":no_paginas", $data["no_paginas"]);
    $this->db->bind(":nombre_autor", $data["nombre_autor"]);
    $this->db->bind(":imprenta", $data["imprenta"]);

    // Ejecutar
    return ($this->db->execute()) ? true : false;
  }

  public function borrarLibro($data)
  {
    $this->db->query("DELETE FROM libros WHERE id_libro = :id");

    // Vincular valores
    $this->db->bind(":id", $data["id_libro"]);

    // Ejecutar
    return ($this->db->execute()) ? true : false;
  }
}
