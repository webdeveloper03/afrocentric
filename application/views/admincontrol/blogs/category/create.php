<div class="clearfix"></div>
<br>
<form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="category-form">
	<div class="row">
		<div class="col-12">
			<div class="card m-b-30">
				<div class="card-header">
					<h5 class="text-center">
						<?= isset($record->id) ?__('admin.edit') :__('admin.create') ?> <?= __('admin.blog_category') ?>
					</h5>
				</div>
				<div class="card-body">
					<input type="hidden" name="id" value="<?= isset($record->id) ? $record->id : '' ?>">
					<div class="row justify-content-center">
						<div class="col-sm-offset-2 col-sm-8">
							<div class="form-group">
								<label class="control-label"><?= __('admin.category_name') ?></label>
								<input type="text" name="name" class="form-control" value="<?= isset($record->name) ? $record->name : '' ?>" placeholder="<?= __('admin.enter_name_here') ?>">
							</div>
							<div class="form-group mt-5">
								<button type="submit" class="btn-submit btn-warning btn mb-3 btn-custom c-font-weight-bold" style="width:100%">
									<?= isset($record->id)?__('admin.update'):__('admin.create') ?> <?= __('admin.category') ?>
								</button>
								<a href="<?= base_url('admin/blog/category') ?>" class="btn btn-default text-center" style="width:100%">Cancel</a>
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
				