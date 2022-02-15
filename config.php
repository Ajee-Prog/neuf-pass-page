<?php
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $bdname = "shopping";

// $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $bdname);

// if(!$conn){
//     die('Could not connect to Database'.mysqli_connect_error());
// }

//Use Define Function() as a Constant For PayPal
// define('PAYPAL_CLIENT_ID', '/**iD GOES HERE*/');
// define('PAYPAL_SECRETE_ID', '/**iD GOES HERE*/');
define('PAYPAL_ID', 'ajee_programmers@yahoo.com');
define('PAYPAL_SANDBOX', TRUE); // Set False for Production
//Use Define Function() as a Constant DataBase


// define('CONTINUE_SHOPPING_URL', 'http://localhost/e-comerce/store.php');
// define('PAYPAL_RETURN_URL', 'http://localhost/e-comerce/success.php');
// define('PAYPAL_CANCEL_URL', 'http://localhost/e-comerce/cancel.php');
// define('PAYPAL_NOTIFY_URL', 'http://localhost/e-comerce/paypal_ipn.php');
// define('PAYPAL_CURRENCY', 'USD');

define('CONTINUE_SHOPPING_URL', 'http://localhost/Neuf-Pass-page/shop.php');
define('PAYPAL_RETURN_URL', 'http://localhost/e-comerce/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/e-comerce/cancel.php');
define('PAYPAL_NOTIFY_URL', 'http://localhost/e-comerce/paypal_ipn.php');
define('PAYPAL_CURRENCY', 'USD');


// DATABASE Configuration
// define('DB_HOST', 'sql102.epizy.com');
// define('DB_USRERNAME', 'epiz_31066836');
// define('DB_PASSWORD', 'Cc12mOqBym0');
// define('DB_NAME', 'epiz_31066836_neuf');



define('DB_HOST', 'localhost');
define('DB_USRERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'neuf');

define('PAYPAL_URL', (PAYPAL_SANDBOX == TRUE) ? 'https://www.sandbox.paypal.com/cgi-bin/webscr':'https://www.paypal.com/cgi-bin/webscr');


// define('DB_SERVER', 'localhost:3036');
//    define('DB_USERNAME', 'root');
//    define('DB_PASSWORD', '');
//    define('DB_DATABASE', 'neuf');
//    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "neuf";


// $dbhost = "sql104.epizy.com";
// $dbuser = "epiz_30664696";
// $dbpass = "yHRMBZTphU";
// $dbname = "epiz_30664696_neuf";


// $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// if($conn->connect_error){
//     die('Could not connect to Database'.$conn->connect_error);
// }



//Connect with DATA
$conn = new mysqli(DB_HOST, DB_USRERNAME, DB_PASSWORD, DB_NAME);

//Display Error if Fail to connect
if ($conn->errno) {
    # code...
    printf("Connect Faaild: %s\n", $conn->connect_error);
    exit();
}



?>