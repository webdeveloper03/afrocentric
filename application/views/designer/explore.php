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
                                       <a class="nav-link active2 text-t" data-toggle="tab" href="#home">        <img src="<?=base_url();?>assets/images/design.png" class="w-img"> Designers</a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link text" data-toggle="tab" href="#menu1"><img src="<?=base_url();?>assets/images/toilar.png" class="w-img">Tailors</a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link text" data-toggle="tab" href="#menu2"><img src="<?=base_url();?>assets/images/model.png" class="w-img">Models</a>
                                     </li>
                                   </ul>
                                </div>
                             </div>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                              <div class="row">
                                    <div class="col-md-4">
                                       <form class="form-2">
                                          <label class="label-1">
                                                <p class="label-txt">What are you looking for?</p>
                                                   <input type="text" class="input">
                                                      <div class="line-box">
                                                         <div class="line"></div>
                                                      </div>
                                          </label>
                                         <label class="label-1">
                                           <p class="label-txt">Category</p>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                         <label class="label-1">
                                          <p class="label-txt">Price</p><br/>
                                          <p class="label-txt"><b>N1000 - N100,000</b></p>
                                          <br/><br/>
                                            <div class="slidecontainer">
                                            <input type="range" min="1" max="100" value="50" class="slider-2" id="myRange">
                                          </div>
                                         </label>
                                         <label class="label-1">
                                           <p class="label-txt">Location</p>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                            <label class="label-1">
                                              <p class="label-txt">Skills</p>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                            </label>
                                            <label class="label-1">
                                              <p class="label-txt">Preference</p>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                            </label>
                                            <label class="label-1">
                                              <p class="label-txt">Education</p>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                            </label>
                                            <label class="label-1">
                                              <p class="label-txt">Order by</p>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                            </label>
                                          </form>
                                       </div>
                                       <div class="col-md-8">
                                             <img src="<?=base_url();?>assets/images/map.png" class="w-100">   
                                       </div>
                                     </div> 
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                              <div class="row">
                                    <div class="col-md-4">
                                       <form class="form-2">
                                          <label class="label-1">
                                                <p class="label-txt">Bespoke</p>
                                                   <input type="text" class="input">
                                                      <div class="line-box">
                                                         <div class="line"></div>
                                                      </div>
                                          </label>
                                         <label class="label-1">
                                           <p class="label-txt">Category</p>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                         <label class="label-1">
                                          <p class="label-txt">Price</p><br/>
                                          <p class="label-txt"><b>N1000 - N100,000</b></p>
                                          <br/><br/>
                                            <div class="slidecontainer">
                                            <input type="range" min="1" max="100" value="50" class="slider-2" id="myRange">
                                          </div>
                                         </label>
                                         <label class="label-1">
                                           <p class="label-txt">Surulere</p>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                            <label class="label-1">
                                                <button class="btn btn-b float-left">Unisex</button>
                                                <button class="btn btn-b2 float-left">Bridal Wears</button>
                                                   <input type="text" class="input">
                                                         <div class="line-box">
                                                               <div class="line"></div>
                                                         </div>
                                            </label>
                                            <label class="label-1">
                                              <button class="btn btn-b float-left">Preference</button>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                            </label>
                                            <label class="label-1">
                                              <button class="btn btn-b float-left">Fashion House</button>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                            </label>
                                            <label class="label-1">
                                              <button class="btn search-2 float-left"><i class="fa fa-search"></i> Search</button>
                                              <button class="btn reset float-left"> Reset Field</button>
                                              <input type="text" class="input">
                                            </label>
                                          </form>
                                       </div>
                                       <div class="col-md-8">
                                             <img src="<?=base_url();?>assets/images/map2.png" class="w-100">   
                                       </div>
                                     </div> 
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                              <div class="row">
                                    <div class="col-md-4">
                                       <form class="form-2">
                                          <label class="label-1">
                                                <p class="label-txt">Bespoke</p>
                                                   <input type="text" class="input">
                                                      <div class="line-box">
                                                         <div class="line"></div>
                                                      </div>
                                          </label>
                                         <label class="label-1">
                                           <p class="label-txt">Category</p>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                         <label class="label-1">
                                          <p class="label-txt">Price</p><br/>
                                          <p class="label-txt"><b>N1000 - N100,000</b></p>
                                          <br/><br/>
                                            <div class="slidecontainer">
                                            <input type="range" min="1" max="100" value="50" class="slider-2" id="myRange">
                                          </div>
                                         </label>
                                         <label class="label-1">
                                           <p class="label-txt">Surulere</p>
                                           <input type="text" class="input">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                            <label class="label-1">
                                                <button class="btn btn-b float-left">Unisex</button>
                                                <button class="btn btn-b2 float-left">Bridal Wears</button>
                                                   <input type="text" class="input">
                                                         <div class="line-box">
                                                               <div class="line"></div>
                                                         </div>
                                            </label>
                                            <label class="label-1">
                                              <button class="btn btn-b float-left">Preference</button>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                            </label>
                                            <label class="label-1">
                                              <button class="btn btn-b float-left">Fashion House</button>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                            </label>
                                            <label class="label-1">
                                              <button class="btn search-2 float-left"><i class="fa fa-search"></i> Search</button>
                                              <button class="btn reset float-left"> Reset Field</button>
                                              <input type="text" class="input">
                                            </label>
                                          </form>
                                       </div>
                                       <div class="col-md-8">
                                             <img src="<?=base_url();?>assets/images/map-view.png" class="float-right">
                                             <div class="row mt-5">
                                                 <div class="col-md-4">
                                                     <img src="<?=base_url();?>assets/images/ex-c.png">
                                                     <p class="pera-3">Supreme Fashion House</p>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                            <p><i class="fas fa-map-marker-alt"></i>
                                                            Surulere</p>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="rate-6">
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
                                                 </div>
                                                 <div class="col-md-4">
                                                     <img src="<?=base_url();?>assets/images/ex-c2.png">
                                                     <p class="pera-3">Supreme Fashion House</p>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                            <p><i class="fas fa-map-marker-alt"></i>
                                                            Surulere</p>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="rate-6">
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
                                                 </div>
                                                 <div class="col-md-4">
                                                     <img src="<?=base_url();?>assets/images/ex-c3.png">
                                                     <p class="pera-3">Supreme Fashion House</p>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                            <p><i class="fas fa-map-marker-alt"></i>
                                                            Surulere</p>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="rate-6">
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
                                                 </div>
                                             </div> 
                                             <div class="row mt-5">
                                                 <div class="col-md-4">
                                                     <img src="<?=base_url();?>assets/images/ex-c4.png">
                                                     <p class="pera-3">Supreme Fashion House</p>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                            <p><i class="fas fa-map-marker-alt"></i>
                                                            Surulere</p>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="rate-6">
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
                                                 </div>
                                                 <div class="col-md-4">
                                                     <img src="<?=base_url();?>assets/images/ex-c5.png">
                                                     <p class="pera-3">Supreme Fashion House</p>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                            <p><i class="fas fa-map-marker-alt"></i>
                                                            Surulere</p>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="rate-6">
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
                                                 </div>
                                                 <div class="col-md-4">
                                                     <img src="<?=base_url();?>assets/images/ex-6.png">
                                                     <p class="pera-3">Supreme Fashion House</p>
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                            <p><i class="fas fa-map-marker-alt"></i>
                                                            Surulere</p>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <div class="rate-6">
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
                                                 </div>
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