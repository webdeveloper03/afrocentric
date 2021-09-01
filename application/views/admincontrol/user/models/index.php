<div class="clearfix"></div>
<br>

<div class="card m-b-10">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="input-group">
					<input type="text" class="form-control bb-form-control" placeholder="Search here" id="searchKey" value="<?= $searchKey ?>">
					<div class="input-group-append">
						<span class="input-group-text bb-input-group-text cursor-pointer" onClick="filterData()">
							<i class="fa fa-search"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-8 col-lg-6">
				
			</div>
			<div class="col-sm-12 col-md-4 col-lg-2">
				<?php
					$orderOptions = [
						0 => 'A - Z',
						1 => 'Z - A',
					];
				?>
				<select class="form-control1 dropdown-toggle nb-form-control" onChange="changeOrder()" id="changeOrderId">
					<?php
					foreach($orderOptions as $key => $value){ 
						$selected = '';
						if($key == $orderBy){
							$selected = 'selected="selected"';
						}
						?>
						<option value="<?= $key ?>" <?= $selected ?> >
							<?= $value ?>
						</option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
</div>

<?php /*<div class="row">
    <div class="col-12">
        <div class="m-b-10">
            <?php foreach( range('A', 'Z') as $key => $elements) { ?> 
                <span class="alpha-char m-1 mr-2 <?= ($key ===0?'active':'') ?>">
                    <?= $elements ?> 
                </span>
            <?php }  ?>
        </div> 
    </div>
</div>*/ ?>

<?php if($this->session->flashdata('success')){?>								
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('success'); ?> 
    </div>
<?php } ?>	
<?php if($this->session->flashdata('error')){?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('error'); ?> 
    </div>
<?php } ?>

<div class="dimmer">
	<div class="loader"></div>
	<div class="dimmer-content">
		<div class=" grid-user">
        </div>
	</div>
</div>
	
<div class="card-footer text-right" style="display: none;"> 
    <div class="pagination"></div> 
</div>

<div class="modal fade" id="acceptModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="acceptUserForm">
                    <div class="row justify-content-center mb-5">
                        <div class="col-sm-offset-3 col-sm-8">                  
                            <h5 class="text-center"><?= __('admin.accept') ?> <?= __('admin.models_application') ?></h5>
                            <p class="text-center"><?= __('admin.accept_model_application_title') ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9 c-font-weight-bold">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="user_id" id="a_user_id" value="">
                            <input type="hidden" name="type" value="model">
                            <button type="submit" class="accept-submit btn-success btn mb-4 btn-custom c-font-weight-bold" style="width:100%"><?= __('admin.accept') ?> <?= __('admin.application') ?></button>
                            <p class="text-center" data-dismiss="modal">
                                <span class="cursor-pointer"><?= __('admin.cancel') ?></span>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="rejectModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="rejectUserForm">
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-3 col-sm-8">                  
                            <h5 class="text-center"><?= __('admin.reject') ?> <?= __('admin.application') ?></h5>
                            <p class="text-center"><?= __('admin.reject_application_model_title') ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9">
                            <div class="form-group">
                                <div class="form-control custom-form-control">
                                    <label class="control-label"><?= __('admin.why_do_you_want_to_reject_the_models_application') ?></label>
                                    <input type="text" name="status_reason" class="form-control" placeholder="<?= __('admin.reason') ?>">
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9 c-font-weight-bold">
                            <input type="hidden" name="status" value="3">
                            <input type="hidden" name="user_id" id="r_user_id" value="">
                            <input type="hidden" name="type" value="model">
                            <button type="submit" class="reject-submit btn-danger btn mb-4 btn-custom c-font-weight-bold" style="width:100%"><?= __('admin.reject') ?> <?= __('admin.application') ?></button>
                            <p class="text-center" data-dismiss="modal">
                                <span class="cursor-pointer"><?= __('admin.cancel') ?></span>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getPage(page,t) {
        $this = $(t);
        var data ={
            page:page,
            searchKey:$("#searchKey").val(),
            order:$("#changeOrderId").val()
        }
        $.ajax({
            url:'<?= $currentListUrl ?>' + page,
            type:'POST',
            dataType:'json',
            data:data,
            beforeSend:function(){
                $this.btn("loading");
                $(".dimmer").addClass("active");
            },
            complete:function(){
                $this.btn("reset");
                $(".dimmer").removeClass("active");
            },
            success:function(json){
                $(".grid-user").html(json['html']);
                $(".card-footer").hide();
                
                if(json['pagination']){
                    $(".card-footer").show();
                    $(".card-footer .pagination").html(json['pagination'])
                }
            },
        })
    }

    $(".card-footer .pagination").delegate("a","click", function(e){
        e.preventDefault();
        getPage($(this).attr("data-ci-pagination-page"),$(this));
    });

    getPage(1)

    function filterData(){
        getPage(1);
    }

    function changeOrder(){
        getPage(1);
    }

    $(".accept-submit").on('click',function(evt){
        evt.preventDefault();
        chnageStatus('acceptUserForm','accept-submit');
        return false;
    });
	$(".reject-submit").on('click',function(evt){
        evt.preventDefault();
        chnageStatus('rejectUserForm', 'reject-submit');
        return false;
    });

    function chnageStatus(formId, btnClass) {
        var formData = new FormData($("#"+formId)[0]);
        formData = formDataFilter(formData);
        $this = $("#"+formId);

        $("."+btnClass).btn("loading");
        
        $.ajax({
            url:'<?= base_url('admin/user/changeStatus') ?>',
            type:'POST',
            dataType:'json',
            cache:false,
            contentType: false,
            processData: false,
            data:formData,
            error:function(){$("."+btnClass).btn("reset");},
            success:function(result){
                $("."+btnClass).btn("reset");
                $this.find(".has-error").removeClass("has-error");
                $this.find("span.text-danger").remove();
                
                if(result['location']){
                    let modelId = '#acceptModal';
                    toastr.success(result['message']);
                    if(btnClass=='reject-submit') modelId = '#rejectModal';
                    $(modelId).modal('hide');
                    var page = 1;
                    if($('.card-footer .pagination strong').length>0){
                        page = $('.card-footer .pagination strong').html();
                    }
                    getPage(page); 
                }

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
    }

    function acceptProfile(userId){
        $("#a_user_id").val(userId);
        $('#acceptModal').modal('show');
    }

    function rejectProfile(userId){
        $("#r_user_id").val(userId);
        $('#rejectModal').modal('show');
    }
</script>