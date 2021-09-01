<?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>

<section class="bg-white pb-5">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12 main-col-order">
                           <div class="register-photo">
                               <div class="form-container">
                                   <div class="image-holder"></div>
                                   <div class="rytside-onetwofive" method="post">
                                       <h2 class="ryt-side-headtop">Success</h2>
                                       <p class="ryt-side-ptop">Thank you, your order has been received.</p>
                                       <div class="row order-result-row">
                                          <div class="col-md-3">
                                             <div class="rytside-inside-div">
                                                <p class="ryt-col-p1">Order Number</p>
                                                <p class="ryt-col-p2">002937</p>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <div class="rytside-inside-div">
                                                <p class="ryt-col-p1">Date</p>
                                                <p class="ryt-col-p2">01 - 01 - 2020</p>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <div class="rytside-inside-div">
                                                <p class="ryt-col-p1">Amount</p>
                                                <p class="ryt-col-p2">N16,500</p>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <div class="rytside-inside-div">
                                                <p class="ryt-col-p1">Payment Type</p>
                                                <p class="ryt-col-p2">Card</p>
                                             </div>
                                          </div>
                                       </div>
                                       <p class="ryt-bigpara">
                                          You can track the progress of your order with your Order Number. Also, in cases of customer support, you'll have to provide your Order Number. Keep your order<br><br>
                                          Afrocentric offers 72hr /3day return/exchange policy on all items if you are not completely satisfied with your purchase.  The buyer is responsible for shipping charges. please include the order number, purchase name, a contact number, email and reason for return. Items on clearance cannot be returned, as they are final sale.
                                       </p>
                                       <button class="btn btn-warning ryt-sidebtn-1">
                                          Continue Shopping
                                       </button><br><br>
                                       <button class="btn bg-light ryt-sidebtn-2">
                                          View Order Details
                                       </button>
                                       <!-- <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
                                       <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                                       <div class="form-group"><input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)"></div>
                                       <div class="form-group">
                                           <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to the license terms.</label></div>
                                       </div>
                                       <div class="form-group"><button class="btn btn-success btn-block" type="submit">Sign Up</button></div><a class="already" href="#">You already have an account? Login here.</a> -->

                                   </div>
                               </div>
                           </div>
                        </div>
                     </div>
                  </div>
                </section>






                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>