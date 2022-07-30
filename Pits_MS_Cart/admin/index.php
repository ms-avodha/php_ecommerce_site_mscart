<?php
include('../db.php');
$success = isset($_REQUEST['success']) ? $_REQUEST['success'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Admin</title>
    <style>
        td{
            padding:10px;
            spacing:10px;
        }
        body{
            background-color:#272727;
            color:white;
        }
    </style>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Welcome...</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href=""><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <img src="../images/mscart.jpg" alt="" style="height:50px;">
    </form>
  </div>
</nav>
<form action="loginaction.php" method="POST">
    <br><br><br><br>
    <div align=center>
    <h1>User Login</h1>
    <hr>
        <table style="cellpadding:10;cellspacing:10"> 
            <thead>
                <tr>
                    <td><label for="">UserName</label></td>
                    <td><input type=text name="username" ></td>
                </tr>
                <tr>
                    <td><label for="">Password</label></td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr align=center>
                    <td colspan=2><input type="submit" name="submit" value=" Login "></td>
                </tr>
            </thead>
        </table>
        <?php if($success ==1){
        echo '<div style="color:red;">Username or Password Mismatch !</div>';
        } ?>
    </div>
    </form>
    <br><br><br><br><br><br><br><br><br><br>
    <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>company</h4>
  	 			<ul>
  	 				<li><a href="https://www.flipkart.com/about-us?otracker=undefined_footer_navlinkss">about us</a></li>
  	 				<li><a href="https://www.flipkart.com/helpcentre?otracker=undefined_footer_navlinks">our services</a></li>
  	 				<li><a href="https://www.flipkart.com/pages/privacypolicy?otracker=undefined_footer_navlinks">privacy policy</a></li>
  	 				
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="https://www.flipkart.com/helpcentre?catalog=55c9c8e2b0000023002c1702&view=CATALOG">FAQ</a></li>
  	 				<li><a href="https://www.flipkart.com/pages/shipping">shipping</a></li>
  	 				<li><a href="https://www.flipkart.com/pages/returnpolicy?otracker=undefined_footer_navlinks">returns</a></li>
  	 				
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
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