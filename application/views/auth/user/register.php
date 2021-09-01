                        <form id="reg_form">
                        <div class="row">
                           <div class="col-12 col-md-12 main-col-signup">
                               <span id="success_msg"></span>
                              <div class="form-parent signup-container m-auto" style="with:100% !important">
                                 <div class="spans-parent-sign-up">
                                    <span class="signup-span-1">
                                       <img style="margin-left: -10px; margin-bottom: 10px; height: 50px;" src="<?=base_url();?>assets/images/site/Dei4vQVCMyr5fAszw38PRamGjH7ISl9O.png" id="logo" class="img-fluid">
                                    </span>
                                    <span class="">
                                       <a class = "signup-span-2" href = "<?=base_url();?>login">Sign In</a>
                                    </span>
                                 </div>
                                 <div class="row">
                                    <div class="col-6 col-md-6">
                                           
                                          <div class="form-group">
                                           <label for="">First Name</label>
                                           <input type="text" class="form-control name-form-control" id="firstname" aria-describedby="emailHelp" placeholder="First Name" name="firstname" required>
                                         </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                          <div class="form-group">
                                           <label for="">Last Name</label>
                                           <input type="text" class="form-control signup-formcontrol" id="lastname" aria-describedby="emailHelp" placeholder="Last Name" name="lastname">
                                         </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-6 col-md-6">
                                          <div class="form-group">
                                           <label for="">Username</label>
                                           <input type="text" class="form-control signup-formcontrol" id="username" aria-describedby="emailHelp" name="username" placeholder="Username here" required>
                                           <span id="username-error"></span>
                                         </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                          <div class="form-group">
                                           <label for="">Email</label>
                                           <input type="email" required class="form-control signup-formcontrol" id="email" aria-describedby="emailHelp" name="email" placeholder="emila@yahoo.com">
                                                                              <span id="email-error"></span>

                                         </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-6 col-md-6">
                                          <div class="form-group">
                                              <label for="">Password</label>
                                              <input type="password" required class="form-control signup-formcontrol" id="password" name ="password"  autocomplete="off" placeholder="*********">
                                            </div>
                                    </div>
                                    <div class="col-6 col-md-6">
                                          <div class="form-group">
                                              <label for="">Confirm Password</label>
                                              <input type="password" class="form-control signup-formcontrol" id="cpassword" name="cpassword" placeholder="*********" autocomplete="off">
                                            </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-12 col-md-12 signup-terms">
                                       <p>
                                          <input required type="checkbox" name = "terms" class="form-check-input" id="terms">
                                          <label class="form-check-label" for="exampleCheck1"></label>
                                          I agree to Afrocentric Kulture's <span>Terms and Conditions</span>
                                       </p>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-12 col-md-12">
                                       <button class="btn btn-primary sign-btn-1" id="reg_submit" reg_type="user" name="reg_submit" value="user">Continue</button>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-12 col-md-12 text-center">
                                       <p class="p-sign-suggest">Or sign up with</p>
                                    </div>
                                 </div>
                                 <div class="row justify-content-center">
                                    <div class="col-6 col-md-6 text-right">
                                       <a href="#" class="sign-up-social-links-facebook">
                                          <i class="signup-facebook fab fa-facebook-f"></i>
                                       </a>
                                    </div>
                                    <div class="col-6 col-md-6">
                                       <a href="#" class="sign-up-social-links">
                                          <img src="<?=base_url();?>assets/images/googlee.png">
                                       </a>
                                    </div>
                                 </div>
                                 <div class="row row-suggest">
                                    <div class="col-6 col-md-6 text-center">
                                       <p class="want-sell">Want to sell with us?</p>
                                    </div>
                                    <div class="col-6 col-md-6">
                                       <a href="<?=base_url();?>teamsignup" class="btn sign-btn-2">Join Our Team</a>
                                    </div>
                                 </div>
                              </div>   
                           </div>
                        </div>
                        </form>