<?php 
    $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>


               <section class="explore-bg-header pt-5">
                  <div class="container-fluid">
                     <a href ="#" class="main-back"><i class="fas fa-arrow-left"></i></a>
                     <div class="row">
                        <div class="col-md-8">
                           <div class="row">
                              <div class="col-md-12 col-for-tble">
                                 <div class="table-responsive m-0">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <td class="td-icones td-first-icone" style="border-top: 0px;"><i class="far fa-times-circle"></i></td>
                                          <td class="f-two-td-img td-brdr">
                                             <img src="<?=base_url();?>assets/images/chotoo.png" class="w-25 rounded">
                                          </td>
                                          <td class="td-paras td-brdr">
                                             <p>Ready To Wear Kids top Complete Set</p>
                                             <span>Red, M</span>
                                          </td>
                                          <td class="td-paras td-brdr">
                                             <p>N15,000</p>
                                          </td>
                                          <td class="td-icones td-brdr">
                                             <i class="fas fa-minus"></i>
                                             <span>1</span>
                                             <i class="fas fa-plus"></i>
                                          </td>
                                          <td class="td-paras td-brdr"><p>N15,000</p></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="card card-fourty-two card-one-two-two shadow-sm">
                              <h6>Cart Totals</h6>
                              <div class="div-top">
                                 <span class="float-left">Subtotal</span>
                                 <span class="float-right">N15,000</span>
                                 <div class="mt-5">
                                    <span class="span-1">Promo/Coupon Code</span>
                                    <span class="span-2">
                                       <input class="form-control" placeholder="XXXXXXXX" type="text" name="">
                                    </span>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-4">
                                    <p class="p-left">Shipping</p>
                                 </div>
                                 <div class="col-8">
                                    <div class="form-check form-check-1">
                                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                      <label class="form-check-label" for="exampleRadios1">
                                        Flat Rate: N1,500
                                      </label>
                                    </div>
                                    <div class="form-check form-check-2">
                                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                      <label class="form-check-label" for="exampleRadios2">
                                        Free Shipping
                                      </label>
                                    </div>
                                    <p class="mb-0 p-ryt">Shipping will be updated during checkout</p>
                                 </div>
                              </div>
                              <div class="div-bottom">
                                 <span class="float-left">Total</span>
                                 <span class="float-right">N16,500</span>
                              </div>
                              <button class="btn btn-warning mb-5">
                                 Proceed to checkout
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>






                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>