<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">






    <!-- <meta charset="UTF-8">
		<title>Header</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/js/jquery2.js"></script>
		<script src="js/js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style></style> -->






    <link rel="stylesheet" href="style.css" type="text/css">
    <!-- <link rel="stylesheet" href="ajee.css" type="text/css"> -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/lightbox.min.css" type="text/css">
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->


    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

     <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>header</title>
<!-- </head> -->
<!-- 
<body>
    

<-- <nav>
  
      <div class="logo">
        <a href="index.php"><img src="images/logo.png" alt="" width="60" height="40"></a>
      </div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fa fa-bars"></i>
      </label>
      <ul>
        <li><a href="store.php" class="active">Shop</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="music.php">Music</a></li>
        <li><a href="article.php">Articles</a></li>
        <li> <div> <a href="cart.php" class="btn btn-outline-success">Cart <span>(0)</span></a></div></li>
      </ul>
</nav> -->
<!--
<ul class="nav nav-pills">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Action</a></li>
      <li><a class="dropdown-item" href="#">Another action</a></li>
      <li><a class="dropdown-item" href="#">Something else here</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#">Separated link</a></li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled">Disabled</a>
  </li>
</ul>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    -->


    <!-- Latest compiled and minified CSS --
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


    <!-- <title>Shop</title> -->
</head>
<body style="overflow: auto; overflow:scroll;" class="page-body-wrapper full-page-wrapper overflow-auto  overflow-scroll">
       

   
  <nav >
  
      <div class="logo">
        <a href="index.php"><img src="images/logo.png" alt="" width="60" height="40" id="mlogo"></a>
      </div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fa fa-bars"></i>
      </label>
      <ul class="pt-2">
        <li><a href="store.php" class="">Shop</a></li>
        <!-- <li><a href="#" class="">Categories</a></li> -->
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="music.php">Music</a></li>
        <li><a href="article.php">Articles</a></li>
        <li> 
            <div> 
                <?php
                $count = 0;
                if(isset($_SESSION['cart']))
                {
                    $count = count($_SESSION['cart']);
                }
                 ?>
                <a href="cart.php" class="btn btn-sm btn-outline-light"> Cart <i class="fas fa-shopping-cart"></i> <span id="cart-item"class="badge badge-danger text-h-dark">(<?php //echo $count; ?>)</span></a>
            </div></li>
      </ul>
</nav>
<!-- </body>
</html>  -->