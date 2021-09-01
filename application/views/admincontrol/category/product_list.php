<?php foreach($records as $index => $record){ ?>
	<div class="col-sm-12 col-md-6 col-lg-3">
		<div class="card c-card mb-4">
			<img alt="image" src="<?= $record->product_featured_image_url ?>" height="250" class="order-img" >
			<div class="card-body pl-2 pr-2 pt-1">
				<div class="odr-count rounded-circle pull-right">
					<span>+15</span>
				</div>
				<div class="doc-sec rounded-circle pull-right">
					<i class="fa fa-file-text"></i>
				</div>
				<div class="odr-title mb-2">
					<?= $record->product_name ?>
				</div>
				<div class="row mb-3 align-items-center">
					<div class="col-sm-6">
						<img class="rounded-circle" src="http://localhost/afrocentric/assets/images/users/1OCaeSc7oznKDwIZsQFMqbNgXGiPV4xW.jpg" alt="IMG" width="36px" /> 
						<span class="small-text"> John Doe</span>
					</div>
					<div class="col-sm-6">
						<div class="pull-right">
							<?= c_rating(3) ?>
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
						<h6 class="m-0 pull-right">N<?= $record->product_price ?></h6>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-sm-12 text-center">
						<a href="javascript:void(0)" class="btn btn-warning text-white c-btn-custom">
							<?= __('admin.view') ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
       
<?php } ?>

<?php if(empty($record)){ ?>
	<div class="col-sm-12 text-center m-2">
		<img class="img-responsive" src="<?php echo base_url("assets/vertical/assets/images/no-data-2.png"); ?>" style="margin-top:20px;">
		<h3 class="m-t-40 text-center"><?= __('admin.not_activity_yet') ?></h3>
	</div>   
<?php } ?>