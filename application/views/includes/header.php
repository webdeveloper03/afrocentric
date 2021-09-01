<!doctype html>
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $siteSetting['name'] ?></title>
    <meta name="author" content="<?= $siteSetting['meta_author'] ?>">
    <meta name="keywords" content="<?= $siteSetting['meta_keywords'] ?>">
    <meta name="description" content="<?= $siteSetting['meta_description'] ?>">
    <title><?= $setting['heading'] ?></title>
    <!--Jost font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

    <!-- Icons -->
    <link href="<?php echo base_url(); ?>assets/vertical/assets/css/icons.css?v=<?= av() ?>" rel="stylesheet" type="text/css">

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
  </head>
  <body>
    <?php 
    $fbmessager_status = (array)json_decode($siteSetting['fbmessager_status'],1);
    
    
    $userData = $this->session->userdata('user');

    
    
    
    if(in_array('front', $fbmessager_status)){
      echo $siteSetting['fbmessager_script'];
    }

    $homeHeaderActive = $exploreHeaderActive = $orderHeaderActive = $wishlistHeaderActive = $communityHeaderActive = $blogHeaderActive = $aboutUsHeaderActive = $contactUsHeaderActive = $cartHeaderActive = $forumHeaderActive = $accountHeaderActive = '';
    if(base_url(uri_string()) == base_url('/')) $homeHeaderActive = 'active';
    if(base_url(uri_string()) == base_url('/explore')) $exploreHeaderActive = 'active';
    if(base_url(uri_string()) == base_url('/order')) $orderHeaderActive = 'active';
    if(base_url(uri_string()) == base_url('/wishlist')) $wishlistHeaderActive = 'active';
    if(base_url(uri_string()) == base_url('/community')) $communityHeaderActive = 'active';
    if(base_url(uri_string()) == base_url('/blog')) $blogHeaderActive = 'active';
    if(base_url(uri_string()) == base_url('/about-us')) $aboutUsHeaderActive = 'active';
    if(base_url(uri_string()) == base_url('/contact-us')) $contactUsHeaderActive = 'active';

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
            <a class="nav-link" href="<?= base_url('/order') ?>">Orders</a>
          </li>
          <li class="nav-item <?= $wishlistHeaderActive ?>">
            <a class="nav-link" href="<?= base_url('/wishlist') ?>">Wishlist</a>
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
          <li class="nav-item nav-item-con pl-5 <?= $cartHeaderActive ?>">
            <a class="nav-link" href="javascript:void(0)">
              <div class="icon-div">
                <i class="fa fa-shopping-cart"></i>
              </div>
            </a>
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
                <a class="dropdown-item"  href="<?php echo base_url();?>usercontrol/dashboard"><i class="fa fa-user-circle-o" style ="font-size:12px" aria-hidden="true"></i> Account</a>
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