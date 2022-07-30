<?php
include("header.php");
?>
<br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        td{
            padding:10px;
            spacing:10px;
        }
        #logo .error{
            color:red;
            margin-left: 10px;
        }
        #pass{
            color:red;
            font-size:12px;
        }
        #captcha{
            padding:10px;
        }
        body{
            background-color:#272727;
            color:white;
        }
    </style>
</head>
<body>
    <form action="registeraction.php" name="register" method="POST">
    <div align=center>
    <h1>Add User</h1>
    <hr>
        <table>
            <thead>
                <tr>
                    <td><label for="">FirstName</label></td>
                    <td id=logo><input type="text" name="firstname"></td>
                </tr>
                <tr>
                    <td><label for="">LastName</label></td>
                    <td id=logo><input type="text" name="lastname"></td>
                </tr>
                <tr>
                    <td><label for="">Address</label></td>
                    <td id=logo><textarea name="address"  rows="5" style="width:206px;"></textarea></td>
                </tr> 
                <tr>
                    <td><label for="">Zip Code</label></td>
                    <td id=logo><input type="text" name="zipcode"></td>
                </tr>                               
                <tr>
                    <td><label for="">Country</label></td>
                    <td id=logo><select name="country" style="width:206px;">
                            <option  value="">-------SELECT-------</option>
                            <option >USA</option>
                            <option >IND</option>
                            <option >CANADA</option>
                            <option >GERMANY</option>
                            <option >UAE</option>
                            <option >CHINA</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="">Phone</label></td>
                    <td id=logo><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td><label for="">Email</label></td>
                    <td id=logo ><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td><label for="">UserName</label></td>
                    <td id=logo><input type=text name="username" ></td>
                </tr>
                <tr>
                    <td><label for="">Password</label></td>
                    <td id=logo><input type="password" name="password" id="mspassword" onkeyup="checkpassword(this.value)"></td>
                </tr>
                <tr>
                    <td><label for="">Repeat Password</label></td>
                    <td id=logo><input type="password" name="repassword"></td>
                </tr>
                <div >
                    <tr id=pass>
                        <td style="text-align:center;"><label class="password-check">Atleast 8 Digits</label></td>
                        <td style="text-align:center;"><label class="password-check">Atleast a Numeric</label></td>
                    </tr>
                    <tr id=pass>
                        <td style="text-align:right"><label class="password-check">Atleast a Uppercase</label></td>
                        <td style="text-align:center"><label class="password-check">Atleast a Lowercase</label></td>
                    </tr>
                    <tr id=pass style="text-align:center"><td colspan="2"><label class="password-check">Atleast a Special Character</label></td></tr>
                </div>
                <tr>
                    <td colspan="2" class="g-recaptcha" data-sitekey="6LdZk-IfAAAAAKypsWeqpHxRkIPse8wvijx2ITNQ"></td>
                </tr>
                <tr style="text-align:center;">
                    <td colspan="2"><input type="submit" name="submit" value=" Add User " style="background-color:skyblue;"></td>
                </tr>
            </thead>
        </table>
    </div>
    </form>
</body>
<script>
    function checkpassword(data){
    var passClass = document.getElementsByClassName('password-check');

    const lowerCase = new RegExp('(?=.*[a-z])');
    const upperCase = new RegExp('(?=.*[A-Z])');
    const number = new RegExp('(?=.*[0-9])');
    const specialChar = new RegExp('(?=.*[!@#\$%\^&\*}])');
    const eightChar = new RegExp('(?=.{8,})');


    if(eightChar.test(data)){
        passClass[0].style.color = "green";
    }
    if(lowerCase.test(data)){
      passClass[3].style.color = "green";
    }
    if(upperCase.test(data)){
      passClass[2].style.color = "green";
    }
    if(number.test(data)){
      passClass[1].style.color = "green";
    }
    if(specialChar.test(data)){
      passClass[4].style.color = "green";
    }
  }
</script>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/registerjquery.js"></script>
</html>
<?php
include('footer.php');
?>