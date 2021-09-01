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
                                    <span><?= $category->name ?></span>
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
                        <h6 class="pb-2">Know the status of your Order</h6>
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
                <div class="content"> <a href="#">
                        <div class="content-overlay"></div> <img class="content-image" src="https://theapp3star.com/afros/assets/images/product/upload/thumb/1.jpeg">
                        <div class="content-details fadeIn-bottom">
                            <button type="button" class="btn btn-outline-dark dark-lyt">BROWSE</button>
                        </div>
                    </a>
                    
                    </div>
                    <h3 class="content-title">Bespoke Wears</h3>
            </div>
            <div class="col-md-4">
                <div class="content"> <a href="#">
                        <div class="content-overlay"></div> <img class="content-image" src="https://theapp3star.com/afros/assets/images/product/upload/thumb/2.jpeg">
                        <div class="content-details fadeIn-bottom">
                            <button type="button" class="btn btn-outline-dark dark-lyt">BROWSE</button>
                        </div>
                    </a>
                    
                    </div>
                    <h3 class="content-title">Ready to Wear</h3>
            </div>
            <div class="col-md-4">
                <div class="content"> <a href="#">
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
    
    <!--product ends-->
    
    
    <div class="feature-category-section d-none">
        <div class="row">
            <?php foreach($featureCategories as $fcategory){ ?>
                <div class="col-sm-12 col-md-4 mb-2">
                    <div class="card br-10px align-items-center">
                        <img class="br-10px" src="<?= base_url("assets/images/".$fcategory->image_url); ?>" />
                        <div class="br-10px overlay"></div>
                        <a class="browse-btn btn" href="#"> Browse </a>
                    </div>
                    <h4 class="text-center mt-3 mb-3" style="font-weight: 400;"><?= $fcategory->name ?></h4>
                </div>
            <?php } ?>
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
                    <input type="text" class="form-control bb-form-control" placeholder="Search here">
                </div>
            </div>
        </div>
        <div class="row pt-4 pb-4">
            <div class="col-sm-12 col-md-2 pr-0">
                <select class="form-control form-control-2cus dropdown-toggle nb-form-control">
                    <option value="">Size</option>
                    <?php
                    /*foreach($orderOptions as $key => $value){ 
                        $selected = '';
                        if($key == $orderBy){
                            $selected = 'selected="selected"';
                        }
                        ?>
                        <option value="<?= $key ?>" <?= $selected ?> >
                            <?= $value ?>
                        </option>
                    <?php } */ ?>
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
            <?php foreach($products as $index => $value){ ?>
                <div class="col-sm-12 col-md-6 col-lg-3 card-col-padding">
                    <div class="card br-10px mb-4 shadow-sm">
                        <img alt="image" src="<?= $value->product_featured_image_url ?>" class="header-img" >
                        <div class="card-body pl-2 pr-2 pt-1">
                            <div class="doc-sec rounded-circle pull-right">
                                <i class="fa fa-file-text"></i>
                            </div>
                            <div class="product-title mb-2">
                                <?= $value->product_name ?>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-6">
                                    <!--<p class="product-title mb-2">Antenatal Program</p>-->
                                    <img class="rounded-circle crd-imag" src="<?=base_url();?>assets/images/users/1OCaeSc7oznKDwIZsQFMqbNgXGiPV4xW.jpg" alt="IMG" width="36px" /> 
                                    <span class="small-text"> John Doe</span>
                                </div>
                                <div class="col-sm-6">
                                    <div class="pull-right">
                                        <?= c_rating(3) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <div class="col-sm-6">
                                    <span class="circle" style="background-color:#FFAF2E"></span>
                                    <span class="circle" style="background-color:#222224"></span>
                                    <span class="circle" style="background-color:#FFFFFF"></span>
                                    <span class="circle" style="background-color:#0000FF"></span>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="m-0 pull-right">N<?= $value->product_price ?></h6>
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-sm-12 text-center">
                                    <a href="#" class="btn btn-custom">
                                       View Product
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    
<!-- home page product grid -->
<section class="home-product-grid">
	<div class="container">
		<div class="home-trend-top d-flex justify-content-between">
			<h2 class="section-title">
			<img alt="image" src="<?= base_url('assets/store/default/'); ?>img/package-b.png" /> Trend Products
			</h2>
			<div class="searchbox">
			<input id="searchProduct" type="text" placeholder="Search" />
			<img src="<?= base_url('assets/store/default/'); ?>img/search.png" class="search-icon-home" alt="search">
			</div>
		</div>
		
		<!-- <div class="input-group mb-4">
			<input type="text" class="form-control" id="searchProduct" placeholder="Search Products" />
				<div class="input-group-append">
			<button class="btn btn-primary btn-search" type="button"><i class="fas fa-search"></i></button>
			</div>
		</div> -->

		<div class="product-row d-flex flex-wrap product-list-trending">
			
		</div>
		<a href="javascript:void(0);" class="see-more see-more-trendings" data-next_page="1" data-request_page_section="trending">
			<img alt="image" src="<?= base_url('assets/store/default/'); ?>img/loading.png" /> Show more
		</a>
	</div>
</section>    
    
    
    
    <p class = "product-list-trending">OK</p>
    
    
    
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