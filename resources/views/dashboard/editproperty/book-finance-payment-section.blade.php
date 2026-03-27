

        <div class=" " data-toggle="modal" data-target="#videotutorialmodal"  style="float: right;position: relative;top: -5px;left: 0px;display: inline-block;">
            <a href="#">

            </a>
        </div>
        <div class="all_frm_list loanform">
            <div class="form-group">
                <label>Date of Booking: <span class="ticck" tooltip="Date of Booking" flow="down">?</span></label>
                <input name="DateOfBooking" id="DateOfBooking" type="date" placeholder="DD MM YYYY" value="<?=$MainProperty->prop_dateOfBooking?>" required />
            </div>
            <div class="form-group">
                <label>Basic Purchase Price - Bpp <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                <span class="currencyInputprefix"><?=$currency?></span>
                <input class="currencyInput" type="text" placeholder="Basic Purchase Price - Bpp" value="<?=$MainProperty->prop_purchasePrice?>" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="basicPurchasePrice" id="basicPurchasePrice"/>
            </div>
            <div class="form-group">
                <label>Actual Paid Amount (Part Of Bpp) <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                <span class="currencyInputprefix"><?=$currency?></span>
                <input class="currencyInput" id="totalPaidAmountInput" type="text" placeholder="Actual Paid Amount (Part Of Bpp)" value="<?=$MainProperty->prop_paidAmount?>" name="actualPaidAmount" readonly/>
            </div>
            <div class="form-group">
                <label>Current Maket Value- CMS Or Basic Sale Price - Bsp <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                <span class="currencyInputprefix"><?=$currency?></span>
                <input class="currencyInput" type="text" placeholder="Current Maket Value- CMS Or Basic Sale Price - Bsp" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" value="<?=$MainProperty->prop_salePrice?>" name="basicSalePrice"/>
            </div>
            <div class="form-group managsss1">
                <label>Purchase Discount <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                {{-- <span class="currencyInputprefix"><?=$currency?></span> --}}
                <input type="text" placeholder="Sale Discount - Bsp" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" value="<?=$MainProperty->prop_sale_discount?>" name="prop_sale_discount"/>
                <span class="pursntss" style="right : 25px;">%</span>
            </div>

        </div>

        <!-- Financing (Purchase) -->
        <div class="hd_res_listsss">
            <h2>Financing (Purchase)</h2>
        </div>
        <div class="all_frm_list">
            <div class="choss_araes">
                <div class="lft_cntts">
                    <p>Use Financing</p>
                    <span>Enable To Use Financing To Purchase This Proprty. Disable For Cash Purchases.</span>
                </div>

                <div class="yesNoButton">
                    <input type="checkbox" class="toggle" @if(count($ItemPropertyLoan)) checked @endif  id="toggle" autocomplete="off"/>
                    <label for="toggle">
                        <span class="on">Yes</span>
                        <span class="off">No</span>
                    </label>
                </div>
            </div>
        </div>
        <!-- End Financing (Purchase) -->


        <!-- Financing (Purchase) -->
        <div id="financeToggleDiv" @if(count($ItemPropertyLoan)==0) style="display: none;" @endif>
            <div class="hd_res_listsss">
                <h2>Financing (Purchase)</h2>
            </div>

            @if(count($ItemPropertyLoan))
            @foreach($ItemPropertyLoan as $key=>$loandata)
            @php
                $item_no = 1;
            @endphp
            <div class="all_frm_list loanouterelement loan_block_{{ $item_no }}">

                <div class="form-group">
                    <label>Loan Label</label>
                    <input type="text" class="loan_label_{{ $item_no }}" name="loan_label[]" placeholder="Loan Label" value="{{ $loandata->loan_label }}" />
                </div>

                <div class="form-group">
                    <label>Financing Of</label>
                    <select class="slt_areaa_ful financingof_{{ $item_no }}" name="financingof[]">
                        <option value="Purchase Price">Purchase Price</option>
                        <option value="Improvement Cost">Improvement Cost</option>
                        <option value="Price and Improvement Cost">Price and Improvement Cost</option>
                        <option value="Basic Sale Price">Basic Sale Price</option>
                        <option value="Custom Amount">Custom Amount</option>

                    </select>
                </div>
                <div class="form-group managsss1">
                    <label class="finance_label_{{ $item_no }}">Price Financing</label>
                    <span class="currencyInputprefix finance_currency_{{ $item_no }}" style="display:none"><?=$currency?></span>
                    <input name="price_financing[]" class="currencyInputa price_financing_{{ $item_no }}" onkeyup="exchangerate(this.value,1)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" type="text" placeholder="Price Financing" value="{{ $loandata->price_financing }}" />
                    <span class="pursntss finance_percent_{{ $item_no }}">%</span>
                    <span class="sm_txtx text-right finance-toggle-text_{{ $item_no }}" style="float: right;" onclick="financetodownconversion(1)">{{ 100 - $loandata->price_financing }}% Down Payment <i class="  fa  fa-exchange text-primary"></i></span>
                    <span class="sm_txtx">Enter The Down Payment On Purchase Price, Or The Percentage Financed. Click Label To Toggle Input.</span>
                </div>



                <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Loan Type <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></div>

                        <div class="tabs">
                            <div class="tab-link @if($loandata->loan_type==1) active @endif" onclick="setLoanTypeOptions(1,{{ $item_no }})">
                                <input name="loan_type[{{ $item_no }}]" class="loan_type_opt1_{{ $item_no }}" id="loan_type_opt1_{{ $item_no }}" @if($loandata->loan_type==1) checked @endif  type="radio" value="1" style=" opacity: 0; width: 0;" >
                                <label for="loan_type_opt1_{{ $item_no }}">Amortizing</label>
                            </div>
                            <div class="tab-link @if($loandata->loan_type==2) active @endif" onclick="setLoanTypeOptions(2,{{ $item_no }})">
                                <input name="loan_type[{{ $item_no }}]" @if($loandata->loan_type==2) checked @endif  class="loan_type_opt2_{{ $item_no }}" id="loan_type_opt2_{{ $item_no }}" type="radio" value="2" style="opacity: 0;width: 0;"  >
                                <label for="loan_type_opt2_{{ $item_no }}">Interest Only</label>
                            </div>
                        </div>
                    </div>

                    <div class="content-wrapper">
                        <div id="tab-1" class="tab-content active">
                                <div class="choss_araes mt-4 mb-5">

                            <div class="form-group managsss1">
                                <label>Interest Rate:</label>
                                <input type="text"  class="interest_rate_{{ $item_no }}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="interest_rate[]" placeholder="Interest Rate" value="{{ $loandata->interest_rate }}" />
                                <span class="pursntss">%</span>
                            </div>

                            <div class="form-group managsss1">
                                <label>Loan Term: <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                                <input type="text" name="loan_term[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_{{ $item_no }}" placeholder="Loan Term" value="{{ $loandata->loan_term }}" />
                                <span class="pursntss">Years</span>
                            </div>

                            </div>
                        </div>

                        <div id="tab-2" class="tab-content">
                            <div class="choss_araes mt-4 mb-5">

                            <div class="form-group managsss1">
                                <label>Interest Rate:</label>
                                <input type="text"  class="interest_rate_{{ $item_no }}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="interest_rate[]" placeholder="Interest Rate" value="{{ $loandata->interest_rate }}" />
                                <span class="pursntss">%</span>
                            </div>

                            <div class="form-group managsss1">
                                <label>Loan Term: <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                                <input type="text" name="loan_term[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_{{ $item_no }}" placeholder="Loan Term" value="{{ $loandata->loan_term }}" />
                                <span class="pursntss">Years</span>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="lsting_proprty purch_list_conts brcats_listss mt-4">
                    <h3>Finance Costs <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h3>
                </div>
                <div class="all_frm_list p-0">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group managsss1">
                                <label>Total</label>
                                <div class="rfc_amount" style="display: none;">
                                    <span class="currencyInputprefix">₹</span>
                                    <input class="currencyInput" readonly type="text" id="totalFinanceAmountInput2" name="totalFinanceAmountInput2" placeholder="Total Refinance Cost" value="0" />
                                </div>
                                <div class="rfc_percent">
                                    <input type="text" placeholder="Refinance Cost's Estimate Percent" value="3" name="closingCostEstimatePercent" />
                                    <span class="pursntss">% Of Market Value</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="choss_araes">
                                <div class="lft_cntts" style="width: 100%;">
                                    <p>Itemize Refinance Costs</p>
                                </div>
                                <div class="chos_bntt" style="width: 100%;">
                                    <input type="checkbox" class="toggle refinance_costs_button" id="toggle15" autocomplete="off" />
                                    <label for="toggle15">
                                        <span class="on">Yes</span>
                                        <span class="off">No</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Itemized purchase Costs   -->
                    <div class="itm_cost_prch" id="itemisedRefinanceCost" style="display: none;">
                        <div class="hd_res_listsss">
                            <h3>
                                Itemized Refinance Costs
                                <span class="rit_mg">
                                    <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#financeCostModal">
                                        <img src="{{ url('') }}/img/ad_bk.png" alt="" />
                                    </button>
                                </span>
                            </h3>
                        </div>
                        <div class="all_frm_list refinance_cost_content" style="padding: 0;" id="refinance_cost_content">

                            <div id="purchasedAmountItemizedDiv"></div>
                            <div class="btm_coststs">
                                <span class="tltss">Total</span>
                                <span class="pricss">
                                    ₹
                                    <span id="totalItemizedPurchasedAmt">0</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- End Itemized purchase Costs  -->
                </div>
                @if($key != 0)
                    <div class="text-center" style=""><button type="button" class="btn btn-outline btn-danger btn-sm btn-icon" onClick="$('.loan_block_{{ $item_no }}').remove()" ><i class="icon ion-trash-b"></i> Remove Loan</button></div>
                @endif
            </div>
            <!-- End Financing (Purchase) -->
                @php
                $item_no++;
            @endphp
            @endforeach
            @else

            <div class="all_frm_list loanouterelement loan_block_1">

                <div class="form-group">
                    <label>Loan Label</label>
                    <input type="text" class="loan_label_1"  name="loan_label[]" placeholder="Loan Label" value="Demo Loand" />
                </div>

                <div class="form-group">
                    <label>Financing Of</label>
                    <select class="slt_areaa_ful financingof_1" name="financingof[]">
                        <option value="Purchase Price">Purchase Price</option>
                        <option value="Improvement Cost">Improvement Cost</option>
                        <option value="Price and Improvement Cost">Price and Improvement Cost</option>
                        <option value="Basic Sale Price">Basic Sale Price</option>
                        <option value="Custom Amount">Custom Amount</option>

                    </select>
                </div>
                <div class="form-group managsss1">
                    <label class="finance_label_1">Price Financing</label>
                <span class="currencyInputprefix finance_currency_1" style="display:none"><?=$currency?></span>
                    <input name="price_financing[]" class="currencyInputa price_financing_1" onkeyup="exchangerate(this.value,1)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" type="text" placeholder="Price Financing" value="80" />
                <span class="pursntss finance_percent_1">%</span>
                <span class="sm_txtx text-right finance-toggle-text_1" style="float: right;" onclick="financetodownconversion(1)">20% Down Payment <i class="  fa  fa-exchange text-primary"></i></span>
                <span class="sm_txtx">Enter The Down Payment On Purchase Price, Or The Percentage Financed. Click Label To Toggle Input.</span>
                </div>



                <div class="tbss_form_lst mt-4">
                    <div class="tab-wrapper">
                        <div class="tbs_hids">Loan Type <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></div>

                        <div class="tabs">
                            <div class="tab-link active" onclick="setLoanTypeOptions(1,1)">
                                <input name="loan_type[1]" class="loan_type_opt1_1" id="loan_type_opt1_1" checked type="radio" value="1" style=" opacity: 0; width: 0;" >
                                <label for="loan_type_opt1_1">Amortizing</label>
                            </div>
                            <div class="tab-link" onclick="setLoanTypeOptions(2,1)">
                                <input name="loan_type[1]" class="loan_type_opt2_1" id="loan_type_opt2_1" type="radio" value="2" style="opacity: 0;width: 0;"  >
                                <label for="loan_type_opt2_1">Interest Only</label>
                            </div>
                        </div>
                    </div>

                    <div class="content-wrapper">
                        <div id="tab-1" class="tab-content active">
                                <div class="choss_araes mt-4 mb-5">

                            <div class="form-group managsss1">
                                <label>Interest Rate:</label>
                                <input type="text"  class="interest_rate_1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="interest_rate[]" placeholder="Interest Rate" value="5" />
                                <span class="pursntss">%</span>
                            </div>

                            <div class="form-group managsss1">
                                <label>Loan Term: <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                                <input type="text" name="loan_term[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_1" placeholder="Loan Term" value="30" />
                                <span class="pursntss">Years</span>
                            </div>
                            </div>

                            <div class="mortgagebox_1 mortgagebox2_1">

                            </div>
                        </div>

                        <div id="tab-2" class="tab-content"></div>
                    </div>
                </div>
                <div class="lsting_proprty purch_list_conts brcats_listss mt-4">
                    <h3>Finance Costs <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h3>
                </div>
                <div class="all_frm_list p-0">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group managsss1">
                                <label>Total</label>
                                <div class="rfc_amount" style="display: none;">
                                    <span class="currencyInputprefix">₹</span>
                                    <input class="currencyInput" readonly type="text" id="totalFinanceAmountInput2" name="totalFinanceAmountInput2" placeholder="Total Refinance Cost" value="0" />
                                </div>
                                <div class="rfc_percent">
                                    <input type="text" placeholder="Refinance Cost's Estimate Percent" value="3" name="closingCostEstimatePercent" />
                                    <span class="pursntss">% Of Market Value</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="choss_araes">
                                <div class="lft_cntts" style="width: 100%;">
                                    <p>Itemize Refinance Costs</p>
                                </div>
                                <div class="chos_bntt" style="width: 100%;">
                                    <input type="checkbox" class="toggle" id="toggle14" autocomplete="off" />
                                    <label for="toggle14">
                                        <span class="on">Yes</span>
                                        <span class="off">No</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Itemized purchase Costs   -->
                    <div class="itm_cost_prch" id="itemisedRefinanceCost" style="display: none;">
                        <div class="hd_res_listsss">
                            <h3>
                                Itemized Refinance Costs
                                <span class="rit_mg">
                                    <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#financeCostModal">
                                        <img src="{{ url('') }}img/ad_bk.png" alt="" />
                                    </button>
                                </span>
                            </h3>
                        </div>
                        <div class="all_frm_list refinance_cost_content" style="padding: 0;" id="refinance_cost_content">
                            <div id="purchasedAmountItemizedDiv"></div>
                            <div class="btm_coststs">
                                <span class="tltss">Total</span>
                                <span class="pricss">
                                    ₹
                                    <span id="totalItemizedPurchasedAmt">0</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- End Itemized purchase Costs  -->
                </div>
            </div>
            <!-- End Financing (Purchase) -->
            @endif

            <!-- Add A Loan -->
            <div class="addmoreloanbtn add_on_ctntsxt">
                <div class="all_frm_list">
                <div class="choss_araes">
                    <div class="lft_cntts">
                        <p>Add A Loan</p>
                    </div>

                    <div class="chos_bntt">
                        <div class="add_on" onclick="addmoreloan()" ><i class="fa fa-plus"></i></div>
                    </div>
                </div>
                </div>
                <p class="ads_bmss">You Can Add Loan Points. Underwriting Fees And Other Lender Costs On The <span>Purchase Costs Worksheet.</span></p>
            </div>
            <!-- End Add A Loan -->
        </div>

        <!-- Total Paid Amount (Part Of Bpp) -->
            @include('dashboard.buysell_book_pre_hold.itemized_paid_amount.paid_amount_section',[
                'MainProperty'  => $MainProperty,
                'ItemPaidAmount'=> $ItemPaidAmount
            ])
        <!-- End Total Paid Amount (Part Of BPP) -->
        <!-- Purchase costs -->
        @include('dashboard.buysell_book_pre_hold.itemized_purchase_costs.purchase_cost_section',[
            'MainProperty'  => $MainProperty
        ])





