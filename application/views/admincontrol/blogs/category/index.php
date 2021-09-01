<div class="clearfix"></div>
<br>
<div class="card m-b-10">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="input-group">
					<input type="text" class="form-control bb-form-control" placeholder="Search here" id="searchKey" value="<?= $searchKey ?>">
					<div class="input-group-append">
						<span class="input-group-text bb-input-group-text cursor-pointer" onClick="filterData()">
							<i class="fa fa-search"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-8 col-lg-6 text-center">
				<a href="<?= base_url('admin/blog/create_category') ?>" class="btn btn-warning p-25-15">
					<i class="mdi mdi-plus"></i>
					<?= __('admin.create') ?> <?= __('admin.blog_category') ?>
				</a>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-2">
				<?php
					$orderOptions = [
						0 => 'A - Z',
						1 => 'Z - A',
						2 => 'Newest First',
						3 => 'Oldest First',
					];
					$orderBy = '2';
				?>
				<select class="form-control1 dropdown-toggle nb-form-control" onChange="changeOrder()" id="changeOrderId">
					<?php
					foreach($orderOptions as $key => $value){ 
						$selected = '';
						if($key == $orderBy){
							$selected = 'selected="selected"';
						}
						?>
						<option value="<?= $key ?>" <?= $selected ?> >
							<?= $value ?>
						</option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
</div>

<?php if($this->session->flashdata('success')){?>								
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo $this->session->flashdata('success'); ?> 
	</div>
<?php } ?>	
<?php if($this->session->flashdata('error')){?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php echo $this->session->flashdata('error'); ?> 
	</div>
<?php } ?>
<div class="card">
        <div class="dimmer">
        	<div class="loader"></div>
        	<div class="dimmer-content">
				<div class="table-responsive m-0">
					<table class="table category-table">
						<thead>
							<tr>
								<th width="80px"><?= __('admin.id') ?></th>
								<th><?= __('admin.name') ?></th>
								<th><?= __('admin.created_at') ?></th>
								<th><?= __('admin.updated_at') ?></th>
								<th width="180px">#</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
        	</div>
        </div>
	</div>
	<div class="card-footer text-right" style="display: none;"> <div class="pagination"></div> </div>
</div>

<script type="text/javascript">
	function getPage(page,t) {
		$this = $(t);
		var data ={
			page:page,
			filter_status:$(".filter_status").val(),
			searchKey:$("#searchKey").val(),
			order:$("#changeOrderId").val()
		}
		$.ajax({
			url:'<?= base_url("admin/blog/category") ?>/' + page,
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
				$(".category-table tbody").html(json['html']);
				$(".card-footer").hide();
				
				if(json['pagination']){
					$(".card-footer").show();
					$(".card-footer .pagination").html(json['pagination'])
				}
			},
		})
	}

	$(".card-footer .pagination").delegate("a","click", function(e){
		e.preventDefault();
		getPage($(this).attr("data-ci-pagination-page"),$(this));
	})

	getPage(1)

	function filterData(){
		getPage(1);
	}

	function changeOrder(){
		getPage(1);
	}

	function confirmDelete(id){
		Swal.fire({
            icon: 'info',
			title: "Delete !",
            title: 'Are you sure to delete?',
            showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    window.location.href = "<?= base_url('admin/blog/delete_category') ?>/"+id;
                }
		}); 
	}
</script>