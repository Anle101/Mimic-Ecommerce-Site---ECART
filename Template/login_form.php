<?php
     if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['login'])) {
          $user->login($_POST['username'],$_POST['password']);
        }
      }

 ?>
 
 
 <!--about us section-->
 <section id="login" class="bg">
          <div class ="w-25  float-right right-window py-3">
            <div class=" color-white-bg right-window rounded border px-2">
              
                    <h2 class="font-b612 py-3 px-3 color-black"> Login</h2>
                    <hr>
                    <form method="POST"  id="login_form">    
                        <div class="col-sm-5 col-12 m-auto color-black"> 
                                <h6>Username:</h6>
                                <input type="text" id="username_login" name="username" placeholder="E-Mail" class="w-75" required></input>
                                
                                <hr>
                        </div>

                            <!--Last Name Section -->
                        <div class="col-sm-5 m-auto color-black">
                                <h6>Password:</h6>
                                <input type="password" id="password_login" name="password" placeholder="Password" class="w-75" required></input>
                                <hr>
                            </div>

                       
                            <h6 class = "px-3 color-black">Don't have an account?<a href="register.php"> Register here!</a></h6>    
                            
                            <div class="col-sm-3 py-5">
                                <button type="submit" name="login"class="btn btn-outline-success color-white-bg form-control mx-auto" type="submit" align="center" >Login</button>
                            </div>
                    </form>
                
            </div>
          </div>
          
 </section>
        <!--about us section end-->