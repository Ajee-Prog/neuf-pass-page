<?php include('Incl/header.php');
// include('header.php');
 ?>
    
    
    
    <div class="title">
        <h2>Cart</h2>
    </div>


    <section class="cart">
      <div class="container">
      <div style="display:<?php if(isset($_SESSION['showAlert'])){
        echo $_SESSION['showAlert'];}else{echo 'none';} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
          <strong><?php if(isset($_SESSION['message'])){
            echo $_SESSION['message'];} unset($_SESSION['showAlert']);?></strong>
        </div>
        
        <table>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Remove</th>
            <th>Total</th>
            <th>
              <a href="action.php?clear=all" class="" onclick="return confirm('Are you sure you want to Delete all cart Items');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</a>
            </th>
          </tr>


          <?php
              include ('config.php');
              $stmt = $conn->prepare("SELECT * FROM cart");
              $stmt->execute();
              $result = $stmt->get_result();
              // $total_qty = 0;
              $grand_total = 0;
              while($row = $result->fetch_assoc()):

            ?>

          <tr>
            <td>
              <div class="cart-info">
              <input type="hidden" name="" class="pid" value="<?=  $row['id'];?>">
                <img src="<?= $row['product_image'];?>" alt="">
                <div class="my-auto">
                  <p><?= $row['product_name'];?></p>
                  <small>Size:  <?= $row['product_size'];?></small>
                  
                  <br>
                  <small>Code:  <?= $row['product_code'];?></small>
                </div>
              </div>
            </td>
            <td>$<?= number_format($row['product_price'],2);?></td>
            <input type="hidden" name="" class="pprice" value="<?=  $row['product_price'];?>">
              <!-- Item Quantity -->
            
            <!-- <td><input type="number" class="form-control itemQty" value="<//?= $row['qty'];?>" style="width: 75;" value=' min="1" max="1000"'></td> -->
            <td><input type="number" class="form-control itemQty" value="<?= $row['qty'];?>" style="width: 75;" value=' min="1" max="1000"'></td>
            <td><a href="action.php?remove=<?= $row['id'];?>" onclick="return confirm('Are you sure you want to remove this Item?');"><i class="fas fa-trash-alt"></i></a></td>
            <td>$<?= number_format($row['total_price'], 2);?></td>
          </tr>
          <?php $grand_total +=$row['total_price'];?>

        <?php endwhile;?>


          <!-- Beginning of new cart -->
          <!-- <tr>
            <td>
              <div class="cart-info">
                <img src="images/shirt.png" alt="">
                <div class="my-auto">
                  <p>Black Demin Top</p>
                  <small>Size: M</small>
                  <br>
                </div>
              </div>
            </td>
            <td><input type="number"></td>
            <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
            <td>$160.00</td>
          </tr>


          <!- Beginning of new cart ->
          <tr>
            <td>
              <div class="cart-info">
                <img src="images/shirt.png" alt="">
                <div class="my-auto">
                  <p>Black Demin Top</p>
                  <small>Size: M</small>
                  <br>
                </div>
              </div>
            </td>
            <td><input type="number"></td>
            <td><a href="#"><i class="fas fa-trash-alt"></i></a></td>
            <td>$160.00</td>
          </tr> -->

        </table>



        <div class="total-price">
          <table>
            <tr>
              <td>Subtotal</td>
              <td>$$<?= number_format($row['total_price'], 2);?></td>
            </tr>
            <tr>
              <td>Total</td>
              <td>$<?= number_format($grand_total,2);?></td>
            </tr>
          </table>
        </div>

        <div class="btn-continue">
          <a href="shop.php"> <i class="fas fa-cart-plus"></i> Continue Shopping</a><br>
          <a href="checkout.php" class="<?= ($grand_total > 1) ? '' : 'disabled'; ?>"><button class="check">Checkout</button></a>
        </div>










          </div>
        </div>
      </div>
    </section>




















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
   <?php include('Incl/footer.php'); ?>
<!-- jQuery library  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="index.js"></script>



    



    <!-- <script src="index.js"></script> -->




    <!-- Ajax -->

    <script type="text/javascript">
  $('document').ready(function(){
    // create variable to update the Quantity nums and total price coming from PHP server
    $('.itemQty').on('change', function(){
      var $el = $(this).closest('tr');
      var pid = $el.find('.pid').val();
      var pprice = $el.find('.pprice').val();
      var qty = $el.find('.itemQty').val();
      // This is to prevent refresh before qty update, (Manually update)
      location.reload(true);
      // let see if quantity is updating with other
      // console.log(qty);

      // now SEND a request to the SERVER using AJAX
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {qty:qty,pid:pid,pprice:pprice},
        success: function(response){
          // befor going to code in PHP let console log
           //console.log(qty);
          // console.log(response);
        }
      });
    });
    // load_cart_item_number();
    // Call the function
    load_cart_item_number();
                // Update cart Item number
                function load_cart_item_number(){
                    $.ajax({
                        url: 'action.php',
                        method: 'get',
                        data: {cartItem:"cart_item"},
                        success: function(response){
                            $("#cart-item").html(response);
                        }
                    });
                }
  });
</script>

</body>
</html>