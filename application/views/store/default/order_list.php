<?php include "sidebar.php";?>

			<div class="profile-main">
				<h2><?= __('store.orders') ?></h2>
				<div class="my-orders">
					<div class="cart-wrapper">
						<ul class="cart-header">
							<li><?= __('client.order_id') ?></li>
							<li class="cart-item-price"><?= __('client.price') ?></li>
							<li><?= __('client.order_status') ?></li>
							<li><?= __('client.payment_method') ?></li>
							<li><?= __('client.transaction') ?></li>
							<li></li>
						</ul>

						<?php if($buyproductlist) {

								$subtotal = 0;
							
								foreach($buyproductlist as $product){ 

									$subtotal = $subtotal + (float)$product['total_sum'];
									
								?>
								<ul class="cart-items-row">
									<li><span class="my-orders-text"><?php echo $product['id'];?></span></li>
									<li><span class="my-orders-text"><?php echo c_format($product['total_sum']); ?></span></li>
									<li><span class="my-orders-text"><?php echo $status[$product['status']]; ?></span></li>
									<li><span class="my-orders-text text-center"><?php echo str_replace("_", " ", $product['payment_method']);?></span></li>
									<li><span class="my-orders-text"><?php echo $product['txn_id'];?></span></li>
									<li><span class="my-orders-text">
										<a href="<?= base_url('store/vieworder/'. $product['id']) ?>" class="btn btn-save-profile"><?= __('client.details') ?></a>
									</span></li>
								</ul>
							<?php } ?>
							<ul class="cart-footer-row">
								<li>
									<span>Sub Total</span>		 
									<span><?php echo c_format($subtotal); ?></span>		 
								</li>
								<li>
									<span>Total</span>		 
									<span><?php echo c_format($subtotal); ?></span>		 
								</li>
							</ul>
						<?php } else { ?>
							<ul class="cart-items-row">
								<li class="w-100"><span class="my-orders-text">No Orders Found!</span></li>		
							</ul>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
