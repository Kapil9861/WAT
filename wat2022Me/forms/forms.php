<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);           
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forms</title>
        <style>
            body
                {
                    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                }
        </style>
    </head>
    <body>       
        <h2>Processing Input from HTML Forms</h2>
        <h2>Login Form using GET</h2>
        <form method = "POST" action = "forms.php">
            <fieldset>
                <legend>Login</legend>
                <label for = "email">Email: </label>
                <input type="text" name="txtEmail" value="<?php
                if(isset($_POST['txtEmail']))
                    {
                        echo $_POST['txtEmail']; 
                    }
                ?>" /><br />
                <label for = "passwd">Password: </label>
                <input type = "password" name = "txtPass" /><br />
                <input type = "submit" value = "Submit" name = "loginSubmit"  />
                <input type = "reset" value = "Clear" />
            </fieldset>
        </form>
        <?php
            if(isset($_POST['loginSubmit']))
                {
                    $email = $_POST['txtEmail'];
                    $password = $_POST['txtPass'];
                    echo("Email: $email ");
                    echo("Password: $password");       
                }

            else
                {
                    echo("Login Failed");
                }
            echo("<br /><br />");
        ?>   

        <form method = "POST" action="forms.php">
            <fieldset>
                <legend>Comments</legend>
                <label for = "email_2">Email: </label>
                <input type = "text" name = "email" value = "<?php
                if(isset($_POST['email']))
                    {
                        echo $_POST['email']; 
                    }
                ?>" /><br />
                <textarea rows = "4" cols = "50" name = "txtArea" placeholder = "<?php
                if(isset($_POST['txtArea']))
                    {
                        echo $_POST['txtArea']; 
                    }?>">Please leave a message</textarea><br />
                <label for = "">Click to Confirm: </label>
                <input type = "checkbox" name = "checkbox" value = "agree" 
                <?php 
                if (isset($_POST['checkbox'])) 
                    { 
                        echo 'checked'; 
                    } ?>><br />
                <input type = "submit" value = "Submit" name = "formSubmit"/>
                <input type = "reset" value = "Clear" />
            </fieldset>
        </form>
        <?php
        if(isset($_POST['formSubmit']))
            {
                if(isset($_POST['checkbox']))
                    {                                                
                        $secondEmail = $_POST['email'];
                        $message = $_POST['txtArea'];
                        $confirm = 'Agreed<br />';
                       
                        if(!empty($secondEmail))
                            {                     
                                if(filter_var($secondEmail, FILTER_VALIDATE_EMAIL))
                                    {
                                        echo("Email: $secondEmail");
                                        echo("<br /> Comments: $message");
                                        echo("<br />Confirm: $confirm");   
                                        echo("$secondEmail is valid");
                                    }

                                else
                                    {
                                        echo("$secondEmail is not valid");
                                    }
                            }

                        else
                            {
                                echo("email must not be empty");
                            }
                    }                                          

                else
                    {
                        $confirm ='Not Agreed<br />';
                        echo("<br />Confirm: $confirm");
                    }    
            }            
        ?>

        <h>Tax Calculator</h>
        <form method = "POST" action = "forms.php">
            <fieldset>
                <legend>Without TAX calculator</legend>
                <label for = "after">After Tax Price: </label>
                <input type = "text" name = "afterTaxPrice" value = "<?php
                if(isset($_POST['afterTaxPrice']))
                    {
                        echo $_POST['afterTaxPrice']; 
                    }
                ?>" required/>
                <label for = "after">Tax Rate: </label>
                <input type = "text" name = "taxRate" value = "<?php
                if(isset($_POST['taxRate']))
                    {
                        echo $_POST['taxRate']; 
                    }
                ?>" required/>   
                
                <input type = "submit" value = "Submit" name = "taxSubmit"  />
                <input type = "reset" value = "Clear" />
            </fieldset>
        </form>
        <?php      
         if(isset($_POST['taxSubmit']))
            {
                $afterTaxPrice = $_POST['afterTaxPrice'];
                $taxRate = $_POST['taxRate'];
                if(empty($afterTaxPrice) || empty($taxRate))
                    {                   
                        echo("All Fields Required");
                    }

                else
                    {
                        if(filter_var($taxRate, FILTER_VALIDATE_INT) && filter_var($afterTaxPrice, FILTER_VALIDATE_FLOAT))
                            {
                                if(preg_match('/^\d+(:?[.]\d{2})$/', $afterTaxPrice))
                                    {
                                        $beforeTaxPrice = (100 * $afterTaxPrice) / (100 + $taxRate);
                                        echo("<h3>Price before tax = &pound;" . number_format($beforeTaxPrice,2) . "</h3>");
                                    }

                                else
                                    {
                                        echo("After tax price must have 2 decimal values");
                                    }
                            }
                        else
                            {
                                echo("After Tax Price must be decimal and tax rate must be whole number");
                            }
                    }
            }          
        ?>

        <h>Passing Data Appended to an URL</h2>
        <h3>Pick a category</h3>
        
        <a href = "forms.php?cat=Films">Films</a>
        <a href = "forms.php?cat=Books">Books</a>
        <a href = "forms.php?cat=Music">Music</a>
        <?php
            if(isset($_GET['cat']))
                {
                    echo("<h3>The category chosen is " .  $_GET['cat'] . "</h3>");
                }
        ?>
    </body>
</html>