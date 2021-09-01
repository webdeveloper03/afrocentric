    </div>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.js"></script>
<script src="<?=base_url();?>assets/js/toast.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.js" integrity="sha512-4p9OjnfBk18Aavg91853yEZCA7ywJYcZpFt+YB+p+gLNPFIAlt2zMBGzTxREYh+sHFsttK0CTYephWaY7I3Wbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$(document).ready(function() {

var forms = $( "#loginform" );
var regstep2 = $( "#regstep2" );    
$( forms ).validate({
  messages: {
    username: "Please enter your username.",
    password: "Please enter your password.",

},
});    
    
    
    
    
var form = $( "#reg_form" );
    
$( form ).validate({
  rules: {
    password: "required",
    cpassword: {
      equalTo: "#password",
    }
  },
  messages: {
    firstname: "Please enter your First name",
    email: "Please enter a valid email address",
    terms:"You must accept our terms and conditions.",
    password: "Password is required.",

},
});

jQuery.extend(jQuery.validator.messages, {
    required: "This field is required.",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Confirm password should be same as password.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});
$( "#reg_submit" ).click(function() {
  if( form.valid() == true){
      $(form ).on('submit', function (e) {
          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '<?=base_url();?>auth/register',
            data: $('form').serialize(),
            success: function (json) {
                    
              if(JSON.parse(json).errors){
                        $.each(JSON.parse(json).errors, function(i,j){
 $("#"+i+"-error").html("<div style='display:block !important; margin-top: 5px;background-color: #e84848;padding: 2px;color: #fff; border-radius: 5px;'>"+j+"</div>");
                        })
                    window.location.hash = '#top_icon';
                    }else{
                     window.location = "<?=base_url();?>user/reg2";
                    }
            }
          });

        });
  }
});

$( "#loginBtn" ).click(function() {
  if( forms.valid() == true){
      $(forms ).on('submit', function (e) {
          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '<?=base_url();?>auth/login',
            data: $('form').serialize(),
            success: function (json) {
                    
          if(JSON.parse(json).errors){
                        $.each(JSON.parse(json).errors, function(i,j){
 $("#msg").html("<div style='margin-top: 5px;background-color: #e84848;padding: 2px;color: #fff; border-radius: 5px;'>"+j+"</div>");
                        })
                    }else if(JSON.parse(json).redirect){
                            window.location = JSON.parse(json).redirect;
                    }
            }
          });

        });
  }
  
  
  
});


//User Reg Step 2
$( "#regstep2" ).click(function() {
  if( regstep2.valid() == true){
      $(regstep2 ).on('submit', function (e) {
          e.preventDefault();

          $.ajax({
            type: 'post',
            url: '<?=base_url();?>user/save_step_2',
            data: $('form').serialize(),
            success: function (json) {
                    console.log(json);
              if(JSON.parse(json).errors){
                        $.each(JSON.parse(json).errors, function(i,j){
 $("#error").html("<div style='margin-top: 5px;background-color: #e84848;padding: 2px;color: #fff; border-radius: 5px;'>"+j+"</div>");
                        })
                    }else{
                        
                      window.location = "<?=base_url();?>user/reg2";
                    }
            }
          });

        });
  }
});

$('.categor').click(function() {
  dt = this;    
  var category = $(this).attr("val");  
  var clicks =   $(this).data('clicks');
  var insertID = $(this).attr("data-interestid");
  if(insertID.length == 0){
 
  if (clicks) {
     
    //remove Favourite
    $.ajax({
            type: 'post',
            url: '<?=base_url();?>user/rmint',
            data: { cat: insertID },
            success: function (json) {
                    if(json == "failed"){
                    tata.success('Error!', 'Interest wa not removed, please try again', {
                    duration: 2000,
                    position: 'br',
                    animate: 'slide'

                    }) 
                 }else{
                    $(this).removeClass("bg-warning");
                    tata.info('Success!', 'Interest Removed.', {
                    duration: 2000,
                    position: 'br',
                    animate: 'slide'

                    }) 
                 }
            }
          });
     
      
  } else {
    //add Favourite
    $.ajax({
            type: 'post',
            url: '<?=base_url();?>user/addint',
            data: { cat : category },
            success: function (json) {
                console.log(json);
                 if(json == "failed"){
                    tata.success('Error!', 'Interest wa not added, please try again', {
                    duration: 2000,
                    position: 'br',
                    animate: 'slide'

                    }) 
                 }else{
                     console.log("data"+dt);
                    $(dt).attr("data-interestid", json);
                    tata.success('Success!', 'Interest Added.', {
                    duration: 2000,
                    position: 'br',
                    animate: 'slide'

                    }) 
                 }
            }
          });
      
    $(this).addClass("bg-warning");
  }
  
  }else{
    $.ajax({
            type: 'post',
            url: '<?=base_url();?>user/rmint',
            data: { cat: insertID },
            success: function (json) {
                    if(json == "failed"){
                    tata.success('Error!', 'Interest wa not removed, please try again', {
                    duration: 2000,
                    position: 'br',
                    animate: 'slide'

                    }) 
                 }else{
                    $(this).removeClass("bg-warning");
                    tata.info('Success!', 'Interest Removed.', {
                    duration: 2000,
                    position: 'br',
                    animate: 'slide'

                    }) 
                 }
            }
          });  
           $(dt).attr("data-interestid", "");
          $(this).removeClass("bg-warning");

      
      
  }
  $(this).data("clicks", !clicks);
});


});


</script>



</body>
</html>