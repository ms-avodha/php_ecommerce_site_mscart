<?php
session_start();
$login_id=$_SESSION['login_id'];
include('header.php');
class Studentedit extends Server{ 
    public function edit($login_id){
$sql = "SELECT * FROM register WHERE login_id='$login_id'";
$res = $this->conn->query($sql);
if($res->num_rows > 0){
    $row = $res->fetch_assoc();
    }
    return $row;
    }
}
$obj=new Studentedit;
$row=$obj->edit($login_id);
$country =$row['country'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <style>
        #msg{
            color:green;
            text-align:center;
        }
        .align{
            padding:10px;
            spacing:10px;
        }
    </style>
</head>
<body>
    <form action="customereditaction.php" method="POST">
    <div align=center>
    <br><br><br><br>
    <h1><?php echo $language[56];?></h1>
    <hr>
    <table cellpadding="10" cellspacing="10">
            <thead>
                <tr>
                    <td class="align"><label for=""><?php echo $language[28];?></label></td>
                    <td class="align"><input type="text" name="firstname" value="<?php echo $row['firstname']?>"></td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[29];?></label></td>
                    <td class="align"><input type="text" name="lastname" value="<?php echo $row['lastname']?>"></td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[30];?></label></td>
                    <td class="align"><textarea name="address"  rows="5"><?php echo $row['address']?></textarea></td>
                </tr> 
                <tr>
                    <td class="align"><label for=""><?php echo $language[31];?></label ></td>
                    <td class="align"><input type="number" name="zipcode" value="<?php echo $row['zipcode']?>"></td>
                </tr>                               
                <tr>
                    <td class="align"><label for=""><?php echo $language[32];?></label></td>
                    <td class="align"><select name="country">
                            <option value=""><?php echo $language[33];?></option>
                            <option <?php echo $country=='USA'? 'selected':''?>><?php echo $language[91];?></option>
                            <option <?php echo $country=='IND'? 'selected':''?>><?php echo $language[92];?></option>
                            <option <?php echo $country=='CANADA'? 'selected':''?>><?php echo $language[93];?></option>
                            <option <?php echo $country=='GERMANY'? 'selected':''?>><?php echo $language[94];?></option>
                            <option <?php echo $country=='UAE'? 'selected':''?>><?php echo $language[95];?></option>
                            <option <?php echo $country=='CHINA'? 'selected':''?>><?php echo $language[96];?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[34];?></label></td>
                    <td class="align"><input type="text" name="phone"  value="<?php echo $row['phone']?>"></td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[35];?></label></td>
                    <td class="align"><input type="email" name="email"  value="<?php echo $row['email']?>"></td>
                </tr>
                <tr style="text-align:center; color:skyblue;">
                    <td class="align" colspan=2><input type="submit" name="submit" value=" <?php echo $language[57];?> " style="background-color:skyblue;"></td>
                </tr>
            </thead>
        </table>
    </div>
    </form>
</body>
</html>
<?php
include('footer.php');
?>