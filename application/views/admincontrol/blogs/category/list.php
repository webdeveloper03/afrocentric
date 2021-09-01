<?php foreach($records as $key => $record){ ?>
	<tr>
		<td><?= $record->id ?></td>
		<td><?= $record->name ?></td>
		<td><?= c_datetime($record->created_at) ?></td>
		<td><?= c_datetime($record->updated_at) ?></td>
		<td>
			<a class="btn btn-sm btn-primary" href="<?= base_url('admin/blog/create_category/'. $record->id) ?>"><?= __('admin.edit') ?></a>
			<a class="btn btn-sm btn-danger" onclick="confirmDelete(<?= $record->id ?>)" href="javascript:void(0)"><?= __('admin.delete') ?></a>
		</td>
	</tr>
       
<?php } ?>

<?php if(empty($record)){ ?>
	<tr>
		<td colspan="100%">
			<div class="text-center m-2">
			 	<img class="img-responsive" src="<?php echo base_url("assets/vertical/assets/images/no-data-2.png"); ?>" style="margin-top:100px;">
				<h3 class="m-t-40 text-center"><?= __('admin.not_activity_yet') ?></h3>
			</div>       
		</td>
	</tr>
<?php } ?>