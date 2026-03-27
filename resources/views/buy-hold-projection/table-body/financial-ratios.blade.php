<tbody>
    @php
        $AllCell = AllCell($MainProperty);
        $loopCount = $AllCell['loopCount'];
        $C2 = $AllCell['C2'];
        $D2 = $AllCell['D2'];
        $C35 = $AllCell['C35'];

        $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
        $grossRentYearly = json_decode($buyHoldProjection->gross_rent_yearly);
        $marketValuePropertyJson = json_decode($buyHoldProjection->market_value_property);

        $totalAmountReceivedSaleJson = json_decode($buyHoldProjection->total_amount_received_sale);
        $grossInvestmentCashOutJson = json_decode($buyHoldProjection->gross_investment_cash_out);

        $operatingCost = json_decode($buyHoldProjection->operating_cost);
        $netOperatingIncome = json_decode($buyHoldProjection->net_operating_income);
        $NetBalanceAtTheEndMonthJson = json_decode($buyHoldProjection->net_balance_at_the_end_month);
    @endphp
    <tr class="bg_bluess">
        @for ($i = 0; $i < $loopCount; $i++)
            <td>&nbsp;</td>
        @endfor
    </tr>

    <tr>
        @for ($i = 0; $i < count($grossRentYearly); $i++)
            @php
                try {
                    if($i == 0){
                        $rentToValue = ($grossRentYearly[$i] / 12) / ($C2 - ($C2 * $D2 / 100)) * 100;
                    }else{
                        $rentToValue = ($grossRentYearly[$i] / 12) / $marketValuePropertyJson[$i] * 100;
                    }
                } catch (\Throwable $th) {
                    $rentToValue = 0;
                }
                         
            @endphp
            <td>{{ number_format($rentToValue,1) }}%</td>
        @endfor
    </tr>

    <tr>
        @for ($i = 0; $i < count($grossRentYearly); $i++)
            @php
                try {
                    if($i == 0){
                        $grossRentMultiplier = ($C2 - ($C2 * $D2 / 100)) / $grossRentYearly[$i];
                    }else{
                        $grossRentMultiplier = $marketValuePropertyJson[$i] / $grossRentYearly[$i];
                    }
                } catch (\Throwable $th) {
                    $grossRentMultiplier = 0;
                }
            @endphp
            <td>{{ number_format($grossRentMultiplier,1) }}%</td>
        @endfor
    </tr>
    
    <tr>
        @for ($i = 0; $i < count($totalAmountReceivedSaleJson); $i++)
            @php
                $equityMultiple = $totalAmountReceivedSaleJson[$i] / $grossInvestmentCashOutJson[$i];
            @endphp
            <td>{{ number_format($equityMultiple,1)}}%</td>
        @endfor
    </tr>    
    
    <tr>
        @for ($i = 0; $i < count($operatingCost); $i++)
            @php
                try {
                    $BreakEvenRatio = ($operatingCost[$i] + $C35) / $grossRentYearly[$i] * 100;
                } catch (\Throwable $th) {
                    $BreakEvenRatio = 0;
                }
                
            @endphp
            <td>{{ number_format($BreakEvenRatio,1) }}%</td>
        @endfor
    </tr>
    
    <tr>
        @for ($i = 0; $i < count($netOperatingIncome); $i++)
            @php
                try {
                    $debtCoverageRatio = ($netOperatingIncome[$i] / $C35);
                } catch (\Throwable $th) {
                    $debtCoverageRatio = 0;
                }
                
            @endphp
            <td>{{ number_format($debtCoverageRatio,1) }}%</td>            
        @endfor
    </tr>
    
    <tr>
        @for ($i = 0; $i < count($netOperatingIncome); $i++)
            @php
                if(isset($netOperatingIncome[$i]) && isset($NetBalanceAtTheEndMonthJson[$i])){
                    $debtYield = ($netOperatingIncome[$i] / $NetBalanceAtTheEndMonthJson[$i]) * 100;
                }else{
                    $debtYield = 0;
                }
            @endphp
            <td>{{ number_format($debtYield,1) }}%</td>
        @endfor
    </tr>
</tbody>