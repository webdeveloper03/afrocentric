       <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>



 <!-- hire -->
               <section>
                        <div class="container">
                          
                              <div class="row">
                                 <div class="col-md-2">
                                    <i class="fas fa-arrow-left plan-arrow-2"></i>
                                 </div>
                                    <div class="col-md-8">
                                       <form class="five-form"> 
                                              <h3 class="get-2">New Meaurement</h3>    
                                          <label class="label-1">
                                             <h6>Measurement Title*</h6><br/>
                                                   <input type="text" class="input">
                                                      <div class="line-box">
                                                         <div class="line"></div>
                                                      </div>
                                          </label>
                                         <label class="label-1">
                                          <h6>Customer Name</h6><br/>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                         <div class="row">
                                            <div class="col-md-6">
                                                 <label class="label-1">
                                          <h6>Style Range*</h6><br/>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                            </div>
                                             <div class="col-md-6">
                                                <label class="label-1">
                                          <h6>Fabric Choice*</h6><br/>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                 <label class="label-1">
                                          <h6>Stitching Method*</h6><br/>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                            </div>
                                             <div class="col-md-6">
                                                <label class="label-1">
                                          <h6>Color Preference*</h6><br/>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                 <label class="label-1">
                                          <h6>Fabric Care Instruction*</h6><br/>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                            </div>
                                             <div class="col-md-6">
                                                <select class="select-64">
                                                      <option>
                                                         Style Require Hangtangs
                                                      </option>
                                                      <option>
                                                         hello
                                                      </option>
                                                      <option>
                                                         hello
                                                      </option>
                                                </select>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                             <h6>Sex:</h6>
                                               <div class="row">
                                                  <div class="col-md-3">
                                                     <div class="form-group">
                                                         <input type="checkbox" id="html">
                                                         <label for="html">Male</label>
                                                       </div>
                                                  </div>
                                                  <div class="col-md-3">
                                                     <div class="form-group">
                                                         <input type="checkbox" id="html">
                                                         <label for="html">Female</label>
                                                       </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                     <div class="form-group">
                                                         <input type="checkbox" id="html">
                                                         <label for="html">Other sexualities</label>
                                                       </div>
                                                  </div>
                                               </div>
                                            </div>
                                         </div>
                                         <div class="row">
                                            <div class="col-md-12">
                                               <button class="fivety-btn">
                                                  Continue
                                               </button>
                                            </div>
                                         </div>
                                          </form>
                                    </div>
                                    <div class="col-md-2">
                                       <div class="container my-5" style="    padding-left: 93px;">
                                            
                                             <div class="my-5">
                                                <div class="steps" id="stepWizard">
                                                   <div class="step position-relative">
                                                      <div class="step-heading position-static" id="step1">
                                                         <a class="" role="button" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                                            <div class="num d-inline-flex text-white align-items-center justify-content-center position-relative rounded-circle bg-primary">1</div><br/><span style="    font-size: 11px;
    margin-left: -3%;
    color: black;">Basic Details</span>
                                                            <div class="pl-3 d-inline-flex title"></div>
                                                         </a>
                                                      </div>

                                                      <div class="line position-absolute"></div>

                                                      <div id="collapse1" class="pl-5 collapse show" aria-labelledby="step1" data-parent="#stepWizard">
                                                        
                                                      </div>
                                                   </div>

                                                   <div class="step position-relative">
                                                      <div class="step-heading position-static" id="step2">
                                                         <a class="" role="button" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                                            <div class="num-2 d-inline-flex text-white align-items-center justify-content-center position-relative rounded-circle bg-primary" style="    margin-top: 176%;">2</div><br/><span style="    font-size: 11px;margin-left: -15%;color: #DADADA;">Measurements</span>
                                                            <div class="pl-3 d-inli
                                                            ne-flex title" style="margin-top: 42%;"></div>
                                                         </a>
                                                      </div>

                                                      <!-- <div class="line position-absolute"></div> -->

                                                      <div id="collapse2" class="pl-5 collapse" aria-labelledby="step2" data-parent="#stepWizard">
                                                         
                                                      </div>
                                                   </div>

                                                </div>
                                             </div>
                                          </div>
                                 </div>
                              </div>
                        </div>
               </section>
               <!-- hire -->



                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>