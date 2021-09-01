<!-- plan section start -->
<style>
    .auth-wrapper{
        width:100 !important;
        padding:0px !important;
        color:#000 !important;
    }
    .plan-btn-2 , .plan-btn {
    width: 100%;
    padding: 3% 10% !important;
    }
</style>

<div class ="wrapper bg-white text-black">
    
    <section>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 text-center  mt-5">
            <h1 class="">
               Select a plan and<br />do more with Afrocentric
            </h1>
         </div>
      </div>
   </div>
   <div class="container mt-5">
       <div class="row">
                        <?php 
                $count = 0;
                foreach($plans as $p){
        if($count == 0 &&  $p['type'] == "free"){            
        ?>
         <div class="col-md-4">
            <div class="stander">
               <h3 class="color-show"><?=$p['name']?></h3>
            <h4 class=" free-1"><?=ucfirst($p['type'])?></h4><br/>
            <hr/>
            <div class="mt-5">
                <?=$p['description']?>
            </div>
            <hr />
            <a role= "button" href="<?=base_url()."member/buy_plans/".$p['id'];?>" class="plan-btn mt-3 mb-5">
               Select plan
            </a>
            <p>&nbsp;</p>
            </div>
         </div>
         <?php } if($count == 1 &&  $p['type'] == "paid"){ ?>
         <div class="col-md-4">
           <div class="stander-2">
               <h3 class="color-show-2"><?=$p['name']?></h3>
            <h4 class=" free-2"><?=ucfirst($p['price'])?><span class="month">/month</span></h4><br/>
           <hr/>
           <div class="mt-5">
               <?=$p['description']?>
           </div>
            <hr class="mt-5" />
            <a role= "button" href="<?=base_url()."member/buy_plans/".$p['id'];?>" class="plan-btn-2 ">
              Choose Plan
            </a>
                        <p class= "mt-5">&nbsp;</p>

            </div>
         </div>
        <?php } if($count == 2 &&  $p['type'] == "paid"){ ?> 
         <div class="col-md-4">
            <div class="stander-3">
               <h3 class="color-show-3"><?=$p['name']?></h3>
            <h4 class=" free-3"><?=ucfirst($p['price'])?><span class="month">/month</span></h4><br/>
            <hr class="hr-3" />
            <div>
               <?=$p['description']?>
            </div>
            <hr class="hr-3" />
            <a role= "button" href="<?=base_url()."member/buy_plans/".$p['id'];?>" class="plan-btn-2 ">
               Choose Plan
            </a>
            </div>
         </div>
         <?php $count = 0;} //reset count } 
         $count++;
         } ?>
      </div>
   </div>
</section>
<!-- plan section end -->


    <br /> <br /><br />
    
</div>    