       <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>

<section class="explore-bg-header">
                  <div class="container-fluid explore-top-container">
                     <div class="row row-bg row-bf-web">
                        <div class="col-md-12 text-center m-auto">
                           <a href="#" class="link-large"><i class="fas fa-pen web-pen"></i></a>
                        </div>
                     </div>
                     <div class="row iner-main-row-btns">
                        <div class="col-md-4">
                           <div class="model-div">
                              <a href="#" class="link-large-2"><i class="fas fa-pen web-pen-2"></i></a>
                              <img src="<?=base_url();?>assets/images/model3.jpg" class="model-dp model-dp-web w-100">
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="row iner-row-btns web-iner-row-btns">
                              <div class="col-md-3">
                                 <button type="button" class="btn btn-success web-btn-1"><i class="fas fa-check"></i> Save Changes</button>
                              </div>
                              <div class="col-md-2">
                                 <button type="button" class="btn btn-outline-danger web-btn-2"><i class="fas fa-times"></i> Revert</button>
                              </div>
                              <div class="col-md-3 text-left">
                                 <button type="button" class="btn btn-light web-btn-3"><i class="fas fa-redo"></i> Reset</button>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12 web-main-col-12">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">First Name*</label>
                                             <input type="email" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="John">
                                          </div>
                                       </form>
                                    </div>
                                    <div class="col-md-6">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">Last Name*</label>
                                             <input type="email" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Joe">
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">Email*</label>
                                             <input type="email" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="doejohn@example.com">
                                          </div>
                                       </form>
                                    </div>
                                    <div class="col-md-6">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">Phone Number*</label>
                                             <input type="email" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="+234 909 888 766">
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">Password*</label>
                                             <input type="password" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="************">
                                          </div>
                                       </form>
                                    </div>
                                    <div class="col-md-6">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">Confirm Password*</label>
                                             <input type="email" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="*********">
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">House Address</label>
                                             <input type="email" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="6, Ebinpejo Lane">
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <form>
                                          <div class="form-group">
                                              <label class="web-label" for="exampleFormControlSelect1">City*</label>
                                              <select class="form-control web-0border-form-control" id="exampleFormControlSelect1">
                                                <option>Idumota</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                              </select>
                                          </div>
                                       </form>
                                    </div>
                                    <div class="col-md-6">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">State*</label>
                                             <input type="email" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Lagos">
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">Country/Region*</label>
                                             <input type="email" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nigeria">
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <form>
                                          <div class="form-group">
                                             <label class="web-label" for="exampleInputEmail1">Phone Number*</label>
                                             <input type="email" class="form-control web-0border-form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="+234 909 888 7766">
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <form>
                                          <div class="div-for-sex-label"><label class="web-label" for="exampleInputEmail1">Sex*</label></div>
                                          <div class="funkyradio">
                                            <div class="funkyradio-danger">
                                                <input type="radio" name="radio" id="radio4" />
                                                <label for="radio4">Male</label>
                                            </div>
                                            <div class="funkyradio-warning">
                                                <input type="radio" name="radio" id="radio5" />
                                                <label for="radio5">Female</label>
                                            </div>
                                            <div class="funkyradio-info">
                                                <input type="radio" name="radio" id="radio6" />
                                                <label for="radio6">Other sexualities</label>
                                            </div>
                                          </div>
                                          <!-- <div class="form-check p-0">
                                             <div class="div-for-sex-label"><label for="exampleInputEmail1">Sex*</label></div>
                                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                              <label class="form-check-label web-label" for="exampleCheck1">Male</label>
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                              <label class="form-check-label web-label" for="exampleCheck1">Female</label>
                                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                              <input type="radio" class="form-check-input" id="exampleCheck1">
                                              <label class="form-check-label web-label" for="exampleCheck1">Other sexualities</label>
                                            </div> -->
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <form>
                                          <label class="web-label web-label-birth" for="exampleInputEmail1">Birthday</label>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-3">
                                       <form>
                                          <div class="form-group">
                                              <select class="form-control web-0border-form-control" id="exampleFormControlSelect1">
                                                <option>03</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                              </select>
                                          </div>
                                       </form>
                                    </div>
                                    <div class="col-3">
                                       <form>
                                          <div class="form-group">
                                              <select class="form-control web-0border-form-control" id="exampleFormControlSelect1">
                                                <option>Sept</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                              </select>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                       <form>
                                          <div class="div-for-sex-label mb-2">
                                                <label class="web-label" for="exampleInputEmail1">Make profile public?</label>
                                          </div>
                                          <div class="funkyradio">
                                            <div class="funkyradio-primary">
                                                <input type="radio" name="radio" id="radio2" checked/>
                                                <label for="radio2">Yes, I'll like to be public</label>
                                            </div>
                                            <div class="funkyradio-success">
                                                <input type="radio" name="radio" id="radio3" />
                                                <label for="radio3">No, I prefer to be private</label>
                                            </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                                 <div class="row justify-content-end iner-row-btns iner-row-btns-2">
                                    <div class="col-md-3">
                                       <button type="button" class="btn btn-success web-btn-1"><i class="fas fa-check"></i> Save Changes</button>
                                    </div>
                                    <div class="col-md-2">
                                       <button type="button" class="btn btn-outline-danger web-btn-2"><i class="fas fa-times"></i> Revert</button>
                                    </div>
                                    <div class="col-md-3 text-left">
                                       <button type="button" class="btn btn-light web-btn-3"><i class="fas fa-redo"></i> Reset</button>
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