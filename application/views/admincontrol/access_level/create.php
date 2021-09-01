<div class="clearfix"></div>
<br>
<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="access-level-form">
	<div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="text-center">
						<?php
						if(isset($record->id))
							echo __('admin.edit').' '.__('admin.access_level');
						else 
							echo __('admin.create').' '.__('admin.access_level');
						?>
					</h5>
				</div>
				<div class="card-body">
					<input type="hidden" name="id" value="<?= isset($record->id) ? $record->id : '' ?>">
					<div class="row justify-content-center">
						<div class="col-sm-offset-2 col-sm-8">
							<?php if(isset($record->id)) { ?>
								<div class="row mt-3 mb-5">
									<div class="col-sm-12 col-md-5 col-lg-3 text-center">
										<div class="rounded-circle bg-warning" style="width:100px;height:100px;margin: auto;">
											<i class="mdi mdi-lock mdi-48px" style="margin-top: 25%;"></i>
										</div>
									</div>
									<div class="col-sm-12 col-md-7 col-lg-9">
										<h6>
											<?= $record->name ?>
										</h6>
									</div>
								</div>
								<input type="hidden" name="name" value="<?= $record->name ?>" >
							<?php } else { ?>
								<div class="form-group">
									<div class="form-control custom-form-control">
										<label class="control-label"><?= __('admin.access_level_name') ?></label>
										<input type="text" name="name" class="form-control" value="<?= isset($record->name) ? $record->name : '' ?>" placeholder="<?= __('admin.enter_title_here') ?>">
									</div>
								</div>
							<?php } ?>

							<h5 class="mb-3"><?= __('admin.permissions') ?></h5>
							<?php 
							$modules = $this->config->item('modules');
							$permissions = $this->config->item('permissions');
							$permissionsArr = [];
							if(isset($record->id)){
								$modulesArr = json_decode($record->permission, true);
							}

							foreach($modules as $key => $value) {
								?>
								<div class="row pb-2">
									<div class="col-sm-12 col-md-5 col-lg-3">
										<label class="control-label" style="width: 100%;border-bottom: 1px solid;">
											<?= $value ?>
										</label>
									</div>
									<div class="col-sm-12 col-md-5 col-lg-9 mt-2">
										<?php foreach($permissions as $pKey => $pValue) {
											$checked = ''; 
											if(array_key_exists($key,$modulesArr)){
												$permissionsArr = explode(',',$modulesArr[$key]);
												if(in_array($pKey,$permissionsArr)){
													$checked = 'checked="checked"'; 
												}
											}
											?>
											<div class="form-check form-check-inline">
												<input class="form-check-input" type="checkbox" value="<?= $pKey ?>" id="<?= $key.$pKey ?>" name="permission[<?= $key ?>][]" <?= $checked ?>>
												<label class="form-check-label" for="<?= $key.$pKey ?>">
													<?= $pValue ?>
												</label>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
							<div class="form-group mt-5">
								<button type="submit" class="btn-submit btn-warning btn btn-custom-popup">
									<?= isset($record->id)?__('admin.update'):__('admin.create') ?> <?= __('admin.access_level') ?>
								</button>
								<a href="<?= base_url('admin/accesslevel') ?>" class="btn btn-default text-center" style="width:100%">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	$(".btn-submit").on('click',function(evt){
        evt.preventDefault();
        var formData = new FormData($("#access-level-form")[0]);
        formData = formDataFilter(formData);
        $this = $("#access-level-form");

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
				