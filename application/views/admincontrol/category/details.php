<div class="row">
    <div class="col-lg-12 col-md-12">
        <?php if($this->session->flashdata('success')){?>
            <div class="alert alert-success alert-dismissable my_alert_css">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('error')){?>
            <div class="alert alert-danger alert-dismissable my_alert_css">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>
    </div>
</div>
        
<div class="row">
    <div class="col-12">
        <?php if ($record == null) {?>
            <div class="card m-b-30">
                <div class="card-body"> 
                    <div class="text-center">
                        <img class="img-responsive" src="<?php echo base_url(); ?>assets/vertical/assets/images/no-data-2.png" style="margin-top:100px;">
                        <h3 class="m-t-40 text-center text-muted"><?= __('admin.no') ?> <?= __('admin.categories') ?></h3>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="card m-b-30 m-t-15 <?= ($record->status==2)? 'blocked-user':'' ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-1 tet-center">
                            <a class="detail-back-arrow rounded-circle m-0" href="<?= base_url();?>admin/category">
                                <i class="mdi-24px mdi mdi-arrow-left"></i>
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-2 text-center">
                            <img src="<?= $record->image_url ?>" alt="img"  style='max-width: 90%;height: 150px'>
                        </div>
                        <div class="col-sm-12 col-md-9">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h5 class="font-weight-bold">
                                        <?= $record->name ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3 cate-grid-other-info">
                                    <?= __('admin.products_in_category') ?>
                                </div>
                                <div class="col-sm-12 col-md-9 cate-grid-other-info">
                                    <span class="c-font-weight-bold">
                                        <?= $totalProduct ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-3 cate-grid-other-info">
                                    <?= __('admin.date_created') ?>
                                </div>
                                <div class="col-sm-12 col-md-9 cate-grid-other-info">
                                    <span class="c-font-weight-bold">
                                        <?= c_date($record->created_at) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row m-t-30 m-b-15 justify-content-center">
                                <div class="col-sm-offset-1 col-sm-10">
                                    <a href="<?= base_url('admin/category/create/'. $record->id) ?>" class="btn btn-warning c-btn-custom">
                                        <?= __('admin.edit_category') ?>
                                    </a>
                                    <a onclick="confirmDelete(<?= $record->id ?>)" href="javascript:void(0)" class="btn btn-danger c-btn-custom ml-4" >
                                        <?= __('admin.delete') ?> <?= __('admin.category') ?>
                                    </a>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h3><?= __('admin.products_in_category') ?></h3>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="input-group">
                            <input type="text" class="form-control cat-product-search-input" placeholder="Search here" id="searchKey" value="<?= $searchKey ?>">
                            <div class="input-group-append">
                                <span class="input-group-text cat-product-search-ig-text cursor-pointer" onClick="filterData()">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-sm-12 col-md-2">
                        <select class="form-control dropdown-toggle nb-form-control">
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
                    <div class="col-sm-12 col-md-2">
                        <select class="form-control dropdown-toggle nb-form-control">
                            <option value="">Color</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <select class="form-control dropdown-toggle nb-form-control">
                            <option value="">Price</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <select class="form-control dropdown-toggle nb-form-control">
                            <option value="">Ratings</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <select class="form-control dropdown-toggle nb-form-control">
                            <option value="">Sort By</option>
                        </select>
                    </div>
                </div>
                <div class="dimmer">
                    <div class="loader"></div>
                    <div class="dimmer-content">
                        <div class="row pt-3 grid-product">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right" style="display: none;"> <div class="pagination"></div> </div>
            </div>
        <?php }  ?>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>

<script type="text/javascript">
	function confirmDelete(id){
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-danger w-100 btn-custom',
                cancelButton: 'btn btn-default w-100'
            },
            buttonsStyling: false
        })
		swalWithBootstrapButtons.fire({
            icon: 'warning',
			title: "<?= __('admin.delete') ?> <?= __('admin.category') ?>",
            html: "<p><?= __('admin.delete_category_title') ?></p><p><?= __('admin.are_you_sure_you_want_to_delete') ?> <?= $record->name ?>? </p>",
            showCancelButton: true,
            confirmButtonText: "<?= __('admin.delete') ?> <?= __('admin.category') ?>",
            cancelButtonText: "<?= __('admin.cancel') ?>",
            }).then((result) => {
                if (result.value) {
                    window.location.href = `<?= base_url('admin/category/delete') ?>/${id}`;
                }
		}); 
	}

    function getProducts(page,t) {
		$this = $(t);
		var data ={
			page:page,
			categoryId:<?= $record->id ?>,
			searchKey:$("#searchKey").val(),
			order:$("#changeOrderId").val()
		}
		$.ajax({
			url:`<?= base_url("admin/category/products") ?>/${page}`,
			type:'POST',
			dataType:'json',
			data:data,
			beforeSend:function(){
				$this.btn("loading");
				$(".dimmer").addClass("active");
			},
			complete:function(){
				$this.btn("reset");
				$(".dimmer").removeClass("active");
			},
			success:function(json){
				$(".grid-product").html(json['html']);
				$(".card-footer").hide();
				
				if(json['pagination']){
					$(".card-footer").show();
					$(".card-footer .pagination").html(json['pagination'])
				}
			},
		})
	}

    getProducts(1)

    function filterData(){
		getProducts(1);
	}
</script>