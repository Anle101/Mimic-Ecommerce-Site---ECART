<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['listing_submit'])) {
    $cart->addtoCart($_POST['user_id'],$_POST['item_id']);
  }
}

?>
<!--listings Start-->
<section id="listings" class="bg">
        <div class="container mt-20 p-5 border color-white-bg">
          <h1 class ="font-b612 color-black">Your Listings</h1>
          <hr>
          <div class="row">
            <div class="col-lg-3 col-12">
              <div id="filters" class="button-group text-left">
                <button class="btn is-checked color-black" data-filter="*">All Categories</button>
                <br>
                <button class="btn color-black" data-filter=".Phone">Phones</button>
                <br>
                <button class="btn color-black" data-filter=".Laptop">Laptops</button>
                <br>
                <button class="btn color-black" data-filter=".Desktop">Desktops</button>
                <br>
                <button class="btn color-black" data-filter=".Headset">Headsets</button>
                <hr>
                <a class="btn btn-outline-success mx-4 px-5 my-auto" href="make_listing.php">Make listing</a>
              </div>
            </div>
            <div class="col-lg-9 col-12 my-1">
                <div class="grid">
                <?php array_map(function($item){ ?>
                <div class="grid-item border <?php echo $item['item_category'];?>">
                            <div class="item py-2 px-5" >  <!--Item Entry-->
                                <div class="product font-b612 font-size-14 color-black">
                                    <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id'])?>" ><img src="<?php echo $item['item_picture'] ?? "./assets/images/testproduct.jpg" ?>"  alt="productimage" class="img-fluid" ></a>
                                    <div class="text-center">
                                        <h6><?php echo $item['item_name'] ?? "Unavailable" ?></h6>

                                        <div class="price py-2">
                                            <span> $<?php echo $item['item_price'] ?? "N/A" ?></span>
                                        </div>

                                    </div>
                                </div>
                                
                            </div>     
                </div>
                <?php },$item->getUserData($_SESSION['user_id'])) ?>
            </div>
          </div>
          
          <hr>
          

          
          </div>
        </div>
</section>
      <!--listings End-->