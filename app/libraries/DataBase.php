<?php
class DataBase
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $dataBase = DB_DATABASE;

  private $dbh; // database handler
  private $stmt; // statement
  private $error;

  public function __construct()
  {
    // Configuracion de conexion
    $dsn = 'mysql:host=' . $this->host . ";dbname=" . $this->dataBase;
    $options = array(
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      $this->dbh->exec('set names utf8');
    } catch (PDOException $ex) {
      $this->error = $ex->getMessage();
      echo $this->error;
    }
  }

  // Prepara para la consulta
  public function query($query)
  {
    $this->stmt = $this->dbh->prepare($query);
  }

  // Vinculamos la consulta con bind
  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
          break;
      }
    }
    $this->stmt->bindValue($param, $value, $type);
  }

  // Ejecuta la consulta
  public function execute()
  {
    return $this->stmt->execute();
  }

  // Obtener registros
  public function getRegisters()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Obtener un registro
  public function getRegister()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  // Obtener la cantidad de rows
  public function getRowCount()
  {
    $this->execute();
    return $this->stmt->rowCount();
  }
}
