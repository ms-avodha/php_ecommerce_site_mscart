<?php
include('header.php');
// session_start();
$username = $_SESSION['username'];
$login_id = $_SESSION['login_id'];
if(isset($_REQUEST['flag']) && $_REQUEST['flag']=='logout'){
    session_destroy();
    header('location: ../login.php');
}
if(empty($_SESSION)){
    header('location: ../login.php');
}
class Studenthome extends Server{ 
    public function home($login_id){
    $sql = "SELECT * FROM register WHERE login_id='$login_id'";
    $res = $this->conn->query($sql);
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
    }
    return $row;
}
}
$success = isset($_REQUEST['success']) ? $_REQUEST['success'] : "";
$obj=new Studenthome;
$row=$obj->home($login_id);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <style>
        #msg{
            color:green;
            text-align:center;
        }
        .align{
            padding:10px;
            spacing:10px;
        }
    </style>
</head>
<body> 
    <div align="center">
    <br><br><br><br>
    <?php echo " $language[53] ".$username;?> <br><br>
    <table>
            <thead>
                <tr align="center">
                    <td class="align" colspan="2"><h2><?php echo $language[54];?></h2></td>
                </tr>
                <tr align="left">
                    <th><?php echo $language[28];?>  </th>
                    <td class="align"><?php echo $row['firstname']." ".$row['lastname']?></td>
                </tr>
                <tr align="left">
                    <th><?php echo $language[30];?>  </th>
                    <td class="align"><?php echo $row['address']?></td>
                </tr> 
                <tr align="left">
                    <th><?php echo $language[31];?>  </th>
                    <td class="align"><?php echo $row['zipcode']?></td>
                </tr>                               
                <tr align="left">
                    <th><?php echo $language[32];?>  </th>
                    <td class="align"><?php echo $row['country']?></td>
                </tr>
                <tr align="left">
                    <th><?php echo $language[34];?>  </th>
                    <td class="align"><?php echo $row['phone']?></td>
                </tr>
                <tr align="left">
                    <th><?php echo $language[35];?>  </th>
                    <td class="align"><?php echo $row['email']?></td>
                </tr>
                <tr style="text-align:center">
                    <td class="align" colspan="2"><button style="width:150px; background-color:skyblue;text-align:center;"><a href="customeredit.php"><?php echo $language[55];?></a></button></td>
                </tr>
            </thead>
        </table>
        <?php if($success ==1){
        echo '<div id="msg">'.$language[90].'</div>';
        } ?>
    </div>
</body>
<br><br><br>
</html>
<?php
include('footer.php');
?>