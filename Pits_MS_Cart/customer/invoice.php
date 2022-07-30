<?php
include("header.php");
// session_start();
$order_id = $_REQUEST['id'];
$login_id = $_SESSION['login_id'];
$pay_id = $_REQUEST['idp'];
// $id=$_REQUEST['id'];
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
class Orders extends Server{  
    public function orderdetail($order_id,$language_id){   
        $sql = "SELECT
        `order_detail`.`order_id`,
        `order_detail`.`id`,
        `order_detail`.`total`,
        `order_detail`.`quantity`,
        `order_detail`.`product_id`,
        `product_detail`.`product_name`,
        `product_detail`.`language_id`,
        `product`.`price`,
        `product`.`image`

        FROM `product`
        INNER JOIN `order_detail` ON order_detail.product_id = `product`.product_id
        INNER JOIN `product_detail` ON product_detail.product_id = `product`.product_id
        WHERE `order_detail`.order_id=$order_id AND `product_detail`.`language_id`=$language_id
        ORDER BY `order_detail`.order_id";

        $result= $this->conn->query($sql) or die($this->conn->error);
        return $result;
        
    }
    public function orderdata($order_id){   
        $sql = "SELECT * FROM `order` WHERE order_id=$order_id";
        $result= $this->conn->query($sql) or die($this->conn->error);
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
          }
        return $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
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
        #content{
            
        }
        /* .parent{
        width: 100px;
        height: 100px;
        border: 1px solid red;
        margin-right: 10px;
        float: left;
        } */
        #child {
        float: left;
        margin-left: 40px;
        }
        #child1 {
            margin-left: 5px;
            float: right;
            padding:0 35px;
            margin-right:40px;
            margin-top:20px;
            border:2px solid;
        }
        .empty{
            clear:both;
        }
        .table-wrap{
            overflow-x:auto;
        }
    </style>
</head>
<body>
<div class=parent>
<div class="table-wrap">
    <br><br><br><br>
    <div align=center>
    <h1>INVOICE</h1>
    <hr>
    <div id=child>
        <table cellpadding="10" cellspacing="0" border="2">
            <thead>
                <tr>
                    <th>SL No</th>
                    <th><?php echo $language[74];?></th>
                    <th><?php echo $language[75];?></th>
                    <th><?php echo $language[76];?></th>
                    <th><?php echo $language[77];?></th>
                    <th><?php echo $language[78];?></th>
                    <th><?php echo $language[79];?></th>
                    <th><?php echo $language[80];?></th>
                </tr>
                <?php
                $obj= new Orders;
                $result = $obj->orderdetail($order_id,$language_id);
                if($result->num_rows > 0){
                    $i=1;
                    $obj= new Orders;
                    while($row=$result->fetch_assoc()){ 
                    $row1=$obj->orderdata($order_id);   
                ?>
                <tr>
                    <td class="align" align="center"><?php echo $i++; ?></td>
                    <td class="align"><img style="width:100px;height:100px;" src="../images/<?php echo $row['image']; ?>"></td>
                    <td class="align"><?php echo $row['product_name'] ?></td>
                    <td class="align" align="center"><?php echo $row['price'] ?></td>
                    <td class="align" align="center"><?php echo $row['quantity']; ?></td>
                    <td class="align" align="center"><?php echo $row['total']; ?></td>
                    <td class="align" align="center"><?php echo $pay_id ?></td>
                    <td class="align" align="center"><?php echo $row1['order_status']?></td>
                </tr> 
                 
                <?php        
                        }
                    }
                ?>
                <tr ><td class="align" style=" text-align:center; width:150px;" colspan=8><input type="button" value= " Total: <?php echo $row1['total'];?>"  style=" width:150px;"></td></tr> 
            </thead>
        </table>
        </div>
    <?php
    $obj1=new Studenthome;
    $row=$obj1->home($login_id);
    ?>
    <div id=child1>
    <h3>Shipping Address</h3>
    <table>
            <thead>
                <tr align="left">
                    <th style="text-align:left;">Name </th>
                    <td class="align"><?php echo $row['firstname']." ".$row['lastname']?></td>
                </tr>
                <tr align="left">
                    <th style="text-align:left;">Address  </th>
                    <td class="align"><?php echo $row['address']?></td>
                </tr> 
                <tr align="left">
                    <th style="text-align:left;">Zip code  </th>
                    <td class="align"><?php echo $row['zipcode']?></td>
                </tr>                               
                <tr align="left">
                    <th style="text-align:left;">Country  </th>
                    <td class="align"><?php echo $row['country']?></td>
                </tr>
                <tr align="left">
                    <th style="text-align:left;">Phone  </th>
                    <td class="align"><?php echo $row['phone']?></td>
                </tr>
                <tr align="left">
                    <th style="text-align:left;">Email  </th>
                    <td class="align"><?php echo $row['email']?></td>
                </tr>
            </thead>
        </table>
        </div>
    </div>
</div>
</div>
<div class=empty></div>
<br><br><br><br>
</body>
</html>
<?php
include('footer.php');
?>
