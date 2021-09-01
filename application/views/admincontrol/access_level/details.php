<div class="row">
    <div class="col-lg-12 col-md-12">
        <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-success alert-dismissable my_alert_css">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('error')){?>
            <div class="alert alert-danger alert-dismissable my_alert_css">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>
    </div>
</div>
        
<div class="row">
    <div class="col-12">
        <?php if ($record == null) {?>
            <div class="card m-b-30">
                <div class="card-body"> 
                    <div class="text-center">
                        <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;">
                        <h3 class="m-t-40 text-center text-muted"><?= __('admin.no') ?> <?= __('admin.access_levels') ?></h3>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="card m-t-15 <?= ($record->status==2)? 'blocked-user':'' ?>">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-sm-12 col-md-1 text-center mb-2">
                            <div class="detail-back-arrow rounded-circle" style="margin: auto;">
                                <a class="text-white" href="<?= base_url();?>admin/accesslevel">
                                    <i class="mdi-24px mdi mdi-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-2 text-center">
                            <div class="rounded-circle bg-warning" style="width:100px;height:100px;margin: auto;">
                                <i class="mdi mdi-lock mdi-48px" style="margin-top: 25%;"></i>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="font-weight-bold">
                                       <?= $record->name ?>
                                    </h5>
                                </div>
                            </div>
                            <?php
								$permissionsArr = json_decode($record->permission, true);
                                $modules = $this->config->item('modules');
							    $permissions = $this->config->item('permissions');
                                foreach($permissionsArr as $key => $value){ 
                                    $perArr = explode(',',$value);
                                    $perStrArr = [];
                                    foreach ($perArr as $val) {
                                        array_push($perStrArr,$permissions[$val]);
                                    }
                                    ?>
                                    <div class="row small-text mb-2">
                                        <div class="col-md-3">
                                            <span class="c-font-weight-bold"><?= $modules[$key] ?></span>
                                        </div>
                                        <div class="col-md-9">
                                            <span>
                                                <?= implode(' + ',$perStrArr) ?>
                                            </span>
                                        </div>
                                    </div>
                                <?php }
							?>
                            <div class="row m-t-30 m-b-15 justify-content-center">
                                <div class="col-sm-offset-1 col-sm-10">
                                    <a href="<?= base_url('admin/accesslevel/create/'. $record->id) ?>" class="btn btn-warning c-btn-custom mr-4 mb-1">
                                        <i class="mdi mdi-account mr-1"></i>
                                        <?= __('admin.edit') ?> <?= __('admin.access_level') ?>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-danger c-btn-custom" data-toggle="modal" data-target="#deleteModal">
                                        <i class="fa fa-close mr-1"></i>
                                        <?= __('admin.delete') ?> <?= __('admin.access_level') ?>
                                    </a>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="row m-t-15">
                        <div class="col-sm-12 text-center">
                            <h6>
                                <span class="header_logs_title"><?= __('admin.users') ?></span>
                            </h6>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="row m-b-15 justify-content-center">
                <div class="col-sm-offset-1 col-sm-10">
                    <div class="card pt-2" style="border: 2px solid #c5c5c5; border-top:unset">
                        <div class="card-body">
                            <div class="dimmer">
                                <div class="loader"></div>
                                <div class="dimmer-content">
                                    <div class="row grid-category"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right" style="display: none;"> <div class="pagination"></div> </div>
                    </div>
                </div>
            </div>
        <?php }  ?>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>

<style>
    .grid-category .card{
        box-shadow: 0 0 6px 1px rgb(0 0 0 / 22%);
        border-radius: 10px;
    }
</style>

<div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-3 col-sm-8">                  
                            <h5 class="text-center"><?= __('admin.delete') ?> <?= __('admin.access_level') ?></h5>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9">
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
                                    <p class="mb-0 pt-4">
                                        <?= __('admin.if_you_delete_this_it_cannot_be_undone') ?>
                                    </p>
                                    <p>
                                        <?= __('admin.delete_title') ?> <?= ucfirst($record->name) ?>?
                                    </p>
                                </div>
                            </div>             
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9 c-font-weight-bold">
                            <a href="<?= base_url('admin/accesslevel/delete/'.$record->id) ?>" class="btn-danger btn mb-4 btn-custom c-font-weight-bold" style="width:100%"><?= __('admin.delete') ?> <?= __('admin.access_level') ?></a>
                            <p class="text-center" data-dismiss="modal">
                                <span class="cursor-pointer"><?= __('admin.cancel') ?></span>
                            </p>
                        </div>
                    </div>
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
			order:$("#changeOrderId").val(),
			access_level_id:<?= $record->id ?>,
		}
		$.ajax({
			url:'<?= base_url("admin/admin/index") ?>/' + page,
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
				$(".grid-category").html(json['html']);
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
</script>