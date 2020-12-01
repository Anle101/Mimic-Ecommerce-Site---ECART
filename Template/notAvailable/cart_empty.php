<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['delete_item_submit'])) {
          $d = $cart->deleteCart($_POST['item_id']);
        }
      }
?>

<!-- cart preview starts-->
<section id="cart-preview" class ="bg">
            <div class="container-fluid w-75 color-white-bg">
                <h5 class = "font-b612 font-size-20 py-4 color-black">Shopping Cart</h5>
                   <div class="col-sm-12">
                        <div class="row border-top py-5 mt-20">
                            <div class="col-sm-12">
                                <h2 class="font-b612 text-center color-black"> Cart is empty! </h2>
                            </div
                        </div>
                   </div>

                    <!-- subtotal section-->
                   <div class="col-sm">
                        <div class="row border-top py-5 mt-20">
                           <h5 class="color-black">Subtotal:</h5>
                            
                            <div class="col-sm text-right">
                                <div class="font-size-20 font-b612 color-black">
                                    <span class="product_price">$<?php echo isset($Subtotal) ? $cart->getSubtotal($Subtotal) :0; ?></span>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
                    <hr>
                    <div class="col-sm py-3">
                        <button type="submit" class="btn btn-danger form-control" disabled> Proceed to Checkout [Checkout is unavailable at this time]</button>
                    </div>
            </div>    
          </section>
          <!--end of cart preview-->