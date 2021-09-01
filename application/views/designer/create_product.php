       <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>


              <!-- product -->
               <section>
                  <div class="container-fluid">
                     <div class="row">
                          <div class="col-md-12">
                              <a href="<?=base_url();?>member/designer/step1"><i class="fas fa-arrow-left arrow-font"></i></a>
                          </div>
                       </div>
                 
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                           <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                             <ol class="carousel-indicators">
                               <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">1</li>
                               <li data-target="#carouselExampleIndicators" data-slide-to="1">2</li>
                               <li data-target="#carouselExampleIndicators" data-slide-to="2">3</li>
                             </ol>
                             <div class="carousel-inner">
                               <div class="carousel-item active">
                                 <img class="d-block kid-image" src="<?=base_url();?>assets/images/photo-1519238263530-99bdd11df2ea.jpg" alt="First slide">
                               </div>
                               <div class="carousel-item">
                                 <img class="d-block kid-image" src="<?=base_url();?>assets/images/photo-1519238263530-99bdd11df2ea.jpg" alt="Second slide">
                               </div>
                               <div class="carousel-item">
                                 <img class="d-block kid-image" src="<?=base_url();?>assets/images/photo-1519238263530-99bdd11df2ea.jpg" alt="Third slide">
                               </div>
                             </div>
                           </div>
                           <p class="text-center mt-3" style="font-weight: bold;">1 of 5</p>
                     </div>
                     <div class="col-md-8" style="    margin-top: 80px;">
                           <h1 class="ready-h1">Ready To Wear Kids top Complete Set</h1>
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="rate">
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
                                 </div>
                              </div>
                           </div>
                              <div class="row">
                                <div class="col-md-6">
                                   <i class="fas fa-circle circle-2 color-circle-2"></i>&nbsp;<i class="fas fa-circle circle-2"></i>&nbsp;<i class="fas fa-circle circle-2 color-circle"></i>&nbsp;<i class="fas fa-circle circle-2 color-2"></i>
                                </div>
                                <div class="col-md-6">
                                   <h4 class=" fifity">N15,000</h4>
                                </div>
                             </div>
                             <div class="row">
                                 <div class="col-sm-12">
                                    
                                 </div>
                             </div>
                             <div class="row">
                                <div class="col-md-9">
                                  <hr/>  
                                </div>
                                <div class="col-md-3"></div>
                             </div>
                             
                             <div class="row">
                                <div class="col-md-12">
                                       <p class="ready-pera">
                                         Ready To Wear Kids top Complete Set is in a series of Complete Set<br/> designed by Jon Doe. It comes with 1 jacket. 3 shirts, 2 pairs of jeans<br/> and a neck Ribbon.
                                      </p>
                                </div>
                             </div>
                              <div class="row">
                                <div class="col-md-9">
                                  <hr/>  
                                </div>
                                <div class="col-md-3"></div>
                             </div>
                             <div class="row">
                                <div class="col-md-12">
                                   <label class="label-1">
                                          <p class="gallery-input lbl">Available Sizes</p>   <span class="padding-uk"><span class="text-one">US</span>&nbsp;&nbsp;&nbsp;&nbsp;UK&nbsp;&nbsp;&nbsp;&nbsp;EU</span>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="">
                                                <button class="gallery-btn">
                                                         37<br/>US
                                                      </button>
                                                      <button class="gallery-btn">
                                                         38<br/>US
                                                      </button>
                                                      <button class="gallery-btn">
                                                         39<br/>US
                                                      </button>
                                                      <button class="gallery-btn-1">
                                                         40<br/>US
                                                      </button>
                                                      <button class="gallery-btn">
                                                         41<br/>US
                                                      </button>
                                                      <button class="gallery-btn">
                                                         42<br/>US
                                                      </button>
                                                      <button class="gallery-btn-1">
                                                         43<br/>US
                                                      </button>
                                                      <button class="gallery-btn">
                                                         44<br/>US
                                                      </button>
                                                      <button class="gallery-btn">
                                                         45<br/>US
                                                      </button>
                                                </div>
                                             </div>
                                          </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-12">
                                      <p class="gallery-input lbl">Available Sizes<span class="text-muted">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10</span></p>
                                   </div>
                                </div>
                             </div>
                        </div>

                   </div>
                   <div class="row">
                     <div class="col-md-2"></div>
                      <div class="col-md-8">
                          <div class="row">
                              <div class="col-md-4">
                                 <button class="btn btn-warning adj-44">Update Product</button>
                              </div>
                              <div class="col-md-4">
                                 <button class="btn btn-warning adj-45"><i class="fas fa-times"></i>  Delete Product</button>
                              </div>
                              <div class="col-md-4">
                                 <button class="btn btn-warning adj-46"><i class="fas fa-arrow-up"></i>  Promote Product</button>
                              </div>
                           </div>
                      </div>
                      <div class="col-md-2"></div>
                   </div>  
                   <div class="container tab-list">
                       <ul class="nav nav-tabs" role="tablist">
                         <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#home">Reviews</a>
                         </li>
                         <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#menu1">Statistics</a>
                         </li>
                       </ul>

                       <!-- Tab panes -->
                       <div class="tab-content tab-list">
                         <div id="home" class="container tab-pane active"><br>
                           <div class="row">
                              <div class="col-md-2">
                                 <img src="<?=base_url();?>assets/images/stick-img.png" class="w-50">
                              </div>
                              <div class="col-md-8">
                                 <h3>Emeka Anyawu</h3>
                                 <p class="pera-pro">
                                    This product is very good and comfortable. I never regretted purchasing one for my son.
                                 </p>
                              </div>
                              <div class="col-md-2">
                                 <p class="float-right">Oct 9</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 
                              </div>
                              <div class="col-md-6">
                                 <i class="fas fa-heart">&nbsp;&nbsp;30</i>&nbsp;&nbsp;<i class="fas fa-comment">&nbsp;&nbsp;0&nbsp;&nbsp;</i><i class="fas fa-share-alt">&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;</i>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-2"></div>
                               <div class="col-md-10">
                                  <input type="text" name="yourname" class="field-n" placeholder="Write a reply">
                               </div>
                           </div>
                           <hr/>
                            <div class="row">
                              <div class="col-md-2">
                                 <img src="<?=base_url();?>assets/images/stick-img.png" class="w-50">
                              </div>
                              <div class="col-md-8">
                                 <h3>Emeka Anyawu</h3>
                                 <p class="pera-pro">
                                    This product is very good and comfortable. I never regretted purchasing one for my son.
                                 </p>
                              </div>
                              <div class="col-md-2">
                                 <p class="float-right">Oct 9</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 
                              </div>
                              <div class="col-md-6">
                                 <i class="fas fa-heart">&nbsp;&nbsp;30</i>&nbsp;&nbsp;<i class="fas fa-comment">&nbsp;&nbsp;0&nbsp;&nbsp;</i><i class="fas fa-share-alt">&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;</i>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-2"></div>
                               <div class="col-md-10">
                                  <input type="text" name="yourname" class="field-n" placeholder="Write a reply">
                               </div>
                           </div>
                           <hr/>
                            <div class="row">
                              <div class="col-md-2">
                                 <img src="<?=base_url();?>assets/images/stick-img.png" class="w-50">
                              </div>
                              <div class="col-md-8">
                                 <h3>Emeka Anyawu</h3>
                                 <p class="pera-pro">
                                    This product is very good and comfortable. I never regretted purchasing one for my son.
                                 </p>
                              </div>
                              <div class="col-md-2">
                                 <p class="float-right">Oct 9</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 
                              </div>
                              <div class="col-md-6">
                                 <i class="fas fa-heart">&nbsp;&nbsp;30</i>&nbsp;&nbsp;<i class="fas fa-comment">&nbsp;&nbsp;0&nbsp;&nbsp;</i><i class="fas fa-share-alt">&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;</i>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-2"></div>
                               <div class="col-md-10">
                                  <input type="text" name="yourname" class="field-n" placeholder="Write a reply">
                               </div>
                           </div>
                           <hr/>
                            <div class="row">
                              <div class="col-md-2">
                                 <img src="<?=base_url();?>assets/images/stick-img.png" class="w-50">
                              </div>
                              <div class="col-md-8">
                                 <h3>Emeka Anyawu</h3>
                                 <p class="pera-pro">
                                    This product is very good and comfortable. I never regretted purchasing one for my son.
                                 </p>
                              </div>
                              <div class="col-md-2">
                                 <p class="float-right">Oct 9</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 
                              </div>
                              <div class="col-md-6">
                                 <i class="fas fa-heart">&nbsp;&nbsp;30</i>&nbsp;&nbsp;<i class="fas fa-comment">&nbsp;&nbsp;0&nbsp;&nbsp;</i><i class="fas fa-share-alt">&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;</i>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-2"></div>
                               <div class="col-md-10">
                                  <input type="text" name="yourname" class="field-n" placeholder="Write a reply">
                               </div>
                           </div>
                           <hr/>
                            <div class="row">
                              <div class="col-md-2">
                                 <img src="<?=base_url();?>assets/images/stick-img.png" class="w-50">
                              </div>
                              <div class="col-md-8">
                                 <h3>Emeka Anyawu</h3>
                                 <p class="pera-pro">
                                    This product is very good and comfortable. I never regretted purchasing one for my son.
                                 </p>
                              </div>
                              <div class="col-md-2">
                                 <p class="float-right">Oct 9</p>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 
                              </div>
                              <div class="col-md-6">
                                 <i class="fas fa-heart">&nbsp;&nbsp;30</i>&nbsp;&nbsp;<i class="fas fa-comment">&nbsp;&nbsp;0&nbsp;&nbsp;</i><i class="fas fa-share-alt">&nbsp;&nbsp;&nbsp;0&nbsp;&nbsp;</i>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-2"></div>
                               <div class="col-md-10">
                                  <input type="text" name="yourname" class="field-n" placeholder="Write a reply">
                               </div>
                           </div>
                           <hr/>
                         </div>
                         <div id="menu1" class="container tab-pane fade"><br>
                           <h3>Menu 1</h3>
                           <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                         </div>
                       </div>

                     </div> 
               </div>
         </section>
<!-- product -->                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>