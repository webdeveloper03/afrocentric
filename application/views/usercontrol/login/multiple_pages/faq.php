<?php include(APPPATH.'/views/usercontrol/login/multiple_pages/header.php'); ?>
<?php 
$faq_banner_title = (isset($theme_settings[0])) ? $theme_settings[0]->faq_banner_title : null;
$faq_section_title = (isset($theme_settings[0])) ? $theme_settings[0]->faq_section_title : null;
$faq_section_subtitle = (isset($theme_settings[0])) ? $theme_settings[0]->faq_section_subtitle : null;
$faq_banner_image = (isset($theme_settings[0])) ? $theme_settings[0]->faq_banner_image : null;
?>

<?php 
if ($faq_banner_image != '' || !empty($faq_banner_image)) { 
    $faq_banner =  base_url().'assets/images/theme_images/'.$faq_banner_image;
}else{ 
    $faq_banner =  base_url('assets/login/multiple_pages/img/faq-bg.jpg');
} 
?>
    <!--Hero-->
    <div class="wlc-hero-area inner-hero-area d-flex align-items-center" style="background-image: url(<?= $faq_banner; ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wlc-hero-content text-center">
                        <h1><?= (!empty($faq_banner_title)) ? $faq_banner_title : "Frequently Asked Questions";?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero-->
  
    

    <div class="inner-page-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <img src="<?= base_url('assets/login/multiple_pages') ?>/img/icon.png" alt="client">
                        <h2><?= (!empty($faq_section_title)) ? $faq_section_title : "What is Lorem Ipsum?";?></h2>
                        <p><?= (!empty($faq_section_subtitle)) ? $faq_section_subtitle : "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";?></p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                <div class="accordion faq-accodion" id="accordionFaq">
                  <?php 
                  if(isset($theme_faqs)) {
                    foreach($theme_faqs as $faq) {
                      if($faq->status == 1) {
                    ?>
                    <div class="card">
                      <div class="card-header" id="faq-sec-<?= $faq->faq_id; ?>">
                        <h2 class="mb-0">
                          <button class="btn btn-link btn-block text-left <?= (isset($is_faq_available)) ? "collapsed": ""; ?>" type="button" data-toggle="collapse" data-target="#collapse-<?= $faq->faq_id; ?>" aria-expanded="<?= (isset($is_faq_available)) ? "false": "true"; ?>" aria-controls="collapse-<?= $faq->faq_id; ?>">
                            <?= (!empty($faq->faq_question)) ? $faq->faq_question : "Where can I get some?"; ?>
                            <i class="fa fa-plus"></i>
                          </button>
                        </h2>
                      </div>

                      <div id="collapse-<?= $faq->faq_id; ?>" class="collapse <?= (!isset($is_faq_available)) ? "show": ""; ?>" aria-labelledby="faq-sec-<?= $faq->faq_id; ?>" data-parent="#accordionFaq">
                        <div class="card-body">
                          <?= (!empty($faq->faq_answer)) ? $faq->faq_answer : "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc."; ?>
                        </div>
                      </div>
                    </div>
                    <?php    
                      $is_faq_available = true;
                      }                
                    } 
                  }
                  ?>
                  
                  <?php
                   if(!isset($is_faq_available)) {
                     ?>

                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Where can I get some?
                          <i class="fa fa-plus"></i>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFaq">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Where can I get some?
                          <i class="fa fa-plus"></i>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFaq">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>                  
                  <div class="card">
                    <div class="card-header" id="headingFour">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                          Where can I get some?
                          <i class="fa fa-plus"></i>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionFaq">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>                 
                  <div class="card">
                    <div class="card-header" id="headingFive">
                      <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Where can I get some?
                          <i class="fa fa-plus"></i>
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionFaq">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                      </div>
                    </div>
                  </div>


                     <?php
                   }
                  ?>

                  
                </div>
                    
                </div>
            </div>
        </div>
    </div>

    
<?php include(APPPATH.'/views/usercontrol/login/multiple_pages/footer.php'); ?>
