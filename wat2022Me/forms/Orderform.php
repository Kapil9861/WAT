<table>
    <h2>Order Form</h2>
    <form action="Orderform.php" method="post">
        <fieldset>
            <legend>Enter your login details</legend>
            <label for="username">User Name:</label>
            <input type="text" name="username" id="username" value="<?php
            if(isset($_POST['username'])){
                echo $_POST['username'];
            }
            ?>">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email"  value="<?php
            if(isset($_POST['email'])){
                echo $_POST['email'];
            }
            ?>">
            </fieldset>
            <fieldset>
            <legend>Pizza Selection</legend>
            <label for="size">Size:</label>
            <input type="radio" id="size" name="pizzasize" value="small">small
            <input type="radio" id="size" name="pizzasize" value="medium">medium
            <input type="radio" id="size" name="pizzasize" value="large">large
            <label for="Toppings"><br>Toppings</label>
            <select name="toppings" id="Toppings" >
                <option value=""disabled selected>Please select</option>
                <option value="chicken">Chicken</option>
                <option value="cheese">Cheese</option>
                <option value="mushroom">Mushroom</option>
                <option value="seafood">Seafood</option>
                <option value="sausage">Sausage</option>
                <option value="none">None</option>
            </select>
            <label for="toppin"><br>Extras:</label>
            <input type="checkbox" id="toppin" name="toppin[]" value="Parmesan">Parmesan
            <input type="checkbox" id="toppin" name="toppin[]" value="Olives">Olives
            <input type="checkbox" id="toppin" name="toppin[]" value="Capers">Capers
            </fieldset>
            <input type="submit" value="submit" name="submit">
            <input type="reset" value="clear">
    </form>
</table>
<?php

if(isset($_POST['submit'])){
    $uname=$_POST['username'];
    $Funame=filter_var($uname,FILTER_SANITIZE_STRING);
    $email=$_POST['email'];
    $Femail=filter_var($email,FILTER_SANITIZE_EMAIL);
    $Vemail=filter_var($Femail,FILTER_VALIDATE_EMAIL);
    if(isset($Funame)&&isset($Vemail)){
        
        if(!empty($_POST['pizzasize'])){
            echo "<strong>Thank you for your order:</strong>";
            echo "<br>Customer ID: ".$Funame;
            echo "<br>Email:".$Femail;
            echo "<br>Your order: ".$_POST['pizzasize']." ";
            if(!empty($_POST['toppings'])){
                echo ucfirst($_POST['toppings'])."<br>Extra Toppings:  ";
            }else{
                echo "<br> Toppings: Not needed.<br>Extra Toppings:  ";
            }
            if(!empty($_POST['toppin'])){//array gives error if we use toppin[]
                foreach($_POST['toppin'] as $i){
                    echo "$i &nbsp;";
                }
            }else{
                echo " Not needed.";
            }
        }else{ 
            echo "<br>Pizza cannot  get ordered without selecting size.<br>";
            }
    }else{
        echo "<br>Pizza cannot be ordered without username and email.";
    }
}

?>