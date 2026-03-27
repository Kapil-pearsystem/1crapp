@php
    $currency = '₹';
    $itemmiscellaneousCharges = $miscellaneousChargesData['Data'];
@endphp
<div class="all_frm_list" style="padding:0;">
    <?php 
        $totalPaidAmt = 0;
        foreach($itemmiscellaneousCharges as $itemPA){
            ?>
            <div class="form-group managsss1" id="IPA<?=$itemPA->id?>">
                <label><?=$itemPA->paid_name?></label>
                <?php 
                if($itemPA->paid_type == 'amount'){
                    $totalPaidAmt += $itemPA->paid_amount; 
                    ?>
                    <span class="currencyInputprefix"><?=$currency?></span>
                    <input class="currencyInput" type="text" value="<?=$itemPA->paid_amount?>" readonly/>
                    <?php 
                } else {
                    if($itemPA->paid_percentOf == 'price'){
                        $totalPaidAmt += $itemPA->paid_amount * $MainProperty->prop_salePrice / 100;
                    }
                    else{
                        $totalPaidAmt += $itemPA->paid_amount * 0 / 100;
                    }
                    ?>
                    <input class="currencyInput pecentOfInput" type="text" value="<?=$itemPA->paid_amount?>" readonly/>
                    <span class="currencyInputprefix percentOfSpan">% of <?=$itemPA->paid_percentOf?></span>
                    <?php 
                } ?>
                <span class="edttt bth_alsss">
                    <a data-toggle="modal" data-target="#miscellaneousChargesEditModal" onclick="editmiscellaneousCharges(<?=$itemPA->id?>,<?=$itemPA->prop_id?>,'<?=$itemPA->paid_name?>','<?=$itemPA->paid_type?>',<?=$itemPA->paid_amount?>,'<?=$itemPA->paid_percentOf?>','<?=$itemPA->paid_date?>',<?=$itemPA->paid_inLoan?>);" style="cursor: pointer;"><img src="{{url('')}}/img/edit.png" alt="edit" /></a>
                    <a onclick="deletemiscellaneousCharges(<?=$itemPA->id?>,<?=$itemPA->paid_amount?>)" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
                </span>
            </div>
            <?php 
        } 
    ?>
    <div id="paidAmountItemizedDiv"></div>
    <div class="btm_coststs">
        <span class="tltss">Total</span>
        <span class="pricss">
            {{$currency}}
            <span id="totalItemizedPaidAmt">{{ $miscellaneousChargesData['TotalAmount'] }}</span>
            <span id="totalItemizedmiscellaneousChargesHidden" style="display: none">{{ $miscellaneousChargesData['percentOfPrice'] }}</span>
        </span>
    </div>
</div>