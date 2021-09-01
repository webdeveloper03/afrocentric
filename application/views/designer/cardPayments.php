<!-- plan section start -->
<style>
    .auth-wrapper{
        width:100 !important;
        padding:0px !important;
    }
</style>
<div class ="wrapper bg-white text-black">
<section>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <i class="fas fa-arrow-left plan-arrow" style="color:#000"></i>
         </div>
      </div>
   </div>
</section>
<section>
   <div class="container container-payment">
      <div class="row">
         <div class="col-md-12">
            <h3 class="pay-card">Payment</h3>
         </div>
      </div>
       <div class="row">
         <div class="col-md-3">
            <input type="radio" name="radio" class="radio-1"><img src="<?=base_url();?>assets/images/download 22.png" class="card-img-1">
         </div>
          <div class="col-md-3">
            <input type="radio" name="radio" class="radio-1"><img src="<?=base_url();?>assets/images/Visa-Logo-2006-2014.png" class="card-img-1">
         </div>
          <div class="col-md-3">
            <input type="radio" name="radio" class="radio-1"><img src="<?=base_url();?>assets/images/234-2342510_aerocontractors-the-reliable-way-to-fly-verve-card-removebg-preview.png" class="card-img-1">
         </div>
          <div class="col-md-3">
            <input type="radio" name="radio" class="radio-1"><img src="<?=base_url();?>assets/images/420-4202400_paypal-credit-card-logo-png-paypal-logo-transparent.png" class="card-img-1">
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <form>
               <label class="label-1">
                     <h6>Card Number*</h6><br/>
                     <input type="text" class="input">
                     <div class="line-box">
                        <div class="line"></div>
                     </div>
               </label>
               <label class="label-1">
                     <h6>Expiry*</h6>
                     <div class="row">
                        <div class="col-md-4">
                           <select class="form-control mar-t b-select">
                                 <option>Month</option>
                                    <option>1 - January - 2020</option>
                                    <option>1 - January - 2020</option>
                           </select>
                                    <div class="line"></div>
                        </div>
                        <div class="col-md-4">
                           <select class="form-control mar-t b-select">
                                 <option>Year</option>
                                 <option>1 - January - 2020</option>
                                 <option>1 - January - 2020</option>
                              </select>
                              <div class="line"></div>
                        </div>
                        <div class="col-md-4">
                           <h6>CVV*</h6>
                           <div class="mar-t-2">
                              <input type="text" class="input">
                                 <div class="line-box">
                                    <div class="line"></div>
                                 </div>
                           </div>
                        </div>
                     </div>
                </label>
            </form>
         </div>
      </div>
      <div class="row">
          <div class="col-md-12">
               <label class="btn btn-default">
                  <h6 class="fo-checkbox"><input type="checkbox" autocomplete="off">&nbsp;&nbsp;&nbsp;&nbsp;Save my details for future purposes</h6>
                  <span class="glyphicon glyphicon-ok"></span>
               </label> 
          </div>
      </div>
      <div class="row bg-sub">
         <div class="col-md-6">
            <h6>Subtotal (1 item)</h6><br/>
            <h6>Delivery Cost</h6>
         </div>
         <div class="col-md-6">
            <div class="float-right">
               <h6>N15,000</h6><br/>
               <h6>N0.0</h6>
            </div>
         </div>
      </div><br/>
       <div class="row bg-sub-2">
         <div class="col-md-6">
            <h6 class="TOTAL">TOTAL AMOUNT</h6>
         </div>
         <div class="col-md-6">
            <div class="float-right">
               <h6 class="TOTAL">N15,000</h6>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <button class="card-pay-btn">
               Confirm Payment
            </button>
         </div>
      </div>
   </div>
</section>
</div>