<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="post" action="">
        <fieldset>
            <legend>Register</legend>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php
            if(isset($_POST['username'])){
                echo $_POST['username'];
            }
            ?>" placeholder="Username"><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php
            if(isset($_POST['password'])){
                echo $_POST['password'];
            }
            ?>" placeholder="Password"><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php
                if(isset($_POST['email'])){
                    echo $_POST['email'];
                }
            ?>" placeholder="Email">
            <br><br>Range of Age:
            <select name="ageRange" id="AgeRange">
                <option value="" disabled selected>Please Select Your Age Catgory:</option>
                <option value="Below10"<?php echo isset($_POST['ageRange']) &&
                 $_POST['ageRange'] == 'Below10' ? 'selected' : ''; ?>>Below 10</option>
                <option value="Below20"<?php echo isset($_POST['ageRange']) &&
                 $_POST['ageRange'] == 'Below20' ? 'selected' : ''; ?>>10-20</option>
                <option value="Below30"<?php echo isset($_POST['ageRange']) &&
                 $_POST['ageRange'] == 'Below30' ? 'selected' : ''; ?>>21-30</option>
                <option value="Below40"<?php echo isset($_POST['ageRange']) &&
                 $_POST['ageRange'] == 'Below40' ? 'selected' : ''; ?>>31-40</option>
                <option value="Above50"<?php echo isset($_POST['ageRange']) &&
                 $_POST['ageRange'] == 'Below50' ? 'selected' : ''; ?>>41-50</option>
                <option value="Below60" <?php echo isset($_POST['ageRange']) &&
                 $_POST['ageRange'] == 'Below60' ? 'selected' : ''; ?>>51-60</option>
                <option value="Above60" <?php echo isset($_POST['ageRange']) &&
                 $_POST['ageRange'] == 'Above60' ? 'selected' : ''; ?>>Above 60</option>
            </select><br><br>
            <input type="checkbox" name="confirm" value="confirm" 
            <?php echo isset($_POST['confirm']) ? 'checked' : ''; ?>>Terms And Conditions
            
        </fieldset>
        <input type="submit" name="submit" value="Register">
        <input type="reset" value="clear">
    </form>
<?php
if(isset($_POST['submit'])){
    include('connect.php');
    $username=trim($_POST['username']);
    $Fusername=filter_var($username,FILTER_SANITIZE_STRING);
    $password=trim($_POST['password']);
    $Fpassword=filter_var($password,FILTER_SANITIZE_STRING);
    $email=trim($_POST['email']);
    $Femail=filter_var($email,FILTER_SANITIZE_EMAIL);
    $Vemail=filter_var($Femail,FILTER_VALIDATE_EMAIL); 
    if(!empty($Fpassword)){
        if(isset($Fusername)){
            if(ctype_alpha($Fusername)){
                if(strlen($Fusername)>=6){
                    if(!empty($Vemail)){
                        if(isset($_POST['ageRange'])){
                            $ageR=$_POST['ageRange'];
                            if(isset($_POST['confirm'])){
                                $pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/";
                                if(!preg_match($pattern,$Fpassword)){
                                    echo "Weak or invalid password!<br>".
                                    "The password must have length of 6 or more and must contain a number, capital letter and a special character.";
                                }else{
                                    $pass=md5($_POST['password']);
                                    $sql="INSERT INTO users(username,password,email,age)
                                    VALUES('$Fusername','$pass','$Vemail','$ageR')";

                                    $query=mysqli_query($connection,$sql) or die(mysqli_error($connection));
                                    if($query){
                                        echo "Data inserted successfully.";
                                    }
                                }
                            }else
                            {
                                echo "Please agree to term and condition before proceeding.";
                            }
                        }else{
                            echo "Please select age range.";
                        }
                    }else{
                        echo "All fields required.";
                    }
                }else{
                    echo "The length of username must be greater than or equal to 6 alphabets";
                }
            }else{
                echo "Username must have alphabets only.";
            }
        }else{
            echo "All fields required.";   
        }
    }else{
        echo "All fields required.";
    }
}
?>   
</body>
</html>    