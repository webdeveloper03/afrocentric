<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .footer{
    margin:0px !important;
}

</style>
<section class="profile-page">
	<div class="container-fluid" style="margin:0px; padding-left:0px">
		<div class="profile-page-wrapper">
			<div class="profile-sidebar">
				<ul>
				    <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>
  Home</a></li>
				    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i>
 Tracking</a></li>
					<li><a href="<?= $base_url ?>profile"><i class="fa fa-user" aria-hidden="true"></i>
 <?= __('store.profile') ?></a></li>
					<li><a class="active" href="<?= $base_url ?>order"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
 <?= __('store.order') ?></a></li>
					<li><a href="<?= $base_url ?>shipping"><i class="fa fa-map-marker" aria-hidden="true"></i>
 <?= __('store.shipping') ?></a></li>
					<li><a href="<?= $base_url ?>wishlist"><i class="fa fa-heart" aria-hidden="true"></i>
 Wishlist</a></li>
				</ul>
			</div>