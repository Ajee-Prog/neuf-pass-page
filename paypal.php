<?php include('Incl/header.php');
//session_start();

if (!empty($_SESSION['pay'])) {
    // echo $_SESSION['pay'] = "";
    $pay = $_SESSION['pay'];
}
if (!empty($_SESSION['ordder_id'])) {
    // echo $_SESSION['order_id'];
    $id = $_SESSION['order_id'];
}

?>

// <form action="" method="post">

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="buyCredits" name="buyCredits">
    <!-- <input type="hidden" name="cmd" value="_cart"> -->
    <!-- Specify a Buy now button -->
    <input type="hidden" name="cmd" value="_xclick">
    <!-- Identify your business so that you can collect the Payments -->
    <input type="hidden" name="business" value="ajee_programmers@yahoo.com">
    <input type="hidden" name="upload" value="1">';
    <!-- Specify details about the Item that a Buyer will Purchase -->
    <!-- <input type="hidden" name="item_name" value="<?php  //echo $pay; ?>"> -->
    <input type="hidden" name="amount_'.$x.'" value="<?php echo $pay; ?>">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="return" value="http://localhost/payment_success.php?id=<?php echo $id; ?>">';
      
    <!-- $x=0; -->


</form>
<script src="">
    document.getElementById('buyCredits').submit();
</script>



