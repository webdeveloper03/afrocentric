<div class="clearfix"></div>
<br>
<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="category-form">
	<div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="text-center"><?= isset($record->id)?__('admin.edit_category'):__('admin.add_category') ?></h5>
				</div>
				<div class="card-body">
					<input type="hidden" name="category_id" value="<?= isset($record->id) ? $record->id : '' ?>">
					<div class="row justify-content-center">
						<div class="col-sm-offset-2 col-sm-8">
							<div class="form-group">
								<label class="control-label"><?= __('admin.image') ?></label>
								<div>
									<img src="<?= $record->image_url ?>" id="featureImage" class="thumbnail" border="0" width="220px">
									<div>
										<div class="fileUpload btn btn-sm btn-primary">
											<span><?= __('admin.choose_file') ?></span>
											<input id="category_image" name="category_image" class="upload" type="file">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-control custom-form-control">
									<label class="control-label"><?= __('admin.category_name') ?></label>
									<input type="text" name="name" class="form-control" value="<?= isset($record->name) ? $record->name : '' ?>" placeholder="<?= __('admin.enter_title_here') ?>">
								</div>
							</div>

							<?php /*<div class="form-group">
								<label class="control-label"><?= __('admin.parent_category') ?></label>
								<select name="parent_id" class="form-control">
									<option value="">-- None --</option>
									<?php foreach ($categories as $key => $value) { ?>
										<option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label class="control-label"><?= __('admin.description') ?></label>
								<textarea data-height='300' class="form-control summernote-img" name="description"><?= isset($category['description']) ? $category['description'] : '' ?></textarea>
							</div>
							<div class="form-group">
								<label  class="control-label"><?= __('admin.heading_text_color') ?></label>
								<input  name="color" value="<?php echo $category['color']; ?>" class="form-control jscolor" data-jscolor type="text">
							</div>
							<div class="form-group">
								<label class="control-label">Display as Tag</label>
								<div class="radio">
								    <label><input type="radio" name="tag" value="1" <?php if(!isset($category['tag']) || $category['tag'] == 1){ ?>checked="checked"<?php } ?>> Enable</label>
								    <label><input type="radio" name="tag" value="0" <?php if(isset($category['tag']) && $category['tag'] == 0){ ?>checked="checked"<?php } ?>> Disable</label> &nbsp;
								</div>
							</div> */ ?>
							<div class="form-group mt-5">
								<button type="submit" class="btn-submit btn-warning btn mb-3 btn-custom c-font-weight-bold" style="width:100%">
									<?= isset($record->id)?__('admin.update'):__('admin.create') ?> <?= __('admin.category') ?>
								</button>
								<a href="<?= base_url('admin/category') ?>" class="btn btn-default text-center" style="width:100%">Cancel</a>
							</div>
						</div>
						<?php /*<div class="col-sm-4">
							<div class="form-group">
								<label class="control-label"><?= __('admin.image') ?></label>
								<div>
									<?php $category_image = $record->image != '' ? 'assets/images/product/upload/thumb/' . $record->image : 'assets/images/no_image_available.png'; ?>
									<img src="<?php echo base_url($category_image); ?>" id="featureImage" class="thumbnail" border="0" width="220px">
									<div>
										<div class="fileUpload btn btn-sm btn-primary">
											<span><?= __('admin.choose_file') ?></span>
											<input id="category_image" name="category_image" class="upload" type="file">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label"><?= __('admin.background_image') ?></label>
								<div>
									<?php $category_background_image = $category['background_image'] != '' ? 'assets/images/product/upload/thumb/' . $category['background_image'] : 'assets/images/no_image_available.png'; ?>
									<img src="<?php echo base_url($category_background_image); ?>" id="featureBackgroundImage" class="thumbnail" border="0" width="220px">
									<div>
										<div class="fileUpload btn btn-sm btn-primary">
											<span><?= __('admin.choose_file') ?></span>
											<input id="category_background_image" name="category_background_image" class="upload" type="file">
										</div>
									</div>
								</div>
							</div>
						</div> */ ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
	$("#category_image").on('change',function(event){
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
				