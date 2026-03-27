@php
    $currency = '₹';
    $totalPurchaseAmount = $ItemPurchaseCost['TotalAmount'];
    $purchaseItemData = $ItemPurchaseCost['Data'];
@endphp
<?php
    foreach($purchaseItemData as $itemPA){ ?>
        <div class="form-group managsss1" id="IPURA{{ $itemPA->id }}">
            <label>{{$itemPA->paid_name}}</label>
            <?php
            if($itemPA->paid_type == 'amount'){
                ?>
                <span class="currencyInputprefix">{{$currency}}</span>
                <input class="currencyInput" type="text" value="{{$itemPA->paid_amount}}" readonly/>
                <?php
            } else {
                ?>
                <input class="currencyInput pecentOfInput" type="text" value="{{$itemPA->paid_amount}}" readonly/>
                <span class="currencyInputprefix percentOfSpan">% of {{$itemPA->paid_percentOf}}</span>
                <?php
            } ?>
            <span class="edttt bth_alsss">
                <a data-toggle="modal" data-target="#PurchasedAmountModalEdit" onclick="editDPAMP(<?=$itemPA->id?>,<?=$itemPA->prop_id?>,'<?=$itemPA->paid_name?>','<?=$itemPA->paid_type?>',<?=$itemPA->paid_amount?>,'<?=$itemPA->paid_percentOf?>','<?=$itemPA->paid_date?>','<?=$itemPA->paid_remarks?>',<?=$itemPA->paid_inLoan?>);" style="cursor: pointer;"><img src="{{url('')}}/img/edit.png" alt="edit" /></a>
                <a onclick="deleteDPAMP(<?=$itemPA->id?>,<?=$itemPA->paid_amount?>)" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
            </span>
        </div>
        <?php
    }
?>
<div id="purchasedAmountItemizedDiv"></div>
<div class="btm_coststs">
    <span class="tltss">Total</span>
    <span class="pricss">
        {{$currency}}
        <span id="totalItemizedPurchasedAmt">{{ $totalPurchaseAmount }}</span>
    </span>
</div>