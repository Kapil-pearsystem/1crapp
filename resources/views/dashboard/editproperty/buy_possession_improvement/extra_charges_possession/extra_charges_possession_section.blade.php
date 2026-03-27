@php
    $currency = '₹';
@endphp
<div class="hd_res_listsss">
    <h2>Extra Charges On Possession <span class="ticck" tooltip="Data Coming Soon" flow="down">?</span></h2>
</div>

<!-- Itemized Extra Charges  -->
<div class="all_frm_list">
    <div class="form-group managsss1">
        <label>Date of Possession: <span class="ticck" tooltip="Date of Possession" flow="down">?</span></label>
        <input name="DateOfPossession" id="DateOfPossession" type="date" placeholder="DD MM YYYY" value="{{$MainProperty->prop_dateOfPossession}}" required />
    </div>
    <div class="form-group managsss1">
        <label>Total</label>
        <div class="both_areaa">
            <div class="lft_araeassd" style="width: 80%;">
                <input type="text" placeholder="Total Extra Charges" id="totalextraChargePercentInput" value="<?=$MainProperty->prop_extraChargePercent?>" name="totalextraChargePercentInput" autocomplete=off/>
                <span class="pursntss">% Of Price</span>
            </div>
            <div class="ri_lft_araeassd" style="width: 20%;margin-top: -25px;">
                <label>Itemize:</label>
                <div class="yesNoButton">
                    <input type="checkbox" class="toggle" id="toggle21" autocomplete="off" <?php if(count($ItemExtraCharge)){ echo "checked"; } ?>/>
                    <label for="toggle21">
                        <span class="on">Yes</span>
                        <span class="off">No</span>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <!-- Itemized Extra Charges  -->
    <div class="itm_cost_prch" id="itemisedPaidAmount" <?php if(!count($ItemExtraCharge)){ echo 'style="display: none;"';} ?>>
        <div class="hd_res_listsss">
            <h2>
                <span class="rit_mg">
                    <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#paidAmountModal21">
                    <img src="{{url('')}}/img/ad_bk.png" alt="" />
                    </button>
                </span>
            </h2>
        </div>
        <div class="all_frm_list" style="padding:0;" id="extra_charges_possession_items_content">
            @include(
                'dashboard.editproperty.buy_possession_improvement.extra_charges_possession.extra_charges_possession_items',
                [
                    'ItemExtraCharge'=>ExtraChargesPossession($MainProperty)
                ]
            )
        </div>
    </div>
</div>