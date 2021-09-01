<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $db =& get_instance();

    $set_arr = ['loginclient','site','googlerecaptcha','tnc'];
    $settings = $db->Setting_model->getAllSettings($set_arr);
    $setting = $settings['loginclient'];
    $siteSetting = $settings['site'];
    $googlerecaptcha = $settings['googlerecaptcha'];
    $tnc = $settings['tnc'];

    if($siteSetting['google_analytics']){ echo $siteSetting['google_analytics']; }
    if($siteSetting['faceboook_pixel']){ echo $siteSetting['faceboook_pixel']; }

    $logo = base_url($siteSetting['logo'] ? 'assets/images/site/'.$siteSetting['logo'] : 'assets/images/logo-white.png');

    if($siteSetting['favicon']){
      echo '<link rel="icon" href="'. base_url('assets/images/site/'.$siteSetting['favicon']) .'" type="image/*" sizes="16x16">';
    }

    $global_script_status = (array)json_decode($siteSetting['global_script_status'],1);
    if(in_array('front', $global_script_status)){ echo $siteSetting['global_script']; }
    ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <meta name="author" content=""/>
    
    <meta property='og:url' content='<?= $_SERVER['REQUEST_URI']; ?>'/>
    <?php if(isset($meta_title)){ ?> <meta property="og:title" content="<?php echo $meta_title ?>"/><?php } ?>
    <?php if(isset($meta_description)){ ?> 
      <meta name="description" content="<?php echo $meta_description ?>"/>
      <meta property="og:description" content="<?php echo $meta_description ?>"/>
    <?php } ?>
    <?php if(isset($meta_image)){ ?> <meta property="og:image" content="<?php echo $meta_image ?>"/><?php } ?>
    <?php 
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
    <meta property="og:url" content="<?= $actual_link ?>"/>
    <meta name="twitter:card" content="summary_large_image"/>

    <?php if($store_setting['favicon']){ ?>
        <link rel="icon" href="<?= base_url('assets/images/site/'.$store_setting['favicon']) ?>" type="image/*" sizes="16x16">
    <?php } ?>

    <title><?= $store_setting['name'] ?>  <?= isset($meta_title) ? '- ' . $meta_title : '' ?></title>

    <!--  CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>fonts/fonts.css" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>fonts/fonts.css" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/placeholder-loading.css" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/sweetalert2.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/nouislider.css" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

  
    
    <!--OUR STYLES-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
      <!-- Fontawesome CSS -->
      <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
      <style>
          .fa-user-circle-o:before {
            font-size: 16px !important;
        }
     .content-image{
        width:100% !important;
    }
        
.carousel-caption {
    bottom: 150px !important;
    color:#000 !important;
}
      </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css" integrity="sha512-vIgFb4o1CL8iMGoIF7cYiEVFrel13k/BkTGvs0hGfVnlbV6XjAA0M0oEHdWqGdAVRTDID3vIZPOHmKdrMAUChA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/login/multiple_pages') ?>/css/owl.carousel.min.css">
    <link href="<?=base_url();?>assets/css/style3.css?v=4.2" rel="stylesheet" type="text/css">
    <link href="<?=base_url();?>assets/vertical/assets/css/style2.css?v=4.2" rel="stylesheet" type="text/css">
        <link href="<?=base_url();?>assets/css/style4.css?v=4.2" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?= base_url('assets/store/default/'); ?>css/style.css" />

    <!-- Icons -->
    <link href="<?php echo base_url(); ?>assets/vertical/assets/css/icons.css?v=<?= av() ?>" rel="stylesheet" type="text/css">
    
    <script src="<?= base_url('assets/store/default/'); ?>js/jquery-3.5.1.slim.min.js"></script>
    <script src="<?= base_url('assets/store/default/'); ?>js/jquery.min.js"></script>
    <script src="<?= base_url('assets/store/default/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/plugins/store/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/plugins/store/') ?>jquery.star-rating-svg.js"></script>
    <script src="<?= base_url('assets/store/default/') ?>js/nouislider.min.js"></script>
    <script src="<?= base_url('assets/store/default/') ?>js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/plugins/') ?>mustache.js"></script>
    <style>
        .category-item a{
            color:#000;
        }
        .category-item a:hover{
            color:#FFAF2E;
        }
    </style>
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.css">

    <!-- jQuery Js-->
    <script src="<?= base_url('assets/js/jquery-2.2.4.min.js') ?>"></script>

    <!--Popper Js-->
    <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>

    <!--Bootstrap Js-->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <style>
        .carousel-inner{
            height:500px;
        }
        .banner-section .carousel .carousel-item{
            height:unset;
        }
    </style>
    
    <script type="text/javascript">
      try {
          <?php 
          if($store_setting['google_analytics'] != ''){
            $ana = preg_replace('/<script>/', '', $store_setting['google_analytics']);
            $ana = preg_replace('/<\/script>/', '', $ana);
            echo $ana;
          } 
          ?>
      } catch (error) {
        console.log(error);
      }
    </script>

    <?php 
    $global_script_status = (array)json_decode($SiteSetting['global_script_status'],1);
    if(in_array('store', $global_script_status)){
        echo $SiteSetting['global_script'];
    }
    ?>

    <script type="text/javascript">
        (function ($) {
            $.fn.btn = function (action) {
                var self = $(this);
                if (action == 'loading') {
                    if ($(self).attr("disabled") == "disabled") {
                      //e.preventDefault();
                    }
                    $(self).attr("disabled", "disabled");
                    $(self).attr('data-btn-text', $(self).html());
                    $(self).html('<i class="fa fa-spinner fa-spin"></i>&nbsp;' + $(self).text());
                }
                if (action == 'reset') {
                    $(self).html($(self).attr('data-btn-text'));
                    $(self).removeAttr("disabled");
                }
            }
        })(jQuery);
        var formDataFilter = function(formData) {
            if (!(window.FormData && formData instanceof window.FormData)) return formData
            if (!formData.keys) return formData
            var newFormData = new window.FormData()
            Array.from(formData.entries()).forEach(function(entry) {
                var value = entry[1]
                if (value instanceof window.File && value.name === '' && value.size === 0) {
                    newFormData.append(entry[0], new window.Blob([]), '')
                } else {
                    newFormData.append(entry[0], value)
                }
            });
            return newFormData;
        }
    </script>

    <?php if (is_rtl()) { ?>
      <!-- place here your RTL css code -->
    <?php } ?>
</head>

<body>


    <!--OUR STYLES-->
    
     <?php 
    $userData = $this->session->userdata('user');
?>
  <header class="header-navbar">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
      <a class="navbar-brand" href="<?= base_url('/') ?>">
        <img src="<?= $logo ?>" alt="<?= $setting['heading'] ?>" style="max-height: 50px;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="header_search_seaction">
        <input type="text" placeholder="What are you looking for?">
      </div>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item <?= $homeHeaderActive ?>">
            <a class="nav-link" href="<?= base_url('/') ?>">Home</a>
          </li>
          <li class="nav-item <?= $exploreHeaderActive ?>">
            <a class="nav-link" href="<?= base_url('/explore') ?>">Explore</a>
          </li>
          <li class="nav-item <?= $orderHeaderActive ?>">
            <a class="nav-link" href="<?= base_url('store/order') ?>">Orders</a>
          </li>
          <li class="nav-item <?= $wishlistHeaderActive ?>">
            <a class="nav-link" href="<?= base_url('store/wishlist') ?>">Wishlist</a>
          </li>
          <li class="nav-item <?= $communityHeaderActive ?>">
            <a class="nav-link" href="<?= base_url('/community') ?>">Community</a>
          </li>
          <li class="nav-item <?= $blogHeaderActive ?>">
            <a class="nav-link" href="<?= base_url('/blog') ?>">Blog</a>
          </li>
          <li class="nav-item <?= $aboutUsHeaderActive ?>">
            <a class="nav-link" href="<?= base_url('/about-us') ?>">About Us</a>
          </li>
          <li class="nav-item d-none <?= $contactUsHeaderActive ?>">
            <a class="nav-link" href="<?= base_url('/contact') ?>">Contact Us</a>
          </li>
          <li class="nav-item nav-item-con pl-5 cart-top">
                                <div class="icon-div">
                <i class="fa fa-shopping-cart"></i>
              <span class="cart-count badge badge-pill badge-warning crt">0</span>
              </div>
                                <div class="cart-dropdown">
                                    <div class="cart-empty">
                                        <img src="<?= base_url('assets/store/default/'); ?>img/cart-icon-empty.png" alt="Icon">
                                        <p>Cart Is Blank</p>
                                    </div>
                                </div>
          </li>
          <li class="nav-item nav-item-con <?= $forumHeaderActive ?>">
            <a class="nav-link" href="javascript:void(0)">
              <div class="icon-div">
                <i class="fa fa-forumbee"></i>
              </div>
            </a>
          </li>
          
          <?php if(!empty($userData)){?>
         
          <li class="nav-item nav-item-con <?= $accountHeaderActive ?>">
            <div class="dropdown">
              <button class="btn dropdown-toggle text-white " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome: <?php echo $userData['firstname']; ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item"  href="<?php echo base_url();?>store/order"><i class="fa fa-shopping-bag" style ="font-size:12px" aria-hidden="true"></i> My Orders</a>
                <a class="dropdown-item" href="<?php echo base_url();?>logout"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
              </div>
            </div>
          </li>
          
          <?php } else{?>
          
           <li class="nav-item nav-item-con <?= $accountHeaderActive ?>">
            <a class="nav-link" href="<?php echo base_url();?>login">
            <div class="icon-div">
              <i class="fa fa-user-circle-o"></i>
            </div>
            </a>
          </li>
          
          
          <?php } ?>
        </ul>
            <!-- <a href="<?= base_url('/login') ?>" class="btn-login my-2 my-lg-0">Log in</a> -->
      </div>
    </nav>
  </header>
  <main id="content" role="main">
    <div class="">
    
    <!--OUR STYLES-->
    
    

    <div class="page-wrapper">
        <?php echo $content ?>
    </div>

    </div>
    </main>
    <!--Footer Area-->

    <footer class="footer bg-dark text-white">
        <div class="container-custom">
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <a class="text-warning" href="javascript:void(0)">
                        <h6 class="mt-2">Privacy Policy</h6>
                    </a>
                </div>
                <div class="col-sm-6"> 
                    <h6 class="mt-2 text-center">
                        <i class="mdi mdi-copyright"></i> Afrocentric Kulture <?= date('Y') ?>
                    </h6>
                </div>
                <div class="col-sm-3">
                    <h6 class="mt-2 text-center">
                        <i class="mdi mdi-facebook"></i>
                        <i class="mdi mdi-instagram"></i>
                    </h6>
                </div>
            </div>
        </div>
    </footer><!--Footer Area-->

    <!-- Owl Carousel Js-->
    <script src="<?= base_url('assets/login/multiple_pages') ?>/js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/login/multiple_pages') ?>/js/jquery.mousewheel.min.js"></script>

    <!--Active Js-->
    <script src="<?= base_url('assets/login/multiple_pages') ?>/js/active.js"></script>  
<div class="modal fade" id="cart-confirm" tabindex="-1" aria-labelledby="cart-confirm" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="popup-content">
		<img src="<?= base_url('assets/store/default/'); ?>img/shopping-cart.png" class="pop-cart-img" alt="Icon">
		<h2 id="product-name-prev"></h2>
		<p><?= __('store.has_beent_added_to_your_cart') ?></p>
		<img src="<?= base_url('assets/store/default/'); ?>img/popline.png" class="img-fluid img-popline" alt="Icon">
		<div class="pop-btn-row">
			<a href="<?= $base_url ?>checkout" class="btn btn-poup bg-main2"><?= __('store.procceed_to_checkout') ?></a>
			<a href="javascript:void(0);" type="button" class="btn btn-poup bg-main" data-dismiss="modal"><?= __('store.continue_shopping') ?></a>
			<!-- <a href="<?= base_url("/store") ?>" class="btn btn-default mb-2 text-dark"><?= __('store.continue_shopping') ?></a> -->
		</div>
		</div>
	</div>
	</div>
</div>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css" rel="stylesheet" type="text/css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>

<?php if($this->session->flashdata('success')){ ?>
    <script>
      Swal.fire({
        icon: 'info',
        text: '<?= $this->session->flashdata('success') ?>'
      });
    </script>
<?php } ?>
<?php if($this->session->flashdata('error')){ ?>
  <script>
      Swal.fire({
        icon: 'info',
        text: '<?= $this->session->flashdata('error') ?>'
      });
    </script>
<?php } ?>
<script type="text/javascript">

// Tooltip

$('.btn-cart').tooltip({
  trigger: 'click',
  placement: 'top'
});

function setTooltip(message) {
  $('.btn-cart').tooltip('hide').attr('data-original-title', message).tooltip('show');
}

function hideTooltip() {
  $('.btn-cart').tooltip('hide');
}


  $(function(){ 
    $(document).on('click', ".btn-cart", function(){
      let quantity = ($('input#product-quantity').length) ? $('input#product-quantity').val() : 1;
      let product_name = $(this).data('product_name');
      let product_id = $(this).data('product_id');
      $this = $(this);

      let variationNotSelected = [];
      let variationSelected = {};

      if($('.variation-row .variations').length != 0) {
        $('.variation-row .variations').each(function(){
          let type = $(this).find('span:first-child').data('variation-type');
          let optionSpan = $(this).find('.active');
          if(optionSpan.length) {
            if(type == 'colors') {
              variationSelected[type] = optionSpan.data('variation-code')+"-"+optionSpan.data('variation-name');
            } else {
              variationSelected[type] = optionSpan.data('variation-option');
            }
          } else {
            variationNotSelected.push(type);
          }
        });
      }

      if(variationNotSelected.length){
        let warningMessage = "Please select "
        for (let index = 0; index < variationNotSelected.length; index++) {
          const element = variationNotSelected[index];
          warningMessage += (index == 0) ? element : ", "+element
        }
        setTooltip(warningMessage+' before add to cart!');
      } else {
        $.ajax({
          url:'<?= $add_tocart_url ?>',
          type:'POST',
          dataType:'json',
          data: {
            quantity:quantity,
            product_id:product_id,
            variation:variationSelected,
          },
          beforeSend: function(){$this.btn("loading");},
          complete: function(){$this.btn("reset");},
          success: function(json) {
            if(json['location']){
              updateCart();
              //window.location = json['location'];
              $('#cart-confirm #product-name-prev').text(product_name)
              $("#cart-confirm").modal("show");
            }
          }
        });
      }
    });

    $(document).on("click", ".cart-dropdown .btn-remove-cart", function(){
      $this = $(this);
      $.ajax({
          url:$this.attr("data-href"),
          type:'POST',
          dataType:'json',
          beforeSend:function(){},
          complete:function(){},
          success:function(json){
              updateCart();              
          },
      })
      return false;
    });

    $(document).on('click', ".cart-top", function(){
      $(".js-dropdown-list").hide();
      $(".js-dropdown-list1").hide();
      $(".js-dropdown-list2").hide();
      $(".cart-dropdown").slideToggle();
    });

    updateCart();
  });

  $(function(){
    $("#login-form input, #register-form input").focus(function(){
      if($(document).width() <= 408){
        $(".navbar-expand-lg,footer").hide();
      }
    });

    $("#login-form input, #register-form input").blur(function(){
      $(".navbar-expand-lg,footer").show();
    });
  });
  
  $(function(){
    function updateSymbol(e) {
      var selected = $(".currency-selector option:selected");
      $(".currency-symbol").text(selected.data("symbol"));
      $(".currency-amount").prop("placeholder", selected.data("placeholder"));
      $(".currency-addon-fixed").text(selected.text());
    }

    $(".currency-selector").on("change", updateSymbol);

    updateSymbol(); 
  });
  
  $(function () {
    var list = $(".js-dropdown-list");
    var link = $(".js-link");
    link.click(function (e) {
      e.preventDefault();
      $(".js-dropdown-list1").hide();
      $(".js-dropdown-list2").hide();
      $(".cart-dropdown").hide();
      list.slideToggle(200);
    });
    list.find("li").click(function () {
      var text = $(this).html();
      link.html(text);
      list.slideToggle(200);
      if (text === "* Reset") {
        link.html("Select one option" + icon);
      }
    });
  });

  $(function() {
    var list = $('.js-dropdown-list1');
    var link = $('.js-link1');
    link.click(function(e) {
        e.preventDefault();
        $(".js-dropdown-list").hide();
        $(".js-dropdown-list2").hide();
        $(".cart-dropdown").hide();
        list.slideToggle(200);
    });
    list.find('li').click(function() {
        var text = $(this).html();
        link.html(text);
        list.slideToggle(200);
        if (text === '* Reset') {
        link.html('Select one option'+icon);
        }
    });
  });

  $(function () {
    var list = $(".js-dropdown-list2");
    var link = $(".js-link2");
    link.click(function (e) {
      e.preventDefault();
      $(".js-dropdown-list1").hide();
      $(".js-dropdown-list").hide();
      $(".cart-dropdown").hide();
      list.slideToggle(200);
    });
    // list.find("li").click(function () {
    //   list.slideToggle(200);
    // });
  });
    
  window.onscroll = function() {
    let header = document.getElementById("myHeader");
    let sticky = header.offsetTop;
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
  }
</script>

<script type="text/javascript">
<?php 
if(isset($store_setting['notification']) && sizeOf(json_decode($store_setting['notification']) > 0)) { 
?>
  $(document).ready(function() {
    var items = <?= $store_setting['notification']; ?>,
    $text = $('.top-bar .container'),
    delay = 2;

    var filtered = items.filter(function (el) {
      return (el != null && el != ""  );
    });

    if(filtered.length > 0) {
      filtered.push(filtered.shift());
      function loop ( delay ) {
          $.each(filtered, function ( i, elm ){
            $text.delay( delay*1E3).fadeOut();
            $text.queue(function(){
                $text.html('<img alt="image" src="<?= base_url('assets/store/default/'); ?>img/top-icon.png" /> '+filtered[i]);
                $text.dequeue();
            });
            $text.fadeIn();
            $text.queue(function(){
                if ( i == filtered.length -1 ) {
                    loop(delay);   
                }
                $text.dequeue();
            });
          });
      }
      loop(delay);
    }
  });
  <?php } ?>

  function updateCart(){
      $.ajax({
          url:'<?= $base_url ?>/mini_cart',
          type:'POST',
          dataType:'json',
          beforeSend:function(){},
          complete:function(){},
          success:function(json){
              $(".cart-top .cart-dropdown").html(json['cart']);
              $(".cart-top .cart-count").html(json['total']);
              $('#cart-sub-total').text(json['sub_total']);
          },
      });
    }
</script>

<script>
    $("#priceRange").slider({ 
        id: "priceRangeSlider", 
        min: 0, 
        max: 100000, 
        range: true, 
        value: [1000, 50000],
        tooltip: 'always'
    });
</script>
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


</script>
</body>
</html>