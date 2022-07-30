<?php
echo "<br><br>";
include('header.php');
$total = $_SESSION['total'];
$check= 0;
if(isset($_REQUEST['cart_id'])){
if(null !==$_REQUEST['cart_id'] && $_REQUEST['cart_id']==1){
    $check=$_REQUEST['cart_id'];
}
}
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
    <br><br><br><br>
    <div align=center>
        <h1><?php echo $language[82];?></h1><br><br>
        <form action="order.php?check=<?php echo $check;?>&id=<?php echo $language_id; ?>" method="post">
            <table>
                <tr>
                    <td><input type="checkbox" id="payment" name="payment_mode" value="upi" > &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
                    <td><label for="payment1"> <?php echo $language[83];?></label> </td>
                    <td><i class="fa fa-magnet" aria-hidden="true"></i></i></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id="payment" name="payment_mode" value="wallets" ></td>
                    <td><label for="payment2"> <?php echo $language[84];?></label></td>
                    <td><i class="fa fa-gift" aria-hidden="true"></i></i></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id="payment" name="payment_mode" value="card" ></td>
                    <td><label for="payment3"> <?php echo $language[85];?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td><i class="fa fa-credit-card" aria-hidden="true"></i></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id="payment" name="payment_mode" value="netbanking" ></td>
                    <td><label for="payment4"> <?php echo $language[86];?></label></td>
                    <td><i class="fa fa-university" aria-hidden="true"></i></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id="payment" name="payment_mode" value="cash"></td>
                    <td><label for="payment5"> <?php echo $language[87];?></label></td>
                    <td><i class="fa fa-handshake" aria-hidden="true"></i></td>
                </tr>
                <tr>
                    <td><input type="checkbox" id="payment" name="payment_mode" value="emi" ></td>
                    <td><label for="payment6"> <?php echo $language[88];?></label></td>
                    <td><i class="fa fa-ticket" aria-hidden="true"></i></i></td>
                </tr>
            </table><br><br>
            <table>
            <tr>
                <td><input style="background-color:#7D7D7D; text-align:center; width:130px;" type="text" value="<?php echo $language[67];?> : <?php echo $total?> ">
                    <input style="background-color:#A8C4C4; text-align:center; width:130px;" type="submit" name="submit" value="<?php echo $language[89];?>">
                </td>
            </tr>
            </table>
            <!-- <?php// echo $_SESSION['language_id'];?> -->
        </form>
    </div>
</body>
<br><br><br><br><br>
</html>
<?php
include('footer.php');
?>