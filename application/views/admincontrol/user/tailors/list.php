<?php foreach($records as $key => $record){ ?>
	<div class="card m-b-10">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-2 text-center">
                    <img class="c-rounded-circle" src="<?= $record->avatar_url ?>" alt="admin" height="80" width="80">
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <h5>
                        <?= $record->firstname ?> <?= $record->lastname ?>
                    </h5>
                    <span class="small-text">
                        <i class="fa fa-map-marker"></i> <?= c_address($record) ?>
                    </span>
                </div>
                <?php if($record->status==0) { ?>
                    <div class="col-sm-12 col-md-6 col-lg-6 vertical-center">
                        <div style="width:100%">
                            <a href="<?= base_url();?>admin/user/user_details/<?= $record->id?>" class="btn c-font-weight-bold btn-warning pull-right mr-3">
                                <?= __('admin.view_profile') ?>
                            </a>
                            <span onClick="rejectProfile(<?= $record->id ?>)" class="btn c-font-weight-bold btn-danger pull-right mr-3">
                                <?= __('admin.reject_profile') ?>
                            </span>
                            <span onClick="acceptProfile(<?= $record->id ?>)" class="btn c-font-weight-bold btn-success pull-right mr-3">
                                <?= __('admin.accept_profile') ?>
                            </span>
                        <div>
                    </div>
                <?php } else { ?>
                    <div class="col-sm-12 col-md-4 col-lg-4 vertical-center"> 
                        <?= c_rating($record->total_rating) ?>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 vertical-center">
                            <a href="<?= base_url();?>admin/user/user_details/<?= $record->id?>" class="btn c-font-weight-bold btn-<?= ($record->status==2?'danger':'warning') ?>">
                                <?= __('admin.view_profile') ?>
                            </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(empty($record)){ ?>
    <div class="card m-b-30">
        <div class="card-body text-center"> 
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;">
            <h3 class="m-t-40 text-center text-muted">
                <?= __('admin.no') ?> <?= __('admin.tailors') ?>
            </h3>
        </div>
    </div>
<?php } ?>