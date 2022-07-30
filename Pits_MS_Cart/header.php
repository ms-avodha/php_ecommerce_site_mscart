<?php


// if (isset($_POST["submit"]))
// {
//     $_SESSION["language_id"]  = $_POST['language_id'];  
// }
if (isset($_POST["submit1"]))
{
    // $_SESSION["language_id"]  = $_POST['language_id'];  
    $_SESSION["language_id"]  = 1; 
}
if (isset($_POST["submit2"]))
{
    $_SESSION["language_id"]  = 2; 
}
else if(null==$_SESSION["language_id"]){
$_SESSION["language_id"]=1;
}

$language_id = $_SESSION["language_id"];
include('language.php');
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
</body>
</html>