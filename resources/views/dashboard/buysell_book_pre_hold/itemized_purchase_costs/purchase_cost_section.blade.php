@php
    $currency = '₹';
@endphp
<div class="lsting_proprty purch_list_conts brcats_listss mt-4">
    <h3>Purchase Costs <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h3>
</div>
<div class="all_frm_list">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group managsss1">
                <label>Total</label>
                <div class="pce_amount"<?php if(count($ItemPurchaseCost)){ }else{ echo 'style="display: none;"';} ?>>
                    <span class="currencyInputprefix"><?=$currency?></span>
                    <input class="currencyInput" readonly type="text" id="totalPurchasedAmountInput2" placeholder="Total Purchase Cost" value="<?=$MainProperty->prop_costPurchasePrice?>" >
                </div>
                <div class="pce_percent" <?php if(count($ItemPurchaseCost)==0){ }else{ echo 'style="display: none;"';} ?>>
                    <input type="text" placeholder="Purchasing Cost's Estimate Percent" value="<?=$MainProperty->purchaseCostPercent?>" name="closingCostEstimatePercent"/>
                    <span class="pursntss">% Of Price</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="choss_araes">
                <div class="lft_cntts" style="width: 100%;">
                    <p>Itemize Purchase Costs</p>
                </div>
                <div class="yesNoButton"  style="width: 100%;">
                    <input type="checkbox" @if(count($ItemPurchaseCost)) checked @endif class="toggle" id="toggle13" autocomplete="off" name="purchaseCostitemizedToggle"/>
                    <label for="toggle13">
                        <span class="on">Yes</span>
                        <span class="off">No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- Itemized purchase Costs  -->
    <div class="itm_cost_prch" id="itemisedPurchaseCost" <?php if(count($ItemPurchaseCost)){ }else{ echo 'style="display: none;"';} ?>>
        <div class="hd_res_listsss">
            <h3>Itemized Purchase Costs
                <span class="rit_mg">
                    <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#purchaseCostModal">
                        <img src="{{url('')}}/img/ad_bk.png" alt="" />
                    </button>
                </span>
            </h3>
        </div>
        <div class="all_frm_list"  style="padding: 0;" id="itemized_purchase_amount_content">
            @include('dashboard.buysell_book_pre_hold.itemized_purchase_costs.itemized_purchase_amount',[
                'ItemPurchaseCost'    => PurchaseCostsHelper($MainProperty)
            ])
        </div>
    </div>
    <!-- End Itemized purchase Costs  -->
</div>