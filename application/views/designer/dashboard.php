               <?php 
               $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>

               <div class="row mb-4">
                  <div class="col-xl-3 mb-2">
                     <div class="card border  shadow-sm counter-card h-100">
                        <div class="card-body p-4  d-flex align-items-center">
                           <div class="text-left">
                              <ul class="list-inline row mb-0 clearfix">
                                 <li class="col-12">
                                    <p class="mb-0 text-muted">Balance</p>
                                    <p class="m-b-5 counter set-color text-primary">₦0.00</p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 mb-2">
                     <div class="card border shadow-sm h-100">
                        <div class="card-header bg-transparent  border-0 pb-0">
                           <h6 class="card-title text-center text-uppercase text-dark m-0 font-weight-bold">Total Sales</h6>
                        </div>
                        <div class="card-body p-4">
                           <div class="text-center">
                              <ul class="list-inline row mb-0 clearfix">
                                 <li class="col-6">
                                    <p class="m-b-5 counter set-color text-primary">₦0.00</p>
                                    <p class="mb-0 text-muted">Admin Store</p>
                                 </li>
                                 <li class="col-6 border-left">
                                    <p class="m-b-5 counter set-color text-primary">₦0.00</p>
                                    <p class="mb-0 text-muted">Vendor Store</p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 mb-2">
                     <div class="card border  shadow-sm h-100">
                        <div class="card-header bg-transparent  border-0 pb-0">
                           <h6 class="card-title text-center text-uppercase text-dark m-0 font-weight-bold">Actions</h6>
                        </div>
                        <div class="card-body p-4">
                           <div class="text-center">
                              <ul class="list-inline row mb-0 clearfix">
                                 <li class="col-12">
                                    <p class="m-b-5 counter text-primary">
                                       <span class="set-color text-primary">0</span> / 
                                       ₦0.00                            	
                                    </p>
                                    <p class="mb-0 text-muted">Vendor pay <span class="set-color text-primary">₦0.00</span></p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 mb-2">
                     <div class="card border shadow-sm h-100">
                        <div class="card-header bg-transparent  border-0 pb-0">
                           <h6 class="card-title text-center text-uppercase text-dark m-0 font-weight-bold">Clicks</h6>
                        </div>
                        <div class="card-body p-4">
                           <div class="text-center">
                              <ul class="list-inline row mb-0 clearfix">
                                 <li class="col-12">
                                    <p class="m-b-5 counter text-primary">
                                       <span class="set-color text-primary">
                                       0                                </span> /
                                       <span class="set-color text-primary">
                                       ₦0.00                                </span>
                                    </p>
                                    <p class="mb-0 text-muted">Vendor pay 
                                       <span class="set-color text-primary">
                                       ₦0.00                                </span>
                                    </p>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3">
                     <div class="new-card border mt-2 card-toggle shadow-sm m-0">
                        <div class="card-header">
                           <h6 class="card-title">Wallet Statistics</h6>
                           <div class="card-options">
                              <button class="open-close-button"></button>
                           </div>
                        </div>
                        <div class="card-container">
                           <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                 <span>Hold</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>Unpaid</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>Request</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>Paid</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>Cancel</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                           </ul>
                           <div class="card-body">
                              <footer class="blockquote-footer font-14">
                                 Check All Transactions <cite title="Source Title"><a href="http://localhost/afrocentric/usercontrol/mywallet/">Click Here</a></cite>
                              </footer>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3">
                     <div class="new-card border mt-2 card-toggle shadow-sm m-0">
                        <div class="card-header">
                           <h6 class="card-title">All Clicks</h6>
                           <div class="card-options">
                              <button class="open-close-button"></button>
                           </div>
                        </div>
                        <div class="card-container">
                           <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                 <span>LocalStore</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>External</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>Forms</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>Vendor LocalStore</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>Vendor External</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                           </ul>
                           <div class="card-body">
                              <footer class="blockquote-footer font-14">
                                 All Clicks 
                                 <cite title="">
                                 0 /
                                 <span class="set-color text-primary">
                                 ₦0.00                            </span>
                                 </cite>
                              </footer>
                              <footer class="blockquote-footer font-14">
                                 All Vendor Clicks
                                 <cite title="">
                                 0 /
                                 <span class="set-color text-primary">
                                 ₦0.00                            </span>
                                 </cite>
                              </footer>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3">
                     <div class="new-card border mt-2 card-toggle shadow-sm m-0">
                        <div class="card-header">
                           <h6 class="card-title">Order Commission</h6>
                           <div class="card-options">
                              <button class="open-close-button"></button>
                           </div>
                        </div>
                        <div class="card-container">
                           <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                 <span>LocalStore</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>External</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>
                              </li>
                              <li class="list-group-item">
                                 <span>Vendor Localstore</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                              <li class="list-group-item">
                                 <span>Vendor External</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">0 / <span class="set-color text-primary">₦0.00</span></span>  
                              </li>
                           </ul>
                           <div class="card-body">
                              <footer class="blockquote-footer font-14">
                                 All Orders 
                                 <cite title="">
                                 0 /
                                 <span class="set-color text-primary">
                                 ₦0.00                            </span>
                                 </cite>
                              </footer>
                              <footer class="blockquote-footer font-14">
                                 All Vendor Orders 
                                 <cite title="">
                                 0 /
                                 <span class="set-color text-primary">
                                 ₦0.00                            </span>
                                 </cite>
                              </footer>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3">
                     <div class="new-card border mt-2 card-toggle shadow-sm m-0">
                        <div class="card-header">
                           <h6 class="card-title">Refered Levels</h6>
                           <div class="card-options">
                              <button class="open-close-button"></button>
                           </div>
                        </div>
                        <div class="card-container">
                           <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                 <span>Product Click</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">
                                 0 /
                                 <span class="set-color text-primary">₦0.00</span>
                                 </span>
                              </li>
                              <li class="list-group-item">
                                 <span>Sale</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">
                                 0 /
                                 <span class="set-color text-primary">₦0.00</span>
                                 </span>
                              </li>
                              <li class="list-group-item">
                                 <span>General Click</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">
                                 0 /
                                 <span class="set-color text-primary">₦0.00</span>
                                 </span>
                              </li>
                              <li class="list-group-item">
                                 <span>Action</span>
                                 <span class="text-right pull-right text-primary font-weight-bold">
                                 0 /
                                 <span class="set-color text-primary">₦0.00</span>
                                 </span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-7">
                     <div class="new-card shadow-sm">
                        <div class="card-header border-0">
                           <h5 class="card-title">AFFILIATE OVERVIEW</h5>
                           <div class="card-options">
                              <select onchange="loadDashboardChart()" class="renderChart chart-input form-control mr-1" name="group">
                                 <option value="day">Day</option>
                                 <option value="week">Week</option>
                                 <option value="month" selected="">Month</option>
                                 <option value="year">Year</option>
                              </select>
                              <select onchange="loadDashboardChart()" class="yearSelection chart-input form-control" name="year">
                                 <option value="2016">2016</option>
                                 <option value="2017">2017</option>
                                 <option value="2018">2018</option>
                                 <option value="2019">2019</option>
                                 <option value="2020">2020</option>
                                 <option value="2021" selected="selected">2021</option>
                              </select>
                           </div>
                        </div>
                        <div class="card-body">
                           <div class="chartjs-size-monitor">
                              <div class="chartjs-size-monitor-expand">
                                 <div class=""></div>
                              </div>
                              <div class="chartjs-size-monitor-shrink">
                                 <div class=""></div>
                              </div>
                           </div>
                           <ul class="list-inline widget-chart m-t-20 m-b-15 text-center">
                              <li class="list-inline-item d-block d-sm-inline-block m-auto">
                                 <i class="mdi mdi-arrow-up-bold-circle-outline text-success"></i>
                                 <h5 class="mb-0 ajax-weekly_balance">₦0.00</h5>
                                 <p class="font-14">Weekly Earning</p>
                              </li>
                              <li class="list-inline-item d-block d-sm-inline-block m-auto">
                                 <i class="mdi mdi-arrow-down-bold-circle-outline text-danger"></i>
                                 <h5 class="mb-0 ajax-monthly_balance">₦0.00</h5>
                                 <p class="font-14">Monthly Earning</p>
                              </li>
                              <li class="list-inline-item d-block d-sm-inline-block m-auto">
                                 <i class="mdi mdi-arrow-up-bold-circle-outline text-success"></i>
                                 <h5 class="mb-0 ajax-yearly_balance">₦0.00</h5>
                                 <p class="font-14">Yearly Earning</p>
                              </li>
                           </ul>
                           <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                           <canvas style="height: 257px; display: block; width: 515px;" id="dashboard-chart" class="ct-chart ct-golden-section chartjs-render-monitor" width="772" height="385"></canvas>
                           <div id="dashboard-chart-empty" class="ct-chart d-none ct-golden-section">
                              <div class="text-center">
                                 <img class="img-responsive" src="<?=base_url();?>assets/vertical/assets/images/no-data-2.png" style="margin-top:10px;">
                                 <h3 class="m-t-40 text-center">No Activity Yet</h3>
                              </div>
                           </div>
                           <script type="text/javascript">
                              var ctx = document.getElementById('dashboard-chart').getContext('2d');
                              var chartData = null;
                              
                              var chart = new Chart(ctx, {
                                  type: 'bar',
                                  data: {},
                                  options: {
                                      showLines: true,
                                      tooltips: {
                                          mode: 'index',
                                          intersect: false
                                      },
                                      scales: {},
                                      responsive: true,
                                  }
                              });
                              
                              function renderDashboardChart(chartData){
                                  var t = ctx.createLinearGradient(0, 0, 0, 150);
                                  t.addColorStop(0, Chart.helpers.color("#fd397a").alpha(.3).rgbString());
                                  t.addColorStop(1, Chart.helpers.color("#fd397a").alpha(0).rgbString());
                              
                                  var g = ctx.createLinearGradient(0, 0, 0, 150);
                                  g.addColorStop(0, Chart.helpers.color("#1dc9b7").alpha(.3).rgbString());
                                  g.addColorStop(1, Chart.helpers.color("#1dc9b7").alpha(0).rgbString());
                                  
                                  chart.data = {
                                      labels: Object.values(chartData['keys']),
                                      datasets: [
                                          {
                                              label: 'Action Count',
                                              backgroundColor: 'rgb(54, 162, 235)',
                                              borderColor: 'rgb(54, 162, 235)',
                                              data: Object.values(chartData['action_count']),
                                          },
                                          {
                              
                                              label: 'Order Count',
                                              backgroundColor: 'rgb(255, 205, 86)',
                                              borderColor: 'rgb(255, 205, 86)',
                                              data: Object.values(chartData['order_count']),
                                          },
                                          {
                                              type: "line",
                                              borderWidth:2,
                                              label: 'Order Commission',
                                              backgroundColor: g,
                                              borderColor: "#1dc9b7",
                                              data: Object.values(chartData['order_commission']),
                                          },
                                          {
                                              label: 'Action Commission',
                                              backgroundColor: 'rgb(75, 192, 192)',
                                              borderColor: 'rgb(75, 192, 192)',
                                              data: Object.values(chartData['action_commission']),
                                          },
                                          
                                          {
                                              type: "line",
                                              label: 'Order total',
                                              backgroundColor: t,
                                              borderColor: "#fd397a",
                                              borderWidth:2,
                                              data: Object.values(chartData['order_total']),
                                          },
                                      ]
                                  }
                              
                                  chart.update();
                              }
                              
                              function loadDashboardChart(){
                                  $.ajax({
                                      url:'http://localhost/afrocentric/usercontrol/dashboard?getChartData=1',
                                      type:'POST',
                                      dataType:'json',
                                      data:$(".chart-input"),
                                      beforeSend:function(){},
                                      complete:function(){},
                                      success:function(json){
                                         renderDashboardChart(json['chart']);
                                      },
                                  })
                              }
                              
                              loadDashboardChart()
                           </script>
                        </div>
                     </div>
                     <div class="new-card market-tool-card shadow-sm">
                        <div class="card-header border-0">
                           <h5 class="card-title">Affiliate Links...</h5>
                           <div class="card-options">
                              <label class="checkbox">
                              <input type="checkbox" class="display-vendor-links"> Display Vendor Links
                              </label>
                           </div>
                        </div>
                        <script type="text/javascript">
                           $(".display-vendor-links").change(function(){
                               getMarketTools()
                           })
                           
                           function getMarketTools() {
                               $this = $(this);
                               $.ajax({
                                   url:'#',
                                   type:'POST',
                                   dataType:'json',
                                   data:{
                                       dvl:$(".display-vendor-links").prop("checked")
                                   },
                                   beforeSend:function(){
                                       $(".market-tool-card .card-body").html("<p class='text-center py-5'>LOADING....</p>")
                                   },
                                   complete:function(){
                                       
                                   },
                                   success:function(json){
                                       if (json['html']) {
                                           $(".market-tool-card .card-body").html(json['html'])
                                       }
                                   },
                               })
                           }
                           
                           getMarketTools()
                        </script>
                        <div class="card-body p-0 h-100">
                           <div class="table-responsive b-0">
                              <table id="product-list" class="table table-no-wrap">
                                 <thead>
                                    <tr>
                                       <th class="text-center" width="1"></th>
                                       <th>Image</th>
                                       <th>Name</th>
                                       <th>Commission</th>
                                       <th></th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr class="">
                                       <td class="text-center">                    
                                          <button type="button" class="toggle-child-tr"><i class="fa fa-plus"></i></button>
                                       </td>
                                       <td>
                                          <span class="user-avatar" style="background-image:url('assets/image_cache/cache/assets/images/product/upload/thumb/8VsQlqZvG6Itp03dEfakFm4JhYoArjui-100x100.jpg')"></span>
                                       </td>
                                       <td>
                                          Antenatal Program                                
                                          <div>
                                             <small>
                                             <a target="_blank" href="http://localhost/afrocentric/store/NTU=/product/antenatal-program-8">Public Page</a> / 
                                             <a href="javascript:void(0);" onclick="generateCode(8,this);">Get Code</a>
                                             </small>
                                          </div>
                                       </td>
                                       <td>
                                          <b>You Will Get</b> : 
                                          ₦2,500.00 Per Sale                                <br><b>You Will Get</b> :
                                          ₦0.00 Per  Click                                                                
                                          <div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-group m-0">
                                             <div class="copy-input input-group">
                                                <input readonly="readonly" value="http://localhost/afrocentric/store/NTU=/product/antenatal-program-8" class="form-control input-product-url-8">
                                                <button type="button" copytoclipboard="http://localhost/afrocentric/store/NTU=/product/antenatal-program-8" class="input-group-addon" style="    border-left: 0;">
                                                &nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="product" data-related-id="8" data-input-class="input-product-url-8"><i class="fa fa-cog"></i></button>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/store/NTU=/product/antenatal-program-8?id=55" data-share-title="Antenatal Program" data-share-desc="For Women who are pregnant"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                       </td>
                                    </tr>
                                    <tr class="detail-tr">
                                       <td colspan="100%">
                                          <div>
                                             <ul>
                                                <li><b>Price :</b><span>₦4,500.00</span></li>
                                                <li><b>Sku :</b><span>ante1</span></li>
                                                <li>
                                                   <b>Sales / Commission :</b>
                                                   <span>
                                                   0 / 
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Clicks / Commission :</b>
                                                   <span>
                                                   0 / ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Total :</b>
                                                   <span>
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li><b>Display :</b> <span>Yes</span></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="text-center">                    
                                          <button type="button" class="toggle-child-tr"><i class="fa fa-plus"></i></button>
                                       </td>
                                       <td>
                                          <span class="user-avatar" style="background-image:url('assets/image_cache/cache/assets/images/product/upload/thumb/Jm2wVFpjn8iSvlX3LYsBU6P9NryfRWKA-100x100.jpg')"></span>
                                       </td>
                                       <td>
                                          Comprehensive metabolic panel                                
                                          <div>
                                             <small>
                                             <a target="_blank" href="http://localhost/afrocentric/store/NTU=/product/comprehensive-metabolic-panel-7">Public Page</a> / 
                                             <a href="javascript:void(0);" onclick="generateCode(7,this);">Get Code</a>
                                             </small>
                                          </div>
                                       </td>
                                       <td>
                                          <b>Sale</b> : ₦200.00<br><b>Click</b> : ₦0.00 Per 0 Clicks                                
                                          <div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-group m-0">
                                             <div class="copy-input input-group">
                                                <input readonly="readonly" value="http://localhost/afrocentric/store/NTU=/product/comprehensive-metabolic-panel-7" class="form-control input-product-url-7">
                                                <button type="button" copytoclipboard="http://localhost/afrocentric/store/NTU=/product/comprehensive-metabolic-panel-7" class="input-group-addon" style="    border-left: 0;">
                                                &nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="product" data-related-id="7" data-input-class="input-product-url-7"><i class="fa fa-cog"></i></button>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/store/NTU=/product/comprehensive-metabolic-panel-7?id=55" data-share-title="Comprehensive metabolic panel" data-share-desc="Comprehensive metabolic panel"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                       </td>
                                    </tr>
                                    <tr class="detail-tr">
                                       <td colspan="100%">
                                          <div>
                                             <ul>
                                                <li><b>Price :</b><span>₦30,000.00</span></li>
                                                <li><b>Sku :</b><span>cpm</span></li>
                                                <li>
                                                   <b>Sales / Commission :</b>
                                                   <span>
                                                   0 / 
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Clicks / Commission :</b>
                                                   <span>
                                                   0 / ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Total :</b>
                                                   <span>
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li><b>Display :</b> <span>Yes</span></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="text-center">                    
                                          <button type="button" class="toggle-child-tr"><i class="fa fa-plus"></i></button>
                                       </td>
                                       <td>
                                          <span class="user-avatar" style="background-image:url('assets/image_cache/cache/assets/images/product/upload/thumb/PJ6ScwWXHVKtspnBi9bZ81q3vDurkYdF-100x100.png')"></span>
                                       </td>
                                       <td>
                                          POSIM - Mega Partner Banquest                                
                                          <div>
                                             <small>
                                             <a target="_blank" href="http://localhost/afrocentric/store/NTU=/product/posim-mega-partner-banquest-bposim-6">Public Page</a> / 
                                             <a href="javascript:void(0);" onclick="generateCode(6,this);">Get Code</a>
                                             </small>
                                          </div>
                                       </td>
                                       <td>
                                          <b>You Will Get</b> : 
                                          ₦3,500.00 Per Sale                                <br><b>You Will Get</b> :
                                          ₦0.00 Per  Click                                                                
                                          <div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-group m-0">
                                             <div class="copy-input input-group">
                                                <input readonly="readonly" value="http://localhost/afrocentric/store/NTU=/product/posim-mega-partner-banquest-bposim-6" class="form-control input-product-url-6">
                                                <button type="button" copytoclipboard="http://localhost/afrocentric/store/NTU=/product/posim-mega-partner-banquest-bposim-6" class="input-group-addon" style="    border-left: 0;">
                                                &nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="product" data-related-id="6" data-input-class="input-product-url-6"><i class="fa fa-cog"></i></button>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/store/NTU=/product/posim-mega-partner-banquest-bposim-6?id=55" data-share-title="POSIM - Mega Partner Banquest" data-share-desc="POSIM one year subscription credited to mega Partners"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                       </td>
                                    </tr>
                                    <tr class="detail-tr">
                                       <td colspan="100%">
                                          <div>
                                             <ul>
                                                <li><b>Price :</b><span>₦3,500.00</span></li>
                                                <li><b>Sku :</b><span>BPosim</span></li>
                                                <li>
                                                   <b>Sales / Commission :</b>
                                                   <span>
                                                   0 / 
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Clicks / Commission :</b>
                                                   <span>
                                                   0 / ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Total :</b>
                                                   <span>
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li><b>Display :</b> <span>No</span></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="text-center">
                                          <button type="button" class="toggle-child-tr"><i class="fa fa-plus"></i></button>
                                       </td>
                                       <td>
                                          <span class="user-avatar" style="background-image:url('assets/image_cache/cache/assets/images/share-icon-100x100.png')"></span>
                                       </td>
                                       <td>
                                          POSIM  Mega Partner Banquet                                
                                          <div>
                                             <small>
                                             <a href="http://localhost/afrocentric/form/posim/NTU=" target="_black">Public Page</a> /
                                             <a href="javascript:void(0);" onclick="generateCodeForm(3,this);">Get Code</a>
                                             </small>    
                                          </div>
                                       </td>
                                       <td>
                                          <b>You Will Get</b> ₦3,500.00 Per Sale<br> <b>You Will Get</b>                                 
                                          <div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-group m-0">
                                             <div class="copy-input input-group">
                                                <input readonly="readonly" value="http://localhost/afrocentric/form/posim/NTU=" class="form-control input-form-url-3">
                                                <button type="button" copytoclipboard="http://localhost/afrocentric/form/posim/NTU=" class="input-group-addon" style="    border-left: 0;">
                                                &nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="form" data-related-id="3" data-input-class="input-form-url-3"><i class="fa fa-cog"></i></button>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/form/posim/NTU=?id=55" data-share-title="" data-share-desc=""><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                       </td>
                                    </tr>
                                    <tr class="detail-tr">
                                       <td colspan="100%">
                                          <div>
                                             <ul>
                                                <li><b>Coupon Code: </b> <span>N/A</span></li>
                                                <li><b>Coupon / Use: </b> <span>- / 0</span></li>
                                                <li><b>Sales / Commission: </b> <span>0 / ₦0.00</span></li>
                                                <li><b>Clicks  / Commission: </b> <span>0 / ₦0.00</span></li>
                                                <li><b>TOTAL COMMISSION: : </b> <span>₦0.00</span></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="text-center">                    
                                          <button type="button" class="toggle-child-tr"><i class="fa fa-plus"></i></button>
                                       </td>
                                       <td>
                                          <span class="user-avatar" style="background-image:url('assets/image_cache/cache/assets/images/product/upload/thumb/36kSaFlTYzyGK0hm17QruDnNLMgHI5dj-100x100.jpg')"></span>
                                       </td>
                                       <td>
                                          Bulk sms unit                                
                                          <div>
                                             <small>
                                             <a target="_blank" href="http://localhost/afrocentric/store/NTU=/product/bulk-sms-unit-bs-4">Public Page</a> / 
                                             <a href="javascript:void(0);" onclick="generateCode(4,this);">Get Code</a>
                                             </small>
                                          </div>
                                       </td>
                                       <td>
                                          <b>You Will Get</b> : 
                                          3.333% Per Sale                                <br><b>You Will Get</b> :
                                          ₦0.00 Per  Click                                                                
                                          <div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-group m-0">
                                             <div class="copy-input input-group">
                                                <input readonly="readonly" value="http://localhost/afrocentric/store/NTU=/product/bulk-sms-unit-bs-4" class="form-control input-product-url-4">
                                                <button type="button" copytoclipboard="http://localhost/afrocentric/store/NTU=/product/bulk-sms-unit-bs-4" class="input-group-addon" style="    border-left: 0;">
                                                &nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="product" data-related-id="4" data-input-class="input-product-url-4"><i class="fa fa-cog"></i></button>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/store/NTU=/product/bulk-sms-unit-bs-4?id=55" data-share-title="Bulk sms unit" data-share-desc="A unit of SMS is N1.00. You can only buy 500 quantity and above using this platform. Just change the quantity to your desired number you need."><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                       </td>
                                    </tr>
                                    <tr class="detail-tr">
                                       <td colspan="100%">
                                          <div>
                                             <ul>
                                                <li><b>Price :</b><span>₦1.00</span></li>
                                                <li><b>Sku :</b><span>Bs</span></li>
                                                <li>
                                                   <b>Sales / Commission :</b>
                                                   <span>
                                                   0 / 
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Clicks / Commission :</b>
                                                   <span>
                                                   0 / ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Total :</b>
                                                   <span>
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li><b>Display :</b> <span>Yes</span></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="text-center">                    
                                          <button type="button" class="toggle-child-tr"><i class="fa fa-plus"></i></button>
                                       </td>
                                       <td>
                                          <span class="user-avatar" style="background-image:url('assets/image_cache/cache/assets/images/product/upload/thumb/U2k9hjRJoZuXgI0OSnTf87tdr5v1xePQ-100x100.png')"></span>
                                       </td>
                                       <td>
                                          POSIM  basic                                
                                          <div>
                                             <small>
                                             <a target="_blank" href="http://localhost/afrocentric/store/NTU=/product/mypos-app-pos-3">Public Page</a> / 
                                             <a href="javascript:void(0);" onclick="generateCode(3,this);">Get Code</a>
                                             </small>
                                          </div>
                                       </td>
                                       <td>
                                          <b>You Will Get</b> : 
                                          ₦1,000.00 Per Sale                                <br><b>You Will Get</b> :
                                          ₦0.00 Per  Click                                                                
                                          <div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-group m-0">
                                             <div class="copy-input input-group">
                                                <input readonly="readonly" value="http://localhost/afrocentric/store/NTU=/product/mypos-app-pos-3" class="form-control input-product-url-3">
                                                <button type="button" copytoclipboard="http://localhost/afrocentric/store/NTU=/product/mypos-app-pos-3" class="input-group-addon" style="    border-left: 0;">
                                                &nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="product" data-related-id="3" data-input-class="input-product-url-3"><i class="fa fa-cog"></i></button>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/store/NTU=/product/mypos-app-pos-3?id=55" data-share-title="POSIM  basic" data-share-desc="Get your online point of sale and see your business make huge profit."><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                       </td>
                                    </tr>
                                    <tr class="detail-tr">
                                       <td colspan="100%">
                                          <div>
                                             <ul>
                                                <li><b>Price :</b><span>₦3,500.00</span></li>
                                                <li><b>Sku :</b><span>pos</span></li>
                                                <li>
                                                   <b>Sales / Commission :</b>
                                                   <span>
                                                   0 / 
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Clicks / Commission :</b>
                                                   <span>
                                                   0 / ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Total :</b>
                                                   <span>
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li><b>Display :</b> <span>Yes</span></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="text-center">                    
                                          <button type="button" class="toggle-child-tr"><i class="fa fa-plus"></i></button>
                                       </td>
                                       <td>
                                          <span class="user-avatar" style="background-image:url('assets/image_cache/cache/assets/images/product/upload/thumb/U2k9hjRJoZuXgI0OSnTf87tdr5v1xePQ-100x100.png')"></span>
                                       </td>
                                       <td>
                                          POSIM - REGULAR DOUBLE                                
                                          <div>
                                             <small>
                                             <a target="_blank" href="http://localhost/afrocentric/store/NTU=/product/mypos-app-pos-3">Public Page</a> / 
                                             <a href="javascript:void(0);" onclick="generateCode(5,this);">Get Code</a>
                                             </small>
                                          </div>
                                       </td>
                                       <td>
                                          <b>You Will Get</b> : 
                                          ₦2,000.00 Per Sale                                <br><b>You Will Get</b> :
                                          ₦0.00 Per  Click                                                                
                                          <div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-group m-0">
                                             <div class="copy-input input-group">
                                                <input readonly="readonly" value="http://localhost/afrocentric/store/NTU=/product/mypos-app-pos-3" class="form-control input-product-url-5">
                                                <button type="button" copytoclipboard="http://localhost/afrocentric/store/NTU=/product/mypos-app-pos-3" class="input-group-addon" style="    border-left: 0;">
                                                &nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="product" data-related-id="5" data-input-class="input-product-url-5"><i class="fa fa-cog"></i></button>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/store/NTU=/product/mypos-app-pos-3?id=55" data-share-title="POSIM - REGULAR DOUBLE" data-share-desc="Get your online point of sale and see your business make huge profit."><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                       </td>
                                    </tr>
                                    <tr class="detail-tr">
                                       <td colspan="100%">
                                          <div>
                                             <ul>
                                                <li><b>Price :</b><span>₦10,000.00</span></li>
                                                <li><b>Sku :</b><span>posim2</span></li>
                                                <li>
                                                   <b>Sales / Commission :</b>
                                                   <span>
                                                   0 / 
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Clicks / Commission :</b>
                                                   <span>
                                                   0 / ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Total :</b>
                                                   <span>
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li><b>Display :</b> <span>Yes</span></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="text-center">                    
                                          <button type="button" class="toggle-child-tr"><i class="fa fa-plus"></i></button>
                                       </td>
                                       <td>
                                          <span class="user-avatar" style="background-image:url('assets/image_cache/cache/assets/images/product/upload/thumb/zvHNpgqCWtjSyro0Rw5dFnYVXmOED7cx-100x100.png')"></span>
                                       </td>
                                       <td>
                                          School management system termly subscription                                
                                          <div>
                                             <small>
                                             <a target="_blank" href="http://localhost/afrocentric/store/NTU=/product/school-management-system-termly-subscription-sch-sub-2">Public Page</a> / 
                                             <a href="javascript:void(0);" onclick="generateCode(2,this);">Get Code</a>
                                             </small>
                                          </div>
                                       </td>
                                       <td>
                                          <b>You Will Get</b> : 
                                          ₦1,500.00 Per Sale                                <br><b>You Will Get</b> :
                                          ₦0.00 Per  Click                                                                
                                          <div>
                                             <b>Recurring </b> :                                 
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-group m-0">
                                             <div class="copy-input input-group">
                                                <input readonly="readonly" value="http://localhost/afrocentric/store/NTU=/product/school-management-system-termly-subscription-sch-sub-2" class="form-control input-product-url-2">
                                                <button type="button" copytoclipboard="http://localhost/afrocentric/store/NTU=/product/school-management-system-termly-subscription-sch-sub-2" class="input-group-addon" style="    border-left: 0;">
                                                &nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="product" data-related-id="2" data-input-class="input-product-url-2"><i class="fa fa-cog"></i></button>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/store/NTU=/product/school-management-system-termly-subscription-sch-sub-2?id=55" data-share-title="School management system termly subscription" data-share-desc="Subscribe to our school management system here for just N10,000. You will enjoy all the packages. "><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                       </td>
                                    </tr>
                                    <tr class="detail-tr">
                                       <td colspan="100%">
                                          <div>
                                             <ul>
                                                <li><b>Price :</b><span>₦10,000.00</span></li>
                                                <li><b>Sku :</b><span>sch-sub</span></li>
                                                <li>
                                                   <b>Sales / Commission :</b>
                                                   <span>
                                                   0 / 
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Clicks / Commission :</b>
                                                   <span>
                                                   0 / ₦0.00                                            </span>
                                                </li>
                                                <li>
                                                   <b>Total :</b>
                                                   <span>
                                                   ₦0.00                                            </span>
                                                </li>
                                                <li><b>Display :</b> <span>Yes</span></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr class="">
                                       <td class="text-center">
                                          <button type="button" class="toggle-child-tr"><i class="fa fa-plus"></i></button>
                                       </td>
                                       <td>
                                          <span class="user-avatar" style="background-image:url('http://localhost/afrocentric/assets/image_cache/cache/assets/images/share-icon-100x100.png')"></span>
                                       </td>
                                       <td>
                                          Sub Partnership Forms                                
                                          <div>
                                             <small>
                                             <a href="http://localhost/afrocentric/form/app3star_agents/NTU=" target="_black">Public Page</a> /
                                             <a href="javascript:void(0);" onclick="generateCodeForm(2,this);">Get Code</a>
                                             </small>    
                                          </div>
                                       </td>
                                       <td>
                                          <b>You Will Get</b> 10% Per Sale<br> <b>You Will Get</b>                                 
                                          <div>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="form-group m-0">
                                             <div class="copy-input input-group">
                                                <input readonly="readonly" value="http://localhost/afrocentric/form/app3star_agents/NTU=" class="form-control input-form-url-2">
                                                <button type="button" copytoclipboard="http://localhost/afrocentric/form/app3star_agents/NTU=" class="input-group-addon" style="    border-left: 0;">
                                                &nbsp;
                                                </button>
                                                <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="form" data-related-id="2" data-input-class="input-form-url-2"><i class="fa fa-cog"></i></button>
                                             </div>
                                          </div>
                                       </td>
                                       <td>
                                          <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/form/app3star_agents/NTU=?id=55" data-share-title="" data-share-desc=""><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                       </td>
                                    </tr>
                                    <tr class="detail-tr">
                                       <td colspan="100%">
                                          <div>
                                             <ul>
                                                <li><b>Coupon Code: </b> <span>N/A</span></li>
                                                <li><b>Coupon / Use: </b> <span>- / 0</span></li>
                                                <li><b>Sales / Commission: </b> <span>0 / ₦0.00</span></li>
                                                <li><b>Clicks  / Commission: </b> <span>0 / ₦0.00</span></li>
                                                <li><b>TOTAL COMMISSION: : </b> <span>₦0.00</span></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="modal" id="model-codemodal">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-body"></div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal" id="model-codeformmodal">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-body"></div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="modal" id="model-codeprogrammodal">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-body"></div>
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <script type="text/javascript">
                              function generateCode(affiliate_id,t){
                                  $this = $(t);
                                  $.ajax({
                                      url:'http://localhost/afrocentric/usercontrol/generateproductcode/'+affiliate_id,
                                      type:'POST',
                                      dataType:'html',
                                      beforeSend:function(){
                                          $this.btn("loading");
                                      },
                                      complete:function(){
                                          $this.btn("reset");
                                      },
                                      success:function(json){
                                          $('#model-codemodal .modal-body').html(json)
                                          $("#model-codemodal").modal("show")
                                      },
                                  })
                              }
                              
                              function generateCodeForm(form_id,t){ 
                                  $this = $(t);
                                  $.ajax({
                                      url:'http://localhost/afrocentric/usercontrol/generateformcode/'+form_id,
                                      type:'POST',
                                      dataType:'html',
                                      beforeSend:function(){
                                          $this.btn("loading");
                                      },
                                      complete:function(){
                                          $this.btn("reset");
                                      },
                                      success:function(json){
                                          $('#model-codeformmodal .modal-body').html(json)
                                          $("#model-codeformmodal").modal("show")
                                      },
                                  })
                              }
                              
                              $(document).delegate(".get-code",'click',function(){
                                  $this = $(this);
                                  $.ajax({
                                      url:'http://localhost/afrocentric/integration/tool_get_code/usercontrol',
                                      type:'POST',
                                      dataType:'json',
                                      data:{id:$this.attr("data-id")},
                                      beforeSend:function(){ $this.btn("loading"); },
                                      complete:function(){ $this.btn("reset"); },
                                      success:function(json){
                                          if(json['html']){
                                              $("#model-codeprogrammodal .modal-content").html(json['html']);
                                              $("#model-codeprogrammodal").modal("show");
                                          }
                                      },
                                  })
                              })
                              
                              $(".toggle-child-tr").on('click',function(){
                                  $tr = $(this).parents("tr");
                                  $ntr = $tr.next("tr.detail-tr");
                              
                                  if($ntr.css("display") == 'table-row'){
                                      $ntr.hide();
                                      $(this).find("i").attr("class","fa fa-plus");
                                  }else{
                                      $(this).find("i").attr("class","fa fa-minus");
                                      $ntr.show();
                                  }
                              })
                           </script>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-5">
                     <div class="new-card pb-3 shadow-sm m-0">
                        <div class="card-header">
                           <h5 class="card-title">Membership Plan</h5>
                        </div>
                        <div class="card-body">
                           <h4 class="text-success"><span class="text-muted">Plan: </span>Mega Partners</h4>
                        </div>
                        <ul class="list-group list-group-flush">
                           <li class="list-group-item">
                              <span>Plan Date</span>
                              <span class="text-right pull-right text-primary">
                              06 July 2021 07:04 AM to Lifetime                        </span>  
                           </li>
                           <li class="list-group-item">
                              <span class="d-inline-block">Remaining Time</span>
                              <span class=" pull-right text-primary text-right">
                              <span class="font-32" style="line-height: 22px;">∞</span>                        </span>  
                           </li>
                           <li class="list-group-item">
                              <span>Plan Status</span>
                              <span class="text-right pull-right text-primary">
                              <span class="badge badge-success">Active</span>                        </span>  
                           </li>
                           <li class="list-group-item">
                              <span>Active</span>
                              <span class="text-right pull-right text-primary">
                              <span class="badge badge-success">Active</span>                        </span>  
                           </li>
                        </ul>
                     </div>
                     <div class="new-card border card-toggle shadow-sm">
                        <div class="card-header">
                           <h6 class="card-title">Description</h6>
                           <div class="card-options">
                              <button class="open-close-button"></button>
                           </div>
                        </div>
                        <div class="card-container">
                           <div class="card-body pb-0">
                              <p>FOR MEGA PARTNERS<br></p>
                           </div>
                        </div>
                     </div>
                     <div class="new-card pb-3 shadow-sm">
                        <div class="card-header">
                           <h5 class="card-title"><small class="text-muted">Your Affiliate ID : 55</small></h5>
                           <div class="card-options">
                              <label class="m-0">
                              <input type="checkbox" id="show_my_id"> Show My ID
                              </label>
                           </div>
                        </div>
                        <div class="card-body">
                           <h6>Your Unique Reseller link</h6>
                           <div class="row">
                              <div class="col-11 p-0 pr-1">
                                 <div class="form-group show-tiny-link">
                                    <div class="copy-input input-group ">
                                       <input type="text" readonly="readonly" value="http://localhost/afrocentric/register/NTU=" class="form-control input-register-url-0">
                                       <button copytoclipboard="http://localhost/afrocentric/register/NTU=" class="input-group-addon" data-original-title="" title=""></button>
                                       <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="register" data-related-id="0" data-input-class="input-register-url-0"><i class="fa fa-cog"></i></button>
                                    </div>
                                 </div>
                                 <div class="form-group show-mega-link d-none">
                                    <div class="copy-input input-group ">
                                       <input type="text" readonly="readonly" value="http://localhost/afrocentric/register/NTU=/?id=55" class="form-control input-register-url-0" data-addition-url="/?id=55">
                                       <button copytoclipboard="http://localhost/afrocentric/register/NTU=/?id=55" class="input-group-addon" data-original-title="" title=""></button>
                                       <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="register" data-related-id="0" data-input-class="input-register-url-0"><i class="fa fa-cog"></i></button>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-1 p-0">
                                 <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/register/NTU=?id=55" data-share-title="" data-share-desc=""><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                              </div>
                           </div>
                           <div>
                              <hr>
                           </div>
                           <h6>Affiliate Store URL</h6>
                           <div class="row">
                              <div class="col-11 p-0 pr-1">
                                 <div class="form-group show-tiny-link">
                                    <div class="copy-input input-group ">
                                       <input type="text" readonly="readonly" value="http://localhost/afrocentric/store/NTU=" class="form-control input-store-url-0">
                                       <button copytoclipboard="http://localhost/afrocentric/store/NTU=" class="input-group-addon" data-original-title="" title=""></button>
                                       <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="store" data-related-id="0" data-input-class="input-store-url-0"><i class="fa fa-cog"></i></button>
                                    </div>
                                 </div>
                                 <div class="form-group show-mega-link d-none">
                                    <div class="copy-input input-group ">
                                       <input type="text" readonly="readonly" value="http://localhost/afrocentric/store/NTU=/?id=55" class="form-control input-store-url-0" data-addition-url="/?id=55">
                                       <button copytoclipboard="http://localhost/afrocentric/store/NTU=/?id=55" class="input-group-addon" data-original-title="" title=""></button>
                                       <button type="button" class="btn btn-sm btn-dark btn-model-slug" data-type="store" data-related-id="0" data-input-class="input-store-url-0"><i class="fa fa-cog"></i></button>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-1 p-0">
                                 <span class="btn btn-md btn-primary" data-social-share="" data-share-url="http://localhost/afrocentric/store/NTU=?id=55" data-share-title="" data-share-desc=""><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <script type="text/javascript">
                        $("#show_my_id").change(function(){
                            if($(this).prop("checked")){
                                $(".show-mega-link").removeClass("d-none");
                                $(".show-tiny-link").addClass("d-none");
                            } else {
                                $(".show-mega-link").addClass("d-none");
                                $(".show-tiny-link").removeClass("d-none");
                            }
                        })
                     </script>
                     <div class="new-card mt-4 shadow-sm">
                        <div class="card-header border-0">
                           <h5 class="card-title">10 TOP AFFILIATES</h5>
                        </div>
                        <div class="card-body p-0">
                           <div role="tabpanel" id="top-users-data">
                              <div class="data-here">
                                 <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                       <div class="col-sm-12 col-md-6"></div>
                                       <div class="col-sm-12 col-md-6"></div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <table class="table-striped table responsive no-wrap dataTable no-footer dtr-inline collapsed" id="DataTables_Table_0" role="grid" style="width: 398px;">
                                             <thead>
                                                <tr role="row">
                                                   <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 50px;"></th>
                                                   <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 102px;">Name</th>
                                                   <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 74px;">Country</th>
                                                   <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 76px;">Balance</th>
                                                   <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 0px; display: none;">Commission</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <tr role="row" class="odd">
                                                   <td class="dtr-control"><span class="user-avatar" style="background-image:url('assets/vertical/assets/images/users/avatar-1.jpg')"></span></td>
                                                   <td>Tessy Bola</td>
                                                   <td>NG <img class="country-flag" src="<?=base_url();?>assets/vertical/assets/images/flags/ng.png"></td>
                                                   <td>₦0.00</td>
                                                   <td style="display: none;">₦506.62</td>
                                                </tr>
                                                <tr role="row" class="even">
                                                   <td class="dtr-control"><span class="user-avatar" style="background-image:url('assets/vertical/assets/images/users/avatar-1.jpg')"></span></td>
                                                   <td>debade axa</td>
                                                   <td>NG <img class="country-flag" src="<?=base_url();?>assets/images/flags/ng.png"></td>
                                                   <td>₦0.00</td>
                                                   <td style="display: none;">₦33.33</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-sm-12 col-md-5"></div>
                                       <div class="col-sm-12 col-md-7"></div>
                                    </div>
                                 </div>
                              </div>
                              <script type="text/javascript">
                                 var dataTableUser = $("#top-users-data table").dataTable({
                                     "paging":   false,
                                     "ordering": false,
                                     "searching": false,
                                     "info":     false
                                 })
                              </script>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                <!------AFFILIATE LINKS END--------->
               <link rel="stylesheet" type="text/css" href="assets/plugins/social-share/social-share.css">
               <div id="social-share-modal" class="modal" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Share on Social Network</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        <div class="modal-body">
                        </div>
                     </div>
                  </div>
               </div>
               <script type="text/javascript">
                  $(document).on("click", "[data-social-share]", function(){
                      
                      let url = encodeURIComponent($(this).data("share-url"));
                      let title = $(this).data("share-title") ? encodeURIComponent($(this).data("share-title")) : url ;
                      let desc = $(this).data("share-desc") ? encodeURIComponent($(this).data("share-desc")) : "" ;
                  
                      $('#social-share-modal .modal-body').html(`
                          <!-- Sharingbutton Facebook -->
                          <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=`+url+`&description=" target="_blank" rel="noopener" aria-label="Facebook">
                          <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle"><i class="fab fa-facebook-square"></i>&nbsp;</div>Facebook</div></a>
                  
                          <!-- Sharingbutton Twitter -->
                          <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=`+title+`%20`+desc+`&amp;url=`+url+`" target="_blank" rel="noopener" aria-label="Twitter"><div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle"><i class="fab fa-twitter" aria-hidden="true"></i>&nbsp;</div>Twitter</div></a>
                  
                          <!-- Sharingbutton Tumblr -->
                          <a class="resp-sharing-button__link" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=`+title+`&amp;caption=`+title+`&amp;content=`+desc+`&amp;canonicalUrl=`+url+`&amp;shareSource=tumblr_share_button" target="_blank" rel="noopener" aria-label="Tumblr"><div class="resp-sharing-button resp-sharing-button--tumblr resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle"><i class="fab fa-tumblr-square" aria-hidden="true"></i>&nbsp;</div>Tumblr</div></a>
                  
                          <!-- Sharingbutton E-Mail -->
                          <a class="resp-sharing-button__link" href="mailto:?subject=`+title+`&amp;body=`+title+`%20`+url+`%20`+desc+`" target="_self" rel="noopener" aria-label="E-Mail"><div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;</div>E-Mail</div></a>
                  
                          <!-- Sharingbutton LinkedIn -->
                          <a class="resp-sharing-button__link" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=`+url+`&amp;title=`+title+`&amp;summary=`+desc+`&amp;source=`+url+`" target="_blank" rel="noopener" aria-label="LinkedIn"><div class="resp-sharing-button resp-sharing-button--linkedin resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle"><i class="fab fa-linkedin" aria-hidden="true"></i>&nbsp;</div>LinkedIn</div></a>
                  
                          <!-- Sharingbutton WhatsApp -->
                          <a class="resp-sharing-button__link" href="whatsapp://send?text=`+url+`" target="_blank" rel="noopener" aria-label="WhatsApp"><div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle"><i class="fab fa-whatsapp" aria-hidden="true"></i>&nbsp;</div>WhatsApp</div></a>
                  
                          <!-- Sharingbutton Telegram -->
                          <a class="resp-sharing-button__link" href="https://telegram.me/share/url?text=`+title+`&amp;url=`+url+`" target="_blank" rel="noopener" aria-label="Telegram"><div class="resp-sharing-button resp-sharing-button--telegram resp-sharing-button--medium"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solidcircle"><i class="fa fa-telegram" aria-hidden="true"></i>&nbsp;</div>Telegram</div></a>
                          
                          <!-- Sharingbutton Pinterest -->
                          <a class="resp-sharing-button__link" href="https://pinterest.com/pin/create/button/?url=`+url+`&amp;media=`+url+`&amp;description=`+title+`." target="_blank" rel="noopener" aria-label="Share on Pinterest"><div class="resp-sharing-button resp-sharing-button--pinterest resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid"><i class="fab fa-pinterest" aria-hidden="true"></i>&nbsp;</div>Share on Pinterest</div></a>
                  
                          <!-- Sharingbutton Reddit -->
                          <a class="resp-sharing-button__link" href="https://reddit.com/submit/?url=`+url+`&amp;resubmit=true&amp;title=`+title+`." target="_blank" rel="noopener" aria-label="Share on Reddit"><div class="resp-sharing-button resp-sharing-button--reddit resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid"><i class="fab fa-pinterest" aria-hidden="true"></i>&nbsp;</div>Share on Reddit</div></a>
                  
                          <!-- Sharingbutton XING -->
                          <a class="resp-sharing-button__link" href="https://www.xing.com/app/user?op=share;url=`+url+`;title=`+title+`." target="_blank" rel="noopener" aria-label="Share on XING"><div class="resp-sharing-button resp-sharing-button--xing resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid"><i class="fab fa-xing" aria-hidden="true"></i>&nbsp;</div>Share on XING</div></a>
                  
                          <!-- Sharingbutton Hacker News -->
                          <a class="resp-sharing-button__link" href="https://news.ycombinator.com/submitlink?u=`+url+`&amp;t=`+title+`." target="_blank" rel="noopener" aria-label="Share on Hacker News"><div class="resp-sharing-button resp-sharing-button--hackernews resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid"><i class="fab fa-hacker-news"></i>&nbsp;</div>Share on Hacker News</div></a>
                  
                          <!-- Sharingbutton VK -->
                          <a class="resp-sharing-button__link" href="http://vk.com/share.php?title=`+title+`.&amp;url=`+url+`" target="_blank" rel="noopener" aria-label="Share on VK"><div class="resp-sharing-button resp-sharing-button--vk resp-sharing-button--large"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid"><i class="fab fa-vk" aria-hidden="true"></i>&nbsp;</div>Share on VK</div></a>
                      `);
                  
                      $('#social-share-modal').modal('show');
                  });
               </script>
               <script type="text/javascript">
                  $(function() {
                      start_plan_expiration_timer();
                  });
                  
                  function setColors() {
                      $(".set-color").each(function(i,ele){
                          var val =  parseInt($(ele).html().toString().replace(/[^0-9-.]/g, '') || 0);
                  
                          $(ele).removeClass("text-primary")
                          $(ele).removeClass("text-danger")
                          if(val >= 0){
                              $(ele).addClass("text-primary");
                          } else{
                              $(ele).addClass("text-danger");
                          }
                      })
                  }
                  
                  setColors();
               </script>
               <script type="text/javascript">
                  $(".card-toggle .open-close-button").click(function(){
                      $(this).parents(".card-toggle").toggleClass("open")
                  })
               </script>
            </div>
            <!-- content -->
            <footer class="footer">Copyright @ 2021. All rights reserved.</footer>
         </div>
         <!-- End Right content here -->
      </div>
      <script src="<?=base_url();?>assets/js/jquery-confirm.min.js"></script>
      <script src="<?=base_url();?>assets/js/popper.min.js"></script>
      <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
      <script src="<?=base_url();?>assets/js/modernizr.min.js"></script>
      <script src="<?=base_url();?>assets/js/detect.js"></script>
      <script src="<?=base_url();?>assets/js/fastclick.js"></script>
      <script src="<?=base_url();?>assets/js/jquery.slimscroll.js"></script>
      <script src="<?=base_url();?>assets/js/jquery.blockUI.js"></script>
      <script src="<?=base_url();?>assets/js/waves.js"></script>
      <script src="<?=base_url();?>assets/js/jquery.nicescroll.js"></script>
      <script src="<?=base_url();?>assets/js/jquery.scrollTo.min.js"></script>
      <script src="<?=base_url();?>assets/vertical/assets/plugins/skycons/skycons.min.js"></script>
      <script src="<?=base_url();?>assets/vertical/assets/plugins/raphael/raphael-min.js"></script>
      <script src="<?=base_url();?>assets/vertical/assets/plugins/morris/morris.min.js"></script>
      <script src="<?=base_url();?>assets/js/dashborad.js"></script>
      <script src="<?=base_url();?>assets/js/jssocials-1.4.0/jssocials.min.js"></script>
      <link type="text/css" rel="stylesheet" href="assets/js/jssocials-1.4.0/jssocials.css">
      <link type="text/css" rel="stylesheet" href="assets/js/jssocials-1.4.0/jssocials-theme-flat.css">
      <link href="assets/js/summernote-0.8.12-dist/summernote-bs4.css" rel="stylesheet">
      <script src="<?=base_url();?>assets/js/summernote-0.8.12-dist/summernote-bs4.js"></script>
      <link href="assets/vertical/assets/css/style.css?v=4.2" rel="stylesheet" type="text/css">
      <div class="modal fade" id="ip-flag_model">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">All IPs Details</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <div class="modal-body"></div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="modal-create-slug">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <form action="http://localhost/afrocentric/usercontrol/create_slug" method="post" id="form-create-slug">
                  <div class="modal-header">
                     <h6 class="modal-title m-0">Create Slug</h6>
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  </div>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="control-label">Slug</label>
                        <div>
                           <input type="text" name="slug" class="form-control" placeholder="Enter Slug Here...">
                           <input type="hidden" name="type">
                           <input type="hidden" name="related_id">
                           <input type="hidden" name="target">
                        </div>
                     </div>
                     <div class="div-slug-url" style="display: none;">
                        <div class="copy-input input-group">
                           <input type="text" readonly="readonly" class="form-control">
                           <button type="button" copytoclipboard="" class="input-group-addon" data-original-title="" title=""></button>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     <button type="submit" name="create_slug" class="btn btn-success">Create</button>
                     <button type="button" name="delete_slug" class="btn btn-danger btn-delete-slug">Delete</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         $(document).delegate('[name="slug"]','keyup',function(){
            var slug = $(this).val();
            var base_url = "http://localhost/afrocentric/";
            $('#form-create-slug').find('.div-slug-url input').val(base_url+slug);
         });
         $(document).delegate('.btn-model-slug', 'click', function(){
             $form = $('#form-create-slug');
             $form[0].reset();
             $form.find(".alert").remove();
             $form.find(".has-error").removeClass("has-error");
             $form.find("span.text-danger").remove();
         
             var type = $(this).attr('data-type');
             var related_id = $(this).attr('data-related-id');
             var target = $(this).attr('data-input-class');
         
             $this = $(this);
             $.ajax({
                 url:"http://localhost/afrocentric/usercontrol/get_slug",
                 type:'POST',
                 dataType:'json',
                 data:{
                     type: type,
                     related_id: related_id
                 },
                 beforeSend:function(){$this.btn("loading");},
                 complete:function(){$this.btn("reset");},
                 success:function(json){
                     $form.find('.div-slug-url').hide();
                     $form.find('.btn-delete-slug').hide();
                     
                     if(json['success']){
                        $form.find('.div-slug-url button').attr('copytoclipboard',json.slug_url);
                        $form.find('.div-slug-url input').val(json.slug_url);
                        $form.find('.btn-delete-slug').show();
                        $form.find('.div-slug-url').show();
                         $('#modal-create-slug').find('[name="slug"]').val(json['slug']);
                     }
         
                     $('#modal-create-slug').find('[name="type"]').val(type);
                     $('#modal-create-slug').find('[name="related_id"]').val(related_id);
                     $('#modal-create-slug').find('[name="target"]').val(target);
                     $('#modal-create-slug').modal({'keyboard':false, 'backdrop': 'static'});
                 },
             })
         });
         $('#modal-create-slug').delegate('#form-create-slug', 'submit', function(e){
             e.preventDefault();
         
             $this = $(this);
             $this_btn = $this.find('[name="create_slug"]');
             $target = $this.find('[name="target"]').val();
             
             $.ajax({
                 url:$this.attr('action'),
                 type:'POST',
                 dataType:'json',
                 data:$this.serialize(),
                 beforeSend:function(){$this_btn.btn("loading");},
                 complete:function(){$this_btn.btn("reset");},
                 success:function(json){
                     $container = $this;
                     $container.find(".has-error").removeClass("has-error");
                     $container.find("span.text-danger").remove();
                     $container.find(".alert").remove();
                     
                     if(json['errors']){
                         $.each(json['errors'], function(i,j){
                             $ele = $container.find('[name="'+ i +'"]');
                             if($ele){
                                 $ele.parents(".form-group").addClass("has-error");
                                 $ele.after("<span class='text-danger'>"+ j +"</span>");
                             }
                         })
                         $this.find('.div-slug-url').hide();
                     }
         
                     if(json['error']){
                         $this.find('.modal-body').prepend('<div class="alert bg-danger text-white">'+json['error']+'</div>');
                     }
         
                     if(json['success']){
                        $.each($('.'+$target), function(k,v){
                           if($(v).attr('data-addition-url')){
                              var addition_url = $(v).attr('data-addition-url');
                              $(v).val(json.slug_url + addition_url);
                              $(v).next('[copyToClipboard]').attr('copyToClipboard', json.slug_url + addition_url);
                           }else{
                              $(v).val(json.slug_url);
                              $(v).next('[copyToClipboard]').attr('copyToClipboard', json.slug_url);
                           }
                        });
         
                        $this.find('.div-slug-url').show();
                         $this.find('.div-slug-url button').attr('copytoclipboard',json.slug_url);
                         $this.find('.div-slug-url input').val(json.slug_url);
                         $this.find('.modal-body').prepend('<div class="alert alert-success">'+json['success']+'</div>');
                     }
                 },
             })
         });
         
         $('#modal-create-slug').delegate('.btn-delete-slug', 'click', function(){
             if(!confirm('Are you sure?')) return false;
         
             $this = $('#form-create-slug');
             $this_btn = $(this);
             $target = $this.find('[name="target"]').val();
             
             $.ajax({
                 url: 'http://localhost/afrocentric/usercontrol/delete_slug',
                 type:'POST',
                 dataType:'json',
                 data:$this.serialize(),
                 beforeSend:function(){$this_btn.btn("loading");},
                 complete:function(){$this_btn.btn("reset");},
                 success:function(json){
                     $container = $this;
                     $container.find(".alert").remove();
                     
                     if(json['error']){
                         $this.find('.modal-body').prepend('<div class="alert alert-danger">'+json['error']+'</div>');
                     }
         
                     if(json['success']){
                        $.each($('.'+$target), function(k,v){
                           if($(v).attr('data-addition-url')){
                              var addition_url = $(v).attr('data-addition-url');
                              $(v).val(json.url + addition_url);
                              $(v).next('[copyToClipboard]').attr('copyToClipboard', json.url + addition_url);
                           }else{
                              $(v).val(json.url);
                              $(v).next('[copyToClipboard]').attr('copyToClipboard', json.url);
                           }
                        });
         
                        $this.find('.div-slug-url').hide();
                         $this.find('.div-slug-url input').val(json.url);
                         $this.find('[name="slug"]').val('');
                         $this_btn.hide();
                         $this.find('.modal-body').prepend('<div class="alert alert-success">'+json['success']+'</div>');
                         setTimeout(function(){
                           $('#modal-create-slug').modal('hide');
                         }, 2000);
                     }
                 },
             })
         });
      </script>
      <!-- App js -->
      <script src="<?=base_url();?>assets/js/app.js"></script>
      <script type="text/javascript">
         $(".select2-input").select2();
         
         $(document).delegate(".only-number-allow","keypress",function (e) {
               if (e.which != 46 && e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                     return false;
               }
            });
         
         function readURL(input,placeholder) {
           if (input.files && input.files[0]) {
             var reader = new FileReader();
             
             reader.onload = function(e) {
               $(placeholder).attr('src', e.target.result);
             }
             
             reader.readAsDataURL(input.files[0]);
           }
         }
         
         function sumNote(element){
               
                var height = $(element).attr("data-height") ? $(element).attr("data-height") : 500;
                $(element).summernote({
                    disableDragAndDrop: true,
                    height: height,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'image', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    buttons: {
                        image: function() {
                            var ui = $.summernote.ui;
                            // create button
                            var button = ui.button({
                                contents: '<i class="fa fa-image" />',
                                tooltip: false,
                                click: function () {
                                    $('#modal-image').remove();
                                
                                    $.ajax({
                                        url: 'http://localhost/afrocentric/filemanager',
                                        dataType: 'html',
                                        beforeSend: function() {
                                        },complete: function() {
                                        },success: function(html) {
                                            $('body').append('<div id="modal-image" class="modal fade">' + html + '</div>');
                                            $('#modal-image').modal('show');
                                            $('#modal-image').delegate('.image-box .thumbnail','click', function(e) {
                                                e.preventDefault();
                                                $(element).summernote('insertImage', $(this).attr('href'));
                                                $('#modal-image').modal('hide');
                                            });
                                        }
                                    });                     
                                }
                            });
                        
                            return button.render();
                        }
                    }
                });
            }
         
         $(document).delegate(".view-all",'click',function(){
            var data = $(this).find("span").html();
            var html = '<table class="table table-hover">';
            data = JSON.parse(data);
            html += '<tr>';
            html += '   <th>IP</th>';
            html += '   <th width="30px">Country</th>';
            html += '</tr>';
         
            $.each(data, function(i,j){
               html += '<tr>';
               html += '   <td>'+ j['ip'] +'</td>';
               html += '   <td><img style="width: 20px;" src="http://localhost/afrocentric/assets/vertical/assets/images/flags/'+ j['country_code'].toLowerCase() +'.png" ></td>';
               html += '</tr>';
            })
            html += '</table>';
         
            $("#ip-flag_model").modal("show");
            $("#ip-flag_model .modal-body").html(html);
         })
         $(document).delegate(".copy-input input",'click', function(){
            $(this).select();
         })
         $(document).delegate('[copyToClipboard]',"click", function(){
            $this = $(this);
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(this).attr('copyToClipboard')).select();
            document.execCommand("copy");
            $temp.remove();
            $this.tooltip('hide').attr('data-original-title', 'Copied!').tooltip('show');
            setTimeout(function() { $this.tooltip('hide'); }, 500);
         });
         $('[copyToClipboard]').tooltip({
           trigger: 'click',
           placement: 'bottom'
         });
      </script>
      <script>
         /* BEGIN SVG WEATHER ICON */
         if (typeof Skycons !== 'undefined'){
            var icons = new Skycons(
            {"color": "#fff"},
            {"resizeClear": true}
            ),
            list  = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
            ],
            i;
            
            for(i = list.length; i--; )
            icons.set(list[i], list[i]);
            icons.play();
         };
         
         // scroll
         
         $(document).on('ready',function() {
                if($("#boxscroll").length > 0){
               $("#boxscroll").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true});
            }
            if($("#boxscroll2").length > 0){
               $("#boxscroll2").niceScroll({cursorborder:"",cursorcolor:"#cecece",boxzoom:true}); 
            }
         });
         
         function shownofication(id,url){
            $.ajax({
               type: "POST",
               url: "http://localhost/afrocentric/usercontrol/updatenotify",
               data:{'id':id},
               dataType:'json',
               success: function(data){
                  window.location.href=data['location'];
               }
            });
         }
      </script>
      <!-- <script src="http://localhost/afrocentric/assets/vertical/assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js" type="text/javascript"></script> -->
      <div class="modal" id="setting-widzard"></div>
      <div class="modal" id="log-widzard"></div>
      <div class="modal" id="model-ajaxError">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-body">
                  <img src="<?=base_url();?>assets/images/ajax-warning.png">
                  <div class="-body"></div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss</button>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="<?=base_url();?>assets/plugins/toastr/toastr.js"></script>
      <script type="text/javascript">
         var serverErrorCode  = {
             100 : 'Continue',
             101 : 'Switching Protocols',
             102 : 'Processing', 
             200 : 'OK',
             201 : 'Created',
             202 : 'Accepted',
             203 : 'Non-Authoritative Information', 
             204 : 'No Content',
             205 : 'Reset Content',
             206 : 'Partial Content',
             207 : 'Multi-Status', 
             208 : 'Already Reported', 
             226 : 'IM Used', 
             300 : 'Multiple Choices',
             301 : 'Moved Permanently',
             302 : 'Found',
             303 : 'See Other', 
             304 : 'Not Modified',
             305 : 'Use Proxy', 
             306 : 'Switch Proxy',
             307 : 'Temporary Redirect', 
             308 : 'Permanent Redirect', 
             400 : 'Bad Request',
             401 : 'Unauthorized',
             402 : 'Payment Required',
             403 : 'Forbidden',
             404 : 'Not Found',
             405 : 'Method Not Allowed',
             406 : 'Not Acceptable',
             407 : 'Proxy Authentication Required',
             408 : 'Request Timeout',
             409 : 'Conflict',
             410 : 'Gone',
             411 : 'Length Required',
             412 : 'Precondition Failed',
             413 : 'Request Entity Too Large',
             414 : 'Request-URI Too Long',
             415 : 'Unsupported Media Type',
             416 : 'Requested Range Not Satisfiable',
             417 : 'Expectation Failed',
             418 : 'I\'m a teapot', 
             419 : 'Authentication Timeout', 
             420 : 'Enhance Your Calm', 
             420 : 'Method Failure', 
             422 : 'Unprocessable Entity', 
             423 : 'Locked', 
             424 : 'Failed Dependency', 
             424 : 'Method Failure', 
             425 : 'Unordered Collection', 
             426 : 'Upgrade Required', 
             428 : 'Precondition Required', 
             429 : 'Too Many Requests', 
             431 : 'Request Header Fields Too Large', 
             444 : 'No Response', 
             449 : 'Retry With', 
             450 : 'Blocked by Windows Parental Controls', 
             451 : 'Redirect', 
             451 : 'Unavailable For Legal Reasons', 
             494 : 'Request Header Too Large', 
             495 : 'Cert Error', 
             496 : 'No Cert', 
             497 : 'HTTP to HTTPS', 
             499 : 'Client Closed Request', 
             500 : 'Internal Server Error',
             501 : 'Not Implemented',
             502 : 'Bad Gateway',
             503 : 'Service Unavailable',
             504 : 'Gateway Timeout',
             505 : 'HTTP Version Not Supported',
             506 : 'Variant Also Negotiates', 
             507 : 'Insufficient Storage', 
             508 : 'Loop Detected', 
             509 : 'Bandwidth Limit Exceeded', 
             510 : 'Not Extended', 
             511 : 'Network Authentication Required', 
             598 : 'Network read timeout error', 
             599 : 'Network connect timeout error', 
            }
         
         toastr.options = {
           "closeButton": true,
           "debug": false,
           "newestOnTop": true,
           "progressBar": true,
           "positionClass": "toast-top-right",
           "preventDuplicates": false,
           "onclick": null,
           "showDuration": "300",
           "hideDuration": "20000",
           "timeOut": "20000",
           "extendedTimeOut": "20000",
           "showEasing": "swing",
           "hideEasing": "linear",
           "showMethod": "fadeIn",
           "hideMethod": "fadeOut"
         }
         
         function show_tost(type,title,message) {
            toastr[type](message,title )
         }
         
         $(".btn-setting").on('click',function(){
            $this = $(this);
            $("#setting-widzard").modal({
               backdrop: 'static',
               keyboard: false
            });
         
            $("#setting-widzard").html('Loading');
         
            $.ajax({
               url:'http://localhost/afrocentric/setting/getModal',
               type:'POST',
               dataType:'json',
               data:{
                  'key' : $this.attr('data-key'),
                  'type' : $this.attr('data-type'),
               },
               beforeSend:function(){ $this.btn("loading"); },
               complete:function(){ $this.btn("reset"); },
               success:function(json){
                  if(json['html']){
                     $("#setting-widzard").html(json['html']);
                  }
               },
            })
         })
         
         
            $(document).delegate('.allow-number','keypress keyup blur',function(event) {        
               $(this).val($(this).val().replace(/[^0-9\.]/g,''));
                if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                    event.preventDefault();
                }
            });
         
            $(document).delegate("[data-log]",'click',function(){
               $this = $(this);
         
               var data = {};
               var search = $this.attr('data-extra');
               if(search){
               data = JSON.parse('{"' + decodeURI(search).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g,'":"') + '"}')
               }
         
               data['type'] =$this.attr("data-log");
         
               $.ajax({
                  url:'http://localhost/afrocentric/usercontrol/logs',
                  type:'POST',
                  dataType:'json',
                  data:data,
                  beforeSend:function(){$this.btn("loading");},
                  complete:function(){$this.btn("reset");},
                  success:function(json){
                     if(json['html']){
                        $("#log-widzard").modal({
                        backdrop: 'static',
                        keyboard: false
                     });
                     $("#log-widzard").html(json['html']);
                  }
                  },
               })
            })
         
            $(".password-group .input-group-prepend button").on('click',function(){
            $input = $(this).parents(".password-group").find("input");
            $i = $(this).parents(".password-group").find("i");
               if($i.hasClass("fa-eye")){
                  $i.addClass("fa-eye-slash");
                  $i.removeClass("fa-eye");
                  $input.attr('type','text');
               } else {
                  $i.addClass("fa-eye");
                  $i.removeClass("fa-eye-slash");
                  $input.attr('type','password');
               }
            })
         
            $(document).ajaxComplete(function myErrorHandler(event, xhr, ajaxOptions, thrownError) {
               var statusCode = xhr.status;
         
               
               if(statusCode != 200 && ajaxOptions.type == 'POST'){           
               var title = '';
               var body = '';
         
               title = 'Internal Server Error';
               body += '<h3>Sorry, an error has occured.</h3>';
         
               if(serverErrorCode[statusCode]){
                  body += "<p>Error Message : " + serverErrorCode[statusCode] + "</p>";
                  body += "<p>Error Code : " + statusCode + "</p>";
         
                  $("#model-ajaxError .modal-title").html(title);
                  $("#model-ajaxError .modal-body .-body").html(body);
                  $("#model-ajaxError").modal("show");
               } else {
                  body += '<p>Error Message : Uknown Error </p>';
               }
         
               $(".btn-loading").removeClass('btn-loading');
               }
         });
      </script>
      <script>
         function start_plan_expiration_timer() {
            if($('span[data-time-remains]').length) {
               let countdown = $('span[data-time-remains]').data('time-remains');
               if(countdown > 0) {
                  Window.GlobaleCountDownDate = (new Date().getTime()) + (countdown * 1000);
                  var GlobaleCountDownDateInterval = setInterval(function() {
                     var now = new Date().getTime() + 1000;
                     distance = ((Window.GlobaleCountDownDate - now) / 1000).toFixed(0);
         
                     var days        = Math.floor(distance/24/60/60);
                     var hoursLeft   = Math.floor((distance) - (days*86400));
                     var hours       = Math.floor(hoursLeft/3600);
                     var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
                     var minutes     = Math.floor(minutesLeft/60);
                     var remainingSeconds = distance % 60;
         
                     let string = "";
         
                     string += (days > 0) ? ('0'+days).slice(-2)+" days " : ""; 
         
                     string += (hours > 0) ? ('0'+hours).slice(-2)+" Hours " : ""; 
         
                     string += (minutes > 0) ? ('0'+minutes).slice(-2)+" Minutes " : ""; 
         
                     string += (remainingSeconds > 0) ? ('0'+remainingSeconds).slice(-2)+" Seconds " : "00 Seconds"; 
         
                     $('span[data-time-remains]').text(string);
                     if (distance <= 0) {
                        $('span[data-time-remains]').text('Plan Has Expired');
                        window.location.reload();
                        clearInterval(GlobaleCountDownDateInterval);
                     }
                  }, 1000);
               }
            }  
         }
      </script>
   </body>
</html>
<?php }else{
   header("Location:".base_url()."login");
}?>