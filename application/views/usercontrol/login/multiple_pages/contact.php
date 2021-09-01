<?php include(APPPATH.'/views/usercontrol/login/multiple_pages/header.php'); ?>



<?php 

if(is_array($theme_settings) && isset($theme_settings[0])) {

    $setting = $theme_settings[0];

    $contact_banner_image = (isset($theme_settings[0])) ? $theme_settings[0]->contact_banner_image : null;
}

?>


<?php 
if ($contact_banner_image != '' || !empty($contact_banner_image)) { 
    $contact_banner =  base_url().'assets/images/theme_images/'.$contact_banner_image;
}else{ 
    $contact_banner =  base_url('assets/login/multiple_pages/img/contact-us.jpg');
} 
?>

   <!--Hero-->

   <div class="wlc-hero-area inner-hero-area d-flex align-items-center" style="background-image: url(<?= $contact_banner ?>)">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="wlc-hero-content text-center">

                        <h1><?= (isset($setting->contact_us_t_title) && !empty($setting->contact_us_t_title)) ? $setting->contact_us_t_title : "Contact Us For Any Question"; ?></h1>
                        <?= (isset($setting->contact_us_slug_title) && !empty($setting->contact_us_slug_title)) ? "<p>".$setting->contact_us_slug_title."</p>" : ""; ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

	<!--Hero-->



	<div class="inner-page-area">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
						<img src="<?= base_url('assets/login/multiple_pages') ?>/img/icon.png" alt="client"/>
                        <h2><?= (isset($setting->contact_sec_title) && !empty($setting->contact_sec_title)) ? $setting->contact_sec_title : "What is Lorem Ipsum?"; ?></h2>
                        <p><?= (isset($setting->contact_sec_subtitle) && !empty($setting->contact_sec_subtitle)) ? $setting->contact_sec_subtitle : "Lorem Ipsum is simply dummy text of the printing and typesetting industry."; ?></p>
                    </div>
                </div>
            </div>

            <div class="row mt-5">

                <div class="col-lg-4">

                    <div class="contact-form">

                        <h3>Contact Form</h3>

                        <form id="mail-form">

            				<input type="hidden" name="send_contact_form">

							<div class="row">

								<div class="col-lg-6">

								<div class="form-group">

									<input type="text" name="fname" class="form-control" placeholder="First Name">

								</div>

								</div>

								<div class="col-lg-6">

								<div class="form-group">

									<input type="text" name="lname" class="form-control" placeholder="Last Name">

								</div>

								</div>

							</div>

                            <div class="form-group">

                                <input type="email" name="email" class="form-control" placeholder="Email">

                            </div>

							<div class="form-group">

                                <input type="number" name="phone" class="form-control" placeholder="Mobile">

                            </div>                            

                            <div class="form-group">

                                <input type="text" name="subject" class="form-control" placeholder="Subject">

                            </div>                            

                            <div class="form-group">

                                <textarea name="body" class="form-control" placeholder="Message"></textarea>

                            </div>

                            <div class="submitform">

                                <input class="btn-submit" type="submit" value="Send">

                            </div>

                        </form>

                    </div>

                </div>

                <div class="col-lg-5">

                    <div class="map-location">

					<?php if ($setting->contact_us_iframe ==''): ?>

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55565170.29301636!2d-132.08532758867793!3d31.786060306224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sph!4v1592929054111!5m2!1sen!2sph" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

					<?php else: ?>

					<?= $setting->contact_us_iframe ?>

					<?php endif ?>

                    </div>

                </div>

                <div class="col-lg-3">

                    <div class="contact-address">

                        <h3>Contact Info</h3>

                        <ul>

                            <li><span>Phone: </span> <span><?= (isset($setting->contact_us_phone) && !empty($setting->contact_us_phone)) ? $setting->contact_us_phone : "+999 999 999"; ?></span></li>

                            <li><span>Email: </span> <span><?= (isset($setting->contact_us_email) && !empty($setting->contact_us_email)) ? $setting->contact_us_email : "lorem@lorem.com"; ?></span></li>

                            <li><span>Address: </span> <span><?= (isset($setting->contact_us_full_address) && !empty($setting->contact_us_full_address)) ? $setting->contact_us_full_address : "Contact Us For Any Question"; ?></span></li>

                        </ul>

                    </div>

                    <div class="social-link">

                       <h3>Social Media</h3>

                        <a href="https://api.whatsapp.com/send?phone=<?= $setting->whatsapp_number ?>&text=<?= urlencode($setting->whatsapp_default_msg) ?>"><img src="<?= base_url('assets/login/multiple_pages') ?>/img/whatsapp.png" alt="Whatsapp"></a>

                        <a href="<?= $setting->instegram_link ?>"><img src="<?= base_url('assets/login/multiple_pages') ?>/img/instagram.png" alt="Instagram"></a>

                        <a href="<?= $setting->twitter_link ?>"><img src="<?= base_url('assets/login/multiple_pages') ?>/img/twitter.png" alt="Twitter"></a>

                        <a href="<?= $setting->facebook_link ?>"><img src="<?= base_url('assets/login/multiple_pages') ?>/img/facebook.png" alt="Facebook"></a>

                        <a href="<?= $setting->youtube_link ?>"><img src="<?= base_url('assets/login/multiple_pages') ?>/img/youtube.png" alt="Youtube"></a>

                    </div>

                </div>

            </div>

        </div>

    </div>

<?php include(APPPATH.'/views/usercontrol/login/multiple_pages/footer.php'); ?>

<script type="text/javascript">

	(function ($) {

        $.fn.btn = function (action) {

            var self = $(this);

            if (action == 'loading') { $(self).addClass("btn-loading"); }

            if (action == 'reset') { $(self).removeClass("btn-loading"); }

        }

    })(jQuery);



	$("#mail-form").on('submit',function(evt){

	    evt.preventDefault();	    

    	var formData = new FormData($("#mail-form")[0]);

	    $(".btn-submit").btn("loading");

	    $this = $("#mail-form");



	    $.ajax({

	        type:'POST',

	        dataType:'json',

	        cache:false,

	        contentType: false,

	        processData: false,

	        data:formData,

	        success:function(result){

	            $(".btn-submit").btn("reset");

	            $(".alert-dismissable").remove();



	            $this.find(".has-error").removeClass("has-error");

	            $this.find(".is-invalid").removeClass("is-invalid");

	            $this.find("span.text-danger").remove();	            



	            if(result['success']){

	                $("#mail-form").prepend('<div class="alert mb-4 alert-info alert-dismissable">'+ result['success'] +'</div>');

	                var body = $("html, body");

	                $("#mail-form")[0].reset()

					body.stop().animate({scrollTop:0}, 500, 'swing', function() { });

	            }



	            if(result['errors']){

	                $.each(result['errors'], function(i,j){

	                    $ele = $this.find('[name="'+ i +'"]');

	                    if(!$ele.length){ 

	                    	$ele = $this.find('.'+ i);

	                    }

	                    if($ele){

	                        $ele.addClass("is-invalid");

	                        $ele.parents(".form-group").addClass("has-error");

	                        $ele.after("<span class='d-block text-danger'>"+ j +"</span>");

	                    }

	                });



					errors = result['errors'];

					$('.formsetting_error').text(errors['formsetting_recursion_custom_time']);

					$('.productsetting_error').text(errors['productsetting_recursion_custom_time']);

	            }

	        },

	    });

		

	    return false;

	});

</script>



