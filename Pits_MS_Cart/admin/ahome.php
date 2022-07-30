<?php
include("header.php");
$success = isset($_REQUEST['success']) ? $_REQUEST['success'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:#272727;
        }
        #msg{
            color:white;
            text-align:center;
        }
    </style>
</head>
<body>
    <br><br><br><br>
    <div align=center>
    <?php if($success ==1){
        echo '<div id="msg">Admin Login Success!</div>';
        } ?>
    <img src="../images/mscartfull.jpg" alt="" style="height:450px;">
    </div>
</body>
</html>
<?php
include('footer.php');
?>