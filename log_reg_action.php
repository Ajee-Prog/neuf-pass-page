<?php 
session_start();

require 'config.php';

// // Start Admin Register

// if (isset($_POST['register'])) {
//     // extract($_POST);
//     // $sql = 
//     $first_name = $_POST['first_name'];
//     $last_name = $_POST['last_name'];
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];



//             $created_at= date('Y-m-d H:i:s');
//             $updated_at= date('Y-m-d H:i:s');





//     // Check if any email is already in dataBase Then display a message
//     $stmt = $conn->prepare("SELECT email FROM admin WHERE email=?");
//     // Using email Because is UNIQUE in the TABLE
//     $stmt->bind_param("s",$email);
//     $stmt->execute();
//     $res = $stmt->get_result();
//     // Create one Variable
//     $r = $res->fetch_assoc();
//     // Create one more Variable To FETCH email from admin
//     // $code = $r['product_code'] ?? '';
//     $email = $r['email'];

//     // Check if product code is not Present in the Cart Table
//     if(!$email ){
//         $query = $conn->prepare("INSERT INTO admin (first_name,last_name,username,email,phone,address, created_on)VALUES(?,?,?,?,?,?,?)");
//         $query->bind_param("sssisss",$first_name,$last_name,$username,$email,$phone,$address, $created_at);
//         $query->execute();

//         //if (empty($_POST['psize'])) {

//             // // Send a Message to a/the Client
//             // echo'<div class="alert alert-success alert-dismissible mt-2">
//             //             <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
//             //             <strong>Please Select size</strong> 
//             //         </div>';}else{}

//         // Send a Message to a/the Client
//         echo'<div class="alert alert-success alert-dismissible mt-2">
//                     <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
//                     <strong>Admin has been added successfully!</strong> 
//                 </div>';
//     }else{
//         // Send a Message to a/the Client
//         echo '<div class="alert alert-danger alert-dismissible mt-2">
//                     <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
//                     <strong>Admin already Added To Your Table!.Error:</strong> 
//                 </div>'.$conn->error;
//     }

// }


// // END Admin Register
// Admin Login
if (!isset($_SESSION['admin_email']) && !isset($_SESSION['admin_password']) && empty(isset($_SESSION['admin_email']) && isset($_SESSION['admin_password']))) 
    header("location: adminLogin.php");
    // // Require DB Connection
    // // require_once('./db-connection.php');
    // // This if statement maybe in another page..
    // if ($_SERVER['REQUEST_METHOD']=='POST') {
    //     $_SESSION['admin_email'] = $_POST['email'];
    //     $_SESSION['admin_password'] = $_POST['password'];
    //     header("Location: add.php");
    // }
    
    // // END maybe in anther page incase

// Require DB Connection
    // require_once('./db-connection.php');
    // This if statement maybe in another page..
    // if ($_SERVER['REQUEST_METHOD']=='POST') {
    //     if (isset($_POST['submit'])) {
    //     $_SESSION['admin_email'] = $_POST['email'];
    //     $_SESSION['admin_password'] = $_POST['password'];
    //     header("Location: add.php");
    // }
    // END maybe in anther page incase
    if (isset($_GET['logout']) && $_GET['logout']=='true') {
        session_destroy();
        header("location: adminLogin.php");
    }

    if (isset($_POST['login']) && !empty(isset($_POST['login']))) {
        $email = $_POST['email'];
        $password = md5($_POST['password']) ;




        $stmt = $conn->prepare("SELECT * FROM admin WHERE email=? AND password=?");
    // Using product_code Because is UNIQUE in the TABLE
    $stmt->bind_param("ss",$email,$password);
    $res= $stmt->execute();
     $res = $stmt->get_result();
    if (mysqli_num_rows($res) > 0) {
        // Create one Variable
    $r = $res->fetch_assoc();
    $_SESSION['admin_email'] = $r['email'];
    $_SESSION['admin_password'] = $r['password'];
    header("location: add.php");

    }else {
        # code...
    }



        header("location: add.php");
    }


// END Admin Login
// // Start Admin Register

// if (isset($_POST['register'])) {
//     // extract($_POST);
//     // $sql = 
//     $first_name = $_POST['first_name'];
//     $last_name = $_POST['last_name'];
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];



//             $created_at= date('Y-m-d H:i:s');
//             $updated_at= date('Y-m-d H:i:s');





//     // Check if any email is already in dataBase Then display a message
//     $stmt = $conn->prepare("SELECT email FROM admin WHERE email=?");
//     // Using email Because is UNIQUE in the TABLE
//     $stmt->bind_param("s",$email);
//     $stmt->execute();
//     $res = $stmt->get_result();
//     // Create one Variable
//     $r = $res->fetch_assoc();
//     // Create one more Variable To FETCH email from admin
//     // $code = $r['product_code'] ?? '';
//     $email = $r['email'];

//     // Check if product code is not Present in the Cart Table
//     if(!$email ){
//         $query = $conn->prepare("INSERT INTO admin (first_name,last_name,username,email,phone,address, created_on)VALUES(?,?,?,?,?,?,?)");
//         $query->bind_param("sssisss",$first_name,$last_name,$username,$email,$phone,$address, $created_at);
//         $query->execute();

//         //if (empty($_POST['psize'])) {

//             // // Send a Message to a/the Client
//             // echo'<div class="alert alert-success alert-dismissible mt-2">
//             //             <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
//             //             <strong>Please Select size</strong> 
//             //         </div>';}else{}

//         // Send a Message to a/the Client
//         echo'<div class="alert alert-success alert-dismissible mt-2">
//                     <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
//                     <strong>Admin has been added successfully!</strong> 
//                 </div>';
//     }else{
//         // Send a Message to a/the Client
//         echo '<div class="alert alert-danger alert-dismissible mt-2">
//                     <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
//                     <strong>Admin already Added To Your Table!.Error:</strong> 
//                 </div>'.$conn->error;
//     }

// }


// // END Admin Register





?>