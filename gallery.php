<?php include('Incl/header.php');
// include('header.php');
 ?>
    
    
    
    <div class="title">
        <h2>Gallery</h2>
    </div>


    <section class="pic-gallery">
      <div class="gallery">
        <a href="images/Cloth 1.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/1.jpg" alt=""></a>
        <a href="images/Cloth 2.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/2.jpg" alt=""></a>
        <a href="images/Cloth 3.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/3.jpg" alt=""></a>
        <a href="images/Cloth 4.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/4.jpg" alt=""></a>
        <a href="images/Cloth 5.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/5.jpg" alt=""></a>
        <a href="images/Cloth 1.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/1.jpg" alt=""></a>
        <a href="images/Cloth 2.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/2.jpg" alt=""></a>
        <a href="images/Cloth 3.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/3.jpg" alt=""></a>
        <a href="images/Cloth 4.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/4.jpg" alt=""></a>
        <a href="images/Cloth 5.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/5.jpg" alt=""></a>
        <a href="images/Cloth 4.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/4.jpg" alt=""></a>
        <a href="images/Cloth 5.jpg" data-fancybox='mygallery' data-title="Neuf Cloth" class="first-img"><img src="images/5.jpg" alt=""></a>
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