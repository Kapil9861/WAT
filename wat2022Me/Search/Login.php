<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form method="post" action = './Login.php'>
    <fieldset>
        <legend>Login</legend>
    <label for="username">Username:</label>
    <input type="text" name="username" placeholder="Username" value="<?php
            if(isset($_POST['username'])){
                echo $_POST['username'];
            }
            ?>"><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="password"><br><br>
    <input type="submit" name="login" value="Login">
    </fieldset>
</form>
<strong>Don't have an account? </strong>
<a href="./register.php"> Register</a>

</body>
</html>
<?php
if(isset($_POST['login'])){
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
    $Epassword=md5($password);

    $sequel="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $qry=mysqli_query($connection,$sequel) or die(mysqli_error($connection));
    
    $sql="SELECT * FROM users WHERE username='$username' AND password='$Epassword'";
    $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
    if($row = mysqli_fetch_assoc($qry)){    
        $_SESSION['ADMIN']=$row['username'];
        header ("location:./adminpage.php");
    }
    elseif ($row = mysqli_fetch_assoc($result)){
        $_SESSION['user']=$row['username'];
        header("location:./homepage.php");
    } else {
        $_SESSION['error']= 'User not recognised';
        echo "<br><strong>Please verify your user credential.</strong>";
    } 
}
?>