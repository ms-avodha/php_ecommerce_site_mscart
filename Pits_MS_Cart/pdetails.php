<?php
session_start();
include('db.php');
include('header.php');
if (isset($_REQUEST['user_id'])){
$user_id=$_REQUEST['user_id'];
$_SESSION['user_id']=$user_id;}
$language_id = $_SESSION["language_id"];
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
          $row1 = $res->fetch_assoc();
      }
      return $row1;
}
}

$obj= new Index;
$row=$obj->products($_SESSION['user_id']);
$obj1= new Index;
$row1=$obj1->products1($_SESSION['language_id'],$row['product_id']);
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
<br>
    <form action="pdetailaction.php" method='post'>
        <div class="product" align=center >
        <br><br>
        <img style="height:200px;width:200px;" src="images/<?php echo $row["image"]; ?>" class="img-responsive">
        <h5 class="text-info"><?php echo $row1["product_name"]; ?></h5>
        <div align=center><h5 class=col-5 class= "text-secondary" align=justify><?php echo $row1["description"]; ?></h5></div>
        <h5 class="text-warning">&#x20b9 <?php echo $row["price"]; ?></h5>
        <h5 class="text-success"><?php echo $language[17];?></h5>
        <h5 class= "text-secondary"><?php echo $language[19];?> : <input type="number" style="width:60px; text-align:center;" value="1" style="text-align:center;" name="quantity"></h5>
        <!-- <input type="hidden" name="user_id" value=<?php echo $user_id;?>> -->
        </tr>
        <tr>
            <td><a href="pdetailaction.php"><input type="button" name="button1" style= " background-color:#8A8685" value=" <?php echo $language[20];?> "></a></td>
            <td><input type="submit" name="button2" style= " background-color:#D5CFCE" value=" <?php echo $language[21];?> "></a></td>
        </tr>
        </div>
    </form>
</body>
<br><br><br><br>
</html>
<?php
include('footer.php');
?>