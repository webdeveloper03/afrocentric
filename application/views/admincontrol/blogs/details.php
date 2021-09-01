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
                        <h3 class="m-t-40 text-center text-muted"><?= __('admin.no') ?> <?= __('admin.blog') ?></h3>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="card m-t-15">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <a class="detail-back-arrow rounded-circle m-0" href="<?= base_url();?>admin/blog">
                                <i class="mdi-24px mdi mdi-arrow-left"></i>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-12 text-center">
                            <h4><?= $record->name ?></h4>
                        </div>
                        <div class="col-sm-12 col-md-12 text-center">
                            <div class="m-3">
                                <span class="mr-3"><i class="mdi mdi-bookmark mdi-18px"></i> <?= $record->blog_category_name ?></span>
                                <span class="mr-3"><i class="mdi mdi-calendar mdi-18px"></i> <?= c_date($record->created_at) ?></span>
                                <span class="mr-3">
                                    <a href="<?= base_url('admin/blog/create/'. $record->id) ?>" class="text-success">
                                        <i class="mdi mdi-pencil mdi-18px"></i>
                                        <?= __('admin.edit') ?> <?= __('admin.blog') ?>
                                    </a>
                                </span>
                                <span class="mr-3">
                                    <a href="javascript:void(0)" class="text-danger" data-toggle="modal" data-target="#deleteModal">
                                            <i class="fa fa-close mr-1"></i>
                                            <?= __('admin.delete') ?> <?= __('admin.blog') ?>
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 text-center mt-3 mb-3">
                            <div class="">
                                <img src="<?= $record->image_url ?>" alt="img"  style='max-width: 90%;/*max-height: 600px;*/'>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 pt-4">
                            <?= nl2br($record->description,50) ?>
                        </div>
                    </div>
                    <div class="row m-t-15">
                        <div class="col-sm-12 text-center">
                            <h6>
                                <span class="header_logs_title"><?= __('admin.comments') ?></span>
                            </h6>
                        </div>
                    </div>
                </div>                
            </div>
            <div class="row m-b-15 justify-content-center">
                <div class="col-sm-offset-1 col-sm-10">
                    <div class="card pt-2" style="border: 2px solid #c5c5c5; border-top:unset">
                        <div class="card-body">
                            <?php for($i=0; $i<=7; $i++) { ?>
                                <div class="row mr-0 ml-0 mb-3 logs-item">
                                    <div class="col-sm-12 col-md-10">
                                        This is blog comment section list 
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        1-1-2021 13:00
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php }  ?>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>

<div class="modal fade" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-3 col-sm-8">                  
                            <h5 class="text-center"><?= __('admin.delete') ?> <?= __('admin.admin') ?></h5>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9">
                            <div class="row mt-3 mb-5">
                                <div class="col-sm-12 col-md-5 col-lg-3">
                                    <img src="<?= $record->avatar_url ?>" alt="img"  style='max-width: 90%;height: 150px' class="border-radius-9">
                                </div>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <h6 class="mt-0">
                                        <?= $record->firstname ?> <?= $record->lastname ?>
                                    </h6>
                                    <p class="mb-2"> <?= ucwords($record->type) ?></p>
                                    <p><?= $record->access_level_name ?></p>
                                    <p class="mb-0 pt-3">
                                        <?= __('admin.if_you_delete_this_admin_it_cannot_be_undone') ?>
                                    </p>
                                    <p>
                                        <?= __('admin.delete_title') ?> <?= ucwords($record->firstname.' '.$record->lastname) ?>?
                                    </p>
                                </div>
                            </div>             
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9 c-font-weight-bold">
                            <a href="<?= base_url('admin/admin/delete/'.$record->id) ?>" class="btn-danger btn mb-4 btn-custom c-font-weight-bold" style="width:100%"><?= __('admin.delete') ?> <?= __('admin.admin') ?></a>
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
    function getLogs(page,t) {
		$this = $(t);
		var data ={
			page:page,
			categoryId:<?= $record->id ?>,
			searchKey:$("#searchKey").val(),
			order:$("#changeOrderId").val()
		}
		$.ajax({
			url:`<?= base_url("admin/category/products") ?>/${page}`,
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
				$(".grid-product").html(json['html']);
				$(".card-footer").hide();
				
				if(json['pagination']){
					$(".card-footer").show();
					$(".card-footer .pagination").html(json['pagination'])
				}
			},
		})
	}

    // getLogs(1)

    function filterData(){
		getLogs(1);
	}
</script>