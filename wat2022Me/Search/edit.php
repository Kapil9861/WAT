<?php
include('connection.php');
$admin=$_SESSION['ADMIN'];
if($admin==FALSE){
    header ('location:./Login.php');
}
echo '<a href="./adminpage.php"><strong>Go Back</strong></a><br><br>';
//checking id and action is set or not
if(isset($_GET['id'])&&isset($_GET['action'])){
    $editid=$_GET['id'];
    //sql statement for edit
    $sql="SELECT * FROM  products where id=$editid";
    $qry=mysqli_query($connection,$sql) or die(mysqli_error($connection));
    while($row=mysqli_fetch_assoc($qry)){
        $eid=$row['id'];
        $ename=$row['Pname'];
        $eprice = $row['price'];
        $ecategory=$row['category'];
        $edescription = $row['description'];
        $eimage = $row['thumbimg'];
        
    }

    //Creating edit form
    echo "<form method='post' action=''>";
    echo "<fieldset> <legend>Edit Product Name:</legend>";
    echo"<input type='text' name='Pname' value='$ename'><br><br>";
    echo "<legend>New Price:</legend>";
    echo"<input type='text' name='price' value='$eprice'><br><br>";
    echo "<legend>Edit Product Category:</legend>";
    echo"<input type='text' name='category' value='$ecategory'><br><br>";
    
    echo "<legend>Edit Product Description:<br></legend>";
    echo '<textarea name="description" rows="4" cols="50">'.$edescription.'</textarea><br><br>';
    echo "<legend>Product Image</legend>";
    echo"<input type='text' name='thumbimg' value='$eimage'>";
    echo "<img src=\"productphotos/".$eimage."\"alt=" .$ename. " width= '100px'><br><br>"; 
    echo"<input type='submit' name='editProduct' value='update'>";
    echo "<input type='hidden' name='Pid' value='$eid'>";
    
    echo"</fieldset> </form>";

    //gitURL=>https://github.com/drpoudel3785/tbcl52022watd
}

    //editing the value
if(isset($_POST['editProduct'])){
    $Pid=$_POST['Pid'];
    $Pname=trim($_POST['Pname']);
    $FPname=filter_var($Pname,FILTER_SANITIZE_STRING);
    $category=trim($_POST['category']);
    $Fcategory=filter_var($category,FILTER_SANITIZE_STRING);
    $price=trim($_POST['price']);
    $Vprice=filter_var($price,FILTER_SANITIZE_NUMBER_FLOAT);
    $description=$_POST['description'];
    $Fdescription=filter_var($description,FILTER_SANITIZE_STRING);
    //$email=$_POST['email'];
    $image=$_POST['thumbimg'];

    $sql="UPDATE products set Pname='$FPname', price='$price', description='$Fdescription',
        thumbimg='$image', category='$Fcategory' WHERE id='$Pid'";

    $qry=mysqli_query($connection,$sql) or die(mysqli_error($connection));
    if($qry){
        header('Location:./adminpage.php');
    }
}
echo "<strong>Notice!</strong><br>The new image that is to be updated must be in 'productphotos' folder first.<br>";

?>