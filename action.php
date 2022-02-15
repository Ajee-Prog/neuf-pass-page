<?php
session_start();
require 'config.php';

if(isset($_POST['pid'])){

    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pprice = $_POST['pprice'];
    $pimage = $_POST['pimage'];
    $pcode = $_POST['pcode'];
    $psmall = $_POST['psmall'];
    $pmedium = $_POST['pmedium'];
    $plarge = $_POST['plarge'];
    $pxlarge = $_POST['pxlarge'];


    
    // $pqty = $_POST['pqty'];
    // $total_price = $pprice * $pqty;

    if (isset($_POST['pid'] ) && isset($_POST['pid'] )==(isset($_POST['product_small']) || isset($_POST['product_medium']) || isset($_POST['product_large']) || isset($_POST['product_xlarge'])) && (!empty($_POST['product_small']) || !empty($_POST['product_medium']) || !empty($_POST['product_large']))) {
            # code...
            $query = $conn->prepare("INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code,product_size)VALUES(?,?,?,?,?,?,?)");
            $query->bind_param("sssisss",$pname,$pprice,$pimage,$pqty,$pprice,$pcode, $product_size);
            $query->execute();
        }

    /**To use $_SESSION[] variable
      with or without ajax

      //$_SESSION['cart'][] = array('productID'=>$pid,
                                    'productName'=>$pname, 
                                    'productPrice'=>$pprice, 
                                    'productImage'=>$pimage, 
                                    'productCode'=>$pcode
                                header("location:viewCart.php")
                            );
    */
    // By default I will assign pqty of added Product as 1
    $pqty = 1;
    // Check if any product is already in dataBase Then display a message
    $stmt = $conn->prepare("SELECT product_code FROM cart WHERE product_code=?");
    // Using product_code Because is UNIQUE in the TABLE
    $stmt->bind_param("s",$pcode);
    $stmt->execute();
    $res = $stmt->get_result();
    // Create one Variable
    $r = $res->fetch_assoc();
    // Create one more Variable To FETCH product_code from cart
    // $code = $r['product_code'] ?? '';
    $code = $r['product_code'];

    // Check if product code is not Present in the Cart Table
    if(!$code){
        $query = $conn->prepare("INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code)VALUES(?,?,?,?,?,?)");
        $query->bind_param("sssiss",$pname,$pprice,$pimage,$pqty,$pprice,$pcode);
        $query->execute();

        // Send a Message to a/the Client
        echo'<div class="alert alert-success alert-dismissible mt-2">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <strong>Item Added To Your Cart!</strong> 
                </div>';
    }else{
        // Send a Message to a/the Client
        echo '<div class="alert alert-danger alert-dismissible mt-2">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <strong>Item already Added To Your Cart!</strong> 
                </div>';
    }

}

// Car number Increment / Decrement
if(isset($_GET['cartItem']) && isset($_GET['cartItem'])=='cart_item'){
    $stmt = $conn->prepare("SELECT * FROM cart");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows();
    echo $rows;
}
// Delete Cart
if(isset($_GET['remove'])){
    $id = $_GET['remove'];
    $stmt= $conn->prepare("DELETE FROM cart WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'Item removed from the Cart';
    header('location:cart.php');
}
// clear all cart
if(isset($_GET['clear'])){
    $stmt= $conn->prepare("DELETE FROM cart");
    $stmt->execute();

    $_SESSION['showAlert'] = 'block';
    $_SESSION['message'] = 'All Item removed from the Cart';
    header('location:cart.php');
}

// Qty update function from ajax

if(isset($_POST['qty'])){
    // grab qty variables
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $pprice = $_POST['pprice'];
    // new added for testing Quantity
    if ($qty < 1) {
        $qty = 1;
    }

    $tprice = $qty * $pprice;
    $stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=? ");
    $stmt->bind_param("isi", $qty,$tprice,$pid);
    $stmt->execute();

}




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

    $stmt2 = $conn->prepare('DELETE FROM cart');
    $stmt2->execute();
    $data .= '<div class="text-center borde px-5">
                    <br>
                    <br>
                    <br>
                    

                    <h1 class= "display-4 mt-5 text-light"> Thank You!</h1>
                    
                    
              </div>';

                // echo $data;
                // <h2 class= " mt-2 text-light"> Kindly Click PayPal to make Payment</h2>
                // <h4 class= "bg-secondary text-light rounded p-2">Items Purchased: '.$products.'</h4>
                    // <h4 class= "text-light">Name: '.$name.'</h4>
                    // <h4 class= " text-light">E-mail: '.$email.'</h4>
                    // <h4 class= " text-light">Phone No.: '.$phone.'</h4>
                    // <h4 class= "text-light">Total Amount Paid: '.number_format($grand_total,2).'</h4>
                    // <h4 class= "textlight">Payment Mode: '.$pmode.'</h4>


            //   Only need two things for payment GateWay
            // Product name AND Product total_price/grand_total 

            /** //EXAMPLE Heck or Comparing
             * $grand_total = 0;
                     *   $allItems = '';
                     *   $items = array();

                     *   $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart ";
                     *   $stmt = $conn->prepare($sql);
                     *   $stmt->execute();

                      *  $result = $stmt->get_result();

                     *   while($row = $result->fetch_assoc()){
                     *       $grand_total +=$row['total_price'];
                     *       $items[] = $row['ItemQty'];
                     *   }
                     *   // echo $grand_total;
                     *   // print_r($items);
                     *   $allItems = implode(", ", $items);
                     *   // echo $allItems;

                     *   // Design Checkout Page
             */

            
            // PayPal redirect INTEGRATION

            // if(isset($_SESSION["uid"])){
                //Paypal checkout form
                echo $data .=  '
                    <!-- </form> -->


                    
                    <div class=" justify-content-center">
                    

                    // old form here

                        <form target="_self" action="<?php echo PAYPAL_URL; ?>" method="post">
                        // <!-- iDENTIFY yOUR bUSINESS sO THAT YOU CAN COLLECT THE PAYMENTS -->
                            <input type="hidden" name="business" value="<?php echo PAYPAL_ID; ?>">

                            <!-- SPECIFY THE PAYPAL SHOPPING CART ADD TO CART BUTTON -->
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="add" value="1">';
                          
                        $x=0;
                        // neufworldwide@gmail.com
                        // DB-Old here
                        // $query = mysqli_query($con,$sql);
                        // while($row=mysqli_fetch_array($query)){
                        //     $x++;

                        //My DataBase FETCH config

                        /**$grand_total = 0;
                        $allItems = '';
                        $items = array();

                        $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart ";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        $result = $stmt->get_result();

                        while($row = $result->fetch_assoc()){
                            $x++;
                            $grand_total +=$row['total_price'];
                            $items[] = $row['ItemQty'];**/

                        //}
                        // $allItems = implode(", ", $items);

                        // New METHD
                        //             $stmt = $conn->prepare("SELECT * FROM cart");
                        //   $stmt->execute();
                        //   $result = $stmt->get_result();
                        //   $grand_total = 0;
                        //   while($row = $result->fetch_assoc()):
                            // $grand_total +=$row['total_price'];


                        $stmt = $conn->prepare("SELECT * FROM cart");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $grand_total = 0;
                        while($row = $result->fetch_assoc()){
                            $x++;
                            $grand_total +=$row['total_price'];
                            $row['product_name'];
                        


                            //  $results    =   $conn->query("SELECT * FROM products");

                            // while ($row=$results->fetch_assoc()) {
                            //   $items =  $row['product_name'];

                              //echo $items;
                                
              
                        
                            // echo  	
                            //     '<input type="hidden" name="item_name_'.$x.'" value="'.$products.'">
                                 
                            //      <input type="hidden" name="amount" value="'.$grand_total.'">
                            //     /<input type="hidden" name="quantity_'.$x.'" value="'.$row['qty'].'">';
                            // }
                            //$allItems = implode(", ", $items);

                            echo  	
                            // '<input type="hidden" name="item_name_'.$x.'" value="'.$products.'">
                             
                            //  <input type="hidden" name="amount" value="'.$grand_total.'">
                            // /<input type="hidden" name="quantity_'.$x.'" value="'.$row['qty'].'">
                            
                            

                            '<!-- SPECIFY THE DETAILS ABOUT THE ITEMS THAT BUYER WILL PURCHASE/ BUY -->
                            <input type="hidden" name="item_name" value="<?php echo $items; ?>">
                            <input type="hidden" name="item_number" value="<?php echo $items; ?>">
                            <input type="hidden" name="amount" value="<?php echo $grand_total; ?>">
                            <input type="hidden" name="currency_code" value="<?php echo PAYPAL_CURRENCY; ?>">
                            
                            
                            ';
                        }
                          
                        echo   
                            '<input type="hidden" name="return" value="http://localhost:1992/xampp/Neuf-Pass-page/success.php"/>
                                <input type="hidden" name="notify_url" value="http://localhost:1992/xampp/e-comerce/success.php">
                                <input type="hidden" name="cancel_return" value="http://localhost:1992/xampp/e-comerce/cancel.php"/>
                                <input type="hidden" name="currency_code" value="USD"/>
                                
}
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
             </form></div>            <?php }

             ?>
                            ';
                           
 
 // Old-form
// <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
    //     <input type="hidden" name="cmd" value="_cart">
    //     <input type="hidden" name="business" value="ajee_programmers@yahoo.com">
    //     <input type="hidden" name="upload" value="1">';

    // //$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";


    // }
            //echo $data;

            // Belongs to the space above
            //<input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
            // <input type="hidden" name="custom" value="'/** .$_SESSION["uid"].'*/"/> -->

   }   ?>