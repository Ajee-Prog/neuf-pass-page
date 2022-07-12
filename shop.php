<?php 
include ('Incl/header.php'); 
// include('header.php');

?>



<div class="title">
    <h2>Shop</h2>
</div>

    <section class="store">
        <div class="container">
            <h1>I am TESTING</h1>
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
                        <img src="images/<?= $row['product_image']; ?>" alt="">
                    </div>
                    <h3 class="h3"><?= $row['product_name']; ?></h3>
                    <p>$<?= number_format( $row['product_price'],2 );?></p>
                    <div class="sizes">
                    
                    <!-- <\?= $sm = $row['product_small'];
                     $m = $row['product_medium'];
                    $l = $row['product_large'];
                     $xl = $row['product_xlarge'];
                      $sizes = array($sm,$m,$l, $xl);
                      
                      ?> -->
                        <!-- <button></?= $row['product_size']; ?></button><button>M</button><button>X</button><button>XL</button> -->
                        <!-- <button><a href="action.php?remove=</?= $row['id'];?>" onclick="return confirm('Are you sure you want to remove this Item?');"></a></?= $row['product_small']; ?></button><button> </?= $row['product_medium']; ?> </button><button> </?= $row['product_large']; ?> </button><button> </?= $row['product_xlarge']; ?> </button> -->
                        
                        <form action="" method="post" class="form-submit">
                        <!-- <button type="button" name="size_small" class="size_small">S</button><button type="button" name="size_medium" class="size_medium">M</button><button type="button" name="size_large" class="size_large">X</button><button type="button" name="size_xLarge" class="size_xLarge">XL</button> -->
                    <!-- <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_small']; ?>">  </?= $row['product_small']; ?> </button> <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_medium'];?>"> </?= $row['product_medium']; ?> </button> <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_large'];?>"> </?= $row['product_large']; ?> </button> <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_xlarge'];?>"> </?= $row['product_xlarge']; ?> </button> <button type="submit" class="addItemBt btn-sm gap-2 my-2" id="psz" name="psize" value="</?= $row['product_xlarge'];?>"> XXL </button> -->

                    <!-- <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_small']; ?>">  </?= $row['product_small']; ?> </button> <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_medium'];?>"> </?= $row['product_medium']; ?> </button> <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_large'];?>"> <//?= $row['product_large']; ?> </button> <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_xlarge'];?>"> </?= $row['product_xlarge']; ?> </button> <button type="submit" class="addItemBt btn-sm gap-2 my-2" id="psz" name="psize" value="</?= $row['product_xlarge'];?>"> XXL </button> -->
                    <div class="row offcanva">
                    <div id="size" value="" checked="checked" class=" display-product">
                    <!-- <button type="submit" class="addItemBt" id="psz" name="psize" value="<//?= $row['product_small']; ?>">  </?= $row['product_small']; ?> </button> 
                    <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_medium'];?>"> </?= $row['product_medium']; ?> </button> 
                    <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_large'];?>"> </?= $row['product_large']; ?> </button>
                    <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_xlarge'];?>"> </?= $row['product_xlarge']; ?> </button> 
                    <button type="submit" class="addItemBt btn-sm gap-2 my-2" id="psz" name="psize" value="</?= $row['product_xlarge'];?>"> XXL </button> -->

                        
                     <button type="submit" class="addItemBtt" id="psz" name="psize" value="<?= $row['product_small']; ?>"> <div id="sizee"> <?= $row['product_small']; ?></div> </button> 
                    <button type="submit" class="addItemBtt" id="psz" name="psize" value="<?= $row['product_medium'];?>"> <div id="sizee"> <?= $row['product_medium']; ?> </div>  </button> 
                    <button type="submit" class="addItemBtt" id="psz" name="psize" value="<?= $row['product_large'];?>"> <div id="sizee"> <?= $row['product_large']; ?> </div>  </button>
                    <button type="submit" class="addItemBtt" id="psz" name="psize" value="<?= $row['product_xlarge'];?>"> <div id="sizee"> <?= $row['product_xlarge']; ?> </div>  </button> 
                    <button type="submit" class="addItemBtt btn-sm gap-2 my-2" id="psz" name="psize" value="<?= $row['product_xlarge'];?>"> <div id="sizee"> XXL </div>  </button>

                     
                     
                     <input type="hidden" name="psize" id="hiddenfield" value=" <?= $row['product_small']; ?>" />
                        <input type="hidden" name="psize" id="hiddenfield" value=" <?= $row['product_medium']; ?>" />
                        <input type="hidden" name="psize" id="hiddenfield" value=" <?= $row['product_large']; ?>" />
                        <input type="hidden" name="psize" id="hiddenfield" value=" <?= $row['product_xlarge']; ?>" />
                    </div>
                    </div>
                    <!-- JavaScript jQUERY -->
                    <!-- <script>
                        $('#size').toggle(function() {
                            $('input#hiddenfiel').val('checked');
                            // alert($('input#hiddenfield').val());
                        },function () {
                            $('input#hiddenfield').val('');
                            // alert($('input#hiddenfield').val())
                        })
                    </script> -->

                    <!-- END JavaScript -->
                        <!-- <div class=" container " style="width:260px;  ">
                        <select name="psizes" id="" class= "forlm-select d-flex justify-content-center text-white w-100  bg-transparent border-75 px-3">
                            <option class= "forlm-select text-dark text-center  bg-transparent" value="selected">-- SIZES --</option>
                            <option class= "forlm-select text-dark text-center  bg-transparent" value="<\?= $sizes[0]?>"><\?= $sizes[0]?></option>
                            <option class= "forlm-select text-dark text-center  bg-transparent" value="<\?= $sizes[1]?>"><\?= $sizes[1]?></option>
                            <option class= "forlm-select text-dark text-center  bg-transparent" value="<\?= $sizes[2]?>"><\?= $sizes[2]?></option>
                            <option class= "forlm-select text-dark text-center  bg-transparent" value="<\?= $sizes[3]?>"><\?= $sizes[3]?></option>
                        </select>
                        </div> -->
                    
                                        <input type="hidden" name="" class="pid" value="<?= $row['id'];?>">
                                        <input type="hidden" name="" class="pname" value="<?= $row['product_name'];?>">
                                        <input type="hidden" name="" class="pprice" value="<?= $row['product_price'];?>">
                                         <input type="hidden" name="" class="pimage" value="<?= $row['product_image'];?>">
                                        <input type="hidden" name="" class="pcode" value="<?= $row['product_code'];?>">
                                        <!-- Buttons size -->
                                         <!-- <input type="hidden" name="" class="psize" id="ps" value="<\?= $row['product_small'];?>">
                                        <input type="hidden" name="" class="psize" id="ps" value="</?= $row['product_medium'];?>">
                                        <input type="hidden" name="" class="psize" id="ps" value="<\?= $row['product_large'];?>">
                                        <input type="hidden" name="" class="psize" id="ps" value="<\?= $row['product_xlarge'];?>">  -->
                                        <p class="card-text text-light text-center"></p>
                                        <!-- </?=  -->
                                        <!-- //print_r ($sizes);
                                        //foreach ($sizes as $key => $value) {
                                            # code...
                                           // echo '<div class="sizes"><button>'.$value.'';
                                            //$value;
                                            //echo '<button><div>';
                                            // $selected = false;
                                            // if (isset($_GET['psize_submit'])) {
                                            //     # code...
                                            //     $value = $_GET['psize_submit'];
                                            //     echo ($value);
                                            // }
                                             //if ( $key==$value) {
                                            //     # code...
                                            //     $selected = true;
                                                // echo ($key);
                                            // }
                                        //}
                                        //?/> -->


                                          <!-- <div class="d-grid gap-2 col-6 mx-auto">
                                            <button class="btn btn-primary" type="button">Button</button>
                                            <button class="btn btn-primary" type="button">Button</button>
                                          </div> -->
                                        <div class="form-group">

                                         <button type="submit"  class="btn btn-secondary save-butto px-5 text-light btn-block btn-large addItemBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-cart-plus"></i> Add To Cart</button>
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
                            <!-- <button class="addItemBt" value="<?= $row['product_small']; ?>"> <?= $row['product_small']; ?> </button><button class="addItemBt" value="<?= $row['product_medium']; ?>"><?= $row['product_medium']; ?></button><button class="addItemBt" value="<?= $row['product_large']; ?>"><?= $row['product_large']; ?></button><button class="addItemBt" value="<?= $row['product_xlarge']; ?>"><?= $row['product_xlarge']; ?></button> -->
                        </div>
                        <!-- <input type="number" placeholder="0"><br> -->
                        <!-- <button class="btn-cart2">Add To Cart</button> -->
                        <div class="form-group mt-2">

                                         <!-- <button type="submit" class="btn btn-secondary save-butto px-5 text-light btn-block btn-large addItemBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-cart-plus"></i> Add To Cart</button> -->


                                         

                                                <!-- New ADD TO CART START HERE.. -->

                                        <form action="" method="post" class="form-submit">
                                                <!-- <button type="button" name="size_small" class="size_small">S</button><button type="button" name="size_medium" class="size_medium">M</button><button type="button" name="size_large" class="size_large">X</button><button type="button" name="size_xLarge" class="size_xLarge">XL</button> -->
                                            <!-- <button type="submit" class="addItemBt" id="psz" name="psize" value="<//?= $row['product_small']; ?>">  </?= $row['product_small']; ?> </button> <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_medium'];?>"> </?= $row['product_medium']; ?> </button> <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_large'];?>"> </?= $row['product_large']; ?> </button> <button type="submit" class="addItemBt" id="psz" name="psize" value="</?= $row['product_xlarge'];?>"> </?= $row['product_xlarge']; ?> </button> <button type="submit" class="addItemBt btn-sm gap-2 my-2" id="psz" name="psize" value="</?= $row['product_xlarge'];?>"> XXL </button> -->
                                            
                                            <button type="submit" class="addItemBt" id="psz" name="psize" value="<?= $row['product_small']; ?>"> 
                                            <div id="siz"> <?= $row['product_small']; ?></div> </button> 
                                        <button type="submit" class="addItemBt" id="psz" name="psize" value="<?= $row['product_medium'];?>">
                                        <div id="siz"> <?= $row['product_medium']; ?> </div>  </button> 
                                        <button type="submit" class="addItemBt" id="psz" name="psize" value="<?= $row['product_large'];?>">
                                        <div id="siz"> <?= $row['product_large']; ?> </div>  </button>
                                        <button type="submit" class="addItemBt" id="psz" name="psize" value="<?= $row['product_xlarge'];?>">
                                        <div id="siz"> <?= $row['product_xlarge']; ?> </div>  </button> 
                                        <button type="submit" class="addItemBt btn-sm gap-2 my-2" id="psz" name="psize" value="<?= $row['product_xlarge'];?>">
                                        <div id="siz"> XXL </div>  </button>

                                            <br> <input type="number" placeholder="0"><br>
                                            
                                        <input type="hidden" name="" class="pid" value="<?= $row['id'];?>">
                                        <input type="hidden" name="" class="pname" value="<?= $row['product_name'];?>">
                                        <input type="hidden" name="" class="pprice" value="<?= $row['product_price'];?>">
                                         <input type="hidden" name="" class="pimage" value="<?= $row['product_image'];?>">
                                        <input type="hidden" name="" class="pcode" value="<?= $row['product_code'];?>">
                                        <!-- Buttons size -->
                                         <!-- <input type="hidden" name="" class="psize" id="ps" value="<\?= $row['product_small'];?>">
                                        <input type="hidden" name="" class="psize" id="ps" value="</?= $row['product_medium'];?>">
                                        <input type="hidden" name="" class="psize" id="ps" value="<\?= $row['product_large'];?>">
                                        <input type="hidden" name="" class="psize" id="ps" value="<\?= $row['product_xlarge'];?>">  -->
                                        <p class="card-text text-light text-center"></p>
                                    
                                    
                                        <div class="form-group">

                                         <button type="submit"  class="btn btn-secondary save-butto px-5 text-light btn-block btn-large addItemBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fas fa-cart-plus"></i> Add To Cart NEW</button>
                                        </div>
                                    </form>

                                    <!-- END NEW ADD TO CART BUTTON HERE.. -->





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


                                        // $('addItemBtt').click(function(e){
                                        //     e.preventDefault();
                                        //     var size_cloth = $('#sizee').val();
                                        //     if($.trim() != '')
                                        //     {
                                        //         alert(size_cloth);
                                        //     }
                                            
                                        // });

                                        // Changed To Here..
                                        $(document).on('click', '.sizes', function(e) {
                        // var selected = false;
                        // var $size = '.psize';
                        e.preventDefault();
                                        //  END Changed Here..



                                            // Vhanged To Here..
                            $(".addItemBtt").click(function () {
                                    //var clk = $(this).attr("id");
                                psize = $(this).val();

                                if ( psize == '') {
                                alert('Woops, Please select size');
                            } else {
                                
                                alert('Size: '+psize+' selected');
                            }
                                            // END Changed

                // JQuery buttons size
                //var psize=[];
                $('.addItemBtn').click(function(e){
                    e.preventDefault();
                                                        // $(document).on('click', '.addItemBt', function() {
                                                        //     //button click work here
                                                        //     // var button = $(this).val();
                                                        //     // $("button").click(function () {
                                                        //     //      psize = $(this).val();
                                                        //     //     alert(psize);  
                                                        //     // });
                                                        //     // alert(button);
                                                        //     // $('.psize').append('');
                                                        //     // var $size = $(this).closest('.psize');
                                                        //     // var size = $size.find('.psize').val();
                                                        //     // $size = true
                                                            

                                                        // });
                                                        //var selected = false;

                    // $(document).on('click', '.sizes', function(e) {     Changed Here..
                    //     // var selected = false;
                    //     // var $size = '.psize';
                    //     e.preventDefault();                             Changed here
                        // if ($size) {
                        //     var selected = true;
                        // }
                        
                            // alert('.addItemBt'.$value);
                            //addItemBt

                            //$sizes as $key => $value
                        
                        //alert('Hello');
                        // $('.psize').append('');
                        //var $size = $(this).closest('.psize');
                        // $(".addItemBt").click(function () {           Changed
                        //             //var clk = $(this).attr("id");
                        //         psize = $(this).val();                 Changed
                                //var ps = document.getElementById("ps").innerHTML=psize;;
                                //  $("ps").text(psize);
                                // alert(psize);  
                            //     });
                            
                            // });
                            // JQuery END
                            // $('.addItemBtn').click(function(e){
                            //     e.preventDefault();

                            //$("ps").text(psize);
                            
                            // if ( psize == '') {   Changed here..
                            //     alert('Woops, Please select size');
                            // } else {
                                
                            //     alert('Size: '+psize+' selected');
                            // }
                                // alert('Size: '+psize+' selected');

                            var $form = $(this).closest('.form-submit');
                            var pid = $form.find('.pid').val();
                            var pname = $form.find('.pname').val();
                            var pprice = $form.find('.pprice').val();
                            var pimage = $form.find('.pimage').val();
                            var pcode = $form.find('.pcode').val();

                            
                            //var psize = $(this).find('.psize').val();
                            // var psize = $form.find('.pm').val();
                            // var psize = $form.find('.pl').val();
                            // var psize = $form.find('.pxl').val();
                            // var pcode = $form.find('.pcode').val();
                            //psize = $(this).val();

                            // type="button" name="size_small"

                            // Send value to SERVER Using AJAX
                            $.ajax({
                                url: 'action.php',
                                method: 'post',
                                // What data U want to send
                                // data: {pid:pid, pname:pname, pprice:pprice, pimage:pimage, pcode:pcode, psmall:psmall, pmedium:pmedium, plarge:plarge, pxlarge:pxlarge},
                                data: {pid:pid, pname:pname, pprice:pprice, pimage:pimage, pcode:pcode, psize:psize},
                                
                                success: function(response){
                                    $('#message').html(response);
                                    window.scrollTo(0,0);
                                    load_cart_item_number();
                                }
                            });

                        });
                    
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
                    // END Update cart Item number
            });

                            // Offcanvas function
                                    // $(".offcanvas").delay(4000).slideup(200, function () {
                                    //     $(this).alert('close');
                                        
                                    // });
        </script>
</body>
</html>