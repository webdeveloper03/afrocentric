<div class="row">
	<div class="col-sm-12">		
		<div class="form-group">
			<label class="control-label">Status</label>
			<select class="form-control" name="status">
				<option <?= (int)$setting_data['status'] == '0' ? 'selected' : '' ?> value="0">Disabled</option>
				<option <?= (int)$setting_data['status'] == '1' ? 'selected' : '' ?> value="1">Enabled</option>
			</select>
		</div>

		<div class="form-group">
			<label><?= __('admin.monnify_api_key') ?></label>
			<input name="monnify_api_key" class="form-control" value="<?php echo $setting_data['monnify_api_key']; ?>">
		</div>
		<div class="form-group">
			<label><?= __('admin.monnify_contract_code') ?></label>
			<input name="monnify_contract_code" class="form-control" value="<?php echo $setting_data['monnify_contract_code']; ?>">
		</div>
		<div class="form-group">
			<label class="control-label">Order Success Status</label>
			<select name="order_success_status" class="form-control">
				<?php foreach ($order_status as $order_status_id => $name) { ?>
					<?php if ($order_status_id == $setting_data['order_success_status']) { ?>
						<option value="<?php echo $order_status_id; ?>" selected="selected"><?= $name ?></option>
					<?php } else { ?>
						<option value="<?php echo $order_status_id; ?>"><?= $name ?></option>
					<?php } ?>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label>Additional Charges</label>
			<input name="monnify_additional_charges" class="form-control" value="<?php echo $setting_data['monnify_additional_charges']; ?>" type="number">
		</div>
		<div class="form-group">
			<label  class="control-label"><?= __('admin.mode') ?></label>
			<div class="">
				<div class="radio-inline">
					<label>
						<input type="radio" name="payment_mode"  value="live" <?php echo $setting_data['payment_mode'] == 'live' ? 'checked' : '' ?> >
						<?= __('admin.live') ?>
					</label>
				</div>
				<div class="radio-inline">
					<label>
						<input type="radio" name="payment_mode"  value="sandbox" <?php echo $setting_data['payment_mode'] == 'sandbox' ? 'checked' : '' ?> >
						<?= __('admin.sandbox') ?>
					</label>
				</div>
			</div>
		</div>
	</div>
	
</div>