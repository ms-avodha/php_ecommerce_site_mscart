<?php
session_start();
include('db.php');
include('header.php');
?>
<br><br><br><br><br><br>
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
        .align{
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


        #message {
        display:none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 20px;
        margin-top: 10px;
        }

        #message p {
        padding: 10px 35px;
        font-size: 15px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
        color: green;
        }

        .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
        color: red;
        }

        .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
        }
    </style>
</head>
<body>
    <form action="registeraction.php" name="register" id="myform" method="POST">
    <div align=center>
    <h1><?php echo $language[27];?></h1>
    <hr>
        <table>
            <thead>
                <tr>
                    <td class="align"><label for=""><?php echo $language[28];?> <sup style="color:red;">*</sup></label></td>
                    <td id=logo class="align"><input type="text" name="firstname"></td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[29];?> <sup style="color:red;">*</sup></label></td>
                    <td class="align" id=logo><input type="text" name="lastname"></td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[30];?> <sup style="color:red;">*</sup></label></td>
                    <td class="align" id=logo><textarea name="address"  rows="5" style="width:206px;"></textarea></td>
                </tr> 
                <tr>
                    <td class="align"><label for=""><?php echo $language[31];?> <sup style="color:red;">*</sup></label></td>
                    <td class="align" id=logo><input type="text" name="zipcode"></td>
                </tr>                               
                <tr>
                    <td class="align"><label for=""><?php echo $language[32];?> <sup style="color:red;">*</sup></label></td>
                    <td class="align" id=logo><select name="country" style="width:206px;">
                            <option  value=""><?php echo $language[33];?></option>
                            <option ><?php echo $language[91];?></option>
                            <option ><?php echo $language[92];?></option>
                            <option ><?php echo $language[93];?></option>
                            <option ><?php echo $language[94];?></option>
                            <option ><?php echo $language[95];?></option>
                            <option ><?php echo $language[96];?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[34];?> <sup style="color:red;">*</sup></label></td>
                    <td class="align" id=logo><input type="text" name="phone"></td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[35];?> <sup style="color:red;">*</sup></label></td>
                    <td class="align" id=logo ><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[36];?> <sup style="color:red;">*</sup></label></td>
                    <td class="align" id=logo><input type=text name="username" ></td>
                </tr>
                <!-- <tr>
                    <td><label for=""><?php// echo $language[37];?> <sup style="color:red;">*</sup></label></td>
                    <td id=logo><input type="password" name="password" id="mspassword" onkeyup="checkpassword(this.value)"></td>
                </tr> -->
                <tr>
                    <td class="align"><label for=""><?php echo $language[37];?> <sup style="color:red;">*</sup></label></td>
                    <td class="align" id=logo><input type="password" id="mspassword" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                </td>
                </tr>
                <tr>
                    <td class="align"><label for=""><?php echo $language[38];?> <sup style="color:red;">*</sup></label></td>
                    <td class="align" id=logo><input type="password" name="repassword"></td>
                </tr>
                <tr>
                <tr>
                <td colspan=2>
                <div id="message">
                  <h6>Password must contain the following:</h6>
                  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                  <p id="num" class="invalid">A <b>number</b></p>
                  <p id="special" class="invalid">A <b>special character</b></p>
                  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
                </td>
                </tr>
                <tr>
                    <td  colspan="2" class="g-recaptcha" data-sitekey="6LdZk-IfAAAAAKypsWeqpHxRkIPse8wvijx2ITNQ"></td>
                </tr>
                <tr style="text-align:center;">
                    <td class="align" colspan="2"><input type="submit" name="submit" value=" <?php echo $language[45];?> " style="background-color:skyblue;"></td>
                </tr>
            </thead>
        </table>
        <p align=center>
        <?php echo $language[46];?> <a href="login.php"><?php echo $language[2];?></a>
        </p>
    </div>
    </form>
</body>
<script>
var myInput = document.getElementById("mspassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var number = document.getElementById("special");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    num.classList.remove("invalid");
    num.classList.add("valid");
  } else {
    num.classList.remove("valid");
    num.classList.add("invalid");
  }
// Validate special characters
var specialCharacters = /[@,#,$,%,!,&]/g;
  if(myInput.value.match(specialCharacters)) {  
    special.classList.remove("invalid");
    special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  } 
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script src="js/registerjquery.js"></script>
</html>

<?php
include('footer.php');
?>