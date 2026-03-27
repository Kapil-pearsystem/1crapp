@php
    $currency = '₹';
@endphp
<div class="lsting_proprty purch_list_conts brcats_listss mt-4">
    <h3>Paid Amount (Part Of BPP)</h3>
    <p>Costs And Fees Associated With Purchashing A Property, Also Called Closing Costs.</p>
</div>
<div class="all_frm_list">
    <div class="col-md-8">
        <div class="form-group managsss1">
            <label>Total Paid Amount (Part Of BPP)</label>
            <span class="currencyInputprefix">{{$currency}}</span>
            <input class="currencyInput" type="text" id="totalPaidAmountInput2" placeholder="Total Paid Amount (Part Of BPP)" value="{{$MainProperty->prop_paidAmount}}"  oninput="updateTotalPaidAmountDiv(this.value)" <?php if(count($ItemPaidAmount)){ echo "readonly";} ?>>
            <span class="edttt bth_alsss nw_long" style="display:none;" id="totalPaidAmountDiv"> ₹ {{$MainProperty->prop_paidAmount}} </span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="choss_araes">
            <div class="lft_cntts" style="width:100%">
                <p>Itemize Total Paid Amount (Part Of BPP)</p>
            </div>
            <div class="yesNoButton" style="width:100%">
                <input type="checkbox" class="toggle" id="toggle11" autocomplete="off" <?php if(count($ItemPaidAmount)){ echo "checked";} ?> name="paidAmountitemizedToggle"/>
                <label for="toggle11">
                <span class="on">Yes</span>
                <span class="off">No</span>
                </label>
            </div>
        </div>
    </div>
    <!-- Itemized purchase Costs  -->
        <div class="itm_cost_prch" id="itemisedPaidAmount" <?php if(!count($ItemPaidAmount)){ echo 'style="display: none;"';} ?>>
            <div class="hd_res_listsss">
                <h3>Itemized Paid Amount
                    <span class="rit_mg">
                        <button type="button" class="bg-transparent border-0 shadow-none" data-toggle="modal" data-target="#paidAmountModal">
                        <img src="{{url('')}}/img/ad_bk.png" alt="" />
                        </button>
                    </span>
                </h3>
            </div>
            <div class="all_frm_list" style="padding: 0;" id="itemized_paid_amount_content">
                @include('dashboard.buysell_book_pre_hold.itemized_paid_amount.itemized_paid_amount',[
                    'ItemPaidAmount'    => PaidCostsHelper($MainProperty),
                    'totalPaidAmount'  => $MainProperty->prop_paidAmount
                ])
            </div>
        </div>
    <!-- End Itemized purchase Costs -->
</div>