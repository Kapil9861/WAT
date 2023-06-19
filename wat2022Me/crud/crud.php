<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud.php</title>
</head>
<body>
<?php
echo "<h2>Manage Products</h2>";
include("insertProduct.php");
include("displayProducts.php");
?>
<form method="post" action="">
    <fieldset>
        <legend>Enter New Product Details</legend>
        <label for="pname">Product Name:<br></label>
        <input type="text" name='ProductName' id='pname'><br><br>
        <label for="price">Product Price:<br></label>
        <input type="text" name='ProductPrice' id='price' ><br><br>
        <label for="Imgfname">Image Filename:<br></label>
        <input type="text" name='ProductImageName' id='Imgfname' ><br><br>
        <input type="submit" name="submit" value="Submit">
        <input type="reset" value="Clear">
    </fieldset>
</form>
 
</body>
</html>
