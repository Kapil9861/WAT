<?php

include("connection.php");
//Display The Output
$sql="SELECT * FROM customer";
$sql2="SELECT * FROM customer WHERE Age>22";
$sql3= "SELECT * FROM customer WHERE Gender='F' AND Age>=22";
$sql4="SELECT * FROM customer WHERE Gender='M' ORDER BY Age DESC";
$sql5="SELECT * FROM customer WHERE FirstName LIKE '%a%' ORDER BY Age ASC";

$query=mysqli_query($connection,$sql) or exit(mysqli_error($connection));
echo "<h2>Select ALL from the Customer Table</h2>";
while($row=mysqli_fetch_array($query)){
    echo "<br>";
    echo $row['FirstName'] ." ";
    echo $row['LastName'] ." ";
    echo $row['Email'] ." ";
}

echo "<h2>Select ALL from the Customer Table with Age> 22</h2>";   
$query=mysqli_query($connection,$sql2) or exit(mysqli_error($connection)); 
display($query);

echo "<h2>Select Females from the Customer Table with Age>=22</h2>";    
$query=mysqli_query($connection,$sql3) or exit(mysqli_error($connection));
display($query);

echo "<h2>Select Males From the Customer Table list by age descending</h2>";
$query=mysqli_query($connection,$sql4) or exit(mysqli_error($connection));
display($query);

echo "<h2>Select All from the Customer Table with \"a\" in the first name</h2>";    
$query=mysqli_query($connection,$sql5) or exit(mysqli_error($connection));
display($query);

    function display($query){
        while($row=mysqli_fetch_array($query)){
            echo "<br>";
            echo $row['FirstName'] ." ";
            echo $row['LastName'] ." ";
            echo $row['Email'] ." ";
            echo $row['Age'] ." ";
        }
    }

?>