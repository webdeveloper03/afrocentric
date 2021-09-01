       <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>
<!-- explore -->
               <section>
                     <div class="container-fluid">
                           <div class="row nav-tal">
                                <div class="col-md-12">
                                   <ul class="nav nav-tabs-2" role="tablist" id="nav-tal">
                                     <li class="nav-item">
                                       <a class="nav-link active2" data-toggle="tab" href="#menu1">Statement</a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link text" data-toggle="tab" href="#menu2">Who are we</a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link text" data-toggle="tab" href="#menu3">Mission</a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link text" data-toggle="tab" href="#menu4">Policy</a>
                                     </li>
                                     <li class="nav-item">
                                       <a class="nav-link text" data-toggle="tab" href="#menu5">FAQ</a>
                                     </li>
                                   </ul>
                                </div>
                             </div>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div id="menu1" class="container tab-pane active"><br>
                              <div class="row">
                                   <div class="col-md-6">
                                      <img src="<?=base_url();?>assets/images/common.jpg" class="w-100 mt-2">
                                   </div>
                                   <div class="col-md-6">
                                       <h3 class="w-afro">Welcome to Afrocentric culture!!!</h3>
                                       <p class="pera-mt">
                                          A platform dedicated to fashion entrepreneurs who locally produce and sell African fashion designs. The goal is to increase visibility, increase revenue for the entrepreneurs and ensure a sustainable business.   Afrocentric culture is designed to enlighten people of the many challenges  African fashion entrepreneurs encounter daily. We hope to change the psyche of individuals while astutely promoting African products. Our goal is been accomplished by creating a community of entrepreneurs, where they can interface to share ideas, experiences, and build their businesses.
                                       </p>
                                       <h6 class="w-b">
                                           To the customers, we appreciate you for your patronage.  We are here to promote quality, efficiency and make it your one-stop-shop for all African fashion.
                                       </h6>  
                                       <p class="pera-mt">
                                            We allay customers fear for online transactions by incorporating a very transparent and robust payment option. Providing an opportunity of bringing African fashion to your doorstep, no matter where you are. Afrocentric also wants to ensure that you have a great shopping experience. If assistance is needed in completing your order or accessing any part on the site, please don’t hesitate to contact us. We are continuously working hard to ensure our site is user friendly.
                                       </p>     
                                       <p>
                                             Warm regards<br/> Afrocentric Kulture
                                       </p>
                                   </div>
                               </div> 
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                              <div class="row">
                                   <div class="col-md-6">
                                      <img src="<?=base_url();?>assets/images/common.jpg" class="w-100">
                                   </div>
                                   <div class="col-md-6 mt-2">
                                       <p class="pera-mt">
                                          Afrocentric Kulture is a social marketplace focused on giving African fashion entrepreneurs visibility to sell and promote African fashion. The platform is built on trust and credibility with a unique and distinctive value proposition with the passion to connect the world to African fashion by eliminating time and distance constraint through the use of technology to bridge the gap while also opening up entrepreneurs to opportunities that could help their business grow. 
                                       </p>
                                       <p class="pera-mt">   
                                          Afrocentric Kulture is a one-stop store for African fashion designs, which aims to provide value for money, with affordable prices whilst also providing convenience through doorstep delivery, increased visibility for products and services. It is created to enlighten people of the many challenges African fashion entrepreneurs encounter daily; it acts as a support system to the entrepreneurs and link them to opportunities that will influence business growth.
                                       </p>    
                                   </div>
                               </div> 
                            </div>
                            <div id="menu3" class="container tab-pane fade"><br>
                              <div class="row">
                                   <div class="col-md-6">
                                      <img src="<?=base_url();?>assets/images/common.jpg" class="w-100">
                                   </div>
                                   <div class="col-md-6">
                                    <h6 class="w-afro">Mission</h6>
                                       <span class="dot">.</span><p class="pera-mt">
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We exist to help create, promote and groom our entrepreneurs for wealth.
                                       </p> 
                                       <h6 class="w-afro">Vision Statement</h6>
                                       <span class="dot-2">.</span><p class="pera-mt">
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Be the leading marketing platform for African fashion entrepreneurs.
                                       </p>  
                                         <h6 class="w-afro">Core Values</h6>
                                       <span class="dot-3">.</span><p class="pera-mt">
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Entrepreneurship, promote quality and efficiency, Trust and team spirit.
                                       </p>  
                                         <h6 class="w-afro">Goals and Objectives</h6>
                                       <span class="dot-4">.</span><p class="pera-mt">
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Our goal for Afrocentric Kulture is to be the top marketing platform for African fashion entrepreneurs.
                                       </p>  
                                        <span class="dot-5">.</span><p class="pera-mt">
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expand to different African countries.
                                       </p> 
                                       <span class="dot-6">.</span><p class="pera-mt">
                                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Be a support system to business owners by anticipating their needs and link business owners to opportunities.
                                       </p>
                                   </div>
                               </div>  
                            </div>
                             <div id="menu4" class="container tab-pane fade"><br>
                             <div class="row">
                                   <div class="col-md-6">
                                      <img src="<?=base_url();?>assets/images/common.jpg" class="w-100">
                                   </div>
                                   <div class="col-md-6 mt-2">
                                    <h3>Afrocentric Kulture's Policy</h3>
                                       <p class="pera-mt">
                                          Afrocentric offers 72hr /3day return/exchange policy on all items if you are not completely satisfied with your purchase. The buyer is responsible for shipping charges. please include the order number, purchase name, a contact number, email and reason for return. Items on clearance cannot be returned, as they are final sale.
                                       </p>
                                   </div>
                               </div>  
                            </div>
                             <div id="menu5" class="container tab-pane fade"><br>
                              <div class="row">
                                   <div class="col-md-12">
                                    <h3 class="w-afro">How can I cancel or update my order?</h3>
                                      <span class="dot-7">.</span>
                                      <p class="pera-mt">
                                          Be a support system to business owners by anticipating their needs and link business owners to opportunities.
                                       </p>
                                       <h3 class="w-afro">How can I cancel or update my order?</h3>
                                      <span class="dot-8">.</span>
                                      <p class="pera-mt">
                                          Be a support system to business owners by anticipating their needs and link business owners to opportunities.
                                       </p>
                                       <h3 class="w-afro">How can I cancel or update my order?</h3>
                                      <span class="dot-9">.</span>

                                      <p class="pera-mt">
                                          Be a support system to business owners by anticipating their needs and link business owners to opportunities.
                                       </p>
                                       <h3 class="w-afro">How can I cancel or update my order?</h3>
                                      <span class="dot-10">.</span>
                                      <p class="pera-mt">
                                          Be a support system to business owners by anticipating their needs and link business owners to opportunities.
                                       </p>
                                       </p>

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