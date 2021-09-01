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
			<div class="col-sm-12 col-md-8 col-lg-6">
				
			</div>
			<div class="col-sm-12 col-md-4 col-lg-2">
				<?php
					$orderOptions = [
						0 => 'A - Z',
						1 => 'Z - A',
					];
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

<?php /*<div class="row">
    <div class="col-12">
        <div class="m-b-10">
            <?php foreach( range('A', 'Z') as $key => $elements) { ?> 
                <span class="alpha-char m-1 mr-2 <?= ($key ===0?'active':'') ?>">
                    <?= $elements ?> 
                </span>
            <?php }  ?>
        </div> 
    </div>
</div>*/ ?>

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

<div class="dimmer">
	<div class="loader"></div>
	<div class="dimmer-content">
		<div class=" grid-user">
        </div>
	</div>
</div>
	
<div class="card-footer text-right" style="display: none;"> 
    <div class="pagination"></div> 
</div>

<script type="text/javascript">
    function getPage(page,t) {
        $this = $(t);
        var data ={
            page:page,
            searchKey:$("#searchKey").val(),
            order:$("#changeOrderId").val()
        }
        $.ajax({
            url:'<?= $currentListUrl ?>' + page,
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
                $(".grid-user").html(json['html']);
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
    });

    getPage(1)

    function filterData(){
        getPage(1);
    }

    function changeOrder(){
        getPage(1);
    }
</script>