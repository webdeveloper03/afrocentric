<?php if($products) { ?>
<form id="checkout-cart-form">
	<input type="hidden" name="checkout_page" value="true">
  <ul class="cart-header">
			<li><?= __('store.product') ?></li>
			<li class="cart-item-price"><?= __('store.price') ?></li>
			<li><?= __('store.quantity') ?></li>
			<li><?= __('store.total') ?></li>		  
			<li></li>
			</ul>
			<?php foreach ($products as $key => $product) { ?>
				<ul class="cart-items-row">
				<li>
					<div class="cart-item">
					<div class="img-cart">
						<a href="<?= $product['link'] ?>"><img src="<?= (!empty($product['product_featured_image'])) ? $product['product_featured_image'] : base_url('assets/store/default/img/1.png'); ?>" alt="Product Image"></a>
					</div>
					<div class="cart-item-content">
						<?php
							if(isset($product['variation']) && !empty($product['variation'])) {
								$variation = json_decode($product['variation']);
								$combinationString = "";
								foreach ($variation as $key => $value) {
									if($key == 'colors') {
										$combinationString .= ($combinationString == "") ? explode("-",$value)[1] : ",".explode("-",$value)[1];
									} else {
										$combinationString .= ($combinationString == "") ? $value : ",".$value;
									}
								}
							}
						?>
						<a href="<?= $product['link'] ?>"><h3><?= $product['product_name'] ?> <?= ($combinationString != "") ? "(".$combinationString.")" : "" ?></h3></a>
						<p class="product-description text-muted"><?= (!empty($product['product_short_description'])) ? $product['product_short_description'] : "Lorem ipsum dolor sit amet, consectetur adipiscing" ?></p>
					</div>
					</div>			 
				</li>
				<li class="cart-item-price text-center">
				<span class="cart-sale-price">
					<?= (!empty($product['product_msrp'])) ? '<small class="cart-regular-price">'.c_format($product['product_msrp'] + $product['variation_price']).'</small><br/>' : '' ?><?= c_format($product['product_price'] + $product['variation_price']) ?></span>
				</li>
				<li>
				<?php if($product['product_type'] != 'downloadable'){ ?>
					<div id="field1" class="cart-counter">
						<button type="button" class="sub minus">-</button>
						<input class="qty-input" name="quantity[<?= $product['cart_id'] ?>]" type="text" value="<?= $product['quantity'] ?>" min="1">
						<button type="button" class="add plus">+</button>
					</div>
				<?php } else { ?>
					<?= $product['quantity'] ?>
				<?php } ?>
				</li>
				<li>
					<span class="cart-mini-total-item"><?= c_format($product['total']) ?></span>
				</li>
				<li>
					<a href="<?= $cart_url."?remove=".$product['cart_id'] ?>"> <img src="<?= base_url('assets/store/default/'); ?>img/delete.png" alt="img"></a></li>
				</ul>
			<?php } ?>
			
			<ul class="cart-footer-row">
      <?php foreach ($totals as $key => $value) { ?>
        <li>
				<span><?= $value['title'] ?></span>		 
				<span><?= c_format($value['amount']) ?></span>		 
			</li>
            <?php } ?>
			</ul>
</form>
<?php } else { ?>
<script type="text/javascript">
	window.location = '<?= $base_url."cart" ?>';
</script>
<?php } ?>