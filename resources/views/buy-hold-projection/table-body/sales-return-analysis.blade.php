<tbody>
    @php
        $AllCell = AllCell($MainProperty);
        $C168 = $AllCell['C168'];
        $I2 = $AllCell['I2'];
        $L2 = $AllCell['L2'];
        
        $loopCount = $AllCell['loopCount'];
        $C35 = $AllCell['C35'];
        $Y2 = $AllCell['Y2'];
        $F2 = $AllCell['F2'];
        $G14 = $AllCell['G14'];
        $bankLoanDebts = NewBankLoanDebts($MainProperty,$G14,$F2,$Y2,$loopCount);
        $NetBalanceAtTheEndMonth = $bankLoanDebts['NetBalanceAtTheEndMonth'];
        if(isset($NetBalanceAtTheEndMonth['12month'])){
            $singleNetBalanceAtTheEndMonth = $NetBalanceAtTheEndMonth['12month'];
        }else{
            $singleNetBalanceAtTheEndMonth = 0;
        }
        $equity = EquityAccumulationsMarketValueProperty($C168,$I2,$singleNetBalanceAtTheEndMonth);
        $equityRowValue = array();
        $sellingCostRowValue = array();
        $NetSalesPrice = array();
        $grossInvestmentCashOut = array();
        $totalAmountReceivedSale = array();
        $totalProfit = array();
        $roi_on_sale = array();
        $compoundAnnualGrowthRate = array();
    @endphp
    <tr class="bg_bluess">
        @for ($i = 0; $i < 20; $i++)
            <td>&nbsp;</td>
        @endfor
    </tr>
    {{-- ============================================ Equity ============================================ --}}
    <tr>
        @for ($i = 0; $i < count($equity['YearEndAccumulatedEquity']); $i++)
            @php $equityRowValue[] = $equity['YearEndAccumulatedEquity'][$i]; @endphp
            <td>₹ {{ $equity['YearEndAccumulatedEquity'][$i] }}</td>
        @endfor
    </tr>
    {{-- ============================================ Selling Cost ============================================ --}}
    <tr>
        @for ($i = 0; $i < count($equity['marketValueProperty']); $i++)
            @php $sellingCostRowValue[] = round($equity['marketValueProperty'][$i] * $L2 / 100);  @endphp
            <td>₹ {{ round($equity['marketValueProperty'][$i] * $L2 / 100) }}</td>
        @endfor
    </tr>
    {{-- ============================================ Net Sales Price ============================================ --}}
    <tr>
        @for ($i = 0; $i < count($equity['YearEndAccumulatedEquity']); $i++)
            <td>₹ {{ $equityRowValue[$i] - $sellingCostRowValue[$i] }}</td>
            @php $NetSalesPrice[] = $equityRowValue[$i] - $sellingCostRowValue[$i] @endphp
        @endfor
    </tr>
    {{-- ============================================ Cummulative Cash Flow ============================================ --}}
    <tr>
        @php
            $buyHoldProjection = App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->first();
            $CummulaticeCashFlowJson = json_decode($buyHoldProjection->cummulatice_cash_flow);
        @endphp
        @for ($i = 0; $i < count($CummulaticeCashFlowJson); $i++)
            <td>₹ {{ $CummulaticeCashFlowJson[$i] }}</td>
        @endfor
    </tr>
    {{-- ============================================ Total Amount Received on Sale ============================================ --}}
    <tr class="blue">
        @for ($i = 0; $i < count($NetSalesPrice); $i++)
            <td>₹ {{ $NetSalesPrice[$i] + $CummulaticeCashFlowJson[$i] }}</td>
            @php $totalAmountReceivedSale[] = $NetSalesPrice[$i] + $CummulaticeCashFlowJson[$i]; @endphp
        @endfor
        @php
            $totalAmountReceivedSaleJson = json_encode($totalAmountReceivedSale);
            App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->update([
                'total_amount_received_sale' => $totalAmountReceivedSale
            ]);
        @endphp
    </tr>
    {{-- ============================================ Gross Investment Cash Out ============================================ --}}
    <tr>
        @for ($i = 0; $i < $loopCount; $i++)
            <td>₹ 1680000</td>
            @php $grossInvestmentCashOut[] = 1680000; @endphp
        @endfor
        
        @php
            $grossInvestmentCashOutJson = json_encode($grossInvestmentCashOut);
            App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->update([
                'gross_investment_cash_out' => $grossInvestmentCashOutJson
            ]);
        @endphp
    </tr>
    {{-- ============================================ Total Profit ============================================ --}}
    <tr class="blue">
        @for ($i = 0; $i < count($totalAmountReceivedSale); $i++)
            <td>₹ {{ $totalAmountReceivedSale[$i] - $grossInvestmentCashOut[$i] }}</td>
            @php $totalProfit[] = $totalAmountReceivedSale[$i] - $grossInvestmentCashOut[$i]; @endphp
        @endfor
    </tr>
    {{-- ============================================ ROI ON SALE ============================================ --}}
    <tr class="redss">
        @for ($i = 0; $i < count($totalProfit); $i++)
            <td>{{ number_format(($totalProfit[$i] / $grossInvestmentCashOut[$i] * 100),1) }}%</td>
            @php $roi_on_sale[] = number_format(($totalProfit[$i] / $grossInvestmentCashOut[$i] * 100),1); @endphp
        @endfor
        @php
            $roiOnSaleJson = json_encode($roi_on_sale);
            App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->update([
                'roi_on_sale_in_investment' => $roiOnSaleJson
            ]);
        @endphp
    </tr>
    {{-- ============================================ Compound Annual Growth Rate ============================================ --}}
    <tr class="blue">
        @php $yearCount = 1; @endphp
        @for ($i = 0; $i < count($totalAmountReceivedSale); $i++)
            @php
                $CAGR = pow($totalAmountReceivedSale[$i] / $grossInvestmentCashOut[$i], 1 / $yearCount) - 1;
                $CAGR = $CAGR * 100;
                $yearCount++;
                $compoundAnnualGrowthRate[] = number_format($CAGR,1);
            @endphp
            <td>{{ number_format($CAGR,1) }}%</td>
        @endfor
        @php
            $compoundAnnualGrowthRateJson = json_encode($compoundAnnualGrowthRate);
            App\Models\BuyHoldProjection::where('property_id',$MainProperty->prop_id)->update([
                'compound_annual_growth_rate' => $compoundAnnualGrowthRateJson
            ]);
        @endphp
    </tr>
</tbody>