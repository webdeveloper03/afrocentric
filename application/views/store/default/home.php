<?php //include(APPPATH.'/views/usercontrol/login/multiple_pages/header.php'); ?>
    
    <?php
    if(!empty($theme_sliders)):
    for ($i=0; $i < sizeof($theme_sliders); $i++) { 
        if($theme_sliders[$i]->status == 1){
            $heroData = $theme_sliders[$i];
            break;
        }
    }
    endif;

    $heroImage = (isset($heroData) && !empty($heroData->image)) ? base_url('assets/images/theme_images/'.$heroData->image) : base_url('assets/login/multiple_pages/img/hero-bg.jpg');
    ?>
<div class="banner-section">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
          
        <div class="carousel-item active">
             <div class="carousel-caption d-none" style="display:none">
                <h5>Silky Wine Dinner Dress with embraided blouse</h5>
                <p class = "">TG 25,00000</p>
              </div>
          <img src="<?=base_url();?>assets/images/1.jpg" alt="First slide" >
        </div>
        <div class="carousel-item">
            <div class="carousel-caption  d-none" style="display:none">
               <h5>Silky Wine Dinner Dress with embraided blouse</h5>
                <p class = "">NZ 25,00000</p>
              </div>
          <img src="<?=base_url();?>assets/images/2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <div class="carousel-caption  d-none" style="display:none">
                <h5>Silky Wine Dinner Dress with embraided blouse</h5>
                <p class = "">NZ 25,00000</p>
              </div>
          <img src="<?=base_url();?>assets/images/3.jpg" alt="Third slide">
        </div>
      </div>
    </div>
</div>

<div class="search-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-center pb-4">DISCOVER TOP BRANDS</h6>
                        <div class="text-left">
                        <b>    
                            <span class="btn btn-warning"><i class="mdi mdi-carrot"></i> Designers</span>
                            <span class="btn btn-default"><i class="mdi mdi-engine"></i> Tailors</span>
                            <span class="btn btn-default"><i class="mdi mdi-human-male-female"></i> Models</span>
                        </b>    
                        </div>
                        <div class="row pt-4 pb-4">
                            <div class="col-sm-12 col-md-3">
                                <div class="input-group">
                                    <input type="text" class="form-control bb-form-control" placeholder="Location">
                                    <div class="input-group-append">
                                        <span class="input-group-text bb-input-group-text">
                                            <i class="mdi mdi-map-marker"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <select class="form-control bb-form-control">
                                        <option value="">Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group pt-4">
                                    <input id="priceRange" type="text"/><br/>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-2 text-center">
                                <div class="form-group pt-2">
                                    <span class="btn btn-warning">
                                        <i class="fa fa-search"></i> Search
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-custom">
    <div class="category-section">
        <div class="row">
            <div class="col-sm-12 col-md-3 mb-2 category-box">
                <div class="card br-050">
                    <div class="card-body">
                        <h6 class="text-muted cateh6">Categories</h6>
                        <div class="row">
                            <?php
                            foreach($categories as $category){ ?>
                                <div class="col-sm-12 category-item">
                                    <img src="<?= $category->image_url ?>" />
                                    <a href = "<?= base_url(); ?>store/category/<?= $category->slug ?>"><?= $category->name ?></a>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 p-0 mb-2">
                <div class="card br-050">
                    <div class="card-body" style="padding:0px; border-radius:20px">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner seecond-car">
                            <div class="carousel-item active">
                              <img class="d-block w-100" src="https://theapp3star.com/afros/assets/images/product/upload/thumb/5.jpeg" alt="First slide">
                              <div class="carousel-caption carousel-caption-2 d-none d-md-block">
                                <h5 class="head-cara">Silky Wine Dinner Dress with embraided blouse</h5>
                                <p class="p-cara">TG 25,00000</p>
                              </div>
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="https://theapp3star.com/afros/assets/images/product/upload/thumb/4.jpeg" alt="Second slide">
                              <div class="carousel-caption carousel-caption-2 d-none d-md-block">
                                <h5 class="head-cara">Silky Wine Dinner Dress with embraided blouse</h5>
                                <p class="p-cara">TG 25,00000</p>
                              </div>
                            </div>
                            <div class="carousel-item">
                              <img class="d-block w-100" src="https://theapp3star.com/afros/assets/images/product/upload/thumb/6.jpeg" alt="Third slide">
                              <div class="carousel-caption carousel-caption-2 d-none d-md-block">
                                <h5 class="head-cara">Silky Wine Dinner Dress with embraided blouse</h5>
                                <p class="p-cara">TG 25,00000</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 mb-2 order-box">
                <div class="card br-050">
                    <div class="card-body">
                        <h6 class="pb-2"><b>Know the status of your Order</b></h6>
                        <div class="form-group pt-5 pb-2">
                            <input type="text" class="form-control bb-form-control" placeholder="OrderId">
                        </div>
                        <div class="form-group text-center pt-5">
                            <span class="btn btn-custom">Track Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!--product starts-->
    
    <div class="container mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="content"> <a href="<?= base_url(); ?>store/category/bespoke-men-3">
                        <div class="content-overlay"></div> <img class="content-image" src="https://theapp3star.com/afros/assets/images/product/upload/thumb/1.jpeg">
                        <div class="content-details fadeIn-bottom">
                            <button type="button" class="btn btn-outline-dark dark-lyt">BROWSE</button>
                        </div>
                    </a>
                    
                    </div>
                    <h3 class="content-title">Bespoke Wears</h3>
            </div>
            <div class="col-md-4">
                <div class="content"> <a href="<?= base_url(); ?>store/category/ready-to-wear-male-5">
                        <div class="content-overlay"></div> <img class="content-image" src="https://theapp3star.com/afros/assets/images/product/upload/thumb/2.jpeg">
                        <div class="content-details fadeIn-bottom">
                            <button type="button" class="btn btn-outline-dark dark-lyt">BROWSE</button>
                        </div>
                    </a>
                    
                    </div>
                    <h3 class="content-title">Ready to Wear</h3>
            </div>
            <div class="col-md-4">
                <div class="content"> <a href="<?= base_url(); ?>store/category/shoes-8">
                        <div class="content-overlay"></div> <img class="content-image" src="https://theapp3star.com/afros/assets/images/product/upload/thumb/3.jpeg">
                        <div class="content-details fadeIn-bottom">
                            <button type="button" class="btn btn-outline-dark dark-lyt">BROWSE</button>
                            
                        </div>
                    </a>
                    
                    </div>
                    <h3 class="content-title">Wedding Wears</h3>
            </div>
        </div>
    </div>

<div class="product-section">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h2 class="text-muted" style="font-weight: 300;">Latest Releases</h2>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="input-group">
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text bb-input-group-text">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control bb-form-control" placeholder="Search here" id="searchProduct">
                </div>
            </div>
        </div>
        <div class="row pt-4 pb-4">
            <div class="col-sm-12 col-md-2 pr-0">
                <select class="form-control form-control-2cus dropdown-toggle nb-form-control">
                    <option value="">Size</option>
                                    </select>
            </div>
            <div class="col-sm-12 col-md-2 p-0">
                <select class="form-control form-control-2cus dropdown-toggle nb-form-control">
                    <option value="">Color</option>
                </select>
            </div>
            <div class="col-sm-12 col-md-2 p-0">
                <select class="form-control form-control-2cus dropdown-toggle nb-form-control">
                    <option value="">Price</option>
                </select>
            </div>
            <div class="col-sm-12 col-md-2 p-0 pr-0">
                <select class="form-control form-control-2cus dropdown-toggle nb-form-control">
                    <option value="">Ratings</option>
                </select>
            </div>
            <div class="col-sm-12 col-md-4">
                <select class="form-control form-control-2cus2 dropdown-toggle nb-form-control">
                    <option value="">Sort By</option>
                </select>
            </div>
        </div>
        <div class="row pt-3">
               	<div class="product-row d-flex flex-wrap product-list-new"></div>
            	<a href="javascript:void(0);" class="see-more see-more-new" data-next_page="1" data-request_page_section="new">
            	<img alt="image" src="<?= base_url('assets/store/default/'); ?>img/loading.png" /> Show more
            	</a>
        </div>
    </div>
    
<div class="user-section">
        <div class="row">
            <div class="col-sm-12 col-md-4 mb-2">
                <div class="card br-10px align-items-center">
                    <img class="br-10px" src="<?= base_url('assets/images/common.jpg') ?>" />
                    <div class="br-10px overlay"></div>
                    <a class="browse-btn btn" href="#"> Explore </a>
                </div>
                <h4 class="text-center title">Our Designers</h4>
            </div>
            <div class="col-sm-12 col-md-4 mb-2">
                <div class="card br-10px align-items-center">
                    <img class="br-10px" src="<?= base_url('assets/images/common.jpg') ?>" />
                    <div class="br-10px overlay"></div>
                    <a class="browse-btn btn" href="#"> Explore </a>
                </div>
                <h4 class="text-center title">Our Tailors</h4>
            </div>
            <div class="col-sm-12 col-md-4 mb-2">
                <div class="card br-10px align-items-center">
                    <img class="br-10px" src="<?= base_url('assets/images/dummy/model2.jpg') ?>" />
                    <div class="br-10px overlay"></div>
                    <a class="browse-btn btn" href="#"> Explore </a>
                </div>
                <h4 class="text-center title">Our Models</h4>
            </div>
        </div>
    </div>
    <div class="blog-section">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <h2 class="text-muted" style="font-weight: 300;">What Happening?</h2>
            </div>
            <div class="col-sm-12 col-md-4">
                <a class="btn btn-custom pull-right">View Blogs</a>
            </div>
        </div>
        <div class="row pt-3">
            <?php foreach($blogs as $index => $value){ ?>
                <div class="col-sm-12 col-md-4">
                    <div class="card br-10px mb-4">
                        <img alt="image" src="<?= $value->image_url ?>" class="header-img" >
                        <div class="card-body pl-2 pr-2 pt-1">
                            <h5 class="text-center pt-3 pb-3">
                                <?= $value->name ?>
                            </h5>
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <?= character_limiter(strip_tags($value->description),150) ?>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-6">
                                    <img class="rounded-circle" src="<?=base_url();?>assets/images/users/1OCaeSc7oznKDwIZsQFMqbNgXGiPV4xW.jpg" alt="IMG" width="36px" /> 
                                    <span class="small-text"> John Doe</span>
                                </div>
                                <div class="col-sm-6">
                                    <span class="sp-toggle"><i class="fa fa-sliders" aria-hidden="true"></i></span>
                                    <div class="pull-right">
                                        <?= c_rating(3) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-sil btn-light">Colors</button>
                                    <button type="button" class="btn btn-sil btn-light">Fashion Lifestyle</button>
                                    <button type="button" class="btn btn-sil btn-light">Fashion</button>
                                    <button type="button" class="btn btn-sil btn-light">Lifestyle</button>
                                </div>
                            </div>
                            <div class="row pt-1">
                                <div class="col-sm-12 text-center">
                                    <a href="javascript:void(0)" class="btn btn-outline-dark w-50 mt-1 mb-2">
                                       Read More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>    

<?php include 'product-list-template.php';  ?>


<script type="text/javascript">
	$(document).on('click', '.blog-more', function(){
		var el = $(".blog-para"),
		curHeight = el.height(),
		autoHeight = el.css('height', 'auto').height();
		el.height(curHeight).animate({height: autoHeight}, 500);
		$(this).after('<a href="javascript:void(0);" class="blog-less">hide <br/> <i class="fas fa-angle-up"></i></a>');
		$(this).remove();
	});

	$(document).on('click', '.blog-less', function(){
		var el = $(".blog-para");
		el.animate({height: '50px'}, 500);
		$(this).after('<a href="javascript:void(0);" class="blog-more">show more <br/> <i class="fas fa-angle-down"></i></a>');
		$(this).remove();
	});

	$(document).ready(function() {
		load_Product($('#searchProduct').val());

		$('#searchProduct').keyup(function(e) {
			e.preventDefault();
			var search = $(this).val();
			load_Product(search);
		});
	});


	$(document).on('click', '.see-more', function() {
		load_Product(null, {
			next_page: $(this).data('next_page'),
			request_page_section: $(this).data('request_page_section')
		});
	});

	function load_Product(search, postData = {}) {
		var data = postData;
		data.search = search;
		data.request_page = 'home';
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
				if(res.trendings) {
					if(postData.next_page && postData.next_page > 1) {
						$('.product-list-trending').append(Mustache.render($('#product-list-template').html(), res.trendings));
					} else {
						$('.product-list-trending').html(Mustache.render($('#product-list-template').html(), res.trendings));
					}
					$('.see-more-trendings').data('next_page', res.trendings.next_page);
					if(res.trendings.is_last_page) {
						$('.see-more-trendings').hide();
					}
				}

				if(res.new) {
					if(postData.next_page && postData.next_page > 1) {
						$('.product-list-trending').append(Mustache.render($('#product-list-template').html(), res.new));
					} else {
						$('.product-list-new').html(Mustache.render($('#product-list-template').html(), res.new));
					}
					$('.see-more-new').data('next_page', res.new.next_page);
					if(res.new.is_last_page) {
						$('.see-more-new').hide();
					}
				}

				if(res.category.new && res.category.new.length) {
					$('.home-new-products .category-listing').html(res.category.new);
				}

				if(res.category.all && res.category.all.length) {
					$(".demo-cat-badge").hide();
					$('.categories-listing-row').html(res.category.all);
				}
			}
		});
	}
</script>