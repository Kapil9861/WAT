<?php
include('connection.php');
$admin=$_SESSION['ADMIN'];
if($admin==FALSE){
    header ('location:./Login.php');
}
//checking id and action is set or not
if(isset($_GET['id'])&&isset($_GET['action'])){
    $delid=$_GET['id'];
    //sql statement for delete
    $sql="DELETE FROM products where id=$delid";

    //executing query
    $qry=mysqli_query($connection,$sql) or die(mysqli_error($connection));
    if($qry)
    {
        header("location:./adminpage.php");
    }

}else{
    header("location:./adminpage.php");
}
?>