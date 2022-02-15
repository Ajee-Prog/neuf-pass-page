<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- Font Awesome Link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <title>Shop</title>
    <link rel="icon" href="images/web logo.png">
</head>
<body>


<section class="top">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fas fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ms-auto ">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="shop.php">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.php">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="music.php">Music</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="articles.php">Articles</a>
              </li>
              <li class="nav-item">
              <?php
                $count = 0;
                if(isset($_SESSION['cart']))
                {
                    $count = count($_SESSION['cart']);
                }
                 ?>
                <!-- <a class="nav-link btn btn-sm btn-outline-light" href="cart.php">Cart<i class="fas fa-shopping-cart"></i><span id="cart-item"class="badge badge-danger text-h-dark">(<?php //echo $count; ?>)</span></a> -->
                <a href="cart.php" class="btn btn-sm btn-outline-light mr-1"> Cart <i class="fas fa-shopping-cart"></i> <span id="cart-item"class="badge badge-danger text-h-dark">(<?php //echo $count; ?>)</span></a>

                <!-- New Cart count -->
                <div> 
                <?php
                // $count = 0;
                // if(isset($_SESSION['cart']))
                // {
                //     $count = count($_SESSION['cart']);
                // }
                 ?>
                <!-- <a href="cart.php" class="btn btn-sm btn-outline-light mr-1"> Cart <i class="fas fa-shopping-cart"></i> <span id="cart-item"class="badge badge-danger text-h-dark">(<?php //echo $count; ?>)</span></a> -->
            </div>
              </li>

              <!-- Cart List -->
              <!-- <li> 
            <div> 
                <?php
                // $count = 0;
                // if(isset($_SESSION['cart']))
                // {
                //     $count = count($_SESSION['cart']);
                // }
                 ?>
                <a href="cart.php" class="btn btn-sm btn-outline-light"> Cart <i class="fas fa-shopping-cart"></i> <span id="cart-item"class="badge badge-danger text-h-dark">(<?php //echo $count; ?>)</span></a>
            </div></li> -->
            </ul>
          </div>
        </div>
      </nav>
</section>