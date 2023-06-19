<?php
//Make connection to database
include_once("connection.php");
//create a query to select all records from products table
$sql="SELECT * FROM products";
//run query and store the result in a variable called $result
$result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
echo "<table border='1' cellpadding=5 cellspacing=5>";
echo "<tr><th>Product Name</th><th>Price</th> <th>Image</th><th>Amend</th><th>Delete</th></tr>";
while($row=mysqli_fetch_array($result)){
            echo("<td>".$row['ProductName'] . "</td>");
            echo("<td>".$row['ProductPrice'] . "</td>");
            echo "<td><img src=\"../images/".$row['ProductImageName']."\"alt=" .$row['ProductImageName']. " width= '100px'>". "</td>";
            $id=$row['ProductID'];
            echo "<td> <a href=amendProduct.php?id=$id&action=edit>Amend</a></td>";
            echo "<td><a href=deleteProduct.php?id=$id&action=delete>Delete</a></td></tr>";           
}
echo"</table>";
//Use a while loop to iterate through your $result array and display //ProductName, ProductPrice, ProductImageName.
?>

