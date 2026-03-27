 <?php
    $currency = '₹';
    ?>
 <div class="all_frm_list loanouterelement loan_block_{{ $id }}">

     <div class="form-group">
         <label>Loan Label</label>
         <input type="text" name="loan_label[]" class="loan_label_{{ $id }}" placeholder="Loan Label" value="Demo Loand" />
     </div>

     <div class="form-group">
         <label>Financing Of</label>
         <select class="slt_areaa_ful financingof_{{ $id }}" name="financingof[]">

             <option value="Purchase Price">After Discount Purchase Price</option>
             <option value="Improvement Cost">Improvement Cost</option>
             <option value="Price and Improvement Cost">Price and Improvement Cost</option>
             <option value="Basic Sale Price">Basic Sale Price</option>
             <option value="Custom Amount">Custom Amount</option>

         </select>
     </div>

     <div class="form-group managsss1">
         <label class="finance_label_{{ $id }}">Price Financing</label>
         <span class="currencyInputprefix finance_currency_{{ $id }}" style="display:none"><?= $currency ?></span>
         <input name="price_financing[]" class="currencyInputa price_financing_{{ $id }}" onkeyup="exchangerate(this.value,{{ $id }})" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" type="text" placeholder="Price Financing" value="80" />
         <span class="pursntss finance_percent_{{ $id }}">%</span>
         <span class="sm_txtx text-right finance-toggle-text_{{ $id }}" onclick="financetodownconversion({{ $id }})">20% Down Payment <i class="  fa  fa-exchange text-primary"></i></span>
         <span class="sm_txtx">Enter The Down Payment On Purchase Price, Or The Percentage Financed. Click Label To Toggle Input.</span>
     </div>





     <div class="tbss_form_lst mt-4">
         <div class="tab-wrapper">
             <div class="tbs_hids">Loan Type</div>

             <div class="tabs">
                 <div class="tab-link active" onclick="$(this).addClass('active').siblings().removeClass('active');">
                     <input name="loan_type[{{ $id }}]" class="loan_type_opt1_{{ $id }}" id="loan_type_opt1_{{ $id }}" checked type="radio" value="1" style=" opacity: 0; width: 0;">
                     <label for="loan_type_opt1_{{ $id }}">Amortizing</label>
                 </div>
                 <div class="tab-link" onclick="$(this).addClass('active').siblings().removeClass('active');">
                     <input name="loan_type[{{ $id }}]" class="loan_type_opt2_{{ $id }}" id="loan_type_opt2_{{ $id }}" type="radio" value="2" style="opacity: 0;width: 0;">
                     <label for="loan_type_opt2_{{ $id }}">Interest Only</label>
                 </div>
             </div>
         </div>
        <div class="content-wrapper">
            <div id="tab-{{ $id }}" class="tab-content active">
                <div class="choss_araes mt-4 mb-5">
                    <div class="form-group managsss1">
                        <label>Interest Rate:</label>
                        <input type="number" class="interest_rate_{{ $id }}" name="interest_rate[]" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" placeholder="Interest Rate" value="5" />
                        <span class="pursntss">%</span>
                    </div>
                    <div class="form-group managsss1">
                        <label>Loan Term:</label>
                        <input type="number" name="loan_term[]" class="loan_term_{{ $id }}" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" placeholder="Loan Term" value="30" />
                        <span class="pursntss">Years</span>
                    </div>
                </div>
            <div id="tab-2{{ $id }}" class="tab-content"></div>
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
                            <input type="checkbox" class="toggle refinance_costs_button" id="toggle11{{ $id }}" autocomplete="off" />
                            <label for="toggle11{{ $id }}">
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
                <div class="all_frm_list" style="padding: 0;" id="refinance_cost_content">
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
        <div class="text-center" style=""><button type="button" class="btn btn-outline btn-danger btn-sm btn-icon" onClick="$('.loan_block_{{ $id }}').remove()"><i class="icon ion-trash-b"></i> Remove Loan</button></div>
     </div>