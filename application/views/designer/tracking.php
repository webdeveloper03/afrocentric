<?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>
               
                <section class="explore-bg-header pt-5">
                  <div class="container-fluid">
                     <a href ="#" class="main-back"><i class="fas fa-arrow-left"></i></a>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="div-top-f-three">
                              <span class="float-left">Order 002937</span>
                              <span class="float-right">Status: Shipped</span>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="bg-white p-2 rounded px-3 mt-5 mb-5 progress-bar-fourty-three">
                               <div class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                    <span class="dot dot-1"></span>
                                   <hr class="flex-fill track-line track-line-first">
                                   <span class="dot dot-1"></span>
                                   <hr class="flex-fill track-line track-line-radius">
                                   <span class="dot check-dot"><i class="fas fa-check"></i></span>
                                   <hr class="flex-fill track-line track-line-second-last">
                                   <span class="dot dot-3-silver"></span>
                                   <hr class="flex-fill track-line track-line-last">
                                   <span class="d-flex justify-content-center align-items-left big-dot dot"></span>
                                </div>
                                 <div class="d-flex flex-row justify-content-between align-items-left">
                                      <div class="d-flex flex-column align-items-start">
                                       <span class="prog-bold">Ordered</span>
                                       <span class="prog-p">02/01/2020</span>
                                       <span class="prog-p">10:00</span>
                                      </div>
                                      <div class="d-flex flex-column justify-content-center">
                                       <span class="prog-bold">Ready</span>
                                       <span class="prog-p">02/01/2020</span>
                                       <span class="prog-p">10:00</span>
                                      </div>
                                      <div class="d-flex flex-column justify-content-center align-items-left">
                                       <span class="prog-bold mrgin-progres">Shipped</span>
                                       <span class="prog-p mrgin-progres">02/01/2020</span>
                                       <span class="prog-p mrgin-progres">10:00</span>
                                      </div>
                                      <div class="d-flex flex-column align-items-center">
                                       <span></span><span></span>
                                       </div>
                                      <div class="d-flex flex-column align-items-left">
                                       <span class="prog-bold">Estimated Delivery</span>
                                       <span class="prog-p">02/01/2020</span>
                                       <span class="prog-p">10:00</span>
                                      </div>
                                 </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 cl-btn">
                           <div>
                              <button>
                                 General
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <h2 class="information-head">Customer Information</h2>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-6">
                           <h6 class="h6-info">Billing address</h6>
                           <p class="para-info">Emeka</p>
                           <p class="para-info">Anyawu</p>
                           <p class="para-info">emekanyawu@example.com</p>
                           <p class="para-info">0809 888 777 6655</p>
                           <p class="para-info">7, Ebinpejo Lane, Idumota</p>
                           <p class="para-info">Lagos</p>
                           <p class="para-info">Nigeria</p>
                        </div>
                        <div class="col-6">
                           <h6 class="h6-info">Shipping address</h6>
                           <p class="para-info">Emeka</p>
                           <p class="para-info">Anyawu</p>
                           <p class="para-info">emekanyawu@example.com</p>
                           <p class="para-info">0809 888 777 6655</p>
                           <p class="para-info">7, Ebinpejo Lane, Idumota</p>
                           <p class="para-info">Lagos</p>
                           <p class="para-info">Nigeria</p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <h2 class="information-head">Products Information</h2>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="table-responsive">
                              <table class="table table-bordered table-information">
                                <thead>
                                  <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Subtotal</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">Ready To Wear Kids top Complete Set</th>
                                    <td>N15,000</td>
                                    <td>1</td>
                                    <td>N15,000</td>
                                  </tr>
                                </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <h2 class="information-head">Summary</h2>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4 col-summary">
                           <div class="clearfix mb-2">
                              <span class="float-left mr-4">Total</span>
                              <span class="float-right mr-4">N15,000</span>
                           </div>
                           <div class="clearfix mb-2">
                              <span class="float-left mr-4">Shipping Fee</span>
                              <span class="float-right mr-4">N1,500</span>
                           </div>
                           <div class="clearfix mb-2">
                              <span class="float-left mr-4 sp-bold">Subtotal</span>
                              <span class="float-right mr-4 sp-bold">N16,500</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               
               
               
            <?php   }else{
   header("Location:".base_url()."login");
}?>