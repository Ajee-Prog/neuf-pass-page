<?php include('Incl/header.php'); ?>
    
    
    
    <div class="title">
        <h2>Articles</h2>
    </div>


    <section class="article">
      <div class="container">
        <div class="row">

        <?php 
              include('config.php'); 
                      $stmt = $conn->prepare(" SELECT * FROM product");
                      $stmt->execute();
                      $result = $stmt->get_result();
                      while( $row=$result->fetch_assoc()):
                          ?>

          <div class="col-lg-3 col-md-4">
            <div class="card" style="width: 15rem;">
              <img src="<?= $row['product_image']; ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text"><?= $row['product_desc']; ?></p>
              </div>
            </div>
          </div>
          <?php endwhile;?>

          <!-- Beginning of new article -->
            <div class="col-lg-3 col-md-4">
              <div class="card" style="width: 15rem;">
                <img src="images/shirt.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>

            <!-- Beginning of new article -->
            <div class="col-lg-3 col-md-4">
              <div class="card" style="width: 15rem;">
                <img src="images/shirt.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>


            <!-- Beginning of new article -->
            <div class="col-lg-3 col-md-4">
              <div class="card" style="width: 15rem;">
                <img src="images/shirt.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div>
            </div>

            <!-- Beginning of new article -->
            <div class="col-lg-3 col-md-4">
              <div class="card" style="width: 15rem;">
                <img src="images/shirt.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
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