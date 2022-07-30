<?php
session_start();
$product_id = $_REQUEST['id'];
require('../db.php');
class Updatepro extends Server{
    public function updateaction($price,$stock,$product_id){
        $sql="UPDATE `product` SET `price`='$price',`stock`='$stock' WHERE `product_id`='$product_id'";
        $this->conn->query($sql) or die($this->conn->error);
        header('Location:products.php?success=1');
    }
    public function updateaction1($product_name,$description,$product_id,$language_id){
        $sql="UPDATE `product_detail` SET `product_name`='$product_name',`description`='$description' WHERE product_id=$product_id AND language_id=$language_id";
        $this->conn->query($sql) or die($this->conn->error);
        header('Location:products.php?success=1');
    }
    }
if (isset($_POST["submit"])=='Update'){
    $product_name= $_POST['product_name'];
    // $image= $_POST['image'];
    $description= $_POST['description'];
    $product_name1= $_POST['product_name1'];
    $description1= $_POST['description1'];
    $price= $_POST['price'];
    $stock= $_POST['stock'];
    $obj=new Updatepro;
$obj->updateaction($price,$stock,$product_id);
$obj=new Updatepro;
$obj->updateaction1($product_name,$description,$product_id,1);
$obj->updateaction1($product_name1,$description1,$product_id,2);
}    
?>