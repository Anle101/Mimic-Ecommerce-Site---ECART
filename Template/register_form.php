<?php
     if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['register'])) {
          $user->Register($_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['email'],$_POST['password_1'], $_POST['password_2']);
        }
      }

 ?>

<!--about us section-->
 <section id="register" class="bg">
          <div class ="w-25  float-right right-window py-3">
            <div class=" color-white-bg right-window rounded border px-2">
              
                    <h2 class="font-b612 py-3 px-3 color-black"> Register</h2>
                    <hr>
                    <form method="POST" id="register_form">    
                         <div class="col-sm-5 py-2 color-black"> 
                                <h6>First Name:</h6>
                                <input type="text" id="fname_register" name="firstname" placeholder="First Name" class="w-75" required></input>
                                
                                <hr>
                        </div>

                            <!--Last Name Section -->
                        <div class="col-sm-5 py-2 color-black">
                                <h6>Last Name:</h6>
                                <input type="text" id="lname_register" name="lastname" placeholder="Last Name" class="w-75" required></input>
                                <hr>
                            </div>
                    
                       

                        <div class="col-sm-5 col-12 m-auto color-black"> 
                                <h6>Username:</h6>
                                <input type="text" id="username_register" name="username" placeholder="Username" class="w-75" required></input>
                                
                                <hr>
                        </div>

                        <div class="col-sm-5 col-12 m-auto color-black"> 
                                <h6>E-Mail:</h6>
                                <input type="text" id="email_register" name="email" placeholder="E-Mail" class="w-75" required></input>
                                
                                <hr>
                        </div>
                            <!--Last Name Section -->
                        <div class="col-sm-5 m-auto color-black">
                                <h6>Password:</h6>
                                <input type="password" id="password_register" name="password_1" placeholder="Password" class="w-75" required></input>
                                <hr>
                        </div>

                        <div class="col-sm-5 m-auto color-black">
                                <h6>Retype Password:</h6>
                                <input type="password" id="confirm_password_register" name="password_2" placeholder="Password" class="w-75" required></input>
                                <hr>
                        </div>
                       
                        <h6 class = "px-3 color-black">Already have an account?<a href="login.php"> Login here!</a></h6>
                            
                            <div class="col-sm-3 py-5">
                               
                                <button type="submit" name="register"class="btn btn-outline-success color-white-bg form-control mx-auto" type="submit" align="center" >Register</button>
                            </div>
                    </form>
                
            </div>
          </div>
          
 </section>
        <!--about us section end-->