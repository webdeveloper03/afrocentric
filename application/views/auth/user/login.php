            <div class="row">
               <div class="col-md-12 mt-5">
                  <div class="row">
                     <div class="col-md-4  left-card">
                        <div class="card" style="background-color: unset;">
                           <div class="card-body">
                              <div class="text-center mt-5">
                                 
                           <?php
							$logo = base_url($siteSetting['logo'] ? 'assets/images/site/'.$siteSetting['logo'] : 'assets/images/logo-white.png');
							?>
						<img src="<?=$logo;?>" alt="LOGO" style="max-height: 50px;">
                              </div>
                              <div class="account">
                                 <p>Don't have an<br/> account?</p>
                                 <a href="<?= base_url('register') ?>" class="btn btn-warning b-sign" data-type='register'><?= __('user.sign_up') ?></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class=" col-md-8 w-com">
                     	<h4 class="text-center">Welcome Back,<br/> Log In to continue</h4><br/>
                    <form id="loginform">       

                     <input type="hidden" name="type" value="user">
                     <div class="form-group">
                        <span class="control-label">E-mail</span>
                        <input class="form-control form-user" type="text" name="username" id="username" placeholder="Username" required>
                        <span class="focus-input100"></span><br/>
                        <?php if (isset($googlerecaptcha['affiliate_login']) && $googlerecaptcha['affiliate_login']) { ?>
				<div class="captch mb-3">
					<script src='https://www.google.com/recaptcha/api.js'></script>
					<div class="g-recaptcha" data-sitekey="<?= $googlerecaptcha['sitekey'] ?>"></div>
					<!-- <input type="hidden" name="captch_response" id="captch_response"> -->
				</div>
			<?php } ?>


                     </div>
                     <div class="form-group">
                        <span class="control-label">Password</span>
                        <input class="form-control form-user" type="password" name="password" id="password" placeholder="*************" required>
                        <span class="focus-input100"></span><br/>
                     </div>
                                                                 			<p class="login-error" id="msg"></p>

                     <div>
                     	<input type="checkbox" name="checkbox" class="check">Remember me
                     </div>


                     <div><br/>
                     	
                     </div>
                     <div class="row">
                     	<div class="col-md-6">
                     		<button class="btn btn-warning btn-sm br-10px sign-2" id="loginBtn"><?= __('user.sign_in') ?></button>

                     	</div>
                     	<div class="col-md-6">
                     		<a class="btn forword" role = "button" href="<?= base_url('forget-password') ?>" ><?= __('user.forget_password') ?> ?</a>
                     	</div>
                     </div><br/>
                     <div></div>
                     <div class="col-md-12">
                     	<a href="#" class="use-sign">Or sign In using</a>
                     </div><br/>

                     <div class="row">
                     	<div class="col-md-6">
                     		<a href = "#"><i class="fa fa-facebook facebook-1"></i></a>
                     	</div>
                     	<div class="col-md-6">
                     		<a href = "#"><i class="fa fa-google google-1"></i></a>
                     	</div>
                     </div>
                  </form>
                     </div>
                  </div>
                 
               </div>
            </div>  
         </div>
      </div>