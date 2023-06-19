<?php

    if(isset($_POST['Submit'])){
        $fname=$_POST['FirstName'];
        $lname=$_POST['LastName'];
        $email=$_POST['Email'];
        $password=$_POST['Password'];
        $gender=$_POST['Gender'];
        $age=$_POST['Age'];
        require("connection.php");

        $sql="INSERT INTO customer(FirstName,LastName,Email,Password,Gender,Age)
        VALUES('$fname','$lname','$email','$password','$gender','$age')";

        $query=mysqli_query($connection,$sql) or die(mysqli_error($connection));
    
        if($query){
            echo "Data Insertion Successful.";
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
        }
    }

?>    
