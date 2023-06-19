<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL.php</title>
</head>
<body>
    
<form method="post" action="insertRecord.php" name="register" >
    <fieldset>
		<legend>
			Enter Customer Details
		</legend>
		<label for="username">First Name: </label>
		<input type="text" name="FirstName"/><br />
        <label for="username">Surname: </label>
		<input type="text" name="LastName"/><br />
        <label for="email">Email:</label>
        <input type="email" name="Email" placeholder="you@gmail.com"><br>
		<label for="passwd">Password: </label>
		<input type="password" name="Password" /><br />
        <label for="Gender">Gender:</label>
        <select name="Gender">
            <option>Male</option>
            <option>Female</option>
        </select><br>
        <label for="Age">Age:</label>
        <input type="text" name="Age"></br>
		<input type="submit" value="Register" name="Submit"  />
		<input type="reset" value="Clear" />
	</fieldset>
</form>
<a href="login.php">Login</a>
<?php
   include('selectRecord.php');
?>
    
</body>
</html>