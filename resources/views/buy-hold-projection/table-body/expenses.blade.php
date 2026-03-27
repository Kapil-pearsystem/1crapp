<tbody>
    <tr class="bg_bluess">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    @php
        $OperatingExpenses = OperatingExpenses($MainProperty);
        $yearlyOperatingExpenses = $OperatingExpenses['yearly_operating_expenses'];
        $customeData = $OperatingExpenses['customeData'];
        $AllCell = AllCell($MainProperty);
        $loopCount = $AllCell['loopCount'];
        $K2 = $AllCell['K2'];
        $operatingCost = array();
        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
    @endphp
    @for ($i = 0; $i < count($customeData); $i++)
        <tr>
            @for ($AN = 0; $AN < $loopCount; $AN++)
                @if ($AN == 0)
                    <td>{{ $customeData[$i]['paid_amount'] }}</td>
                    @php $prevItemAmount = $customeData[$i]['paid_amount']; @endphp
                @else 
                    @php $prevItemAmount = round($prevItemAmount * (100 + $K2) / 100);  @endphp
                    <td>{{ $prevItemAmount }}</td>
                @endif    
            @endfor
        </tr>
    @endfor 
    <tr class="redss">
        
        @for ($AN = 0; $AN < $loopCount; $AN++)
            @php $totalAmount = 0; @endphp
            @if ($AN == 0)
                <td>₹ {{ $yearlyOperatingExpenses }}</td>   
                @php $prevItemAmount = $yearlyOperatingExpenses; @endphp
            @else
                @php $prevItemAmount = round($prevItemAmount * (100 + $K2) / 100);  @endphp
                <td>₹ {{ $prevItemAmount }}</td>
            @endif
            @php $operatingCost[] = $prevItemAmount; @endphp
        @endfor
        @php
            $operatingCostJson = json_encode($operatingCost);
            if(is_null($buyHoldProjection)){
                $createbuyHoldProjection = App\Models\BuyHoldProjection::create([
                    'property_id' => $MainProperty->prop_id,
                    'user_id'     => Auth::id(),
                    'operating_cost' => $operatingCostJson
                ]);
            }else{
                App\Models\BuyHoldProjection::where('id',$buyHoldProjection->id)->update([
                    'operating_cost' => $operatingCostJson
                ]);
            }
        @endphp
    </tr>

    <tr class="blue">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>{{ $K2 }}%</td>
        @endfor
    </tr>
</tbody>