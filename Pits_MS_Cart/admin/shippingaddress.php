<?php
session_start();
include('header.php');
$login_id = $_SESSION['login_id'];
$id=$_REQUEST['id'];
if(isset($_REQUEST['flag']) && $_REQUEST['flag']=='logout'){
    session_destroy();
    header('location: ../login.php');
}
if(empty($_SESSION)){
    header('location: ../login.php');
}
class Studenthome extends Server{ 
    public function home($id){
    $sql = "SELECT * FROM register WHERE login_id='$id'";
    $res = $this->conn->query($sql);
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
    }
    return $row;
}
}
$obj=new Studenthome;
$row=$obj->home($id);
?>
<html lang="en">
    <br><br><br><br>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shipping Address</title>
    <style>
        #msg{
            color:green;
            text-align:center;
        }
        td{
            padding:10px;
            spacing:10px;
        }
    </style>
</head>
<body> 
    <div align="center">
    <h1>Shipping Address</h1>
    <hr>
    <table>
            <thead>
                <tr align="left">
                    <th>Name   </th>
                    <td><?php echo $row['firstname']." ".$row['lastname']?></td>
                </tr>
                <tr align="left">
                    <th>Address  </th>
                    <td><?php echo $row['address']?></td>
                </tr> 
                <tr align="left">
                    <th>Zip code  </th>
                    <td><?php echo $row['zipcode']?></td>
                </tr>                               
                <tr align="left">
                    <th>Country  </th>
                    <td><?php echo $row['country']?></td>
                </tr>
                <tr align="left">
                    <th>Phone  </th>
                    <td><?php echo $row['phone']?></td>
                </tr>
                <tr align="left">
                    <th>Email  </th>
                    <td><?php echo $row['email']?></td>
                </tr>
            </thead>
        </table>
    </div>
</body>
<br><br><br><br><br><br>
</html>
<?php
include('footer.php');
?>