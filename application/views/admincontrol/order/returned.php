<div class="row">
	<div class="col-lg-12 col-md-12">
		<?php if($this->session->flashdata('success')){?>
			<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('success'); ?> </div>
		<?php } ?>
		
		<?php if($this->session->flashdata('error')){?>
			<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('error'); ?> </div>
		<?php } ?>
	</div>
</div>
<div class="row">
	<div class="col-12">
	<div class="card m-b-20 m-t-15">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-4">
						<div class="input-group">
							<input type="text" class="form-control bb-form-control" placeholder="Search here">
							<div class="input-group-append">
								<span class="input-group-text bb-input-group-text">
									<i class="fa fa-search"></i>
								</span>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-8 col-lg-6">
						
					</div>
					<div class="col-sm-12 col-md-4 col-lg-2">
						<select class="form-control nb-form-control" name="country_id" id="country_id">
							<option value="0">Newest First</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="card m-b-30">
			<div class="card-body">
				<div class="table-rep-plugin">
					
					<?php if ($getallorders == null) {?>
						<div class="text-center">
						<img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;">
							<h3 class="m-t-40 text-center text-muted"><?= __('admin.no_orders') ?></h3></div>
						<?php }
						else {?>
						
						
					<div class="table-responsive b-0" data-pattern="priority-columns">
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th><?= __('admin.order_id') ?></th>
									<th><?= __('admin.order_items') ?></th>
									<th width="80px"><?= __('admin.price') ?></th>
									<th><?= __('admin.payment_method') ?></th>
									<th><?= __('admin.tracking_id') ?></th>
									<th><?= __('admin.date') ?></th>
									<th class="txt-cntr"><?= __('admin.status') ?></th>
									<th width="80px"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($getallorders as $order){ ?>
									<tr>
										<td><?= $order['id'];?></td>
										<td></td>
										<td class="txt-cntr"><?= c_format($order['total_sum']); ?></td>
										<td class="txt-cntr"><?= str_replace("_", " ", $order['payment_method']) ?></td>
										<td class="txt-cntr"><?= $order['txn_id'];?></td>
										<td><?= c_date($order['created_at']);?></td>
										<td><span class="badge badge-danger p-1"><?= $status[$order['status']]; ?></span></td>
										<td>
											<a href="<?= base_url('admincontrol/vieworder/'. $order['id']) ?>" class="btn btn-warning btn-sm font-weight-bold"><?= __('admin.view_order') ?></a>
										</td>
									</tr>
								<?php } ?>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div> 
	</div> 
</div>