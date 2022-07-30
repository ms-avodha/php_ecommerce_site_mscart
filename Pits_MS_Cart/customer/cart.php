<br><br><br><br>
<?php
include('header.php');
$login_id = $_SESSION['login_id'];
if(isset($_SESSION['stock'])){
$stock=$_SESSION['stock']; 
 unset($_SESSION['stock']);
}
class Cart extends Server{  
    public function addtocart($login_id,$product_id,$quantity ){  
        $sql= "INSERT INTO cart(login_id,product_id,quantity)
        VALUES($login_id,$product_id,$quantity) ";
        $this->conn->query($sql) or die($this->conn->error);
        header('Location: cart.php');
    }

    public function manage($login_id){   
        $sql = "SELECT `product`.`product_id`,`product`.`image`, `product`.`price`, `cart`.`quantity`,`cart`.`cart_id`
        FROM `product`
        INNER JOIN `cart` ON `cart`.`product_id` = `product`.`product_id`
        WHERE `cart`.`login_id` = $login_id
        ORDER BY `product`.product_id";

        $result= $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }
    public function products1($language_id,$product_id){ 
        $sql = "SELECT * FROM product_detail WHERE language_id=$language_id AND `product_id`='$product_id'";
        $res= $this->conn->query($sql) or die($this->conn->error);
        if($res->num_rows > 0){
          $row = $res->fetch_assoc();
      }
      return $row;
    }
    public function delete($cart_id){
         $sql = "DELETE FROM cart WHERE cart_id='$cart_id'";
        $this->conn->query($sql) or die($this->conn->error);
    }
    
}
if (isset($_POST['button2']))
{
    $quantity= $_POST['quantity'];
    if($quantity<=$stock){
    $login_id=$_POST['login_id'];
    $product_id=$_POST['product_id'];
    $obj=new Cart;
    $obj->addtocart($login_id,$product_id,$quantity);
    }
    else{
        header('Location:pdetails.php?success=1');
    }
}

if (isset($_POST['button1']))
{
    $quantity= $_POST['quantity'];
    if($quantity<=$stock){
    header("Location: buynow.php?qty=$quantity");
    }
    else{
        header('Location:pdetails.php?success=1');
    }

}

if(isset($_REQUEST['delete']) && $_REQUEST['delete'] ==1){
    $cart_id=$_REQUEST['del'];
    $obj1= new Cart;
    $obj1->delete($cart_id);  
}

$obj= new Cart;
$result=$obj->manage($login_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <style>
        #ctd{
            padding: 50px;
            text-align:justify;
        }
        th{
            padding: 5px;
            padding-left:10px;
            text-align:center;
        }
        #ctr{
            border-bottom: 1px solid #ff000d;
            border-top: 1px solid #ff000d;
        }  
        img{
            width:100px;
            height:100px;
        }  
        #ctr.one{
            border-bottom: 1px solid #ff000d;
            border-top: 0px solid #ff000d;
        }
        #ctr.two{
            border-bottom: 0px solid #ff000d;
            border-top: 1px solid #ff000d;
        }
        .table-wrap{
            overflow-x:auto;
        }
    </style>
</head>
<body>
<div align=center>
    <h1><?php echo $language[58];?></h1>
    <br><br>
    <div class="table-wrap">
        <table cellpadding="10" cellspacing="0" border="0">
            <thead>
                <tr id=ctr class=one>
                    <th><?php echo $language[59];?></th>
                    <th><?php echo $language[60];?></th>
                    <th><?php echo $language[61];?></th>
                    <th><?php echo $language[62];?></th>
                    <th></th>
                    <th><?php echo $language[63];?></th>
                    <th><?php echo $language[67];?></th>
                    <th><?php echo $language[65];?></th>
                </tr>
                <?php
                 $total=0;
                if($result->num_rows > 0){
                    $i=1;
                    $total=0;
                    $qty="";
                    $pdtID="";
                    $obj1= new Cart;
                    while($row=$result->fetch_assoc()){
                    $row1=$obj1->products1($_SESSION['language_id'],$row['product_id']);
                        
                ?>
                <tr id=ctr>
                    <td id=ctd><?php echo $i++; ?></td>
                    <td id=ctd><img src="../images/<?php echo $row['image']; ?>" ></td>
                    <td id=ctd><?php echo $row1['product_name']; ?></td>
                    <td id=ctd><?php echo $row['price']; ?></td>
                    <td id=ctd>X</td>
                    <td id=ctd><?php echo $row['quantity']; ?></td>
                    <td id=ctd style="text-align:center;"><?php echo $row['price']*$row['quantity']; ?></td>
                    <td id=ctd><a href="cart.php?delete=1&del=<?php echo $row['cart_id'];?>"><button type="button" class="btn btn-delete"><i  class="fa fa-trash" aria-hidden="true"></i></button></a></td>
                </tr>   
                    <?php  
                    $total = $total+($row['price']*$row['quantity']);  
                    $_SESSION['total']=$total;
                    
                    $qty .= $row['quantity'].",";
                    $pdtID .= $row['product_id'].",";
                    
                    $_SESSION['qty']= $qty;
                    $_SESSION ['pdtID']=$pdtID;
                
                    } 
                }
                ?>
                <tr class= two>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="shipping.php?id=1"><input type="button" value= " <?php echo $language[66];?> " style="background-color:#D7B2B8;width:265px;"></a><br>
                        <input style="background-color:#7D7D7D; text-align:center; width:130px;" type="text" value=" <?php echo $language[67];?> : <?php echo $total?> "> 
                        <a href="checkout.php?cart_id=1&pdtId=<?php echo $pdtID;?>&qty=<?php echo $qty; ?> ">
                        <input style="background-color:#A8C4C4; text-align:center; width:130px;" type="button" value="<?php echo $language[68];?>"></a> <br>
                        <a href="chome.php"><input type="button" value= " <?php echo $language[69];?> " style="background-color:#A6A1A7;width:265px;"></a>
                    </td>
                </tr>   
            </thead>
        </table>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
</body>
</html>
<?php
include('footer.php');
?>