<?php
class Usuario
{
  private $db;

  public function __construct()
  {
    $this->db = new DataBase();
  }

  public function getUsuarios()
  {
    $this->db->query("SELECT * FROM usuarios");
    $results = $this->db->getRegisters();

    return $results;
  }

  public function getUsuario($id)
  {
    $this->db->query("SELECT * FROM usuarios WHERE id_usuario = :id");

    $this->db->bind(":id", $id);

    $row = $this->db->getRegister();

    return $row;
  }

  public function agregarUsuario($data)
  {
    $this->db->query("INSERT INTO usuarios (nombre, apellidos, correo, telefono, tipo_usuario, contrasenia) VALUES (:nombre, :apellidos, :correo, :telefono, :tipo_usuario, :contrasenia)");

    // Vincular valores
    $this->db->bind(":nombre", $data["nombre"]);
    $this->db->bind(":apellidos", $data["apellidos"]);
    $this->db->bind(":correo", $data["correo"]);
    $this->db->bind(":telefono", $data["telefono"]);
    $this->db->bind(":tipo_usuario", $data["tipo_usuario"]);
    $this->db->bind(":contrasenia", $data["contrasenia"]);

    // Ejecutar
    return ($this->db->execute()) ? true : false;
  }

  public function actualizarUsuario($data)
  {
    $this->db->query("UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, correo = :correo, telefono = :telefono, tipo_usuario = :tipo_usuario, contrasenia = :contrasenia WHERE id_usuario = :id");

    // Vincular valores
    $this->db->bind(":id", $data["id_usuario"]);
    $this->db->bind(":nombre", $data["nombre"]);
    $this->db->bind(":apellidos", $data["apellidos"]);
    $this->db->bind(":correo", $data["correo"]);
    $this->db->bind(":telefono", $data["telefono"]);
    $this->db->bind(":tipo_usuario", $data["tipo_usuario"]);
    $this->db->bind(":contrasenia", $data["contrasenia"]);

    // Ejecutar
    return ($this->db->execute()) ? true : false;
  }

  public function borrarUsuario($data)
  {
    $this->db->query("DELETE FROM usuarios WHERE id_usuario = :id");

    // Vincular valores
    $this->db->bind(":id", $data["id_usuario"]);

    // Ejecutar
    return ($this->db->execute()) ? true : false;
  }
}
