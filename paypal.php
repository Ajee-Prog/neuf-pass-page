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



<!-- PayPal -->



<form target="_self" action="<?php echo PAYPAL_URL; ?>" method="post">
                        // <!-- iDENTIFY yOUR bUSINESS sO THAT YOU CAN COLLECT THE PAYMENTS -->
                            <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                            <!-- SPECIFY THE PAYPAL SHOPPING CART ADD TO CART BUTTON -->
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">';
                          
                        $x=0;
                        <!-- // neufworldwide@gmail.com
                        // DB-Old here
                        // $query = mysqli_query($con,$sql);
                        // while($row=mysqli_fetch_array($query)){
                        //     $x++;

                        //My DataBase FETCH config -->

                        <!-- /**$grand_total = 0;
                        $allItems = '';
                        $items = array();

                        $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart ";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $result = $stmt->get_result();

                        while($row = $result->fetch_assoc()){
                            $x++;
                            $grand_total +=$row['total_price'];
                            $items[] = $row['ItemQty'];**/ -->

                        <!-- //}
                        // $allItems = implode(", ", $items);

                        // New METHD
                        //             $stmt = $conn->prepare("SELECT * FROM cart");
                        //   $stmt->execute();
                        //   $result = $stmt->get_result();
                        //   $grand_total = 0;
                        //   while($row = $result->fetch_assoc()):
                            // $grand_total +=$row['total_price']; -->

<?php
                    include('config.php');
                        $stmt = $conn->prepare("SELECT * FROM cart");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $grand_total = 0;
                        while($row = $result->fetch_assoc()){
                            $x++;
                            $grand_total +=$row['total_price'];
                            $row['product_name'];
                        

?>
                            <!-- //  $results    =   $conn->query("SELECT * FROM products");

                            // while ($row=$results->fetch_assoc()) {
                            //   $items =  $row['product_name'];

                              //echo $items; -->
                                
              
                        
                            <!-- // echo  	
                            //     '<input type="hidden" name="item_name_'.$x.'" value="'.$products.'">
                                 
                            //      <input type="hidden" name="amount" value="'.$grand_total.'">
                            //     /<input type="hidden" name="quantity_'.$x.'" value="'.$row['qty'].'">';
                            // }
                            //$allItems = implode(", ", $items);

                            echo  	
                            // '<input type="hidden" name="item_name_'.$x.'" value="'.$products.'">
                             
                            //  <input type="hidden" name="amount" value="'.$grand_total.'">
                            // /<input type="hidden" name="quantity_'.$x.'" value="'.$row['qty'].'">
                             -->
                            

                            '<!-- SPECIFY THE DETAILS ABOUT THE ITEMS THAT BUYER WILL PURCHASE/ BUY -->
                            <input type="hidden" name="item_name" value="<?php echo $items; ?>">
                            <input type="hidden" name="item_number" value="<?php echo $items; ?>">
                            <input type="hidden" name="amount" value="<?php echo $grand_total; ?>">
                            <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
                            
                            
                            ';
                        }
                          
                        echo   
                            '<input type="hidden" name="return" value="http://localhost:1992/xampp/neuf-pass-page/success.php"/>
                                <input type="hidden" name="notify_url" value="http://localhost:1992/xampp/neuf-pass-page/success.php">
                                <input type="hidden" name="cancel_return" value="http://localhost:1992/xampp/e-comerce/cancel.php"/>
                                <input type="hidden" name="currency_code" value="USD"/>
                                
    <?php } ?>
                                <input style="float:right;margin-right:120px; margin-top:80px; width="400" " type="image" name="submit"
                                    src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_buynowCC_LG.gif" border="0"  name="submit" alt="PayPal Checkout"
                                    alt="PayPal - The safer, easier way to pay online">
                            </form></div>';

                            echo  '
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
             </form></div>         
                <!-- </?php }

             ?> -->



