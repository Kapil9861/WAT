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
            <label for="Firstname">Firstname:</label>
            <input type="text" name="Firstname" id="Firstname" value="<?php
            if(isset($_POST['Firstname'])){
                echo $_POST['Firstname'];
            }
            ?>" placeholder="Firstname"><br><br>
            <label for="Lastname">Lastname:</label>
            <input type="text" name="Lastname" id="Lastname" value="<?php
            if(isset($_POST['Lastname'])){
                echo $_POST['Lastname'];
            }
            ?>" placeholder="Lastname"><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php
                if(isset($_POST['email'])){
                    echo $_POST['email'];
                }
            ?>" placeholder="Email">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php
            if(isset($_POST['password'])){
                echo $_POST['password'];
            }
            ?>" placeholder="Password"><br><br>
            <label for="COnfirm password">Confirm Password:</label>
            <input type="password" name="cpassword" id="cpassword" value="<?php
            if(isset($_POST['cpassword'])){
                if(isset($_POST['cpassword']==$_['password'])){
                    echo $_POST['cpassword'];
                }else{
                    echo'Password must match';
                } 
            }
            ?>" placeholder="Confirm Password"><br><br>
             <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="<?php
            if(isset($_POST['address'])){
                echo $_POST['address'];
            }
            ?>" placeholder="Address"><br><br>
            <label for="country">Country:</label>
            <input type="text" name="country" id="country" value="<?php
            if(isset($_POST['country'])){
                echo $_POST['country'];
            }
            ?>" placeholder="Country"><br><br>
            <label for="DOB">Date of Birth: </label>
            <select name='dd' size='1' id="DOB">
                <?php
                for($i=1;$i<=31; $i++){
                echo "<option value=\"$i\">$i</option>";
            
            }?>
            </select>
            <select name='mm' size='1' id="DOB">
                
                <?php
                $months=array("January","February","March","April","May","June","July","August","September","October","November","December");
                    foreach($months as $M){
                        echo "<option value=\"$M\">$M</option>";
                    }
                ?>
            </select>
            <select name='yyyy' size='1' id="DOB">
            <?php
                for($i=1940;$i<=2022; $i++){
                echo "<option value=\"$i\">$i</option>";
            
            }?>
            </select><br><br>
            <label for="gender">Gender: </label>
            <input type="radio" name="gender" id="gender" value="Male"checked/>Male
            <input type="radio" name="gender" id="gender" value="Female">Female
            <input type="radio" name="gender" id="gender" value="Others">Others
            <br><br>
            <input type="checkbox" name="confirm" value="confirm" 
            <?php echo isset($_POST['confirm']) ? 'checked' : ''; ?>> Terms And Conditions
        </fieldset>
        <input type="submit" name="submit" value="Register">
        <input type="reset" value="clear">
        </fieldset>
        <input type="submit" name="submit" value="Register">
        <input type="reset" value="clear">
    </form>
<?php
if(isset($_POST['submit'])){
    include('connect.php');
    $firstname=trim($_POST['firstname']);
    $Ffirstname=filter_var($firstname,FILTER_SANITIZE_STRING);
    $address=trim($_POST['address']);
    $Faddress=filter_var($address,FILTER_SANITIZE_STRING);
    $lastname=trim($_POST['lastname']);
    $Flastname=filter_var($lastname,FILTER_SANITIZE_STRING);
    $password=trim($_POST['password']);
    $Fpassword=filter_var($password,FILTER_SANITIZE_STRING);
    $cpassword=trim($_POST['cpassword']);
    $Fcpassword=filter_var($cpassword,FILTER_SANITIZE_STRING);
    $email=trim($_POST['email']);
    $Femail=filter_var($email,FILTER_SANITIZE_EMAIL);
    $Vemail=filter_var($Femail,FILTER_VALIDATE_EMAIL); 
    $yy =trim($_POST['yyyy']);
    $mm =trim($_POST['mm']);
    $dd =trim($_POST['dd']);
    $dob=$yy.'-'.$mm.'-'.$dd;
    $birthdate = new DateTime($dob);
    // Get the current date
    $today = new DateTime();
    // Calculate the difference between the two dates
    $age = $today->diff($birthdate);
    if(!empty($Fpassword)){
        if(isset($Ffirstname)&&isset($Flastname)){
            $Fusername=$Ffirstname.$Flastname;
            if(ctype_alpha($Fusername)){
                if(strlen($Fusername)>=6){
                    if(!empty($Vemail)){
                        if(isset($_POST['age'])){
                            $age=$_POST['age'];
                            if(isset($_POST['confirm'])){
                                $pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,16}$/";
                                if(!preg_match($pattern,$Fpassword)){
                                    echo "Weak or invalid password!<br>".
                                    "The password must have length between 6 and 16 or more and must contain a number, capital letter and a special character.";
                                }else{
                                    $pass=md5($_POST[$Fcpassword]);
                                    $sql="INSERT INTO users(FIRSTNAME,LASTNAME,ADDRESS,CONTACT,TYPE,EMAIL,GENDER,PASSWORD,YYYY,MM,DD,AGE)
                                    VALUES('$Ffirstname','$Flastname','$Faddress','$Vcontact','user','$Vemail',$_POST['gender'],'$Fcpassword','$yy','$mm','$dd',$age)";

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