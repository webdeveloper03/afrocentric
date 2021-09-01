       <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>


                <section class="community bg-white">
                  <!-- tabs starts -->
                  <div class="container bg-white">
                     <ul class="nav nav-tabs community-nav-tabs" role="tablist">
                        <li class="nav-item community-nav-item">
                           <a class="nav-link community-nav-link community-active active" data-toggle="tab" href="#home"><i class="fas fa-globe-africa"></i> All Posts</a>
                        </li>
                        <li class="nav-item community-nav-item">
                           <a class="nav-link community-nav-link" data-toggle="tab" href="#menu1"><i class="fas fa-at"></i> Mentions</a>
                        </li>
                        <li class="nav-item community-nav-item">
                           <a class="nav-link community-nav-link" data-toggle="tab" href="#menu2"><i class="fas fa-at"></i> Groups</a>
                        </li>
                        <li class="nav-item community-nav-item">
                           <a class="nav-link community-nav-link" data-toggle="tab" href="#menu3"><i class="fas fa-briefcase"></i> Bids</a>
                        </li>
                        <form class="form-inline my-2 my-lg-0 community-nav-form">
                           <input class="form-control mr-sm-2" type="search" placeholder="Search here" aria-label="Search">
                           <i class="fas fa-search"></i>
                        </form>
                     </ul>
                             <!-- Tab panes -->
                     <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                           <div class="row">
                              <div class="col-md-8">
                                 <div class="row">
                                    <div class="col-md-12">
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
                                          <div class="col-2">
                                             <form>
                                                <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <button class="btn community-btn-public btn-secondary dropdown-toggle community-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-globe-africa"></i> Public <i class="fas fa-chevron-down"></i></button>
                                                    <div class="dropdown-menu">
                                                      <a class="dropdown-item" href="#">Action</a>
                                                      <a class="dropdown-item" href="#">Another action</a>
                                                      <a class="dropdown-item" href="#">Something else here</a>
                                                      <div role="separator" class="dropdown-divider"></div>
                                                      <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                  </div>
                                                </div>
                                             </form>
                                          </div>
                                          <div class="col-2 text-center">
                                             <i class="far fa-smile smile-ic mt-3"></i>
                                          </div>
                                          <div class="col-2 text-left">
                                             <i class="fas fa-user-tag mt-3"></i>
                                          </div>
                                          <div class="col-4 text-center"></div>
                                          <div class="col-2 text-center padding-for-sm">
                                             <button class="btn btn-dark explbtn-2 mt-2">
                                                Post
                                             </button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12 comu-large-card-col">
                                       <div class="card mb-3 community-big-card">
                                          <div class="row pt-2 pb-2">
                                             <div class="col-md-12 comu-name-dp">
                                                <div class="row">
                                                   <div class="col-2 text-right">
                                                      <img src="<?=base_url();?>assets/images/no-user.png" class="w-50 dp-img comu-dp-img">
                                                   </div>
                                                   <div class="col-10">
                                                      <p class="name name-comu">Emeka Wilson</p>
                                                      <p class="time time-comu">Yesterday 6:30pm</p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                         <img class="card-img-top" src="<?=base_url();?>assets/images/79003dbf0caeeb166923196e1f85a9ed.jpg" alt="Card image cap">
                                         <div class="tb3-spans community-spans">
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
                                          <div class="row justify-content-center comu-icone-row">
                                             <div class="col-3 text-right">
                                                <i class="fas fa-heart comu-large-icone"></i>
                                             </div>
                                             <div class="col-3 text-center">
                                                <i class="fas fa-comment comu-large-icone"></i>
                                             </div>
                                             <div class="col-3 text-left">
                                                <i class="fas fa-share-alt comu-large-icone"></i>
                                             </div>
                                          </div>
                                         <div class="card-body">
                                           <p class="card-text left-card-text">
                                              <strong class="comu-ryt-strong">bolajiboj</strong> Supreme, your design collection is always marvelous *hats off*
                                           </p>
                                           <p class="card-text text-center"><strong class="comu-ryt-strong">View all comments</strong></p>
                                           <form class="mt-5">
                                             <div class="form-group big-form">

                                                <i class="fas fa-user-circle icone-write-comment comu-icone-write-comment"></i>
                                                   <input type="email" class="form-control big-form-control comu-big-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write a comment">
                                             </div>
                                             </form>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12 comu-large-card-col">
                                       <div class="card mb-3 community-big-card">
                                          <div class="row pt-2 pb-2">
                                             <div class="col-md-12 comu-name-dp">
                                                <div class="row">
                                                   <div class="col-2 text-right">
                                                      <img src="<?=base_url();?>assets/images/no-user.png" class="w-50 dp-img comu-dp-img">
                                                   </div>
                                                   <div class="col-10">
                                                      <p class="name name-comu">Emeka Wilson</p>
                                                      <p class="time time-comu">Yesterday 6:30pm</p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                         <img class="card-img-top" src="<?=base_url();?>assets/images/79003dbf0caeeb166923196e1f85a9ed.jpg" alt="Card image cap">
                                         <div class="tb3-spans community-spans">
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
                                          <div class="row justify-content-center comu-icone-row">
                                             <div class="col-3 text-right">
                                                <i class="fas fa-heart comu-large-icone"></i>
                                             </div>
                                             <div class="col-3 text-center">
                                                <i class="fas fa-comment comu-large-icone"></i>
                                             </div>
                                             <div class="col-3 text-left">
                                                <i class="fas fa-share-alt comu-large-icone"></i>
                                             </div>
                                          </div>
                                         <div class="card-body">
                                           <p class="card-text left-card-text">
                                              <strong class="comu-ryt-strong">bolajiboj</strong> Supreme, your design collection is always marvelous *hats off*
                                           </p>
                                           <p class="card-text text-center"><strong class="comu-ryt-strong">View all comments</strong></p>
                                           <form class="mt-5">
                                             <div class="form-group big-form">

                                                <i class="fas fa-user-circle icone-write-comment comu-icone-write-comment"></i>
                                                   <input type="email" class="form-control big-form-control comu-big-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write a comment">
                                             </div>
                                             </form>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12 comu-large-card-col">
                                       <div class="card mb-3 community-big-card">
                                          <div class="row pt-2 pb-2">
                                             <div class="col-md-12 comu-name-dp">
                                                <div class="row">
                                                   <div class="col-2 text-right">
                                                      <img src="<?=base_url();?>assets/images/no-user.png" class="w-50 dp-img comu-dp-img">
                                                   </div>
                                                   <div class="col-10">
                                                      <p class="name name-comu">Emeka Wilson</p>
                                                      <p class="time time-comu">Yesterday 6:30pm</p>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                         <img class="card-img-top" src="<?=base_url();?>assets/images/79003dbf0caeeb166923196e1f85a9ed.jpg" alt="Card image cap">
                                         <div class="tb3-spans community-spans">
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
                                          <div class="row justify-content-center comu-icone-row">
                                             <div class="col-3 text-right">
                                                <i class="fas fa-heart comu-large-icone"></i>
                                             </div>
                                             <div class="col-3 text-center">
                                                <i class="fas fa-comment comu-large-icone"></i>
                                             </div>
                                             <div class="col-3 text-left">
                                                <i class="fas fa-share-alt comu-large-icone"></i>
                                             </div>
                                          </div>
                                         <div class="card-body">
                                           <p class="card-text left-card-text">
                                              <strong class="comu-ryt-strong">bolajiboj</strong> Supreme, your design collection is always marvelous *hats off*
                                           </p>
                                           <p class="card-text text-center"><strong class="comu-ryt-strong">View all comments</strong></p>
                                           <form class="mt-5">
                                             <div class="form-group big-form">

                                                <i class="fas fa-user-circle icone-write-comment comu-icone-write-comment"></i>
                                                   <input type="email" class="form-control big-form-control comu-big-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write a comment">
                                             </div>
                                             </form>
                                         </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-4 comu-main-4-col">
                                 <div class="card comu-ryt-card">
                                    <span class="comu-top-span">Jan 1</span>
                                   <img class="card-img-top" src="<?=base_url();?>assets/images/79003dbf0caeeb166923196e1f85a9ed.jpg" alt="Card image cap">
                                   <div class="card-body comu-ryt-card-body">
                                     <h5 class="card-title comu-ryt-card-head">
                                        CHALLENGES AND OPPORTUNITIES IN THE AFRICAN FASHION INDUSTRY
                                     </h5>
                                     <p class="card-text comu-ryt-card-text">
                                        As a loyal platinum shopper of Macy's Store, my desire has always been to have..
                                     </p>
                                     <p class="comu-link-pryt">
                                       <span class="comu-span-parent"><span class="comu-badge-span">'</span></span>
                                       <a href="#">E-Magazine</a>
                                    </p>
                                   </div>
                                 </div>
                                 <div class="card comu-ryt-card">
                                    <span class="comu-top-span">Jan 1</span>
                                   <img class="card-img-top" src="<?=base_url();?>assets/images/79003dbf0caeeb166923196e1f85a9ed.jpg" alt="Card image cap">
                                   <div class="card-body comu-ryt-card-body">
                                     <h5 class="card-title comu-ryt-card-head">
                                        CHALLENGES AND OPPORTUNITIES IN THE AFRICAN FASHION INDUSTRY
                                     </h5>
                                     <p class="card-text comu-ryt-card-text">
                                        As a loyal platinum shopper of Macy's Store, my desire has always been to have..
                                     </p>
                                     <p class="comu-link-pryt">
                                       <span class="comu-span-parent"><span class="comu-badge-span">'</span></span>
                                       <a href="#">E-Magazine</a>
                                    </p>
                                   </div>
                                 </div>
                                 <div class="card comu-ryt-card">
                                    <span class="comu-top-span">Jan 1</span>
                                   <img class="card-img-top" src="<?=base_url();?>assets/images/79003dbf0caeeb166923196e1f85a9ed.jpg" alt="Card image cap">
                                   <div class="card-body comu-ryt-card-body">
                                     <h5 class="card-title comu-ryt-card-head">
                                        CHALLENGES AND OPPORTUNITIES IN THE AFRICAN FASHION INDUSTRY
                                     </h5>
                                     <p class="card-text comu-ryt-card-text">
                                        As a loyal platinum shopper of Macy's Store, my desire has always been to have..
                                     </p>
                                     <p class="comu-link-pryt">
                                       <span class="comu-span-parent"><span class="comu-badge-span">'</span></span>
                                       <a href="#">E-Magazine</a>
                                    </p>
                                   </div>
                                 </div>
                                 <div class="card comu-ryt-card">
                                    <span class="comu-top-span">Jan 1</span>
                                   <img class="card-img-top" src="<?=base_url();?>assets/images/79003dbf0caeeb166923196e1f85a9ed.jpg" alt="Card image cap">
                                   <div class="card-body comu-ryt-card-body">
                                     <h5 class="card-title comu-ryt-card-head">
                                        CHALLENGES AND OPPORTUNITIES IN THE AFRICAN FASHION INDUSTRY
                                     </h5>
                                     <p class="card-text comu-ryt-card-text">
                                        As a loyal platinum shopper of Macy's Store, my desire has always been to have..
                                     </p>
                                     <p class="comu-link-pryt">
                                       <span class="comu-span-parent"><span class="comu-badge-span">'</span></span>
                                       <a href="#">E-Magazine</a>
                                    </p>
                                   </div>
                                 </div>
                                 <p class="text-center"><a href="#" class="comu-seemore-link">See More</a></p>
                              </div>
                           </div>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                           <div class="row tab2-main-row">
                              <div class="col-md-2 col-2 text-center">
                                 <div style="position: relative;">
                                    <img src="<?=base_url();?>assets/images/no-user.png" class="w-50 dp-img comu-dp-img other-comu-dp-img">
                                    <span class="comu-tab2-span"><i class="fas fa-heart tab2-comu-icone"></i></span>
                                 </div>
                              </div>
                              <div class="col-md-7 col-7">
                                 <p class="tab2p-comu"><strong>Emeka Chinonso and 139 others</strong> liked your post</p>
                                 <p class="tab2p2-comu">2 mins ago</p>
                              </div>
                              <div class="col-md-3 col-3 text-right">
                                 <img src="<?=base_url();?>assets/images/man.jpg" class="w-50 tab3main-img">
                              </div>
                           </div>
                           <div class="row tab2-main-row">
                              <div class="col-md-2 col-2 text-center">
                                 <div style="position: relative;">
                                    <img src="<?=base_url();?>assets/images/no-user.png" class="w-50 dp-img comu-dp-img other-comu-dp-img">
                                    <span class="comu-tab2-span"><i class="fas fa-heart tab2-comu-icone"></i></span>
                                 </div>
                              </div>
                              <div class="col-md-7 col-7">
                                 <p class="tab2p-comu"><strong>Emeka Chinonso and 139 others</strong> liked your post</p>
                                 <p class="tab2p2-comu">2 mins ago</p>
                              </div>
                              <div class="col-md-3 col-3 text-right">
                                 <img src="<?=base_url();?>assets/images/man.jpg" class="w-50 tab3main-img">
                              </div>
                           </div>
                           <div class="row tab2-main-row">
                              <div class="col-md-2 col-2 text-center">
                                 <div style="position: relative;">
                                    <img src="<?=base_url();?>assets/images/no-user.png" class="w-50 dp-img comu-dp-img other-comu-dp-img">
                                    <span class="comu-tab2-span"><i class="fas fa-heart tab2-comu-icone"></i></span>
                                 </div>
                              </div>
                              <div class="col-md-7 col-7">
                                 <p class="tab2p-comu"><strong>Emeka Chinonso and 139 others</strong> liked your post</p>
                                 <p class="tab2p2-comu">2 mins ago</p>
                              </div>
                              <div class="col-md-3 col-3 text-right">
                                 <img src="<?=base_url();?>assets/images/man.jpg" class="w-50 tab3main-img">
                              </div>
                           </div>
                           <div class="row tab2-main-row">
                              <div class="col-md-2 col-2 text-center">
                                 <div style="position: relative;">
                                    <img src="<?=base_url();?>assets/images/no-user.png" class="w-50 dp-img comu-dp-img other-comu-dp-img">
                                    <span class="comu-tab2-span"><i class="fas fa-heart tab2-comu-icone"></i></span>
                                 </div>
                              </div>
                              <div class="col-md-7 col-7">
                                 <p class="tab2p-comu"><strong>Emeka Chinonso and 139 others</strong> liked your post</p>
                                 <p class="tab2p2-comu">2 mins ago</p>
                              </div>
                              <div class="col-md-3 col-3 text-right">
                                 <img src="<?=base_url();?>assets/images/man.jpg" class="w-50 tab3main-img">
                              </div>
                           </div>
                           <div class="row tab2-main-row">
                              <div class="col-md-2 col-2 text-center">
                                 <div style="position: relative;">
                                    <img src="<?=base_url();?>assets/images/no-user.png" class="w-50 dp-img comu-dp-img other-comu-dp-img">
                                    <span class="comu-tab2-span"><i class="fas fa-heart tab2-comu-icone"></i></span>
                                 </div>
                              </div>
                              <div class="col-md-7 col-7">
                                 <p class="tab2p-comu"><strong>Emeka Chinonso and 139 others</strong> liked your post</p>
                                 <p class="tab2p2-comu">2 mins ago</p>
                              </div>
                              <div class="col-md-3 col-3 text-right">
                                 <img src="<?=base_url();?>assets/images/man.jpg" class="w-50 tab3main-img">
                              </div>
                           </div> 
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                            <div class="row">
                               <div class="col-md-6">
                                  <div class="row mt-5">
                                     <div class="col-md-12">
                                        <p class="tab3-p-rytside-comu">
                                          <img src="<?=base_url();?>assets/images/no-user.png" class="dp-img tab3-comu-dp-img">
                                           Emeka Chinonso and 139 others
                                        </p>
                                     </div>
                                  </div>
                                  <div class="row mt-1">
                                     <div class="col-md-12">
                                        <p class="tab3-p-rytside-comu">
                                          <img src="<?=base_url();?>assets/images/no-user.png" class="dp-img tab3-comu-dp-img">
                                           Emeka Chinonso and 139 others
                                        </p>
                                     </div>
                                  </div>
                                  <div class="row mt-1">
                                     <div class="col-md-12">
                                        <p class="tab3-p-rytside-comu">
                                          <img src="<?=base_url();?>assets/images/no-user.png" class="dp-img tab3-comu-dp-img">
                                           Emeka Chinonso and 139 others
                                        </p>
                                     </div>
                                  </div>
                                  <div class="row mt-1">
                                     <div class="col-md-12">
                                        <p class="tab3-p-rytside-comu">
                                          <img src="<?=base_url();?>assets/images/no-user.png" class="dp-img tab3-comu-dp-img">
                                           Emeka Chinonso and 139 others
                                        </p>
                                     </div>
                                  </div>
                                  <div class="row mt-1">
                                     <div class="col-md-12">
                                        <p class="tab3-p-rytside-comu">
                                          <img src="<?=base_url();?>assets/images/no-user.png" class="dp-img tab3-comu-dp-img">
                                           Emeka Chinonso and 139 others
                                        </p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="card tab3-rytside-card">
                                            <div class="shadow-sm rounded card-header tab3-ryt-cardheader">
                                              <p class="tab3-p-rytside2-comu">
                                                <img src="<?=base_url();?>assets/images/no-user.png" class="dp-img tab3-comu-dp-img">
                                                 Emeka Chinonso and 139 others
                                              </p>
                                            </div>
                                            <div class="card-body tab3-card-body">
                                              <div class="tab3-parent-1">
                                                 <p class="tab-3-main-p">
                                                    Hi! yes I'm down. I just read your description and I think I'm comfortable with them.
                                                 </p>
                                                 <span class="tab3-spanleft">Abc</span>
                                                 <span class="tab3-spanright">12:20 Today</span>
                                              </div>
                                              <div class="tab3-parent-2">
                                                 <p class="tab-3-main-p">
                                                    Hi! yes I'm down. I just read your description and I think I'm comfortable with them.
                                                 </p>
                                                 <span class="tab3-spanleft">Abc</span>
                                                 <span class="tab3-spanright">12:20 Today</span>
                                              </div>
                                              <div class="tab3-parent-3">
                                                 <p class="tab-3-main-p">
                                                    Hi! yes I'm down. I just read your description and I think I'm comfortable with them.
                                                 </p>
                                                 <span class="tab3-spanleft">Abc</span>
                                                 <span class="tab3-spanright">12:20 Today</span>
                                              </div>
                                              <div class="tab3-parent-4">
                                                 <p class="tab-3-main-p">
                                                    Hi! yes I'm down. I just read your description and I think I'm comfortable with them.
                                                 </p>
                                                 <span class="tab3-spanleft">Abc</span>
                                                 <span class="tab3-spanright">12:20 Today</span>
                                              </div>
                                            </div>
                                            <div class="shadow-sm card-footer tab3-cd-footer">
                                               <form>
                                                   <div class="form-group" style="position: relative;">
                                                      <i class="fa fa-smile-o comu-tab3-smilee" aria-hidden="true"></i>
                                                      <input type="email" class="form-control f-c-comu-tab3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write a message here...">
                                                   </div>
                                                </form>
                                            </div>
                                          </div>
                                     </div>
                                  </div>
                               </div>
                            </div>     
                        </div>
                        <div id="menu3" class="container tab-pane fade"><br>
                           <div class="row">
                               <div class="col-md-6">
                                  <div class="row mt-5">
                                     <div class="col-md-12">
                                        <p class="tab3-p-rytside-comu">
                                          <span class="tab4-leftspan"><i class="fas fa-suitcase"></i></span>
                                           Beskope Bid
                                        </p>
                                     </div>
                                  </div>
                                  <div class="row mt-1">
                                     <div class="col-md-12">
                                        <p class="tab3-p-rytside-comu">
                                          <span class="tab4-leftspan"><i class="fas fa-suitcase"></i></span>
                                           Beskope Bid
                                        </p>
                                     </div>
                                  </div>
                                  <div class="row mt-1">
                                     <div class="col-md-12">
                                        <p class="tab3-p-rytside-comu">
                                          <span class="tab4-leftspan"><i class="fas fa-suitcase"></i></span>
                                           Beskope Bid
                                        </p>
                                     </div>
                                  </div>
                                  <div class="row mt-1">
                                     <div class="col-md-12">
                                        <p class="tab3-p-rytside-comu">
                                          <span class="tab4-leftspan"><i class="fas fa-suitcase"></i></span>
                                           Beskope Bid
                                        </p>
                                     </div>
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="row">
                                     <div class="col-md-12">
                                        <div class="card tab3-rytside-card">
                                            <div class="shadow-sm rounded card-header tab4-ryt-cardheader">
                                              <div class="row">
                                                 <div class="col-md-2 text-center">
                                                    <span class="tab4-rytspan"><i class="fas fa-suitcase"></i></span>
                                                 </div>
                                                 <div class="col-md-10">
                                                    <p class="comu-tab4-p1">
                                                       Bespoke Designer for Service A between 1-January-2020 to 1-February-2020
                                                    </p>
                                                    <p class="comu-tab4-p2">Price Range: N100,000 - N200,000</p>
                                                 </div>
                                              </div>
                                            </div>
                                            <div class="card-body tab3-card-body">
                                              <div class="table-responsive">
                                                  <table class="table comu-tab3-table">
                                                     <caption class="table-caption">Bids</caption>
                                                     <tbody>
                                                       <tr>
                                                         <td valign="center" class="td-image td-tab3-little-table">
                                                            <img src="<?=base_url();?>assets/images/no-user.png" class="tb-dp-img">
                                                         </td>
                                                         <td class="td-tab3-little-table big-td">
                                                            <h6 class="table-head">Supreme Fashion House</h6>
                                                            <span class="tblspanionlocat">
                                                               <i class="fas fa-map-marker-alt"></i> Supreme
                                                            </span>
                                                            <div class="table-stars">
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa comu-star explore-rating-fa-star"></span>
                                                               <span class="fa comu-star fa-star"></span>
                                                            </div>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <h6 class="table-head">N250,000</h6>
                                                            <p class="tb-bid-p">Bid</p>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-success tb-btn-sm btn-sm">Accept</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-warning tb-btn-sm btn-sm">Negotiate</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <a href="#" class="table-close"><i class="fas fa-times"></i></a>
                                                         </td>
                                                       </tr>
                                                       <tr style="background: #fff">
                                                         <td style="border-top: 0px;padding: 5px;"></td>
                                                       </tr>
                                                       <tr>
                                                         <td valign="center" class="td-image td-tab3-little-table">
                                                            <img src="<?=base_url();?>assets/images/no-user.png" class="tb-dp-img">
                                                         </td>
                                                         <td class="td-tab3-little-table big-td">
                                                            <h6 class="table-head">Supreme Fashion House</h6>
                                                            <span class="tblspanionlocat">
                                                               <i class="fas fa-map-marker-alt"></i> Supreme
                                                            </span>
                                                            <div class="table-stars">
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa comu-star explore-rating-fa-star"></span>
                                                               <span class="fa comu-star fa-star"></span>
                                                            </div>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <h6 class="table-head">N250,000</h6>
                                                            <p class="tb-bid-p">Bid</p>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-success tb-btn-sm btn-sm">Accept</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-warning tb-btn-sm btn-sm">Negotiate</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <a href="#" class="table-close"><i class="fas fa-times"></i></a>
                                                         </td>
                                                       </tr>
                                                       <tr style="background: #fff">
                                                         <td style="border-top: 0px;padding: 5px;"></td>
                                                       </tr>
                                                       <tr>
                                                         <td valign="center" class="td-image td-tab3-little-table">
                                                            <img src="<?=base_url();?>assets/images/no-user.png" class="tb-dp-img">
                                                         </td>
                                                         <td class="td-tab3-little-table big-td">
                                                            <h6 class="table-head">Supreme Fashion House</h6>
                                                            <span class="tblspanionlocat">
                                                               <i class="fas fa-map-marker-alt"></i> Supreme
                                                            </span>
                                                            <div class="table-stars">
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa comu-star explore-rating-fa-star"></span>
                                                               <span class="fa comu-star fa-star"></span>
                                                            </div>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <h6 class="table-head">N250,000</h6>
                                                            <p class="tb-bid-p">Bid</p>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-success tb-btn-sm btn-sm">Accept</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-warning tb-btn-sm btn-sm">Negotiate</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <a href="#" class="table-close"><i class="fas fa-times"></i></a>
                                                         </td>
                                                       </tr>
                                                       <tr style="background: #fff">
                                                         <td style="border-top: 0px;padding: 5px;"></td>
                                                       </tr>
                                                       <tr>
                                                         <td valign="center" class="td-image td-tab3-little-table">
                                                            <img src="<?=base_url();?>assets/images/no-user.png" class="tb-dp-img">
                                                         </td>
                                                         <td class="td-tab3-little-table big-td">
                                                            <h6 class="table-head">Supreme Fashion House</h6>
                                                            <span class="tblspanionlocat">
                                                               <i class="fas fa-map-marker-alt"></i> Supreme
                                                            </span>
                                                            <div class="table-stars">
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa comu-star explore-rating-fa-star"></span>
                                                               <span class="fa comu-star fa-star"></span>
                                                            </div>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <h6 class="table-head">N250,000</h6>
                                                            <p class="tb-bid-p">Bid</p>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-success tb-btn-sm btn-sm">Accept</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-warning tb-btn-sm btn-sm">Negotiate</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <a href="#" class="table-close"><i class="fas fa-times"></i></a>
                                                         </td>
                                                       </tr>
                                                       <tr style="background: #fff">
                                                         <td style="border-top: 0px;padding: 5px;"></td>
                                                       </tr>
                                                       <tr>
                                                         <td valign="center" class="td-image td-tab3-little-table">
                                                            <img src="<?=base_url();?>assets/images/no-user.png" class="tb-dp-img">
                                                         </td>
                                                         <td class="td-tab3-little-table big-td">
                                                            <h6 class="table-head">Supreme Fashion House</h6>
                                                            <span class="tblspanionlocat">
                                                               <i class="fas fa-map-marker-alt"></i> Supreme
                                                            </span>
                                                            <div class="table-stars">
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa comu-star explore-rating-fa-star"></span>
                                                               <span class="fa comu-star fa-star"></span>
                                                            </div>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <h6 class="table-head">N250,000</h6>
                                                            <p class="tb-bid-p">Bid</p>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-success tb-btn-sm btn-sm">Accept</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-warning tb-btn-sm btn-sm">Negotiate</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <a href="#" class="table-close"><i class="fas fa-times"></i></a>
                                                         </td>
                                                       </tr>
                                                       <tr style="background: #fff">
                                                         <td style="border-top: 0px;padding: 5px;"></td>
                                                       </tr>
                                                       <tr>
                                                         <td valign="center" class="td-image td-tab3-little-table">
                                                            <img src="<?=base_url();?>assets/images/no-user.png" class="tb-dp-img">
                                                         </td>
                                                         <td class="td-tab3-little-table big-td">
                                                            <h6 class="table-head">Supreme Fashion House</h6>
                                                            <span class="tblspanionlocat">
                                                               <i class="fas fa-map-marker-alt"></i> Supreme
                                                            </span>
                                                            <div class="table-stars">
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa fa-star comu-star explore-rating-checked"></span>
                                                               <span class="fa comu-star explore-rating-fa-star"></span>
                                                               <span class="fa comu-star fa-star"></span>
                                                            </div>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <h6 class="table-head">N250,000</h6>
                                                            <p class="tb-bid-p">Bid</p>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-success tb-btn-sm btn-sm">Accept</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <button type="button" class="btn btn-warning tb-btn-sm btn-sm">Negotiate</button>
                                                         </td>
                                                         <td class="td-tab3-little-table">
                                                            <a href="#" class="table-close"><i class="fas fa-times"></i></a>
                                                         </td>
                                                       </tr>
                                                     </tbody>
                                                   </table>
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
                  <!-- tabs ends -->
               </section>





                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>