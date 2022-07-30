<?php
session_start();
include('db.php');
$user_id=$_SESSION['user_id'];
// echo $user_id;
// $language_id = $_SESSION["language_id"];

class Index extends Server{
    public function products($user_id){
        $sql = "SELECT * FROM product WHERE product_id='$user_id'";
        $result= $this->conn->query($sql) or die($this->conn->error);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
        }
        return $row;
    }
    public function products1($language_id,$product_id){ 
        $sql = "SELECT * FROM product_detail WHERE language_id=$language_id AND product_id=$product_id";
        $res= $this->conn->query($sql) or die($this->conn->error);
        if($res->num_rows > 0){
          $row1 = $res->fetch_assoc();
      }
      return $row1;
}
}

$obj= new Index;
$row=$obj->products($_SESSION['user_id']);
$obj1= new Index;
$row1=$obj1->products1($_SESSION['language_id'],$row['product_id']);

if (isset($_POST["button2"]))
{
  // $user_id  = $_POST['user_id']; 
  $quantity  = $_POST['quantity'];  
  {
    $_SESSION['pdtqty']=$quantity ;
    $_SESSION['product_select']= $user_id;  

    header('Location:register.php');
  }
}
else
// if (isset($_POST["button1"]))
{
  // $user_id  = $_POST['user_id']; 
  $quantity  = $_POST['quantity'];  
  {
    $_SESSION['pdtqty']=$quantity ;
    $_SESSION['product_select']= $user_id;  

    header('Location:register.php');
  }
}