<?php
session_start();
require('db.php');
class Student extends Server{ 
    public function entry($username,$password){
    $password = md5($password);
    $sql = "SELECT * FROM login WHERE `username`='$username' AND `password`='$password'";
    $res=$this->conn->query($sql);
    if($res->num_rows > 0){
        while($row = $res->fetch_assoc()){
            $_SESSION['username'] = $row['username'];
            $_SESSION['login_id'] = $row['login_id'];
            $usertype = $row['usertype'];
        }

        switch($usertype){
            case 1:
                header('Location:customer/chome.php');
                break;
        }

        switch($usertype){
            case 0:
                header('Location:admin/ahome.php');
                break;
        }
        }
        else{
            header('Location:login.php?id=1');
        }
    }
}
if (isset($_POST["submit"])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    $obj= new Student;
$obj->entry($username,$password);
}
?>