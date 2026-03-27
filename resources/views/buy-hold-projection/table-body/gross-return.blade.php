<tbody>
    @php
        $AllCell = AllCell($MainProperty);
        $loopCount = $AllCell['loopCount'];

        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
        $CummulaticeCashFlowJson = json_decode($buyHoldProjection->cummulatice_cash_flow);
        $YearEndAccumulatedEquityJson = json_decode($buyHoldProjection->year_accumulated_equity);
        $grossInvestmentCashOutJson = json_decode($buyHoldProjection->gross_investment_cash_out);
        $totalReturn = array();
    @endphp
    
    <tr class="bg_bluess">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>&nbsp;</td>    
        @endfor
    </tr>
    {{-- ========================================= CUMMULATIVE CASH FLOW ========================================= --}}
    <tr>
        @for ($i = 0; $i < count($CummulaticeCashFlowJson); $i++)
            <td>₹ {{ $CummulaticeCashFlowJson[$i] }}</td>    
        @endfor
    </tr>
    {{-- ========================================= Year End Accumulated Equity ========================================= --}}
    <tr>
        @for ($i = 0; $i < count($YearEndAccumulatedEquityJson); $i++)
            <td>₹ {{ $YearEndAccumulatedEquityJson[$i] }}</td>
        @endfor
    </tr>
    {{-- ================================ Total Return ( Equity+Cash Flow ) ================================ --}}
    <tr class="blue">
        @for ($i = 0; $i < count($YearEndAccumulatedEquityJson); $i++)
            <td>₹ {{ $CummulaticeCashFlowJson[$i] + $YearEndAccumulatedEquityJson[$i] }}</td>
            @php $totalReturn[] = ($CummulaticeCashFlowJson[$i] + $YearEndAccumulatedEquityJson[$i]); @endphp
        @endfor
    </tr>
    {{-- ================================ Total Cash Invested ================================ --}}
    <tr>
        @for ($i = 0; $i < count($grossInvestmentCashOutJson); $i++)
            <td>₹ {{ $grossInvestmentCashOutJson[$i] }}</td>
        @endfor
    </tr>
    {{-- ================================ Rate Of Gross Return ================================ --}}
    <tr class="redss">
        @for ($i = 0; $i < count($grossInvestmentCashOutJson); $i++)
            <td>{{ round($totalReturn[$i] / $grossInvestmentCashOutJson[$i] * 100) }}%</td>
        @endfor
    </tr>
</tbody>