<?php
session_start();
require('../db.php');
$login_id= $_SESSION['login_id'];
class Action extends Server{  
    public function confirm($firstname, $lastname,$address,$zipcode, $country, $phone, $email, $login_id,$new){ 
        $quantity=$_SESSION['quantity'];
        $sql="UPDATE register SET firstname='$firstname',lastname='$lastname',address='$address',zipcode='$zipcode',country='$country',phone='$phone',email='$email' WHERE login_id='$login_id'";

        $this->conn->query($sql) or die($this->conn->error);
        if ($new==0){
        header('Location: buynow.php?success=1&qty='.$quantity);
        }else{
            header('Location: cart.php?success=1');
        }
    }
}
if (isset($_POST["submit"])){
    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $address= $_POST['address'];
    $zipcode= $_POST['zipcode'];
    $country= $_POST['country'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $obj=new Action;
$obj->confirm($firstname, $lastname,$address,$zipcode,$country,$phone,$email,$login_id,$_SESSION['new']);
}
?>