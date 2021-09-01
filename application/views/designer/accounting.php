       <?php 
              $login = $this->session->userdata("login");
               if(isset($login) && $login == "OK"){

               include("sidebar.php"); ?>

 <!-- Section Accounting Starts Here -->
               <section class="accounting-bg-header">
                  <div class="container-fluid explore-top-container">
                     <div class="row justify-content-between">
                        <div class="col-md-4">
                           <h2 class="ac-top-head">Accounting Book</h2>
                        </div>
                        <div class="col-md-4">
                           <button class="btn btn-primary account-btn-1">
                              Export to PDF
                           </button>
                        </div>
                     </div>
                           <!-- tabs starts -->

                           <div class="container bg-white">
                             <ul class="nav nav-tabs accounting-nav-tabs shadow-sm" role="tablist">
                               <li class="nav-item">
                                 <a class="nav-link active" data-toggle="tab" href="#home">Design Cost</a>
                               </li>
                               <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#menu1">Invoice</a>
                               </li>
                               <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#menu2">Monthly Income Statement</a>
                               </li>
                               <li class="nav-item">
                                 <a class="nav-link" data-toggle="tab" href="#menu3">Production Record</a>
                               </li>
                             </ul>

                             <!-- Tab panes -->
                             <div class="tab-content accounting-tab-content">
                               <div id="home" class="container accounting-tab-container tab-pane active"><br>
                                 <div class="table-responsive">
                                    <table class="table account-table table-bordered">
                                      <thead>
                                        <tr>
                                          <th class="ac-th-border-ryt" scope="col">DESCRIPTION</th>
                                          <th class="ac-th-border-ryt" scope="col">SYLE 1</th>
                                          <th class="ac-th-border-ryt" scope="col">SYLE 2</th>
                                          <th class="ac-th-border-ryt" scope="col">SYLE 3</th>
                                          <th class="ac-th-border-ryt" scope="col">SYLE 4</th>
                                          <th class="ac-th-border-ryt" scope="col">SYLE 5</th>
                                          <th scope="col">SYLE 6</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">COST OF FABRIC PER YARD</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-font-size">500.00</td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">CUTTING & SEWING (WORKMANSHIP)</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-font-size">500.00</td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">TRIMS (LABELS. HANG TAGS)</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-font-size">500.00</td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">ACCESSORIES (RIVET, STONES, BUTTONS, ZIPPERS, EMBROIDERY, ETC,)</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-font-size">500.00</td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">DYEING COST</td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">WASH COST</td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">TRANSPORTATION/SHIPPING</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-font-size">500.00</td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">DIESEL/FUEL</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-font-size">500.00</td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">PACKING METHOD</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-border-ryt">500.00</td>
                                          <td class="ac-td-font-size">500.00</td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">OTHERS</td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td></td>
                                        </tr>
                                        <tr class="ac-only-tr-1">
                                          <td class="td-description td-border-ryt-0">TOTAL DESIGN COST PER STYLE</td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">WHOLESALE PRICE</td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td></td>
                                        </tr>
                                        <tr class="ac-only-tr-2">
                                          <td class="td-description td-border-ryt-0">DISCOUNT ON RETAIL PRICE</td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                        </tr>
                                        <tr>
                                          <td class="td-description ac-td-border-ryt">DISCOUNT ON RETAIL PRICE</td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td class="ac-td-border-ryt"></td>
                                          <td></td>
                                        </tr>
                                        <tr class="ac-only-tr-3">
                                          <td class="td-description td-border-ryt-0">RETAIL PRICE</td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                          <td class="td-border-left-ryt-0"></td>
                                        </tr>
                                      </tbody>
                                    </table><br /><br />
                                 </div>
                               </div>
                               <div id="menu1" class="container tab-pane fade"><br>
                                 <div class="container-fluid ac-invoice-main-container">
                                    <div class="row">
                                       <div class="col-12 col-md-12">
                                          <form>
                                             <div class="row">
                                                <div class="col-2">
                                                   <div class="form-group">
                                                      <label class="ac-invoice-label" for="exampleInputEmail1">Name</label>
                                                   </div>
                                                </div>
                                                <div class="col-10">
                                                   <div class="form-group">
                                                   <input type="email" class="form-control ac-invoice-form-cont" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                   </div>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-12 col-md-12">
                                          <form>
                                             <div class="row">
                                                <div class="col-md-2">
                                                   <div class="form-group">
                                                      <label class="ac-invoice-label" for="exampleInputEmail1">ADDRESS</label>
                                                   </div>
                                                </div>
                                                <div class="col-md-6">
                                                   <div class="form-group">
                                                   <input type="email" class="form-control ac-invoice-form-cont" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                   </div>
                                                </div>
                                                <div class="col-md-4">
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="ac-invoice-label" for="exampleInputEmail1">DATE</label>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <input type="email" class="form-control ac-invoice-form-cont" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="row">
                                                      <div class="col-md-12">
                                                         <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <label class="ac-invoice-label" for="exampleInputEmail1">INVOICE NO</label>
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form-group">
                                                                  <input type="email" class="form-control ac-invoice-form-cont" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    <div class="table-responsive">
                                       <table class="table account-table table-bordered">
                                         <thead>
                                           <tr>
                                             <th scope="col">S/N</th>
                                             <th scope="col">QUANTITY</th>
                                             <th scope="col">DESCRIPTION</th>
                                             <th scope="col">RATE</th>
                                             <th scope="col">AMOUNT</th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td class="td-00">0.00</td>
                                           </tr>
                                           <tr>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td class="td-00">0.00</td>
                                           </tr>
                                           <tr>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td class="td-00">0.00</td>
                                           </tr>
                                           <tr>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td class="td-00">0.00</td>
                                           </tr>
                                           <tr>
                                             <td colspan="3" class="total-td"></td>
                                             <td class="total-td">TOTAL</td>
                                             <td class="totalprice-td">0.00</td>
                                           </tr>
                                         </tbody>
                                       </table><br /><br />
                                    </div>
                                    <div class="row">
                                       <div class="col-md-3"></div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label class="ac-invoice-label" for="exampleInputEmail1">TOTAL AMOUNT IN WORDS</label>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <form>
                                             <div class="form-group">
                                                <input type="email" class="form-control ac-invoice-form-cont2" id="exampleInputEmail1" aria-describedby="emailHelp">
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                       <div class="col-md-3"></div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label class="ac-invoice-label" for="exampleInputEmail1">EMAIL ADDRESS</label>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <form>
                                             <div class="form-group">
                                                <input type="email" class="form-control ac-invoice-form-cont2" id="exampleInputEmail1" aria-describedby="emailHelp">
                                             </div>
                                             <button class="btn btn-primary account-inovice-btn">
                                                SEND INVOICE
                                             </button>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                               </div>
                               <div id="menu2" class="container tab-pane fade"><br>
                                 <div class="table-responsive">
                                    <table class="table table-bordered accounting-menu-3-table">
                                      <thead>
                                        <tr>
                                          <th class="white-box white-box-daily" scope="col">DAILY</th>
                                          <th scope="col" colspan="4" class="th-center">SALES INCOME</th>
                                          <th scope="col" colspan="4" class="th-center-orange">COST FOR STYLE</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="white-box-date">DATE</td>
                                          <td class="td-orange">WEBSITE/STORE</td>
                                          <td class="td-orange">OWNER/DIRECT SALE</td>
                                          <td class="td-orange">REPS</td>
                                          <td class="td-orange">TOTAL</td>
                                          <td class="td-yellow">WEBSITE/STORE</td>
                                          <td class="td-yellow">OWNER DIRECT/SALE</td>
                                          <td class="td-yellow">REPS</td>
                                          <td class="td-yellow td-00-last">TOTAL</td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange td-00">0.00</td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow td-00 td-00-last">0.00</td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange td-00">0.00</td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow td-00 td-00-last">0.00</td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange td-00">0.00</td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow td-00 td-00-last">0.00</td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange td-00">0.00</td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow td-00 td-00-last">0.00</td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange td-00">0.00</td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow td-00 td-00-last">0.00</td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange td-00">0.00</td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow td-00 td-00-last">0.00</td>
                                        </tr>
                                        <tr>
                                          <td class="alone-total-td">TOTAL</td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange"></td>
                                          <td class="td-orange td-00">0.00</td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow"></td>
                                          <td class="td-yellow td-00 td-00-last">0.00</td>
                                        </tr>
                                        <tr>
                                          <td colspan="2" style="border-right: 0px solid red;"></td>
                                          <td colspan="2" class="alone-total-td"  style="border-left: 0px solid red;">MONTHLY ANALYSIS</td>
                                          <td class="td-empty" colspan="6"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td colspan="2" class="td-total-sl-income">TOTAL SALES INCOME</td>
                                          <td class="td-sl-income-00">0.00</td>
                                          <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td colspan="2" class="td-total-sl-income">TOTAL SALES INCOME</td>
                                          <td class="td-sl-income-00">0.00</td>
                                          <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td colspan="2" class="td-total-sl-income">TOTAL SALES INCOME</td>
                                          <td class="td-sl-income-00">0.00</td>
                                          <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td colspan="2" class="td-total-sl-income">TOTAL SALES INCOME</td>
                                          <td class="td-sl-income-00">0.00</td>
                                          <td colspan="5"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td colspan="2" class="td-total-sl-income">TOTAL SALES INCOME</td>
                                          <td class="td-sl-income-00">0.00</td>
                                          <td colspan="5"></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                 </div>
                               </div>
                               <div id="menu3" class="container tab-pane fade"><br>
                                 <div class="table-responsive">
                                    <table class="table table-bordered accounting-menu-3-table">
                                      <thead>
                                        <tr>
                                          <th class="white-box white-box-daily" scope="col">PRODUCT DESCRIPTION</th>
                                          <th scope="col" colspan="4" class="th-center bg-white">RAW MATERIALS</th>
                                          <th scope="col" colspan="4" class="th-center-orange bg-white">PRODUCTION</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td class="white-box-date menu3-bold-td">PRODUCT DESCRIPTION</td>
                                          <td class="menu3-bold-td">ORDER DATE</td>
                                          <td class="menu3-bold-td">DOWN PAYMENT</td>
                                          <td class="menu3-bold-td">ARRIVAL DATE</td>
                                          <td class="menu3-bold-td">BALANCE PAYMENT</td>
                                          <td class="menu3-bold-td">PRODUCTION START DATE</td>
                                          <td class="menu3-bold-td">PRODUCTION END DATE</td>
                                          <td class="menu3-bold-td">LOREM</td>
                                          <td class="menu3-bold-td">IPSUM</td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class=""></td>
                                          <td class="td-00 td-00-last"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00"></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00 td-00-last"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00"></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00 td-00-last"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00"></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="ttd-00 td-00-last"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00"></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00 td-00-last"></td>
                                        </tr>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00"></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00 td-00-last"></td>
                                        </tr>
                                        <tr>
                                          <td class="alone-total-td "></td>
                                          <td></td>
                                          <td class="td-sl-income-00">0.00</td>
                                          <td></td>
                                          <td class="td-00 td-sl-income-00">0.00</td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td class="td-00 td-00-last td-sl-income-00">0.00</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                 </div>
                               </div>
                             </div>
                           </div>

                           <!-- tabs ends -->
                  </div>
               </section>
               <!-- Section Accounting Ends Here -->






                             <!-- explore --><?php 
               }else{
   header("Location:".base_url()."login");
}?>