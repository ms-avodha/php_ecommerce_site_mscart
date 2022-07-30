<?php
session_start();
require('../db.php');
$login_id= $_SESSION['login_id'];
class Action extends Server{  
    public function update($firstname, $lastname,$address,$zipcode,$country,$phone,$email,$login_id){ 
        $sql="UPDATE register SET firstname='$firstname',lastname='$lastname',address='$address',zipcode='$zipcode',country='$country',phone='$phone',email='$email' WHERE login_id='$login_id'";

        $this->conn->query($sql) or die($this->conn->error);
        header('Location: customer.php?success=1');
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
$obj->update($firstname, $lastname,$address,$zipcode,$country,$phone,$email,$login_id);
}
?>