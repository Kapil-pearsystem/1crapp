<style>
    #successModal .modal-lg {
        width: auto;
        max-width: fit-content;
    }

    .all_frm_list .form-group.managsss1 span.currencyInputprefix.percentOfSpan {
        position: absolute;
        right: 96px;
        font-size: 14px;
        background: #e2ebf7;
        border-radius: 9px 0px 0px 9px;
        padding: 10px 10px;
        margin-top: 1px;
    }

    .all_frm_list .form-group.managsss1 input.currencyInput.pecentOfInput {
        position: relative;
        right: -14px;
    }

    .ys_no li {
        cursor: pointer;
    }
</style>

<div class=" " data-toggle="modal" data-target="#videotutorialmodal" style="float: right;position: relative;top: -5px;left: 0px;display: inline-block;">
    <a href="#">
        <img src="{{ asset('img/video-tutorial-new.png') }}" style="width: 85px;">.
    </a>
</div>
<!-- Financing (Purchase) -->
<div id="financeToggleDiv">
    <div class="hd_res_listsss">
        <h2>Financing (Refinance)</h2>
    </div>
    <div class="all_frm_list loanouterelement loan_block_1">
        <div class="form-group">
            <label>Date of Refinance: <span class="ticck" tooltip="Date of Refinance" flow="down">?</span></label>
            <input name="date_of_refinance" id="dateOfRefinance" type="date" required placeholder="DD MM YYYY" value="<?= !empty($MainProperty) ? $MainProperty->date_of_refinance : ''; ?>" required />
        </div>

        <div class="form-group">
            <label>Loan Label</label>
            <input type="text" class="loan_label_1" required name="loan_label" placeholder="Loan Label" value="<?= !empty($ItemRefinanceAmount) ? $ItemRefinanceAmount->loan_label : 'Demo Loand'; ?>" />
        </div>

        <div class="form-group managsss1">
            <label>Refinance After:</label>
            <input type="text" name="refinance_after" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_1" placeholder="Refinance After" value="<?= !empty($ItemRefinanceAmount) ? $ItemRefinanceAmount->refinance_after : '6'; ?>" />
            <span class="pursntss">Months</span>
        </div>

        <div class="form-group">
            <label>Financing Of</label>
            <select class="slt_areaa_ful financingof_1" name="financingof">
                <option value="Market Value">Market Value</option>
                <option value="Custom Amount">Custom Amount</option>
            </select>
        </div>
        <div class="form-group managsss1">
            <label class="finance_label_1">Price Financing</label>
            <span class="currencyInputprefix finance_currency_1" style="display:none"><?= $currency ?></span>
            <input name="price_financing" class="currencyInputa price_financing_1" onkeyup="exchangerate(this.value,1)" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" type="text" placeholder="Price Financing" value="<?= !empty($ItemRefinanceAmount) ? $ItemRefinanceAmount->price_financing : '80'; ?>" />
            <span class="pursntss finance_percent_1">%</span>
            @php
            $priceFinacing = !empty($ItemRefinanceAmount) ? $ItemRefinanceAmount->price_financing : '80';
            @endphp
            <span class="sm_txtx text-right finance-toggle-text_1" onclick="financetodownconversion(1)">{{ 100 - $priceFinacing }}% Down Payment <i class="  fa  fa-exchange text-primary"></i></span>
            <span class="sm_txtx">Enter The Down Payment On Purchase Price, Or The Percentage Financed. Click Label To Toggle Input.</span>
        </div>
        <div class="tbss_form_lst mt-4">
            <div class="tab-wrapper">
                <div class="tbs_hids">Loan Type <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></div>
                <div class="tabs">
                    <div class="tab-link active" onclick="setLoanTypeOptions(1,1)">
                        <input name="loan_type" class="loan_type_opt1_1" id="loan_type_opt1_1" checked type="radio" value="1" style=" opacity: 0; width: 0;">
                        <label for="loan_type_opt1_1">Amortizing</label>
                    </div>
                    <div class="tab-link" onclick="setLoanTypeOptions(2,1)">
                        <input name="loan_type" class="loan_type_opt2_1" id="loan_type_opt2_1" type="radio" value="2" style="opacity: 0;width: 0;">
                        <label for="loan_type_opt2_1">Interest Only</label>
                    </div>
                </div>
            </div>
            <div class="content-wrapper">
                <div id="tab-1" class="tab-content active">
                    <div class="choss_araes mt-4 mb-5">
                        <div class="form-group managsss1">
                            <label>Interest Rate:</label>
                            <input type="text" class="interest_rate_1" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" name="interest_rate" placeholder="Interest Rate" value="<?= !empty($ItemRefinanceAmount) ? $ItemRefinanceAmount->interest_rate : '5'; ?>" />
                            <span class="pursntss">%</span>
                        </div>
                        <div class="form-group managsss1">
                            <label>Loan Term: <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></label>
                            <input type="text" name="loan_term" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="loan_term_1" placeholder="Loan Term" value="<?= !empty($ItemRefinanceAmount) ? $ItemRefinanceAmount->loan_term : '30'; ?>" />
                            <span class="pursntss">Years</span>
                        </div>
                        <div class="mortgagebox_1">
                            <div class="lft_cntts">
                                <p>Mortgage Insurance (PMI) <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></p>
                                <span>Enable To Ad Private Mortgage Insurance Payments For This Loan.</span>
                            </div>
                            <div class="chos_bntt">
                                <input type="checkbox" class="toggle mortgage_insurance_1" onChange="$('.mortgagebox2_1').toggle()" name="mortgage_insurance" checked id="toggle1" />
                                <label for="toggle1">
                                    <span class="on">Yes</span>
                                    <span class="off">No</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mortgagebox_1 mortgagebox2_1">
                        <div class="form-group managsss1">
                            <label>Upfront</label>
                            <input type="text" name="upfront" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="upfront_1" placeholder="Upfront" value="<?= !empty($ItemRefinanceAmount) ? $ItemRefinanceAmount->upfront : '0'; ?>" />
                            <span class="pursntss">% Of Loan</span>
                            <span class="sm_txtx">A One Time PMI Payment That Will Be Added To The Starting Loan Amount.</span>
                        </div>
                        <div class="form-group managsss1">
                            <label>Recurring</label>
                            <input type="text" name="recurring" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" class="recurring_1" placeholder="Recurring" value="<?= !empty($ItemRefinanceAmount) ? $ItemRefinanceAmount->recurring : '0'; ?>" />
                            <span class="pursntss">0 % Of Loan Per Year</span>
                            <span class="sm_txtx">A Recurring PMI Payment That Will Be Added To All Loan Payment</span>
                        </div>
                    </div>
                </div>
                <div id="tab-2" class="tab-content"></div>
            </div>
        </div>
    </div>
</div>


<div class="lsting_proprty purch_list_conts brcats_listss mt-4">
    <h3>Refinance Costs <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h3>
</div>
<div class="all_frm_list">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group managsss1">
                <label>Total</label>
                <div class="pce_amount"<?php if(count($ItemRefinanceCost)){ }else{ echo 'style="display: none;"';} ?>>
                    <span class="currencyInputprefix"><?=$currency?></span>
                    <input class="currencyInput" readonly type="text" id="totalPurchasedAmountInput2" name="totalPurchasedAmountInput2" placeholder="Total Refinance Cost" value="<?=$MainProperty->prop_refinance_cost?>" >
                </div>
                <div class="pce_percent" <?php if(count($ItemRefinanceCost)==0){ }else{ echo 'style="display: none;"';} ?>>
                    <input type="text" placeholder="Refinance Cost's Estimate Percent" value="3" name="closingCostEstimatePercent"/>
                    <span class="pursntss">% Of Market Value</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="choss_araes">
                <div class="lft_cntts" style="width: 100%;">
                    <p>Itemize Refinance Costs</p>
                </div>
                <div class="chos_bntt" style=" width: 100%;">
                    <input type="checkbox" @if(count($ItemRefinanceCost)) checked @endif class="toggle" id="toggle13" autocomplete="off"/>
                    <label for="toggle13">
                    <span class="on">Yes</span>
                    <span class="off">No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- Itemized purchase Costs   -->
    <div class="itm_cost_prch" id="itemisedPurchaseCost" <?php if(count($ItemRefinanceCost)){ }else{ echo 'style="display: none;"';} ?>>
        <div class="hd_res_listsss">
            <h3>Itemized Refinance Costs
                <span class="rit_mg">
                    <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#purchaseCostModal">
                    <img src="{{url('')}}/img/ad_bk.png" alt="" />
                    </button>
                </span>
            </h3>
        </div>
        <div class="all_frm_list" style="padding: 0;" id="refinance_cost_content">

            <?php
                $ItemRefinanceCostData = RefinanceCost($MainProperty);
                $ItemRefinanceCost = $ItemRefinanceCostData['Data'];
                $currency = '₹';
                foreach($ItemRefinanceCost as $itemPA){
                    ?>
                    <div class="form-group managsss1" id="IPURA{{ $itemPA->id }}">
                        <label>{{ $itemPA->paid_name }}</label>
                        <?php
                            if($itemPA->paid_type == 'amount'){
                                ?>
                                <span class="currencyInputprefix">{{ $currency }}</span>
                                <input class="currencyInput" type="text" value="{{ $itemPA->paid_amount }}" readonly/>
                                <?php
                            } else {
                                ?>
                                <input class="currencyInput pecentOfInput" type="text" value="{{ $itemPA->paid_amount }}" readonly/>
                                <span class="currencyInputprefix percentOfSpan">% of {{ $itemPA->paid_percentOf }}</span>
                                <?php
                            }
                        ?>
                        <span class="edttt bth_alsss">
                            <a onclick="editIPURA(<?=$itemPA->id?>,<?=$itemPA->prop_id?>,'<?=$itemPA->paid_name?>','<?=$itemPA->paid_type?>',<?=$itemPA->paid_amount?>,'<?=$itemPA->paid_percentOf?>','<?=$itemPA->paid_date?>','<?=$itemPA->paid_remarks?>',<?=$itemPA->paid_inLoan?>);" style="cursor: pointer;"><img src="{{url('')}}/img/edit.png" alt="edit" /></a>
                            <a onclick="deleteIPURA(<?=$itemPA->id?>,<?=$itemPA->paid_amount?>)" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
                        </span>
                    </div>
                    <?php
                }
            ?>
            <div id="purchasedAmountItemizedDiv"></div>
            <div class="btm_coststs">
                <span class="tltss">Total</span>
                <span class="pricss">{{ $currency }}
                    <span id="totalItemizedPurchasedAmt">{{ $ItemRefinanceCostData['TotalAmount'] }}</span>
                </span>
            </div>
        </div>
    </div>
    <!-- End Itemized purchase Costs  -->
</div>