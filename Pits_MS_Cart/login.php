<?php
session_start();
include('db.php');
include('header.php');  
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
$success = isset($_REQUEST['success']) ? $_REQUEST['success'] : "";
?>
<br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* td{
            padding:10px;
            spacing:10px;
        } */
        #msg{
            color:green;
            text-align:center;
        }
    </style>
</head>
<body>
<form action="loginaction.php" method="POST">
    <div align=center><br>
    <h1><?php echo $language[22];?></h1>
    <hr>
        <table> 
            <thead>
                <tr >
                    <td style="padding:10px;spacing:10px;"><label for=""><?php echo $language[23];?></label></td>
                    <td style="padding:10px;spacing:10px;"><input type=text name="username" ></td>
                </tr>
                <tr>
                    <td style="padding:10px;spacing:10px;"><label for=""><?php echo $language[24];?></label></td>
                    <td style="padding:10px;spacing:10px;"><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td style="text-align:center;padding:10px;spacing:10px;" colspan=2><input type="submit" name="submit" value=" <?php echo $language[25];?> "></td>
                </tr>
            </thead>
        </table>
        <?php if($id ==1){
        echo '<div style="color:red;"><?php echo $language[104];?></div>';
        } ?> <br>
        <p align=center>
        <?php echo $language[26];?> <a href="register.php"><?php echo $language[3];?></a>
        </p>
        <br><br>
        <?php if($success ==1){
        echo '<div id="msg">Registration Success!</div>';
        } ?>
    </div>
    </form>       
</body>
<br><br><br><br><br><br><br>
</html>
<?php
include('footer.php');
?>