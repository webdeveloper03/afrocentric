<div class="card">
	<div class="card-body">
		<form class="form-horizontal" autocomplete="off" method="post" action=""  enctype="multipart/form-data" id="setting-form">
			<div class="row">
				<div class="col-sm-12">
					<div class="tab-content">
						<?php if($this->session->flashdata('success')){?>
							<div class="alert alert-success alert-dismissable"> <?php echo $this->session->flashdata('success'); ?> </div>
						<?php } ?>
						<?php $levels = isset($referlevel['levels']) ? (int)$referlevel['levels'] : 3;  ?>
						<div class="form-group">
							<label class="control-label"><?= __('admin.refer_level') ?></label>
							<select class="form-control" id="referlevel_select" name="referlevel[levels]">
								<option <?= $levels == "1" ? 'selected': '' ?> value="1">1</option>
								<option <?= $levels == "2" ? 'selected': '' ?> value="2">2</option>
								<option <?= $levels == "3" ? 'selected': '' ?> value="3">3</option>
								<option <?= $levels == "4" ? 'selected': '' ?> value="4">4</option>
								<option <?= $levels == "5" ? 'selected': '' ?> value="5">5</option>
								<option <?= $levels == "6" ? 'selected': '' ?> value="6">6</option>
								<option <?= $levels == "7" ? 'selected': '' ?> value="7">7</option>
								<option <?= $levels == "8" ? 'selected': '' ?> value="8">8</option>
								<option <?= $levels == "9" ? 'selected': '' ?> value="9">9</option>
								<option <?= $levels == "10" ? 'selected': '' ?> value="10">10</option>
							</select>
						</div>
								
						<div class="new-comm">
							<div class="table-responsive">
								<table class="table" id="tbl_refer_level">
									<thead>
										<tr>
											<th>Level</th>
											<th>Number of click per commission</th>
											<th>
												Sale Commission 
												<select class="form-control refer-symball-select" name="referlevel[sale_type]">
													<option symbal='%' <?php if($referlevel['sale_type'] == 'percentage') { ?> selected <?php } ?> value="percentage">Percentage(%)</option>
													<option symbal='<?= $CurrencySymbol ?>' <?php if($referlevel['sale_type'] == 'fixed') { ?> selected <?php } ?>  value="fixed">Fixed</option>
												</select>
											</th>
											<th>External Click</th>
											<th>External Action Click</th>
										</tr>
									</thead>
									<tbody>

										<?php for ($level =1; $level <= $levels; $level++) { ?>
											<tr>
												<td><?= $level ?></td>
												<td><input type="number" step="any" name="referlevel_<?= $level ?>[commition]" value="<?php echo ${"referlevel_". $level}['commition'] ?>" class="form-control" /></td>
												<td>
													<div class="input-group">
														<input type="number" step="any" name="referlevel_<?= $level ?>[sale_commition]" value="<?php echo ${"referlevel_". $level}['sale_commition'] ?>" class="form-control" />
														<div class="input-group-append"><span class="input-group-text refer-symball"></span></div>
													</div>
												</td>
												<td>
													<div class="input-group">
														<input type="number" step="any" name="referlevel_<?= $level ?>[ex_commition]" value="<?php echo ${"referlevel_". $level}['ex_commition'] ?>" class="form-control" />
														<div class="input-group-append"><span class="input-group-text"><?= $CurrencySymbol ?></span></div>
													</div>
												</td>
												<td>
													<div class="input-group">
														<input type="number" step="any" name="referlevel_<?= $level ?>[ex_action_commition]" value="<?php echo ${"referlevel_". $level}['ex_action_commition'] ?>" class="form-control" />
														<div class="input-group-append"><span class="input-group-text"><?= $CurrencySymbol ?></span></div>
													</div>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
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
var levels = {};

<?php 
for ($i=1; $i <= 10; $i++) { 
	$v = 'referlevel_'.$i;
	if (isset($$v)) { ?>
			levels['<?= $i ?>'] = <?= json_encode($$v) ?>;
	<?php }
}
?>
$('#referlevel_select').on('change',function(){
var level =  $(this).val();

var html = '';
for(var i = 1; i <= level; i++){
	html += '<tr>';
		html += '<td>'+i+'</td>';
		html += '<td><input type="number" step="any" name="referlevel_'+i+'[commition]" value="'+(levels[i] ? levels[i]['commition'] : '' )+'" class="form-control" /></td>';
		html += '<td><div class="input-group"><input type="number" step="any" name="referlevel_'+i+'[sale_commition]" value="'+(levels[i] ? levels[i]['sale_commition'] : '' )+'" class="form-control" /><div class="input-group-append"><span class="input-group-text refer-symball"></span></div>															</div></td>';
		html += '<td><div class="input-group"><input type="number" step="any" name="referlevel_'+i+'[ex_commition]" value="'+(levels[i] ? levels[i]['ex_commition'] : '' )+'" class="form-control" /><div class="input-group-append"><span class="input-group-text"><?= $CurrencySymbol ?></span></div></div></td>';
		html += '<td><div class="input-group"><input type="number" step="any" name="referlevel_'+i+'[ex_action_commition]" value="'+(levels[i] ? levels[i]['ex_action_commition'] : '' )+'" class="form-control" /><div class="input-group-append"><span class="input-group-text"><?= $CurrencySymbol ?></span></div></div></td>';
	html += '</tr>';
}
$('#tbl_refer_level tbody').html(html);

chnage_teigger();
});
</script>
