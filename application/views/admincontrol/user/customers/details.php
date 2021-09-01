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
                        <h3 class="m-t-40 text-center text-muted"><?= __('admin.no') ?> <?= __('admin.customers') ?></h3>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="card m-b-30 m-t-15 <?= ($record->status==2)? 'blocked-user':'' ?>">
                <div class="row">
                    <div class="col-sm-12">
                        <a class="detail-back-arrow rounded-circle pull-left" href="<?= base_url();?>admin/user/customers">
                            <i class="mdi-24px mdi mdi-arrow-left"></i>
                        </a>
                        <div class="profile-header"style="background: url(<?= base_url('assets/images/profile-cover.png') ?>)">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="profile-img-sec">
                                <div class="profile_img">
                                    <img src="<?= $record->avatar_url ?>" alt="admin" width="100%" height="100%">
                                </div>
                            </div>
                            <div class="profile-info-sec pt-2">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h5 class="font-weight-bold mb-2">
                                            <?= $record->firstname ?> <?= $record->lastname ?>
                                        </h5>
                                        <div>
                                            <i class="fa fa-map-marker mr-2 fs-20"></i><?= c_address($record) ?>
                                        </div>
                                        <hr />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-12 col-md-3 col-lg-2">
                                        <h6><?= $record->total_sale ?></h6>
                                        <span class="small-text c-font-weight-bold">
                                            <?= __('admin.total_orders') ?>
                                        </span>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <h6>0</h6>
                                        <span class="small-text c-font-weight-bold">
                                            <?= __('admin.returned_orders') ?>
                                        </span>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                        <h6><?= $record->total_sale ?></h6>
                                        <span class="small-text c-font-weight-bold">
                                            <?= __('admin.successful_orders') ?>
                                        </span>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-4">
                                        <h6><?= c_format($record->amount); ?></h6>
                                        <span class="small-text c-font-weight-bold">
                                            <?= __('admin.total_amount_sent') ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row m-t-30 m-b-30">
                                    <div class="col-sm-12">
                                        <?php if($record->status==2) { ?>
                                            <a href="javascript:void(0)" class="btn btn-success btn-custom ml-4" data-toggle="modal" data-target="#unblockModal">
                                                <i class="fa fa-flag mr-1"></i>
                                                <?= __('admin.unblock') ?> <?= __('admin.customer') ?>
                                            </a>
                                        <?php } else { ?>
                                            <a href="javascript:void(0)" class="btn btn-orange btn-custom" data-toggle="modal" data-target="#sendWarningModal">
                                                <i class="fa fa-warning mr-1"></i>
                                                <?= __('admin.send_a_warning') ?>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-outline-danger btn-custom ml-4" data-toggle="modal" data-target="#blockModal">
                                                <i class="fa fa-flag mr-1"></i>
                                                <?= __('admin.block') ?>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>  
                        </div>  
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <ul class="c-nav nav nav-pills justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-toggle="tab" href="#orders_listing" role="tab">
                                        <?= __('admin.orders') ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#community_listing" role="tab">
                                        <?= __('admin.community_bids') ?></a>
                                </li>							
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#reviews_listing" role="tab">
                                        <?= __('admin.reviews') ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12">
                            <div class="tab-content">
                                <div class="tab-pane p-3 active show" id="orders_listing" role="tabpanel">
                                    <div class="row">
                                        <?php for($odr=1;$odr<=6;$odr++){ ?>
                                            <div class="col-sm-12 col-md-6 col-lg-3 pr-4 pl-4">
                                                <div class="card c-card mb-4">
                                                    <img alt="image" src="<?= base_url('assets/images/common.jpg') ?>" height="250" class="order-img" >
                                                    <div class="card-body pl-1 pr-1 pt-1">
                                                        <div class="odr-count rounded-circle pull-right">
                                                            <span>+15</span>
                                                        </div>
                                                        <div class="doc-sec rounded-circle pull-right">
                                                            <i class="fa fa-file-text"></i>
                                                        </div>
                                                        <div class="odr-title mb-2">
                                                            Ready To Wear Kids top Complete set +15 more items
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-sm-6">
                                                                <img class="rounded-circle" src="http://localhost/afrocentric/assets/images/users/1OCaeSc7oznKDwIZsQFMqbNgXGiPV4xW.jpg" alt="IMG" width="36px" /> 
                                                                <span class="small-text"> John Doe</span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="pull-right">
                                                                    <?php for($i=1; $i <= 5; $i++) { ?>
                                                                        <span class="text-warning"><i class="fa fa-star"></i></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2 align-items-center">
                                                            <div class="col-sm-6">
                                                                <span class="circle" style="background-color:#FFAF2E"></span>
                                                                <span class="circle" style="background-color:#222224"></span>
                                                                <span class="circle" style="background-color:#FFFFFF"></span>
                                                                <span class="circle" style="background-color:#0000FF"></span>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <h6 class="m-0 pull-right">N15,000</h6>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-4">
                                                            <div class="col-sm-12 text-center">
                                                                <a href="javascript:void(0)" class="btn btn-warning btn-sm text-white p-25-15">
                                                                    <?= __('admin.view_order') ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane p-3" id="community_listing" role="tabpanel">
                                    community_listing
                                </div>
                                <div class="tab-pane p-3" id="reviews_listing" role="tabpanel">
                                    reviews_listing
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <?php }  ?>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>

<div class="modal fade" id="sendWarningModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="sendWarningForm">
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-3 col-sm-8">                  
                            <h5 class="text-center"><?= __('admin.send_a_warning') ?></h5>
                            <p class="text-center"><?= __('admin.send_a_warning_title') ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9">
                            <div class="form-group">
                                <div class="form-control custom-form-control">
                                    <label class="control-label"><?= __('admin.warning_type') ?></label>
                                    <select name="warning_type" class="form-control">
                                        <option value="">-- Select --</option>
                                        <?php foreach ($this->config->item('warningType') as $key => $value) { ?>
                                            <option value="<?= $key ?>"><?= __($value) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control custom-form-control">
                                    <label class="control-label"><?= __('admin.fine_amount') ?></label>
                                    <input type="text" name="fine_amount" class="form-control" placeholder="0.00" value="0.00">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control custom-form-control">
                                    <label class="control-label"><?= __('admin.warning_title') ?></label>
                                    <input type="text" name="warning_title" class="form-control" placeholder="<?= __('admin.enter_title_here') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-control custom-form-control">
                                    <label class="control-label"><?= __('admin.warning_title') ?></label>
                                    <textarea class="form-control" name="warning_message" placeholder="<?= __('admin.enter_message_here') ?>" rows="4"></textarea>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9 c-font-weight-bold">
                            <input type="hidden" name="user_id" value="<?= $record->id ?>">
                            <button type="submit" class="btn-submit btn-warning btn mb-3 btn-custom c-font-weight-bold" style="width:100%"><?= __('admin.send_message') ?></button>
                            <p class="text-center" data-dismiss="modal">
                                <span class="cursor-pointer">Cancel</span>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="blockModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="blockCustomerForm">
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-3 col-sm-8">                  
                            <h5 class="text-center"><?= __('admin.block') ?> <?= __('admin.customer') ?></h5>
                            <p class="text-center"><?= __('admin.block_customer_title') ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9">
                            <div class="form-group">
                                <div class="form-control custom-form-control">
                                    <label class="control-label"><?= __('admin.why_do_you_want_to_block_the_customer') ?></label>
                                    <input type="text" name="status_reason" class="form-control" placeholder="<?= __('admin.reason') ?>">
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9 c-font-weight-bold">
                            <input type="hidden" name="status" value="2">
                            <input type="hidden" name="user_id" value="<?= $record->id ?>">
                            <button type="submit" class="block-submit btn-danger btn mb-4 btn-custom c-font-weight-bold" style="width:100%"><?= __('admin.block_user') ?></button>
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

<div class="modal fade" id="unblockModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="unblockCustomerForm">
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-3 col-sm-8">                  
                            <h5 class="text-center"><?= __('admin.unblock') ?> <?= __('admin.customer') ?></h5>
                            <p class="text-center"><?= __('admin.unblock_customer_title') ?></p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9">
                            <div class="form-group">
                                <div class="form-control custom-form-control">
                                    <label class="control-label"><?= __('admin.why_do_you_want_to_unblock_the_customer') ?></label>
                                    <input type="text" name="status_reason" class="form-control" placeholder="<?= __('admin.reason') ?>">
                                </div>
                            </div>                        
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-sm-offset-2 col-sm-9 c-font-weight-bold">
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="user_id" value="<?= $record->id ?>">
                            <button type="submit" class="unblock-submit btn-success btn mb-4 btn-custom c-font-weight-bold" style="width:100%"><?= __('admin.unblock') ?> <?= __('admin.user') ?></button>
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
	$(".btn-submit").on('click',function(evt){
        evt.preventDefault();
        var formData = new FormData($("#sendWarningForm")[0]);
        formData = formDataFilter(formData);
        $this = $("#sendWarningForm");

        $(".btn-submit").btn("loading");
        
        $.ajax({
            url:'<?= base_url('admin/user/sendWarning') ?>',
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
	$(".block-submit").on('click',function(evt){
        evt.preventDefault();
        chnageStatus('blockCustomerForm');
        return false;
    });
	$(".unblock-submit").on('click',function(evt){
        evt.preventDefault();
        chnageStatus('unblockCustomerForm');
        return false;
    });

    function chnageStatus(formId) {
        var formData = new FormData($("#"+formId)[0]);
        formData = formDataFilter(formData);
        $this = $("#"+formId);

        $(".unblock-submit").btn("loading");
        
        $.ajax({
            url:'<?= base_url('admin/user/changeStatus') ?>',
            type:'POST',
            dataType:'json',
            cache:false,
            contentType: false,
            processData: false,
            data:formData,
            error:function(){$(".unblock-submit").btn("reset");},
            success:function(result){
                $(".unblock-submit").btn("reset");
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
    }
</script>