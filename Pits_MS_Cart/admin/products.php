<?php
include("header.php");
session_start();
// $product_id=$_REQUEST['product_id'];
class Admin extends Server{ 
    public function products($product_id){
        // $sql = "DELETE FROM product WHERE product_id='$product_id'";
        $sql = "UPDATE `product` SET `delete`='1' WHERE `product_id`='$product_id'";
        $this->conn->query($sql) or die($this->conn->error);
    }
    public function productdata(){
        $sql = "SELECT * FROM product";
        $result= $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }
    public function products1($language_id,$product_id){ 
        $sql = "SELECT * FROM `product_detail` WHERE `product_id`='$product_id' AND language_id=$language_id";
        $res= $this->conn->query($sql) or die($this->conn->error);
        if($res->num_rows > 0){
          $row = $res->fetch_assoc();
        }
        return $row;
      }
}
$_SESSION["language_id"]=1;
if (isset($_POST["submit"]))
{
  $_SESSION["language_id"]  = $_POST['language_id'];  
}
$success = isset($_REQUEST['success']) ? $_REQUEST['success'] : "";
if(isset($_REQUEST['delete']) && $_REQUEST['delete'] ==1){
    $product_id=$_REQUEST['product_id'];
    $obj1= new Admin;
    $obj1->products($product_id);  
}
$obj= new Admin;
$result=$obj->productdata();



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
            margin-left:10px;
            margin-right:15px;
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
    <h1>Products Management</h1>
    <hr>
    <div class="table-wrap">
        <table cellpadding="10" cellspacing="1" border="1">
            <thead>
                <tr>
                    <th>SL.No</th>
                    <th>Product Image</th>
                    <th>Product Name (en)</th>
                    <th>Product Name (ge)</th>
                    <th>Description (en)</th>
                    <th>Description (ge)</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                if($result->num_rows > 0){
                    $i=1;
                    $obj1= new Admin;
                    while($row=$result->fetch_assoc()){
                    $row1=$obj1->products1(1,$row['product_id']);
                    $row2=$obj1->products1(2,$row['product_id'])
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><img src="../images/<?php echo $row['image']; ?>" alt="" style="height:100px; width:100px;"></td>
                    <td><?php echo $row1['product_name'] ?></td>
                    <td><?php echo $row2['product_name'] ?></td>
                    <td><?php echo $row1['description']; ?></td>
                    <td><?php echo $row2['description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td align="center"><a href="editproduct.php?product_id=<?php echo $row['product_id']; ?>"><i class="fas fa-edit" style="color:white;" ></i></a></td>
                    <td align="center"><a href="products.php?delete=1&product_id=<?php echo $row['product_id'];?>"><i class="fa fa-trash" aria-hidden="true" style="color:white;" ></i></a></td>
                </tr>   
                <?php        
                        }
                    }
                ?>
                <tr style="text-align:center;"><td colspan=10><a href="productadd.php"><input type="button" value="  Add Product  "></td></a></tr>
            </thead>
        </table>
        </div>
        </div>
        <br><br>
        <?php if($success ==1){
        echo '<div id="msg">Product Updated!</div>';
        } ?>
    </div>
    </form>
    <br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
<?php
include('footer.php');
?>