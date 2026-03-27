@php
    $cashFlow = YearlyCashFlow($singleProperty);
    $capRate = CapRatePurchasePrice($singleProperty,'Purchase Price');
    $coc = CashOnCashReturn($singleProperty);
@endphp
<div class="slt_are_metrr sltbox show_areaa">
    @if (!is_null($propertyAddress))
        <p>{{$propertyAddress->prop_street}}, {{$propertyAddress->prop_city}}, {{$propertyAddress->prop_state}} {{$propertyAddress->prop_zip}}</p>
    @endif
    @if(!is_null($propertyDescription))
        <p>
            <span class="area_contss">
                {{ $propertyDescription->desc_type }}
                <span class="slesss">/</span> 4 Beds 
                <span class="slesss">/</span> 4 Baths 
                <span class="slesss">/</span> 
                {{ $propertyDescription->desc_lot.' '.$propertyDescription->desc_lot_type }}
            </span>
        </p>
    @endif
    <p>
        <span class="red">{{ $cashFlow }} Cash Flow</span>
        <span class="red">{{$capRate}}% Cap Rate</span> 
        <span class="red">{{$coc}}% COC</span>
    </p>
    <p>
        <span class="blue">₹ {{$singleProperty->prop_purchasePrice}} Purchase Price</span>
    </p>
</div>