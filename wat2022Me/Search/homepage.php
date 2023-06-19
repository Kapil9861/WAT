<?php
include('connection.php');
$user=$_SESSION['user'];
if($user==FALSE){
    header('location:./Login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Home</title>
    <style>
        .form-group{
            padding-left:50px;
            padding-right:50px;
        }
        form{
            padding:20px;
        }
        .but{
            padding-top:20px;
        }
        
    </style>
</head>
<body>  
<form method="post">
  <div class="form-group">
    <label for="search">Search:</label>
    <input type="text" class="form-control" id="search" name="Pname" value="<?php if(isset($_POST['Pname'])){
      $Pname=$_POST['Pname'];
      echo "$Pname";
    }
    ?>">
  </div>
  <div class="form-group">
    <label for="radio">Search by name:</label>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="sort" id="sort-name" value="Pname"
      <?php if (isset($_POST['sort']) && $_POST['sort'] == 'Pname') { echo 'checked'; } ?>>
      <label class="form-check-label" for="sort-name">Name</label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="sort" id="sort-price" value="price"
      <?php if (isset($_POST['sort']) && $_POST['sort'] == 'rpice') { echo 'checked'; } ?>>
      <label class="form-check-label" for="sort-price">Price</label>
    </div>
  </div>
  <div class="form-group"> 
    <label for="dropdown">Search BY Category:</label>
    <select class="form-control" id="dropdown" name="category">
    <option value="all"<?php if (isset($_POST['category']) && $_POST['category'] == 'all') { echo 'selected'; } ?>>All</option>
    <option value="clothing"<?php if (isset($_POST['category']) && $_POST['category'] == 'clothing') { echo 'selected'; } ?>>Clothing</option>
    <option value="electronics"<?php if (isset($_POST['category']) && $_POST['category'] == 'electronics') { echo 'selected'; } ?>>Electronics</option>
    <option value="furniture"<?php if (isset($_POST['categy']) && $_POST['category'] == 'furniture') { echo 'selected'; } ?>>Furniture</option>
    </select>
    <div class="but">
    <button type="submit" class="btn btn-primary" name="search" value="Search">Submit</button>
    </div>
  </div>
</form>
<?php
include("displayProducts.php");
?>
<strong>&nbsp;&nbsp; &nbsp;<a href="./logout.php">Logout</a></strong>  
</body>
</html>