<?php


// Order Function Check Checkout
if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];

    //Pmode test required
    // switch ($pmode) {
    //     case 'None':
    //         # code...
    //         echo "You need to select a Payment Mode";
    //         break;
    //     case 'cod':
    //             # code...
    //             echo "You need to select a Payment Mode";
    //             break;
    //     case 'netbanking':
    //                 # code...
    //                 echo "You need to select a Payment Mode";
    //                 break;
    //     case 'cards':
    //                     # code...
    //                     echo "You need to select a Payment Mode";
    //                     break;
                
            
        
    //     default:
    //         # code...
    //         break;
    // }

    // create empty variable
    $data = '';
    $stmt = $conn->prepare(" INSERT INTO orders ( pname,email,phone,paddress,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $name,$email,$phone,$address,$pmode,$products,$grand_total);
    $stmt->execute();
    $data .= '<div class="text-center">
                    <h1 class= "display-4 mt-2 text-danger"> Thank You!</h1>
                    <h2 class= " mt-2 text-success"> Your order Placed Successfully!</h2>
                    <h4 class= "bg-danger text-light rounded p-2">Items Purchased: '.$products.'</h4>
                    <h4 class= "text-light">Your Name: '.$name.'</h4>
                    <h4 class= " text-light">Your E-mail: '.$email.'</h4>
                    <h4 class= " text-light">Your Phone No.: '.$phone.'</h4>
                    <h4 class= "text-light">Your Total Amount Paid: '.number_format($grand_total,2).'</h4>
                    <h4 class= "textlight">Your Payment Mode: '.$pmode.'</h4>
              </div>';

    echo $data;
}

?>



<?php 
// Include Configuration file
include_once 'config.php';

// Include DataBase Connection File.
include_once 'dbConnect.php';



$paymentData = '';
if (!empty($_GET['tx']) && !empty($_GET['amt']) && $_GET['st'] == 'Completed') {
	# code...
	// Get the Transaction Information from URL
	$txn_id = $_GET['tx'];
	$payment_gross = $_GET['amt'];
	$txn_id = $_GET['cc'];
	$txn_id = $_GET['tx'];

	// Check if transaction data exist with the same txn ID
	$prevPaymentResult =  $conn->query("SELECT * FROM payments WHERE txn_id='".$txn_id."'");
	if ($prevPaymentResult->num_rows > 0) {
		# code...
		// Get payment Info from database
		$paymentData =   $prevPaymentResult-fetch_assoc();

		// Order detail
		$orderResult =  $conn->query("SELECT * FROM orders WHERE id=".$paymentData['order_id']);
		$orderData  =   $orderResult->fetch_assoc();

		//Order Items
		$orderItemsResult  =  $conn->query("SELECT i.*, pr.name FROM payments AS P LEFT JOIN order_items AS i ON i.order_id=p.order_id LEFT JOIN  products AS pr ON pr.id = i.product_id WHERE p.id=".$paymentData['id']);

	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Payments</title>
</head>
<body>
	<div class="container">
		<div class="row">

		<h1> PayPal Payments Status</h1>
			<div class="col-md-5 col-lg-6">
				<div class="status">
					<?php
					if (!empty($paymentData)) { ?>
						<h1 class="success">Your payment has been successful</h1>

						<h4>Order Information:</h4>
						<p><b>Order ID: </b> <?php echo $orderData['id'];?></p>
						<p><b>Total Items: </b> <?php echo $orderData['total_qty'];?></p>
						<p><b>Order Total: </b> <?php echo $orderData['total_amount'];?></p>

                        <h4>Payment Information:</h4>
						<p><b>Reference Number: </b> <?php echo $paymentData['id'];?></p>
						<p><b>Transaction ID: </b> <?php echo $paymentData['txn_id'];?></p>
						<p><b>Payment amount: </b> <?php echo $paymentData['payment_gross']. ' '.$paymentData['currency_code'];?></p>
                        <p><b>Payment Status: </b> <?php echo $paymentData['payment_status'];?></p>

                        <h4>Order Items:</h4>
                        <?php if ($orderItemsResult->num_rows > 0) { ?>
                            <table>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Gross Amount</th>
                                </tr>
                                <?php $i=0; while ($item = $orderItemsResult->fetch_assoc()) { $i++;?>
                                    <tr>
                                        <td align="center"> <?php echo $i; ?></td>
                                        <td align="center"> <?php echo $item['name']; ?></td>
                                        <td align="center"> <?php echo $item['quantity']; ?></td>
                                        <td align="center"> <?php echo '$'.$item['gross_amount']; ?></td>
                                    </tr>
                               <?php } ?>
                            </table>
                        <?php } ?>
                        <?php }else{?>
                        <h1 class="error">Your Payment was not Successful, please try again</h1>
					<?php
					 }
					?>
				</div>

			</div>
		</div>
		<a href="shop.php" class="btn-link">Back to Store</a>
	</div>
</body>
</html>