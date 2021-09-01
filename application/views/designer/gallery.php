      <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>


              <!-- explore -->
               <section>
                    <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                              <a href="Products.html"><i class="fas fa-arrow-left arrow-font"></i></a>
                          </div>
                       </div>
                       <div class = "row">
                           <div class = "col-md-12">
                               <form action="/file-upload" class="dropzone">
                                  <div class="fallback">
                                    <input name="file" type="file" multiple />
                                  </div>
                                </form>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-12">
                                 <form style="padding: 1% 17%;">
                                          <label class="label-1">
                                                <p class="gallery-input">Product Name</p>
                                                   <input type="text" class="input">
                                                      <div class="line-box">
                                                         <div class="line"></div>
                                                      </div>
                                          </label>
                                          <label class="label-1">
                                                <p class="gallery-input">Product Description</p>
                                                   <input type="text" class="input">
                                                      <div class="line-box">
                                                         <div class="line"></div>
                                                      </div>
                                          </label>
                                         <label class="label-1">
                                         <p class="gallery-input">Product Price</p>
                                           <b class="product-n-2">N</b><input type="text" class="input" value="   15,000">
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                         <label class="label-1">
                                          <p class="gallery-input lbl">Available Sizes</p>	<span class="padding-uk"><span class="text-one">US</span>&nbsp;&nbsp;&nbsp;&nbsp;UK&nbsp;&nbsp;&nbsp;&nbsp;EU</span>
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

                                         </label>
                                         <label class="label-1">
                                          <small>Colors</small>
                                           <select class="form-control form-select gallery-input" style="border:none;">
                                              <option>Select color</option>
                                           </select>
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                            <label class="label-1">
                                              <p class="gallery-input gallery-input">Quantity Available</p>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                           </label>
                                          <label class="label-1">
                                              <p class="gallery-input">Product Weight</p>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                          </label> 
                                          <label class="label-1">
                                          	<p class="gallery-input">Estimated Delivery Range</p>
                                           <select class="form-control form-select" style="border:none;">
                                              <option>2 Days</option>
                                           </select>
                                           <div class="line-box">
                                             <div class="line"></div>
                                           </div>
                                         </label>
                                         <label class="label-1">
                                              <p class="gallery-input">Tags</p>
                                              <input type="text" class="input">
                                              <div class="line-box">
                                                <div class="line"></div>
                                              </div>
                                          </label>

                                          <div class="row">
                                             <div class="col-md-6 float-left">
                                                   <label class="btn">
                                                      <p class="gallery-input">Discount
                                                      <input type="checkbox" autocomplete="off" class="check-1">
                                                      <span class="glyphicon glyphicon-ok"></span>
                                                      </p>
                                                   </label> 
                                             </div>
                                             <div class="col-md-6 float-right">
                                                   <label class="btn">
                                                      <p class="gallery-input"> &nbsp;Coupon
                                                      <input type="checkbox" autocomplete="off" class="check-1">
                                                      <span class="glyphicon glyphicon-ok"></span>
                                                      </p>
                                                   </label> 
                                             </div>
                                          </div>
                                                <div class="row enter-n">
                                                   <div class="col-md-6">
                                                      <label class="label-1">
                                                         
                                                          <b class="product-n">N</b><input type="text" class="input" value="0.0">
                                                          <div class="line-box">
                                                            <div class="line"></div>
                                                          </div>
                                                      </label>
                                                   </div>
                                                   <div class="col-md-6 mar-p">
                                                      <label class="label-1">
                                                         
                                                          <input type="text" class="input" value="Enter Code">
                                                          <div class="line-box">
                                                            <div class="line"></div>
                                                          </div>
                                                      </label>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-2"></div>
                                                   <div class="col-md-4">
                                                      <button class="btn btn-h gallery-input lbl">
                                                            <a href="Create-Product.html" style="color: black;"> Create Product</a>
                                                      </button>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <button class="btn btn-m Cancel">Cancel</button>
                                                   </div>
                                                </div>
                                                
                                          </form>
                                          <p class="gallery-pera">
                                                   Afrocentric offers 72hr /3day return/exchange policy on all items if you are not completely satisfied with your purchase.<br/>  The buyer is responsible for shipping charges. please include the order number, purchase name, a contact number, email<br/> and reason for return. Items on clearance cannot be returned, as they are final sale.

                                                </p>
                           </div>
                       </div>
                    </div>    
               </section>

<?php }else{
   header("Location:".base_url()."login");
}?>