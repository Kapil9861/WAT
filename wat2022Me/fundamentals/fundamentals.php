<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Applications And Technologies</title>
    <link type="text/css" rel="stylesheet" href="./main.css"/>
</head>
<body>
    <header>
        <h1>Kapil Aryal</h1>
    </header>
    <section id="container">
         <h1>Fundamentals of PHP</h1>
         <?php
        echo "<h3>Selection</h3>";
        date_default_timezone_set("Asia/Kathmandu");
        $date=date("l, d F Y");
        $day=date("l");
        echo "The date is: ".$day;
        if($day=="Wednesday"){
            echo"<br>It's midweek.";
        }else{
            echo"<br>It's not midweek.";
        }
        $H=date("G");
        if($H<12){
            echo"<br>Good Morning!<br>";
        }elseif ($H>=12 And $H<=18) {
            echo"<br>Good Afternoon!<br>";
        } else {
            echo"<br>Good Night!<br>";
        }
        $password="passwor";
        if(strlen($password)>4 and strlen($password)<10){
            echo"Password length is valid.<br>";
        }else{
            echo"Password length is invalid.<br>";
        }
        if($password=="password" or $password=="username"){
            echo"Password valid.<br>";
        }else{
            echo "Password invalid.<br>";
        }
        $price=25;
        $age=15;
        $membership=true;
        echo"<br>Initial Ticket Price: $price<br>";
        echo"Age: $age<br>";
        if($membership==true){
            echo"Member: Yes";
        }else{
            echo"Member: No";
        }
        if($age<12 and $membership==false){
            echo"Final Ticket Price: ".$price/2;
        }elseif($age<18 and $membership==false){
            echo"<br>Final Ticket Price: ".($price-($price/4));
        }elseif($age>65 and $membership==false){
            echo"<br>Final Ticket Price: ".($price-($price/4));
        }elseif($age>=18 and $age<=65 and $membership==true){
            echo"<br>Final Ticket Price: ". ((9*$price)/10);
        }elseif($age<12 and $membership==true){
            echo"<br>Final Ticket Price: ". ((9*$price)/20);
        }elseif($age<18 and $membership==true){
            echo"<br>Final Ticket Price: ".(9*($price-($price/4))/10);
        }elseif($age>65 and $membership==true){
            echo"<br>Final Ticket Price: ".(9*($price-($price/4))/10);
        }else{
            echo"<br>Final Ticket Price: ".$price."<br>";
        }
        echo "<h3>Arrays<h3>";
        echo "<h4>Simple Arrays<h4>";
        $products=array("t-shirt","cap","mug");
        print_r($products);
        $products[1]="shirt";
        echo "<br>";
        print_r($products);
        array_push($products,"skirt");
        print_r($products);
        echo"<strong><br>The item at index[2] is: ".$products[2]."</strong><br>";
        echo"<strong>The item at index[3] is: ".$products[3]."</strong><br>";
        echo "<h4>Associative Arrays</h4>";
        $associative=array('CustID'=>12, 'CustName'=>'Sarah', 'CustAge'=>23, 'CustGender'=>'F');
        print_r($associative);
        $associative["CustEmail"]="sarah@gmail.com";
        print_r("<br>Items in my customer array<br> The item at index [CustName] is: ".$associative["CustName"]);
		print_r("<br>The item at index [CustEmail] is: ".$associative["CustEmail"]);
        $a="Price: $";

        echo "<h4>Multi-Dimentional Associative Arrays</h4>";
        $stock=array(
        'id1'=>array("description"=>"t-shirt","price"=>9.99,"stock"=>100,"colour"=>array('blue','green','red')),
        'id2'=>array("description"=>"cap","price"=>4.99,"stock"=>50,"colour"=>array('blue','black','grey')),
        'id3'=>array("description"=>"mug","price"=>6.99,"stock"=>30,"colour"=>array('Yellow','green','pink')));
        echo "This is my order:<br/>
            " .$stock['id1']['colour'][1]." ".$stock['id1']['description']."<br>".$a.$stock['id1']['price']."<br>".
            $stock['id2']['colour'][2]." ".$stock['id2']['description']."<br>".$a.$stock['id2']['price']."<br>";
        
        echo "<h3>Loops</h3>";
        echo "<h4>While Loops</h4>";
        $counter=1;
        echo"<table border=solid black><td>";
            
            while($counter<6){
                echo 'Count: '.$counter.'<br>';
                $counter++;
            }
        echo"</td></table><br>";

        $shirtPrice=9.99;
        echo"<table border=solid black><td>";
        $counter=1;
        while($counter<11){
            echo ' '.$counter."- &pound".$shirtPrice*$counter.'<br>';
            $counter++;
        }
        echo"</td></table><br>";
        echo "<table border=solid black>";
        echo"<tr><th>Quantity</th><th>Price</th></tr>";
        $i=1;
        while($i<=10){
            echo"<tr>
            <td>$i</<td>
            <td>"."&pound".number_format($i*$shirtPrice,2)."</td>
            </tr>";
            $i++;
        }
        echo "</table><br>";
        echo "<h4>For Loops</h4>";
        $names=array("Kapil","Apil","Ram","Hari","Sita");
        for($i=0;$i<5;$i++){
            echo " ".$names[$i]."<br>";
        }
        echo"<h4>Foreach Loops</h4>";
        $names=array("Kapil"=>"c71256","Apil"=>"c73425","Ram"=>"74325","Hari"=>"c73562","Sita"=>"73422");
        foreach($names as $a=>$b){
            echo "Name: ".$a." ID: ".$b." "."<br>";
        }

        $city=array('Peter'=>'LEEDS','Kat'=>'bradford','Laura'=>'wakeFIeld');
        print_r($city);
        $p;
        $n;
        echo "<br>Array(";
        foreach($city as $n=>$p){
           $p=strtolower($p);
            $p=ucfirst($p);
            echo"[".$n."] => ".$p." ";
        }
        echo ")";
        echo "<h4>Some Useful Functions</h4>";
        $password=trim("  password");
        echo '<script>alert("You have been hacked")</script>';
        htmlentities($password);

        echo "Password is: $password<br>";
        if((isset($password)==true and empty($password)==false)){
            if(strlen($password)>=6 and strlen($password)<=8){
                if(is_numeric($password)==true){
                    echo "Password cannot be a number.<br>";
                }else{

                        echo "Password OK<br>";
                        $encrypted = sha1($password);
                        echo "encrypted password: ".$encrypted."<br><br>";
                    }

            }else{
                echo "Your password must be between 6 and 8 characters in length.<br>";
            }

        }else{
            echo "Please enter a password.<br>";

        }
    
        ?>
      </section>
      <footer>   
         <small> <a href="http://localhost/learning_php/WAT2022/HTML/watIndex.html">Home</a></small>
      </footer>
</body>
</html>