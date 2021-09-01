<?php foreach($records as $key => $record){ ?>
	<div class="col-sm-12 col-md-6 col-lg-3 pr-4 pl-4">
		<div class="card c-card mb-4 cursor-pointer" onclick="getDetailPage(<?= $record->id ?>)">
			<img alt="image" src="<?= $record->image_url ?>" height="150" class="order-img" >
			<div class="card-body" style="padding:0.75rem!important">
				<h6 class="mt-0 mb-2">
					<?= $record->name ?>
				</h6>
				<div class="mb-3"><?= character_limiter(strip_tags($record->description),50) ?></div>
				<div>
					<div class="rounded-circle bg-warning text-center text-white pull-left" style="width:36px;height:36px;padding: 5px;">
								<i class="mdi mdi-bookmark mdi-24px"></i>
					</div>
					<div class="pull-left ml-2">
						<h6><?= $record->blog_category_name ?></h6>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php if(empty($record)){ ?>
	<div class="col-sm-12 text-center m-2">
		<img class="img-responsive" src="<?php echo base_url("assets/vertical/assets/images/no-data-2.png"); ?>" style="margin-top:100px;">
		<h3 class="m-t-40 text-center">
			<?= __('admin.no') ?> <?= __('admin.blogs') ?>
		</h3>
	</div> 
<?php } ?>