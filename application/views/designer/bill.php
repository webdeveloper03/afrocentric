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
                        <h2 class="sign-head sign-head-onetwothree">Billing Details</h2>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <form>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">First Name*</label>
                                <input type="email" class="form-control sign2-f-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Last Name*</label>
                                <input type="email" class="form-control sign2-f-control sign2-f-control-onetwothree" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text smallone-two-three">Last Name is required</small>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">House Address*</label>
                                <input type="email" class="form-control sign2-f-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleFormControlSelect1">City*</label>
                                <select class="form-control sign2-f-control" id="exampleFormControlSelect1">
                                  <option></option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleFormControlSelect1">State*</label>
                                <select class="form-control sign2-f-control" id="exampleFormControlSelect1">
                                  <option></option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="web-label" for="exampleFormControlSelect1">Country/Region*</label>
                                <select class="form-control sign2-f-control" id="exampleFormControlSelect1">
                                  <option></option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Phone Number*</label>
                                <input type="email" class="form-control sign2-f-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Email Address*</label>
                                <input type="email" class="form-control sign2-f-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                             <div class="col-md-12">
                                <div class="funkyradio mt-3 mb-3">
                                   <div class="funkyradio-primary">
                                     <input type="radio" name="radio" id="radio2" checked/>
                                     <label class="label-one-twothree" for="radio2">Ship to a different address?</label>
                                   </div>
                                 </div>
                             </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">House Address*</label>
                                <input type="email" class="form-control sign2-f-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </div>
                          </div>
                          <div class="row mb-5">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleFormControlSelect1">City*</label>
                                <select class="form-control sign2-f-control" id="exampleFormControlSelect1">
                                  <option></option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleFormControlSelect1">State*</label>
                                <select class="form-control sign2-f-control" id="exampleFormControlSelect1">
                                  <option></option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="container one-two-three-second-container">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="card card-fourty-two card-one-two-two shadow-sm">
                              <h6 class="onetwothree-head">Your Orders</h6>
                              <div class="div-top d-top-onetwothree">
                                 <span class="float-left">Product</span>
                                 <span class="float-right">Subtotal</span>
                              </div>
                              <div class="div-top d-top-onetwothree d-top-onetwothree2">
                                 <span class="float-left">Ready To Wear Kids top Complete Set</span>
                                 <span class="float-right">N15,000</span>
                              </div>
                              <div class="row">
                                 <div class="col-4">
                                    <p class="p-left">Shipping</p>
                                 </div>
                                 <div class="col-8">
                                    <div class="form-check form-check-1 form-check-1-onetwothree">
                                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Standard Delivery: N1,500
                                      </label>
                                    </div>
                                    <div class="form-check form-check-2 form-check-2-onetwothree">
                                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Express Delivery: N3,000
                                      </label>
                                    </div>
                                    <div class="form-check form-check-2 form-check-2-onetwothree">
                                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Flat Rate Delivery: N1,000
                                      </label>
                                    </div>
                                    <div class="form-check form-check-2 form-check-2-onetwothree form-check-2-onetwothree-last">
                                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Free Delivery
                                      </label>
                                    </div>
                                 </div>
                              </div>
                              <div class="div-bottom">
                                 <span class="float-left"></span>
                                 <span class="float-right">N16,500</span>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="card card2-onetwothree">
                              <h6>Payment Options</h6>
                              <div class="form-check form-check1">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label form-check-label-onetwothree" for="inlineRadio1">Bank Transfer</label>
                              </div>
                              <div class="form-check form-check2">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label form-check-label-onetwothree" for="inlineRadio1">Paypal <img class="paypal" src="<?=base_url();?>assets/images/420-4202400_paypal-credit-card-logo-png-paypal-logo-transparent.png"></label>
                              </div>
                              <div class="form-check form-check3">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label form-check-label-onetwothree" for="inlineRadio1">Debit/Credit Cards</label>
                              </div>
                              <div class="row justify-content-center">
                                 <div class="col-3">
                                    <a href="#"><img class="logos-onetwothree" src="<?=base_url();?>assets/images/234-2342510_aerocontractors-the-reliable-way-to-fly-verve-card-removebg-preview.png"></a>
                                 </div>
                                 <div class="col-3">
                                    <a href="#"><img class="logos-onetwothree" src="<?=base_url();?>assets/images/download 22.png"></a>
                                 </div>
                                 <div class="col-2">
                                    <a href="#"><img class="logos-onetwothree" src="<?=base_url();?>assets/images/Visa-Logo-2006-2014.png"></a>
                                 </div>
                              </div>
                              <p>
                                 Your personal data will be used to process your order, support your experience throughout the website, an other purposes described in our <a href ="#">privacy policy</a>
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-9 pt-5 pb-5 m-auto">
                           <div class="funkyradio mt-3 mb-3 text-center">
                              <div class="funkyradio-primary m-auto">
                                 <input type="radio" name="radio" id="radio2" checked/>
                                 <label class="label-one-twothree-bottom" for="radio2">I have read and agree to the website's terms and condition</label>
                              </div>
                           </div>
                           <button class="btn big-btn">
                                Place Order
                              </button>
                        </div>
                     </div>
                  </div>
                </section>
                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>