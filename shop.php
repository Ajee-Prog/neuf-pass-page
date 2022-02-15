<?php include ('Incl/header.php'); 
// include('header.php');

?>



<div class="title">
    <h2>Shop</h2>
</div>

    <section class="store">
        <div class="container">
        <div id="message"></div>
            <div class="row">
              <?php 
              include('config.php'); 
                      $stmt = $conn->prepare(" SELECT * FROM product");
                      $stmt->execute();
                      $result = $stmt->get_result();
                      while( $row=$result->fetch_assoc()):
                          ?>
                <div class="col-lg-3 col-md-4">
                    <div class="img-box">
                        <img src="<?= $row['product_image']; ?>" alt="">
                    </div>
                    <h3 class="h3"><?= $row['product_name']; ?></h3>
                    <p>$<?= number_format( $row['product_price'],2 );?></p>
                    <div class="sizes">
                    
                        <!-- <button></?= $row['product_size']; ?></button><button>M</button><button>X</button><button>XL</button> -->
                        <!-- <button><a href="action.php?remove=</?= $row['id'];?>" onclick="return confirm('Are you sure you want to remove this Item?');"></a></?= $row['product_small']; ?></button><button> </?= $row['product_medium']; ?> </button><button> </?= $row['product_large']; ?> </button><button> </?= $row['product_xlarge']; ?> </button> -->
                        
                        <form action="" method="post" class="form-submit">
                        <!-- <button type="button" name="size_small" class="size_small">S</button><button type="button" name="size_medium" class="size_medium">M</button><button type="button" name="size_large" class="size_large">X</button><button type="button" name="size_xLarge" class="size_xLarge">XL</button> -->
                        <button name="product_small"><?= $row['product_small']; ?></button><button name="product_medium"> <?= $row['product_medium']; ?> </button><button name="product_large"> <?= $row['product_large']; ?> </button><button name="product_xlarge"> <?= $row['product_xlarge']; ?> </button>
                        
                                        <input type="hidden" name="" class="pid" value="<?= $row['id'];?>">
                                        <input type="hidden" name="" class="pname" value="<?= $row['product_name'];?>">
                                        <input type="hidden" name="" class="pprice" value="<?= $row['product_price'];?>">
                                         <input type="hidden" name="" class="pimage" value="<?= $row['product_image'];?>">
                                        <input type="hidden" name="" class="pcode" value="<?= $row['product_code'];?>">
                                        <!-- Buttons size -->
                                        <input type="hidden" name="" class="psmall" value="<?= $row['product_small'];?>">
                                        <input type="hidden" name="" class="pmedium" value="<?= $row['product_medium'];?>">
                                        <input type="hidden" name="" class="plarge" value="<?= $row['product_large'];?>">
                                        <input type="hidden" name="" class="pxlarge" value="<?= $row['product_xlarge'];?>">
                                        <p class="card-text text-light text-center"></p>


                                          <!-- <div class="d-grid gap-2 col-6 mx-auto">
                                            <button class="btn btn-primary" type="button">Button</button>
                                            <button class="btn btn-primary" type="button">Button</button>
                                          </div> -->
                                        <div class="form-group">

                                         <button type="submit" class="btn btn-secondary save-butto px-5 text-light btn-block btn-large addItemBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-cart-plus"></i> Add To Cart</button>
                                        </div>
                                    </form>
                    </div>
                    <?php //endwhile;?>
                    <div class="display-product">
                    <!-- <button class="btn-cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add To Cart</button> -->

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                        <a href="cart.php"><h6 id="offcanvasRightLabel">Check Cart</h6></a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <div class="img-small">
                            <img src="images/shirt.png" alt="">
                        </div>
                        <h5><?= $row['product_name']; ?></h5>
                        <span><?= number_format( $row['product_price'],2 );?></span>
                        <div class="sizes-2">
                            <button> <?= $row['product_small']; ?> </button><button><?= $row['product_medium']; ?></button><button><?= $row['product_large']; ?></button><button><?= $row['product_xlarge']; ?></button>
                        </div>
                        <input type="number" placeholder="0"><br>
                        <!-- <button class="btn-cart2">Add To Cart</button> -->
                        <div class="form-group mt-2">

                                         <button type="submit" class="btn btn-secondary save-butto px-5 text-light btn-block btn-large addItemBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-cart-plus"></i> Add To Cart</button>
                                        </div>
                        <div class="description">
                            <h6>Attention</h6>
                            <p> <?= $row['product_desc']; ?> <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur unde possimus vitae laudantium corporis, illum ex soluta perferendis qui in?</p>
                        </div>

                      </div>
                    </div>
                </div>
                </div>
                <?php endwhile;?>


<!-- 
                <!- Beginning of new Product ->
                <div class="col-lg-3 col-md-4">
                    <div class="img-box">
                        <img src="images/shirt.png" alt="">
                    </div>
                    <h3 class="h3">Black Denim Top</h3>
                    <p>$160.00</p>
                    <div class="sizes">
                        <button>S</button><button>M</button><button>X</button><button>XL</button>
                    </div>
                    <div class="display-product">
                    <button class="btn-cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add To Cart</button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                        <a href=""><h6 id="offcanvasRightLabel">Check Cart</h6></a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <div class="img-small">
                            <img src="images/shirt.png" alt="">
                        </div>
                        <h5>Black Denim Top</h5>
                        <span>$160.00</span>
                        <div class="sizes-2">
                            <button>S</button><button>M</button><button>X</button><button>XL</button>
                        </div>
                        <input type="number" placeholder="0"><br>
                        <button class="btn-cart2">Add To Cart</button>
                        <div class="description">
                            <h6>Attention</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur unde possimus vitae laudantium corporis, illum ex soluta perferendis qui in?</p>
                        </div>

                      </div>
                    </div>
                </div>
                </div>


                 <!- Beginning of new Product ->
                 <div class="col-lg-3 col-md-4 ">
                    <div class="img-box">
                        <img src="images/shirt.png" alt="">
                    </div>
                    <h3 class="h3">Black Denim Top</h3>
                    <p>$160.00</p>
                    <div class="sizes">
                        <button>S</button><button>M</button><button>X</button><button>XL</button>
                    </div>
                    <div class="display-product">
                    <button class="btn-cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add To Cart</button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                        <a href=""><h6 id="offcanvasRightLabel">Check Cart</h6></a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        
                        <div class="img-small">
                            <img src="images/shirt.png" alt="">
                        </div>
                        <h5>Black Denim Top</h5>
                        <span>$160.00</span>
                        <div class="sizes-2">
                            <button>S</button><button>M</button><button>X</button><button>XL</button>
                        </div>
                        <input type="number" placeholder="0"><br>
                        <button class="btn-cart2">Add To Cart</button>
                        <div class="description">
                            <h6>Attention</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur unde possimus vitae laudantium corporis, illum ex soluta perferendis qui in?</p>
                        </div>

                      </div>
                    </div>
                </div>
                </div>



                <!- Beginning of new Product ->
                <div class="col-lg-3 col-md-4">
                    <div class="img-box">
                        <img src="images/shirt.png" alt="">
                    </div>
                    <h3 class="h3">Black Denim Top</h3>
                    <p>$160.00</p>
                    <div class="sizes">
                        <button>S</button><button>M</button><button>X</button><button>XL</button>
                    </div>
                    <div class="display-product">
                    <button class="btn-cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add To Cart</button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                        <a href=""><h6 id="offcanvasRightLabel">Check Cart</h6></a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        
                        <div class="img-small">
                            <img src="images/shirt.png" alt="">
                        </div>
                        <h5>Black Denim Top</h5>
                        <span>$160.00</span>
                        <div class="sizes-2">
                            <button>S</button><button>M</button><button>X</button><button>XL</button>
                        </div>
                        <input type="number" placeholder="0"><br>
                        <button class="btn-cart2">Add To Cart</button>
                        <div class="description">
                            <h6>Attention</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur unde possimus vitae laudantium corporis, illum ex soluta perferendis qui in?</p>
                        </div>

                      </div>
                    </div>
                </div>
                </div>


                <!- Beginning of new Product ->
                <div class="col-lg-3 col-md-4">
                    <div class="img-box">
                        <img src="images/shirt.png" alt="">
                    </div>
                    <h3 class="h3">Black Denim Top</h3>
                    <p>$160.00</p>
                    <div class="sizes">
                        <button>S</button><button>M</button><button>X</button><button>XL</button>
                    </div>
                    <div class="display-product">
                    <button class="btn-cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add To Cart</button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                        <a href=""><h6 id="offcanvasRightLabel">Check Cart</h6></a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        
                        <div class="img-small">
                            <img src="images/shirt.png" alt="">
                        </div>
                        <h5>Black Denim Top</h5>
                        <span>$160.00</span>
                        <div class="sizes-2">
                            <button>S</button><button>M</button><button>X</button><button>XL</button>
                        </div>
                        <input type="number" placeholder="0"><br>
                        <button class="btn-cart2">Add To Cart</button>
                        <div class="description">
                            <h6>Attention</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur unde possimus vitae laudantium corporis, illum ex soluta perferendis qui in?</p>
                        </div>

                      </div>
                    </div>
                </div>
                </div>



                 <!- Beginning of new Product ->
                 <div class="col-lg-3 col-md-4">
                    <div class="img-box">
                        <img src="images/shirt.png" alt="">
                    </div>
                    <h3 class="h3">Black Denim Top</h3>
                    <p>$160.00</p>
                    <div class="sizes">
                        <button>S</button><button>M</button><button>X</button><button>XL</button>
                    </div>
                    <div class="display-product">
                    <button class="btn-cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add To Cart</button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                        <a href=""><h6 id="offcanvasRightLabel">Check Cart</h6></a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        
                        <div class="img-small">
                            <img src="images/shirt.png" alt="">
                        </div>
                        <h5>Black Denim Top</h5>
                        <span>$160.00</span>
                        <div class="sizes-2">
                            <button>S</button><button>M</button><button>X</button><button>XL</button>
                        </div>
                        <input type="number" placeholder="0"><br>
                        <button class="btn-cart2">Add To Cart</button>
                        <div class="description">
                            <h6>Attention</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur unde possimus vitae laudantium corporis, illum ex soluta perferendis qui in?</p>
                        </div>

                      </div>
                    </div>
                </div>
                </div>



                 <!- Beginning of new Product ->
                 <div class="col-lg-3 col-md-4">
                    <div class="img-box">
                        <img src="images/shirt.png" alt="">
                    </div>
                    <h3 class="h3">Black Denim Top</h3>
                    <p>$160.00</p>
                    <div class="sizes">
                        <button>S</button><button>M</button><button>X</button><button>XL</button>
                    </div>
                    <div class="display-product">
                    <button class="btn-cart" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Add To Cart</button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                      <div class="offcanvas-header">
                        <a href=""><h6 id="offcanvasRightLabel">Check Cart</h6></a>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        
                        <div class="img-small">
                            <img src="</?= $row['product_image'];?>" alt="">
                        </div>
                        <h5>Black Denim Top</h5>
                        <span>$160.00</span>
                        <div class="sizes-2">
                            <button>S</button><button>M</button><button>X</button><button>XL</button>
                        </div>
                        <input type="number" placeholder="0"><br>
                        <button class="btn-cart2">Add To Cart</button>
                        <div class="description">
                            <h6>Attention</h6>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur unde possimus vitae laudantium corporis, illum ex soluta perferendis qui in?</p>
                        </div>

                      </div>
                    </div>
                </div>
                </div> -->









              <?php
              //endwhile;
             ?>














































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





      <!-- Ajax -->

      <script  type="text/javascript">
            $(document).ready(function(){
                $('.addItemBtn').click(function(e){
                    e.preventDefault();

                    var $form = $(this).closest('.form-submit');
                    var pid = $form.find('.pid').val();
                    var pname = $form.find('.pname').val();
                    var pprice = $form.find('.pprice').val();
                    var pimage = $form.find('.pimage').val();
                    var pcode = $form.find('.pcode').val();
                    // var psmall = $form.find('.psmall').val();
                    // var pmedium = $form.find('.pmedium').val();
                    // var plarge = $form.find('.plarge').val();
                    // var pxlarge = $form.find('.pxlarge').val();
                    // var pcode = $form.find('.pcode').val();

                    // type="button" name="size_small"

                    // Send value to SERVER Using AJAX
                    $.ajax({
                        url: 'action.php',
                        method: 'post',
                        // What data U want to send
                        data: {pid:pid, pname:pname, pprice:pprice, pimage:pimage, pcode:pcode, psmall:psmall, pmedium:pmedium, plarge:plarge, pxlarge:pxlarge},
                        success: function(response){
                            $('#message').html(response);
                            window.scrollTo(0,0);
                            load_cart_item_number();
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