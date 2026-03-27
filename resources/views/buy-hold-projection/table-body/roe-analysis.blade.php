<tbody>
    @php
        $AllCell = AllCell($MainProperty);
        $loopCount = $AllCell['loopCount'];

        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
        $TotalAnnualReturnJson = json_decode($buyHoldProjection->total_annual_return);
        $YearEndAccumulatedEquityJson = json_decode($buyHoldProjection->year_accumulated_equity);
    @endphp
    <tr class="bg_bluess">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>&nbsp;</td>    
        @endfor
    </tr>

    <tr>
        @for ($i = 0; $i < count($TotalAnnualReturnJson); $i++)
            <td>₹ {{$TotalAnnualReturnJson[$i]}}</td>    
        @endfor
    </tr>

    <tr>
        @for ($i = 0; $i < count($YearEndAccumulatedEquityJson); $i++)
            <td>₹ {{ $YearEndAccumulatedEquityJson[$i] }}</td>    
        @endfor
    </tr>

    <tr class="redss">
        @for ($i = 0; $i < count($TotalAnnualReturnJson); $i++)
            @if($TotalAnnualReturnJson[$i] != 0 && $YearEndAccumulatedEquityJson[$i] != 0)
                <td> {{ number_format(($TotalAnnualReturnJson[$i] / $YearEndAccumulatedEquityJson[$i] * 100),1) }}%</td>    
            @else
                <td>0%</td>
            @endif
        @endfor
    </tr>
</tbody>