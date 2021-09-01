<?php foreach($records as $key => $record){ ?>
	<div class="col-sm-12 col-md-6 col-lg-4">
		<div class="card mb-4">
			<div class="text-center mt-3 mb-3" style="width:100%">
				<img src="<?= $record->avatar_url ?>" style='width:120px;height:120px' class="rounded-circle">
			</div>
			<div class="card-body p-3">
				<h6 class="text-center mt-0 mb-3"><?= $record->firstname ?> <?= $record->lastname ?></h6>
				<div class="row">
					<div class="col-sm-12 cate-grid-other-info">
						<span><?= __('admin.role') ?>:</span> 
						<span class="c-font-weight-bold"><?= ucwords($record->type) ?>
						</span>
					</div>
					<div class="col-sm-12 cate-grid-other-info">
						<span><?= __('admin.access_level') ?>:</span>
						<span class="c-font-weight-bold"><?= $record->access_level_name ?></span>
					</div>
				</div>
				<div class="text-center mt-4" style="width:100%">
					<a href="<?= base_url('admin/admin/details/'. $record->id) ?>" class="btn btn-warning c-btn-custom" style="width:90%">
						<?= __('admin.view_profile') ?>
					</a>
					<?php /*<a class="btn btn-primary c-btn-custom" href="<?= base_url('admin/admin/create/'. $record->id) ?>"><?= __('admin.edit') ?></a>
					<a class="btn btn-danger c-btn-custom" onclick="confirmDelete(<?= $record->id ?>)" href="javascript:void(0)"><?= __('admin.delete') ?></a> */ ?>
				</div>
			</div>
		</div>
	</div>
       
<?php } ?>

<?php if(empty($record)){ ?>
	<div class="col-sm-12 text-center m-2">
		<img class="img-responsive" src="<?php echo base_url("assets/vertical/assets/images/no-data-2.png"); ?>" style="margin-top:100px;">
		<h3 class="m-t-40 text-center">
			<?= __('admin.no') ?> <?= __('admin.admins') ?>
		</h3>
	</div> 
<?php } ?>