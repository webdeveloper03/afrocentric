<div class="card">
	<div class="card-body">
		<form class="form-horizontal" autocomplete="off" method="post" action=""  enctype="multipart/form-data" id="setting-form">
			<div class="row">
				<div class="col-sm-12">
					<div class="tab-content">
						<?php if($this->session->flashdata('success')){?>
							<div class="alert alert-success alert-dismissable"> <?php echo $this->session->flashdata('success'); ?> </div>
						<?php } ?>
						<div class="form-group">
							<label class="control-label">Status</label>
							<div class="radio-group">
								
								<label class="radio radio-inline"><input type="radio" class="referlevel_status" <?= (int)$referlevel['status'] == 
									1 ? 'checked' : '' ?> name="referlevel[status]" value="1" > Enable </label>
								
								
								<label class="radio radio-inline"><input type="radio" class="referlevel_status" <?= (int)$referlevel['status'] == 
									0 ? 'checked' : '' ?> name="referlevel[status]" value="0" > Disable </label>
								
								
								<label class="radio radio-inline"><input type="radio" class="referlevel_status" <?= (int)$referlevel['status'] == 
									2 ? 'checked' : '' ?> name="referlevel[status]" value="2" > Disable Only For Selected Users </label>
							</div>

							<div class="div-toggle status-1">
								<div class="well">
									<div class="m-0 alert alert-info">Enable For all Users</div>
								</div>
							</div>
							<div class="div-toggle status-0">
								<div class="well">
									<div class="m-0 alert alert-info">Disable For all Users</div>
								</div>
							</div>
							<div class="div-toggle status-2">
								<div class="well">
									<div class="alert alert-info">Disable only for selected users</div>
									<?php
										$_selected = json_decode( (isset($referlevel['disabled_for']) ? $referlevel['disabled_for'] : '[]') , 1);
									?>
									<div style="max-height: 200px;overflow: auto;">
										<ul class="list-unstyled">
											<?php foreach ($users_list as $key => $value) { ?>
												<li>
													<div class="checkbox">
														<label><input <?= in_array($value['id'], $_selected) ? 'checked' : '' ?> type="checkbox" name="referlevel[disabled_for][]" value="<?= $value['id'] ?>"> &nbsp; <?= $value['name'] ?></label>
													</div>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>

							<script type="text/javascript">
								$('.referlevel_status').on('change',function(){
									$(".div-toggle").hide();
									$(".div-toggle.status-"+ $('.referlevel_status:checked').val()).show();
								})

								$('.referlevel_status:checked').trigger('change')
							</script>
						</div>
						<br>
						<div class="form-group">
							<label class="control-label"><?= __('admin.local_store_refer_sale_commission') ?></label>
							<select class="form-control" name="referlevel[autoacceptlocalstore]">
								<option value="0">On Hold</option>
								<option value="1" <?= $referlevel['autoacceptlocalstore'] ? 'selected' : '' ?>>In Wallet</option>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label"><?= __('admin.external_store_refer_sale_commission') ?></label>
							<select class="form-control" name="referlevel[autoacceptexternalstore]">
								<option value="0">On Hold</option>
								<option value="1" <?= $referlevel['autoacceptexternalstore'] ? 'selected' : '' ?>>In Wallet</option>
							</select>
						</div>

						<div class="form-group">
							<label class="control-label"><?= __('admin.action_refer_commission') ?></label>
							<select class="form-control" name="referlevel[autoacceptaction]">
								<option value="0">On Hold</option>
								<option value="1" <?= $referlevel['autoacceptaction'] ? 'selected' : '' ?>>In Wallet</option>
							</select>
						</div>
						
						<div class="form-group">
							<label class="control-label">Show Sponser</label>
							<select class="form-control" name="referlevel[show_sponser]">
								<option value="">Show Admin As Sponser</option>
								<option <?= $referlevel['show_sponser'] == 'none' ? 'selected' : '' ?> value="none">Not Show</option>
								<option <?= $referlevel['show_sponser'] == 'real_sponser' ? 'selected' : '' ?> value="real_sponser">Real Sponser</option>
							</select>
						</div>
						<div class="form-group">
							<label  class="control-label">Sponser Name</label>
							<input name="referlevel[sponser_name]" value="<?php echo $referlevel['sponser_name']; ?>" class="form-control" type="text">
						</div>

						<?php if(false){ ?>
						<div class="commi-cube">
							<div class="row">
								<div class="col-sm-3">
									<div class="comm-cube-box">
										<div class="form-group">
											<label  class="control-label"><?= __('admin.no_of_click_per_commission') ?></label>
											<input name="referlevel[click]" value="<?php echo $referlevel['click']; ?>" class="form-control" step="any" type="number" placeholder='<?= __('admin.no_of_click_per_commission') ?>'>
										</div>
										<?php foreach (array('1','2','3') as $key => $v) { ?>
											<fieldset>
												<legend><?= __('admin.level') ?> <?= $v ?>:</legend>
												
													<div class="form-group">
														<label  class="control-label"><?= __('admin.refer_setting_click_commission') ?> (<?= $CurrencySymbol ?></span>)</label>
														<input name="referlevel_<?php echo $v ?>[commition]" value="<?php echo ${"referlevel_$v"}['commition']; ?>" class="form-control" step="any" type="number">
													</div>
											</fieldset>
										<?php } ?>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="comm-cube-box">
										<div class="form-group">
											<label  class="control-label"><?= __('admin.fix_amount_or_per') ?></label>
											<select class="form-control refer-symball-select" name="referlevel[sale_type]">
												<option symbal='%' <?php if($referlevel['sale_type'] == 'percentage') { ?> selected <?php } ?> value="percentage">Percentage(%)</option>
												<option symbal='<?= $CurrencySymbol ?>' <?php if($referlevel['sale_type'] == 'fixed') { ?> selected <?php } ?>  value="fixed">Fixed</option>
											</select>
										</div>
										<?php foreach (array('1','2','3') as $key => $v) { ?>
											<fieldset>
												<legend><?= __('admin.level') ?> <?= $v ?>:</legend>
													<div class="form-group">
														<label  class="control-label"><?= __('admin.refer_setting_sale_commission') ?> (<span class="refer-symball"></span>)</label>
														<input name="referlevel_<?php echo $v ?>[sale_commition]" value="<?php echo ${"referlevel_$v"}['sale_commition']; ?>" class="form-control" step="any" type="number">
													</div>
											</fieldset>
										<?php } ?>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="comm-cube-box">
										<div class="form-group">
											<label  class="control-label">External Click</label>
											<input name="referlevel[ex_click]" value="<?php echo $referlevel['ex_click']; ?>" class="form-control" step="any" type="number" placeholder='External Click'>
										</div>
										<?php foreach (array('1','2','3') as $key => $v) { ?>
											<fieldset>
												<legend><?= __('admin.level') ?> <?= $v ?>:</legend>
													<div class="form-group">
														<label  class="control-label">External Click Commission  (<?= $CurrencySymbol ?></span>)</label>
														<input name="referlevel_<?php echo $v ?>[ex_commition]" value="<?php echo ${"referlevel_$v"}['ex_commition']; ?>" class="form-control" step="any" type="number">
													</div>
											</fieldset>
										<?php } ?>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="comm-cube-box">
										<div class="form-group">
											<label  class="control-label">External Action Click</label>
											<input name="referlevel[ex_action_click]" value="<?php echo $referlevel['ex_action_click']; ?>" class="form-control" step="any" type="number" placeholder='External Action Click'>
										</div>
										<?php foreach (array('1','2','3') as $key => $v) { ?>
											<fieldset>
												<legend><?= __('admin.level') ?> <?= $v ?>:</legend>
													<div class="form-group">
														<label  class="control-label">External Action Click Commission  (<?= $CurrencySymbol ?></span>)</label>
														<input name="referlevel_<?php echo $v ?>[ex_action_commition]" value="<?php echo ${"referlevel_$v"}['ex_action_commition']; ?>" class="form-control" step="any" type="number">
													</div>
											</fieldset>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>

						<script type="text/javascript">
							function chnage_teigger() {
								var symbal = $(".refer-symball-select").find("option:selected").attr("symbal");
								$(".refer-symball").html(symbal);
							}
							$(".refer-symball-select").change(chnage_teigger)
							chnage_teigger();
						</script>
					</div>
				</div>
				<div class="col-sm-12 text-right">
					<button type="submit" class="btn btn-sm btn-primary btn-submit"><?= __('admin.save_settings') ?></button>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
$("#setting-form").on('submit',function(){
	$("#setting-form .alert-error").remove();
	var affiliate_cookie = parseInt($(".input-affiliate_cookie").val());
	if(affiliate_cookie <= 0 || affiliate_cookie > 365){
		$(".input-affiliate_cookie").after("<div class='alert alert-danger alert-error'>Days Between 1 and 365</div>");
	}
	if($("#setting-form .alert-error").length == 0) return true;
	return false;
})
$(".btn-submit").on('click',function(evt){
	evt.preventDefault();
	var formData = new FormData($("#setting-form")[0]);
	$(".btn-submit").btn("loading");
	formData = formDataFilter(formData);
	$this = $("#setting-form");

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
	        $this.find("span.text-danger").remove();
	        
	        if(result['location']){
	            window.location = result['location'];
	        }

	        if(result['success']){
	            $(".tab-content").prepend('<div class="alert mt-4 alert-info alert-dismissable">'+ result['success'] +'</div>');
	            var body = $("html, body");
				body.stop().animate({scrollTop:0}, 500, 'swing', function() { });
	        }

	        if(result['errors']){
	            $.each(result['errors'], function(i,j){
	                $ele = $this.find('[name="'+ i +'"]');
	                if($ele){
	                    $ele.parents(".form-group").addClass("has-error");
	                    $ele.after("<span class='d-block text-danger'>"+ j +"</span>");
	                }
	            });
	        }
	    },
	})
	return false;
});
</script>
