<?php 
class User {
  private $db;
  
  public function __construct() {
    $this->db = new Database;
  }

  public function register($data) {
    $this->db->query("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
    // Bind values
    $this->db->bind(':firstname', $data['firstname']);
    $this->db->bind(':lastname', $data['lastname']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function login($email, $password) {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    $hashed_password = $row->password;
    if(password_verify($password, $hashed_password)){
      return $row;
    } else {
      return false;
    }
  }

  public function findUserByEmail($email) {
    $this->db->query("SELECT * FROM users WHERE email = :email");
    // Bind value
    $this->db->bind(':email', $email);
    $row = $this->db->single();
    // Check row
    if($this->db->rowCount() > 0){
      return true;
    } else {
      return false;
    }
  }

  public function getUserById($id) {
    $this->db->query("SELECT * FROM users WHERE id = :id");
    // Bind value
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
  }

}