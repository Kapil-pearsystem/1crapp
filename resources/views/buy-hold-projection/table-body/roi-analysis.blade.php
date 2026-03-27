<tbody>
    @php
        $AllCell = AllCell($MainProperty);
        $loopCount = $AllCell['loopCount'];
        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
        $TotalAnnualReturnJson = json_decode($buyHoldProjection->total_annual_return);
        $grossInvestmentCashOutJson = json_decode($buyHoldProjection->gross_investment_cash_out);
    @endphp
    <tr class="bg_bluess">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>&nbsp;</td>
        @endfor
    </tr>

    <tr>
        @for ($i = 0; $i < count($TotalAnnualReturnJson); $i++)
            <td>₹ {{ $TotalAnnualReturnJson[$i] }}</td>    
        @endfor
    </tr>

    <tr>
        @for ($i = 0; $i < count($grossInvestmentCashOutJson); $i++)
            <td>₹ {{ $grossInvestmentCashOutJson[$i] }}</td>
        @endfor
    </tr>

    <tr class="redss">
        @for ($i = 0; $i < count($TotalAnnualReturnJson); $i++)
            <td>{{ number_format(($TotalAnnualReturnJson[$i] / $grossInvestmentCashOutJson[$i] * 100),1) }}%</td>
        @endfor
    </tr>
</tbody>