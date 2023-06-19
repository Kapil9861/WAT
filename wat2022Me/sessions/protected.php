<?php
include 'init.php';
if(!isset($_SESSION['user'])){
    header ('location:sessions.php');
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protect</title>
</head>
<body>
<p>Any page content that you want to protect can be placed here.</p><br>
<a href="logout.php">Logout</a> 
</body>
</html>