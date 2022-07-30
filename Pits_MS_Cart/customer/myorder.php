<?php
include("header.php");
// session_start();
$login_id = $_SESSION['login_id'];
class Orders extends Server{  
    public function orderdata($login_id){   
        $sql = "SELECT * FROM `order` WHERE login_id=$login_id";
        $result= $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }
    public function orderdlt($order_id){
        $sql = "UPDATE `order` SET `delete`='1',`order_status`='cancelled' WHERE `order_id`='$order_id' ";
        // $sql = "DELETE FROM `order` WHERE `order_id`='$order_id' ";
        $this->conn->query($sql) or die($this->conn->error);
    }
}
if(isset($_REQUEST['delete']) && $_REQUEST['delete'] ==1){
    $order_id=$_REQUEST['order_id'];
    $obj1= new Orders;
    $obj1->orderdlt($order_id);  
}

$obj= new Orders;
$result=$obj->orderdata($login_id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Orders</title>
    <style>
        #msg{
            color:green;
            text-align:center;
        }
        .align{
            padding: 10px;
        }
        th{
            padding: 10px;
            spacing: 10px;
            text-align:center;
        }
        .table-wrap{
            overflow-x:auto;
        }
    </style>
</head>
<body>
    <br><br><br><br>
    <div align=center>
    <h1><?php echo $language[72];?></h1>
    <hr>
    <div class="table-wrap">
        <table cellpadding="10" cellspacing="0" border="2">
            <thead>
                <tr>
                    
                    <th><?php echo $language[73];?></th>
                    <th>Order Id</th>
                    <th><?php echo $language[79];?></th>
                    <th><?php echo $language[80];?></th>
                    <th>Order Details</th>
                    <th>Cancel</th>
                </tr>
                <?php
                if($result->num_rows > 0){
                    $i=1;
                     while($row=$result->fetch_assoc()){
                ?>
                <tr>
                    
                    <td class="align" align="center"><?php echo $i++; ?></td>
                    <td class="align" align="center"><?php echo $row['order_id']; ?></td>
                    <td class="align" align="center"><?php echo $row['payment_mode']; ?></td>
                    <td class="align" align="center"><?php echo $row['order_status']?></td>
                    <td class="align" align="center"><a href="myorder_detail.php?id=<?php echo $row['order_id']; ?>&idp=<?php echo $row['payment_mode']; ?> "><i style="color:black;" class="fas fa-folder-open"></i></a></td>
                    <?php if($row['order_status']!='delivered' && $row['order_status']!='cancelled' ){?>
                    <td class="align" align="center"><a href="myorder.php?delete=1&order_id=<?php echo $row['order_id'];?>"><i class="fa fa-trash" aria-hidden="true" style="color:black;" ></i></a></td>
                    <?php
                    }
                    ?>
                </tr>   
                <?php        
                        }
                    }
                ?>
            </thead>
        </table>
        </div>
        </div>
    </div>
    </form>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
<?php
include('footer.php');
?>
