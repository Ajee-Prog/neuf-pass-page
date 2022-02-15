<?php include('Incl/header.php');
//session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
   
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title>Cart</title>
</head>
<body style="overflow: auto;">
    
    <!-- <nav>
  
        <div class="logo">
          <a href="index.php"><img src="images/logo.png" alt="" width="60" height="40"></a>
        </div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn">
          <i class="fa fa-bars"></i>
        </label>
        <ul>
          <li><a href="store.php" >Shop</a></li>
          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="music.php">Music</a></li>
          <li><a href="article.php">Articles</a></li>
          <li><a href="cart.php" class="active">Cart <span>0</span></a></li>
        </ul>
  </nav> -->
    


    <!-- <div id="h2">
        <h2>Cart</h2>
    </div> -->
    <h1>Cart</h1>
<div class="container" style="overflow: auto;">
  <div class="row justify-content-center">
    <div class="col-lg-10 text-center borde rounded bg-ligh mt-2">
        <div style="display:<?php if(isset($_SESSION['showAlert'])){echo $_SESSION['showAlert'];}else{echo 'none';} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong><?php
           if(isset($_SESSION['message'])){
             echo $_SESSION['message'];}
              unset($_SESSION['showAlert']);
              ?></strong>
        </div>
      
      <div class="table-responsive mt-2">
        <table class="table table-border table-stripe align-center text-center text-lig bg-light">
          <thead>
          <tr>
            <td colspan="7">
              <h4 class="text-center text-dark m-0">Products in your Cart</h4>
            </td>
          </tr>
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <!-- <th>Remove</th> -->
            <th><a href="action.php?clear=all" class="badge-danger text-danger badge p-1" onclick="return confirm('Are you sure you want to clear all your Cart?');"><i class="fas fa-trash">&nbsp;&nbsp;</i> Clear Cart</a></th>
          </tr>
          </thead>
          <tbody class= "text-ligh">
            <?php
              include ('config.php');
              $stmt = $conn->prepare("SELECT * FROM cart");
              $stmt->execute();
              $result = $stmt->get_result();
              $grand_total = 0;
              while($row = $result->fetch_assoc()):
                //Assign product id to SESSION variable
                $_SESSION['p_id'] = $row['id'];

            ?>
            <tr class= "text-ligh p-3">
              <td class="pt-4 m-"><?=  $row['id'];?></td>
              <input type="hidden" name="" class="pid" value="<?=  $row['id'];?>">

              <td class="p-"><img src="<?= $row['product_image'];?>" width="50" height="50" class="bg-light m-2"></td>
              <td class="pt-4"><?= $row['product_name']?></td>
              <td class="pt-4">$<?= number_format($row['product_price'],2);?></td>

              <input type="hidden" name="" class="pprice" value="<?=  $row['product_price'];?>">
              <!-- Item Quantity -->

              <td class="pt-4"><input type="number" name="" id="" class="form-control itemQty" value="<?= $row['qty'];?>" style="width: 75;"></td>
              <td class="pt-4">$<?= number_format($row['total_price'], 2);?></td>
              <td class="pt-4"><a href="action.php?remove=<?= $row['id'];?>" class="text-light btn btn-sm  btn-danger lead" onclick="return confirm('Are you sure you want to remove this Item?');"><i class="fas fa-trash-alt"></i> Remove</a></td>
            </tr>
            <?= 
            $grand_total +=$row['total_price'];
            $_SESSION['pay'] = $grand_total;
            ?>
            <?php 
            // Session for clear all Data in Table
            $_SESSION['cart_t'] = $row['id'];
            $_SESSION['cart_t'] = $row['product_image'];
            $_SESSION['cart_t'] = $row['product_name'];
            $_SESSION['cart_t'] = $row['product_price'];
            $_SESSION['cart_t'] = $row['qty'];
            $_SESSION['cart_t'] = $grand_total +=$row['total_price'];
            // END  Session for clear all Data in Table
          endwhile;?>
            <tr>
              <td colspan="3">
                <a href="store.php" class="btn btn success text-light bg-secondary"> <i class="fas fa-cart-plus"></i> Return to Shop</a>
              </td>
              <td colspan="2"><b>Grand Total</b></td>
              <td><b>$<?= number_format($grand_total,2);?> </b></td>
                <!-- //number_format($grand_total)?> -->
                &nbsp
              <td><a href="checkout.php" class="btn btn-secondary text-light  px-5  mr-0 <?= ($grand_total > 1)?"":"disabled";?>"> CheckOut</a></td>
            </tr>
            <?php
             unset($row['id']);
             unset($row['product_image']);
             unset($row['product_name']);
             unset($row['product_price']);
             unset($row['qty']);
             ?>
          </tbody>
        </table>
      </div>
    </div>

        <!-- Old Cart -->
    <!-- <div class="col-lg-9 mt-3 light">

      <table class="table bg-light align-center">
          <thead class="text-center" >
            <tr>
              <th scope="col">Serial No.</th>
              <th scope="col">Item Name</th>
              <th scope="col">Item Price</th>
              <th scope="col">Quantity</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody class="text-center"> -->
            <?php
            // $total = 0;
            // if(isset($_SESSION['cart']))
            // {
            //   foreach($_SESSION['cart'] as $key=> $value)
            //     {
            //       $total = $total + $value['Price'];
            //       print_r($value);
            //       echo"
            //       <tr>
            //         <td>1</td>
            //         <td>$value[Item_Name]</td>
            //         <td>NGN $value[Price]</td>
                  //   <td> <input class='text-center text-dar' type='number' $value[Quantity] min='1' max='10'> </td>
                  //   <td> 
                  //   <form action='manage_cart.php' method='POST'>
                  //   <button name='Remove_Item' class='btn btn-sm btn-danger'>Remove</button>
                  //   <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                  //   </form>
                  //   </td>
                  // </tr>
                  // ";
            //   } 
    //         // }
    //     /**  ?>   
             <!-- <tr>
    //           <th scope="row">1</th>
    //           <td>Mark</td>
    //           <td>Otto</td>
    //           <td>@mdo</td>
    //         </tr> -->
                       
           <!-- </tbody>
       </table>

     </div>

    <div class="col-lg-3 mt-3">
      <div class="border text-white bg-l rounded p-4">
      <h4>Total:</h4>
      <h5 class="text-right"></?php //echo $total ?></h5>
      <br>
      <form action="" method="post">
        <button class="btn btn-primary btn-block">Make Purchase</button>
      </form>
      </div>
    </div>
  </div>
</div> -->
    




<?php include('Incl/footer.php'); ?>
<!-- jQuery library  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="index.js"></script>



<!-- <script src="index.js"></script> -->
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