       <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>



<!-- explore -->
               <section>
                     <div class="container-fluid">
                           <div class="row">
                              <div class="col-md-2">
                                       <a href="<?php echo base_url();?>member/designer/step1" class="btn btn-primary w-100 c-title-btn">Add New Product</a>
                                    
                              </div>
                                <div class="col-md-10">
                                   <ul class="nav nav-tabs" role="tablist" id="nav-tal">
                                     <li class="nav-item">
                                       <a class="nav-link active2 text-t" data-toggle="tab" href="#home"><b> All Products</b></a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link text" data-toggle="tab" href="#menu2"><b>Deleted Products</b></a>
                                     </li>
                                   </ul>
                                </div>
                             </div>
                             <div class="row mt-5">
                                 <div class="col-md-8">
                                    
                                 </div>

                                <div class="col-md-3 search33">
                                   <input type="text" name="search" placeholder="Search here" class="search3"><i class="fa fa-search float-right"></i>
                                </div>
                             </div>
                             <div class="row mt-5">
                               <div class="col-md-12">
                                   <div class="row">
                                      <div class="col-md-2">
                                   <select class="select-1">
                                      <option>
                                         Size
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                   </select>
                                </div>
                                 <div class="col-md-2">
                                   <select class="select-1">
                                      <option>
                                         Color
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                   </select>
                                </div>
                                
                                 <div class="col-md-2">
                                   <select class="select-1">
                                      <option>
                                         Price
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                   </select>
                                </div>
                                
                                 <div class="col-md-2">
                                   <select class="select-1">
                                      <option>
                                         Ratings
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                      <option>
                                         Sort By: Newest First
                                      </option>
                                   </select>
                                </div>
                                   <div class="col-md-4">
                                       <select class="form-control select-2">
                                           <option value="volvo">Sort By</option>
                                           <option value="saab">Saab</option>
                                           <option value="mercedes">Mercedes</option>
                                           <option value="audi">Audi</option>
                                       </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                             <div class="row mt-5">
                                <div class="col-md-4">
                                   <div class="card product-card" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/photo-1519238263530-99bdd11df2ea.jpg" alt="Card image cap">
                                      <div class="card-body">
                                        <p class="card-title emeta">Ready To Wear Kids top Complete Set</p>
                                         <div class="row mt-3">
                                             <div class="col-md-6">
                                               <p> <img src="<?=base_url();?>assets/images/preview-550046-ftrx3jSsmi5yqBAT-small.jpg" class="john-12">&nbsp;John Doe</p>
                                               
                                             </div>
                                             <div class="col-md-6">
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
                                              <div class="col-md-8">
                                                  <i class="fas fa-circle circle-2 color-circle-2"></i>&nbsp;<i class="fas fa-circle circle-2"></i>&nbsp;<i class="fas fa-circle circle-2 color-circle"></i>&nbsp;<i class="fas fa-circle circle-2 color-2"></i>
                                              </div>
                                              <div class="col-md-4">
                                                 <h4 class="emeta float-right">N15,000</h4>
                                              </div>
                                           </div>
                                        <a href="#" class="btn btn-primary mt-5 c-title-btn2">SHOP NOW</a>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="card product-card" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/photo-1519238263530-99bdd11df2ea.jpg" alt="Card image cap">
                                      <div class="card-body">
                                        <p class="card-title emeta">Ready To Wear Kids top Complete Set</p>
                                         <div class="row mt-3">
                                             <div class="col-md-6">
                                               <p> <img src="<?=base_url();?>assets/images/preview-550046-ftrx3jSsmi5yqBAT-small.jpg" class="john-12">&nbsp;John Doe</p>
                                               
                                             </div>
                                             <div class="col-md-6">
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
                                              <div class="col-md-8">
                                                  <i class="fas fa-circle circle-2 color-circle-2"></i>&nbsp;<i class="fas fa-circle circle-2"></i>&nbsp;<i class="fas fa-circle circle-2 color-circle"></i>&nbsp;<i class="fas fa-circle circle-2 color-2"></i>
                                              </div>
                                              <div class="col-md-4">
                                                 <h4 class="emeta float-right">N15,000</h4>
                                              </div>
                                           </div>
                                        <a href="#" class="btn btn-primary mt-5 c-title-btn2">SHOP NOW</a>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="card product-cardd" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/photo-1519238263530-99bdd11df2ea.jpg" alt="Card image cap">
                                      <div class="card-body">
                                        <p class="card-title emeta">Ready To Wear Kids top Complete Set</p>
                                         <div class="row mt-3">
                                             <div class="col-md-6">
                                               <p> <img src="<?=base_url();?>assets/images/preview-550046-ftrx3jSsmi5yqBAT-small.jpg" class="john-12">&nbsp;John Doe</p>
                                               
                                             </div>
                                             <div class="col-md-6">
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
                                              <div class="col-md-8">
                                                  <i class="fas fa-circle circle-2 color-circle-2"></i>&nbsp;<i class="fas fa-circle circle-2"></i>&nbsp;<i class="fas fa-circle circle-2 color-circle"></i>&nbsp;<i class="fas fa-circle circle-2 color-2"></i>
                                              </div>
                                              <div class="col-md-4">
                                                 <h4 class="emeta float-right">N15,000</h4>
                                              </div>
                                           </div>
                                        <a href="#" class="btn btn-primary mt-5 c-title-btn2">SHOP NOW</a>
                                      </div>
                                    </div>
                                </div>
                             </div>
                             <div class="row mt-5">
                                <div class="col-md-4">
                                   <div class="card product-card" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/photo-1519238263530-99bdd11df2ea.jpg" alt="Card image cap">
                                      <div class="card-body">
                                        <p class="card-title emeta">Ready To Wear Kids top Complete Set</p>
                                         <div class="row mt-3">
                                             <div class="col-md-6">
                                               <p> <img src="<?=base_url();?>assets/images/preview-550046-ftrx3jSsmi5yqBAT-small.jpg" class="john-12">&nbsp;John Doe</p>
                                               
                                             </div>
                                             <div class="col-md-6">
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
                                              <div class="col-md-8">
                                                  <i class="fas fa-circle circle-2 color-circle-2"></i>&nbsp;<i class="fas fa-circle circle-2"></i>&nbsp;<i class="fas fa-circle circle-2 color-circle"></i>&nbsp;<i class="fas fa-circle circle-2 color-2"></i>
                                              </div>
                                              <div class="col-md-4">
                                                 <h4 class="emeta float-right">N15,000</h4>
                                              </div>
                                           </div>
                                        <a href="#" class="btn btn-primary mt-5 c-title-btn2">SHOP NOW</a>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="card product-cardd" style="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/photo-1519238263530-99bdd11df2ea.jpg" alt="Card image cap">
                                      <div class="card-body">
                                        <p class="card-title emeta">Ready To Wear Kids top Complete Set</p>
                                         <div class="row mt-3">
                                             <div class="col-md-6">
                                               <p> <img src="<?=base_url();?>assets/images/preview-550046-ftrx3jSsmi5yqBAT-small.jpg" class="john-12">&nbsp;John Doe</p>
                                               
                                             </div>
                                             <div class="col-md-6">
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
                                              <div class="col-md-8">
                                                  <i class="fas fa-circle circle-2 color-circle-2"></i>&nbsp;<i class="fas fa-circle circle-2"></i>&nbsp;<i class="fas fa-circle circle-2 color-circle"></i>&nbsp;<i class="fas fa-circle circle-2 color-2"></i>
                                              </div>
                                              <div class="col-md-4">
                                                 <h4 class="emeta float-right">N15,000</h4>
                                              </div>
                                           </div>
                                        <a href="#" class="btn btn-primary mt-5 c-title-btn2">SHOP NOW</a>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                 <div class="card product-card" st
                                 yle="width: 100%;">
                                      <img class="card-img-top w-100" src="<?=base_url();?>assets/images/photo-1519238263530-99bdd11df2ea.jpg" alt="Card image cap">
                                      <div class="card-body">
                                        <p class="card-title emeta">Ready To Wear Kids top Complete Set</p>
                                         <div class="row mt-3">
                                             <div class="col-md-6">
                                               <p> <img src="<?=base_url();?>assets/images/preview-550046-ftrx3jSsmi5yqBAT-small.jpg" class="john-12">&nbsp;John Doe</p>
                                               
                                             </div>
                                             <div class="col-md-6">
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
                                              <div class="col-md-8">
                                                  <i class="fas fa-circle circle-2 color-circle-2"></i>&nbsp;<i class="fas fa-circle circle-2"></i>&nbsp;<i class="fas fa-circle circle-2 color-circle"></i>&nbsp;<i class="fas fa-circle circle-2 color-2"></i>
                                              </div>
                                              <div class="col-md-4">
                                                 <h4 class="emeta float-right">N15,000</h4>
                                              </div>
                                           </div>
                                        <a href="#" class="btn btn-primary mt-5 c-title-btn2">SHOP NOW</a>
                                      </div>
                                    </div>
                                </div>
                             </div>

                          <!-- Tab panes -->
                         <!--  <div class="tab-content">
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
                            </div> -->
                            <!-- <div id="menu1" class="container tab-pane fade"><br>
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
                            </div> -->
                            <!-- <div id="menu2" class="container tab-pane fade"><br>
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
                            </div> -->
                          </div>
                        </div>
                        
               </section><?php 
               }else{
   header("Location:".base_url()."login");
}?>