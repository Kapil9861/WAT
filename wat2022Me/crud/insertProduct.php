<?php

include_once("connection.php");
if(isset($_POST['submit'])){
    if($_POST['ProductName']&&$_POST['ProductPrice']&&$_POST['ProductImageName']){
        $pname=trim($_POST['ProductName']);
        $Vpname=filter_var($pname,FILTER_SANITIZE_STRING);
        $price=$_POST['ProductPrice'];
        $Vprice=filter_var($price,FILTER_SANITIZE_NUMBER_FLOAT);
        $Pimage=trim($_POST['ProductImageName']);
        $sql="INSERT INTO products(ProductName,ProductPrice,ProductImageName)
        VALUES ('$Vpname','$Vprice','$Pimage')";
        $query=mysqli_query($connection,$sql) or die(mysqli_error($connection));
        if($query){
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }else{
            echo "Query not successful";
            header("Location: {$_SERVER['HTTP_REFERER']}");
        }
    }else{
        echo "Please complete all fields.";
    }
}
?>