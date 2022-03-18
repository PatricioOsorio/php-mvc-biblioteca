<?php
class Prestamo
{
  private $db;

  public function __construct()
  {
    $this->db = new DataBase();
  }

  public function getLibros()
  {
    $this->db->query("SELECT id_libro, titulo FROM libros");
    $results = $this->db->getRegisters();

    return $results;
  }

  public function getUsuarios()
  {
    $this->db->query("SELECT id_usuario, nombre FROM usuarios");
    $results = $this->db->getRegisters();

    return $results;
  }

  public function getPrestamos()
  {
    $this->db->query("
      SELECT
        pr.id_prestamo,
        li.id_libro,
        li.titulo,
        us.id_usuario,
        us.nombre,
        pr.fecha_prestamo,
        pr.fecha_regreso
      FROM prestamos as pr
        INNER JOIN libros as li
          ON pr.id_libro = li.id_libro
        INNER JOIN usuarios as us
          ON pr.id_usuario = us.id_usuario
    ");
    $results = $this->db->getRegisters();

    return $results;
  }

  public function getPrestamo($id)
  {
    // $this->db->query("SELECT * FROM prestamos WHERE id_prestamo = :id");
    $this->db->query("
      SELECT
        pr.id_prestamo,
        li.id_libro,
        li.titulo,
        us.id_usuario,
        us.nombre,
        pr.fecha_prestamo,
        pr.fecha_regreso
      FROM prestamos as pr
        INNER JOIN libros as li
          ON pr.id_libro = li.id_libro
        INNER JOIN usuarios as us
          ON pr.id_usuario = us.id_usuario
      WHERE pr.id_prestamo = :id
    ");

    $this->db->bind(":id", $id);

    $row = $this->db->getRegister();

    return $row;
  }

  public function agregarPrestamo($data)
  {
    $this->db->query("INSERT INTO prestamos (id_libro, id_usuario, fecha_prestamo, fecha_regreso) VALUES (:id_libro, :id_usuario, :fecha_prestamo, :fecha_regreso)");

    // Vincular valores
    $this->db->bind(":id_libro", $data["id_libro"]);
    $this->db->bind(":id_usuario", $data["id_usuario"]);
    $this->db->bind(":fecha_prestamo", $data["fecha_prestamo"]);
    $this->db->bind(":fecha_regreso", $data["fecha_regreso"]);

    // Ejecutar
    return ($this->db->execute()) ? true : false;
  }

  public function actualizarPrestamo($data)
  {
    print_r($data);
    $this->db->query("UPDATE prestamos SET id_libro = :id_libro, id_usuario = :id_usuario, fecha_prestamo = :fecha_prestamo, fecha_regreso = :fecha_regreso WHERE id_prestamo = :id");

    // Vincular valores
    $this->db->bind(":id", $data["id_prestamo"]);
    $this->db->bind(":id_libro", $data["id_libro"]);
    $this->db->bind(":id_usuario", $data["id_usuario"]);
    $this->db->bind(":fecha_prestamo", $data["fecha_prestamo"]);
    $this->db->bind(":fecha_regreso", $data["fecha_regreso"]);

    // Ejecutar
    return ($this->db->execute()) ? true : false;
  }

  public function borrarPrestamo($data)
  {
    $this->db->query("DELETE FROM prestamos WHERE id_prestamo = :id");

    // Vincular valores
    $this->db->bind(":id", $data["id_prestamo"]);

    // Ejecutar
    return ($this->db->execute()) ? true : false;
  }
}
