<section class="cart-page mt-5">
  	<div class="container">
     	<h2><?= __('store.checkout') ?></h2>
	 
		<?php if(!$is_logged){ ?>
			<div class="checkout-setp auth-step">
				<div class="step-head bg-light p-3 border-left-card">
					<h4 class="display-5"><?= __('store.personal_details') ?></h4>
				</div>
				<?php 
					$db =& get_instance(); 
					$products = $db->Product_model; 
					$googlerecaptcha =$db->Product_model->getSettings('googlerecaptcha');

				?>
				<div class="step-body mt-5">
					<div class="row">
						<div class="col-md-5">
							<div class="card shadow-sm border-top-card">
								<div class="card-body p-md-5">
									<h5 class="display-5 mb-5"><?= __('store.login_with_existing_account') ?></h5>
									<form id="login-form-cart">
										<input class="form-control" name="store_checkout" type="hidden" value="1">
										<div class="form-group">
											<label class="control-label"><?= __('store.username') ?></label>
											<input class="form-control" name="username" type="text">
										</div>
										<div class="form-group">
											<label class="control-label"><?= __('store.password') ?></label>
											<input class="form-control" name="password" type="password">
										</div>
										<?php if (isset($googlerecaptcha['client_login']) && $googlerecaptcha['client_login']) { ?>
											<div class="form-group">
												<div class="captch mb-3">
													
													<div class="g-recaptcha" id='client_login'></div>
												</div>
												<input type="hidden" name="captch_response">
											</div>
										<?php } ?>
										
										<div class="form-group">
											<button class="btn btn-custom w-100 mt-3"><?= __('store.login') ?></button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-1 pt-md-5 text-center">
							<h5 class="mt-5 pt-md-5 mb-5 mb-md-0">OR</h5>
						</div>
						<div class="col-md-5">
							<div class="card shadow-sm border-top-card">
								<div class="card-body p-md-5">
									<h5 class="mb-5 display-5"><?= __('store.create_a_new_account') ?></h5>
										<form id="register-form">
											<input class="form-control" name="store_checkout" type="hidden" value="1">
											<div class="form-group">
												<label class="control-label"><?= __('store.first_name') ?></label>
												<input class="form-control" name="f_name" type="text">
											</div>
											<div class="form-group">
												<label class="control-label"><?= __('store.last_name') ?></label>
												<input class="form-control" name="l_name" type="text">
											</div>
											<div class="form-group">
												<label class="control-label"><?= __('store.username') ?></label>
												<input class="form-control" name="username" type="text">
											</div>
										
		
											<div class="form-group">
												<label class="control-label"><?= __('store.email') ?></label>
												<input class="form-control" name="email" type="email">
											</div>
											<link rel="stylesheet" href="<?= base_url('assets/plugins/tel/css/intlTelInput.css') ?>?v=<?= av() ?>">
											<script src="<?= base_url('assets/plugins/tel/js/intlTelInput.js') ?>"></script>
											<input type="hidden" name='<?= $name ?>' id="phonenumber-input" value="" class="form-control" placeholder="Phone Number"  >
											<div class="form-group">
												<label for="">Phone Number</label>
												<div>
													<input id="phone" type="text" name="phone" value="">
												</div>
											</div>
											<script type="text/javascript">
												var tel_input = intlTelInput(document.querySelector("#phone"), {
													initialCountry: "auto",
													utilsScript: "<?= base_url('/assets/plugins/tel/js/utils.js?1562189064761') ?>",
													separateDialCode:true,
													geoIpLookup: function(success, failure) {
													$.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
														var countryCode = (resp && resp.country) ? resp.country : "";
														success(countryCode);
													});
													},
												});
											</script>
											<div class="form-group">
												<label class="control-label"><?= __('store.password') ?></label>
												<input class="form-control" name="password" type="password">
											</div>
											<div class="form-group">
												<label class="control-label"><?= __('store.confirm_password') ?></label>
												<input class="form-control" name="c_password" type="password">
											</div>
											<?php if (isset($googlerecaptcha['client_register']) && $googlerecaptcha['client_register']) { ?>
												<div class="form-group">
													<div class="captch mb-3">
														<div class="g-recaptcha" id='client_register'></div>
													</div>
													<input type="hidden" name="captch_response">
												</div>
											<?php } ?>
		
											<?php if (
												(isset($googlerecaptcha['client_register']) && $googlerecaptcha['client_register']) ||
												(isset($googlerecaptcha['client_login']) && $googlerecaptcha['client_login']) 
											) { ?>
											<script async defer src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit'></script>
											<script type="text/javascript" charset="utf-8">
												var gcaptch = {};
												var onloadCallback = function() {
													var recaptchas = document.querySelectorAll('div[class=g-recaptcha]');
		
													for( i = 0; i < recaptchas.length; i++) {
														gcaptch[recaptchas[i].id] =  grecaptcha.render( recaptchas[i].id, {
														'sitekey' : '<?= $googlerecaptcha['sitekey'] ?>',
														});
													}
												}
											</script>
											<?php } ?>
											<div class="form-group mt-4">
												<button class="btn btn-custom btn-submit w-100 "><?= __('store.register') ?></button>
											</div>
										</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="step-footer"></div>
			</div>
		<?php } ?>
	 
	 	<div class="cart-wrapper mt-5">
			<div class="checkout-setp cart-step  mt-5">
				<div class="step-head  mt-5">
					<h2> <?= __('store.purchase_of_details') ?></h2>
				</div>
				<div class="step-body">
					<div class="cart-loader"></div>
					<div class="cart-body"></div>
				</div>
				<div class="step-footer"></div>
			</div>
	 	</div>

		<div class="non-confirm">
		<?php if($allow_shipping){ ?> 
		<div class="checkout-form">
			<h2><?= __('store.shipping_details') ?></h2>
			<div class="form-checkout-wrapper">

					<div class="checkout-setp shipping-step">
						<div class="step-head">
							<h2></h2>
						</div>
						<div class="step-body">
							<?php if($show_blue_message){ ?>
								<div class="alert alert-info"><?= $shipping_error_message ?></div>
							<?php } ?>
							<?php if(isset($shipping_not_allow_error_message)){ ?>
								<div class="alert alert-danger">
									<?= $shipping_not_allow_error_message ?>
								</div>
							<?php } ?>
							<div class="cart-loader"></div>
							<div class="cart-body"></div>
						</div>
						<div class="step-footer"></div>
					</div>
								
			</div>
		</div>
		<?php } ?>
		</div>				
	
		<div class="non-confirm mt-5">
			<div class="checkout-payments">
				<div class="checkout-setp">
					<div class="step-head">
						<h2><?= __('store.payment_methods') ?></h2>
					</div>
					<div class="step-body">
						<div class="dynamic-payment"></div>
						<br>
						<?php if($allow_upload_file){ ?>
							<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery.uploadPreviewer.css') ?>?v=<?= av() ?>">
							<div class="form-group downloadable_file_div well" style="white-space: inherit;">
								<div class="file-preview-button btn btn-custom">
									<?= __('store.order_upload_file') ?>
									<input type="file" class="downloadable_file_input" multiple="">
								</div>

								<div id="priview-table" class="table-responsive" style="display: none;">
									<table class="table table-hover">
										<tbody></tbody>
									</table>
								</div>
							</div>
						<?php } ?>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="customCheck" name="agree" value="1">
							<label class="custom-control-label" for="customCheck"><?= __('store.agree_text') ?></label>
						</div>
						<br>
						<div class="warning-div"></div>
					</div>
					<div class="step-footer cart-buttons-row">
						<a href="javascript:void(0);" class="btn btn-checoutcart bg-main2 confirm-order"><?= __('store.confirm_and_pay') ?></a>
					</div>
				</div>
			</div>
		</div>

		<div class="confirm-checkout" style="display:none;">
			<div class="checkout-setp confirm-step">
				<div class="step-head">
					<h2><?= __('store.confirm_order') ?></h2>
				</div>
				<div class="step-body">
					<div class="">
						<div id="checkout-confirm"></div>
					</div>
				</div>
				<div class="step-footer"></div>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
	$('[name="payment_method"]').on('change',function(){
		if($(this).val() == 'bank_transfer'){
			$('.bank-transfer-instruction').slideDown();
		}else{
			$('.bank-transfer-instruction').slideUp();
		}
	});
	$(".cart-step").delegate(".btn-remove-cart","click",function(){
		$this = $(this);
		$.ajax({
			url:$this.attr("data-href"),
			type:'POST',
			dataType:'json',
			beforeSend:function(){},
			complete:function(){},
			success:function(json){
				getCart();			

			},
		})
		return false;
	});


	var xhr;
	$(".cart-step").delegate(".qty-input","change",function(){
		if(xhr && xhr.readyState != 4) xhr.abort();

		$this = $(this);
		xhr = $.ajax({
			url:'<?= $cart_update_url ?>',
			type:'POST',
			dataType:'json',
			data:$("#checkout-cart-form").serialize(),
			beforeSend:function(){},
			complete:function(){},
			success:function(json){
				getCart();			
				updateCart();
			},
		})
		return false;
	})

	var cart_xhr;
	function getCart() {
		if(cart_xhr && cart_xhr.readyState !=4) cart_xhr.abort();
		cart_xhr = $.ajax({
			url:'<?= base_url('store/checkout-cart') ?>',
			type:'POST',
			dataType:'html',
			beforeSend:function(){},
			complete:function(){},
			success:function(html){
				$(".cart-step .cart-body").html(html);
			},
		})
	}
	function getShipping() {
		$(".shipping-step .cart-body").load('<?= base_url('store/checkout_shipping') ?>');
	}
	/*function getConfirm() {
		$("#checkout-confirm").load('<?= base_url('store/checkout_confirm') ?>');
	}*/

	function getPaymentMethods(){
		$.ajax({
			url:'<?= base_url('store/get_payment_mothods') ?>',
			type:'POST',
			dataType:'json',
			data:{
				data:$("#checkout-cart-form").serialize(),
			},
			beforeSend:function(){},
			complete:function(){},
			success:function(json){
				$(".dynamic-payment").html(json['html']);
			},
		})
	}
	<?php if(!$allow_shipping){ ?>
		getCart();
	<?php } ?>
	getShipping();getPaymentMethods();
	//getConfirm();
	$('.shipping-step').delegate('[name="country"]',"change",function(){
		$this = $(this);
		$.ajax({
			url:'<?= base_url('store/getState') ?>',
			type:'POST',
			dataType:'json',
			data:{id:$this.val(),checkShipping:true},
			beforeSend:function(){$('[name="state"]').prop("disabled",true);},
			complete:function(){$('[name="state"]').prop("disabled",false);},
			success:function(json){
				$(".shipping-warning").html('');

				var html = '<option value="">Select State</option>';
				$.each(json['states'], function(i,j){
					var s = '';
					if(selected_state && selected_state == j['id']){
						s = 'selected';selected_state = 0;
					}
					html += "<option "+ s +" value='"+ j['id'] +"'>"+ j['name'] +"</option>";
				})
				$('[name="state"]').html(html);

				/*if(json['shipping_error_message'] && json['allow_shipping'] == 0){
					$(".shipping-warning").html('<div class="alert alert-danger">'+ json['shipping_error_message'] +'</div>');
				}*/

				getCart();
			},
		})
	})


	$(".confirm-order").on('click',function(){
		$this = $(this);
		$container = $(".checkout-setp");		 
		var formData = new FormData();

		$container.find("input[type=text],input[type=file],select,input[type=checkbox]:checked,input[type=radio]:checked,textarea").each(function(i,j){
			formData.append($(j).attr("name"),$(j).val());
		})
		if(typeof fileArray != 'undefined'){
			$.each(fileArray, function(i,j){ formData.append("downloadable_file[]", j.rawData); });
		}
	

		formData = formDataFilter(formData);

		$.ajax({
			url:'<?= $base_url ?>confirm_order',
			type:'POST',
			dataType:'json',
			cache:false,
            contentType: false,
            processData: false,
            data:formData,
            xhr: function (){
                var jqXHR = null;

                if ( window.ActiveXObject ){
                    jqXHR = new window.ActiveXObject( "Microsoft.XMLHTTP" );
                }else {
                    jqXHR = new window.XMLHttpRequest();
                }
                
                jqXHR.upload.addEventListener( "progress", function ( evt ){
                    if ( evt.lengthComputable ){
                        var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
                        console.log( 'Uploaded percent', percentComplete );
                        $('.loading-submit').text(percentComplete + "% Loading");
                    }
                }, false );

                jqXHR.addEventListener( "progress", function ( evt ){
                    if ( evt.lengthComputable ){
                        var percentComplete = Math.round( (evt.loaded * 100) / evt.total );
                        $('.loading-submit').text("Save");
                    }
                }, false );
                return jqXHR;
            },
			beforeSend:function(){$this.btn("loading");},
			complete:function(){$this.btn("reset");},
			success:function(result){
				$container.find(".has-error").removeClass("has-error");
				$container.find("span.text-danger,.alert-danger").remove();
				$('.loading-submit').hide();
			

				/*if(result['success']){}
				if(result['location']){
					window.location = result['location']
				}*/
				if(result['confirm']){
					$("#checkout-confirm").html(result['confirm']);
					$(".confirm-checkout").show();
					$(".non-confirm").hide();
				}
				if(result['error']){
					$(".warning-div").html('<div class="alert alert-danger">'+ result['error'] +'</div>');
				}
				if(result['errors']){
				    $.each(result['errors'], function(i,j){
				        $ele = $container.find('[name="'+ i +'"]');
				        if($ele){
				            $ele.parents(".form-group").addClass("has-error");
				            $ele.after("<span class='text-danger'>"+ j +"</span>");
				        }
				    })
				}
			},
		})
	});

	function backCheckout(){
		$("#checkout-confirm").html('');
		$(".confirm-checkout").hide();
		$(".non-confirm").show();
	}

	$("#login-form-cart").on('submit',function(){
		$this = $(this);
		$.ajax({
			url:'<?= $base_url ?>ajax_login',
			type:'POST',
			dataType:'json',
			data:$this.serialize(),
			beforeSend:function(){$this.find(".btn-submit").btn("loading");},
			complete:function(){$this.find(".btn-submit").btn("reset");},
			success:function(result){
				$this.find(".has-error").removeClass("has-error");
				$this.find("span.text-danger").remove();
			

				if(result['success']){
					location = '<?= $checkout_url ?>';
				}

				if(result['errors']){
				    $.each(result['errors'], function(i,j){
				    	if(i=='captch_response'){
				    		if(typeof gcaptch['client_login'] != 'undefined'){
				    			grecaptcha.reset(gcaptch['client_login']);
				    		}
				    	}

				        $ele = $this.find('[name="'+ i +'"]');
				        if($ele){
				            $ele.parents(".form-group").addClass("has-error");
				            $ele.after("<span class='text-danger'>"+ j +"</span>");
				        }
				    })
				}
			},
		})
		return false;
	})
	$("#register-form").on('submit',function(){
		$this = $(this);

		var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
		is_valid = false;
		var errorInnerHTML = '';
		if ($("#phone").val().trim()) {
			if (tel_input.isValidNumber()) {
				is_valid = true;
				$("#phonenumber-input").val("+"+tel_input.selectedCountryData.dialCode + $("#phone").val().trim())
			} else {
				var errorCode = tel_input.getValidationError();
				errorInnerHTML = errorMap[errorCode];
			}
		} else {
			errorInnerHTML = 'The Mobile Number field is required.'
		}
		$("#phone").parents(".form-group").removeClass("has-error");
		$("#register-form .text-danger").remove();

		if(!is_valid){
			$("#phone").parents(".form-group").addClass("has-error");
			$("#phone").parents(".form-group").find('> div').after("<span class='text-danger'>"+ errorInnerHTML +"</span>");
			return false;
		}
	

		$.ajax({
			url:'<?= $base_url ?>ajax_register',
			type:'POST',
			dataType:'json',
			data:$this.serialize(),
			beforeSend:function(){$this.find(".btn-submit").btn("loading");},
			complete:function(){$this.find(".btn-submit").btn("reset");},
			success:function(result){
				$this.find(".has-error").removeClass("has-error");
				$this.find("span.text-danger").remove();
				if(result['success']){
					location = '<?= $checkout_url ?>';
				}
			

				if(result['errors']){
			

				    $.each(result['errors'], function(i,j){
				    	if(i=='captch_response'){
				    		if(typeof gcaptch['client_register'] != 'undefined'){
				    			grecaptcha.reset(gcaptch['client_register']);
				    		}
				    	}

				        $ele = $this.find('[name="'+ i +'"]');
				        if($ele){
				            $ele.parents(".form-group").addClass("has-error");
				            $ele.after("<span class='text-danger'>"+ j +"</span>");
				        }
				    })
				}
			},
		})
		return false;
	})
</script>

<script type="text/javascript">

	$(document).delegate(".cart-counter button","click",function(){
		var val = $(this).parent().find("input").val();
		if($(this).hasClass("plus")) { val ++ }
		else { val -- }
		if(val <= 0) val = 1;
		$(this).parent().find("input").val(val).trigger("change");
	});

	var fileArray = [];
    $('.downloadable_file_input').on('change',function(e){
        $.each(e.target.files, function(index, value){
            var fileReader = new FileReader(); 
            fileReader.readAsDataURL(value);
            fileReader.name = value.name;
            fileReader.rawData = value;
            fileArray.push(fileReader);
        });

        render_priview();
    });

    var getFileTypeCssClass = function(filetype) {
        var fileTypeCssClass;
        fileTypeCssClass = (function() {
            switch (true) {
                case /image/.test(filetype): return 'image';
                case /video/.test(filetype): return 'video';
                case /audio/.test(filetype): return 'audio';
                case /pdf/.test(filetype): return 'pdf';
                case /csv|excel/.test(filetype): return 'spreadsheet';
                case /powerpoint/.test(filetype): return 'powerpoint';
                case /msword|text/.test(filetype): return 'document';
                case /zip/.test(filetype): return 'zip';
                case /rar/.test(filetype): return 'rar';
                default: return 'default-filetype';
            }
        })();
        return fileTypeCssClass;
    };

    function render_priview() {
        var html = '';

        $.each(fileArray, function(i,j){
            html += '<tr>';
            html += '    <td width="70px"> <div class="upload-priview up-'+ getFileTypeCssClass(j.rawData.type) +'" ></div></td>';
            html += '    <td>'+ j.name +'</td>';
            html += '    <td width="70px"><button type="button" class="btn btn-danger btn-sm remove-priview" onClick="removeTr(this)" data-id="'+ i +'" >Remove</button></td>';
            html += '</tr>';
        })

        $("#priview-table tbody").html(html);
        if(html) {
        	$("#priview-table").show();
        } else {
        	$("#priview-table").hide();
        }
    }

    function removeTr(t){
        if(!confirm("Are you sure ?")) return false;

        var index = $(t).attr("data-id");
        fileArray.splice(index,1);
        render_priview()
    }
</script>