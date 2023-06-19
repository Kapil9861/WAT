<?php
//Make connection to database
include_once("connection.php");
if(isset($_POST['Asubmit'])){
    header( 'Location: crud.php' ) ;
}
//Gather data sent from amendProducts.php page
if(isset($_POST['hideProductID']) && isset($_POST['UProductName']) && isset($_POST['UProductPrice']) && isset($_POST['UProductImageName'])){
    $id=$_POST['hideProductID'];
    $name=$_POST['UProductName'];
    $price=$_POST['UProductPrice'];
    $Iname=$_POST['UProductImageName'];
//Produce an update query to update product record for the id provided
$sql="UPDATE products set ProductName='$name', ProductPrice='$price',ProductImageName='$Iname' where ProductID='$id'";
//run query 
$query=mysqli_query($connection,$sql) or die(mysqli_error($connection));
}
//Redirect to crud.php page
?>
