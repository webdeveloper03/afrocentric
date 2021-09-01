               <!-- ==================
                  115 PAGE START
                  ================== -->
<style>
    .auth-wrapper{
        width:100 !important;
        padding:0px !important;
    }
    .plan-arrow {
         color: #000 !important;
    }   
</style>
<?php
    $allowBusiness = 0;
    
    $accountType = $this->session->userdata("accountType");
    if(isset($accountType) && $accountType != ""){
        $allowBusiness = 1;
    }

?>
                <section class="bg-white pb-5 ">
                  <div class="container-fluid sign-2-cnt-fluid">
                    <div class="row justify-content-between">
                      <div class="col-3">
                        <img src="<?=base_url();?>assets/images/site/Dei4vQVCMyr5fAszw38PRamGjH7ISl9O.png" id="logo" class="img-fluid sign2-imglogo">
                      </div>
                      <div class="col-3 text-right">
                        <a class="btn sign-btntop" href = "<?=base_url();?>login" role="button">
                          Sign In
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="container container-progress-2">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-10 col-md-6  mx-auto d-flex align-items-center justify-content-between">
                          <!-- <div class="number-circle number-active d-flex align-items-center justify-content-center font-weight-bold"> <i class="fa fa-check"></i> </div> -->
                          <div class="line-bar line-bar-active"></div>
                          <span class="prog-sp-1">Basic Information</span>
                          <!--div class="number-circle d-flex align-items-center justify-content-center font-weight-bold">2</div-->
                          <div class="line-bar"></div>
                          <?php if($allowBusiness == 1){
                            ?>
                                
                                <span class="prog-sp-2">Business Information</span>
                            
                            <?php 
                          }else{?>
                          <span class="prog-sp-2">Categories</span>
                        <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container sign-2-container">
                    <div class="row first-row-sign2">
                      <div class="col-md-12">
                        <h2 class="sign-head text-black" style="color:#000">Tell us about you</h2>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                            <p class = "er"></p>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="div-icones text-center">
                          <a href="#" id=top_icon>
                            <i class="fas fa-user icone-1"></i>
                            <i class="fas fa-plus icone2"></i>
                          </a>
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                       <?php if($allowBusiness == 1){
                            ?>     
                        <form id = "reg_form">    
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Username*</label>
                                <input type="text" name="username" class="form-control sign2-f-control" id="username" aria-describedby="emailHelp" required>
                                <p id="username-error"></p>
                              </div>
                            </div>
                            
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Email*</label>
                                <input type="email" name="email" class="form-control sign2-f-control" id="email" aria-describedby="emailHelp" required>
                                <p id="email-error"></p>
                              </div>
                            </div>
                            
                          </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">First Name*</label>
                                <input type="text" name="firstname" class="form-control sign2-f-control" id="firstname" aria-describedby="emailHelp" required>
                              </div>
                            </div>
                            
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Last Name*</label>
                                <input type="text" name="lastname" class="form-control sign2-f-control" id="lastname" aria-describedby="emailHelp" required>
                              </div>
                            </div>
                            
                          </div>
                          
                          
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Password*</label>
                                <input type="text" name="password" class="form-control sign2-f-control" id="password" aria-describedby="emailHelp" required>
                              </div>
                            </div>
                            
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Confirm Password</label>
                                <input type="text" name="cpassword" class="form-control sign2-f-control" id="cpassword" aria-describedby="emailHelp" required>
                              </div>
                            </div>
                            
                          </div>
                            
                            
                        <?php }else{
                        ?>
                        
                        <form id = "regstep2">       
                        
                        <?php 
                        } ?>    
                            
                            
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">House Address</label>
                                <input type="text" name="address1" class="form-control sign2-f-control" id="address1" aria-describedby="emailHelp">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleFormControlSelect1">City*</label>
                                <select required class="form-control sign2-f-control" id="city" name = "ucity">
                                  <option value="">Select City</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="web-label" for="exampleFormControlSelect1">State*</label>
                                <select required class="form-control sign2-f-control" id="state" name = "state">
                                  <option value="">Select State</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="web-label"  required for="exampleFormControlSelect1">Country/Region*</label>
                                <select class="form-control sign2-f-control" id="country" name="ucountry" required>
                                    <option value="">Select Country</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AX">Aland Islands</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AS">American Samoa</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, Democratic Republic of the Congo</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="CI">Cote D'Ivoire</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curacao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and Mcdonald Islands</option>
                                    <option value="VA">Holy See (Vatican City State)</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran, Islamic Republic of</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IE">Ireland</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                    <option value="KR">Korea, Republic of</option>
                                    <option value="XK">Kosovo</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Lao People's Democratic Republic</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao</option>
                                    <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia, Federated States of</option>
                                    <option value="MD">Moldova, Republic of</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="MP">Northern Mariana Islands</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestinian Territory, Occupied</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="BL">Saint Barthelemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="MF">Saint Martin</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="WS">Samoa</option>
                                    <option value="SM">San Marino</option>
                                    <option value="ST">Sao Tome and Principe</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="CS">Serbia and Montenegro</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SX">Sint Maarten</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syrian Arab Republic</option>
                                    <option value="TW">Taiwan, Province of China</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania, United Republic of</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="US">United States</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Viet Nam</option>
                                    <option value="VG">Virgin Islands, British</option>
                                    <option value="VI">Virgin Islands, U.s.</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                            </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="web-label" for="exampleInputEmail1">Phone Number*</label>
                                <input required type="text" class="form-control sign2-f-control" id="phone" name="phone" aria-describedby="emailHelp">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="div-for-sex-label">
                                <label class="web-label" for="exampleInputEmail1">Sex*</label>
                              </div>
                              <div class="funkyradio">
                                <div class="funkyradio-danger">
                                  <input type="radio" name="gender" id="radio4" value = "male" required/>
                                  <label for="radio4">Male</label>
                                </div>
                                <div class="funkyradio-warning">
                                  <input type="radio" name="gender" id="radio5" value = "female" required />
                                  <label for="radio5" class ="text-black">Female</label>
                                </div>
                                <div class="funkyradio-info">
                                <input type="radio" name="gender" id="radio6" value = "other" required/>
                                <label for="radio6">Other sexualities</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <label class="web-label web-label-birth signlabel" for="exampleInputEmail1">Birthday</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-3">
                              <div class="form-group">
                               <input type = "date" name = "dob" class = "form-control" />
                              </div>
                            </div>
                          </div>
                        <?php if($allowBusiness != 1){
                            ?>    
                          <div class="row sign2-lastrow">
                            <div class="col-md-12">
                              <div class="div-for-sex-label mb-2">
                                <label class="web-label" for="exampleInputEmail1">Make profile public?</label>
                              </div>
                              <div class="funkyradio">
                                <div class="funkyradio-primary">
                                  <input type="radio" name="public_profile" id="radio2" value = "1" checked/>
                                  <label for="radio2">Yes, I'll like to be public</label>
                                </div>
                                <div class="funkyradio-success">
                                  <input type="radio" name="public_profile" id="radio3" value = "0" />
                                  <label for="radio3">No, I prefer to be private</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php } ?>
                          
                          <div class="row">
                            <div class="col-md-11 m-auto">
                                <input type="hidden" name="terms" value="setisget" id="terms" checked/>
                              <button class="btn big-btn" type="submit" id = "<?php if($allowBusiness != 1){ echo 'reg_btn1'; }else{ echo 'reg_submit'; } ?>" >
                                Continue
                              </button>
                              <p id="error" class="error text-danger"></p>
                            </div>
                          </div>
                          
                        </form>
                      </div>
                    </div>
                  </div>
                </section>

               <!-- ==================
                  115 PAGE ENDS
               ================== -->
