<section class="contact-page">
   <div class="container">
      <div class="contact-page-wrapper">
	     <h1><?= __('store.contact_us') ?></h1>
		 <img src="<?= base_url('assets/store/default/img/popline.png'); ?>" class="cn-titlebar" alt="Contact Us">
		 <p class="cn-para"><?php echo $store_setting['contact_content'] ?></p>
		 
		 <div class="contact-inner-wrapper">
		   <div class="contact-form-wrapper">
		     <div class="contact-character">
			   <img src="<?= base_url('assets/store/default/img/cn-charact.png'); ?>" class="img-fluid" alt="Contact Us">
			 </div>
			 <div class="cn-main">
			    <h2>Contact Info</h2>
				<div class="cn-info-row">
				  <p><span class="cn-ifno-title">Phone:</span> <span><?= !empty($storesettings['contact_number']) ? $storesettings['contact_number'] : '+90 555 555 5555';?></span></p>
				  <p><span class="cn-ifno-title">Email:</span> <span><?= !empty($storesettings['email']) ? $storesettings['email'] : 'lorem@lorem.com';?></span></p>
				  <p><span class="cn-ifno-title">Address:</span> <span><?= !empty($storesettings['address']) ? $storesettings['address'] : 'Keas 69 Str. 15234, Chalandri Athens, Greece';?></span></p>
				</div>
				<h2>Contact Info</h2>
				
				<form class="form-horizontal cn-main-form p-2" action="" method="post">
					<div class="form-row">
					<div class="form-group">
					<input id="name" value="<?php echo set_value('name'); ?>" name="name" type="text" placeholder="Your name" class="form-control">
					<?php 
						if(!empty(form_error('name'))){
							echo '<span class="text-danger">'.form_error('name').'</span>';
						}
					?>
					</div>
					<div class="form-group">
					<input id="email" value="<?php echo set_value('email'); ?>" name="email" type="text" placeholder="Your email" class="form-control">
					<?php 
						if(!empty(form_error('email'))){
							echo '<span class="text-danger">'.form_error('email').'</span>';
						}
					?>
					</div>
					</div>
					<div class="form-group">
					<input id="phone" value="<?php echo set_value('phone'); ?>" name="phone" type="text" placeholder="Your phone" class="form-control">
					<?php 
						if(!empty(form_error('phone'))){
							echo '<span class="text-danger">'.form_error('phone').'</span>';
						}
					?>
					</div>
					<div class="form-group">
					<textarea class="form-control" id="message" value="<?php echo set_value('message'); ?>" name="message" placeholder="<?= __('store.please_enter_your_message_here') ?>" rows="5"></textarea>
					<?php 
						if(!empty(form_error('message'))){
							echo '<span class="text-danger">'.form_error('name').'</span>';
						}
					?>
					</div>
					<div class="form-group">
					<input type="submit" class="btn cn-sbt-btn" value="<?= __('store.submit') ?>">
					</div>
				</form>
			 </div>
		   </div>
		   <div class="contact-map">
			   <iframe src="<?= !empty($storesettings['contact_us_map']) ? $storesettings['contact_us_map'] : "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55565170.29301636!2d-132.08532758867793!3d31.786060306224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sph!4v1592929054111!5m2!1sen!2sph"; ?>" width="600" height="450" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
		   </div>
		 </div>
	  </div>
   </div>
</section>