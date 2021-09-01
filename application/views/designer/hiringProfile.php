<?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>


 <!-- hire -->
               <section>
                        <div class="container-fluid">
                           <div class="row row-col">
                              <div class="col-md-2">
                                 <a href="Products.html"><i class="fas fa-arrow-left arrow-font"></i></a>
                              </div>
                              <div class="col-md-2">
                                 <img src="<?=base_url();?>assets/images/hire-ex.png" class="w-100">
                              </div>
                              <div class="col-md-8">
                                 <h3 class="emeka-11">Hire Title</h3>
                                 <p>
                                    This is the textarea that is going to contain the description that the designer types while setting<br/> the hire up
                                 </p>
                                 <div class="row">
                                    
                                    <div class="col-md-3">
                                       <h6>Contract Type</h6>      
                                    </div>
                                     <div class="col-md-3">
                                       <p>Full-Time</p>      
                                    </div>
                                    <div class="col-md-6"></div>
                                 </div>
                                 <div class="row">
                                    
                                    <div class="col-md-3">
                                       <h6>Duration:</h6>      
                                    </div>
                                     <div class="col-md-3">
                                       <p>1 - January - 2020 to 31 - January - 2020</p>      
                                    </div>
                                    <div class="col-md-6"></div>
                                 </div>
                                 <div class="row">
                                    
                                    <div class="col-md-3">
                                       <h6>Budget:</h6>      
                                    </div>
                                     <div class="col-md-3">
                                       <p>N100,000 to N200,000</p>      
                                    </div>
                                    <div class="col-md-6"></div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <button class="btn btn-h">
                                          <img src="<?=base_url();?>assets/images/box-h.png"> End Appointment
                                       </button>
                                    </div>
                                    <div class="col-md-3">
                                       <button class="btn btn-w my-example-model" data-toggle="modal" data-target="#fullHeightModalRight">
                                          <img src="<?=base_url();?>assets/images/axx.png">  Terminate Appointment
                                       </button>
                                       <!-- Button trigger modal -->
                                       <!-- Full Height Modal Right -->
                                       <div class="modal fade right" id="fullHeightModalRight"        tabindex="-1" role="dialog" aria-labelledby="            myModalLabel"
                                                            aria-hidden="true">
                                          <div class="modal-dialog modal-full-height modal-right" role="document">
                                             <div class="modal-content">
                                                   <div class="modal-body">
                                                      <div class="container"> 
                                                         <div class="alert alert-success 
                                                            hide form-field"></div>  
                                                            <form id="user_form" novalidate action="   index.html"  method="post">  
                                                               <div class="row">
                                                                  <div class="col-md-2">
                                                                     <img src="<?=base_url();?>assets/images/logo-ex.png" class="w-100">
                                                                  </div>
                                                                  <div class="col-md-10">
                                                                     <h3>Walk Away?</h3>
                                                                     <p>
                                                                       If you walk away, Another designer will be able to snatch Emeka, Are you sure you want this?
                                                                     </p><br/>
                                                                     <div class="row mt-3">
                                                                        <div class="col-md-4">
                                                                           <button class="btn btn-motel">Yes, I'm walking away</button>   
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                           <button class="btn btn-m-2">No. I still want to negotiate</button>
                                                                        </div>
                                                                        <div class="col-md-2"></div>
                                                                     </div>
                                                                  </div>
                                                               </div> 
                                                            </form>     
                                                       </div>
                                                 </div>
                                            </div>
                                       </div>
                                  </div>
                              </div>
                                    <div class="col-md-3">  
                                       <button class="btn btn-m my-example-model" data-toggle="modal" data-target="#model-2"> Modify Contract
                                       </button>
                                       <!-- Button trigger modal -->
                                       <!-- Full Height Modal Right -->
                                       <div class="modal fade right" id="model-2"        tabindex="-1" role="dialog" aria-labelledby="            myModalLabel"
                                                            aria-hidden="true">
                                          <div class="modal-dialog modal-full-height modal-right" role="document">
                                             <div class="modal-content">
                                                   <div class="modal-body">
                                                      <div class="container"> 
                                                         <div class="alert alert-success 
                                                            hide form-field"></div>  
                                                            <form id="user-phone" novalidate action="   index.html"  method="post">  
                                                               <div class="row">
                                                                 <div class="col-md-12">
                                                                     <h3 class="get-1">Get Started</h3>
                                                                 </div>  
                                                               </div>
                                                               <div class="row">
                                                                     <div class="col-sm-12">
                                                                        <form >
                                                                           <label class="label-1">
                                                                              <h6>Basic Details</h6>
                                                                                 <p class="label-txt">Title</p>
                                                                                    <input type="text" class="input">
                                                                                       <div class="line-box">
                                                                                          <div class="line"></div>
                                                                                       </div>
                                                                           </label>
                                                                          <label class="label-1">
                                                                            <p class="label-txt">Project Description</p>
                                                                            <input type="text" class="input">
                                                                            <div class="line-box">
                                                                              <div class="line"></div>
                                                                            </div>
                                                                          </label>
                                                                          <label class="label-1">
                                                                           <h6>Duration</h6>
                                                                           <p class="label-txt">Start Date</p>
                                                                           <div class="row">
                                                                              <div class="col-md-6">
                                                                                 <select class="form-control mt-5">
                                                                                    <option>1 - January - 2020</option>
                                                                                    <option>1 - January - 2020</option>
                                                                                    <option>1 - January - 2020</option>
                                                                                 </select>
                                                                              </div>
                                                                              <div class="col-md-6">
                                                                                 <p class="label-txt">Start Date</p>
                                                                                 <select class="form-control mt-5">
                                                                                    <option>1 - January - 2020</option>
                                                                                    <option>1 - January - 2020</option>
                                                                                    <option>1 - January - 2020</option>
                                                                                 </select>
                                                                              </div>
                                                                           </div>
                                                                          </label>
                                                                          <label class="label-1">
                                                                           <h6>Budget</h6>
                                                                           <small>Set Price</small>
                                                                            <p class="label-txt">Set Price</p>
                                                                           <input type="text" class="input">
                                                                            <div class="line-box">
                                                                              <div class="line"></div>
                                                                            </div>
                                                                          </label>
                                                                             <label class="label-1">
                                                                              <h6>Others</h6>
                                                                               <p class="label-txt">Write a condition</p>
                                                                               <input type="text" class="input">
                                                                               <div class="line-box">
                                                                                 <div class="line"></div>
                                                                               </div>
                                                                               <p><i class="fa fa-plus"></i>Add new Condition</p>
                                                                               <a class="btn btn-warning b-sign btn-pro">Proceed to Negotiation</a>
                                                                               <a class="btn btn-warning b-sign btn-can">Cancel</a>
                                                                             </label>  
                                                                           </form>
                                                                     </div>
                                                               </div>
                                                            </form>     
                                                       </div>
                                                 </div>
                                            </div>
                                       </div>
                                  </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <div class="container">
                                            <ul class="nav nav-tabs" role="tablist">
                                              <li class="nav-item">
                                                <a class="nav-link thread active4 " data-toggle="tab" href="#home">Thread</a>
                                              </li>
                                              <li class="nav-item">
                                                <a class="nav-link thread2" data-toggle="tab" href="#menu1">Employee</a>
                                              </li>
                                              <hr/>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                              <div id="home" class="container tab-pane active"><br>
                                                   
                                                <div class="row">
                                                   <div class="col-md-8">
                                                      <div class="card-2">
                                                         <p>
                                                            Hello Emeka, I am in need of a skilled tailor. Are you down for a gig?
                                                         </p>
                                                         <p class="card-1-pe">
                                                            12:00<br/> Today
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div><br/>
                                                <div class="row">
                                                   <div class="col-md-8">
                                                      <div class="card-1">
                                                         <p>
                                                            Hello Emeka, I am in need of a skilled tailor. Are you down for a gig?
                                                         </p>
                                                         <p class="card-1-pe">
                                                            12:00<br/> Today
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div><br/>
                                                <div class="row">
                                                   <div class="col-md-8">
                                                      <div class="card-2">
                                                         <p>
                                                            Hello Emeka, I am in need of a skilled tailor. Are you down for a gig?
                                                         </p>
                                                         <p class="card-1-pe">
                                                            12:00<br/> Today
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div><br/>
                                                <div class="row">
                                                   <div class="col-md-8">
                                                      <div class="card-1">
                                                         <p>
                                                            Hello Emeka, I am in need of a skilled tailor. Are you down for a gig?
                                                         </p>
                                                         <p class="card-1-pe">
                                                            12:00<br/> Today
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div><br/>
                                                <div class="row">
                                                   <div class="col-md-8">
                                                      <div class="card-2">
                                                         <p>
                                                            Hello Emeka, I am in need of a skilled tailor. Are you down for a gig?
                                                         </p>
                                                         <p class="card-1-pe">
                                                            12:00<br/> Today
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div><br/>
                                                <div class="row">
                                                   <div class="col-md-8">
                                                      <div class="card-1">
                                                         <p>
                                                            Hello Emeka, I am in need of a skilled tailor. Are you down for a gig?
                                                         </p>
                                                         <p class="card-1-pe">
                                                            12:00<br/> Today
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div><br/>
                                                <div class="row">
                                                   <div class="col-md-8">
                                                      <div class="card-2">
                                                         <p>
                                                            Hello Emeka, I am in need of a skilled tailor. Are you down for a gig?
                                                         </p>
                                                         <p class="card-1-pe">
                                                            12:00<br/> Today
                                                         </p>
                                                      </div>
                                                   </div>
                                                </div><br/>
                                                <div class="row">
                                                   <div class="col-md-8">
                                                      <textarea placeholder="Type a message" class="form-control" ></textarea>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-8">
                                                      <button class="btn btn-3">send</button>
                                                   </div>
                                                </div>
                                              </div>
                                              <div id="menu1" class="container tab-pane fade"><br>
                                                 
                                                <div class="card-1">
                                                   <div class="row">
                                                      <div class="col-md-4">
                                                         <img src="<?=base_url();?>assets/images/ex-c.png" class="w-100">
                                                      </div>

                                                      <div class="col-md-8">
                                                         <h3 class="emeka-11">Emeka Wilson</h3>
                                                     <div class="row">
                                                         <div class="col-md-4">
                                                            <p style="font-size: 35px;">                                    
                                                            Tailor</p>
                                                         </div>
                                                         
                                                     </div>
                                                       <div class="rate4">
                                                             <input type="radio" id="star5" name="rate" value="5" />
                                                             <label for="star5" title="text">5 stars</label>
                                                             <input type="radio" id="star4" name="rate" value="4" />
                                                             <label for="star4" title="text">4 stars</label>
                                                             <input type="radio" id="star3" name="rate" value="3" />
                                                             <label for="star3" title="text">3 stars</label>
                                                             <input type="radio" id="star2" name="rate" value="2" />
                                                             <label for="star2" title="text">2 stars</label>
                                                             <input type="radio" id="star1" name="rate" value="1" />
                                                             <label for="star1" title="text">1 star</label>
                                                           </div><br/>
                                                           <p class="amber"><i class="fas fa-map-marker-alt"></i> 2, Abraham Adesanya Street, Surulere, Lagos</p>
                                                   </div>

                                                  
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                 </div>
                              </div>
                           </div><br/>
                           <div class="row">
                              <div class="col-md-8">
                                 
                        </div>
               </section>





                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>