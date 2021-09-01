<style>
    .auth-wrapper{
        width:100 !important;
        padding:0px !important;
    }
    .sign-head, .p-top-onesixteenpage{
        color:#222224;
    }
    .circles-parent-div > p{
        cursor: pointer;
        border: solid 5px #fff !important;
    }
</style>
<?php 
function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "zero";
        case "1":
            return "one";
        case "2":
            return "two";
        case "3":
            return "three";
        case "4":
            return "four";
        case "5":
            return "five";
        case "6":
            return "six";
        case "7":
            return "seven";
        case "8":
            return "eight";
        case "9":
            return "nine";
    }
}
?>
                <section class="bg-white pb-5">
                  <div class="container-fluid sign-2-cnt-fluid">
                    <div class="row justify-content-between">
                      <div class="col-3">
                        <img src="<?=base_url();?>assets/images/site/Dei4vQVCMyr5fAszw38PRamGjH7ISl9O.png" id="logo" class="img-fluid sign2-imglogo">
                      </div>
                      <div class="col-3 text-right">
                        <button class="btn sign-btntop">
                          Sign In
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="container container-progress-2">
                    <div class="row">
                      <div class="col-md-12">
                          
                        <div class="col-10 col-md-6  mx-auto d-flex align-items-center justify-content-between">
                          <!-- <div class="number-circle number-active d-flex align-items-center justify-content-center font-weight-bold"> <i class="fa fa-check"></i> </div> -->
                          <div class="line-bar line-bar-active"></div>
                          <span class="prog-sp-1 prog-sp-safa-1">Basic Information</span>
                          <!--div class="number-circle d-flex align-items-center justify-content-center font-weight-bold">2</div-->
                          <div class="line-bar line-bar-second-class"></div>
                          <span class="prog-sp-2 prog-sp-safa-2">Categories</span>
                          <!-- <div class="number-circle d-flex align-items-center justify-content-center font-weight-bold">3</div> -->
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container sign-2-container">
                    <div class="row first-row-sign2 first-row-sign2-2">
                      <div class="col-md-12">
                          <div id="er"></div>
                        <h2 class="sign-head">Let us know what you like</h2>
                        <p class="p-top-onesixteenpage">
                          This will help us streamline suggestions and posts for you. You can select multiple options.
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" style="position: relative;">
                        <div class="circles-parent-div">
                            
                            
    <?php   
            $num=1;
            foreach ($categories->result() as $row)
            { ?>
                
                <p class="p-child-<?=convertDigit($num);?> categor <?php if($userID == $row->user_id){ echo "bg-warning";} ?>" val="<?=$row->name;?>" data-interestID="<?=$row->int_id;?>"><?=$row->name;?></p>
                          
            <?php 
            
            if($num == 9){
                $num=1;
            }else{
                $num++;
            }
            
            
            
            } ?>              
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container sign2-container">
                    <div class="row mt-5 mb-5">
                      <div class="col-md-5 d-none">
                        <button class="btn sign2-btntop1">
                          Previous
                        </button>
                      </div>
                      <div class="col-md-2"></div>
                      <div class="col-md-10">
                        <a href="<?php echo base_url();?>user/activation" class="btn sign2-btntop2 float-right" style = "width:300px" id="emailsend">
                          Finish
                        </a>
                      </div>
                    </div>
                  </div>
                </section>

               <!-- ==================
                  115 PAGE ENDS
               ================== -->