<?php
include 'config.php';
// unset($_SESSION['cart_t']);

// START NEW Code
$message = "";
if (isset($_POST['submit'])) {
  $fname = test_input($_POST['first_name']);
  $lname = test_input($_POST['last_name']);
  $email = test_input($_POST['email']);
  $phone = test_input($_POST['phone']);
  $address = test_input($_POST['address']);
  $pmode = test_input($_POST['pmode']);
  $city = test_input($_POST['city']);
  $query = "INSERT INTO checkout_address VALUES('', '$fname', '$lname', '$email', '$phone', '$address', '$pmode', '$city' )";
  if (!$conn->query($query)) {
    $message .='<div class="alert alert-danger">Failed to Continue..!!</div>';
  }else {
    $l_id = $conn->insert_id;
    $_SESSION['order_id'] = $l_id;
    header("refresh:1; url=http://localhost/paypal.php");
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// END NEW Code
// END NEW Code
$grand_total = 0;
$allItems = '';
$items = array();

$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();

while($row = $result->fetch_assoc()){
    $grand_total +=$row['total_price'];
    $items[] = $row['ItemQty'];
}
// echo $grand_total;
// print_r($items);
$allItems = implode(", ", $items);
// echo $allItems;

// Design Checkout Page






?>

<!-- Designing the Checkout Page -->

<?php //session_start();
include('Incl/header.php'); //session_destroy(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body style="overflow: auto;">

<div class="container mt-4 w-50 mb-4"> <?php echo $message;?></div>
<div class="container " style="overflow: auto;">
  <div class="row justify-content-center">
    <div class="col-lg-4 px-4 pb-4" id="order">
            <h4 class="text-center text-secondary p-2">Complete Your Order!</h4>
            <!-- <div class="jumbotron p-3 mb-2 text-center text-light">
                <div class= "lead text-info"><h6 class= "lead text-light"><b>Product(s) Name  :</b> <?= $allItems;?></h6></div>
                <h6 class= "lead text-info"><b>Delivery Charge  :</b> Free.</h6>
                <hr />
                <h5 class= "lead text-info"><b>Total Amount Payable  :</b> $<?= number_format($grand_total,2);?></h5>
            </div> -->
            <form class="row g- bg-secondary" action=" https://www.sandbox.PayPal.com/cgi-bin/webscr"     " https://www.paypal.com/cgi-bin/webscr" method="POST" id="placeOrder" autocomplete="on">
                <input type="hidden" name="products" value="<?= $allItems; ?>">
                <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                <div class="form-group mb-3 mt-3">
                    <input type="text" name="name" class="form-control text-dark fst-italic" placeholder=" Name.." required>                    
                </div>
                <div class="form-group mb-3 outline-light">
                    <input type="email" name="email" class="form-control outline-light fst-italic" placeholder=" E-mail.." required>                    
                </div>
                <div class="form-group mb-3 outline-light">
                    <input type="tel" name="phone" class="form-control fst-italic" placeholder=" Phone No.." required>                    
                </div>
                <div class="form-group mb-3">
                    <textarea name="address" id="" class="form-control fst-italic" cols="10" rows="3" placeholder=" Shipping Address" required></textarea>                    
                </div>
                <h6 class="text-center lead text-light">Payment Mode</h6>
                <div class="form-group mb-3  outline-light">
                    <select name="pmode" id="" class="form-control ">
                        <option value="" selected disabled>-Select Payment Mode-</option>
                        <option value="cod" disable>PayPal</option>
                        <option value="netbanking" disabled>Net Banking</option>
                        <option value="cards"  disabled>Debit/Credit Card</option>
                    </select>                    
                </div>
                  <div class="form-group mb-2">
                    <!-- Neuf paypal -->
                    <!-- ``<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                          <input type="hidden" name="cmd" value="_s-xclick">

                          <input type="hidden" name="business" value="oluwatosinjibodu@yahoo.com">
                          <input type="hidden" name="products" value="<?= $allItems; ?>">
                          <input type="hidden" name="item-number" value="1">
                          <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
                          <input type="hidden" name="no_shipping" value="0">
                          <input type="hidden" name="no_note" value="1">
                          <input type="hidden" name="currency_code" value="USD">
                          <input type="hidden" name="bn" value="pp-BuyNowBy"> -->



                          <!-- <input type="hidden" name="hosted_button_id" value="XP47N6YLYFLMA">
                          <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"> -->
                      <!-- </form> -->
                    <!-- PayPal -->
                      <div id="paypal-button"></div>
                      <input type="submit" name="submit" name="pay_now" id="submit" value="Place Order" class="btn btn-secondary btn-outline-light btn-block form-control" style="background:white;" >
                  </div>





                <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">

                        <input type="hidden" name="business" value="oluwatosinjibodu@yahoo.com">
              <input type="hidden" name="item_name" value="c-sharp_order">
              <input type="hidden" name="item-number" value="1">
              <input type="hidden" name="amount" value="<//?= //number_format($grand_total,2);?>">
              <input type="hidden" name="no_shipping" value="0">
              <input type="hidden" name="no_note" value="1">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="bn" value="pp-BuyNowBy">



                        <input type="hidden" name="hosted_button_id" value="XP47N6YLYFLMA">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                  </form> -->








                <!-- PayPal -->
                <div id="paypal-button-container"></div>
            </form>
            <!-- PayPl Buttonnnnnns -->
            <div class="col-lg-4">
              <!-- Configure Paypal environment (script tags) -->
              <script src="https://www.paypalobjects.com/api/checkout.js"></script>
            </div>


            <script>
    //   paypal.Buttons.render({
    //     //configure environment
    //     env: 'sandbox',
    //     client: {
    //       sandbox: ' demo_Sandbox_client_ID example here....',
    //       //production: 'demo_production_client_id'
    //     },
    //       //customize button Optional
    //       locale: 'en_US',
    //       style: {
    //         size: 'small',
    //         color:'gold',
    //         shape: 'pill'

    //     },
    //     //enable Pay Now Checkout button (Optional)
    //     commit: true,

    //     // Sets up the transaction when a payment button is clicked
    //     // createOrder: function(data, actions) {
    //       //Set up a Payment
    //       payment: function(data, actions) {
    //       // return actions.order.create({
    //         return actions.payment.create({
    //         // purchase_units: [{
    //           transactions: [{
    //           amount: {
    //             // value:  '<?//php echo $grand_total; ?>',     // '77.44' // Can reference variables or functions. Example: `value: document.getElementById('...').value` 
    //             total:  '<?php echo $grand_total; ?>',
    //             currency: 'USD'
    //           }
    //         }]
    //       });
    //     },

    //     // Finalize the transaction after payer approval
    //     //onApprove: function(data, actions) {

    //       // execute the payment
    //       onAuthorize: function(data, actions) {
    //       // return actions.order.capture().then(function(orderData) {
    //         return actions.payment.execute().then(function() {
    //         // Successful capture! For dev/demo purposes:

    //         //Show a confirmation message to the buyer
    //         // window.alert('Thank you for your Purchase');

    //         window.location = "process.php?paymentID="+data.paymentID+"&token="+data.paymentToken+"payerID="+data.payerID+"&pid=<?php echo $row['id'];//echo data['id'];?>";





    //             // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
    //             // var transaction = orderData.purchase_units[0].payments.captures[0];
    //             // alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

    //         // When ready to go live, remove the alert and show a success message within this page. For example:
    //         // var element = document.getElementById('paypal-button-container');
    //         // element.innerHTML = '';
    //         // element.innerHTML = '<h3>Thank you for your payment!</h3>';
    //         // Or go to another URL:  actions.redirect('thank_you.html');
    //       });
    //     }
    //   // }).render('#paypal-button-container');
    // }, '#paypal-button');

    </script>

    <!-- END PayPal BUTTON JS -->



            <!-- Paypal button code -->
            <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
              <input type="hidden" name="cmd" value="_s-xclick">
              <input type="hidden" name="business" value="oluwatosinjibodu@yahoo.com">
              <input type="hidden" name="item_name" value="c-sharp_order">
              <input type="hidden" name="item-number" value="1">
              <input type="hidden" name="amount" value="<?php //echo $grand_total; ?>">
              <input type="hidden" name="no_shipping" value="0">
              <input type="hidden" name="no_note" value="1">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="bn" value="pp-BuyNowBy">



              <input type="hidden" name="hosted_button_id" value="N6SBBDZB8ECLY">
              <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
              <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form> -->

        </div>
        <div class="col-lg-4 px-4 pb-4 borde bg-secondar"  id=order> 
            <div class="row">
              <div class= "lead text-info mx-2">
              <!-- <hr> -->
              <br>
              <br>
              <br>
              <!-- <br> -->
                <h6 class= "lead text-secondary mt-5 text-center"><b>Product(s) Name  :</b>
                <!-- <hr> -->
              </div>
          </div>
          <div class="jumbotron p-3 mb-2 text-center text-light">
                <!-- <div class= "lead text-info"><h6 class= "lead text-light"><b>Product(s) Name  :</b> <?= $allItems;?></h6></div> -->
                <div class= "lead text-info">
                  <h6 class= "lead text-light fw-lighter fst-italic">
                     <?= $allItems;?>
                </h6>
                <hr>
              </div>
                <h6 class= "lead text-secondary fst-italic"><b>Delivery Charge  : </b> <span class = " text-light"> Free</h6></span> 
                <hr />
                <h5 class= "lead text-secondary mt-5"><b>Total Amount  :</b> <span class = " text-light"> $<?= number_format($grand_total,2);?></h5> </span>
            </div>
          </div>
    </div>
              
</div>
<!-- END of New Show Case -->
<!-- Hold Show Case -->
<!-- <div class="container mt-5">
  <div class="row">
    <div class="col-lg-3">
      <form action="manage_cart.php" method="POST">
        <div class="card bg-transparent">
          <img src="Images/hood2.png" class="card-img-top" height="250" width="250">
          <div class="card-body text-center ">
            <h5 class="card-titl text-dar">Clothe 2</h5>
            <p class="card-text text-dar">Price: $411 <span> <small>NGN 1000</small> </span> </p>
            <button type="submit" name="Add_To_Cart" class="btn btn-info text-light">Add To Cart</button>
            <input type="hidden" name="Item_Name" value="Clothe 2">
            <input type="hidden" name="Price" value="411">
          </div>
        </div>
        </form>
    </div>
    
    <div class="col-lg-3 ">
      <form action="manage_cart.php" method="POST">
        <div class="card bg-transparent">
          <img src="Images/hood3.png" class="card-img-top" height="250" width="250" >
          <div class="card-body text-center ">
            <h5 class="card-titl text-dar">Clothe 3</h5>
            <p class="card-text text-dar">Price: $411 <span> <small>NGN 1000</small> </span> </p>
            <button type="submit" name="Add_To_Cart" class="btn btn-info text-light">Add To Cart</button>
            <input type="hidden" name="Item_Name" value="Clothe 3">
            <input type="hidden" name="Price" value="411">
          </div>
        </div>
        </form>
    </div>

    <div class="col-lg-3">
      <form action="manage_cart.php" method="POST">
        <div class="card bg-transparent">
          <img src="Images/hood4.png" class="card-img-top" height="250" width="250">
          <div class="card-body text-center ">
            <h5 class="card-titl text-dar">Clothe 4</h5>
            <p class="card-text text-dar">Price: $411 <span> <small>NGN 1000</small> </span> </p>
            <button type="submit" name="Add_To_Cart" class="btn btn-info text-light">Add To Cart</button>
            <input type="hidden" name="Item_Name" value="Clothe 4">
            <input type="hidden" name="Price" value="411">
          </div>
        </div>
        </form>
    </div>

    <div class="col-lg-3">
      <form action="manage_cart.php" method="POST">
        <div class="card bg-transparent">
          <img src="Images/3.jpg" class="card-img-top" height="250" width="250">
          <div class="card-body text-center ">
            <h5 class="card-titl text-dar">Clothe 03</h5>
            <p class="card-text text-dar">Price: $411 <span> <small>NGN 1000</small> </span> </p>
            <button type="submit" name="Add_To_Cart" class="btn btn-info text-light">Add To Cart</button>
            <input type="hidden" name="Item_Name" value="Clothe 03">
            <input type="hidden" name="Price" value="411">
          </div>
        </div>
        </form>
    </div>

    <div class="col-lg-3">
      <form action="manage_cart.php" method="POST">
        <div class="card bg-dark text-light">
          <img src="Images/hood2.png" class="card-img-top bg-dark" height="250" width="250">
          <div class="card-body text-center ">
            <h5 class="card-title text-dar">Clothe 22</h5>
            <p class="card-text text-dar">Price: $411 <span> <small>NGN 1000</small> </span> </p>
            <button type="submit" name="Add_To_Cart" class="btn btn-info text-light">Add To Cart</button>
            <input type="hidden" name="Item_Name" value="Clothe 22">
            <input type="hidden" name="Price" value="411">
          </div>
        </div>
        </form>
    </div>

    <div class="col-lg-3">
      <form action="manage_cart.php" method="POST">
        <div class="card bg-transparent">
          <img src="Images/cloth 4.jpg" class="card-img-top" height="250" width="250">
          <div class="card-body text-center ">
            <h5 class="card-titl text-dar">Clothe 1</h5>
            <p class="card-text text-dar">Price: $411 <span> <small>NGN 1000</small> </span> </p>
            <button type="submit" name="Add_To_Cart" class="btn btn-info text-light">Add To Cart</button>
            <input type="hidden" name="Item_Name" value="Clothe 1">
            <input type="hidden" name="Price" value="411">
          </div>
        </div>
        </form>
    </div>
    <div class="col-lg-3">
      <form action="manage_cart.php" method="POST">
        <div class="card bg-transparent">
          <img src="Images/cloth 4.jpg" class="card-img-top" height="250" width="250">
          <div class="card-body text-center ">
            <h5 class="card-titl text-dar">Clothe 1</h5>
            <p class="card-text text-dar">Price: $411 <span> <small>NGN 1000</small> </span> </p>
            <button type="submit" name="Add_To_Cart" class="btn btn-info text-light">Add To Cart</button>
            <input type="hidden" name="Item_Name" value="Clothe 1">
            <input type="hidden" name="Price" value="411">
          </div>
        </div>
        </form>
    </div>
  </div>
</div> -->

    



    
   
      <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
      <!-- <script src="index.js"></script> -->

       


      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->


      <?php include('Incl/footer.php'); ?>
<!-- jQuery library  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- <script src="index.js"></script> -->




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

<!-- jQuery library  -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
<!-- Popper JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
<?php //include('Incl/footer.php'); ?>
    
</body>
</html>
