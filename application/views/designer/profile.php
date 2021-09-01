       <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>

<section class="explore-bg-header">
                  <div class="container-fluid explore-top-container">
                     <div class="row row-bg">
                        <div class="col-md-10"></div>
                        <div class=" col-md-1">
                           <h2 class="explore-top-head">200</h2>
                           <p class="explore-top-p">Following</p>
                        </div>
                        <div class=" col-md-1">
                           <h2 class="explore-top-head">1.5k</h2>
                           <p class="explore-top-p">Followers</p>
                        </div>
                     </div>
                     <div class="row iner-main-row">
                        <div class="col-4 col-md-4">
                           <img src="<?=base_url();?>assets/images/black_beauty.jpg" class="model-dp w-100">
                        </div>
                        <div class="col-8 col-md-8">
                           <div class="row iner-row">
                              <div class="col-10 col-md-10">
                                 <h2 class="iner-dp-head">Emillia Clarke</h2>
                                 <p class="iner-location-p">
                                    <i class="fas fa-map-marker-alt"></i>
                                    2, Abraham Adesanya Street, Surulere, Lagos
                                 </p>
                              </div>
                              <div class="col-md-2">
                                 <p class="p-icone"><i class="fas fa-map-marker-al iner-icone2"></i></p>
                                 <span class="fa fa-star explore-rating-checked"></span>
                                 <span class="fa fa-star explore-rating-checked"></span>
                                 <span class="fa fa-star explore-rating-checked"></span>
                                 <span class="fa explore-rating-fa-star"></span>
                                 <span class="fa fa-star"></span>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12 col-md-12">
                                 <p class="ex-p1">
                                    Welcome to Supreme Fashion House, the home of luxury and poise. We offer range of services from Bespoke Designs, to Ready To Wear designs. leave us a message for more information.
                                 </p>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <button class="btn btn-outline-dark explorebtn-2">
                                          <i class="fas fa-pen"></i>&nbsp;&nbsp; Edit Profile
                                       </button>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                       <h3 class="ex-h3">Profile Visibility</h3>
                                       <div class="ex-btns">
                                          <label class="toggle-label">
                                            <input type="checkbox">
                                            <span class="back">
                                            <span class="toggle"></span>
                                            <span class="label on">Visible</span>
                                            <span class="label off">Invisible</span>
                                            </span>
                                          </label>

                                          <!-- <button class="btn btn-dark explorebtn-2 exbt-1">
                                             Visible
                                          </button>
                                          <button class="btn btn-dark explorebtn-2 exbt-2">
                                             Invisible
                                          </button> -->
                                       </div>
                                       <p class="ex-p2">
                                          Setting your profile as invisible means your comments in the community will be posted anonymously.
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                           <!-- tabs starts -->

                           <div class="container bg-white">
                             <ul class="nav nav-tabs ex-navtabs" role="tablist">
                               <li class="nav-item">
                                 <a class="nav-link active" data-toggle="tab" href="#home">Posts</a>
                               </li>
                               <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#menu1">Account Details</a>
                               </li>
                             </ul>

                             <!-- Tab panes -->
                             <div class="tab-content">
                               <div id="home" class="container tab-pane active ex-tb-1"><br>
                                 <div class="row">
                                    <div class="col-md-8 m-auto">
                                       <div class="row ex-row-1">
                                          <div class="col-3 text-left">
                                             <p class="ex-bot-1"><i class="fas fa-photo-video"></i> Media</p>
                                          </div>
                                          <div class="col-3 text-left">
                                             <p class="ex-bot-1"><i class="fab fa-git"></i> Gif</p>
                                          </div>
                                          <div class="col-6 text-right">
                                             <p class="ex-bot-2">5 posts remaining</p>
                                          </div>
                                       </div>
                                       <div class="row ex-row-2">
                                          <div class="col-12 text-center">
                                             <form class="ex-form">
                                                <div class="form-group">
                                                   <img src="<?=base_url();?>assets/images/no-user.png" class="w-75 ex-dp-img">
                                                   <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="What's new, John">
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                       <div class="row ex-row-3">
                                          <div class="col-2 text-left">
                                             <i class="far fa-smile smile-ic"></i>
                                          </div>
                                          <div class="col-8 text-center"></div>
                                          <div class="col-2 text-center">
                                             <button class="btn btn-dark explbtn-2">
                                                Post
                                             </button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <br />
                                 <div class="row">
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-4 col-md-4">
                                       <div class="card explore-card bg-dark text-white">
                                         <img class="explore-card-img card-img" src="<?=base_url();?>assets/images/dummy/model1.jpg" alt="Card image">
                                         <div class="explore-card-img-overlay card-img-overlay">
                                           <div class="card-data">
                                              <span class="tab-span-1"><i class="far fa-heart"></i> 2k</span>
                                              <span class="tab-span-2"><i class="far fa-comment-dots"></i> 2k</span>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                               </div>
                               <div id="menu1" class="container tab-pane fade"><br>
                                 <div class="row bg-ex">
                                     <div class="col-md-6">
                                        <div>
                                           <h6 class="e-wallet">E-Wallet Balances</h6>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                        <p>N200,000</p>
                                     </div>
                                 </div><br/>
                                 <div class="row bg-ex">
                                     <div class="col-md-6">
                                        <div>
                                           <h6 class="e-wallet">E-Wallet Address</h6>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                        <p>wweds33454iiyy</p>
                                     </div>
                                 </div><br/>
                                 <div class="row bg-ex">
                                     <div class="col-md-6">
                                        <div>
                                           <h6 class="e-wallet">Bank Account</h6>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                        <p>0098225372<br>John Doe<br>Guaranty Trust Bank (GTBank)</p>
                                     </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-8">
                                       
                                    </div>
                                    <div class="col-md-4">
                                       <h6><i class="fas fa-plus"></i>Add new bank account</h6>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <button class="btn btn-default btn-dalf" data-toggle="modal" data-target="#data-tar-4">View Transaction History</button>
                                       <!-- Modal -->
                                       <div class="modal fade" id="data-tar-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                               </button>
                                             </div>
                                             <div class="modal-body">
                                                <div class="row mt-5">
                                                         <div class="col-md-8">
                                                            <h3>Transaction History</h3> 
                                                         </div>

                                                        <div class="col-md-3 search33">
                                                           <input type="text" name="search" placeholder="Search here" class="search3"><i class="fa fa-search float-right"></i>
                                                        </div>
                                                     </div>
                                                     <div class="row mt-5">
                                                        <div class="col-md-2">
                                                           <img src="<?=base_url();?>assets/images/model-img.png">
                                                        </div>
                                                        <div class="col-md-3">
                                                           <h6 style="    font-weight: 700;">Deposit</h6>
                                                           <p>N20,000 to my account</p>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-3">
                                                           <p>
                                                              2-Jan-2020
                                                           </p>
                                                           <p>
                                                              14:00
                                                           </p>
                                                        </div>
                                                     </div><br/>
                                                     <div class="row">
                                                        <div class="col-md-2">
                                                           <img src="<?=base_url();?>assets/images/model-img.png">
                                                        </div>
                                                        <div class="col-md-3">
                                                           <h6 style="    font-weight: 700;">Deposit</h6>
                                                           <p>N20,000 to my account</p>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-3">
                                                           <p>
                                                              2-Jan-2020
                                                           </p>
                                                           <p>
                                                              14:00
                                                           </p>
                                                        </div>
                                                     </div><br/>
                                                     <div class="row">
                                                        <div class="col-md-2">
                                                           <img src="<?=base_url();?>assets/images/model-img.png">
                                                        </div>
                                                        <div class="col-md-3">
                                                           <h6 style="    font-weight: 700;">Deposit</h6>
                                                           <p>N20,000 to my account</p>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-3">
                                                           <p>
                                                              2-Jan-2020
                                                           </p>
                                                           <p>
                                                              14:00
                                                           </p>
                                                        </div>
                                                     </div><br/>
                                                     <div class="row">
                                                        <div class="col-md-2">
                                                           <img src="<?=base_url();?>assets/images/model-img.png">
                                                        </div>
                                                        <div class="col-md-3">
                                                           <h6 style="    font-weight: 700;">Deposit</h6>
                                                           <p>N20,000 to my account</p>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-3">
                                                           <p>
                                                              2-Jan-2020
                                                           </p>
                                                           <p>
                                                              14:00
                                                           </p>
                                                        </div>
                                                     </div><br/>
                                                     <div class="row">
                                                        <div class="col-md-2">
                                                           <img src="<?=base_url();?>assets/images/model-img.png">
                                                        </div>
                                                        <div class="col-md-3">
                                                           <h6 style="    font-weight: 700;">Deposit</h6>
                                                           <p>N20,000 to my account</p>
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-3">
                                                           <p>
                                                              2-Jan-2020
                                                           </p>
                                                           <p>
                                                              14:00
                                                           </p>
                                                        </div>
                                                     </div><br/>
                                             </div>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-4">
                                       <button class="Deposit-11"  data-toggle="modal" data-target="#exampleModalLong">Deposit</button>
                                             <!-- Modal -->
                                             <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                               <div class="modal-dialog" role="document">
                                                 <div class="modal-content">
                                                   <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                     </button>
                                                   </div>
                                                   <div class="modal-body">
                                                     <h3>Deposit</h3>
                                                         <label class="label-1">
                                                         <p class="gallery-input">Product Price</p>
                                                         <b class="product-n-2">N</b><input type="text"  
                                                            class="input" value="   15,000">
                                                         <div class="line-box">
                                                            <div class="line"></div>
                                                         </div>
                                                         </label>
                                                         <div class="row">
                                                              <div class="col-md-4">
                                                                  <p class="gallery-input">Pay with</p>
                                                               </div>
                                                               <div class="col-md-4">
                                                                  <div class="card-bt">
                                                                     <input type="radio" name="radio" class="float-left"><br/>
                                                                     <img src="<?=base_url();?>assets/images/card-btn.png">
                                                                     <p>New Card</p>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4">
                                                                  <div class="card-bt">
                                                                     <input type="radio" name="radio"class="float-left"><br/>
                                                                     <img src="<?=base_url();?>assets/images/card-btn-2.png">
                                                                     <p>New Card</p>
                                                                  </div>
                                                               </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <label class="label-1">
                                                               <p class="gallery-input">Card Number*</p>
                                                               <input type="text" class="input">
                                                               <div class="line-box">
                                                                  <div class="line"></div>
                                                               </div>
                                                               </label>
                                                            </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-md-4">
                                                               <label class="label-1">
                                                                  <p class="gallery-input">Expiry*</p>
                                                                  <select class="select-m">
                                                                     <option>
                                                                        Month
                                                                     </option>
                                                                  </select>
                                                               <div class="line"></div>
                                                            </div>
                                                            <div class="col-md-4 mt-4">
                                                               <label class="label-1">
                                                               <p class="gallery-input" style="margin-top: 18%;">
                                                                  <select class="     select-m">
                                                                     <option>
                                                                        Years
                                                                     </option>
                                                                  </select>
                                                               <div class="line"></div>
                                                            </div>
                                                            <div class="col-md-4">
                                                               <label class="label-1">
                                                               <p class="gallery-input">CVV*</p>
                                                               <input type="text" class="input">
                                                               <div class="line-box">
                                                                  <div class="line"></div>
                                                               </div>
                                                               </label>
                                                            </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <button class="fivety-btn">
                                                                  Continue
                                                               </button>
                                                            </div>
                                                         </div>
                                                         <div class="row">
                                                            <div class="col-md-12">
                                                               <button class="fivety-btn bg-white">
                                                                  Cancel
                                                               </button>
                                                            </div>
                                                         </div>
                                                   </div>
                                                 </div>
                                               </div>
                                             </div>
                                    </div>
                                    <div class="col-md-4">
                                       <button class="Deposit-11"  data-toggle="modal" data-target="#data-tar-2">Withdrawal</button>

                                       <!-- Modal -->
                                       <div class="modal fade" id="data-tar-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                             <div class="modal-header">
                                               <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                               </button>
                                             </div>
                                             <div class="modal-body">
                                               <h3>Withdrawal</h3>
                                                <label class="label-1">
                                                <p class="gallery-input">Amount to Withdraw*</p>
                                                <b class="product-n-2">N</b><input type="text" class="input" value="   0.0">
                                                <div class="line-box">
                                                   <div class="line"></div>
                                                </div>
                                                </label>
                                                <h6>Withdraw To</h6>
                                                <div class="row">
                                                   <div class="col-md-5">
                                                      <div class="card-bt">
                                                         <input type="radio" name="radio" class="float-left"><br/>
                                                         <img src="<?=base_url();?>assets/images/card-btn-3.png" style="width: 91%;">
                                                         <p>New Card</p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-5">
                                                      <div class="card-bt">
                                                         <input type="radio" name="radio"class="float-left"><br/>
                                                         <img src="<?=base_url();?>assets/images/card-btn-4.png" style="width: 91%;">
                                                         <p>New Card</p>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-2">
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <label class="label-1">
                                                         <p class="gallery-input">Select Bank*</p>
                                                         <select class="select-m">
                                                            <option>Access Bank</option>
                                                         </select>
                                                         <div class="line"></div>
                                                      </label> 
                                                   </div>
                                                </div>  
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <p class="gallery-input">Account Name</p><input type="text" class="      input">
                                                      <div class="line-box">
                                                         <div class="line"></div>
                                                      </div>
                                                   </div>
                                                </div> 
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <p class="gallery-input">Account Name</p>
                                                      <input type="text" class="input">
                                                      <div class="line-box">
                                                         <div class="line"></div>
                                                      </div>
                                                   </div>
                                                </div> 
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <button class="fivety-btn">
                                                         Confirm Withdrawal
                                                      </button>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <button class="fivety-btn bg-white">
                                                         Cancel
                                                      </button>
                                                   </div>
                                                </div>
                                             </div>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <button class="Deposit-11" data-toggle="modal" data-target="#exampleModalCenter">Transfer</button>
                                       <div class="modal fade transfer-modalbox" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered" role="document">
                                           <div class="modal-content">
                                             <!-- <div class="modal-header">
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                 <span aria-hidden="true">&times;</span>
                                               </button>
                                             </div> -->
                                             <div class="modal-body">
                                               <div class="row header-11">
                                                  <div class="col-md-6 text-center">
                                                     <div class="foll-2">
                                                         <h1 class="two-hun">200</h1>
                                                         <h1>Following</h1>
                                                     </div>
                                                  </div>
                                                  <div class="col-md-6 text-center">
                                                     <h1 class="two-hun">1.5k</h1>
                                                     <h1>Following</h1>
                                                  </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-md-6    search33">
                                                      <input type="text" name="search" placeholder="Search here" class="search3"><i class="fa fa-search float-right"></i>
                                                   </div>
                                                   <div class="col-md-6"></div>
                                               </div><br/>
                                               <div class="row row-card">
                                                  <div class="col-md-2">
                                                     <img src="<?=base_url();?>assets/images/modal-card-1.png" class="image-11">
                                                  </div>
                                                  <div class="col-md-6">
                                                     <h3 class="surpre-1">Supreme Fashion House</h3>
                                                     <p class="surpre-pera"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Surulere</p>
                                                  </div>
                                                  <div class="col-md-4">
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
                                               <hr/>
                                               <br/>
                                            <div class="row row-card">
                                                  <div class="col-md-2">
                                                     <img src="<?=base_url();?>assets/images/modal-card-1.png" class="image-11">
                                                  </div>
                                                  <div class="col-md-6">
                                                     <h3 class="surpre-1">Supreme Fashion House</h3>
                                                     <p class="surpre-pera"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Surulere</p>
                                                  </div>
                                                  <div class="col-md-4">
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
                                               <hr/>
                                               <br/>
                                               <div class="row row-card">
                                                  <div class="col-md-2">
                                                     <img src="<?=base_url();?>assets/images/modal-card-1.png" class="image-11">
                                                  </div>
                                                  <div class="col-md-6">
                                                     <h3 class="surpre-1">Supreme Fashion House</h3>
                                                     <p class="surpre-pera"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Surulere</p>
                                                  </div>
                                                  <div class="col-md-4">
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
                                               <hr/>
                                               <br/>
                                               <div class="row row-card">
                                                  <div class="col-md-2">
                                                     <img src="<?=base_url();?>assets/images/modal-card-1.png" class="image-11">
                                                  </div>
                                                  <div class="col-md-6">
                                                     <h3 class="surpre-1">Supreme Fashion House</h3>
                                                     <p class="surpre-pera"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;Surulere</p>
                                                  </div>
                                                  <div class="col-md-4">
                                                         <div class="rate mt-5">
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
                                               <hr/>
                                               <br/>
                                             </div>
                                           </div>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                               </div>
                               <div id="menu2" class="container tab-pane fade"><br>
                                 <div class="row">
                                    <div class="col-7 col-md-7 m-auto tab2-main-col pr-5 pl-5 bottom-border-0">
                                       <div class="card">
                                          <div class="row row-top">
                                             <div class="col-md-2 pr-0">
                                                <img src="<?=base_url();?>assets/images/no-user.png" class="w-75 dp-img">
                                             </div>
                                             <div class="col-md-9">
                                                <p class="name">Emeka Wilson</p>
                                                <p class="time">Yesterday 6:30pm</p>
                                             </div>
                                          </div>
                                          <img src="<?=base_url();?>assets/images/dummy/model2.jpg" class="w-100 tab3main-img">
                                          <p class="tab3-p1">
                                             Our fashion sense is out of this world! beauty is indeed in the eyes of the beholder.
                                          </p>
                                          <div class="tb3-spans">
                                             <span class="tab2-span-3">
                                                <i class="fas fa-heart"></i> 30
                                             </span>
                                             <span class="tab2-span-3">
                                                <i class="fas fa-comment"></i> 0
                                             </span>
                                             <span class="tab2-span-3">
                                                <i class="fas fa-share-alt"></i> 0
                                             </span>
                                          </div>
                                          <p class="tab3-p1">
                                             <strong>bolajiboj</strong> Supreme, your design collection is always marvelous *hats off*
                                          </p>
                                          <a href="#" class="tab3-link">View all comments</a>
                                          <form>
                                             <div class="form-group big-form">

                                                <i class="fas fa-user-circle icone-write-comment"></i>
                                                   <input type="email" class="form-control big-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write a comment">
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-7 col-md-7 m-auto tab2-main-col pr-5 pl-5 top-border-0">
                                       <div class="card">
                                          <div class="row row-top">
                                             <div class="col-md-1">
                                                <img src="<?=base_url();?>assets/images/no-user.png" class="w-100 dp-img">
                                             </div>
                                             <div class="col-md-11">
                                                <p class="name">Emeka Wilson</p>
                                                <p class="time">Yesterday 6:30pm</p>
                                             </div>
                                          </div>
                                          <img src="<?=base_url();?>assets/images/dummy/model2.jpg" class="w-100 tab3main-img">
                                          <p class="tab3-p1">
                                             Our fashion sense is out of this world! beauty is indeed in the eyes of the beholder.
                                          </p>
                                          <div class="tb3-spans">
                                             <span class="tab2-span-3">
                                                <i class="fas fa-heart"></i> 30
                                             </span>
                                             <span class="tab2-span-3">
                                                <i class="fas fa-comment"></i> 0
                                             </span>
                                             <span class="tab2-span-3">
                                                <i class="fas fa-share-alt"></i> 0
                                             </span>
                                          </div>
                                          <p class="tab3-p1">
                                             <strong>bolajiboj</strong> Supreme, your design collection is always marvelous *hats off*
                                          </p>
                                          <a href="#" class="tab3-link">View all comments</a>
                                          <form>
                                             <div class="form-group big-form">
                                                <i class="fas fa-user-circle icone-write-comment"></i>
                                                   <input type="email" class="form-control big-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write a comment">
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                               </div>
                               <div id="menu3" class="container tab-pane fade"><br>
                                 <div class="row">
                                    <div class="col-7 col-md-7 m-auto tab2-main-col pr-5 pl-5">
                                       <div class="card review-tab-card">
                                          <div class="row">
                                             <div class="col-12 col-md-12">
                                                <div class="row review-row-imp justify-content-between">
                                                   <div class="col-4 col-md-4"><p>Set Title</p></div>
                                                   <div class="col-4 col-md-4 text-right">
                                                      <span class="fa fa-star explore-rating-checked"></span>
                                                      <span class="fa fa-star explore-rating-checked"></span>
                                                      <span class="fa fa-star explore-rating-checked"></span>
                                                      <span class="fa explore-rating-fa-star"></span>
                                                      <span class="fa fa-star"></span>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-12 col-md-12 p-0">
                                                      <form>
                                                         <div class="form-group">
                                                            <i class="fas fa-user-circle icone-write-comment" style="position:absolute;top: 10px;"></i>
                                                               <input type="email" class="form-control big-form-control2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write a comment">
                                                         </div>
                                                         <button class="btn btn-primary tab3btn-1">
                                                            Send Review
                                                         </button>
                                                      </form>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="card tab-review-main-container">
                                          <div class="row justify-content-between">
                                             <div class="col-md-4">
                                                <p class="p-dep">Great Designer</p>
                                             </div>
                                             <div class="col-md-4 text-right">
                                                <p class="pdate-review">12 Apr</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-6 pt-1 pl-4">
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa explore-rating-fa-star"></span>
                                                <span class="fa fa-star"></span>
                                             </div>
                                             <div class="col-6 text-right">
                                                <p class="p-r-name">John Doe</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-12">
                                                <p class="p-main-review">
                                                   Fashion House has been an awesome fashion house and they always deliver on time. Their styles is also very beautiful.
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="card tab-review-main-container">
                                          <div class="row justify-content-between">
                                             <div class="col-md-4">
                                                <p class="p-dep">Great Designer</p>
                                             </div>
                                             <div class="col-md-4 text-right">
                                                <p class="pdate-review">12 Apr</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-6 pt-1 pl-4">
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa explore-rating-fa-star"></span>
                                                <span class="fa fa-star"></span>
                                             </div>
                                             <div class="col-6 text-right">
                                                <p class="p-r-name">John Doe</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-12">
                                                <p class="p-main-review">
                                                   Fashion House has been an awesome fashion house and they always deliver on time. Their styles is also very beautiful.
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="card tab-review-main-container">
                                          <div class="row justify-content-between">
                                             <div class="col-md-4">
                                                <p class="p-dep">Great Designer</p>
                                             </div>
                                             <div class="col-md-4 text-right">
                                                <p class="pdate-review">12 Apr</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-6 pt-1 pl-4">
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa explore-rating-fa-star"></span>
                                                <span class="fa fa-star"></span>
                                             </div>
                                             <div class="col-6 text-right">
                                                <p class="p-r-name">John Doe</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-12">
                                                <p class="p-main-review">
                                                   Fashion House has been an awesome fashion house and they always deliver on time. Their styles is also very beautiful.
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="card tab-review-main-container">
                                          <div class="row justify-content-between">
                                             <div class="col-md-4">
                                                <p class="p-dep">Great Designer</p>
                                             </div>
                                             <div class="col-md-4 text-right">
                                                <p class="pdate-review">12 Apr</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-6 pt-1 pl-4">
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa explore-rating-fa-star"></span>
                                                <span class="fa fa-star"></span>
                                             </div>
                                             <div class="col-6 text-right">
                                                <p class="p-r-name">John Doe</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-12">
                                                <p class="p-main-review">
                                                   Fashion House has been an awesome fashion house and they always deliver on time. Their styles is also very beautiful.
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="card tab-review-main-container">
                                          <div class="row justify-content-between">
                                             <div class="col-md-4">
                                                <p class="p-dep">Great Designer</p>
                                             </div>
                                             <div class="col-md-4 text-right">
                                                <p class="pdate-review">12 Apr</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-6 pt-1 pl-4">
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa fa-star explore-rating-checked"></span>
                                                <span class="fa explore-rating-fa-star"></span>
                                                <span class="fa fa-star"></span>
                                             </div>
                                             <div class="col-6 text-right">
                                                <p class="p-r-name">John Doe</p>
                                             </div>
                                          </div>
                                          <div class="row">
                                             <div class="col-12">
                                                <p class="p-main-review">
                                                   Fashion House has been an awesome fashion house and they always deliver on time. Their styles is also very beautiful.
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                               </div>
                             </div>
                           </div>

                           <!-- tabs ends -->
                  </div>
               </section>


                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>