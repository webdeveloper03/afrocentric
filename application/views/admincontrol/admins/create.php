<div class="clearfix"></div>
<br>
<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="category-form">
	<div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="text-center">
						<?php 
						if(isset($record->id)){
							echo __('admin.edit').' '.__('admin.admin');
						} else {
							echo __('admin.create').' '.__('admin.admin');
						}
						?>
					</h5>
				</div>
				<div class="card-body">
					<input type="hidden" name="id" value="<?= isset($record->id) ? $record->id : '' ?>">
					<div class="row justify-content-center">
						<div class="col-sm-offset-2 col-sm-8">
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.first_name') ?></label>
									<input type="text" name="firstname" class="form-control" value="<?= $record->firstname ?>" placeholder="<?= __('admin.enter_your_first_name') ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.last_name') ?></label>
									<input type="text" name="lastname" class="form-control" value="<?= $record->lastname ?>" placeholder="<?= __('admin.enter_your_last_name') ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.your_email') ?></label>
									<input type="email" name="email" class="form-control" value="<?= $record->email ?>" placeholder="<?= __('admin.enter_your_email_address') ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.role') ?></label>
									<select name="type" class="form-control pl-2" disabled>
										<option value="admin"><?= __('admin.admin') ?></option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.access_level') ?></label>
									<select name="access_level_id" class="form-control">
										<option value="">-- None --</option>
										<?php foreach ($accessLevels as $key => $value) { 
											$selected = '';
											if($value->id == $record->access_level_id) {
												$selected = 'selected="selected"';
											}
											?>
											<option value="<?= $value->id ?>" <?= $selected ?>><?= $value->name ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.user_id') ?></label>
									<input type="text" name="username" class="form-control" value="<?= $record->username ?>" placeholder="<?= __('admin.enter_username_address') ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.password') ?></label>
									<input type="password" name="password" class="form-control" placeholder="<?= __('admin.password') ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.confirm_password') ?></label>
									<input type="password" name="cpassword" class="form-control" placeholder="<?= __('admin.confirm_password') ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label"><?= __('admin.member_image') ?></label>
								<div>
									<?php 
									$image = $record->avatar_url != '' ? $record->avatar_url : base_url('/assets/images/no_image_available.png'); 
									?>
									<img src="<?= $image ?>" id="featureImage" class="thumbnail" border="0" width="220px">
									<div>
										<div class="fileUpload btn btn-sm btn-primary">
											<span><?= __('admin.choose_file') ?></span>
											<input id="uploadBtn" name="avatar" class="upload" type="file">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group mt-5">
								<button type="submit" class="btn-submit btn-warning btn mb-3 btn-custom c-font-weight-bold" style="width:100%">
									<?= isset($record->id)?__('admin.update'):__('admin.create') ?> <?= __('admin.admin') ?>
								</button>
								<a href="<?= base_url('admin/admin') ?>" class="btn btn-default text-center" style="width:100%">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	$("#uploadBtn").on('change',function(event){
		if (this.files && this.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#featureImage').attr('src', e.target.result);
			}
			reader.readAsDataURL(this.files[0]);
		}
	})

	$(".btn-submit").on('click',function(evt){
        evt.preventDefault();
        var formData = new FormData($("#category-form")[0]);
        formData = formDataFilter(formData);
        $this = $("#category-form");

        $(".btn-submit").btn("loading");
        
        $.ajax({
            type:'POST',
            dataType:'json',
            cache:false,
            contentType: false,
            processData: false,
            data:formData,
            error:function(){$(".btn-submit").btn("reset");},
            success:function(result){
                $(".btn-submit").btn("reset");
                $this.find(".has-error").removeClass("has-error");
                $this.find("span.text-danger").remove();
                
                if(result['location']){ window.location = result['location']; }

                if(result['errors']){
                    $.each(result['errors'], function(i,j){
                        $ele = $this.find('[name="'+ i +'"]');
                        if($ele){
                            $ele.parents(".form-group").addClass("has-error");
                            $ele.after("<span class='text-danger'>"+ j +"</span>");
                        }
                    });
                }
            },
        })
        return false;
    });
</script>
				