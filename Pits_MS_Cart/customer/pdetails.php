<?php
include('header.php');
if (isset($_REQUEST['user_id'])){
    $user_id=$_REQUEST['user_id'];
    $_SESSION['user_id']=$user_id;
    $_SESSION['pid']=$user_id;
}
 
 

$login_id = $_SESSION['login_id'];

class Index extends Server{
    public function products($user_id){
        $sql = "SELECT * FROM product WHERE product_id='$user_id'";
        $result= $this->conn->query($sql) or die($this->conn->error);
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
$obj= new Index;
$row=$obj->products($_SESSION['user_id']);
$obj1= new Index;
$row1=$obj1->products1($_SESSION['language_id'],$row['product_id']);
$success = isset($_REQUEST['success']) ? $_REQUEST['success'] : "";
?>
<br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        #msg{
            color:red;
            text-align:center;
        }
    </style>
</head>
<body>
<br>
<?php $_SESSION['stock']=$row['stock'];?>
<form action="cart.php"  method= "POST">
        <div class="product" align=center>
        <br>
        <img style="width:200px;height:200px;" src="../images/<?php echo $row["image"]; ?>" class="img-responsive">
        <h5 class="text-info"><?php echo $row1["product_name"]; ?></h5>
        <div align=center><h5 class=col-5 class= "text-secondary" align=justify><?php echo $row1["description"]; ?></h5></div>
        <h5 class="text-warning">&#x20b9 <?php echo $row["price"]; ?></h5>
        <h5 class="text-success"><?php echo $language[17];?></h5>
        <h5 class= "text-secondary"><?php echo $language[19];?> : <input type="number" style="width:60px; text-align:center;" value="1" style="text-align:center;" name="quantity"></h5>
        <input type="hidden" name="product_id" value=<?php echo $row["product_id"];?>>
        <input type="hidden" name="login_id" value=<?php echo $login_id;?>>
        </tr>
        <tr>
            <td><input type="submit" name="button1" style= " background-color:#8A8685" value=" <?php echo $language[20];?> "></td>
            <td><input type="submit" name="button2" style= " background-color:#D5CFCE" value=" <?php echo $language[21];?> "></a></td>
        </tr>
        <br><br><br>
        <?php if($success ==1){
        echo '<div id="msg">Please select lower quantity!</div>';
        } ?>
        </div>
</form>
</body>
<br><br><br><br>
</html>
<?php
include('footer.php');
?>