<?php
class Usuarios extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->usuariosModel = $this->loadModel("Usuario");
  }

  public function index()
  {
    // Obtener los usuarios
    $users = $this->usuariosModel->getUsuarios();

    $data = [
      "title" => "Usuarios",
      "users" => $users,
    ];
    $this->loadView("usuarios/index", $data);
  }

  public function agregar()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        "title" => "Agregar usuario",
        "nombre" => trim($_POST["nombre"]),
        "apellidos" => trim($_POST["apellidos"]),
        "correo" => trim($_POST["correo"]),
        "telefono" => trim($_POST["telefono"]),
        "tipo_usuario" => trim($_POST["tipo_usuario"]),
        "contrasenia" => trim($_POST["contrasenia"]),
      ];
      if ($this->usuariosModel->agregarUsuario($data)) {
        redirect("usuarios");
      } else {
        die("algo salio mal");
      }
    } else {
      $data = [
        "title" => "Agregar usuario",
      ];

      $this->loadView("usuarios/agregar", $data);
    }
  }

  public function editar($id)
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        "title" => "Editar usuario",
        "id_usuario" => $id,
        "nombre" => trim($_POST["nombre"]),
        "apellidos" => trim($_POST["apellidos"]),
        "correo" => trim($_POST["correo"]),
        "telefono" => trim($_POST["telefono"]),
        "tipo_usuario" => trim($_POST["tipo_usuario"]),
        "contrasenia" => trim($_POST["contrasenia"]),
      ];
      if ($this->usuariosModel->actualizarUsuario($data)) {
        redirect("usuarios");
      } else {
        die("Algo salio mal");
      }
    } else {
      // Obtener informacion de usuario desde el modelo
      $user = $this->usuariosModel->getUsuario($id);

      $data = [
        "title" => "Editar usuario",
        "id_usuario" => $user->id_usuario,
        "nombre" => $user->nombre,
        "apellidos" => $user->apellidos,
        "correo" => $user->correo,
        "telefono" => $user->telefono,
        "tipo_usuario" => $user->tipo_usuario,
        "contrasenia" => $user->contrasenia,
      ];

      $this->loadView("usuarios/editar", $data);
    }
  }

  public function borrar($id)
  {
    // Obtener informacion de usuario desde el modelo
    $user = $this->usuariosModel->getUsuario($id);

    $data = [
      "title" => "Borrar usuario",
      "id_usuario" => $user->id_usuario,
      "nombre" => $user->nombre,
      "apellidos" => $user->apellidos,
      "correo" => $user->correo,
      "telefono" => $user->telefono,
      "tipo_usuario" => $user->tipo_usuario,
      "contrasenia" => $user->contrasenia,
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $data = [
        // "title" => "Borrar usuario",
        "id_usario" => $id,
      ];
      if ($this->usuariosModel->borrarUsuario($data)) {
        redirect("usuarios");
      } else {
        die("Algo salio mal");
      }
    }

    $this->loadView("usuarios/borrar", $data);
  }
}
