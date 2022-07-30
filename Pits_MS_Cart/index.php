<?php
include('db.php');
session_start();
if(!isset($_SESSION["language_id"])){
$_SESSION["language_id"]=1;
}
if (isset($_POST["submit1"]))
{
    // $_SESSION["language_id"]  = $_POST['language_id'];  
    $_SESSION["language_id"]  = 1; 
}
if (isset($_POST["submit2"]))
{
    $_SESSION["language_id"]  = 2; 
}
include('language.php');

class Index extends Server{
  public function products(){ 
    $sql = "SELECT * FROM product";
    $result= $this->conn->query($sql) or die($this->conn->error);
    return $result;
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
$result=$obj->products();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
    <title>MS Shopping Cart</title>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark" style="width:100%";>
  <a class="navbar-brand" href="#"><?php echo $language[0];?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?id=<?php echo $language_id;?>"><?php echo $language[1];?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php"><?php echo $language[97];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php"><?php echo $language[98];?></a>
      </li>
      <li>
      <form action="?" method="post">
      <table>
      <tr>
        <td><li><input class="btn"style="background:#fff;color:#343a40;" type="submit"  name='submit1'  value='<?php echo $language[5];?>'></li></td>
        <td><li><input class="btn mx-1"style="color:#fff;border: #fff solid;
    border-radius: 7px;" type="submit"  name='submit2'  value='<?php echo $language[6];?>'></li></td>
      </tr>
      </table>
      </form>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <img src="images/mscart.jpg" alt="" height=50>
    </form>
  </div>
</nav>
<img style="width: 100%;" src="images/msbanner.jpg" alt="">
<div class="row mx-0 px-0">
<?php
  if($result->num_rows > 0){
    $i=1;
    $obj= new Index;
    while($row=$result->fetch_assoc()){
    $row1=$obj->products1($_SESSION['language_id'],$row['product_id']);

?>
<div class="col-lg-4 col-md-4 col-sm-6 col-xl-3">
    <div class="product">
    <br><br><br><br>
    <?php if ($row["stock"]>0) {?>
      <a href="pdetails.php?user_id=<?php echo $row['product_id'];?>"><img style="height:200px;width:200px;" src="images/<?php echo $row["image"]; ?>" class="img-responsive"></a>
      <h5 class="text-info"><?php echo $row1["product_name"]; ?></h5>
      <h5 class="text-warning">&#x20b9 <?php echo $row["price"]; ?></h5>
      <h5 class="text-success"><?php echo $language[17];?></h5>
    <?php
    }else { ?>
      <img style="height:200px;width:200px;" src="images/<?php echo $row["image"]; ?>" class="img-responsive">
      <h5 class="text-info"><?php echo $row1["product_name"]; ?></h5>
      <h5 class="text-warning">&#x20b9 <?php echo $row["price"]; ?></h5>
      <h5 class="text-danger"><?php echo $language[18];?></h5>
    <?php
    }
    ?> 
    </div>
    </div>
<?php        
    }
  }
?>
</div>
<footer class="footer px-0 mx-0">
  	 <div class="container">
  	 	<div class="row mx-auto"style="text-align:center;">
  	 		<div class="footer-col col-lg-4 col-md-4 col-sm-12 col-xl-4">
  	 			<h4 class="pb-1 mb-1"><?php echo $language[14];?></h4>
           <hr class="my-1 py-0 mb-3 mx-auto" style="background:red;width:50px;">
  	 			<ul>
  	 				<li><a href="https://www.flipkart.com/about-us?otracker=undefined_footer_navlinks"><?php echo $language[9];?></a></li>
  	 				<li><a href="https://www.flipkart.com/helpcentre?otracker=undefined_footer_navlinks"><?php echo $language[10];?></a></li>
  	 				<li><a href="https://www.flipkart.com/pages/privacypolicy?otracker=undefined_footer_navlinks"><?php echo $language[11];?></a></li>
  	 				
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col col-lg-4 col-md-4 col-sm-12 col-xl-4">
  	 			<h4  class="pb-1 mb-1"><?php echo $language[15];?></h4>
           <hr class="my-1 py-0 mb-3 mx-auto" style="background:red;width:50px;">

  	 			<ul>
  	 				<li><a href="https://www.flipkart.com/helpcentre?catalog=55c9c8e2b0000023002c1702&view=CATALOG"><?php echo $language[12];?></a></li>
  	 				<li><a href="https://www.flipkart.com/pages/shipping"><?php echo $language[13];?></a></li>
  	 				<li><a href="https://www.flipkart.com/pages/returnpolicy?otracker=undefined_footer_navlinks"><?php echo $language[14];?></a></li>
  	 				
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col col-lg-4 col-md-4 col-sm-12 col-xl-4">
  	 			<h4 class="pb-1 mb-1"><?php echo $language[16];?></h4>
           <hr class="my-1 py-0 mb-3 mx-auto" style="background:red;width:50px;">

  	 			<div class="social-links">
  	 				<a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
  	 				<a href="https://www.instagram.com/accounts/login/"><i class="fab fa-instagram"></i></a>
  	 				<a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
     </div>
  
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>