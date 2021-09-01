<?php
   $db =& get_instance();
   $products = $db->Product_model;
   $store_setting =$db->Product_model->getSettings('store');
   $userdetails=$db->Product_model->userdetails();
   $license = $products->getLicese();
   $notifications = $products->getnotificationnew('admin',null,5);
   $notifications_count = $products->getnotificationnew_count('admin',null);
  
   $csss = array(
   	'sidebar_background_color' =>  array('type' => 'background', 'selectotr' => '.left.side-menu, .left.side-menu, #sidebar-menu, .left.side-menu, #sidebar-menu .custom-menu-link a'),
   	'sidebar_menu_background_color'                 =>  array('type' => 'background', 'selectotr' => '.left.side-menu #sidebar-menu li:not(.custom-menu-link) a'),
   	'sidebar_menu_text_color'                       =>  array('type' => 'color', 'selectotr' => '.left.side-menu #sidebar-menu li:not(.custom-menu-link) a'),
   	'sidebar_menu_bottom_links_background_color'    =>  array('type' => 'background', 'selectotr' => '.left.side-menu #sidebar-menu .custom-menu-link a span'),
   	'sidebar_menu_bottom_links_text_color'          =>  array('type' => 'color', 'selectotr' => '.left.side-menu #sidebar-menu .custom-menu-link a span'),
   );
?>
<style type="text/css">
   <?php 
      $setting = $products->getSettings('adminside');
      foreach ($csss as $key => $d) {
      	if(isset($setting[$key]) && $setting[$key] != ''){
      		echo "\n{$d['selectotr']}{";
      		echo "\t {$d['type']} : ".$setting[$key]. "!important;" ;
      		echo "}";
      	}
      } 
  	?>
   .reload-btn{
	   border-radius: 50%;
	   width: 25px;
	   height: 25px;
	   display: flex;
	   align-items: center;
	   justify-content: center;
   }
   .server-last-update span,
   .dashboard-refresh span {
	   background: rgba(164, 91, 207,0.2);
	   border: solid 1px rgba(164, 91, 207,0.3);
	   padding: 2px 7px;
   }
</style>
<div class="left side-menu" style="padding-bottom:80px;">
   <div class="sidebar-inner slimscrollleft">
      <div id="sidebar-menu" style="padding-bottom:0px; !important">
         <ul>
            <li>
               <a href="<?php echo base_url(); ?>admincontrol/dashboard" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span><?= __('admin.menu_dashboard') ?></a>
            </li>
      
            <?php /*<li class="has_sub">
               <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-debug-step-over"></i> <span><?= __('admin.steps_guide') ?></span> <span class="badge badge-danger float-right">i</span></a>
               <ul class="list-unstyled">
                  <li><a href="<?php echo base_url('firstsetting') ?>"><i class="mdi mdi-menu-right"></i><span><?= __('admin.menu_firstsetting') ?></a></li>
                  <li><a href="<?php echo base_url('integration/how_to_start') ?>"><i class="mdi mdi-menu-right"></i><?= __('admin.how_to_integrate') ?></a></li>
               </ul>
            </li>
         
         <hr> */ ?>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-shopping"></i> <span><?= __('admin.orders') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <?php /*<a href="<?= base_url();?>admincontrol/listorders/">*/ ?>
                  <a href="<?= base_url();?>admin/order">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.all_orders') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/order/active">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.active_orders') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/order/pending">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.pending_orders') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/order/returned">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.return_orders') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/order/closed">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.closed_orders') ?>
                  </a>
               </li>
            </ul>
         </li>
         
         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-account-multiple"></i> <span><?= __('admin.customers') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="<?= base_url();?>admin/user/customers">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.all_customers') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/user/blocked_customers">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.blocked_customers') ?>
                  </a>
               </li>
            </ul>
         </li>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-carrot"></i> <span><?= __('admin.designers') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="<?= base_url();?>admin/user/designers">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.all_designers') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/user/designer_applications">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.designers_application') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/user/blocked_designers">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.blocked_designers') ?>
                  </a>
               </li>
            </ul>
         </li>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-human-male-female"></i> <span><?= __('admin.models') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="<?= base_url();?>admin/user/models">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.all_models') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/user/model_applications">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.models_application') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/user/blocked_models">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.blocked_models') ?>
                  </a>
               </li>
            </ul>
         </li>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-engine"></i> <span><?= __('admin.tailors') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="<?= base_url();?>admin/user/tailors">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.all_tailors') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/user/tailor_applications">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.tailors_application') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/user/blocked_tailors">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.blocked_tailors') ?>
                  </a>
               </li>
            </ul>
         </li>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-briefcase"></i> <span><?= __('admin.hires') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="#">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.active') ?> <?= __('admin.hires') ?>
                  </a>
               </li>
               <li>
                  <a href="#">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.pending') ?> <?= __('admin.hires') ?>
                  </a>
               </li>
               <li>
                  <a href="#">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.closed') ?> <?= __('admin.hires') ?>
                  </a>
               </li>
            </ul>
         </li>

         <li>
            <a href="#" class="waves-effect">
               <i class="mdi mdi-calendar"></i><span><?= __('admin.appointments') ?>
            </a>
         </li>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-format-list-bulleted"></i> <span><?= __('admin.categories') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="<?php echo base_url();?>admin/category/">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.list_categories') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admin/category/create">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.create_category') ?>
                  </a>
               </li>
            </ul>
         </li>

         <li>
            <a href="#" class="waves-effect">
               <i class="mdi mdi-bullhorn"></i><span><?= __('admin.permotional_ads') ?>
            </a>
         </li>

         <li>
            <a href="#" class="waves-effect">
               <i class="mdi mdi-bank"></i><span><?= __('admin.escrow') ?>
            </a>
         </li>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-account"></i> <span><?= __('admin.admin') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="<?= base_url();?>admin/admin">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.list_admins') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/admin/create">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.create_admin') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/accesslevel">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.access_levels') ?>
                  </a>
               </li>
            </ul>
         </li>

         <?php //if($store_setting['status']) { ?>
         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-store"></i> <span><?= __('admin.menu_my_store') ?></span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
               <li>
                  <a href="<?php echo base_url('store');?>" target="_blank">
                     <i class="mdi mdi-menu-right"></i> <?=__('admin.view_store') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admincontrol/store_dashboard/">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.page_title_store_dashboard') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admincontrol/listproduct/">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.menu_list_products') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admincontrol/listproduct/reviews">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.page_title_listproduct_review') ?>
                  </a>
               </li>
               <?php /*<li><a href="<?php echo base_url();?>admincontrol/form/"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_form_list') ?></a></li> */?>
               <li>
                  <a href="<?php echo base_url();?>admincontrol/coupon/">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.coupon') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admincontrol/form_coupon/">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.menu_form_coupon') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admincontrol/storepayments/">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.page_title_storepayments') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url();?>admincontrol/store_setting/">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.page_title_store_setting') ?>
                  </a>
               </li>
            </ul>
         </li>
         <?php //} ?>

         <li>
            <a href="#" class="waves-effect">
               <i class="mdi mdi-account-multiple-plus"></i><span><?= __('admin.community_page') ?>
            </a>
         </li>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-history"></i> <span><?= __('admin.payments') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="#">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.payments') ?>
                  </a>
               </li>
               <li>
                  <a href="#">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.deposits') ?>
                  </a>
               </li>
               <li>
                  <a href="#">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.withdrawals') ?>
                  </a>
               </li>
               <li>
                  <a href="#">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.transfers') ?>
                  </a>
               </li>
            </ul>
         </li>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-tooltip-edit"></i> <span><?= __('admin.blogs') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="<?= base_url();?>admin/blog">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.all_blogs') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/blog/create">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.create') ?> <?= __('admin.blog') ?>
                  </a>
               </li>
               <li>
                  <a href="<?= base_url();?>admin/blog/category">
                     <i class="mdi mdi-menu-right"></i> <?= __('admin.blog_categories') ?>
                  </a>
               </li>
            </ul>
         </li>

         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect">
               <i class="mdi mdi-wallet-membership"></i> <span><?= __('admin.packages') ?></span> 
               <span class="float-right">
                  <i class="mdi mdi-chevron-right"></i>
               </span>
            </a>
            <ul class="list-unstyled">
               <li>
                  <a href="<?php echo base_url('membership/plans');?>">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.package_plans') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url('membership/membership_payment_gateways');?>">
                     <i class="mdi mdi-menu-right"></i></i><?= __('admin.payment_gateways') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url('membership/membership_orders');?>">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.package_orders') ?>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url('membership/settings');?>">
                     <i class="mdi mdi-menu-right"></i><?= __('admin.package_settings') ?>
                  </a>
               </li>
            </ul>
         </li>

         <li>
            <a href="#" class="waves-effect">
               <i class="mdi mdi-truck"></i><span><?= __('admin.logistsics') ?>
            </a>
         </li>

         <li>
            <a href="#" class="waves-effect">
               <i class="mdi mdi-decimal-increase"></i><span><?= __('admin.commissions') ?>
            </a>
         </li>

         <li>
            <a href="#" class="waves-effect">
               <i class="mdi mdi-email-open"></i><span><?= __('admin.newsletter') ?>
            </a>
         </li>

        <li class="has_sub">
        <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-ray-start-arrow"></i> <span><?= __('admin.program_integrations') ?></span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
        <ul class="list-unstyled">
        
        <li><a href="<?php echo base_url();?>integration/programs"><i class="mdi mdi-menu-right"></i><?= __('admin.sub_menu_integration_programs') ?></a></li>
        <li><a href="<?php echo base_url();?>integration/integration_tools"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_affiliate_marketing') ?></a></li>
        <!--<li><a href="<?php echo base_url();?>integration/orders"><i class="mdi mdi-menu-right"></i><?= __('admin.sub_menu_integration_orders') ?></a></li>-->
        <!--<li><a href="<?php echo base_url();?>integration/logs"><i class="mdi mdi-menu-right"></i><?= __('admin.sub_menu_integration_logs') ?></a></li>-->
        <li><a href="<?php echo base_url();?>integration/integration_category"><i class="mdi mdi-menu-right"></i><?= __('admin.integration_category') ?></a></li>
        <li><a href="<?php echo base_url();?>admincontrol/market_tools_setting"><i class="mdi mdi-menu-right"></i><?= __('admin.admincontrol_market_tools_setting') ?></a></li>
        <li><a href="<?php echo base_url();?>integration/" class="waves-effect"><i class="mdi mdi-menu-right"></i><?= __('admin.sub_menu_integration') ?></a></li>
        </ul>
        </li>
      
         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file-tree"></i> <span><?= __('admin.menu_mlm') ?></span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
               <li><a href="<?php echo base_url();?>admincontrol/mlm_settings/"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_mlm_settings') ?></a></li>
               <li><a href="<?php echo base_url();?>admincontrol/mlm_levels/"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_mlm_levels') ?></a></li>
            </ul>
         </li>
        
         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-desktop" aria-hidden="true"></i><span><?= __('admin.menu_saas') ?></span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
               <li><a href="<?php echo base_url(); ?>admincontrol/saas_setting"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_saas_settings') ?></a></li>
            </ul>
         </li>

        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect fixed-styling">
                <i class="mdi mdi-wallet-travel"></i> <span><?= __('admin.menu_admin_wallet') ?></span>
                <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
            </a>
            <ul class="list-unstyled">
               <li><a href="<?php echo base_url();?>admincontrol/mywallet/" class="fixed-styling"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_all_transactions') ?></a></li>
               <li><a href="<?php echo base_url('admincontrol/wallet_requests_list');?>"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_withdraw_request_v2') ?></a></li>
               <li><a href="<?php echo base_url();?>admincontrol/withdrawal_payment_gateways"><i class="mdi mdi-menu-right"></i><?= __('admin.withdrawal_payment_gateways') ?></a></li>
            </ul>
         </li>
        
         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-autorenew"></i> <span><?= __('admin.system_activity') ?></span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
               <li><a href="<?php echo base_url();?>admincontrol/store_markettools/"><i class="mdi mdi-menu-right"></i><?= __('admin.all_markettools') ?></a></li>
               <li><a href="<?php echo base_url();?>admincontrol/store_orders/"><i class="mdi mdi-menu-right"></i><?= __('admin.my_all_orders') ?></a></li>
               <li><a href="<?php echo base_url();?>admincontrol/store_logs/"><i class="mdi mdi-menu-right"></i><?= __('admin.my_all_logs') ?></a></li>
               <li><a href="<?php echo base_url();?>ReportController/admin_transaction/" class="waves-effect"><i class="mdi mdi-menu-right"></i><span><?= __('admin.menu_report_transactions') ?></span></a></li>
               <li><a href="<?= base_url('incomereport') ?>" class="waves-effect" ><i class="mdi mdi-menu-right"></i> <span> <?= __('admin.menu_users_statistics') ?> </span> </a></li>
               <li><a href="<?php echo base_url();?>ReportController/admin_statistics/" class="waves-effect"><i class="mdi mdi-menu-right"></i><span><?= __('admin.menu_report_graphs') ?></span></a></li>
            </ul>
         </li>
         
         
         <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-multiple"></i> <span><?= __('admin.menu_members') ?></span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
               <li><a href="<?php echo base_url();?>admincontrol/userslist/"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_list_affiliates') ?></a></li>
               <li><a href="<?php echo base_url();?>admincontrol/userslisttree/"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_referring_tree') ?></a></li>
               <li><a href="<?php echo base_url();?>admincontrol/userslistmail/"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_list_affiliates_email') ?></a></li>
            </ul>
         </li>

        
        
        <li class="has_sub">
            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-settings"></i> <span><?= __('admin.menu_global_settings') ?></span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="list-unstyled">
               <li><a href="<?php echo base_url();?>admincontrol/paymentsetting/"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_configuration') ?></a></li>
               <li><a href="<?php echo base_url(); ?>admincontrol/mails"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_mail_Templates') ?></a></li>
               <?php /*<li><a href="<?= base_url('admincontrol/registration_builder') ?>"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_registration_builder') ?></a></li> 
               <li><a href="<?php echo base_url();?>admincontrol/backup/"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_site_Backups') ?></a></li>*/?>
               <li><a href="<?= base_url('admincontrol/language') ?>"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_language') ?></a></li>
               <li><a href="<?= base_url('admincontrol/currency_list') ?>"><i class="mdi mdi-menu-right"></i><?= __('admin.menu_currency') ?></a></li>
               <?php /*<li><a href="<?= base_url('admincontrol/theme_setting') ?>"><i class="mdi mdi-menu-right"></i><?= __('admin.themes_color') ?></a></li>
               <li><a href="<?= base_url('admincontrol/system_status') ?>"><i class="mdi mdi-menu-right"></i><?= __('admin.page_title_system_status') ?>
               
                 <li><a href="<?= base_url('admincontrol/script_details') ?>"><i class="mdi mdi-menu-right"></i><?= __('admin.logs_tree') ?>
               </a>
               </li>
               <li><a href="<?= base_url('admincontrol/install_new_version') ?>"><i class="mdi mdi-menu-right"></i><?= __('admin.page_title_install_new_version') ?>
               </a>
               </li>*/?>
            </ul>
         </li>
         </li>
         
         <hr>
         
      

      </div>
      
      <div class="clearfix"></div>
       
   </div>
     <div class="version">
        <hr class="mt-1 mb-2">
        <span class="session_timeout_string text-white">Something</span>
        <?php /*<hr class="mt-1 mb-2">
        <a href="<?= base_url('admincontrol/script_details') ?>"> <i class="mdi mdi-layers"></i>
        <span>SCRIPT VERSION</span>
        <span class="badge badge-primary"><?php echo SCRIPT_VERSION ?></span></a> */ ?>
     </div>
</div>
<div class="content-page">
<div class="content">
<div class="page-content-wrapper">
   <div class="container-fluid">
      <?php
         $serverReq = checkReq();
         require APPPATH."config/breadcrumb.php";
         $pageKey = $db->Product_model->page_id();
         ?>
      <script type="text/javascript">console.log('Page ID : <?= $pageKey ?>')</script>
      <?php if(isset($pageSetting[$pageKey])){ ?>
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box shadow-sm">
               <div class="iconify float-left">
                  <a class="btn btn-primary btn-sm reload-btn" title="Refresh Page" data-toggle='tooltip' href="JavaScript: location.reload(true);"><i class="mdi mdi-refresh" data-inline="false" style="font-size: 1.1rem"></i></a>
               </div>
               <h4 class="page-title pull-left pl-2 mb-lg-0 mb-3"><?= $pageSetting[$pageKey]['title'] ?></h4>
               <div class="float-right dashboard-tool d-flex align-items-center">
                  <?php if($pageKey == 'admincontrol_dashboard'){ ?>
                  <div class="server-last-update">Last Updated : <span class="badge"><?= date("h:i:s A") ?></span></div>
                  <div class="d-inline-block dashboard-refresh mr-3">
                     Session Timeout : <span class="badge">01:00</span>
                     <script type="text/javascript">
                        // function secondsTimeSpanToHMS(s) {
                        // 	var h = Math.floor(s/3600);
                        // 	s -= h*3600;
                        // 	var m = Math.floor(s/60);
                        // 	s -= m*60;
                        // 	return h+":"+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s);
                        // }
                        // var refresh_after = 3600;
                        // var d_index = 1;
                        // setInterval(function(){
                        // 	var remaining = refresh_after - d_index;
                        // 	d_index++;
                        
                        // 	$(".dashboard-refresh span").html(secondsTimeSpanToHMS(remaining))
                        // 	if(d_index > refresh_after){
                        // 		d_index = 1;
                        // 		window.location.reload();
                        // 	}
                        // }, 1000);
                     </script>
                  </div>
                  
                  <div class="server-status">
                     <?php if(count($serverReq) == 0) { ?>
                    <div class="server-ok">
                    <span class="badge badge-success"><i class="mdi mdi-check" data-toggle="tooltip" title='Server Ok'></i></span>
                    </div>
                     
                    <?php } else { ?>

                    <div class="server-error">
                    <span class="badge badge-danger"><i class="mdi mdi-close-circle" data-toggle="tooltip" title='Server Error'></i></span>
                    </div>

                     <?php } ?>
                  </div>
              
                  <div class="d-inline-block setting-tools">
                     <button class="btn btn-dark btn-sm btn-setting ml-1" data-toggle="tooltip" title='Dashboard Settings' data-key='live_dashboard' data-type='admin'>
                     <i class="mdi mdi-settings"></i>
                     </button>
                  </div>
                  
                   <div class="d-inline-block setting-tools">
                     <button class="btn btn-primary btn-sm ml-1" onclick="window.open('<?php echo base_url();?>','_blank')" data-toggle="tooltip" title='View Site'>
                     <i class="mdi mdi-web"></i>
                     </button>
                  </div>
                  
                   <body>

                  <?php } ?>
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <?php
                        $count = count($pageSetting[$pageKey]['breadcrumb']);
                        foreach ($pageSetting[$pageKey]['breadcrumb'] as $key => $value) {
                        	?>
                     <li class="breadcrumb-item <?= $count == $key ? 'active' : '' ?>">
                        <a href="<?= $value['link'] ?>"><?= $value['title'] ?></a>
                     </li>
                     <?php } ?>
                  </ol>
               </div>
               <?php if($pageKey == 'admincontrol_dashboard'){ ?>
               <div id="dashboard-progress"></div>
               <?php } ?>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
      <?php } ?>
   </div>
</div>
<div class="server-errors">
   <?php
      if($serverReq){
      	echo "<div class='requirement-error'>";
      	foreach ($serverReq as $key => $e) {
      		echo "<p>{$e}</p>";
      	}
      	echo "</div>";
      }
      ?>
</div>


<script>
<?php
$site_setting_timeout = $this->Product_model->getSettings('site', 'session_timeout');
$timeout = (isset($site_setting_timeout['session_timeout']) && is_numeric($site_setting_timeout['session_timeout']) && $site_setting_timeout['session_timeout'] > 60) ? $site_setting_timeout['session_timeout'] : 1800;
?>
Window.GlobaleCountDownDate = (new Date().getTime()) + (<?= $timeout ?> * 1000);
var GlobaleCountDownDateInterval = setInterval(function() {
   var now = new Date().getTime() + 1000;
   distance = ((Window.GlobaleCountDownDate - now) / 1000).toFixed(0);

   let h = Math.floor(distance / 3600);
   let m = Math.floor(distance % 3600 / 60);
   let s = Math.floor(distance % 3600 % 60);

   let string = "";

   string += (h > 0) ? ('0'+h).slice(-2)+":" : "00:"; 

   string += (m > 0) ? ('0'+m).slice(-2)+":" : "00:"; 

   string += (s > 0) ? ('0'+s).slice(-2)+"" : "00"; 

   $(".session_timeout_string").text("Session Timeout: "+string);
   $(".dashboard-refresh span").text(string);

   if (distance <= 0) {
      $('#session-countdown').parent().text('Session Has Expired');
      window.location.replace('<?= base_url('admincontrol/logout'); ?>');
      clearInterval(GlobaleCountDownDateInterval);
   }
}, 1000);

$(document).ajaxComplete(function(event, request, settings) {
   let parts = settings.url.split("/");
   let last_part = parts[parts.length-1];
   if(last_part != "ajax_dashboard"){
      Window.GlobaleCountDownDate = (new Date().getTime()) + (<?= $timeout ?> * 1000);
   }
});
</script>