<?php 
$currency = '₹'; 
$ItemConvDeedData = $ItemConvDeed['Data'];
foreach($ItemConvDeedData as $itemPA){ 
    ?>
    <div class="form-group managsss1" id="CDC{{$itemPA->id}}">
        <label><?=$itemPA->paid_name?></label>
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
            } 
        ?>
        <span class="edttt bth_alsss">
            <a onclick="editCDC(<?=$itemPA->id?>,<?=$itemPA->prop_id?>,'<?=$itemPA->paid_name?>','<?=$itemPA->paid_type?>',<?=$itemPA->paid_amount?>,'<?=$itemPA->paid_percentOf?>','<?=$itemPA->paid_date?>',<?=$itemPA->paid_inLoan?>);" style="cursor: pointer;"><img src="{{url('')}}/img/edit.png" alt="edit" /></a>
            <a onclick="deleteCDC(<?=$itemPA->id?>,<?=$itemPA->paid_amount?>)" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
        </span>
    </div>
    <?php 
} 
?>
<div id="ConvDeedItemizedDiv"></div>
<div class="btm_coststs">
<span class="tltss">Total</span> 
<span class="pricss">
    {{$currency}}
    <span id="totalItemizedConvDeed">{{ $ItemConvDeed['TotalAmount'] }}</span>
</span>
</div>