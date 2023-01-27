
<?php
session_start();

class Connection{
  public $host = "localhost";
  public $user = "root";
  public $password = "";
  public $db_name = "presence_db";
  public $conn;

  public function __construct(){
    $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
  }
}

class Login extends Connection{
  public $id;
  public $usertype;
  public $fllname;

  
  
  public function login($uname, $password){
    
    $hashed = hash('sha512',$password);

    $result = mysqli_query($this->conn, "SELECT * FROM accounts WHERE username = '$uname'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($hashed == $row["password"]){
        $this->id = $row["id"];
        $this->usertype = $row["usertype"];

        
        
        return 1;
        // Login successful

        
      }
      else{
        return 10;
        // Wrong password
      }
    }
    else{
      return 100;
      // User not registered
    }
  }

  public function idUser(){
    return $this->id;
  }

  public function idusertype(){
    return $this->usertype;
  }

  public function idName(){
    return $this->fllname;
  }
}

class Select extends Connection{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM accounts WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}


