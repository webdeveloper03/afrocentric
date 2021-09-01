<?php foreach($records as $index => $record){ ?>
	<div class="col-sm-12 col-md-6 col-lg-4">
		<div class="card bg-light mb-4" style="background: #F2F2F2;">
			<div class="text-center mt-3 mb-3" style="width:100%">
				<img src="<?= $record->image_url ?>" style='max-width: 90%;height: 120px'>
			</div>
			<div class="card-body p-3 bg-white">
				<h6 class="mt-0"><?= $record->name ?></h6>
				<div class="row">
					<div class="col-sm-12 cate-grid-other-info">
						<span><?= __('admin.products_in_category') ?>:</span> 
						<span class="c-font-weight-bold"><?= $record->total_product ?>
						</span>
					</div>
					<div class="col-sm-12 cate-grid-other-info">
						<span><?= __('admin.date_created') ?>:</span>
						<span class="c-font-weight-bold"><?= c_date($record->created_at) ?></span>
					</div>
				</div>
				<div class="text-center mt-4" style="width:100%">
					<a href="<?= base_url('admin/category/details/'. $record->id) ?>" class="btn btn-warning c-btn-custom" style="width:90%">
						<?= __('admin.view') ?> <?= __('admin.category') ?>
					</a>
					<?php /*<a class="btn btn-primary c-btn-custom" href="<?= base_url('admin/category/create/'. $record->id) ?>"><?= __('admin.edit') ?></a>
					<a class="btn btn-danger c-btn-custom" onclick="confirmDelete(<?= $record->id ?>)" href="javascript:void(0)"><?= __('admin.delete') ?></a> */ ?>
				</div>
			</div>
		</div>
	</div>
       
<?php } ?>

<?php if(empty($record)){ ?>
	<div class="col-sm-12 text-center m-2">
		<img class="img-responsive" src="<?php echo base_url("assets/vertical/assets/images/no-data-2.png"); ?>" style="margin-top:100px;">
		<h3 class="m-t-40 text-center"><?= __('admin.not_activity_yet') ?></h3>
	</div> 
<?php } ?>