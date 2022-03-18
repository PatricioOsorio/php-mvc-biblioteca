<?php
class Sesion
{
  private $db;

  public function __construct()
  {
    $this->db = new DataBase();
  }

  public function login($data)
  {
    $this->db->query("SELECT * FROM usuarios WHERE nombre = :nombre and contrasenia = :contrasenia");

    $this->db->bind(":nombre", $data["usuario"]);
    $this->db->bind(":contrasenia", $data["contrasenia"]);

    $row = $this->db->getRegister();

    return $row;
  }
}
