<?php 
// $language_id=$_SESSION['language_id'];
include('headerfororder.php');
// $language_id = $_REQUEST["id"];
// echo "<br><br>";
// print_r($_SESSION);
$order_status= "pending";
$total=$_SESSION['total'];
$login_id = $_SESSION['login_id'];
$pdtID=explode(',', $_SESSION['pdtID']);
$qty=explode(',',$_SESSION['qty']);
$products = array_combine(array_filter($pdtID), array_filter($qty));


class Order extends Server{  
    public function ordertable($login_id,$products,$total,$pay,$order_status){
        $sql= "INSERT INTO `order` (`login_id`, `total`, `payment_mode`, `order_status`) VALUES ($login_id,$total,'$pay','pending')";
        $this->conn->query($sql) or die($this->conn->error);
        
        $order_id =$this->conn->insert_id;  
        foreach($products as $product=>$keyQty) {
            $sql0= "SELECT price FROM product WHERE product_id=$product";
            $res = $this->conn->query($sql0) or die($this->conn->error);
            $row=$res->fetch_assoc();
            $total=$keyQty*$row['price'];

            $sql= "INSERT INTO order_detail(`order_id`,`product_id`,`quantity`,`total`)
            VALUES('$order_id','$product','$keyQty',$total)";
            $this->conn->query($sql) or die($this->conn->error);

            $id = $this->conn->insert_id;
            $sql1= "UPDATE `product` SET `stock`=`stock`-$keyQty WHERE `product_id`=$product";
            $this->conn->query($sql1) or die($this->conn->error);
            
        }
        return $order_id;  
    }
    public function cartdlt($login_id){
        $sql= "DELETE FROM `cart` WHERE `login_id`='$login_id'";
        $this->conn->query($sql) or die($this->conn->error);
    }
    public function orderid($order_id){
        $sql2= "SELECT * FROM `order` WHERE order_id=$order_id";
        $res = $this->conn->query($sql2) or die($this->conn->error);
        $row=$res->fetch_assoc();
        return $row;
    }
}
if (isset($_POST['submit']))
{
    $payment_mode=$_POST['payment_mode'];
    $obj=new Order;
  $order_id=  $obj->ordertable($login_id,$products,$total,$payment_mode,$order_status);
}
if($_REQUEST['check']==1){
$obj1= new Order;
$obj1->cartdlt($login_id);

// $obj2=new Order;
// $row=$obj2->orderid($order_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br><br><br><br><br><br>
    <div align=center>
        <img src="../images/mscart.jpg" alt="" style="height=80px; width:400px;">
        <h1 style="color:red;"><b><i><?php echo $language[99];?></i></b></h1>
        <h2 style="color:red;"><i> <?php echo $language[100];?>  </i></h2>
        <h3 style="color:blue;"><?php echo $language[101];?></h3>
        <h3 style="color:blue;"><?php echo $language[102];?> <?php echo $order_id?></h3>
        <a href="chome.php"><input type="button" value= " <?php echo $language[103];?> " style="background-color:#A6A1A7;"></a>
    </div>
</body>
<?php 
// $_SESSION["order_id"]=$orderid;
// $_SESSION["quantity"]=$keyQty;
?>
<br><br>
</html>
<?php
include('footer.php')
?>
