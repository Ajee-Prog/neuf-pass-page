<?php
session_start();
require 'config.php';
//  include('./Incl/header.php');
//  include('./action.php');

// Start Admin Register

if (isset($_POST['register'])) {
    // extract($_POST);
    // $sql = 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);



            $created_at= date('Y-m-d H:i:s');
            $updated_at= date('Y-m-d H:i:s');


    // Check if product code is not Present in the Cart Table
    if(!empty($first_name) && !empty($last_name) && !empty($username) && !empty($email) && !empty($phone) && !empty($address) && !empty($password) ){
        
        // Check if any product is already in dataBase Then display a message
    $stmt = $conn->prepare("SELECT product_code FROM admin WHERE email=? AND password=?");
    // Using product_code Because is UNIQUE in the TABLE
    $stmt->bind_param("ss",$email,$password);
    $stmt->execute();
    $res = $stmt->get_result();
    if (mysqli_num_rows($res) > 0) {
        # code...
    }else {
        # code...
    }
    // Create one Variable


        $query = $conn->prepare("INSERT INTO admin (first_name,last_name,username,email,phone,address, created_on, password)VALUES(?,?,?,?,?,?,?,?)");
        $query->bind_param("ssssssss",$first_name,$last_name,$username,$email,$phone,$address, $created_at, $password);
        $query->execute();

        //if (empty($_POST['psize'])) {

            // // Send a Message to a/the Client
            // echo'<div class="alert alert-success alert-dismissible mt-2">
            //             <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
            //             <strong>Please Select size</strong> 
            //         </div>';}else{}

        // Send a Message to a/the Client
        echo'<div class="alert alert-success alert-dismissible mt-2 d-sm">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <strong>Admin has been added successfully!</strong> 
                </div>';
    }else{
        // Send a Message to a/the Client
        echo '<div class="alert alert-danger alert-dismissible mt-2">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <strong>Admin Input field cannot be empty!.Error:</strong> 
                </div>'.$conn->error;
    }

}


// END Admin Register
?>





















<?php
 include('./Incl/header.php');

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-6 bg-secondary mt-5 pb-3">
            <h1 class="text-center text-light p-2"> <hr> Admin Register</h1> <hr>

            <form action="" method="post"  autocomplete="off">
                <div class="form-group">
                    <label for="first_name" class="form-label text-light">First Name</label>
                    <input type="text" name="first_name" id="" class="form-control" autocomplete="false">
                    <span class="text-danger">* <?php echo $nameErr; ?></span>
                </div>
                <div class="form-group mb-3">
                    <label for="last_name" class="form-label text-light">Last Name</label>
                    <input type="text" name="last_name" id="" class="form-control" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="username" class="form-label text-light">Username</label>
                    <input type="text" name="username" id="" class="form-control" autocomplete="new-off">
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="form-label text-light">Email</label>
                    <input type="email" name="email" id="" class="form-control" autocomplete="off">
                </div>
                <div class="form-group mb-3">
                    <label for="phone" class="form-label text-light">Phone</label>
                    <input type="text" name="phone" id="" class="form-control" autocomplete="new-password">
                </div>
                <div class="form-group mb-3">
                    <label for="address" class="form-label text-light">Address</label>
                    <input type="text" name="address" id="" class="form-control" autocomplete="new-password">
                </div>
                <div class="form-group mb-3">
                    <label for="password" class="form-label text-light">Password</label>
                    <input type="password" name="password" id="" class="form-control" autocomplete="new-password">
                </div>
                
                <button type="submit" name="register" class="btn btn-primary ">Register</button>
                <p>Already register? <a href="adminLogin.php">Login </a> here</p>
            </form>
            
        </div>
    </div>
</div>
<!-- compiled New Register -->

<form class="row g-3">
  <div class="col-md-6">
                    <label for="first_name" class="form-label text-light">First Name</label>
                    <input type="text" name="first_name" id="" class="form-control" autocomplete="false">
                    <span class="text-danger">* <?php echo $nameErr; ?></span>
  </div>
  <div class="col-md-6">
        <label for="last_name" class="form-label text-light">Last Name</label>
        <input type="text" name="last_name" id="" class="form-control" autocomplete="off">
  </div>
  <!-- End first and last Name -->
  <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4">
  </div>
  <div class="col-12">
        <label for="inputAddress" class="form-label">Address</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
  </div>
  <div class="col-12">
        <label for="inputAddress2" class="form-label">Address 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div>
  <div class="col-md-6">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select id="inputState" class="form-select">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>








<?php session_destroy(); ?>