<?php
//include init.php so session vars can be used
include("init.php");
//Use an if statement to determine whether the session var holding 
//the user name ($_SESSION['user'] has been set.  If it has, echo out
//a welcome message for the user, followed by a links to a pages 
//called protected.php and logout.php.
if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
    echo "Dear $user, Welcome!<br>";
    echo '<a href="./protected.php">Protect</a> ';
    echo '<a href="./logout.php">logout</a>';
//add an else section that will include loginform.php and display any 
//error message that is held in ($_SESSION['error']) 
}else{
    if(isset($_SESSION['error'])){
        echo ("<br>".$_SESSION['error']);
    }
    include('loginform.php');
}	
?>
