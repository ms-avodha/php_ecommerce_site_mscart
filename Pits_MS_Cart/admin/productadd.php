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
        .table-wrap{
            overflow-x:auto;
        }
    </style>
</head>
<body>
    <form action="productaddaction.php" name="product" method="POST" enctype="multipart/form-data">
    <div align=center>
    <h1>Add Product</h1>
    <hr>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <td><label for="">Product Image</label></td>
                    <td id=logo><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td><label for="">Product Name (en)</label></td>
                    <td id=logo><input type="text" name="product_name"></td>
                </tr>
                <tr>
                    <td><label for="">Product Name (ge)</label></td>
                    <td id=logo><input type="text" name="product_name1"></td>
                </tr>
                <tr>
                    <td><label for="">Description (en)</label></td>
                    <td id=logo><input type="text" name="description"></td>
                </tr> 
                <tr>
                    <td><label for="">Description (ge)</label></td>
                    <td id=logo><input type="text" name="description1"></td>
                </tr>
                <tr>
                    <td><label for="">Price</label></td>
                    <td id=logo><input type="text" name="price"></td>
                </tr>                               
                <tr>
                    <td><label for="">Stock</label></td>
                    <td id=logo><input type="text" name="stock"></td>
                </tr>
                <tr>
                    <td colspan="2" class="g-recaptcha" data-sitekey="6LdZk-IfAAAAAKypsWeqpHxRkIPse8wvijx2ITNQ"></td>
                </tr>
                <tr style="text-align:center;">
                    <td colspan=2><input type="submit" name="submit" value=" Add Product " style="background-color:skyblue;"></td>
                </tr>
            </thead>
        </table>
    </div>
    </div>
    </form>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
<script src="../js/productjquery.js"></script>
</body>
</html>
<?php
include('footer.php');
?>