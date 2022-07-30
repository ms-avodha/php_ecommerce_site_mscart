<?php
require('../db.php');
?>
<html><br><br><br><br><br><br></html>
<?php
class User extends Server{  
    public function register($firstname, $lastname,$address,$zipcode,$country,$phone,$email,$username,$password,$usertype){  
        $sql= "INSERT INTO login(username,password,usertype)
        VALUES('$username','$password',1)";
        $this->conn->query($sql) or die($this->conn->error);

        $login_id =$this->conn->insert_id;

        $sql= "INSERT INTO register(login_id,firstname,lastname,address,zipcode,country,phone,email,reg_date)
        VALUES('$login_id','$firstname','$lastname','$address','$zipcode','$country','$phone','$email', CURDATE())";
        $this->conn->query($sql) or die($this->conn->error);
        echo "Registration success";
        header("Location: users.php");
}
}
if (isset($_POST["submit"]) && $_POST['g-recaptcha-response'] != "")
{
    $secret = '6LdZk-IfAAAAALCDJGUVhdVuvgC7U9VZha4hOxvn';
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
    $firstname= $_POST['firstname'];
    $lastname= $_POST['lastname'];
    $address= $_POST['address'];
    $zipcode= $_POST['zipcode'];
    $country= $_POST['country'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $username= $_POST['username'];
    $password= md5($_POST['password']);
    $usertype =$_POST['usertype'];
    $obj=new User;
$obj->register($firstname, $lastname,$address,$zipcode,$country,$phone,$email,$username,$password,$usertype);
}
}else{
    header('Location:register.php');
}

?>