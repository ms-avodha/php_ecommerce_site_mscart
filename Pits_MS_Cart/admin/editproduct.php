<?php
include("header.php");
$product_id=$_REQUEST['product_id'];
class Adminedit extends Server{ 
    public function editpro($product_id){
    $_SESSION['id']=$product_id;

    $sql = "SELECT * FROM product WHERE product_id='$product_id'";
    $result = $this->conn->query($sql);
    if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    }
    return $row;
    }
    public function products1($language_id,$product_id){ 
        $sql = "SELECT * FROM product_detail WHERE language_id=$language_id AND product_id=$product_id";
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
$obj=new Adminedit;
$row=$obj->editpro($product_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Products</title>
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
<br><br><br><br><br><br>
    <div align=center>
    <form action="editproaction.php?id=<?php echo $row['product_id']; ?>" method='POST'>
    <h1>Product Edit&Updates</h1>
    <hr>
    <div class="table-wrap">
        <table cellpadding="10" cellspacing="0" border="">
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
                    <th>Update</th>
                </tr>
                <?php
                    $i=1;
                    $obj1= new Adminedit;
                    $row1=$obj1->products1(1,$product_id);
                    $row2=$obj1->products1(2,$product_id);
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <!-- <td><input type="file" value="../images/<?php// echo $row['image']; ?>"></td> -->
                    <td><img src="../images/<?php echo $row['image']; ?>" alt="" style="height:50px; width:50px;" name="image"></td>
                    <td><input type="text" value ="<?php echo $row1['product_name'] ?>" name="product_name"></td>
                    <td><input type="text" value ="<?php echo $row2['product_name'] ?>" name="product_name1"></td>
                    <td><input type="text" value="<?php echo $row1['description']; ?>" name="description"></td>
                    <td><input type="text" value="<?php echo $row2['description']; ?>" name="description1"></td>
                    <td><input type="text" value="<?php echo $row['price']; ?>" style="text-align:center;" name="price"></td>
                    <td><input type="number" value="<?php echo $row['stock']; ?>"  style="text-align:center;" name="stock"></td>
                    <td><button type="submit" name="submit" style="background-color:green; align:center;"><i class="fa fa-refresh" aria-hidden="true"></i></button></td>
                </tr>   
            </thead>
        </table>
    </div>
        <br><br>
        </div>
        <div align=center>
            
        </div>
    </form>
    <br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>
<?php
include('footer.php');
?>