<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['delete_item_submit']) && isset($_SESSION['user_id'])) {
          $d = $cart->deleteCart($_SESSION['user_id'],$_POST['item_id']);
        }
        else if (isset($_POST['delete_item_submit'])) {
            $d = $cart->deleteCart(0,$_POST['item_id']);
        }
      }
?>

<!-- cart preview starts-->
<section id="cart-preview" class="bg">
            <div class="container-fluid w-75 color-white-bg">
                <h5 class = "font-b612 font-size-20 py-4 color-black">Shopping Cart</h5>
                   <div class="col-sm-9">
                   <?php
                        if (isset($_SESSION['user_id'])) {
                        
                        foreach($item->getUserData($_SESSION['user_id'],'cart') as $product) :
                            $cartlist = $item->getItem($product['item_id']);
                            $Subtotal[] = array_map(function($item){
                    ?>
                        <div class="row border-top py-5 mt-20">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_picture'] ?? 'assets/images/testproduct.jpg' ?>" alt="cartitem" height="400px" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-b612 font-size-16 color-black"><?php echo $item['item_name'] ?? "Unknown" ?></h5>
                               
                                <hr>
                                   
                                    <div class="qty d-flex">
                                        <h8 class="font-b612 color-black">Quantity:</h8>
                                        <div class="px-2 d-flex font-b612">
                                           <form method="POST">
                                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                                <button class="m-auto btn color-red" name="delete_item_submit" data-id="pro1"><i class="far fa-trash-alt"></i></button>
                                           </form>
                                         
                                        </div>
                                        
                                        
                                    </div>
                                <hr>
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="font-size-14 font-b612">
                                    <span class="product_price color-black">$<?php echo $item['item_price'] ?? "N/A"?></span>
                                </div>
                            </div>
                        </div> 

                    <?php   
                            return $item['item_price'];
                        }, $cartlist);

                        endforeach;
                        } else {
                             
                            foreach($item->getUserData(0,'cart') as $product) :
                                $cartlist = $item->getItem($product['item_id']);
                                $Subtotal[] = array_map(function($item){
                    ?>
                    <h6 class="color-black"> - Guest - </h6>
                        <div class="row border-top py-5 mt-20">
                            <div class="col-sm-2">
                                <img src="<?php echo $item['item_picture'] ?? 'assets/images/testproduct.jpg' ?>" alt="cartitem" height="400px" class="img-fluid">
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-b612 font-size-16 color-black"><?php echo $item['item_name'] ?? "Unknown" ?></h5>
                             
                                <hr>
                                   
                                    <div class="qty d-flex">
                                        <h8 class="font-b612 color-black">Quantity:</h8>
                                        <div class="px-2 d-flex font-b612">
                                           <form method="POST">
                                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                                <button class="m-auto btn color-red" name="delete_item_submit" data-id="pro1"><i class="far fa-trash-alt"></i></button>
                                           </form>
                                         
                                        </div>
                                        
                                        
                                    </div>
                                <hr>
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="font-size-14 font-b612">
                                    <span class="product_price color-black">$<?php echo $item['item_price'] ?? "N/A"?></span>
                                </div>
                            </div>
                        </div> 

                    <?php  return $item['item_price'];
                        }, $cartlist);

                        endforeach;
                    }
                    ?>
                   </div>

                    <!-- subtotal section-->
                   <div class="col-sm">
                        <div class="row border-top py-5 mt-20">
                           <h5 class = "color-black">Subtotal:</h5>
                            
                            <div class="col-sm text-right">
                                <div class="font-size-20 font-b612">
                                    <span class="product_price color-black">$<?php echo isset($Subtotal) ? $cart->getSubtotal($Subtotal) :0; ?></span>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm py-3">
                        <button type="submit" class="btn btn-danger form-control"> Proceed to Checkout [Checkout is unavailable at this time]</button>
                    </div>
            </div>    
          </section>
          <!--end of cart preview-->