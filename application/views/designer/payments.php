<?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>


<section class="bg-white pb-5">
                  <div class="container mt-5">
                     <div class="row">
                        <div class="col-md-9 m-auto">
                           <a href ="#" class="main-back ml-3"><i class="fas fa-arrow-left"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="container sign-2-container mt-1 pl-4 pr-4">
                    <div class="row first-row-sign2">
                      <div class="col-md-12">
                        <h2 class="sign-head sign-head-one-two-four">Payment</h2>
                      </div>
                    </div>
                    <div class="row">
                       <div class="col-md-12 pt-3 pb-4 col-payment">
                          <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                             <label class="form-check-label" for="inlineRadio1"><img class="biglogo" src="<?=base_url();?>assets/images/mc.png"></label>
                           </div>
                           <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                             <label class="form-check-label" for="inlineRadio2"><img class="biglogo" src="<?=base_url();?>assets/images/visa.png"></label>
                           </div>
                           <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                             <label class="form-check-label" for="inlineRadio3"><img class="biglogo" src="<?=base_url();?>assets/images/verve.png"></label>
                           </div>
                           <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                             <label class="form-check-label" for="inlineRadio3"><img class="biglogo" src="<?=base_url();?>assets/images/paypall.png"></label>
                           </div>
                       </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <form>
                          <div class="row">
                             <div class="col-md-12">
                                <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Card Number*</label>
                                <input type="email" class="form-control sign2-f-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                             </div>
                          </div>
                          <div class="row mb-3">
                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="web-label" for="exampleFormControlSelect1">Expiry*</label>
                                <select class="form-control sign2-f-control f-control-o-t-four" id="exampleFormControlSelect1">
                                  <option>Month</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <select class="form-control sign2-f-control single-field f-control-o-t-four" id="exampleFormControlSelect1">
                                  <option>Year</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">CVV*</label>
                                <input type="email" class="form-control sign2-f-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                             <div class="col-md-12">
                                <div class="funkyradio mt-0 mb-0">
                                    <div class="funkyradio-primary">
                                       <input type="radio" name="radio" id="radio2" checked/>
                                       <label class="label-one-twothree-bottom" for="radio2">Save my details for future purposes</label>
                                    </div>
                                 </div>
                             </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12 col-summary col-summary-onetwo-four">
                                 <div class="clearfix mb-2">
                                    <span class="float-left mr-4">Subtotal (1 item)</span>
                                    <span class="float-right mr-4">N15,000</span>
                                 </div>
                                 <div class="clearfix mb-2">
                                    <span class="float-left mr-4">Delivery Cost</span>
                                    <span class="float-right mr-4">N1,000</span>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12 col-summary col-summary-onetwo-four-2">
                                 <div class="clearfix mb-2">
                                    <span class="float-left y mr-4">Subtotal (1 item)</span>
                                    <span class="float-right mr-4">N15,000</span>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12 p-0">
                                 <button class="btn big-btn c-p">
                                    Confirm Payment
                                 </button>
                              </div>
                           </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </section>






                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>