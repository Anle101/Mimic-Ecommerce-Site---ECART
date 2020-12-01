<section id="contact_us" class="bg">
            <div class="container-fluid w-50 color-white-bg">
                <h2 class = "font-b612 py-4 color-black">Contact Us Form</h2>
                <hr>
                    <!--First Name Section -->
                    <form method="POST" action="successfully_submitted.php" id="contact_us_form">    
                        <div class="col-sm-5 py-2 color-black"> 
                                <h6>First Name:</h6>
                                <input type="text" id="fname_contact" placeholder="First Name" required></input>
                                
                                <hr>
                        </div>

                            <!--Last Name Section -->
                        <div class="col-sm-5 py-2 color-black">
                                <h6>Last Name:</h6>
                                <input type="text" id="lname_contact" placeholder="Last Name" required></input>
                                <hr>
                            </div>

                            <!--Email Section -->
                        <div class="col-sm-5 py-2 color-black">
                                <h6>E-Mail:</h6>
                                <input type="text" id="email_contact" placeholder="E-Mail" required></input>
                                <hr>
                            </div>

                            <!--Message Section -->
                            <div class="col-sm-5 py-2 form-group color-black">
                                    <h6>Message:</h6>
                                    <textarea rows="6" cols="50" id="message_contact" placeholder="Message" form="contact_us_form" class="form-control" required></textarea>
                                    <hr>
                                </div>
                            
                            
                            <div class="col-sm-3 py-5">
                                <button type="submit" class="btn btn-outline-success color-white-bg form-control" type="submit" align="center" >Submit</button>
                            </div>
                    </form>
            </div>    
          </section>
          <!--end of cart preview-->