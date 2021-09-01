<?php foreach($records as $key => $record){ ?>
	<div class="card m-b-10">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-2 col-lg-2 text-center">
                    <img class="c-rounded-circle" src="<?= $record->avatar_url ?>" alt="admin" width="80px">
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <h5>
                        <?= $record->firstname ?> <?= $record->lastname ?>
                    </h5>
                    <span class="small-text">
                        <i class="fa fa-map-marker"></i> <?= c_address($record) ?>
                    </span>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2">
                    <h5><?= $record->total_sale ?></h5>
                    <span class="small-text">Total Orders</span>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <h5><?= c_format($record->amount); ?></h5>
                    <span class="small-text">Total Amount Sent</span>
                </div>
                <div class="col-sm-12 col-md-1 col-lg-2 vertical-center">
                    <a href="<?= base_url();?>admin/user/details/<?= $record->id?>" class="btn c-font-weight-bold btn-<?= ($record->status==1?'warning':'danger') ?>">
                        <?= __('admin.view_profile') ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(empty($record)){ ?>
    <div class="card m-b-30">
        <div class="card-body text-center"> 
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;">
            <h3 class="m-t-40 text-center text-muted">
                <?= __('admin.no') ?> <?= __('admin.customers') ?>
            </h3>
        </div>
    </div>
<?php } ?>