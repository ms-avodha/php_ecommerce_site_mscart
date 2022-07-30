<?php
require('../db.php');
?>
<html><br><br><br><br><br><br></html>
<?php
class Product extends Server{  
    public function register($image,$price,$stock,$product_name,$description,$description1,$product_name1){  
        $sql= "INSERT INTO product(`image`,price,stock)
        VALUES('$image','$price','$stock')";
        $this->conn->query($sql) or die($this->conn->error);

        $product_id =$this->conn->insert_id;

        $sql= "INSERT INTO product_detail(product_id,product_name,`description`,`language_id`)
        VALUES('$product_id','$product_name','$description',1)";
        $this->conn->query($sql) or die($this->conn->error);

        $sql= "INSERT INTO product_detail(product_id,product_name,`description`,`language_id`)
        VALUES('$product_id','$product_name1','$description1',2)";
        $this->conn->query($sql) or die($this->conn->error);
        echo "Product Registration success";
        header("Location: products.php");
}
}
if (isset($_POST["submit"]) && $_POST['g-recaptcha-response'] != "")
{
    $file = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];
    $tempFile = $_FILES['image']['tmp_name'];
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');

    if(in_array($fileActualExt, $allowed)){
      if($fileError === 0){
            $fileDestination = '../images/'.$fileName;
            move_uploaded_file($tempFile,$fileDestination);
            $secret = '6LdZk-IfAAAAALCDJGUVhdVuvgC7U9VZha4hOxvn';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                $image= $fileName;
                $product_name= $_POST['product_name'];
                $product_name1= $_POST['product_name1'];
                $description= $_POST['description'];
                $description1= $_POST['description1'];
                $price= $_POST['price'];
                $stock= $_POST['stock'];
                $obj=new Product;
                $obj->register($fileName,$price,$stock,$product_name,$description,$description1,$product_name1);
            }
        }
    else{
        echo '<script>alert("There was an error uploading in your file")</script>';
    }
}
else{
    echo '<script>alert("You cannot upload this file type, Try jpg,jpeg,png types")</script>';
}  
}
else{
    header('Location:productadd.php');
}

?>