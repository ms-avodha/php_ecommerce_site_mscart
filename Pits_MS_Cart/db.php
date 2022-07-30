<?php
  class Server{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $db="mscart";
    public $conn;

    public function __construct() {
        $this->conn=new mysqli($this->servername, $this->username, $this->password,$this->db);
    }
  }
  
?>
