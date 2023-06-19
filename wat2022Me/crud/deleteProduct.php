<?php
//Make connection to database
include_once("connection.php");
//Gather id from $_GET[]
$deleteId=$_GET['id'];
//Construct DELETE query to remove record where WHERE id provided equals the id in the table
$sql="DELETE FROM products where ProductID='$deleteId'";
//run $query
$qry=mysqli_query($connection,$sql) or die(mysqli_error($connection));
// check to see if any rows were affected
if (mysqli_affected_rows($connection) > 0) {
      //If yes , return to calling page(stored in the server variables)
      header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
      // print error message
      echo "Error in query: $query. " . mysqli_error($connection);
      exit ;
}
	
/**
 * The header call can sometimes create some
 *  de-bugging issues as it must be sent before anything else is sent 
 * from the page, or the system may crash.  So for example it cannot be
 *  preceded by any echo statements or HTML tags, also there can be no 
 * white space or empty lines before the opening PHP tag.  As your 
 * page is calling your connection script, you also have to make sure 
 * there are no HTML tags or white space in that file as well.
 */	
?>
