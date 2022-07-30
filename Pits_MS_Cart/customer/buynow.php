<?php
include('header.php');
// session_start();
$product_id=$_SESSION['pid'];
$quantity =$_REQUEST['qty'];
if(null!=$quantity){
$_SESSION['quantity']=$quantity;
}
class Index extends Server{
    public function products($product_id){
        $sql = "SELECT * FROM product WHERE product_id='$product_id'";
        $result= $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }
    public function products1($language_id){ 
        $sql = "SELECT * FROM product_detail WHERE language_id=$language_id";
        $res= $this->conn->query($sql) or die($this->conn->error);
        if($res->num_rows > 0){
          $row = $res->fetch_assoc();
        }
        return $row;
      }
}
$obj= new Index;
$result=$obj->products($product_id);
?>
<!DOCTYPE html>
<html lang="en">
<head><br><br><br><br>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Now</title>
    <style>
        #ptd{
            padding: 50px;
            text-align:justify;
        }
        th{
            padding: 5px;
            padding-left:10px;
            text-align:center;
        }
        #ptr{
            border-bottom: 1px solid #ff000d;
            border-top: 1px solid #ff000d;
        }  
        img{
            width:100px;
            height:100px;
        }  
        #ptr.one{
            border-bottom: 1px solid #ff000d;
            border-top: 0px solid #ff000d;
        }
        #ptr.two{
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
    <h1><?php echo $language[20 ];?></h1>
    <br><br>
    <div class="table-wrap">
        <table cellpadding="10" cellspacing="0" border="0">
            <thead>
                <tr id=ptr class=one>
                <th><?php echo $language[59];?></th>
                <th><?php echo $language[60];?></th>
                <th><?php echo $language[61];?></th>
                <th><?php echo $language[62];?></th>
                <th></th>
                <th><?php echo $language[63];?></th>
                <th><?php echo $language[67];?></th>
                </tr>
                <?php
                
                if($result->num_rows > 0){
                    $i=1;
                    $total=0;
                    $qty="";
                    $pdtID="";
                    $obj1= new Index;
                    while($row=$result->fetch_assoc()){
                    $row1=$obj1->products1($_SESSION['language_id']);
                ?>
                <tr id=ptr>
                    <td id=ptd><?php echo $i++; ?></td>
                    <td id=ptd><img src="../images/<?php echo $row["image"]; ?>" class="img-responsive"></td>
                    <td id=ptd><?php echo $row1["product_name"]; ?></td>
                    <td id=ptd><?php echo $row['price']; ?></td>
                    <td id=ptd>X</td>
                    <td id=ptd><?php echo $_SESSION['quantity']; ?></td>
                    <td id=ptd style="text-align:center;"><?php echo $row['price']*$_SESSION['quantity']; ?></td>

                </tr>   
                <?php  
                $total1= $row['price']*$_SESSION['quantity'];
                $total = $total+($row['price']*$quantity);  
                $_SESSION['total']= $total;
                // $_SESSION['quantity']=$quantity;
                $_SESSION['product_id']  = $product_id;
                $qty .= $quantity.",";
                $pdtID .= $row['product_id'].",";
                // echo $quantity; die;
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
                    <td><a href="shipping.php?id=0"><input type="button" value= " <?php echo $language[66];?> " style="background-color:#D7B2B8;width:265px;"></a><br>
                        <input style="background-color:#7D7D7D; text-align:center; width:130px;" type="text" value="<?php echo $language[67];?> : <?php echo $total1?> ">
                    <a href="checkout.php"><input style="background-color:#A8C4C4; text-align:center; width:130px;" type="button" value="<?php echo $language[68];?>"></a></td>
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