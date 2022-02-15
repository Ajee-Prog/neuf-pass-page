<?php
// Include Configuration file
include_once 'config.php';

// Include DataBase Connection File.
include_once 'dbConnect.php';

    /**
     * Read POST Data
     * Reading POsted data directly from $_POST causes serialization
     * issues with array data POST
     * Reading raw POST data from input stream instead. */

 $raw_post_data = file_get_contents('php://input');
 $raw_post_array = explode('&', $raw_post_data);

 $myPost = array();
 foreach ($raw_post_array as $keyval) {
    $keyval = explode('=', $keyval);
    if (count($keyval) == 2) {
        $myPost[$keyval[0]] = urldecode($keyval[1]);
    }
    //Read the POST from paypal system and add 'cmd'
    $req = 'cmd=_notify-validate';
    if (function_exists('get_magic_quotes_gpc')) {
        $get_magic_quotes_exist = true;
    }
    foreach ($myPost as $key => $value) {
        if ($get_magic_quotes_exist = true && get_magic_quotes_gpc()==1) {
            $value = urlencode(stripslashes($value));
        }else {
            $value = urlencode($value);
        }
        $req .="'&$key = $value";
    }
    /**
     * post IPN data back to Paypal to validate IPN data is genuine 
     * without this step, anyone can fake the IPN data
     */
    $paypalURL = PAYPAL_URL;
    $ch = curl_init($paypalURL);
    if ($ch == FALSE) {
        return FALSE;
    }
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELD, $req);
    curl_setopt($ch, CURLOPT_SSLVERSION, 6);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    //Set TCP Timeout to 30 seconds
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connect:Close','User-Agent:company-name'));
    $res = curl_exec($ch);
    /**
     * Inspact IPN validation result and act accordinly
     * split respond Header and payload, a better way for strcmp
     */
    $tokens = explode("\r\n\r\n", trim($res));
    $res = trim(end($tokens));
    if (strcmp($res, "VERIFIED")==0 || strcasecmp($res, "VERIFIED")==0 ) {
        // Retrieve transaction data from Paypal
        $paypalInfo = $_POST;
        $txn_id = !empty($paypalInfo['txn_id'])?$paypalInfo['txn_id']:'' ;
        $payment_gross = !empty($paypalInfo['mc_gross'])?$paypalInfo['mc_gross']:0 ;
        $currency_code = $paypalInfo['mc_currency'];
        $payment_status = !empty($paypalInfo['payment_status'])?$paypalInfo['payment_status']:'' ;
        $payerFirstName = !empty($_POST['first_name'])?$_POST['first_name']:'' ;
        $payer_name = !empty($_POST['last_name'])?$payerFirstName.' '.$_POST['last_name']:$payerFirstName ;
        $payer_name = filter_var($payer_name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH) ;
        $payer_email = $paypalInfo['payer_email'] ;

        $num_cart_items = $_POST['num_cart_items'];

        if (!empty($txn_id)) {
            // check if the Transaction data txn_id exist with the same TXN
            $prevPayment =$db->query("SELECT id FROM payments WHERE txn_id='".$txn_id."'") ;

            if ($prevPayment->num_rows > 0) {
                exit();
            }else {
                // Insert order data into the database
                $insertOrder = $db->query("INSERT INTO orders(total_qty,total_amount)VALUES($num_cart_items,'".$payment_gross."')");

                if ($insertOrder) {
                    $order_id = $db->insert_id;
                    // Insert transaction data into the database
                    $insertPayment = $db->query("INSERT INTO payments(order_id, payer_name,payer_email, txn_id,payment_gross,currency_code,payment_status)VALUE($order_id, '".$payer_name."', '".$payer_email."', '".$txn_id."', '".$payment_gross."', '".$currency_code."', '".$payment_status."')");
                    if ($insertPayment) {
                        $payment_id = $db->insert_id;

                        // Insert Order Item into the database
                        for ($i=0; $i < $num_cart_items; $i++) { 
                            $order_item_number = $_POST['item_number'.$i];
                            $order_item_quantity = $_POST['quantity'.$i];
                            $order_item_gross_amount = $_POST['mc_gross'.$i];

                            $insertOrderItem = $db->query("INSERT INTO order_items(order_id, product_id, quantity, gross_amount)VALUES('".$order_item_number."', '".$order_item_quantity."','".$order_item_gross_amount."')");

                        }
                    }
                }
            }
        }
    }
    die;
 }
    


?>