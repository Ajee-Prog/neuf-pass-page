<?php
// session_start();
// session_destroy();

include 'config.php';
// unset($_SESSION['cart_t']);
$grand_total = 0;
// $total_qty = 0;
$allItems = '';
$items = array();

$sql = "SELECT *, CONCAT(product_name, '(',qty,')') AS ItemQty, total_price, product_image FROM cart ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $grand_total +=$row['total_price'];
    // $total_qty +=$row['qty'];
    $items[] = $row['ItemQty'];
}
// echo $grand_total;
 print_r($items).".\n."; 
 foreach($items as $item){
     echo $item;
     echo "<br>";
 }
$allItems = implode(", ", $items);
// echo $allItems;

// Design Checkout Page






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    
    <!-- Font Awesome Link -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <title>Checkout</title>
    <link rel="icon" href="images/web logo.png">
</head>
<body>



    <div class="title">
        <h2>Neuf Worldwide</h2>
    </div>


    <section class="checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 my-auto" id="order">
                    
                    <h6>Shipping Address</h6>
                    <form action="" method="post" id="placeOrder" >
                        <input type="hidden" name="products" value="<?= $allItems; ?>">
                        <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                        <input type="text" name ="first_name" placeholder="First name" class="input-1">
                        <input type="text" name="last_name" placeholder="Last name" class="input-2"><br>
                        <input type="text" name ="email" placeholder="Email" class="input-3">
                        <input type="text" name="phone" placeholder="Phone" class="input-4"><br>
                        <input type="text" name ="country" placeholder="Country" class="input-3">
                        <input type="text" name="state" placeholder="State" class="input-4"><br>
                        <!-- <input type="text" name="address" placeholder="Address" class="input-5"><br>--> 
                        <textarea name="address" id="" class="form-control fst-italic input-5" cols="10" rows="3" placeholder="Address"></textarea><br>

                        
                        <select class="pay" name="pmode">
                            <option value="none" selected>--Payment Method--</option>
                            <option value="PayPal">Paypal</option>
                            <option value="Debit/Credit">Debit/Credit</option>
                            <option value="other">Paystack</option>
                        </select>
                        <!-- Place Order Button -->
                        <!-- <button class="place" name="submit" id="submit">Place Order </button> -->
                        <input type="text" name="city" placeholder="City" class="input-4"> <br>
                        <input type="submit" name="submit" nam="pay_now" id="submit" value="Place Order" style="background-color:black;" class="btn btn-secondary bg-dar  mt-2 btn-outline-light btn-block form-control input-5" >
                    </form>
                    
                </div>


                <div class="col-lg-5 col-md-12"> 
                <?php
              //include ('config.php');
              $stmt = $conn->prepare("SELECT * FROM cart");
              $stmt->execute();
              $result = $stmt->get_result();
              // $total_qty = 0;
              $grand_total = 0;
              while($row = $result->fetch_assoc()):
                

            ?>
            <?php $grand_total +=$row['total_price'];?>
                    <div class="img-logo">
                        <img src="<?= $row['product_image'];?>" alt=""><span> <?= $row['product_name'];?>  <span class="check-price"> $ $<?= number_format($row['product_price'],2);?> $60.00</span></span><br>
                        <!-- <img src="images/shirt.png" alt=""><span>Black Denim Shirt <span class="check-price">$60.00</span></span><br>
                        <img src="images/shirt.png" alt=""><span>Black Denim Shirt <span class="check-price">$60.00</span></span> -->
                    </div>
                    <?php endwhile;?>
                    <p class="total">&nbsp; &nbsp; &nbsp;Total: &nbsp; &nbsp; &nbsp; $<?= number_format($grand_total,2);?></p>
                </div>
            </div>
        </div>
        
        
    </section>






    <?php include('Incl/footer.php'); ?>
<!-- jQuery library  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="index.js"></script>




      <!-- Ajax -->

      <script  type="text/javascript">
            $(document).ready(function(){
                // Send Order request to the SERVER
                $("#placeOrder").submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        data: $('form').serialize()+"&action=order",
                        success: function(response){
                            $("#order").html(response);
                            // load_cart_item_number();
                        }
                    });
                });
                
                // Call the function
                load_cart_item_number();
                // Update cart Item number
                function load_cart_item_number(){
                    $.ajax({
                        url: 'action.php',
                        method: 'get',
                        data: {cartItem:'cart_item'},
                        success: function(response){
                            $('#cart-item').html(response);
                        }
                    });
                }
            });
        </script>













    </body>
</html>