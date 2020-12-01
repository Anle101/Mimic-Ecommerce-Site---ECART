<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['make_listing_submit'])) {
       $user->createListing($_SESSION['user_id'],$_POST['itemdesc'],$_FILES['itempicture'],$_POST['itemname'],$_POST['itemprice'],$_POST['itemcategory']);
     }
}
    


?>
<!--listings Start-->
<section id="listings" class="bg">
        <div class="container mt-20 p-5 border color-white-bg">
          <h1 class ="font-b612 color-black">Your Listing</h1>
          <hr>
          <form method="POST"  id="make_listing_form" enctype="multipart/form-data">   
            <div class="row border my-3">
            
                <div class="col-lg-3 col-12 my-3">
                    <div id="filters" class="button-group text-left color-black">
                        <h6>Item Category</h6>
                        <hr>
                        <br>
                        <input type="radio" name="itemcategory" value="Phone"> Phone
                        <hr>
                        <br>
                        <input type="radio" name="itemcategory" value="Laptop"> Laptop
                        <hr>
                        <br>
                        <input type="radio" name="itemcategory" value="Desktop"> Desktop
                        <hr>
                        <br>
                        <input type="radio" name="itemcategory"value="Headset"> Headset
                        <hr>

                    </div>
                </div>
            <div class="col-lg-9 col-12 my-3">
            
                   
                   
                        <div class="col-sm-5 col-12 color-black"> 
                                <h6>Item Name:</h6>
                                <input type="text" id="username_makelisting" name="itemname" placeholder="Item Name" class="w-75" required></input>
                                
                                <hr>
                        </div>

                            <!--Last Name Section -->
                        <div class="col-sm-5 col-12 color-black">
                                 <h6>Item Picture:</h6>
                                <input type="file" id="itempicture_makelisting" name="itempicture" placeholder="E-Mail" class="w-75" required></input>
                                
                                <hr>
                        </div>

                        <div class="col-sm-5 col-12 color-black">
                                 <h6>Item Price:</h6>
                                <input type="text" id="price_makelisting" name="itemprice" placeholder="#" class="w-75" required></input>
                                <p class="color-offwhite">Do not include the $ symbol</p>
                                <hr>
                        </div>

                        <div class="col-sm-12 py-2 form-group color-black">
                                    <h6>Item Description:</h6>
                                    <textarea rows="6" cols="50" id="desc_makelisting" name="itemdesc" placeholder="Description" form="make_listing_form" class="form-control" required></textarea>
                                    <hr>
                                </div>
                            <div class="col-sm-12 py-5">
                                <button type="submit" name="make_listing_submit"class="btn btn-outline-success color-white-bg form-control mx-auto" type="submit" align="center" >Submit</button>
                            </div>
                    
            </div>
          </div>
          </form>
          <hr>
          

          
          </div>
        </div>
</section>
      <!--listings End-->