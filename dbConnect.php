<?php
//Connect with DATA
$db = new mysqli(DATABASE_HOST, DATABASE_USRERNAME, DATABASE_PASSWORD, DATABASE_NAME);

//Display Error if Fail to connect
if ($db->errno) {
    # code...
    printf("Connect Faaild: %s\n", $db->connect_error);
    exit();
}


//this is for index.php store products php
?>
<?php

$results    =   $db->query("SELECT * FROM products");

while ($row=$results->fetch_assoc()) {
    # code...
    ?>
    <div class="pro-box">
        <img src="images/<?php echo $row['image']; ?>" alt="">
        <p>Name: <?php echo $row['product_name']; ?></p>
        <p>Price: <?php echo $row['product_price']; ?></p>
        <form target="_self" action="<?php echo PAYPAL_URL; ?>" method="post">
        <!-- iDENTIFY yOUR bUSINESS sO THAT YOU CAN COLLECT THE PAYMENTS -->
            <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

            <!-- SPECIFY THE PAYPAL SHOPPING CART ADD TO CART BUTTON -->
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="add" value="1">

            <!-- SPECIFY THE DETAILS ABOUT THE ITEMS THAT BUYER WILL PURCHASE/ BUY -->
            <input type="hidden" name="item_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="item_number" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="amount" value="<?php echo $row['product_price']; ?>">
            <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">

            <!-- SPECIFY URLs -->
            <input type="hidden" name="shopping_url" value="<?php echo CONTINUE_SHOPPING_URL; ?>">
            <input type="hidden" name="cancel_return" value="<?php echo PAYPAL_CANCEL_URL; ?>">
            <input type="hidden" name="return" value="<?php echo PAYPAL_RETURN_URL; ?>">
            <input type="hidden" name="notify_url" value="<?php echo PAYPAL_NOTIFY_URL; ?>">

            <!-- Display the Payment Button -->
            <input type="image" name="submit" 
            src="https://www.paypaobjects.com/webstatic/en_US/i/btn/png/btn_addtocart_120x26.png"
             alt="Add to Cart">
             <img width="1" height="1" src="https://www.paypaobjects.com/en_US/i/scr/pixel.gif" alt="">

            
        </form>
    </div>
<?php } ?>

?>