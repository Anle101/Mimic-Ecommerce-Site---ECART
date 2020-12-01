 <?php

  shuffle($item_shuffle); 

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['featured_product_submit'])) {
      $cart->addtoCart($_POST['user_id'],$_POST['item_id']);
    }
  }

 ?>
 
 <!--Featured products Start-->
 <section id="featured_products"class="color-white-bg font-size-20 m-auto py-4">
          <div class="container py-5">
            <h4 class ="font-b612 font-size-20 color-black">Featured Products</h4>
            <hr>
            <div class="owl-carousel owl-theme">
            <?php
              $counter = 0;

            foreach($item_shuffle as $product) {
              if(++$counter == 7) break; //Feature 7 random products
              ?>
              
                <div class="item py-2 px-2">  <!--Item Entry-->
                  <div class="product font-b612 font-size-14 color-black">
                    <a href="<?php printf('%s?item_id=%s','product.php',$product['item_id'])?>"><img src="<?php echo $product['item_picture'] ?? "./assets/images/testproduct.jpg" ?>"  alt="productimage" class="img-fluid border"></a>
                    <div class="text-center">
                      <h6><?php echo $product['item_name'] ?? "Unavailable" ?></h6>
                      <div class="rating text-warning font-size-12">
                      </div>
                      <div class="price py-2">
                        <span> $<?php echo $product['item_price'] ?? "N/A" ?></span>
                      </div>
                      <form method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $product['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? 0;?>">  
                                <button type="submit" name="featured_product_submit" class="btn btn-outline-success my-2 my-sm-0 color-white-bg font-size-12">Add to Cart</button>
                      </form>
                    </div>
                  </div>
                </div>
                
          <?php } ?>
  
            </div>
          </div>
        </section>
        <!--Featured Category End-->