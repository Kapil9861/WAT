<?php
//Make connection to database
include_once("connection.php");
//Gather id sent from crud.php page
$id=$_GET['id'];
//Produce query to select the product record for the id provided
$sql="SELECT * FROM products WHERE ProductID=$id";
//run query and store result
$result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
//extract row from result using mysqli_fetch_assoc()and store $row
while($row=mysqli_fetch_assoc($result)){
    $id=$row['ProductID'];
    $name=$row['ProductName'];
    $price=$row['ProductPrice'];
    $ImageName=$row['ProductImageName'];
}
include_once("updateProduct.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amend.php</title>
</head>
<body>
<?php
    echo "<form method=\"post\" action=\"\">
        <fieldset>
            <legend>Enter Product Details</legend>
            <input type=\"hidden\" name=\"hideProductID\" value=\"$id\">
            Product Name: <input type=\"text\" name=\"UProductName\" value='$name'><br><br>
            Price: <input type=\"text\" name=\"UProductPrice\" value='$price'><br><br>
            Image Filename: <input type=\"text\" name=\"UProductImageName\" value='$ImageName'>
        </fieldset>
        <input type=\"submit\" name=\"Asubmit\" value=\"Submit\">
        <input type=\"reset\" value=\"Clear\">
    </form>";
    
?>     
</body>
</html>