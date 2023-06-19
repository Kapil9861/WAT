<?php
//Set up the database access credentials
$hostname = 'localhost:3306';//'stu-db.aet.leedsbeckett.ac.uk'; 
$username = 'kapi7894_77297894';//'c7297894'; //your standard uni id
$password = '0H+msoo-K!78';//'MyDB95163561';  // the password found on the W: drive
$databaseName = 'kapi7894_wat2022';//c7297894 //the name of the db you are using on phpMyAdmin
$connection = mysqli_connect($hostname, $username, $password, $databaseName) or exit("Unable to connect to database!");
session_start();
?>