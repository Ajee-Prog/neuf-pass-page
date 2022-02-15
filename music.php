<?php 
include('Incl/header.php');
// include('header.php');
 ?>
    
    
    <div class="title">
        <h2>Music</h2>
        <p>Explore Our Music</p>
    </div>


    <section class="music">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-4">
          <div class="card" style="width: 15rem;">
            <img src="images/liz.png" alt="">
            <div class="card-body">
              <audio src="audio/rema.mp3" controls></audio>
            </div>
          </div>
        </div>



        <!-- Beginning of new music -->
        <div class="col-lg-3 col-md-4">
          <div class="card" style="width: 15rem;">
            <img src="images/liz.png" alt="">
            <div class="card-body">
              <audio src="audio/rema.mp3" controls></audio>
            </div>
          </div>
        </div>


        <!-- Beginning of new music -->
        <div class="col-lg-3 col-md-4">
          <div class="card" style="width: 15rem;">
            <img src="images/liz.png" alt="">
            <div class="card-body">
              <audio src="audio/rema.mp3" controls></audio>
            </div>
          </div>
        </div>


        <!-- Beginning of new music -->
        <div class="col-lg-3 col-md-4">
          <div class="card" style="width: 15rem;">
            <img src="images/liz.png" alt="">
            <div class="card-body">
              <audio src="audio/rema.mp3" controls></audio>
            </div>
          </div>
        </div>

        <!-- Beginning of new music -->
        <div class="col-lg-3 col-md-4">
          <div class="card" style="width: 15rem;">
            <img src="images/liz.png" alt="">
            <div class="card-body">
              <audio src="audio/rema.mp3" controls></audio>
            </div>
          </div>
        </div>
         










        </div>
      </div>
    </section>




















    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


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