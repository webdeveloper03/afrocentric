<link rel="stylesheet" type="text/css" href="<?= base_url('assets/store/default/slick/') ?>slick.css"/>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/store/default/slick/') ?>slick-theme.css"/>
<script type="text/javascript" src="<?= base_url('assets/store/default/slick/') ?>slick.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/style.css" />

<?php 
$product_featured_image = ($product['product_featured_image'] != '') ? base_url('assets/images/product/upload/thumb/'. $product['product_featured_image']) : base_url('assets/store/default/img/pr-img.png') ; 
$allimages = $this->Product_model->getAllImages($product['product_id']);
$allvideo = $this->Product_model->getAllVideos($product['product_id']);
?>
<section class="single-product">
  <div class="container">
    <div class="breacrumb">
      <div class="inner-pages-breadcrumb">
    <p><a href="<?= $home_link ?>">Home</a> / <a href="<?= $base_url ?>category">Categories</a> / <?php if($categories){ 
          foreach ($categories as $key => $value) {
            $categotyAvailble = true;
              echo "<a href='". base_url('store/category/'. $value['slug']) ."'>".$value['name']."</a> /";
            }
          } ?> <?= (!empty($product['product_name'])) ? $product['product_name'] : "Lorem Ipsum"; ?></p>
    </div>
  </div>

  <div style="clear:both;"></div>
	  
  <div class="single-product-row">
    <div class="produc-gallery">
      <div id="productSlider" class="carousel slide" data-ride="carousel" data-interval="false">
          <div class="carousel-indicators">
           <div class="prev-btn">
             <i class="fa fa-angle-up"></i>
           </div>
           <div class="next-btn">
             <i class="fa fa-angle-down"></i>
           </div>
          <div class="slider">
            <div data-target="#productSlider" data-slide-to="0" class="active">
              <img src="<?= $product_featured_image; ?>" class="" alt="Featured Image" onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
            </div>
            <?php 
            $i = 1;
            foreach($allimages as $images) { 
            $img = (!empty($images['product_media_upload_path'])) ? base_url('assets/images/product/upload/thumb/'.$images['product_media_upload_path']) : base_url('assets/store/default/img/pr-img.png');
            ?>
            <div data-target="#productSlider" data-slide-to="<?= $i ?>">
                <img src="<?=  $img; ?>" class="" alt="Product Image <?= $i ?>" onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
            </div>
            <?php 
            $i++;
            } 
            ?>
            <?php foreach($allvideo as $videos) { 
                $img = (!empty($videos['product_media_upload_video_image'])) ? base_url('assets/images/product/upload/thumb/' .$videos['product_media_upload_video_image']) : base_url('assets/store/default/img/pr-img.png');
                ?>
                <div data-target="#productSlider" data-slide-to="<?= $i ?>">
                <img src="<?=  $img; ?>" class="" alt="Product Video Image <?= $i ?>" onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
                </div>
            <?php 
            $i++;
            } 
            ?>
          </div>
          </div>

			    <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="<?= $product_featured_image; ?>" class="d-block w-100" alt="Featured Image" onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
            </div>
            <?php 
            $i = 1;
            foreach($allimages as $images) { 
            $img = (!empty($images['product_media_upload_path'])) ? base_url('assets/images/product/upload/thumb/'.$images['product_media_upload_path']) : base_url('assets/store/default/img/pr-img.png');
            ?>
            <div class="carousel-item">
            <img src="<?=  $img; ?>" class="d-block w-100" alt="Product Image <?= $i ?>" onerror="this.src='<?= base_url('assets/store/default/img/no-image.png')?>';">
            </div>
            <?php 
            $i++;
            } 
            ?>
            <?php foreach($allvideo as $videos) { 
                $img = (!empty($videos['product_media_upload_video_image'])) ? base_url('assets/images/product/upload/thumb/' .$videos['product_media_upload_video_image']) : base_url('assets/store/default/img/pr-img.png');
                $youtube = $videos['product_media_upload_path'];
                ?>
                <div data-src="<?php echo $youtube; ?>" data-poster="" class="carousel-item">
                <?php 
                  if (strpos($youtube,'embed') !== false) {
                      ?>
                          <iframe width="100%" height="530" src="<?=$youtube ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      <?php
                  } else {

                      if(strpos(strtolower($youtube),'youtube') !== false){
                          $id = explode("v=",$youtube);
                          ?>
                              <iframe width="100%" height="530" src="https://www.youtube.com/embed/<?=$id[1] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          <?php
                      } else if(strpos(strtolower($youtube),'youtu') !== false) {
                          $id = explode("/",$youtube);
                          ?>
                              <iframe width="100%" height="530" src="https://www.youtube.com/embed/<?=$id[3] ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          <?php
                      }

                      ?>
                      <?php
                  }
                  ?>
                </div>
            <?php 
            $i++;
            } 
            ?>
            
            <a class="carousel-control-prev" href="#productSlider" role="button" data-slide="prev">
            <img alt="img"  src="<?= base_url('assets/store/default/'); ?>img/arpr.png">
            </a>
            <a class="carousel-control-next" href="#productSlider" role="button" data-slide="next">
            <img alt="img"  src="<?= base_url('assets/store/default/'); ?>img/arpr.png">
            </a>
          </div>
			</div>
        </div>
		 
		 <div class="product-content-detail">
		     <div class="pr-title">
			    <h1><?= (!empty($product['product_name'])) ? $product['product_name'] : "What is Lorem Ipsum?"; ?></h1>
				<div class="compair-icons">
        <!-- w-listed -->
				  <span id="btn-add-to-wishlist" class="<?= $is_wishlisted_class ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>

            <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

				  <span data-social-share data-share-url="<?= $actual_link;?>"><img alt="img" src="<?= base_url('assets/store/default/'); ?>img/refresh.png"></span>
				</div>
			 </div>
			 <div class="review-row">
         <?php
          $ratingAvg = 0;
          $totalRating = 0;
          $numberOfRatings = 0;
          if(!empty($ratings)) { 
            foreach($ratings as $rating) { 
              $totalRating += (int)$rating['rating_number'];
              $numberOfRatings++;
            }
          }
          
          if($totalRating > 0 && $numberOfRatings > 0) {
            $ratingAvg = number_format(($totalRating / $numberOfRatings), 0);
          }
         ?>

        <span class="">
        <?php
        for ($i=0; $i < $ratingAvg; $i++) { 
        ?>
        <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
        <?php
        }
        while($ratingAvg < 5) {
        ?>
        <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
        <?php        
        $ratingAvg++;            
        }
        ?>
        </span>
			  <span class="spacer">|</span>
        <span><?= $numberOfRatings ?> customer review</span>              
			  <span class="spacer">|</span>
			  <span class="sku"><?= __('store.sku') ?> : <?= (!empty($product['product_sku'])) ? $product['product_sku'] : "ED1420";?></span>
			  <span class="spacer">|</span>
        <span style="display:none"><?= __('store.promoted_by') ?> : <?= (!empty($user['username'])) ? $user['username'] : "admin";?></span>
			  <span class="spacer" style="display:none">|</span>
        <span>Category : <?php 
          if($categories){ 
          foreach ($categories as $key => $value) {
              $categotyAvailble = true;
              echo "<a id='product-category' data-product_id='".$product['product_id']."' data-category_id='".$value['id']."' href='". base_url('store/category/'. $value['slug']) ."'><span style='border-color:#fff;'>". $value['name'] ."</span></a>";
          }
          }

          if(!isset($categotyAvailble)) {
            echo "Not Available";
          }
          ?>
			 </div></span>
			 
		<p class="product-text"><?= !(empty($product['product_short_description'])) ? $product['product_short_description'] : 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.';?> </p>
	    		<div class = "container">
		    <div class = "row">
		        <div class = "col-7">
		             <?= (!empty($product['product_msrp'])) ? '<div class="regular-price" data-price="'.$product['product_msrp'].'">'.c_format($product['product_msrp']).'</div>' : '' ?>
		<div class="sale-price" data-price="<?= $product['product_price']; ?>"><?= (!empty($product['product_price'])) ? c_format($product['product_price']) : '' ?></div>
      
		        </div>
		        <div class = "col-5 variations-pricing-row text-end float-right">
		             <div class="quantity-area" id="field1">
						<button type="button" id="sub" class="sub bg-danger"><i class="fa fa-minus"></i></button>
						<input id="product-quantity" type="text" id="1" min="1" name="quantity"  value="1">
						<button type="button" id="add" class="add bg-success"><i class="fa fa-plus"></i></button>
					</div>

		        </div>
		    </div>
		</div>			
       <?php
        $variations = [];
        if(isset($product['product_variations']) && !empty($product['product_variations'])) {
          $variations = json_decode($product['product_variations']);
        }
        ?>

        <?php
          foreach ($variations as $key => $value) {
            ?>
              <div class="variation-row my-1 <?= ($key != "colors") ? "ft-variation-row" : "ft-color-row"; ?>">
                <span class="varition-title"><?= ucwords(strtolower($key))?></span>
                <div class="variations color ml-2">
                  <?php
                  for ($i=0; $i < sizeOf($value); $i++) { 
                    $this_price = isset($value[$i]->price) ? $value[$i]->price : 0;
                    if($key == "colors") {
                  ?>
                    <span data-variation-type="<?= $key; ?>" data-variation-price="<?= $this_price; ?>" data-variation-code="<?= $value[$i]->code; ?>" data-variation-name="<?= $value[$i]->name; ?>" class="" style="color:<?= $value[$i]->code;?>; <?= ($value[$i]->code == '#FFFFFF') ? "color:#000;" : "";?>"><i style="background:<?= $value[$i]->code;?>;"></i> <?= $value[$i]->name;?></span>
                  <?php
                    } else {
                      $this_name = isset($value[$i]->name) ? $value[$i]->name : $value[$i];
                  ?>
                    <span data-variation-type="<?= $key; ?>" data-variation-price="<?= $this_price; ?>" data-variation-option="<?= $this_name; ?>" class="" style="border-color:#fff;"> <?= $this_name ?></span>
                  <?php
                    }
                  }
                  ?>
                </div>
              </div>
            <?php
          }
        ?>			 
		 
			  <div class="variation-row mt-3">
				<div class="variations-pricing-row">				  
          
					<div class="apply-coupon">
					   <input class="coupon-code" type="text" name="coupon" placeholder="<?= __('store.enter_coupon_code') ?>">
					   <button class="btn btn-apply-coupon bg-main text-white btn-apply-coupon" title="<?= __('store.apply_coupon_code') ?>">Apply</button>
					   <img alt="img"  src="<?= base_url('assets/store/default/'); ?>img/coupen.png" class="couponicon">
					</div><button data-product_id="<?= $product['product_id'] ?>" data-product_name="<?= (!empty($product['product_name'])) ? $product['product_name'] : 'Lorem Ipsum' ?>" class="btn btn-custom bg-main2 btn-cart"><?= __('store.add_to_cart') ?></button>

          <div class="coupon-msg mt-3"></div>
				</div>
			  </div>
			 
			  <div class="variation-row mt-3">
			    <span class="varition-title">Payment:</span>
				  <div class="variations-payment-row">
            <ul class="pg-listing">
              <?php 
              $payments = get_payment_gateways();
              foreach ($payments as $key => $payment) {
                  if($payment['status']){
                    echo '<li><a href="javaScript:void(0);"><img alt="'. $payment['title'] .'" src="'. base_url($payment['icon']) .'" style="vertical-align: revert; width:74px; height:30px;"/></a></li>';
                  }
              }
              ?>
            </ul>
          </div>
			  </div>
			 
		    </div>
		 
	    </div>

	  
   </div>
</section>

<section class="product-description-reviews">
   <div class="container">
      <div class="description-reviews-tabs">
	      <a href="javascript:void(0);" class="active dbtn">Description</a>
	      <a href="javascript:void(0);" class="rbtn">Reviews</a>
	  </div>
	  
	  <div class="discription-reviews-content">
	    <div class="description-content">
      <?= (!empty($product['product_description'])) ? html_entity_decode($product['product_description']) : '<h3 class="text-left text-center text-muted p-4 no-review">Product Description not available</h3>'; ?>
		  </div>
	  </div>
	  
	  <div class="product-reviews-all" style="display:none;">
      <?php if(!empty($ratings)) { ?>
        <?php foreach($ratings as $rating) { ?>
          <div class="reviews-box">
              <div class="reviews-img-wrap">
              <?php if(!empty($rating['avatar'])) { ?>
                <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $rating['avatar'];?>" onerror="this.src='<?=base_url('assets/store/default/').'img/blog1.png'?>';"/>
              <?php } else { ?>
                <img src="<?= base_url('assets/store/default/'); ?>img/blog1.png" alt="user" />
              <?php } ?>
            </div>
            
            <div class="rview-content-text">
              <div class="reviews-top-row">
                <h3><?= $rating['firstname']." ".$rating['lastname'];?></h3>
                <div class="reviews-star">
                  <?php
                  $rating_count = (int)$rating['rating_number'];
                  for ($i=0; $i < $rating_count; $i++) { 
                  ?>
                  <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
                  <?php
                  }
                  while($rating_count < 5) {
                  ?>
                  <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
                  <?php        
                  $rating_count++;            
                  }
                  ?>
                </div>
                <span><?= (!empty($rating['rating_created'])) ? $rating['rating_created'] : "10.11.2020"; ?></span>
              </div>
            
              <p><?= (!empty($rating['rating_comments'])) ? $rating['rating_comments'] : "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";?></p>
            </div>
          </div>
        <?php } ?>
      <?php } else { ?>
          <h3 class="text-left text-center text-muted p-4 no-review"><?= __('store.there_are_no_reviews_for_this_product') ?></h3>
      <?php } ?>

        <?php if($allowReview){ ?>
            <hr>
            <div class="">
                <div class="clearfix"></div>
                <h2 class="write-review"><?= __('store.write_a_review') ?></h2><br>
                <div id="createRatting" class="create_Rating">
                    <input name="user_id" id="user_id" type="hidden" value="<?php echo !empty($session) ? $session['id'] : '';?>" />
                    <input name="product_id" value="<?php echo $product['product_id'];?>" id="product_id" type="hidden" />
                    <div class="form-group">
                        <label class="control-label"><?= __('store.your_review') ?></label>
                        <textarea name="comment" id="comment" placeholder="<?= __('store.your_review') ?>" cols="80" class="form-control"></textarea>
                        <div class="help-block"><span class="text-danger"><?= __('store.note') ?></span> <?= __('store.html_is_not_translated') ?></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= __('store.email') ?></label>
                        <input name="email" id="post_email" placeholder="<?= __('store.enter_your_email') ?>" type="text" value="" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label"><?= __('store.rating') ?></label>
                        <div class="clearfix"></div>
                        <div class="give-rating"></div>
                        <input name="rating" value="0" id="rating_star" type="hidden" />
                    </div>
                    <button class="btn btn-success" name="submit" id="submit" onclick="processRating()"> <?= __('store.leave_a_review') ?> </button>
                </div>
            </div>
        <?php } ?>
	     <!-- <div class="reviews-box">		 
		    <div class="reviews-img-wrap">
			   <img alt="img"  src="<?= base_url('assets/store/default/'); ?>img/c1.png">
			  </div>
			  <div class="rview-content-text">
          <div class="reviews-top-row">
            <h3>Metehan</h3>
            <div class="reviews-star">
              <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
              <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
              <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
              <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
              <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
            </div>
            <span>10.11.2020</span>
          </div>
			  
			    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			  </div>
		 </div>
		 
		 <div class="reviews-box">
		    <div class="reviews-img-wrap">
			    <img alt="img"  src="<?= base_url('assets/store/default/'); ?>img/c2.png">
			  </div>
        <div class="rview-content-text">
          <div class="reviews-top-row">
          <h3>Metehan</h3>
          <div class="reviews-star">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <span>10.11.2020</span>
          </div>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>
		 </div> -->
	  </div>
   </div>
</section>

<section class="related-products" style="display:none">
  <div class="container">
    <div class="home-trend-top pt-0">
      <h2 class="section-title">
        <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/package-b.png"> Similar Products
      </h2>
    </div>
  
    <div class="product-row d-flex flex-wrap product-list-related">
      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/product1.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car1.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>
      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car2.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>
      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car3.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>
      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car4.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car5.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/product1.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car1.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car2.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car3.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white" data-toggle="modal" data-target="#buyModel">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car4.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white">Buy Now</a>
          </div>
        </div>
      </div>

      <div class="product-wrapper">
        <div class="product-img position-relative">
          <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/car5.png" class="img-fluid primg">
          <div class="cn-flag position-absolute">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/flag.png"> Belgium, Provincie
            Brabant
          </div>
        </div>

        <div class="pr-content">
          <div class="rating-row d-flex justify-space-center">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st.png">
            <img alt="image" src="<?= base_url('assets/store/default/'); ?>img/st1.png">
          </div>
          <h3>Lorem Ipsum</h3>
          <p>What is Lorem Ipsum?</p>
          <div class="price">$659.00</div>
          <div class="product-buttons d-flex">
            <a href="#" class="btn btn-product bg-main2 text-white">Details</a>
            <a href="#" class="btn btn-product bg-main text-white">Buy Now</a>
          </div>
        </div>
      </div>
    </div>
    <a href="javascript:void(0);" class="see-more see-more-related" data-next_page="1">
			<img alt="image" src="<?= base_url('assets/store/default/'); ?>img/loading.png" /> Show more
		</a>
  </div>
</section>

<?= $social_share_modal; ?> 

<?php include 'product-list-template.php';  ?>


<script type="text/javascript">

  $(document).ready(function() {

    load_Product(null, {
      product_id : $('#product-category').data('product_id'),
      category_id : $('#product-category').data('category_id')
    });

    $(document).on('click', '#btn-add-to-wishlist',function(){
      <?php if($login_usr == false) { ?>
        window.location.replace('<?= base_url('store/login');?>');
      <?php } else { ?>

        let status = $(this).hasClass('w-listed');
        $(this).toggleClass('w-listed');
        $.ajax({
          url:'<?= base_url('Store/toggle_wishlist') ?>',
          type:'POST',
          dataType:'json',
          data: { product_id : <?= $product['product_id'] ?>},
          success:function(json){
            // do nothing
          },
        });
      <?php } ?>
    });

    // slick carousel
    $('.slider').slick({
      infinite: true,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 1,
      arrows: true,
      vertical: true,
      verticalSwiping: true,
      prevArrow: $('.prev-btn'),
      nextArrow: $('.next-btn')
    });

    $(".description-reviews-tabs a").click(function(){
      $(".description-reviews-tabs a").removeClass('active');
      $(this).addClass('active');
    });
    
    $(".checkout-payments-wrapper a").click(function(){
      $(".checkout-payments-wrapper a").removeClass('active');
      $(this).addClass('active');
    });
    
    $(".description-reviews-tabs a.rbtn").click(function(){
      $(".discription-reviews-content").hide();
      $(".product-reviews-all").show();
    });
    
    $(".description-reviews-tabs a.dbtn").click(function(){
      $(".discription-reviews-content").show();
      $(".product-reviews-all").hide();
    });

    if($('.give-rating').length) {
      $('.give-rating').starRating({
        initialRating:0,
        starSize: 20,
        readOnly:false,
        disableAfterRate:false,
        callback: function(currentRating, $el){
            $("#rating_star").val(currentRating);
        }
      });
    }

    $(document).on('click', '.see-more', function() {
      load_Product(null, {
        next_page: $(this).data('next_page'),
        product_id : $('#product-category').data('product_id'),
        category_id : $('#product-category').data('category_id')
      });
    });

    $(document).on('click', ".btn-apply-coupon", function(){
      let coupon_code = $(".apply-coupon .coupon-code").val();
      let product_id = '<?= $product['product_id'] ?>';
      if(coupon_code != "" && coupon_code != null) {
        $this = $(this);
        $.ajax({
            url:'<?= $add_coupon_url ?>',
            type:'POST',
            dataType:'json',
            data:{
                product_id:product_id,
                coupon_code:coupon_code,
            },
            beforeSend:function(){$this.btn("loading");},
            complete:function(){$this.btn("reset");},
            success:function(json){
                $(".coupon-msg").html('');
                
                if(json['success']){
                    $(".coupon-msg").html("<div class='alert alert-success' style='border-radius:20px;'>"+ json['success'] +"</div>");
                }
                if(json['error']){
                    $(".coupon-msg").html("<div class='alert alert-danger' style='border-radius:20px;'>"+ json['error'] +"</div>");
                }
            },
        });
      }
    });

    $(document).on('click', '.variations-pricing-row .add', function () {
        if ($(this).prev().val() < 350) {
          $(this).prev().val(+$(this).prev().val() + 1);
        }
    });
    
    $(document).on('click', '.variations-pricing-row .sub', function () {
        if ($(this).next().val() > 1) {
          if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        }
    });
  });


  function processRating(){
      if($('#name').length > 0){ var name = $('#name').val(); } else { var name = ''; }
      var email = $('#post_email').val();
      var rating_star = $('#rating_star').val();
      var product_id = $('#product_id').val();
      var user_id = $('#user_id').val();
      var comment = $('#comment').val();
      if(comment != '' && rating_star != 0){
          $("#submit").prop("disabled",true);
          $.ajax({
              type: 'POST',
              url: '<?php echo base_url();?>product/rating',
              data: 'product_id='+product_id+'&user_id='+user_id+'&comment='+comment+'&name='+name+'&email='+email+'&number='+rating_star,
              success : function(data) {
                  window.location.reload();
                  $("#submit").prop("disabled",false);
              }
          });
      } else {
          alert('<?= __('store.please_write_some_comment') ?>');
      }
  }

  function load_Product(search, postData = {}) {
		var data = postData;
		data.search = search;
		data.request_page = 'product-details';
		var ajaxReq = 'ToCancelPrevReq';
		var ajaxReq = $.ajax({
			url: "<?= base_url() ?>" + 'Store/load_Product',
			type: 'POST',
			dataType: 'JSON',
			data: data,
			beforeSend : function() {
				if(ajaxReq != 'ToCancelPrevReq' && ajaxReq.readyState < 4) {
					ajaxReq.abort();
				}
				$('.btn-search').addClass('btn-loading');
			},
			complete : function() {
				$('.btn-search').removeClass('btn-loading');
			},
			success: function(res) {
				if(res.related) {
          if(postData.next_page && postData.next_page > 1) {
            $('.product-list-related').append(Mustache.render($('#product-list-template').html(), res.related));
          } else {
            $('.product-list-related').html(Mustache.render($('#product-list-template').html(), res.related));
          }
					$('.see-more-related').data('next_page', res.related.next_page);
					if(res.related.is_last_page) {
						$('.see-more-related').hide();
					}
				}
			}
		});
	}

  var x, i, j, l, ll, selElmnt, a, b, c;
  /*look for any elements with the class "custom-select":*/
  x = document.getElementsByClassName("custom-select");
  l = x.length;
  for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
      /*for each option in the original select element,
      create a new DIV that will act as an option item:*/
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function(e) {
          /*when an item is clicked, update the original select box,
          and the selected item:*/
          var y, i, k, s, h, sl, yl;
          s = this.parentNode.parentNode.getElementsByTagName("select")[0];
          sl = s.length;
          h = this.parentNode.previousSibling;
          for (i = 0; i < sl; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
              s.selectedIndex = i;
              h.innerHTML = this.innerHTML;
              y = this.parentNode.getElementsByClassName("same-as-selected");
              yl = y.length;
              for (k = 0; k < yl; k++) {
                y[k].removeAttribute("class");
              }
              this.setAttribute("class", "same-as-selected");
              break;
            }
          }
          h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
      });
  }
  
  function closeAllSelect(elmnt) {
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
      if (elmnt == y[i]) {
        arrNo.push(i)
      } else {
        y[i].classList.remove("select-arrow-active");
      }
    }
    for (i = 0; i < xl; i++) {
      if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
      }
    }
  }

  document.addEventListener("click", closeAllSelect); 


  $(document).on('click', '.variations span', function(){
    $(this).parent().find('.active').removeClass('active');
    $(this).addClass('active');
    $('.btn-cart').removeAttr('data-original-title');
    hideTooltip();
    display_price_changes();
  });

  function display_price_changes() {
    let variationSelectedPrice = 0;
    if($('.variation-row .variations').length != 0) {
      $('.variation-row .variations').each(function(){
        let type = $(this).find('span:first-child').data('variation-type');
        let optionSpan = $(this).find('.active');
        variationSelectedPrice += optionSpan.length ? parseFloat(optionSpan.data('variation-price')) : 0;
      });
    }

    let product_regular_price = parseFloat(variationSelectedPrice + $('.regular-price').data('price')).toFixed(2);
    let product_sale_price = parseFloat(variationSelectedPrice + $('.sale-price').data('price')).toFixed(2);
    let currency = $('a[data-currency-symbol]').data('currency-symbol');

    $('.sale-price').text(currency+product_sale_price);
    $('.regular-price').text(currency+product_regular_price);
  }
</script>