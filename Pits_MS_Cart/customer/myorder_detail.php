<?php
include("header.php");
// session_start();
$order_id = $_REQUEST['id'];
$pay_id = $_REQUEST['idp'];
$id=$_REQUEST['id'];
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
    public function orderdlt1($id){
        $sql = "UPDATE `order_detail` SET `delete`='1' WHERE `id`='$id'";
        // $sql = "DELETE FROM `order_detail` WHERE `id`='$id' ";
        $this->conn->query($sql) or die($this->conn->error);
        header("Location:myorder.php");
    }
}
if(isset($_REQUEST['delete']) && $_REQUEST['delete'] ==1){

    $obj1= new Orders;
    $obj1->orderdlt1($id);  
    
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
                    <th>SL No</th>
                    <th><?php echo $language[74];?></th>
                    <th><?php echo $language[75];?></th>
                    <th><?php echo $language[76];?></th>
                    <th><?php echo $language[77];?></th>
                    <th><?php echo $language[78];?></th>
                    <!-- <th>Cancel</th> -->
                </tr>
                <?php
                $obj= new Orders;
                $result = $obj->orderdetail($order_id,$language_id);
                if($result->num_rows > 0){
                    $i=1;
                    while($row=$result->fetch_assoc()){    
                ?>
                <tr>
                    <td class="align" align="center"><?php echo $i++; ?></td>
                    <td class="align"><img style="width:100px;height:100px;" src="../images/<?php echo $row['image']; ?>"></td>
                    <td class="align"><?php echo $row['product_name'] ?></td>
                    <td class="align" align="center"><?php echo $row['price'] ?></td>
                    <td class="align" align="center"><?php echo $row['quantity']; ?></td>
                    <td class="align" align="center"><?php echo $row['total']; ?></td>
                    <!-- <td align="center"><a href="myorder_detail.php?delete=1&id=<?php// echo $row['id']?>"><i class="fa fa-trash" aria-hidden="true" style="color:black;" ></i></a></td> -->
                </tr> 
                 
                <?php        
                        }
                    }
                ?>
                <tr ><td class="align" style=" text-align:center; width:150px;" colspan=7><a href="invoice.php?id=<?php echo $order_id ?>&idp=<?php echo $pay_id?>"><input type="button" value= " Invoice"  style=" width:150px;"></a></td></tr> 
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
