<?php

if (!empty($_GET['paymentID']) && !empty($_GET['token']) && !empty($_GET['payerID']) && !empty($_GET['pid'])) {
    # code...
    include_once('Paypal.class.php');
    $paypal = new PaypalApi;
    $paymentID = $_GET['paymentID'];
    $token = $_GET['token'];
    $payerID = $_GET['payerID'];
    $productID = $_GET['pid'];

    $paymentInfo = $paypal->validate($paymentID, $token, $payerID, $productID);

    if ($paymentInfo && $paymentInfo->state == 'approved') {
        # code...
        $id = $paymentInfo->id;
        $state = $paymentInfo->state;
        $payerFirstName = $paymentInfo->payer->payer_info->first_name;
        $payerLastName = $paymentInfo->payer->payer_info->last_name;

        $payerName = $payerFirstName. ' '.$payerLastName;
        $payerEmail = $paymentInfo->payer->payer_info->email;
        $payerID = $paymentInfo->payer->payer_info->payer_id;
        $payerCountryCode = $paymentInfo->payer->payer_info->country_code;

        $amount_paid = $paymentInfo->transactions[0]->amount->details->subtotal;
        $currency = $paymentInfo->transactions[0]->amount->currency;
        include('database/db.php');


    }


}else {
    header("Location:store.php");
    exit;
}


?>