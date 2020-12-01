<?php
    $item_id = $_GET['item_id'] ?? 1;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['product_submit'])) {
          $cart->addtoCart($_POST['user_id'],$_POST['item_id']);
        }
      }

    foreach($item->getData() as $item):
        if ($item['item_id'] == $item_id) :
?>

<section id="product" class="py-3 color-offwhite-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $item['item_picture'] ?? "./assets/images/testproduct.jpg" ?>" alt="productimage" class="img-fluid border">
                        <div class="col-6 py-2">
 
                        </div>
                            <form method="POST" class="form-row font-size-20 font-b612">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? 0;?>">  
                                <button type="submit" name="product_submit" class="btn btn-outline-success form-control"> Add to Cart</button>
                            </form>
                    </div>
                   
                    <div class="col-sm-6 py-5">
                        <h5 class="font-b612 font-size-20 color-black"><?php echo $item['item_name'] ?? "Unavailable" ?></h5>
                        <small class= "font-b612 color-black">Sold by <?php echo ($user->getName($item['user_id'])) ?? "Unknown"?></small>
                        <small class= "font-b612 color-black">| Category: <?php echo $item['item_category'] ?? "Unknown"?></small>
                    
                    <hr class="m-1">

                    <!--price-->
                    <table class="my-2 font-b612"></table>
                        <tr class="font-size-20">
                            <td><p class="color-black">PRICE:  $<?php echo $item['item_price'] ?? "N/A"?></p></td>
                        </tr>
                        <hr>
                        <tr class="font-size-16 color-black">
                            <td>
                                <p class="color-black">Product Description:
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp; <!-- Indentation -->
                                <?php echo $item['item_desc'] ?? "N/A"?>
                                </p>
                            </td>
                            
                        </tr>
                    </div>
                   
                </div>
            </div>
        </section>
<!--Product Section End-->

<?php
    endif;
    endforeach;

    
?>