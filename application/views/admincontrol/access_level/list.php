<?php foreach($records as $key => $record){ ?>
	<div class="col-sm-12 col-md-6 col-lg-3">
		<div class="card mb-4">
			<div class="card-body">
				<div class="row mb-2">
					<div class="access_level_left text-center">
						<div class="rounded-circle bg-warning" style="width:50px;height:50px;margin: auto;">
							<i class="mdi mdi-lock mdi-24px" style="margin-top: 25%;"></i>
						</div>
					</div>
					<div class="access_level_right">
						<h6 class="mt-0 mb-2"><?= $record->name ?></h6>
						<div class="small-text">
							<?php
								$permissions = json_decode($record->permission, true);
							?>
							<?= count($permissions) ?> <?= __('permissions') ?>
						</div>
					</div>
				</div>				
				<div class="text-center mt-4" style="width:100%">
					<a href="<?= base_url('admin/accesslevel/details/'. $record->id) ?>" class="btn btn-warning pl-4 pr-4">
						<?= __('admin.view') ?>
					</a>
				</div>
			</div>
		</div>
	</div>
       
<?php } ?>

<?php if(empty($record)){ ?>
	<div class="col-sm-12 text-center m-2">
		<img class="img-responsive" src="<?php echo base_url("assets/vertical/assets/images/no-data-2.png"); ?>" style="margin-top:100px;">
		<h3 class="m-t-40 text-center">
			<?= __('admin.no') ?> <?= __('admin.access_levels') ?>
		</h3>
	</div> 
<?php } ?>