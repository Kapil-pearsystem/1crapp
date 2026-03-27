<div class="hd_res_listsss">
    <h2>CD Registration Cost (CDR Cost) <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h2>
</div>
<div class="all_frm_list">
    <div class="form-group managsss1">
        <label>Total</label>
        <div class="both_areaa">
            <div class="lft_araeassd" style="width: 80%;">
                <input type="text" placeholder="Total Conveyance Deed Cost" id="totalConvDeedPInput" value="<?=$MainProperty->prop_ConvDeedPercent?>" name="totalConvDeedPInput" autocomplete=off/>
                <span class="pursntss">% Of Price</span>
            </div>
            <div class="ri_lft_araeassd" style="width: 20%;margin-top: -25px;">
                <label>Itemize:</label>
                <div class="yesNoButton">
                    <input type="checkbox" class="toggle" id="toggle3" autocomplete="off" checked/>
                    <label for="toggle3">
                        <span class="on">Yes</span>
                        <span class="off">No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Itemized Extra Charges  -->
    <div class="itm_cost_prch" id="itemisedConvDeed" <?php if(!count($ItemConvDeed)){ echo 'style="display: none;"';} ?>>
        <div class="hd_res_listsss">
            <h2>
                <span class="rit_mg">
                    <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#ConvDeedModal">
                        <img src="{{url('')}}/img/ad_bk.png" alt="" />
                    </button>
                </span>
            </h2>
        </div>
        <div class="all_frm_list" style="padding:0;" id="conveyance_deed_cost_content">
            @include('dashboard.buy_possession_improvement.conveyance_deed_cost.conveyance_deed_cost_items',[
                'ItemConvDeed' => ConveyanceDeedCost($MainProperty)
            ])
        </div>
    </div>
</div>