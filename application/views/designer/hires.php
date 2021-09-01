       <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>
               <section>
                     <div class="container">
                           <div class="row">
                                <div class="col-md-12">
                                   <ul class="nav nav-tabs" role="tablist" id="nav-tal">
                                     <li class="nav-item">
                                       <a class="nav-link active2 text-t" data-toggle="tab" href="#home"><b> Active Hires</b></a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link text" data-toggle="tab" href="#menu1"><b>Pending Hires</b></a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link text" data-toggle="tab" href="#menu2"><b>Hires History</b></a>
                                     </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="row mt-5">
                                <div class="col-md-8">
                                   <select style="border:none;">
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                   </select>
                                </div>
                                <div class="col-md-3 search33">
                                   <input type="text" name="search" placeholder="Search here" class="search3"><i class="fa fa-search float-right"></i>
                                </div>
                             </div>
                             <div class="row mt-5">
                                <div class="col-md-4">
                                   <div class="card" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/logo-33.png" alt="Card image cap">
                                      <div class="card-body">
                                        <h5 class="card-title card-title-2">Hire Title</h5>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p>
                                                 Staff
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 Emeka Wilson
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p>
                                                 Start Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 1 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p>
                                                 End Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                31 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <a href="#" class="btn btn-primary c-title-btn">View Order</a>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="card" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/logo-33.png" alt="Card image cap">
                                      <div class="card-body">
                                        <h5 class="card-title card-title-2">Hire Title</h5>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p>
                                                 Staff
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 Emeka Wilson
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p>
                                                 Start Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 1 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p>
                                                 End Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                31 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <a href="#" class="btn btn-primary c-title-btn">View Order</a>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="card" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/logo-33.png" alt="Card image cap">
                                      <div class="card-body">
                                        <h5 class="card-title card-title-2">Hire Title</h5>
                                         <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 Staff
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 Emeka Wilson
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 Start Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 1 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 End Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                31 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <a href="#" class="btn btn-primary c-title-btn">View Order</a>
                                      </div>
                                    </div>
                                </div>
                             </div>
                             <div class="row mt-5">
                                <div class="col-md-4">
                                   <div class="card" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/logo-33.png" alt="Card image cap">
                                      <div class="card-body">
                                        <h5 class="card-title card-title-2">Hire Title</h5>
                                         <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 Staff
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 Emeka Wilson
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 Start Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 1 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 End Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                31 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <a href="#" class="btn btn-primary c-title-btn">View Order</a>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="card" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/logo-33.png" alt="Card image cap">
                                      <div class="card-body">
                                        <h5 class="card-title card-title-2">Hire Title</h5>
                                         <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 Staff
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 Emeka Wilson
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 Start Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 1 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 End Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                31 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <a href="#" class="btn btn-primary c-title-btn">View Order</a>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="card" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/logo-33.png" alt="Card image cap">
                                      <div class="card-body">
                                        <h5 class="card-title card-title-2">Hire Title</h5>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 Staff
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 Emeka Wilson
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 Start Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                 1 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <div class="row mt-3">
                                           <div class="col-md-6">
                                              <p class="stff1">
                                                 End Date
                                              </p>
                                           </div>
                                           <div class="col-md-6">
                                              <h6 class="emeta">
                                                31 - January - 2020
                                              </h6> 
                                           </div>
                                        </div>
                                        <a href="#" class="btn btn-primary c-title-btn">View Order</a>
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