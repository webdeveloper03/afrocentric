<style>
   .auth-wrapper{
   width:100 !important;
   padding:0px !important;
   }
   .sign-head, .p-top-onesixteenpage{
   color:#222224;
   }
   .circles-parent-div > p{
   cursor: pointer;
   border: solid 5px #fff !important;
   }
   .get-1{
       line-height:1;
   }
   .h6-checkbox {
    color: #000;
}
.prog-sp-1 {
    position: absolute;
    bottom: -25px;
    color: #d4d4d4;
}
</style>
<section class="bg-white pb-5">
   <div class="container-fluid bg-white">
   <div class="row">
      <div class="col-md-12">
         <h3><img src="<?=base_url();?>assets/images/site/Dei4vQVCMyr5fAszw38PRamGjH7ISl9O.png" class="logo-business"><span class="afro-a">AFROCENTRIC</span></h3>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <div class="col-10 col-md-6  mx-auto d-flex align-items-center justify-content-between">
            <div class="line-bar line-bar-active"></div>
            <span class="prog-sp-1">Basic Information</span>
            <div class="line-bar  line-bar-active"></div>
            <span class="prog-sp-2"><b style="color:#000; font-weight:900">Business Information</b></span>
         </div>
      </div>
   </div>
   <form class = " container sign-2-container" method= "post" action="<?=base_url();?>business/register">
      <div class="row first-row-sign2">
         <div class="col-md-12">
            <h3 class="get-1">Tell us about your Business</h3>
         </div>
      </div>
      <div class="row">
      <div class="col-sm-12">
         <label class="label-1">
            <h6>Business Name*</h6>
            <p class="label-txt">John</p>
            <input type="text" class="input" name="b_name" required>
            <div class="line-box">
               <div class="line"></div>
            </div>
         </label>
         <label class="label-1">
            <h6>Business Type</h6>
            <p class="label-txt">Fashion Designer</p>
            <div class="row">
               <div class="col-md-12">
                  <select class="form-control mt-5" name="b_type" style="border: none;border-bottom: solid 1px;">
                     <option>Personal</option>
                     <option>Partnership</option>
                  </select>
                  <div class="line"></div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <h6>Identification</h6>
                  <p class="label-txt">Select One</p>
                  <select class="form-control mt-5" name="b_identification" style="border: none;border-bottom: solid 1px;">
                     <option>Design Clothes</option>
                     <option>Tailors Business</option>
                     <option>Model</option>
                  </select>
                  <div class="line"></div>
               </div>
            </div>
         </label>
         <label class="label-1">
            <h6>National ID Number</h6>
            <p class="label-txt">National ID Number</p>
            <input type="text" class="input"  name="nic" >
            <div class="line-box">
               <div class="line"></div>
            </div>
         </label>
         <label class="label-1">
            <h6>Years of Experience</h6>
            <p class="label-txt">5</p>
            <input type="text" class="input" name= "experience">
            <div class="line-box">
               <div class="line"></div>
            </div>
         </label>
         <div class="row">
            <div class="col-md-12">
               <h6>Education</h6>
               <p class="label-txt">Fashion School</p>
               <select class="form-control mt-5" style="border: none;border-bottom: solid 1px;" name="education">
                  <option>BS</option>
                  <option>MS</option>
                  <option>PHD</option>
               </select>
               <div class="line"></div>
            </div>
         </div>
         <div class="row mt-5 text-black">
             <h6 style="color:#000">Skills</h6>
          </div>
         <div class="row">
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Bespoke</h6>
            </div>
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Ready To Wear</h6>
            </div>
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Unisex</h6>
            </div>
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Male</h6>
            </div>
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Female</h6>
            </div>
         </div>
         <div class="row text-black">
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Bridal</h6>
            </div>
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Children</h6>
            </div>
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Traditional</h6>
            </div>
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Corporate</h6>
            </div>
            <div class="col-md-2">
               <h6 class="h6-checkbox"> <input type="checkbox" name="skills"> Other</h6>
            </div>
         </div>
   </form>
       <div class="row">
           <div class="col-md-11 m-auto">
               <input type="hidden" name="terms" value="setisget" id="terms" checked="">
                    <button class="btn big-btn" type="submit" id="reg_submit">
                        Continue
                    </button>
               <p id="error" class="error text-danger"></p>
           </div>
       </div>
    </div>      
</section>