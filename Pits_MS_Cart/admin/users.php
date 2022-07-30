<?php
include("header.php");
class Admin extends Server{ 
    public function users($user_id){
        $sql = "UPDATE `login` SET `delete`='1' WHERE `login_id`='$user_id'";
        $this->conn->query($sql) or die($this->conn->error);
    }
    public function userdata(){
        $sql = "SELECT * FROM register";
        $result= $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }
}
$success = isset($_REQUEST['success']) ? $_REQUEST['success'] : "";
if(isset($_REQUEST['delete']) && $_REQUEST['delete'] ==1){
    $user_id=$_REQUEST['user_id'];
    $obj1= new Admin;
    $obj1->users($user_id);  
}
$obj= new Admin;
$result=$obj->userdata();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <style>
        #msg{
            color:green;
            text-align:center;
        }
        td{
            padding: 10px;
        }
        th{
            padding: 10px;
            spacing: 10px;
            text-align:center;
        }
        table{
            border-color:white;
        }
        body{
            background-color:#272727;
            color:white;
        }
        .table-wrap{
            overflow-x:auto;
        }
    </style>
</head>
<body>
    <br><br><br><br>
    <div align=center>
    <h1>Users Management</h1>
    <hr>
    <div class="table-wrap">
        <table cellpadding="10" cellspacing="0" border="2">
            <thead>
                <tr>
                    <th>SL.No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Zipcode</th>
                    <th>Country</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Remove</th>
                </tr>
                <?php
                
                if($result->num_rows > 0){
                    $i=1;
                    while($row=$result->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td align="center"><a href="users.php?delete=1&user_id=<?php echo $row['login_id'];?>"><i class="fa fa-trash" aria-hidden="true" style="color:white;" ></i></a></td>
                </tr>   
                <?php        
                        }
                    }
                ?>
                <tr style="text-align:center;"><td colspan=8><a href="register.php"><input type="button" value=" Add User "></td></a></tr>
            </thead>
        </table>
        </div>
        </div>
        <br><br>
        <?php if($success ==1){
        echo '<div id="msg">Profile Updated!</div>';
        } ?>
    </div>
    </form>
</body>
</html><br><br><br><br><br><br><br><br><br><br>
<?php
include('footer.php');
?>