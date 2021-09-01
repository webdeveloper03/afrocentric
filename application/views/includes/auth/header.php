<!doctype html>
<html lang="en">
  <head>
      
    <?php
    $db =& get_instance();

    $set_arr = ['site'];
    $settings = $db->Setting_model->getAllSettings($set_arr);
    $siteSetting = $settings['site'];

    if($siteSetting['favicon']){
      echo '<link rel="icon" href="'. base_url('assets/images/site/'.$siteSetting['favicon']) .'" type="image/*" sizes="16x16">';
    }

    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $siteSetting['name'] ?></title>
    <meta name="author" content="<?= $siteSetting['meta_author'] ?>">
    <meta name="keywords" content="<?= $siteSetting['meta_keywords'] ?>">
    <meta name="description" content="<?= $siteSetting['meta_description'] ?>">
        <link href="<?=base_url();?>assets/css/style3.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $setting['heading'] ?></title>
    <!--Jost font-->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

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

    <link href="<?=base_url();?>assets/vertical/assets/plugins/magnific-popup/magnific-popup.css?v=4.2" rel="stylesheet" type="text/css">
      <link href="<?=base_url();?>assets/js/jquery-confirm.min.css?v=4.2" rel="stylesheet">
      <link href="<?=base_url();?>assets/vertical/assets/plugins/morris/morris.css?v=4.2" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
      <link href="<?=base_url();?>assets/vertical/assets/css/bootstrap.min.css?v=4.2" rel="stylesheet" type="text/css">
      <link href="<?=base_url();?>assets/vertical/assets/css/icons.css?v=4.2" rel="stylesheet" type="text/css">
      <link href="<?=base_url();?>/assets/vertical/assets/css/style2.css?v=4.2" rel="stylesheet" type="text/css">
      <link href="<?=base_url();?>assets/vertical/assets/css/style.css?v=4.2" rel="stylesheet" type="text/css">
      <link href="<?=base_url();?>assets/css/style3.css?v=4.2" rel="stylesheet" type="text/css">
      <link href="<?=base_url();?>assets/vertical/assets/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css?v=4.2" rel="stylesheet" type="text/css" media="screen">
      <link rel="icon" href="assets/images/site/Gxc7lWXRSAbUHdaui2oQek9D403Efjw11.png" type="image/*" sizes="16x16">
      <link href="<?=base_url();?>assets/css/jquery.uploadPreviewer.css?v=4.2" rel="stylesheet" type="text/css" media="screen">
      <script src="<?=base_url();?>assets/js/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>
      html {
          scroll-behavior: smooth;
        }
      .select2-container .select2-selection--single .select2-selection__arrow b {
            border-color: #000 transparent transparent transparent;
            border-width: 6px 6px 0 6px;
        }
        label{
            color:#000;
        }
        .select2-container .select2-selection--single{
            border-top: unset;
            border-left: unset;
            border-right: unset;
            border-radius: 0;
            border-bottom: solid thin #000;
        }      
        #terms-error{
            color: #e84848;
            position: absolute !important;
            margin-left: 8px !important;
            margin-top: 20px !important;
        }
      </style>
  </head>
  <body>
  <div class="auth-main">
    <div class="auth-wrapper">