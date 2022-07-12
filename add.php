<?php //include('../Incl/header.php');
   session_start();
   if (!isset($_SESSION['admin_email']) && !isset($_SESSION['admin_password'] )) {
       header("location: shop.php");
   }
    require('./config.php');
    $msg = "";
    if(isset($_POST['submit']) && isset($_FILES['pImage'])){
        $p_name = $_POST['pName'];
        $p_price = $_POST['pPrice'];
        $p_code = $_POST['pCode'];
        $product_desc = $_POST['product_desc'];
        $product_small = $_POST['product_small'];
        $product_medium = $_POST['product_medium'];
        $product_large = $_POST['product_large'];
        $product_xlarge = $_POST['product_xlarge'];
        echo "<pre>";
        print_r($_FILES['pImage']);
        echo "</pre>";

        // $p_image = $_POST['pImage'];

        // $target_dir = " images/";
        // // $m = "images/".$_FILES['pImage']['name'];
        // $target_file = $target_dir.basename($_FILES['pImage']['name']);
        // // Use move_upload_file function to move your file
        // print_r($target_file);
        // if (move_uploaded_file($_FILES['pImage']['tmp_name'], $target_file)) {
        //     # code...
        // }
        // move_uploaded_file($_FILES['pImage']['tmp_name'], $target_file);

        // Change your PHP code/script as below and try
        $name = $_FILES['pImage']['name'];
        $temp_name = $_FILES['pImage']['tmp_name'];
        $imgSize = $_FILES['pImage']['size'];
        $location = 'images/';
        // get image extension
        $imgExt = strtolower(pathinfo($name, PATHINFO_EXTENSION)); //Get image extension
        // Valid image Extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); //Valid extensions
        //rename uploading image
        $prodpics = rand(1000, 1000000).".".$imgExt;
        //Allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '5MB'
            if($imgSize < 5000000){
                // move_uploaded_file($temp_name, $location.$prodpics);
                if (move_uploaded_file($temp_name, $location.$prodpics)) {
                    $sql = "INSERT INTO product(product_name, product_price, product_image, product_code, product_desc, product_small,product_medium,product_large,product_xlarge) VALUE('".$p_name."', '".$p_price."', '".$prodpics."', '".$p_code."','".$product_desc."', '".$product_small."', '".$product_medium."', '".$product_large."', '".$product_xlarge."')";
                }
                // $sql = "INSERT INTO product(product_name, product_price, product_image, product_code) VALUE('$p_name', '$p_price', '$temp_name', '$p_code')";
                echo '<script> alert("File uploaded successfully");</script>';

            }else {
                $errMSG = "Sorry, your file is  too large";
            }//END Check file size '5MB'

        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG, & GIF are allowed";
        }
        //END Allow valid image file formats

        // if (isset($name) and !empty($name)) { Changed from here..
        //     $location = '../images/';
        //     if (move_uploaded_file($temp_name, $location.$name)) {
        //         echo 'File uploaded successfully';
        //     }
        // }else {
        //     echo 'You should select a file to upload !!';
        // }                                                     Changed To here..
        // END Change your PHP code/script as below and try

        //Use another method

        // if ((($_FILES['pImage']['type']=="image/png") || ($_FILES['file']['type']=="image/jpeg") || ($_FILES['file']['type']=="image/jpg")) && ($_FILES['pImage']['size'] < 200000)) {
        //     move_uploaded_file($_FILES['pImage']['tmp_name'], " ../images/".$_FILES['pImage']['name']);
        //     # code...
        // }


        // $sql = "INSERT INTO product(product_name, product_price, product_image, product_code) VALUE('$p_name', '$p_price', '$target_file', '$p_code')";
        // $sql = "INSERT INTO product(product_name, product_price, product_image, product_code) VALUE('$p_name', '$p_price', '$temp_name', '$p_code')";
        if(mysqli_query($conn, $sql)){
            $msg = " Product Added to the DataBase Successfully!";
        }
        else{
            $msg= " Failed to Add Product to the Database";
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Information</title>
    <!-- <link rel="shortcut icon" type="image/png" href="/assets/icon/favicon.png" /> -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- Main css -->
    <!-- <link rel="stylesheet" type="text/css" href="./css/theme.css"> -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- font roboto -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> -->

    <!-- font montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- add to homescreen for ios -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-title" content="NEUF" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
</head>
<body class="bg-dark">
    
<div class="container">
    <?php echo "<h1>Welcome".$_SESSION['admin_email'].'<br>'.$_SESSION['admin_password'].'</h1>'; ?>
    <a href="logout.php">Logout</a>
    <div class="row justify-content-center">
        <div class="col col-md-6 bg-light mt-5 rounded">
            <h2 class="text-center p-2"> Add Product Information </h2>
            <form action="" method="post" class="p-2" enctype="multipart/form-data" id="form-box">
                <div class="form-group">
                    <input type="text" name="pName" id="" class="form-control" placeholder="Product Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="pPrice" id="" class="form-control" placeholder="Product Price" required>
                </div>
                <div class="form-group">
                    <input type="text" name="pCode" id="" class="form-control" placeholder="Product Code" required>
                </div>
                <div class="form-group">
                    <input type="text" name="product_desc" id="" class="form-control" placeholder="Product Description" required>
                </div>
                <div class="form-group">
                    <input type="text" name="product_small" id="" class="form-control" placeholder="S" required>
                </div>
                <div class="form-group">
                    <input type="text" name="product_medium" id="" class="form-control" placeholder="M" required>
                </div>
                <div class="form-group">
                    <input type="text" name="product_large" id="" class="form-control" placeholder="Product X" required>
                </div>
                <div class="form-group">
                    <input type="text" name="product_xlarge" id="" class="form-control" placeholder="Product XX" required>
                </div>
                <div class="form-group">
                    <!-- <input type="text" name="pImage" id="" class="form-control" placeholder="Product Name" required> -->
                    <div class="custom-file">
                        <input type="file" name="pImage" id="customFile" class="custom-file-input" required>
                        <label for="customFile" class="custom-file-label">Choose Product Image</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-danger btn-block" value="Add">
                </div>
                <div class="form-group">
                     <h4 class="text-center"> <!--Success/Failure  --> <?= $msg;?></h4>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3 p-3 bg-light rounded">
            <a href="shop.php" class="btn btn-warning btn-block btn-lg">Go To Product Page</a>
        </div>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.1/gsap.min.js"></script>
    <script src="index.js"></script>
</body>
</html>






<!-- New / Old add code -->

