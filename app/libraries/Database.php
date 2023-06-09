<?php
class Database {
  private $host = DB_HOST;
  private $user = DB_USER; //アカウント名
  private $pass = DB_PASS;
  private $dbname = DB_NAME;

  private $dbh; // Database handler
  private $stmt; // Statement
  private $error;

  public function __construct() {
    // Set DSN
    $dsn = 'mysql:host='.$this->host.';charset=utf8;dbname='.$this->dbname;
    // Create PDO instance
    try {
      $this->dbh = new PDO($dsn,$this->user,$this->pass);
      // echo 'DB Connected';
    } catch(PDOException $e) {
      $this->error = $e->getMessage();
      exit('DB Connection Error:'.$this->error);
    }
  }

  // Prepare statement with query
  public function query($sql) {
    $this->stmt = $this->dbh->prepare($sql);
  }

  // Bind values
  public function bind($param,$value,$type = null) {
    if(is_null($type)) {
      switch(true) {
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
      }
    }
    $this->stmt->bindValue($param,$value,$type);
  }

  // Execute the prepared statement
  public function execute() {
    return $this->stmt->execute();
  }

  // Get result set as array of objects
  public function resultSet() {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  // Get single record as object
  public function single() {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  // Get row count
  public function rowCount() {
    return $this->stmt->rowCount();
  }
}