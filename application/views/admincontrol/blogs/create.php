<div class="clearfix"></div>
<br>
<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="blog-form">
	<div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="text-center">
						<?= isset($record->id) ?__('admin.edit') :__('admin.create') ?> <?= __('admin.blog') ?>
					</h5>
				</div>
				<div class="card-body">
					<input type="hidden" name="id" value="<?= isset($record->id) ? $record->id : '' ?>">
					<div class="row justify-content-center">
						<div class="col-sm-4 text-center">
							<div class="form-group">
								<label class="control-label"><?= __('admin.image') ?></label>
								<div>
									<img src="<?= $record->image_url ?>" id="featureImage" class="thumbnail" border="0" width="220px">
									<div>
										<div class="fileUpload btn btn-sm btn-primary">
											<span><?= __('admin.choose_file') ?></span>
											<input id="blog_image" name="image" class="upload" type="file">
										</div>
									</div>
									<p class="mt-3 mb-2"><?= __('admin.image_must_be_of_highest_quality') ?></p>
									<p><?= __('admin.image_must_be_minimum_of_1mb') ?></p>
								</div>
							</div>
						</div>
						<div class="col-sm-offset-2 col-sm-8">
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.title') ?></label>
									<input type="text" name="name" class="form-control" value="<?= isset($record->name) ? $record->name : '' ?>" placeholder="<?= __('admin.enter_title_here') ?>">
								</div>
							</div>

							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.blog_category') ?></label>
									<select name="blog_category_id" class="form-control">
										<option value="">-- None --</option>
										<?php foreach ($categories as $key => $value) { ?>
											<option value="<?= $value->id ?>"><?= $value->name ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label"><?= __('admin.description') ?></label>
								<textarea data-height='300' class="form-control summernote-img" name="description"><?= isset($category['description']) ? $category['description'] : '' ?></textarea>
							</div>
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.status') ?></label>
									<select name="status" class="form-control">
										<option value="">-- None --</option>
										<?php foreach ($blogStatus as $key => $value) { ?>
											<option value="<?= $key ?>"><?= __($value) ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group mt-5">
								<button type="submit" class="btn-submit btn-warning btn mb-3 btn-custom c-font-weight-bold" style="width:100%">
									<?= isset($record->id)?__('admin.update'):__('admin.create') ?> <?= __('admin.blog') ?>
								</button>
								<a href="<?= base_url('admin/blog') ?>" class="btn btn-default text-center" style="width:100%">Cancel</a>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	$("#blog_image").on('change',function(event){
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
        var formData = new FormData($("#blog-form")[0]);
        formData = formDataFilter(formData);
        $this = $("#blog-form");

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