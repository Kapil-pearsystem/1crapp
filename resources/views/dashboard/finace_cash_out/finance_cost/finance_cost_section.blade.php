<div class="lsting_proprty purch_list_conts brcats_listss mt-4">
    <h3>Refinance Costs <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h3>
</div>
<div class="all_frm_list">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group managsss1">
                <label>Total</label>
                <div class="pce_amount"<?php if(!$MainProperty->prop_refinance_percent && count($itemRefinanceCost)){ }else{ echo 'style="display: none;"';} ?>>
                    <span class="currencyInputprefix"><?=$currency?></span>
                    <input class="currencyInput" readonly type="text" id="totalFinanceAmountInput2" name="totalPurchasedAmountInput2" placeholder="Total Refinance Cost" value="<?=$MainProperty->prop_refinance_cost?>" >                            
                </div>
                <div class="pce_percent" <?php if($MainProperty->prop_refinance_percent || count($itemRefinanceCost)==0){ }else{ echo 'style="display: none;"';} ?>>
                    <input type="text" placeholder="Refinance Cost's Estimate Percent" max="100" value="<?=$MainProperty->prop_refinance_percent?>" name="prop_refinance_percent" id="prop_refinance_percent_input"/>
                    <span class="pursntss">% Of Financed Amount</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="choss_araes">
                <div class="lft_cntts" style="width: 100%;">
                    <p>Itemize Refinance Costs</p>                                    
                </div>
                <div class="yesNoButton" style=" width: 100%;">
                    <input type="checkbox" @if(!$MainProperty->prop_refinance_percent && count($itemRefinanceCost)) checked @endif class="toggle" id="toggle13" autocomplete="off"/>
                    <label for="toggle13">
                    <span class="on">Yes</span>
                    <span class="off">No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>                        
    <!-- Itemized purchase Costs   -->
    <div class="itm_cost_prch" id="itemisedPurchaseCost" <?php if(!$MainProperty->prop_refinance_percent && count($itemRefinanceCost)){ }else{ echo 'style="display: none;"';} ?>>
        <div class="hd_res_listsss">
            <h3>Itemized Refinance Costs 
                <span class="rit_mg">
                    <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#financeCostModal">
                    <img src="{{url('')}}/img/ad_bk.png" alt="" />
                    </button>
                </span>
            </h3>
        </div>
        <div class="all_frm_list" style="padding: 0;" id="refinance_cost_content">
            <!--@include('dashboard.refinace_cash_out.refinance_cost.refinance_cost_items',['MainProperty' => $MainProperty])-->
        </div>
    </div>
    <!-- End Itemized purchase Costs  -->
</div>