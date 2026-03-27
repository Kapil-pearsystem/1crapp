@php
    $currency = '₹';
@endphp
<div class="form-group managsss1">
    <label>Selling Cost: <span class="ticck" tooltip="Selling Cost" flow="down">?</span></label>
    <div class="both_areaa">
        <div class="lft_araeassd" style="width: 80%;">
            <input type="text" placeholder="Selling Cost" value="<?=$MainProperty->prop_sellingCostPercent?>" id="totalSellingCostPercentInput" name="totalSellingCostPercentInput" <?php if(count($itemSellingCost)){ echo "readonly";} ?>/>
            <span class="edttt bth_alsss nw_long"> % of Current Market Value</span>
        </div>
        <div class="ri_lft_araeassd" style="width: 20%;margin-top: -25px;">
            <label>Itemize:</label>
            <div class="yesNoButton">
                <input type="checkbox" class="toggle" id="toggle11" autocomplete="off" <?php if(count($itemSellingCost)){ echo "checked";} ?> name="sellingCostitemizedToggle"/>
                <label for="toggle11">
                    <span class="on">Yes</span>
                    <span class="off">No</span>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="itm_cost_prch" id="itemisedPaidAmount" <?php if(!count($itemSellingCost)){ echo 'style="display: none;"';} ?>>
    <div class="hd_res_listsss">
        <h2>
            <span class="rit_mg">
                <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#sellingCostModal">
                <img src="{{url('')}}/img/ad_bk.png" alt="" />
                </button>
            </span>
        </h2>
    </div>
    <div id="selling_cost_section">
        @include('dashboard.sell.sell_cost_items',['MainProperty' => $MainProperty, 'sellingCostData' => $sellingCostData])
    </div>
    
</div>