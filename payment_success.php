<?php

include('Incl/header.php');
include 'config.php';

$order_id = $_GET['id'];

$query = "SELECT * FROM checkout_address WHERE id=".$order_id."";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        $f_name = $rows['firstname'];
        $l_name = $rows['lastname'];
        $email = $rows['email'];
        $phone = $rows['phone'];
        $address = $rows['address'];
        $pmode = $rows['pmode'];
        $city = $rows['city'];
    }
}

$query2 = "INSERT INTO confirm_order_address VALUES('', '$f_name', '$l_name', '$email', '$phone', '$address', '$pmode', '$city')";
$conn->query($query2);

$l_id = $conn->insert_id;

foreach ($_COOKIE['cartItem'] as $name2 => $value) {
    $value22 = explode('_',$value);
    /**
     * $image_name = $value22[0];
     * $folder = "sales_image/".$value22[0];
     * $move_uploaded_file($image_name, $folder);
     */

     $query3 = "INSERT INTO confirm_order_product VALUES('', '$l_id', '$value22[0]', '$value22[1]', '$value22[2]' '$value22[3]', '$value22[4]', '$value22[5]', '$value22[6]', 'Pending')";

}
echo "<h1 class='alert alert-success mt-5 container text-center'>Your Order is Coming soon..!!</h1>";

if (!empty($_COOKIE['cartItem']) && is_array($_COOKIE['cartItem'])) {
    foreach ($_COOKIE['cartItem'] as $name1 => $value) {
        setcookie("cartItem[$name1]", "", time() - 1800);
    }
    
}

?>
<script>
    setTimeout(() => {
        window.location = "shop.php";
    }, 3000);
</script>