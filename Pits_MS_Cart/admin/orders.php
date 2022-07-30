<?php
include("header.php");
session_start();
// $product_id=$_SESSION['product_id'];
class Orders extends Server{  
    public function orderdata(){   
        $sql = "SELECT register.firstname,
        register.lastname,
        register.login_id,
        `order`.order_id,
        `order`.total,
        `order`.payment_mode,
        `order`.order_status
        FROM `order`
        INNER JOIN register ON register.login_id = `order`.login_id
        ORDER BY `order`.order_id";

        $result= $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }
    
    public function orderdlt($order_id){
        $sql = "DELETE FROM `order` WHERE `order_id`='$order_id'";
        $this->conn->query($sql) or die($this->conn->error);
    }
    public function statusupdate($order_id,$order_status){
        $sql= "UPDATE `order` SET order_status='$order_status' WHERE order_id=$order_id";
        $this->conn->query($sql) or die($this->conn->error);
        header("Location: orders.php");
    }
    // public function products1($product_id){ 
    //     $sql = "SELECT * FROM product_detail WHERE `product_id`='$product_id'";
    //     $res= $this->conn->query($sql) or die($this->conn->error);
    //     if($res->num_rows > 0){
    //       $row = $res->fetch_assoc();
    //   }
    //   return $row;
    // }
}
if(isset($_REQUEST['delete']) && $_REQUEST['delete'] ==1){
    $order_id=$_REQUEST['order_id'];
    $obj1= new Orders;
    $obj1->orderdlt($order_id);  
}

if(isset($_POST['submit'])){
    $order_status=$_POST['order_status'];
    $obj= new Orders;
    $obj->statusupdate($_REQUEST['order_id'],$order_status);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
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
    <h1>Order Management</h1>
    <hr>
    <div class="table-wrap">
        <table cellpadding="10" cellspacing="0" border="2">
            <thead>
                <tr>
                    <th>SL.No</th>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Invoice</th>
                    <th>Payment Mode</th>
                    <th>Order Status</th>
                    <!-- <th>Cancel</th> -->
                </tr>
                <?php
                $obj= new Orders;
                $result=$obj->orderdata();
                if($result->num_rows > 0){
                    $i=1;
                    // $obj1= new Orders;
                    
                    while($row=$result->fetch_assoc()){
                    // $row1=$obj1->products1($row['product_id']);
                    
                ?>
                <tr>
                    <td align="center"><?php echo $i++; ?></td>
                    <td align="center"><?php echo $row['order_id'] ?></td>
                    <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                    <td align="center"><a href="invoice.php?pid=<?php echo $row['payment_mode'];?>&id=<?php echo $row['order_id']; ?>&login=<?php echo $row['login_id']; ?>"><i style="color:white;" class="fas fa-folder-open"></i></a></td>
                    <td align="center"><?php echo $row['payment_mode']; ?></td>
                    <form action="?order_id=<?php echo $row['order_id']?>" method="post">
                    <td align="center"><select name="order_status" style="width:206px;">
                            <option  value="" align="center"><?php echo $row['order_status']?></option>
                            <option align="center" value="accepted">Accepted</option>
                            <option align="center" value="rejected">Rejected</option>
                            <option align="center" value="shipped">Shipped</option>
                            <option align="center" value="delivered">Deliverd</option>
                        </select>
                        <input type="submit" name="submit" value=" Confirm ">
                    </td>
                    </form>
                    <!-- <td align="center"><a href="orders.php?delete=1&order_id=<?php// echo $row['order_id'];?>"><i class="fa fa-trash" aria-hidden="true" style="color:white;" ></i></a></td> -->
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
