<?php
include('connection.php');
$admin=$_SESSION['ADMIN'];
if($admin==FALSE){
    header ('location:./Login.php');
}
echo '<h2>Welcome Admin! </h2>'.' <strong>
<a href="./homepage.php"> Home Page (Client\'s Page)</a></strong>';
echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<strong><a href="./logout.php">Logout</a></strong>';
echo '<h2></h2>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
<?php
    if(isset($_POST['addproducts']))
    {
        if(isset($_POST['Pname'])&&($_POST['description'])&&($_POST['price'])&&($_POST['category'])&&$_FILES["upload"]["name"]){
        // collecting the forms data
            $Pname=trim($_POST['Pname']);
            $FPname=filter_var($Pname,FILTER_SANITIZE_STRING);
            $description=trim($_POST['description']);
            $Fdescription=filter_var($description,FILTER_SANITIZE_STRING);
            $price=trim($_POST['price']);
            $category=trim($_POST['category']);
            $Fcategory=filter_var($category,FILTER_SANITIZE_STRING);
            $Vprice=filter_var($price,FILTER_SANITIZE_NUMBER_FLOAT);
            //capturing the image name
            $uimage=$_FILES["upload"]["name"];
            $usize=$_FILES['upload']['size'];
            $utype=$_FILES['upload']['type'];
            $utmpname=$_FILES['upload']['tmp_name'];
            $ulocation="productphotos/".$uimage;
        
            if($utype=="image/jpeg" || $utype=="image/jpg" || $utype=="image/png" || $utype=="image/gif")
            {
            if(!empty($Pname) )
            {
                //SQL 
                $sql ="INSERT INTO products(Pname, price, description, thumbimg, category) VALUES('$FPname', '$Vprice', '$Fdescription', '$uimage', '$category')"; 
                //executing Query
                $qry=mysqli_query($connection, $sql) or die(mysqli_error($connection));
                //giving decision 
                if($qry)
                {
                    if(move_uploaded_file($utmpname, $ulocation))
                        echo "New product added!";
                    else
                        echo"unable to upload the file";
                }
            }
            else
            {
                echo "Please fill Category Name";
            }
        }
        else{
            echo "Image format should be Jpeg/png/jpg or gif only.";
        }
        }else{
            echo "All details of the product is required";
        }
    }
    ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <fieldset>
            <legend>
                Add More Products
            </legend>
            <label>Product Name:</label>
            <input type="text" name="Pname" /><br><br>
            <label>Price:</label>
            <input type="text" name="price"/>
            <br/><br>
            <label>Category:</label>
            <input type="text" name="category" /><br><br>
            <label>Description: &nbsp;</label>
            <textarea name="description" rows="4" cols="50">Up to 254 Letters</textarea>
            <br/><br>
            <input type="file" name="upload"/>
            <br/><br>
            <input type="submit" name="addproducts" value="Add Product"/>
        </fieldset>
    </form>
<?php
echo "<br><h3>Pre-existing Products:</h3>";
$sql="SELECT * from products order by id ASC";
$qry=mysqli_query($connection,$sql) or die(mysqli_error($connection));
$count=mysqli_num_rows($qry);
if($count>=1){
    echo"<table border=1 cellpadding=5>
    <tr><th>Product Name</th><th>Price</th><th>Category</th> <th>Description</th><th>Image</th><th>Operations</th></tr> ";
    while($row=mysqli_fetch_array($qry)){
            echo("<td>".$row['Pname'] . " </td>");
            echo("<td>&pound;".$row['price'] . " </td>");
            echo("<td>".$row['category'] . " </td>");
            echo("<td>".$row['description'] . " </td>");
            echo "<td><img src=\"productphotos/".$row['thumbimg']."\"alt=" .$row['Pname']. " width= '100px'></td>";
            $id=$row['id'];          
            echo "<td> <a href=./edit.php?id=$id&action=edit>EDIT</a> |
            <a href=./delete.php?id=$id&action=delete>DELETE</a></td></tr>";           
    }
    echo "</tr></table>";
}       
?>

</body>
</html>