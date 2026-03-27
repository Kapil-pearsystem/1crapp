<tbody>
    @php
        $AllCell = AllCell($MainProperty);
        $loopCount = $AllCell['loopCount'];
        $C2 = $AllCell['C2'];
        $D2 = $AllCell['D2'];
        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
        $netOperatingIncomeJson = json_decode($buyHoldProjection->net_operating_income);
        $marketValuePropertyJson = json_decode($buyHoldProjection->market_value_property);
        $cashFlowJson = json_decode($buyHoldProjection->cash_flow);
        $grossInvestmentCashOutJson = json_decode($buyHoldProjection->gross_investment_cash_out);
        $yearAccumulatedEquityJson = json_decode($buyHoldProjection->year_accumulated_equity);
        $roiOnSaleJson = json_decode($buyHoldProjection->roi_on_sale_in_investment);
        $compoundAnnualGrowthRateJson = json_decode($buyHoldProjection->compound_annual_growth_rate);
    @endphp
    <tr class="bg_bluess">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>&nbsp;</td>
        @endfor
    </tr>

    <tr>
        @for ($i = 0; $i < count($netOperatingIncomeJson); $i++)
            @php
                try {
                    $capRate = $netOperatingIncomeJson[$i] / ($C2 - ($C2 * $D2 / 100)) * 100;
                    $capRate = number_format($capRate,1);
                } catch (\Throwable $th) {
                    $capRate = 0;
                }
                    
            @endphp
            <td>{{$capRate}}%</td>
        @endfor 
    </tr>

    <tr>
        @for ($i = 0; $i < count($netOperatingIncomeJson); $i++)
            @php
                try {
                    $capRate = $netOperatingIncomeJson[$i] / $marketValuePropertyJson[$i] * 100;
                    $capRate = number_format($capRate,1);
                } catch (\Throwable $th) {
                    $capRate = 0;
                }
                
            @endphp
            <td>{{$capRate}}%</td>
        @endfor 
    </tr>
    
    <tr>
        @for ($i = 0; $i < count($cashFlowJson); $i++)
            @php
                $cashOnCashReturn = $cashFlowJson[$i] / $grossInvestmentCashOutJson[$i] * 100;
                $cashOnCashReturn = number_format($cashOnCashReturn,1);
            @endphp
            <td>{{ $cashOnCashReturn }}%</td>
        @endfor 
    </tr>
    <tr>
        @for ($i = 0; $i < count($cashFlowJson); $i++)
            @php $return_on_equity = 0; @endphp
            @if($yearAccumulatedEquityJson[$i] != 0)
                @php
                    $return_on_equity = $cashFlowJson[$i] / $yearAccumulatedEquityJson[$i] * 100;
                    $return_on_equity = number_format($return_on_equity,1);
                @endphp
            @endif
            <td>{{ $return_on_equity }}%</td>
        @endfor 
    </tr>
        
    <tr>
        @for ($i = 0; $i < count($roiOnSaleJson); $i++)
            <td>{{$roiOnSaleJson[$i]}}%</td>
        @endfor
    </tr>
    
    <tr>
        @for ($i = 0; $i < count($compoundAnnualGrowthRateJson); $i++)
            <td>{{ $compoundAnnualGrowthRateJson[$i] }}%</td>
        @endfor
    </tr>
</tbody>