<?php
include_once('connection.php');
$_SESSION['user']=$user;
if($user==FALSE){
    header ('location:./Login.php');
}
?>
<?php
 include_once("connection.php");

 // Check if the form was submitted
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Get the form data
   $name = $_POST["Pname"];
   $category = $_POST["category"];
 
   // Build the MySQL query
   $sql = "SELECT * FROM products";
   $where_clauses = array();
   if (!empty($name)) {
     $where_clauses[] = "Pname LIKE '%$name%'";
   }
   if (!empty($category) && $category != "all") {
     $where_clauses[] = "category = '$category'";
   }
   if (!empty($where_clauses)) {
     $sql .= " WHERE " . implode(" AND ", $where_clauses);
   }
   if (!empty($_POST["sort"])) {
     $sort=$_POST["sort"];
     $sql .= " ORDER BY $sort";
   }
 
   // Execute the query and get the results
   $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
 
   // Display the items in a table
   echo '<div style="text-align: center;">';
     echo "<table border='3' style='background-color: aqua; border-color: red blue gold teal; margin: 0 auto;'>";
     echo "<tr><th>&emsp;Name:&emsp;</th><th>&emsp;Price&emsp;</th><th>&emsp;Product's Image&emsp;</th><th>&emsp;Description</th></tr>";
     while ($row = mysqli_fetch_array($result)) {
       echo "<tr>
               <td>" . "&emsp;". $row["Pname"]. "&emsp;". "</td>
               <td>&emsp;&pound;" . $row["price"]."&emsp;" . "</td>
               <td><img src=\"productphotos/".$row['thumbimg']."\"alt=" .$row['Pname']."&emsp;". " width= '150px'></td>
               <td>" ."&emsp;". $row["description"] ."&emsp;". "</td>
               </tr>";
     }
     echo "</table></div>";
 }else{
    $sql = "SELECT * FROM products";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    echo '<div style="text-align: center;">';
    echo "<table border='3' style='background-color: aqua; border-color: red blue gold teal; margin: 0 auto;'>";
    echo "<tr><th>&emsp;Name:&emsp;</th><th>&emsp;Price&emsp;</th><th>&emsp;Product's Image&emsp;</th><th>&emsp;Description</th></tr>";
    while ($row = mysqli_fetch_array($result)) {
      echo "<tr>
              <td>" . "&emsp;". $row["Pname"]. "&emsp;". "</td>
              <td>&emsp;&pound;" . $row["price"]."&emsp;" . "</td>
              <td><img src=\"productphotos/".$row['thumbimg']."\"alt=" .$row['Pname']."&emsp;". " width= '150px'></td>
              <td>" ."&emsp;". $row["description"] ."&emsp;". "</td>
              </tr>";
    }
    echo "</table></div>";
  }
?>
