<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //My first PHP
    $name="Kapil Aryal";
    $uniID="77297894";
    $age=20;
    echo"Name: $name <br/>University ID: $uniID"; 
    print("<h1>Using Escape Characters</h2>");
    print('<strong>"most programmers say it\'s better to use \'echo\' rather than \'print\'" says who?</strong>');
    echo"<h1>Variables</h2>
    <strong>Hi my name is ".$name. " and I am ".$age." years old.<br/> <br/>";
    print("Mi nombre es David y tengo 12 anos de edad<strong/>");

    echo "<h1>Functions</h1>";
    //gettype() returns the variable type of $name
    echo gettype($name);
    echo '<br />';
    //strlen() returns length of the String value stored in $name
    echo strlen($name);
    echo '<br />';
    //strtoUpper()returns converts the String value to upper case
    echo strtoUpper($name);

    echo "<h1>Arithmetic</h1>";
    $num1 = 9;
	$num2 = 12;
    echo"num1 = 9 <br/> num2 = 12<br/>";
	echo"num1 * num2 = ".$num1 * $num2;
	echo"<br/>num1 as a percentage of num2 = ".($num1/$num2)*100 . "%<br/>" ; 
	echo"num2 divided by num1 = " . floor($num2/$num1) ." remainder ". fmod($num2,$num1) ."<br/> <br/> <br/>";

    $height = 1.8;
    $heightInches= ($height*100)/2.54;
    $heightFeet=floor(($heightInches)/12);
    $remInches=fmod($heightInches,12);

    echo"Name: David<br/><br/> Age:12<br/><br/>";
    echo"Height in meters: $height<br/><br/>";
    echo "Height in Feet and inches: $heightFeet"."ft ".floor($remInches)."ins";

    ?>
</body>
</html>